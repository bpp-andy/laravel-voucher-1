
import Vue from "vue";
import axios from "axios";

const validateEmail = (email) => {
    return String(email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
};

const RegisterPage = () => {
    return new Vue({
        el: "#register",
        data: {
            isLoading: false,
            formData: {
                username: "",
                name: "",
                email: "",
                password: "",
                password_confirmation: ""
            },
            errors: {}
        },
        watch: {
            'formData.email'(value) {
                delete this.errors.email;
                if (value && value != "" && !validateEmail(value)) {
                    this.errors.email = [
                        "Invalid Email."
                    ];
                }
            }
        },
        methods: {
            submitForm() {
                if (this.isLoading) return;
                this.isLoading = true;
                axios.post(`/register`, this.formData, {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                }).then(({ data }) => {
                    let link = document.createElement('a');
                    link.href = data.redirect;
                    link.click();
                }).catch((err) => {
                    let errors = err.response.data.errors;
                    this.errors = errors;
                    this.isLoading = false;
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


export default RegisterPage;
