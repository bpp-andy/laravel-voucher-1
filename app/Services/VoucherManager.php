<?php

namespace App\Services;

use App\Models\{
    UserVoucher, User
};
use Illuminate\Support\Str;

class VoucherManager
{

    public $maxVoucher = 10;

    public function generateVoucher() : string
    {
        $voucher = Str::random(12);
        $existing = UserVoucher::where(['voucher' => $voucher])->count();
        if($existing > 0){
            return self::generateVoucher();
        }
        return $voucher;
    }

    public function addVoucher(User $user)
    {
        return UserVoucher::create([
            "voucher" => $this->generateVoucher(),
            "user_id" => $user->id,
        ]);
    }

    public function canStillAdd(User $user) : bool
    {
        $existing = UserVoucher::where(["user_id" => $user->id])->count();
        return $existing < $this->maxVoucher;
    }

    public function removeVoucher(User $user,int $id)
    {
        UserVoucher::where([
            "id" => $id,
            "user_id" => $user->id
        ])->delete();
    }

    public function paginatedVouchers(User $user, int $perPage = 5)
    {
        return UserVoucher::where([
            "user_id" => $user->id
        ])
        ->orderByDesc('created_at')
        ->paginate(
            $perPage, $columns = ['id', 'voucher', 'created_at'], $pageName = "userVouchers"
        );
    }

    public function allVouchers()
    {
        return UserVoucher::all();
    }

}
