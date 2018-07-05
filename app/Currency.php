<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currency';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'title',
    ];

    public function lots()
    {
        return $this->hasMany('App\Lot');
    }
}
