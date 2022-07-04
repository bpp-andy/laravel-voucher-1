import moment from 'moment';

export const local_time = (utz_date) => {
    moment.updateLocale('en');
    moment.updateLocale('en', {
        relativeTime: {
            past: "%s ago",
        }
    });
    var utz = moment.utc(utz_date).toDate();
    var local = moment(utz).local();
    var m = moment(local, 'YYYY-MM-DD');
    let res = m.format('hh:mm A');
    res = res !== 'Invalid date' ? res : ""
    return res;
}

export const local_date = (utz_date) => {
    moment.updateLocale('en');
    moment.updateLocale('en', {
        relativeTime: {
            past: "%s ago",
        }
    });
    var utz = moment.utc(utz_date).toDate();
    var local = moment(utz).local();
    var m = moment(local, 'YYYY-MM-DD');
    let res = m.format('DD-MMMM-YYYY');
    res = res !== 'Invalid date' ? res : ""
    return res;
}


export const local_interval = (d) => {
    moment.updateLocale('en');
    moment.updateLocale('en', {
        relativeTime: {
            past: "%s ago",
        }
    });
    var utz = moment.utc(d).toDate();
    var local = moment(utz).local();
    return moment(local).fromNow();
}
