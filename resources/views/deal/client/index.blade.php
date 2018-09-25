@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xs-4">
                <h4 class="page-title">clients</h4>
            </div>
            <div class="col-xs-8 text-right">
                <a href="{{ route('client.create',$company) }}" class="btn btn-primary">add client</a>
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
                        @foreach($clients as $client)
                            <tr>
                                <td><?php $slug = $client->slug; ?>
                                    <a href="{{ route('client.show',compact('company','slug')) }}" class="avatar">{{ substr($client->name,0,1) }}</a>
                                    <h2><a href="{{ route('client.show',compact('company', 'slug')) }}">{{ $client->name }} </a></h2>
                                </td>
                                <td>{{ ($client->email) ?$client->email:'' }}</td>
                                <td class="text-right">{{ ($client->tel)?$client->tel:'' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
