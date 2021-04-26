@extends('/website/layout/master')

@section('content')
    <div class="contact text-right">
        <div class="header mb-3">
            <h3 class="bg-success text-white py-2 pr-3" style="font-size: 18px"><i class="fa fa-share" aria-hidden="true"></i> اتصل بنا</h3>
        </div>

        <form action="{{url('contact')}}" method="post">
            @csrf
            @method('post')

            <div class="mt-4 form-group {{$errors->has('name') ? 'has-error' : ''}}">
                <div class="d-flex align-items-center">
                    {!! Form::label('name', "الاسم", ['class'=>"form-label badge bg-success text-white"]) !!}
                    <i class="text-danger fa fa-2x mr-1">*</i>
                </div>

                {!! Form::text('name', old('name'), ['class'=>'form-control','placeholder'=>'أدخل اسمك الشخصي']) !!}

                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{$errors->first('name')}}</strong>
                </span>
                @endif
            </div>

            <div class="mt-4 form-group {{$errors->has('email') ? 'has-error' : ''}}">
                <div class="d-flex align-items-center">
                    {!! Form::label('email', "البريد الالكتروني", ['class'=>"form-label badge bg-success text-white"]) !!}
                    <i class="text-danger fa fa-2x mr-1">*</i>
                </div>

                {!! Form::email('email', old('email'), ['class'=>'form-control','placeholder'=>'أدخل بريدك الالكتروني']) !!}
                
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{$errors->first('email')}}</strong>
                </span>
                @endif
            </div>

            <div class="mt-4 form-group {{$errors->has('subject') ? 'has-error' : ''}}">
                <div class="d-flex align-items-center">
                    {!! Form::label('subject', "الموضوع", ['class'=>"form-label badge bg-success text-white"]) !!}
                    <i class="text-danger fa fa-2x mr-1">*</i>
                </div>
                {!! Form::text('subject', old('subject'), ['class'=>'form-control','placeholder'=>'موضوع الرسالة']) !!}

                @if ($errors->has('subject'))
                <span class="help-block">
                    <strong>{{$errors->first('subject')}}</strong>
                </span>
                @endif
            </div>

            <div class="mt-4 form-group {{$errors->has('msg') ? 'has-error' : ''}}">
                <div class="d-flex align-items-center">
                    {!! Form::label('msg', "الرسالة", ['class'=>"form-label badge bg-success text-white"]) !!}
                    <i class="text-danger fa fa-2x mr-1">*</i>
                </div>

                {!! Form::textarea('msg', old('msg'), ['class'=>'form-control','placeholder'=>'أدخل محتوى الرسالة']) !!}
                
                @if ($errors->has('msg'))
                <span class="help-block">
                    <strong>{{$errors->first('msg')}}</strong>
                </span>
                @endif
            </div>
            <div class="form-group mt-3">
                <button class="btn btn-success btn-block"><i class="fa fa-send"></i> أرســـــــل</button>
            </div>
        </form>
    </div>
@endsection

@section('css')

    <style>
        form{
            border:1px solid #4caf50;
            border-left-width: 5px;
            border-left-color: #4caf50;
            padding:10px 15px 5px;
            border-radius: 0 5px 5px 0;
        }
        .form-label{
            direction:ltr !important
        }
        .btn{
            padding:8px 0 12px;
            font-size: 18px
        }

        .form-group.has-error label {
            color: #dd4b39;
        }

        .has-error .help-block, .has-error .control-label, .has-error .radio, .has-error .checkbox, .has-error .radio-inline, .has-error .checkbox-inline, .has-error.radio label, .has-error.checkbox label, .has-error.radio-inline label, .has-error.checkbox-inline label {
            color: #dd4b39;
        }

        .form-group.has-error .form-control {
            border-bottom:1px solid #dd4b39;
            box-shadow: none;
        }

        .help-block {
            display: block;
            margin-top: 5px;
            margin-bottom: 10px;
            color: #737373;
        }
    </style>

@endsection