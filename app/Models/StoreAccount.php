<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreAccount extends Model
{
    use HasFactory;

    protected $table = "store_account";
    protected $primaryKey = 'account_id';



    protected $fillable = [
        'account_name',
    ];
}
