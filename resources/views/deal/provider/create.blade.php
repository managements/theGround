@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="card-box">
                <div class="card-title">
                    <h4>create Providers :</h4>
                </div>
                {{ Form::open(['method' => 'POST', 'url' => route('provider.store', compact('company')),'class' => 'form-horizontal']) }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-6">
                                {{ Form::text('name',null,['class' => 'form-control', 'placeholder'=> 'name','required','minlenght' => '3','maxlenght'=> '15']) }}
                                @if($errors->has('name'))
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <span class="text-warning">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                {{ Form::email('email',null,['class' => 'form-control', 'placeholder'=> 'email','required','minlenght' => '3','maxlenght'=> '15']) }}
                                @if($errors->has('email'))
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <span class="text-warning">{{ $errors->first('email') }}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                {{ Form::text('tel',null,['class' => 'form-control', 'placeholder'=> 'tel','required','minlenght' => '3','maxlenght'=> '15']) }}
                                @if($errors->has('tel'))
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <span class="text-warning">{{ $errors->first('tel') }}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                {{ Form::text('speaker',null,['class' => 'form-control', 'placeholder'=> 'speaker','required','minlenght' => '3','maxlenght'=> '15']) }}
                                @if($errors->has('speaker'))
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <span class="text-warning">{{ $errors->first('speaker') }}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                {{ Form::text('address',null,['class' => 'form-control', 'placeholder'=> 'address','minlenght' => '3','maxlenght'=> '15']) }}
                                @if($errors->has('address'))
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <span class="text-warning">{{ $errors->first('address') }}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-2">
                                {{ Form::text('build',null,['class' => 'form-control', 'placeholder'=> 'speaker']) }}
                                @if($errors->has('build'))
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <span class="text-warning">{{ $errors->first('build') }}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-2">
                                {{ Form::text('floor',null,['class' => 'form-control', 'placeholder'=> 'floor']) }}
                                @if($errors->has('floor'))
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <span class="text-warning">{{ $errors->first('floor') }}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-2">
                                {{ Form::text('apt_nbr',null,['class' => 'form-control', 'placeholder'=> 'apt_nbr']) }}
                                @if($errors->has('apt_nbr'))
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <span class="text-warning">{{ $errors->first('apt_nbr') }}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <select name="city" id="city" class="form-control" required>
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
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">
                        create
                    </button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop
