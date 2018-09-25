@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="card-box">
                <div class="card-title">
                    <h4>Params :</h4>
                </div>
                {{ Form::model($member,['method' => 'PUT', 'url' => route('params.update', compact('company','member')),'class' => 'form-horizontal']) }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('name','Identity :',['class' => 'col-lg-3 control-label']) }}
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        {{ Form::text('name',null,['class' => 'form-control', 'placeholder'=> 'First name','required','minlenght' => '3','maxlenght'=> '15']) }}
                                        @if($errors->has('name'))
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <span class="text-warning">{{ $errors->first('name') }}</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        {{ Form::email('email',$member->email->email,['class' => 'form-control', 'placeholder'=> 'Last name','required','minlenght' => '3','maxlenght'=> '15']) }}
                                        @if($errors->has('email'))
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <span class="text-warning">{{ $errors->first('email') }}</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('first_name','Name :',['class' => 'col-lg-3 control-label']) }}
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        {{ Form::text('first_name',null,['class' => 'form-control', 'placeholder'=> 'First name','required','minlenght' => '3','maxlenght'=> '15']) }}
                                        @if($errors->has('first_name'))
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <span class="text-warning">{{ $errors->first('first_name') }}</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        {{ Form::text('last_name',null,['class' => 'form-control', 'placeholder'=> 'Last name','required','minlenght' => '3','maxlenght'=> '15']) }}
                                        @if($errors->has('last_name'))
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <span class="text-warning">{{ $errors->first('last_name') }}</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('phone', 'Phone:',['class' => 'col-lg-3 control-label']) }}
                            <div class="col-lg-9">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            +212
                                        </span>
                                    {{ Form::tel('tel',$member->tel->tel,['class' => 'form-control', 'placeholder' => '06', 'minlenght' => '10', 'maxlenght' => '10']) }}
                                </div>
                                @if($errors->has('tel'))
                                    <span class="text-warning">{{ $errors->first('tel') }}</span>
                                @endif

                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('address','Address:',['class' => 'col-lg-3 control-label']) }}
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        {{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Address', 'minlenght' => '10','maxlenght' => '80']) }}
                                        @if($errors->has('address'))
                                            <span class="text-warning">{{ $errors->first('address') }}</span>
                                        @endif

                                    </div>
                                    <div class="col-md-6">
                                        <select name="city" id="city" class="form-control" required>
                                            <option value="{{ $member->city->id }}">{{ $member->city->city }}</option>
                                            @foreach(\App\City::all() as $city)
                                                <option value="{{ $city->id }}">{{ $city->city }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('city'))
                                            <span class="text-warning">{{ $errors->first('city') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('birth','Date de naissance:', ['class' => 'col-lg-3 control-label']) }}
                            <div class="col-lg-9">
                                {{ Form::date('birth',null,['class' => 'form-control','placeholder' => 'birth', 'required']) }}
                                @if($errors->has('birth'))
                                    <span class="text-warning">{{ $errors->first('birth') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('identity_select','Connect With:',['class' => 'col-lg-3 control-label']) }}
                            <div class="col-lg-9">
                                <select name="identity" id="identity_select" title="identity_select" class="form-control" required>
                                    <option value="name">name</option>
                                    <option value="email">email</option>
                                </select>
                                @if($errors->has('identity'))
                                    <span class="text-warning">{{ $errors->first('identity') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">
                        S'enregistré
                    </button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop
