<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="description" content="McEasy"/>
<meta name="author" content="McEasy"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="shortcut icon" href="/favicon.ico">
<title>{{ $slot }} | {{ config('app.name', 'McEasy') }}</title>

<!-- ================== BEGIN BASE CSS STYLE ================== -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<link rel="stylesheet" href="{{ mix('assets/css/vendor.css') }}">
<link rel="stylesheet" href="{{ mix('assets/css/app.css') }}">
<!-- ================== END BASE CSS STYLE ================== -->
@stack('css')
@livewireStyles 