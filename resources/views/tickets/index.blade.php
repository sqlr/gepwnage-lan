@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1>Tickets</h1>
                @guest
                    Log in first.
                @endguest

                @auth
                    @if(auth()->user()->orders_count > 0)
                        <div class="alert alert-info my-4">
                            <h4 class="alert-heading">Your Orders</h4>
                            <p>
                                You seem to have ordered a ticket before. Click
                                <a href="{{ route('orders') }}" class="alert-link">here</a>
                                to view your orders.
                            </p>
                        </div>
                    @endif

                    <div class="row my-4">
                        @foreach ($tickets as $ticket)
                            @cannot('view', $ticket)
                                @continue
                            @endcannot

                            <div class="col-md-6">
                                <div class="card my-3 {{ $ticket->sold_out ? 'text-muted' : '' }}">
                                    <div class="card-body">
                                        <span class="pull-right">&euro; {{ money_format('%i', $ticket->price) }}</span>
                                        <h5 class="card-title mb-4">{{ $ticket->name }}</h5>
                                        <div class="card-text">{{ str_limit($ticket->description, 280) }}</div>
                                    </div>
                                    @if($ticket->sold_out)
                                        <div class="btn btn-outline-primary btn-block disabled">
                                            Sold Out
                                        </div>
                                    @else
                                        <a href="{{ route('tickets.show', $ticket) }}"
                                           class="btn btn-outline-primary btn-block">
                                            @can('buy', $ticket)
                                                Buy Ticket
                                            @else
                                                View Ticket
                                            @endcan
                                        </a>
                                    @endif
                                    @if(!$ticket->unlimited_stock)
                                        <div class="card-footer text-right">
                                            <small>{{ $ticket->stock }} available</small>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endsection
