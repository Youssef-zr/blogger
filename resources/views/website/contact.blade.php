@extends('/website/layout/master')

@section('content')
    <div class="contact text-right">
        <div class="header mb-5">
            <h3 class="bg-primary text-white py-2 pr-3" style="font-size: 18px"><i class="fa fa-share" aria-hidden="true"></i> اتصل بنا</h3>
        </div>

        <form action="{{url('contact')}}" method="post">
            @csrf
            @method('post')

            <div class="mt-4 form-group {{$errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', ": الاسم", ['class'=>"form-label badge bg-primary text-white"]) !!}
                {!! Form::text('name', old('name'), ['class'=>'form-control','placeholder'=>'أدخل اسمك الشخصي']) !!}

                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{$errors->first('name')}}</strong>
                </span>
                @endif
            </div>

            <div class="mt-4 form-group {{$errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email', ": البريد الالكتروني", ['class'=>"form-label badge bg-primary text-white"]) !!}
                {!! Form::email('email', old('email'), ['class'=>'form-control','placeholder'=>'أدخل بريدك الالكتروني']) !!}
                
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{$errors->first('email')}}</strong>
                </span>
                @endif
            </div>

            <div class="mt-4 form-group {{$errors->has('subject') ? 'has-error' : ''}}">
                {!! Form::label('subject', ": الموضوع", ['class'=>"form-label badge bg-primary text-white"]) !!}
                {!! Form::text('subject', old('subject'), ['class'=>'form-control','placeholder'=>'موضوع الرسالة']) !!}

                @if ($errors->has('subject'))
                <span class="help-block">
                    <strong>{{$errors->first('subject')}}</strong>
                </span>
                @endif
            </div>

            <div class="mt-4 form-group {{$errors->has('msg') ? 'has-error' : ''}}">
                {!! Form::label('msg', " : الرسالة", ['class'=>"form-label badge bg-primary text-white"]) !!}
                {!! Form::textarea('msg', old('msg'), ['class'=>'form-control','placeholder'=>'الرسالة']) !!}
                
                @if ($errors->has('msg'))
                <span class="help-block">
                    <strong>{{$errors->first('msg')}}</strong>
                </span>
                @endif
            </div>
            <div class="form-group mt-4">
                <button class="btn btn-primary btn-block"><i class="fa fa-send"></i> أرسل</button>
            </div>
        </form>
    </div>
@endsection

@section('css')

    <style>
        form{
            border:1px solid #2196f3;
            border-left-width: 5px;
            border-left-color: #2196f3;
            padding:15px;
            border-radius: 0 5px 5px 0;
        }
        .form-label{
            direction:ltr !important
        }
        .btn{
            padding:8px;
            font-size: 20px
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