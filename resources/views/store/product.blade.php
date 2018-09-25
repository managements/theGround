@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xs-4 col-xs-offset-8 text-center m-b-30">
                <a href="{{ route('product.edit', compact('company', 'product')) }}" class="btn btn-primary"><span>edit position</span></a>
                <a href="{{ route('product.destroy', compact('company', 'product')) }}" class="btn btn-danger"
                   onclick="event.preventDefault();
                                                     document.getElementById('delete-position').submit();"><span>delete position</span></a>
                <form id="delete-position" action="{{ route('product.destroy',compact('company','product')) }}"
                      method="POST" style="display: none;">
                    @csrf
                    @method('delete')
                </form>
            </div>
        </div>
        <div class="card-box">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <a href="#"><span class="avatar">{{ substr($product->name,0,1) }}</span></a>
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0 m-b-0">{{ ucfirst($product->name)}}</h3>
                                        <h6 class="user-name m-t-0 m-b-0">{{ strtoupper($product->ref) }}</h6>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <span class="title">Name:</span>
                                            <span class="text"><a href="#">{{ $product->name }}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">Ref:</span>
                                            <span class="text"><a href="#">{{ $product->ref }}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">tva:</span>
                                            <span class="text"><a href="#">{{$product->tva }}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">description:</span>
                                            <span class="text">
                                                {{ $product->description }}
                                            </span>
                                        </li>
                                        <li>
                                            <span class="title">size:</span>
                                            <span class="text">
                                                {{ $product->size }}
                                            </span>
                                        </li>
                                        <li>
                                            <span class="title">Created_at :</span>
                                            <span class="text">{{ $product->created_at }}</span>
                                        </li>
                                        <li>
                                            <span class="title">updated_at :</span>
                                            <span class="text">{{ $product->updated_at }}</span>
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
