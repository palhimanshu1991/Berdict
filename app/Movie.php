<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model {

    protected $guarded = array();
    public static $rules = array();
    public $primaryKey = 'fl_id';
    protected $table = 'film';
    public $timestamps = false;

}
