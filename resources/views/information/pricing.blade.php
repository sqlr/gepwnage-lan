@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 my-3">
                <h1>Pricing</h1>
                <p>
                    This LAN-party is meant primarily for
                    <a href="https://gewis.nl/" target="_blank" class="text-gewis">GEWIS</a>-members,
                    those who once were a member of GEWIS and those who are related to GEWIS in one way or another.
                    Other are still welcome to sign up.
                </p>
                <p>
                    The prices are subject to change, but we can assure you that they <b>won't go up</b>. Instead, we
                    will keep looking for ways to bring the price down or to include more free stuff.
                </p>
                <p>
                    Pricing information will be sent to participants via email.
                </p>
            </div>
            <div class="col-md-8 my-3">
                <h2>Studying GEWIS-Members</h2>
                <p>
                    The price for studying members of study association
                    <a href="https://gewis.nl/" target="_blank" class="text-gewis">GEWIS</a>
                    is <b>&euro; 20,-</b>.
                </p>
                <div class="row">
                    <div class="col-md-6 justify-content-center">
                        <p>Included:</p>
                        <ul>
                            <li>A place to sit: desk &amp; chair.</li>
                            <li>Access to the network.</li>
                            <li>Access to the internet.</li>
                            <li>Access to the sleeping area.</li>
                            <li>Free breakfast and lunch.</li>
                            <li>Free dinner on Friday evening.</li>
                            <li>Free dinner on Saturday evening.</li>
                            <li>Free drinks.</li>
                            <li>Free snacks.</li>
                            <li>One awesome experience.</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <p><b>Not</b> included:</p>
                        <ul>
                            <li>Stuff on the <a href="{{ route('information.packing-list') }}">packing list</a>.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8 my-3">
                <h2>Old GEWIS-Members, Non-Students, Friends, Family, Others</h2>
                <p>The price for non-GEWIS-members and non-students is <b>&euro; 30,-</b>.</p>
                <p>This gives you the same benefits as studying GEWIS-members.</p>
            </div>
            <div class="col-md-8 my-3">
                <h2>Visitors</h2>
                <p>Please refer to the <a href="{{ route('information.visitors') }}">visitors</a> page.</p>
            </div>
        </div>
    </div>
@endsection
