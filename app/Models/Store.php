<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Store extends Model
{
    use HasFactory;

    protected $table = "store";
    protected $primaryKey = 'store_id';



    protected $fillable = [
        'store_name',
        'account_id',
        'area_id',
        'is_active'
    ];

    public function StoreAccount(): BelongsTo {
        return $this->belongsTo(StoreAccount::class);
    }
    public function Area(): BelongsTo {
        return $this->belongsTo(StoreArea::class, 'area_id', 'area_id');
    }
}
