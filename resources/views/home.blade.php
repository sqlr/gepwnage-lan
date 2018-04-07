@extends('layouts.app')

@section('header')
    <div class="jumbotron jumbotron-home jumbotron-fluid text-center text-light py-5">
        <div class="py-5 my-5">
            <h1 class="display-3 font-weight-bold">
                {{ config('app.name') }}
            </h1>
            <h2>May 18-19-20, 2018</h2>
            <h3>Community Center de Ronde, Eindhoven</h3>
            <a href="{{ route('home') }}" class="btn btn-outline-light btn-lg mt-5">Sign up!</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <h2>GEPWNAGE Yearly LAN-Party</h2>
        <p>For the ninth time fraternity GEPWNAGE organises a LAN-party for the members of GEWIS. This weekend full of
            laughter and sleep deprivation is one you don't want to miss out on!</p>

        <h2>More Than Just Computer Games</h2>
        <p>Yes that's right, you thought it was just people shouting at computer screens, but screaming in someone's
            face directly happens too. We have board games, consoles, beer and soda, and other (non-digital) stuff for
            your entertainment.</p>

        <h2>No Need For Ginormous Computers</h2>
        <p>Did you know that your TU/e laptop doubles as a high-end gaming system? Half of the participants does not
            bring their massive computer to the LAN, they just use their laptop. Showcasing your amazing computer builds
            is not prohibited, though.</p>

        <h2>Socially Interactive Competitions</h2>
        <p>It is possible to survive the weekend without saying a word to anyone. However, to encourage social
            <del>awkwardness</del>
            interaction, multiple competitions will be held during the weekend. Can you handle a crowd watching your
            gameplay live?
        </p>

        <div align="center" class="py-5">
            <a href="{{ route('home') }}" class="btn btn-outline-primary btn-lg">Sign up!</a>
        </div>
    </div>
@endsection
