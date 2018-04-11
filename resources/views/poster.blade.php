<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    {{-- Functional meta tags --}}
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=1920,height=1080"/>

    {{-- Branding --}}
    <title>{{ config('app.name', 'GEPWNAGE LAN') }}</title>

    {{-- Scripts --}}
    {{--<script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>--}}

    {{-- Styles --}}
    {{--<link rel="stylesheet" href="{{ asset('css/app.css') }}"/>--}}
    <style>
        * {
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #013370;
            background-image: url('{{ asset('images/header.jpg') }}');
            background-size: cover;
            color: #ffffff;
            font-family: monospace;
            font-size: 4em;
        }

        small {
            opacity: 0.5;
        }

        h1 {
            font-weight: normal;
        }

        .logos {
            display: block;
            float: left;
            clear: none;
            padding: 0.8em;
        }

        .logos img {
            height: 1.8em;
            margin-right: 0.5em;
        }

        .outer {
            display: table;
            position: absolute;
            height: 100%;
            width: 100%;
        }

        .middle {
            display: table-cell;
            vertical-align: middle;
        }

        .inner {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

    </style>

</head>
<body>

<div class="logos">
    <img src="{{ asset('images/logo_391x271.png') }}"/>
    <img src="{{ asset('images/gewis_full.png') }}" style="fill: #d40000;"/>
</div>

<div class="outer">
    <div class="middle">
        <div class="inner">
            <h1>GEPWNAGE <b>LAN</b> A.0</h1>

            <p>
                May 18-19-20, 2018
                <br/>
                Community Center de Ronde, Eindhoven
                <br/>
                <span style="font-size: 0.75em;">&euro; 20,-</span>
            </p>

            <p>
                <small>https://</small>
                <b>lan.gepwnage.nl</b>
                <small>/</small>
                @if ((new DateTime("2018-04-18 13:37:00"))->diff(new DateTime())->invert)
                    <br/>
                    <small>Registrations open April 18, 13:37h</small>
                @endif
            </p>
        </div>
    </div>
</div>

</body>
</html>