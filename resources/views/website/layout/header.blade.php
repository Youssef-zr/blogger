<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/materia/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>

    {{-------------------- seo  -----------------------}}
    {{-- title --}}
    @if (!isset($title))
        <title>
            أخبار اليوم
        </title>
        <meta property="og:title" content="أخبار اليوم - أخبار العالم بين يديك">
    @else
        <title>
            أخبار اليوم
            |
            {{ $title }}
        </title>
        <meta property="og:title" content="أخبار اليوم - {{ $title }}">
    @endif
    
    {{-- language --}}
    <meta property="og:locale" content="ar_AR">
    
    {{-- type --}}
    <meta property="og:type" content="website">
    
    {{-- description --}}
    <meta name="description" content="موقع أخبار اليوم البوابة الإخبارية القريبة اليكم آخر الأخبار الجهوية والوطنية لحظة حدوثها تابعونا">
    
    @if (isset($seo_description))
        <meta property="og:description" content="{{$seo_description}}">
    @endif

    {{-- keywords --}}
    <meta name="keywords" content="أخبارنا,أخبار المغرب,أخبار اليوم,أخبار اليوم في المغرب,أخبار المغرب العاجلة,أخبار المغرب الآن,المغرب اخبار الساعة,المغرب اخبار يومية,أخبار المغرب يومية الكترونية,اخبار المغرب لحظة بلحظة,اخبار الصحف المغربة,اخر اخبار السياسة بالمغرب ">

    {{-- cairo font --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet"> 
    
    {{-- custom style --}}
    <link rel="stylesheet" href="{{url('/assets/css/style.css')}}">
    
    {{-- css links --}}
    @yield('css')
    
</head>
<body>

    {{-- spinner --}}
    <div id="app">
        <spinner></spinner>
    </div>
