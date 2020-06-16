<?php

namespace App\Model;

use App\Model\IncAndExp;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];


    public function incandexp()
    {
        return $this->hasOne(IncAndExp::class);
    }
}
