<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaCode extends Model
{
    use HasFactory;

    public $table = 'area_codes';

    protected $fillable = ['area_code'];

    public function Tax()
    {
        return $this->belongsTo(Tax::class);
    }
}
