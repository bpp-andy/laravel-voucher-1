<?php

namespace App\Services;

use App\Models\{
    User
};
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Requests\UserData;

class UserManager
{
    public $vm;
    public function __construct(VoucherManager $vm){
        $this->vm = $vm;
    }

    public function save(UserData $data) : array
    {
        $dataset = $data->all();
        $dataset["password"] = Hash::make($dataset["password"]);
        $user = User::create($dataset);
        $voucher = $this->vm->addVoucher($user);
        return [
            "user" => $user,
            "voucher" => $voucher
        ];
    }

    public function getUserVouchers(){
        return User::with("vouchers")->get();
    }

}
