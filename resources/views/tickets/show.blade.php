@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1>{{ $ticket->name }}</h1>

                <form action="{{ route('tickets.buy', $ticket) }}" method="post">
                    @method('post')
                    @csrf

                    <button type="submit" class="btn btn-primary">Buy</button>
                </form>
            </div>
        </div>
    </div>
@endsection
