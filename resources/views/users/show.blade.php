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
                                @if ($user->gewis_id)
                                    Yes,
                                    <small>({{ $user->gewis_id }})</small>
                                @else
                                    No.
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
