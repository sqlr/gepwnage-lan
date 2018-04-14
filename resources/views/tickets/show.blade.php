@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{ $ticket->name }}</h1>
                @if($ticket->sold_out)
                    <div class="alert alert-danger my-4">
                        <h4 class="alert-heading">Sold out!</h4>
                        <p>
                            Unfortunately we don't have this ticket in stock anymore.
                            Perhaps there are some tickets available on the
                            <a href="{{ route('tickets') }}" class="alert-link">tickets</a>
                            page.
                        </p>
                    </div>
                @endif

                <p>{{ $ticket->description }}</p>

                @can('buy', $ticket)
                    <form action="{{ route('tickets.buy', $ticket) }}" method="post">
                        @method('post')
                        @csrf

                        <button type="submit" class="btn btn-primary">Buy</button>
                    </form>
                @else
                    <div class="alert alert-warning my-4">
                        <h4 class="alert-heading">Unavailable.</h4>
                        <p>
                            You are unable to buy this ticket. It may be out of stock or you might already have a
                            ticket.
                        </p>
                    </div>
                @endcan
            </div>
        </div>
    </div>
@endsection
