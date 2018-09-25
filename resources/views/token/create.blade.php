@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-8">
                <div class="card-box text-right">
                    <span>Sold restant : {{ $company->premium->sold }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card-box">
                <div class="card-title">
                    <h4>create Token :</h4>
                </div>
                {{ Form::open(['method' => 'POST', 'url' => route('token.store',$company),'class' => 'form-horizontal']) }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('address','days :',['class' => 'col-lg-3 control-label']) }}
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        {{ Form::number('range', null, ['class' => 'form-control', 'placeholder' => 'Address', 'minlenght' => '10','maxlenght' => '80']) }}
                                        @if($errors->has('range'))
                                            <span class="text-warning">{{ $errors->first('range') }}</span>
                                        @endif

                                    </div>
                                    <div class="col-md-6">
                                        <select name="category" id="category" class="form-control" required>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('category'))
                                            <span class="text-warning">{{ $errors->first('category') }}</span>
                                        @endif
                                    </div>
                                </div>
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
