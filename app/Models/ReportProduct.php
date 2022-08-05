<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReportProduct extends Model
{
    use HasFactory;

    protected $table = "report_product";
    protected $primaryKey = 'report_id';



    protected $fillable = [
        'store_id',
        'product_id',
        'compliance',
        'tanggal',
    ];

    public function Store() : BelongsTo {
        return $this->belongsTo(Store::class);
    }
    public function Product() : BelongsTo {
       return $this->belongsTo(Product::class);
    }

}
