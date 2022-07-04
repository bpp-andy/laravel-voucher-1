
import Vue from "vue";
import axios from "axios";

const LoginPage = () => {
    return new Vue({
        el: "#login",
        data: {
            formData: {
                username: "",
                password: "",
            },
            errors: {}
        },
        methods: {
            submitForm() {
                axios.post(`/login`, this.formData, {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                }).then(({ res }) => {
                    location.reload();
                }).catch((err) => {
                    let errors = err.response.data.errors;
                    this.errors = errors;
                });
            },
            renderErrors(prop) {
                let errors = this.errors[prop] || [];
                let errorMsg = errors.join(",");
                return errorMsg;
            },
            hasError(prop) {
                return this.errors[prop] ? 'is-invalid' : '';
            }
        }
    });
}


export default LoginPage;
