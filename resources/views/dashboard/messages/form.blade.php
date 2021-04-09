<div class="row">

    {{-- name field --}}
    <div class="col-md-6">
        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
            {!! Form::label('name', 'الاسم :', ['class'=>'form-label']) !!}
            {!! Form::text('name', old('name'), ['class'=>'form-control',"placeholder"=>"الاسم"]) !!}

            @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{$errors->first('name')}}</strong>
            </span>
            @endif
        </div>
    </div>
    {{-- email field --}}
    <div class="col-md-6">
        <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
            {!! Form::label('email', 'البريد :', ['class'=>'form-label']) !!}
            {!! Form::text('email', old('slug'), ['class'=>'form-control',"placeholder"=>"البريد الالكتروني"]) !!}

            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{$errors->first('email')}}</strong>
            </span>
            @endif
        </div>
    </div>
    {{-- subject field --}}
    <div class="col-md-12">
        <div class="form-group {{$errors->has('subject') ? 'has-error' : ''}}">
            {!! Form::label('subject', ' الموضوع :', ['class'=>'form-label']) !!}
            {!! Form::text('subject', old('subject'), ['class'=>'form-control',"placeholder"=>"ملخص المقال"]) !!}

            @if ($errors->has('subject'))
            <span class="help-block">
                <strong>{{$errors->first('subject')}}</strong>
            </span>
            @endif
        </div>
    </div>
    {{-- msg field --}}
    <div class="col-md-12">
        <div class="form-group {{$errors->has('msg') ? 'has-error' : ''}}">
            {!! Form::label('msg', ' المقال :', ['class'=>'form-label']) !!}
            {!! Form::textarea('msg', old('content') , ['class'=>'form-control',"placeholder"=>"المقال"]) !!}

            @if ($errors->has('msg'))
            <span class="help-block">
                <strong>{{$errors->first('msg')}}</strong>
            </span>
            @endif
        </div>
    </div>
    {{-- status field --}}
    <div class="col-md-12">
        <div class="form-group {{$errors->has('status') ? 'has-error' : ''}}">
            {!! Form::label('status', ' الحالة :', ['class'=>'form-label']) !!}
            {!! Form::select('status', msg_status() , null , ['class'=>'form-control']) !!}

            @if ($errors->has('status'))
            <span class="help-block">
                <strong>{{$errors->first('status')}}</strong>
            </span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-1">
        <div class="form-group">
            <button class="btn btn-warning"><i class="fa fa-save"></i> تعديل</button>
        </div>
    </div>
</div>


@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"/>
@endpush
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(function(){

            // select2
            $('select').select2({
                placeholder: "حالة المقال",
                allowClear: true,
                language: "ar",
                dir:'rtl'
            });
            
        });
    </script>
@endpush