@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="card-box">
                <div class="card-title">
                    <h4>Params :</h4>
                </div>
                {{ Form::model($member->premium,['method' => 'PUT', 'url' => route('premium.update', compact('company','member')),'class' => 'form-horizontal']) }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('range','Range :',['class' => 'col-lg-3 control-label']) }}
                            <div class="col-lg-9">
                                <div class="col-xs-12">
                                    {{ Form::number('range',null,['class' => 'form-control', 'placeholder'=> 'Range','required','minlenght' => '3','maxlenght'=> '15']) }}
                                    @if($errors->has('range'))
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="text-warning">{{ $errors->first('range') }}</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('status','Status :',['class' => 'col-lg-3 control-label']) }}
                            <div class="col-lg-9">
                                <div class="col-xs-12">
                                    <select name="status" id="status" title="status" class="form-control" required>
                                        @foreach($statuses as $status)
                                            <option value="{{ $status->id }}" {{ ($status->id === $member->premium->status_id) ? 'selected' : ''}}>{{ $status->status }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('status'))
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="text-warning">{{ $errors->first('status') }}</span>
                                            </div>
                                        </div>
                                    @endif
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
