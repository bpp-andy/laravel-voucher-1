@extends('layouts.app')

@section('content')
    <div class="container-fluid px-5" id="admin">
        <div class="mb-5  ">
            <button class="btn btn-success btn-md" v-on:click="exportVoucers">Export Vouchers to CSV</button>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <template v-for="( { name, email, username, vouchers, ...userdata}, idx ) in user_vouchers">
                    <div class="d-flex shadow-sm rounded border p-2 justify-content-between">
                        <div class=" my-auto">
                            <div>
                                <strong class="text-primary" v-html="name"></strong>
                            </div>
                            <div class="d-flex" style="gap:20px;">
                                <div>
                                    <span v-html="email"></span>
                                </div>
                                <div>
                                    <span v-html="username"></span>
                                </div>
                            </div>
                        </div>
                        <div class="my-auto">
                            <strong class="text-white badge bg-dark" v-html="countUserVoucher(vouchers)"></strong>
                        </div>
                    </div>
                </template>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">Generated Vouchers per Minute</div>
                    <div class="card-body">
                        <bar :chart-options="chartOptions" :chart-data="chartData" :width="chartWidth"
                            :height="chartHeight" />
                    </div>
                </div>
            </div>


        </div>

    </div>
    <script>
        window.page = "AdminPage";
    </script>
@endsection
