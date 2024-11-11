<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    //
    protected $guarded = [];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
