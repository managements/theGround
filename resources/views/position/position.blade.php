@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            @if($edit)
                <div class="col-xs-4 col-xs-offset-8 text-center m-b-30">
                    <a href="{{ route('position.edit', compact('company', 'position')) }}" class="btn btn-primary"><span>edit position</span></a>
                    <a href="{{ route('position.destroy', compact('company', 'position')) }}" class="btn btn-danger"
                       onclick="event.preventDefault();
                                                     document.getElementById('delete-position').submit();"><span>delete position</span></a>
                    <form id="delete-position" action="{{ route('position.destroy',compact('company','position')) }}" method="POST" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            @endif
        </div>
        <div class="card-box">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <a href="#"><span class="avatar">{{ substr($position->last_name,0,1) }}</span></a>
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0 m-b-0">{{ ucfirst($position->last_name) . $position->first_name }}</h3>
                                        <h6 class="user-name m-t-0 m-b-0">{{ strtoupper($position->position) }}</h6>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <span class="title">Phone:</span>
                                            <span class="text"><a href="#">{{ (!is_null($tel =$position->tel)) ? $tel->tel : '' }}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">Email:</span>
                                            <span class="text"><a href="#">{{ (!is_null($email = $position->email)) ? $email->email : '' }}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">Address:</span>
                                            <span class="text">
                                                {{ $position->address . ' ' .  $position->city->city }}
                                            </span>
                                        </li>
                                        <li>
                                            <span class="title">Created_at :</span>
                                            <span class="text">{{ $position->created_at }}</span>
                                        </li>
                                        <li>
                                            <span class="title">updated_at :</span>
                                            <span class="text">{{ $position->updated_at }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
