<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    protected $table = 'lot';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'currency_id',
    ];
}
