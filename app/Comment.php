<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $primaryKey = 'rc_id';
    public $fillable = array();

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
    protected $table = 'review_comments';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */


}
