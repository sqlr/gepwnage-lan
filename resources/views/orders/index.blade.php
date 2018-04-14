@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>My Orders</h1>

                <table class="table my-5">
                    <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Ticket</th>
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($orders->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center">
                                No tickets found. Buy your tickets
                                <a href="{{ route('tickets') }}" class="font-weight-bold">here</a>.
                            </td>
                        </tr>
                    @endif
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->ticket->name }}</td>
                            <td>&euro; {{ money_format('%i', $order->price) }}</td>
                            <td>{{ $order->status }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
