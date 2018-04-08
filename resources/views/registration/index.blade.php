@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1>{{ config('app.name') }}</h1>
                <hr/>
                <p>Are you ready to enlist for the experience of a lifetime?</p>
                <div class="form-check py-4">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" checked disabled/>
                        <em>I am ready.</em>
                    </label>
                </div>
                <p>Of course you are. Second question: Are you a member of
                    <a href="https://gewis.nl/" class="text-gewis">GEWIS</a>?</p>
            </div>
        </div>
        <br/>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="registration-accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-lg btn-success btn-block collapsed"
                                        data-toggle="collapse" data-target="#registration-gewis">
                                    Yes, I am a GEWIS member.
                                </button>
                            </h5>
                        </div>

                        <div id="registration-gewis" class="collapse" data-parent="#registration-accordion">
                            <div class="card-body">
                                @include('registration.form-gewis')
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-outline-dark btn-block collapsed"
                                        data-toggle="collapse" data-target="#registration-external">
                                    No, I want to register as external.
                                </button>
                            </h5>
                        </div>
                        <div id="registration-external" class="collapse" data-parent="#registration-accordion">
                            <div class="card-body">
                                @include('registration.form-external')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
