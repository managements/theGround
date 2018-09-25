@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xs-4 col-xs-offset-8 text-right m-b-30">
                <a href="{{ route('token.create',$company) }}" class="btn btn-primary"><i class="fa fa-plus"></i> add Token</a>
            </div>
            <div class="col-xs-4">
                <h4 class="page-title">Tokens</h4>
            </div>
            <div class="col-md-6 col-md-offset-2">
                <div class="card-box text-right">
                    <span>sold restant : {{ $company->premium->sold }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                        <tr>
                            <th style="width:30%;">token</th>
                            <th>category</th>
                            <th>range</th>
                            <th class="text-right">action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tokens as $token)
                            <tr>
                                <td>{{ $token->token }}</td>
                                <td>{{ $token->category->category }}</td>
                                <td>{{ $token->range }}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                           aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="#" data-toggle="modal"
                                                   data-target="#delete_{{ $token->id }}"><i
                                                        class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @foreach($tokens as $token)
            <div id="delete_{{ $token->id }}" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content modal-md">
                        <div class="modal-header">
                            <h4 class="modal-title">Delete <span class="text-danger">Token</span></h4>
                        </div>
                        <div class="modal-body card-box">
                            <p>Are you sure want to delete this token?</p>
                            <div class="m-t-20"><a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                                <a href="#" class="btn btn-danger"
                                   onclick="event.preventDefault();
                                       document.getElementById('{{ 'delete_token-' . $token->id}}').submit();">
                                    {{ __('delete') }}
                                </a>
                                {{ Form::open(['method' => 'delete', 'url' => route('token.destroy',compact('company','token')), 'id' => 'delete_token-' . $token->id, 'style' => 'display: none;']) }}
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
