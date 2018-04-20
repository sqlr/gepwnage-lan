@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Ticket</h1>
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
                <br/>

                <form action="{{ route('tickets.buy', $ticket) }}" method="post">
                    <div class="card">
                        @method('post')
                        @csrf

                        <div class="card-body">
                            <span class="pull-right">&euro; {{ money_format('%i', $ticket->price) }}</span>
                            <h3 class="card-title mb-4">{{ $ticket->name }}</h3>
                            <p>{{ $ticket->description }}</p>
                        </div>
                        <div class="card-body text-center">
                            @can('buy', $ticket)
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="agree" value="1" required/>
                                        I agree to the costs of buying this ticket.
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary px-5">Buy</button>
                            @else
                                <div class="alert alert-warning my-4">
                                    <h4 class="alert-heading">Unavailable.</h4>
                                    <p>
                                        You are unable to buy this ticket. It may be out of stock or you might already
                                        have a ticket.
                                    </p>
                                </div>
                            @endcan
                        </div>
                        @if(!$ticket->unlimited_stock)
                            <div class="card-footer text-right">
                                <small>{{ $ticket->stock }} available</small>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
