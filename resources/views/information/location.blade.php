@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <!--
                <div class="row justify-content-center text-center">
                    <div class="col-12 col-md-3 py-2">
                        <a href="#walking" class="btn btn-block btn-outline-gepwnage">
                            <i class="fa fa-street-view"></i> Walking
                        </a>
                    </div>
                    <div class="col-12 col-md-3 py-2">
                        <a href="#bicycle" class="btn btn-block btn-outline-gepwnage">
                            <i class="fa fa-bicycle"></i> Bike
                        </a>
                    </div>
                    <div class="col-12 col-md-3 py-2">
                        <a href="#public-transport" class="btn btn-block btn-outline-gepwnage">
                            <i class="fa fa-bus"></i> Public Transport
                        </a>
                    </div>
                    <div class="col-12 col-md-3 py-2">
                        <a href="#car" class="btn btn-block btn-outline-gepwnage">
                            <i class="fa fa-car"></i> Car
                        </a>
                    </div>
                </div>

                <hr/>
                -->

                <h1>Community Center de Ronde</h1>
                <p>The location of this year's LAN-party is <b>Community Center de Ronde</b>. Located within the ring
                    road of Eindhoven on the Tongelresestraat, it is host to several communities and weekly activities.
                    It will be host to the GEPWNAGE LAN for the fourth time in history.</p>

                <h2>Address</h2>
                <div class="row">
                    <div class="col-md-6 col-lg-7 my-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="embed-responsive embed-responsive-4by3">
                                    <iframe class="embed-responsive-item"
                                            src="{{ $google_maps_url }}"
                                            allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5 my-3">
                        <p>
                            <b>Community Center de Ronde</b><br/>
                            Tongelresestraat 146<br/>
                            5613 DP Eindhoven
                        </p>
                    </div>
                </div>

                <!--
                <hr/>

                <h2>Walking</h2>
                <h2>Bicycle</h2>
                <h2>Public Transport</h2>
                <h2>Car</h2>
                -->
            </div>
        </div>
    </div>
@endsection
