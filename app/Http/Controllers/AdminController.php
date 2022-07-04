<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\UserManager;
use App\Services\VoucherManager;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function datasets(VoucherManager $vm, UserManager $um){
        return response([
            "user_vouchers" => $um->getUserVouchers(),
            "vouchers" => $vm->allVouchers()
        ], 200);
    }
}
