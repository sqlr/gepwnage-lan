@extends('layouts.app')

@section('header')
    <div class="jumbotron jumbotron-home jumbotron-fluid text-center text-light py-5">
        <div class="py-5 my-5">
            <h1 class="display-4 font-weight-bold">
                {{ config('app.name') }}
            </h1>
            <h2>May 18-19-20, 2018</h2>
            <h3>Community Center de Ronde, Eindhoven</h3>
            <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg mt-5">Sign up!</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 pr-md-4 pb-4">
                <div class="carousel slide img-thumbnail" data-interval="3000" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('images/photos/room.jpg') }}"/>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('images/photos/laptops.jpg') }}"/>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('images/photos/pizza.jpg') }}"/>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('images/photos/beerpong.png') }}"/>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('images/photos/boom.jpg') }}"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h2>GEPWNAGE Yearly LAN-Party</h2>
                <p>For the tenth time fraternity GEPWNAGE organises a LAN-party for the members of GEWIS. This weekend
                    full of laughter and sleep deprivation is one you don't want to miss out on!</p>
                <br/>
                <h2>More Than Just Computer Games</h2>
                <p>Yes that's right, you thought it was just people shouting at computer screens, but screaming in
                    someone's face directly is fun too. We have board games, consoles, beer and soda, and other
                    (non-digital) stuff for your entertainment.</p>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-6">
                <h2>No Need For Ginormous Computers</h2>
                <p>Did you know that your TU/e laptop doubles as a high-end gaming system? Half of the participants does
                    not bring their massive computer to the LAN, they just use their laptop. Showcasing your amazing
                    computer builds is not prohibited, though.</p>
                <br/>
                <h2>Socially Interactive Competitions</h2>
                <p>It is possible to survive the weekend without saying a word to anyone. However, to encourage social
                    <del>awkwardness</del>
                    interaction, multiple competitions will be held during the weekend. Can you handle a crowd watching
                    your gameplay live?
                </p>
            </div>
            <div class="col-md-6 pl-md-4 pb-4">
                <img src="{{ asset('images/photos/couch.jpg') }}" class="img-fluid img-thumbnail">
            </div>
        </div>

        <div align="center">
            <a href="{{ route('register') }}" class="btn btn-outline-gepwnage btn-lg">Sign up!</a>
        </div>
    </div>
@endsection
