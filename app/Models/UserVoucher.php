<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVoucher extends Model
{
    use HasFactory;

    protected $table = 'user_vouchers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'voucher',
        'user_id'
    ];

    protected $hidden = [
        "user_id"
    ];

    public $timestamps = true;

}
