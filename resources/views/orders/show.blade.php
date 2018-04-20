@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @method('post')
                    @csrf

                    <div class="card-body">
                        <h3 class="card-title mb-4">{{ auth()->user()->name }}'s Ticket</h3>
                        <p>{{ $ticket->description }}</p>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Type</th>
                                <td>
                                    <a href="{{ route('tickets.show', $ticket) }}">
                                        {{ $ticket->name }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>{{ $order->price }}</td>
                            </tr>
                            <tr>
                                <th>Payment</th>
                                <td>
                                    <p>{{ ucfirst($order->status) }}</p>
                                    @if($order->status === \App\Order::STATUS_PENDING)
                                        <p>
                                            Please transfer
                                            &euro; <var>{{ money_format('%i', $ticket->price) }}</var><br/>
                                            to <var>NL21 INGB 0005 7403 93</var><br/>
                                            by names of <var>Hr PJA Bootsma, Hr W Mouwen</var><br/>
                                            mentioning <var>GEPWNAGE LAN A.0, order {{ $order->id }}</var><br/>
                                            as soon as possible.
                                        </p>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer text-center">
                        <img src="{{ asset('images/qr.svg') }}"/>
                    </div>
                </div>
            </div>
        </div>
@endsection
