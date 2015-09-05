<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use DB;

class MovieinfoController extends Controller {


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function omdbUpdate($id) {

        if (Request::format() == 'json') {
        
        }

        $rev = Movie::find($id);

        $rev->fl_dir_ar_id      = Input::get('info.Director');
        $rev->fl_writer         = Input::get('info.Writer');
        //$rev->fl_stars          = Input::get('info.Actors');
        $rev->fl_outline        = Input::get('info.Plot');
        $rev->fl_genre          = Input::get('info.Genre');
        $rev->fl_duration       = Input::get('info.Runtime');
        $rev->fl_country        = Input::get('info.Country');

        $rev->fl_imdbID         = Input::get('info.imdbID');
        $rev->fl_imdbRating     = Input::get('info.imdbRating');
        $rev->fl_imdbVotes      = Input::get('info.imdbVotes');
        $rev->fl_metascore      = Input::get('info.Metascore');

        $rev->fl_tomatoConsensus= Input::get('info.tomatoConsensus');
        $rev->fl_tomatoMeter    = Input::get('info.tomatoMeter');
        $rev->fl_tomatoUserMeter= Input::get('info.tomatoUserMeter');

        $rev->save();

    }
}


/*
<div style="
    background-image: url(http://static1.squarespace.com/static/52f3400be4b07f023f307295/t/53a11261e4b0c1bc44859fd2/1403064929756/IMDB-logo.jpg);
    height: 50px;
    width: 50px;
    background-size: 100%;
    background-repeat: no-repeat;
"></div>

<div style="
    background-image: url(http://georgegaming.co.uk/wp-content/uploads/2015/03/Metacritic.svg_.png);
    height: 50px;
    width: 50px;
    background-size: 100%;
    background-repeat: no-repeat;
"></div>                    

<div style="
                            background-image: url(http://images.rottentomatoes.com/images/tomatometer/rt_lg.png?v=20110721);   
                            background-size: 50px;
                            background-position-y: 200px;
                            height: 50px;
                            width: 50px;
                        "></div>

*/