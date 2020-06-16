<?php

namespace App\Model;

use App\Model\Product;
use Illuminate\Database\Eloquent\Model;

class IncAndExp extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getTotalCostAttribute()
    {
        return ($this->quantity * $this->rate);
    }


    public function getAmountAttribute()
    {
        return ($this->quantity * $this->rate);
    }


}
