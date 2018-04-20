@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Participants</h1>

                <p>A list of your colleague gamers!</p>

                <ul>
                    @foreach($orders as $order)
                        <li>
                            {{ $order->user->name }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
