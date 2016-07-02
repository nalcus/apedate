@extends('layouts.app')

@section('title')
    apedate | dashboard
@endsection

@section('content')
    <section class="row new-post">
      <div class="col-md-6 col-md-offset-3">
        <header>Dashboard</header>
        username:{{ Auth::user()->username }} <br>
        email:{{ Auth::user()->email }} <br>
        name: {{ Auth::user()->profile->name }} <br>
        age: {{ Auth::user()->profile->age }} <br>
        gender: {{ Auth::user()->profile->gender }} <br>
        location: {{ Auth::user()->profile->location }} <br>
        bio: {{ Auth::user()->profile->bio }}
      </div>
    </section>
@endsection
