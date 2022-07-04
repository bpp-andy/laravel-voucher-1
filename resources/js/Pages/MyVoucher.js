

import Vue from 'vue';
import axios from 'axios';
import moment from 'moment';
import swal from 'sweetalert2';
import { local_date, local_interval, local_time } from '../Helpers/Time';
import { swalConfirm, swalError, swalLoading, swalSuccess } from '../Helpers/SwalTemplates';

const MyVoucher = () => {
    return new Vue({
        el: "#my-voucher",
        data: {
            vouchers: [],
            nextPage: null,
            errors: {}
        },
        beforeMount() {
            axios.get('/u/vouchers').then(({ data }) => {
                this.vouchers = data.data;
                this.nextPage = data.next_page_url;
            }).catch((err) => {

            });
        },
        methods: {
            localTime: local_time,
            localDate: local_date,
            timeInterval: local_interval,
            addVoucher() {
                swalLoading("Generating New Voucher...");
                axios.post('/u/vouchers').then(({ data }) => {
                    this.vouchers = [data, ...this.vouchers];
                    swalSuccess("New Voucher Generated!");
                }).catch((err) => {
                    swalError("You have reached the Maximum Limit!")
                })
            },
            deleteVoucher({ id, voucher }) {
                swalConfirm(`Are you sure you want to Delete ${voucher}?`, "Delete", () => {
                    swalLoading("Deleting Voucher...");
                    axios.delete(`/u/vouchers/${id}`).then(({ data }) => {
                        this.vouchers = this.vouchers.filter(F => F.id != id);
                        swalSuccess("Voucher Deleted!");
                    }).catch((err) => {
                        swalError("Failed to Delete Voucher!");
                    });
                });
            },
            loadMore() {
                swalLoading("Loading...");
                axios.get(this.nextPage).then(({ data }) => {
                    this.vouchers = [...this.vouchers, ...data.data];
                    this.nextPage = data.next_page_url;
                    swal.close();
                }).catch((err) => {
                    swalError("Nothing to load!");
                })
            }

        }
    });
}

export default MyVoucher;
