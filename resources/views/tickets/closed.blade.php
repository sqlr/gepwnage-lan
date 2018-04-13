@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Ticket sale closed</h1>

                <p>Sorry, but ticket sales are closed. We expect to open sales on:</p>
                <p class="lead m-4">
                    <b>{{ $opens->format('l F jS, Y, H:i:s') }}</b>,
                    <small><i>({{ $opens->tzName }})</i></small>
                </p>

                @auth
                    <p>
                        You are registered on this website. We will send you a reminder via email on the day the sales
                        start.
                    </p>
                @else
                    <p>
                        You can, however, register an account on this website. For members of GEWIS this requires
                        clicking two links and logging in at GEWIS once. We will then send you a reminder on the day
                        ticket sales open.
                    </p>
                    <p class="text-center">
                        <a href="{{ route('gewis.login') }}" class="btn btn-outline-gewis">Login via GEWIS</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-gepwnage">Register</a>
                    </p>
                @endauth
            </div>
        </div>
    </div>
    <div class="container bg-dark text-light p-4 p-md-5 my-md-5">
        <div class="row justify-content-center m-md-5">
            <div class="col-md-10">
                <h2 class="mb-4 text-muted">Teaser LAN 1.0</h2>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item"
                            src="https://www.youtube.com/embed/TPgBptIe2Zs?rel=0"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
