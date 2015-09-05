@extends('master')

@section('meta')
<title>Berdict - short movie reviews from your friends and critics.</title>
<meta name="title" content="Berdict - Short movie reviews from your friends and critics.">
<meta name="description" content="Berdict shows you short movie reviews of 400 characters from you friends and critics.">
<meta name="keywords" content="movies, films, film reviews, critic reviews, movie reviews, berdict,berdict.com">
<meta name="image" content="{{Config::get('url.home')}}berdict/img/main_index.png"/>
<meta property='og:image' content="{{Config::get('url.home')}}berdict/img/main_index.png" />
@stop


@section('container')

<div class="container">
  <div class="row">
    <div class="col-md-9" style="border:1px solid #333;height:100px;">
      
    </div>
    <div class="col-md-3" style="border:1px solid #333;">
      
    </div>    
  </div>
</div>


@stop

@section('extra')
@stop
