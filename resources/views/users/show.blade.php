@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-4">{{ $user->name }}</h1>

                <div class="card card-default">
                    <h5 class="card-header">
                        Personal Information
                    </h5>
                    <table class="table my-4">
                        <tbody>
                        <tr>
                            <th>Name</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email Address</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>GEWIS member</th>
                            <td>
                                {{ $user->gewis_id ?? 'No.' }}
                            </td>
                        </tr>
                        <tr>
                            <th>Ticket</th>
                            <td>
                                @if($user->order)
                                    <a href="{{ route('orders.show', $user->order) }}" class="btn btn-outline-primary">
                                        {{ $user->order->ticket->name }}
                                    </a>
                                @else
                                    No.
                                    <a href="{{ route('tickets') }}">Buy one.</a>
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="card-footer">
                        {{--<a href="#" class="btn btn-primary">Edit</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
