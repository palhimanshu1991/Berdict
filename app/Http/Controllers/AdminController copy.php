<?php

class MovieinfoController extends BaseController {


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
        $rev->fl_stars          = Input::get('info.Actors');
        $rev->fl_outline        = Input::get('info.Plot');
        $rev->fl_genre          = Input::get('info.Genre');
        $rev->fl_duration       = Input::get('info.Runtime');
        $rev->fl_country        = Input::get('info.Country');

        $rev->fl_imdbID         = Input::get('info.imdbID');
        $rev->fl_imdbRating     = Input::get('info.imdbRating');
        $rev->fl_imdbVotes      = Input::get('info.imdbVotes');
        $rev->fl_metascore      = Input::get('info.Metascore');


        $rev->save();

    }
}
