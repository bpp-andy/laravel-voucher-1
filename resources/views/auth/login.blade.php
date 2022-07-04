@extends('layouts.app')

@section('content')
    <div class="container" id="login">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body py-4">
                        <form v-on:submit.prevent="submitForm">

                            <div class=" mx-auto col-md-6 mb-3">
                                <label class=" form-label  w-100">
                                    <span>Username</span>
                                    <input v-model="formData.username" :class="`form-control ${hasError('username')}`"
                                        type="username" required autocomplete="username" autofocus />
                                    <span class="invalid-feedback" role="alert">
                                        <strong v-html="renderErrors('username')"></strong>
                                    </span>
                                </label>
                            </div>

                            <div class=" mx-auto col-md-6 mb-3">
                                <label class=" form-label  w-100">
                                    <span>Password</span>
                                    <input v-model="formData.password" :class="`form-control ${hasError('password')}`"
                                        type="password" class="form-control" name="password" required
                                        autocomplete="password" />
                                    <span class="invalid-feedback" role="alert">
                                        <strong v-html="renderErrors('password')"></strong>
                                    </span>
                                </label>
                            </div>

                            <div class="col-md-6 mx-auto">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.page = "LoginPage";
    </script>
@endsection
