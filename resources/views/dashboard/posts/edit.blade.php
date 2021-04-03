@extends('dashboard.layouts.master')

@section('braidcrump')
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
    لوحة تحكم المدير
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{adminurl('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="{{adminUrl('posts')}}"> <i class="fa fa-users"></i> المقالات</a></li>
        <li class="active">{{ $title }}</li>
    </ol>
    </section>
@endsection

@section('content')

<div class="box">
    <div class="box-header">
        <h3>{{$title}}</h3>
    </div>
    <div class="box-body">
        <form action="" ></form>

        {!! Form::model($post,['route'=>['posts.update',$post->id],'method'=>'PUT','files'=>true]) !!}
            @include('dashboard.posts.form')
        {!! Form::close() !!}
    </div>
</div>

@endsection