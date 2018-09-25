@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xs-4">
                <h4 class="page-title">Positions</h4>
            </div>
            <div class="col-xs-8 text-right">
                <a href="{{ route('position.create',compact('company')) }}" class="btn btn-primary"><i class="fa fa-plus"></i> add Position</a>
            </div>
        </div>
        <div class="row filter-row">
            <div class="col-sm-3 col-xs-6">
                <div class="form-group form-focus">
                    <label class="control-label">Employee Name</label>
                    <input type="text" class="form-control floating">
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <a href="#" class="btn btn-success btn-block"> Search </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                        <tr>
                            <th style="width:30%;">Name</th>
                            <th>Email</th>
                            <th class="text-right">Mobile</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($positions as $position)
                            <tr>
                                <td>
                                    <a href="{{ route('position.show',compact('company','position')) }}" class="avatar">{{ substr($position->last_name,0,1) }}</a>
                                    <h2><a href="{{ route('position.show',compact('company','position')) }}">{{ $position->last_name .' ' . $position->first_name }} <span>{{ $position->position }}</span></a></h2>
                                </td>
                                <td>{{ ($position->email) ? $position->email->email : 'NULL' }}</td>
                                <td class="text-right">{{ ($position->tel) ? $position->tel->tel :  'NULL' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
