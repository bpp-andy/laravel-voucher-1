<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\VoucherManager;

class UserVoucherController extends Controller
{
    public function index()
    {
        return view('myvoucher');
    }

    public function getVouchers(VoucherManager $vm)
    {
        return $vm->paginatedVouchers(Auth::user());
    }

    public function addVoucher(VoucherManager $vm)
    {
        $user = Auth::user();
        if($vm->canStillAdd($user)){
            $voucher = $vm->addVoucher($user);
            return response($voucher, 201);
        }else{
            return response([
                "message" => "Voucher Limit Reached"
            ], 422);
        }
    }

    public function removeVoucher(int $voucherID, VoucherManager $vm)
    {
        $vm->removeVoucher(Auth::user(), $voucherID);
        return response([
            "message" => "deleted"
        ], 200);
    }

}
