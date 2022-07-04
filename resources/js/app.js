

require('./bootstrap');


import RegisterPage from './Pages/RegisterPage';
import LoginPage from './Pages/LoginPage';
import MyVoucher from './Pages/MyVoucher';
import AdminPage from './Pages/AdminPage';

class PageFactory {

    pages = {
        "RegisterPage": RegisterPage,
        "LoginPage": LoginPage,
        "MyVoucher": MyVoucher,
        "AdminPage": AdminPage,
    };

    build(page) {
        this.pages[page] ? this.pages[page]() : null;
    }
}

(() => {
    let factory = new PageFactory;
    window.page ? factory.build(window.page) : null;
})();

