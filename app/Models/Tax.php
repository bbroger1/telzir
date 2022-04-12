<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;

    public $table = 'taxes';

    protected $fillable = ['origin_code', 'destiny_code', 'price'];

    public function AreaCode()
    {
        $this->hasOne(AreaCode::class);
    }
}
