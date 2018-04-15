@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{ $ticket->name }}</h1>

                <p>
                    <b>Payment</b><br/>
                    Amount: {{ $order->price }}<br/>
                    Status: {{ $order->status }}
                </p>

                <p>{{ $ticket->description }}</p>
            </div>
        </div>
    </div>
@endsection
