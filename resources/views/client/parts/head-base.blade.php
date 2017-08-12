<meta charset="UTF-8">
<title>@yield('title', 'Theoreo')</title>
<base href="{{ env('APP_URL', 'http://localhost') }}/" />

<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<meta property="og:site_name" content="Theoreo" />
<meta property="og:title" content="" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ env('APP_URL', 'http://localhost') }}" />
<meta property="og:image" content="/img/icon/apple-touch-icon.png" />
<meta property="og:description" content="" />

<link rel="apple-touch-icon"  href="{{ asset('img/icon/apple-touch-icon.png') }}">
<link rel="shortcut icon" href="{{ asset('img/icon/favicon.ico') }}" type="image/x-icon">
<link rel="icon" type="image/png" href="{{ asset('img/icon/favicon.png') }}" />
<link href="{{ asset('css/clear.min.css') }}?{{ sha1(microtime(true)) }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/style.css') }}?{{ sha1(microtime(true)) }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/responsive.css') }}?{{ sha1(microtime(true)) }}" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}">

<script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}" type="text/javascript"></script>