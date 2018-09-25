@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="card-box">
                <div class="card-title">
                    <h4>Create Products :</h4>
                </div>
                {{ Form::open(['method' => 'POST', 'url' => route('product.store', compact('company')),'class' => 'form-horizontal']) }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-focus">
                                    {{ Form::label('name','Name : ',['class'=>'control-label']) }}
                                    {{ Form::text('name',null,['class'=> 'form-control floating','required','maxlength'=>'50','minlength' => '3']) }}
                                </div>
                                @if($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-focus">
                                    {{ Form::label('tva','Tva : ',['class'=>'control-label']) }}
                                    {{ Form::number('tva',null,['class'=> 'form-control floating','required','maxlength'=>'50','minlength' => '3']) }}
                                </div>
                                @if($errors->has('tva'))
                                    <span class="text-danger">{{ $errors->first('tva') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-focus">
                                    {{ Form::label('qt','Qt : ',['class'=>'control-label']) }}
                                    {{ Form::number('qt',null,['class'=> 'form-control floating','required','maxlength'=>'50','minlength' => '3']) }}
                                </div>
                                @if($errors->has('qt'))
                                    <span class="text-danger">{{ $errors->first('qt') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-focus">
                                    {{ Form::label('size','Size : ',['class'=>'control-label']) }}
                                    {{ Form::text('size',null,['class'=> 'form-control floating',]) }}
                                </div>
                                @if($errors->has('size'))
                                    <span class="text-danger">{{ $errors->first('size') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-focus">
                                    {{ Form::label('description','Description : ',['class'=>'control-label']) }}
                                    {{ Form::textarea('description',null,['class'=> 'form-control floating']) }}
                                </div>
                                @if($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
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
