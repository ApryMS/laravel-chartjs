<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $table = "product";
    protected $primaryKey = 'product_id';
    

    protected $fillable = [
         'product_name', 'brand_id'
    ];

    public function Brand() : BelongsTo {
        return $this->belongsTo(ProductBrand::class);
    } 

}
