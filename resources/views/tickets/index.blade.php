@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1>Tickets</h1>

                <div class="row my-4">
                    @foreach ($tickets as $ticket)
                        @cannot('view', $ticket)
                            @continue
                        @endcannot

                        <div class="col-md-6">
                            <div class="card my-3 {{ $ticket->stock === 0 ? 'text-muted' : '' }}">
                                <div class="card-body">
                                    <span class="pull-right">&euro; {{ money_format('%i', $ticket->price) }}</span>
                                    <h5 class="card-title mb-4">{{ $ticket->name }}</h5>
                                    <div class="card-text">{{ str_limit($ticket->description, 140) }}</div>
                                </div>
                                @if($ticket->stock === 0)
                                    <div class="btn btn-outline-primary btn-block disabled">
                                        Sold Out
                                    </div>
                                @else
                                    <a href="{{ route('tickets.show', $ticket) }}"
                                       class="btn btn-outline-primary btn-block">
                                        Buy Ticket
                                    </a>
                                @endif
                                @if($ticket->stock !== null)
                                    <div class="card-footer text-right">
                                        <small>{{ $ticket->stock }} available</small>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
