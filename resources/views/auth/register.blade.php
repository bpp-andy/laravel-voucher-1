@extends('layouts.app')

@section('content')
    <div class="container" id="register">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body py-5">
                        <form v-on:submit.prevent="submitForm">
                            @csrf

                            <div class=" mx-auto col-md-6 mb-3">
                                <label class=" form-label  w-100">
                                    <span>Full Name</span>
                                    <input v-model="formData.name" :class="`form-control ${hasError('name')}`"
                                        type="name" required autocomplete="name" autofocus />
                                    <span class="invalid-feedback" role="alert">
                                        <strong v-html="renderErrors('name')"></strong>
                                    </span>
                                </label>
                            </div>


                            <div class=" mx-auto col-md-6 mb-3">
                                <label class=" form-label  w-100">
                                    <span>Username</span>
                                    <input v-model="formData.username" :class="`form-control ${hasError('username')}`"
                                        type="username" required autocomplete="username" />
                                    <span class="invalid-feedback" role="alert">
                                        <strong v-html="renderErrors('name')"></strong>
                                    </span>
                                </label>
                            </div>


                            <div class=" mx-auto col-md-6 mb-3">
                                <label class=" form-label  w-100">
                                    <span>Email Address</span>
                                    <input v-model="formData.email" :class="`form-control ${hasError('email')}`"
                                        type="email" required autocomplete="email" />
                                    <span class="invalid-feedback" role="alert">
                                        <strong v-html="renderErrors('email')"></strong>
                                    </span>
                                </label>
                            </div>

                            <div class=" mx-auto col-md-6 mb-3">
                                <label class=" form-label  w-100">
                                    <span>Password</span>
                                    <input v-model="formData.password" :class="`form-control ${hasError('password')}`"
                                        type="password" required autocomplete="password" />
                                    <span class="invalid-feedback" role="alert">
                                        <strong v-html="renderErrors('password')"></strong>
                                    </span>
                                </label>
                            </div>

                            <div class=" mx-auto col-md-6 mb-3">
                                <label class=" form-label  w-100">
                                    <span>Confirm Password</span>
                                    <input v-model="formData.password_confirmation"
                                        :class="`form-control ${hasError('password_confirmation')}`" type="password"
                                        required autocomplete="password_confirmation" />
                                    <span class="invalid-feedback" role="alert">
                                        <strong v-html="renderErrors('password_confirmation')"></strong>
                                    </span>
                                </label>
                            </div>

                            <div class="col-md-6 mx-auto">
                                <button type="submit" class="btn btn-primary" :disabled="isLoading">
                                    <span v-if="isLoading">
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        <span>Loading...</span>
                                    </span>
                                    <span class="px-3" v-else>
                                        Register
                                    </span>
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.page = "RegisterPage";
    </script>
@endsection
