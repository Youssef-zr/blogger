<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/materia/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>

    {{-- cairo font --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet"> 
    
    {{-- custom style --}}
    <link rel="stylesheet" href="{{url('/assets/css/style.css')}}">
    
    {{-- css links --}}
    @yield('css')
    
    <title>
        أخبار اليوم
        @if (isset($title))
            |
            {{ $title }}
        @endif
    </title>
</head>
<body>

    {{-- spinner --}}
    <div id="app">
        <spinner></spinner>
    </div>
