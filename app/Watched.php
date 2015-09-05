<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watched extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $guarded = array();

    /**
     * The database table used by the model.
     *
     * @var string
     */
    public static $rules = array();

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_watched';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $timestamps = false;

}
