
import Vue from 'vue';
import { Bar } from 'vue-chartjs/legacy';
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'
import moment from 'moment';
import axios from 'axios';
import json2csv from '../Helpers/Json2Csv';
import { local_date, local_time } from '../Helpers/Time';

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale);


const parseDate = (utz_date) => {
    moment.updateLocale('en', {
        relativeTime: {
            past: "%s ago",
        }
    });
    var utz = moment.utc(utz_date).toDate();
    var local = moment(utz).local();
    var m = moment(local, 'YYYY-MM-DD hh:mm A');
    let res = m.format('MMM. DD, hh:mm A');
    res = res !== 'Invalid date' ? res : ""
    return res;
}

const chartConfig = {
    chartStyles: {},
    chartWidth: 100,
    chartHeight: 50,
    chartData: {
        labels: [],
        datasets: [
            {
                label: " Vouchers Generated ",
                data: []
            }
        ]
    },
    chartOptions: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            }
        }
    },
};

const AdminPage = () => {
    return new Vue({
        el: "#admin",
        components: { Bar },
        data: {
            ...chartConfig,
            user_vouchers: []
        },
        beforeMount() {
            axios.get('/admin/datasets').then(({ data }) => {
                this.parseVoucherChart(data.vouchers);
                this.user_vouchers = data.user_vouchers;
            });
        },
        methods: {
            parseVoucherChart(vouchers) {
                let tempVouchers = {};
                vouchers.map((voucher, idx) => {
                    let dateTime = parseDate(voucher.created_at);
                    tempVouchers[dateTime]
                        ? tempVouchers[dateTime] += 1
                        : tempVouchers[dateTime] = 1;
                });
                let labels = [];
                let datasets = [];
                for (let label in tempVouchers) {
                    labels.push(label);
                    datasets.push(tempVouchers[label]);
                }
                this.chartData.labels = labels;
                this.chartData.datasets[0].data = datasets;
            },
            countUserVoucher(vouchers) {
                return vouchers && vouchers.length
                    ? vouchers.length
                    : 0;
            },
            formatUserVouchers() {
                let formattedData = [];
                this.user_vouchers.map(({ vouchers, id, name, email, username, ...userData }) => {
                    vouchers.map(({ voucher, created_at, ...voucherData }) => {
                        let created = local_date(created_at) + ' ' + local_time(created_at);
                        formattedData.push({ id, name, voucher, created })
                    })
                });
                return formattedData || [];
            },
            exportVoucers() {
                let formattedData = this.formatUserVouchers();
                let today = moment.now();
                let dateToday = local_date(today);
                let timeToday = local_time(today);
                let fileName = `Vouchers-${dateToday}|${timeToday}.csv`;

                let csvData = json2csv(formattedData);
                var blob = new Blob([csvData], { type: 'text/csv;charset=utf-8;' });
                var link = document.createElement("a");
                var url = URL.createObjectURL(blob);
                link.setAttribute("href", url);
                link.setAttribute("download", fileName);
                link.click();
            }
        }
    });
}


export default AdminPage;
