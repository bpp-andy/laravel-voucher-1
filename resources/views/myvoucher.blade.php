@extends('layouts.app')

@section('content')
    <div class="container" id="my-voucher">
        <div class="w-100 d-flex justify-content-between mb-5">
            <h1>
                Generated Vouchers
            </h1>
            <button class="btn btn-primary float-right" v-on:click="addVoucher">
                Add New Voucher
            </button>
        </div>
        <div class=" d-flex flex-column py-4 justify-content-center" style="gap:20px;">
            <template v-for="({id, voucher ,created_at}, idx) in vouchers">
                <div class="d-flex shadow-sm rounded border p-2 justify-content-between">
                    <div class=" my-auto">
                        <div>
                            <strong class="text-primary" v-html="voucher"></strong>
                        </div>
                        <div>
                            <span v-html="localDate(created_at)"></span>
                            <span v-html="localTime(created_at)"></span>
                        </div>
                        <div>
                            <small v-html="timeInterval(created_at)"></small>
                        </div>
                    </div>
                    <div class="my-auto">
                        <button class="btn btn-sm btn-danger" v-on:click="deleteVoucher({id, voucher})">x</button>
                    </div>
                </div>
            </template>
            <template>
                <div class="text-center" v-if="nextPage">
                    <button class="btn btn-secondary" v-on:click="loadMore">Load More</button>
                </div>
            </template>
        </div>
    </div>
    <script>
        window.page = "MyVoucher";
    </script>
@endsection
