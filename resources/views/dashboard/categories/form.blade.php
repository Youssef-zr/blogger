<div class="row">

        {{-- title field --}}
        <div class="col-md-3">
            <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                {!! Form::label('title', 'الصنف :', ['class'=>'form-label']) !!}
                {!! Form::text('title', old('title'), ['class'=>'form-control',"placeholder"=>"الصنف"]) !!}
    
                @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{$errors->first('title')}}</strong>
                </span>
                @endif
            </div>
        </div>
        {{-- slug field --}}
        <div class="col-md-3">
            <div class="form-group {{$errors->has('slug') ? 'has-error' : ''}}">
                {!! Form::label('slug', 'معرف الصنف :', ['class'=>'form-label']) !!}
                {!! Form::text('slug', old('slug'), ['class'=>'form-control',"placeholder"=>"معرف الصنف"]) !!}
    
                @if ($errors->has('slug'))
                <span class="help-block">
                    <strong>{{$errors->first('slug')}}</strong>
                </span>
                @endif
            </div>
        </div>
        {{-- meta tag field --}}
        <div class="col-md-6">
            <div class="form-group {{$errors->has('meta_tag') ? 'has-error' : ''}}">
                {!! Form::label('meta_tag', ' محرك البحث :', ['class'=>'form-label']) !!}
                {!! Form::text('meta_tag', old('slug'), ['class'=>'form-control',"placeholder"=>"كلمات دلالية لمحركات البحث"]) !!}
    
                @if ($errors->has('meta_tag'))
                <span class="help-block">
                    <strong>{{$errors->first('meta_tag')}}</strong>
                </span>
                @endif
            </div>
            <label class="label label-info" style="display: block;padding:8px 0 10px;font-size:15px"> يجب ألا يتجاوز طول النص 128 حرف حسب معايير google</label>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <button class="btn btn-warning btn-block"> حفظ <i class="fa fa-floppy-o float"></i></button>
            </div>
        </div>
</div>


@push('css')
    <style>
        .btn{
            position:relative;
            font-size: 16px
        }

        .btn i.float{
         margin-right: 10px
        }
    </style>
@endpush