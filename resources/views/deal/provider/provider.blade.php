@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">

                <div class="col-xs-4 col-xs-offset-8 text-center m-b-30">
                    <?php $slug = $deal->slug; ?>
                    <a href="{{ route('provider.edit',compact('company','slug')) }}" class="btn btn-primary"><span>edit premium</span></a>
                </div>
        </div>
        <div class="card-box">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <a href="#"><span class="avatar">{{ substr($deal->name,0,1) }}</span></a>
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0 m-b-0">{{ ucfirst($deal->name) }}</h3>
                                        <h6 class="user-name m-t-0 m-b-0">{{ strtoupper($deal->slug) }}</h6>
                                        <div class="staff-msg"><a href="#" class="btn btn-primary">Send Message</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <span class="title">Phone:</span>
                                            <span class="text"><a href="#">{{ ($deal->tel)?$deal->tel:'' }}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">Email:</span>
                                            <span class="text"><a href="#">{{ ($deal->email)?$deal->email:'' }}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">Address:</span>
                                            <span class="text">
                                                {{ $deal->address }}{{ $deal->city->city }}
                                            </span>
                                        </li>
                                        <li>
                                            <span class="title">Created_at :</span>
                                            <span class="text">{{ $deal->created_at }}</span>
                                        </li>
                                        <li>
                                            <span class="title">updated_at :</span>
                                            <span class="text">{{ $deal->updated_at }}</span>
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
