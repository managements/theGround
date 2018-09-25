@extends('layouts.guest')

@section('content')
    <div class="container">
        <h3 class="account-title">{{ __('register') }}</h3>

        <div class="row">
            <div class="col-md-12">
                {{ Form::open(['method' => 'POST', 'url' => route('register'),'class' => 'form-horizontal']) }}
                <div class="card-box">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title">Personal details</h4>
                            <div class="form-group">
                                {{ Form::label('name','Name :',['class' => 'col-lg-3 control-label']) }}
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
                                        {{ Form::tel('tel',null,['class' => 'form-control', 'placeholder' => '06', 'minlenght' => '10', 'maxlenght' => '10']) }}
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
                                            {{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Address', 'required', 'minlenght' => '10','maxlenght' => '80']) }}
                                            @if($errors->has('address'))
                                                <span class="text-warning">{{ $errors->first('address') }}</span>
                                            @endif

                                        </div>
                                        <div class="col-md-6">
                                            <select name="city" id="city" class="form-control" required>
                                                <option value="">City</option>
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
                                    {{ Form::date('birth',gmdate('Y-m-d',strtotime("-18 years")),['class' => 'form-control','placeholder' => 'birth', 'required']) }}
                                    @if($errors->has('birth'))
                                        <span class="text-warning">{{ $errors->first('birth') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="card-title">Account Details</h4>

                            <div class="form-group">
                                {{ Form::label('identity', 'Identity:', ['class' => 'col-lg-3 control-label']) }}
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            {{ Form::text('name',null,['class' => 'form-control', 'placeholder' => 'name','required','minlenght' => '3','maxlenght' => '15']) }}
                                            @if($errors->has('name'))
                                                <span class="text-warning">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            {{ Form::email('email',null,['class' => 'form-control', 'placeholder' => 'email','required','minlenght' => '5','maxlenght' => '80']) }}
                                            @if($errors->has('email'))
                                                <span class="text-warning">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('password', 'Password:', ['class' => 'col-lg-3 control-label']) }}
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            {{ Form::password('password',['class' => 'form-control', 'placeholder' => 'Password','required','minlenght' => '6','maxlenght' => '80']) }}
                                            @if($errors->has('password'))
                                                <span class="text-warning">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            {{ Form::password('password_confirmation',['class' => 'form-control', 'placeholder' => 'Password Confirmation','required','minlenght' => '6','maxlenght' => '80']) }}
                                            @if($errors->has('password_confirmation'))
                                                <span class="text-warning">{{ $errors->first('password_confirmation') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('token','Token',['class' => 'col-lg-3 control-label']) }}
                                <div class="col-lg-9">
                                    {{ Form::text('token', null, ['class' => 'form-control', 'placeholder' => 'Token', 'required', 'minlenght' => '10']) }}
                                    @if($errors->has('token'))
                                        <span class="text-warning">{{ $errors->first('token') }}</span>
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
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
