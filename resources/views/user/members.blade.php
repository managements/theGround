@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xs-4">
                <h4 class="page-title">Members</h4>
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
                        @foreach($members as $member)
                            <tr>
                                <td>
                                    <a href="{{ route('profile',compact('company','member')) }}" class="avatar">{{ substr($member->name,0,1) }}</a>
                                    <h2><a href="{{ route('profile',compact('company', 'member')) }}">{{ $member->last_name .' ' . $member->first_name }} <span>{{ $member->category->category }}</span></a></h2>
                                </td>
                                <td>{{ $member->email->email }}</td>
                                <td class="text-right">{{ $member->tel->tel }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
