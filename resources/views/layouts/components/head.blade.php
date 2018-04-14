{{-- Functional meta tags --}}
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>

{{-- Branding --}}
<title>{{ config('app.name', 'GEPWNAGE LAN') }}</title>
<meta name="theme-color" content="#013370"/>

{{-- Scripts --}}
<script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>

{{-- Styles --}}
<link rel="stylesheet" href="{{ asset('css/app.css') }}"/>