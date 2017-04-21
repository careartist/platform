@extends('layout.master')

@section('head')
@endsection

@section('breadcrumbs')

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>Admin</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('users.index') }}">Manage Users</a> - 
                                {{ $user->profile->screen_name }}
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

@endsection

@section('content')
                    <div class="col-md-6 col-md-offset-3">
                        <div class="box">
                            <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                        Profile {{ $user->profile->screen_name}}

                                    <span class="pull-right">
                                        <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-xs btn-primary">
                                        Edit User
                                        </a>
                                    </span>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <img id="img-avatar" src="@if($user->profile->avatar) {{route('home')}}/{{ $user->profile->avatar }} @else https://placeholdit.imgix.net/~text?txtsize=33&txt=150%C3%97150&w=150&h=150 @endif" class="thumbnail img-responsive">
                                    <p>
                                        <form id="user-avatar" action="{{route('user.avatar', ['profile' => $user->profile->id])}}">
                                            <input type="hidden" name="avatar" id="avatar" role="uploadcare-uploader" data-image-shrink="800x800 60%" data-crop="1:1" data-file-types="jpg JPG" />
                                            {{ csrf_field() }}
                                            <div id="upload-image-btn" class="hide">
                                                <input type="submit" class="btn btn-primary" value="Save!" />
                                            </div>
                                        </form>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{ $user->profile->screen_name }}
                                        </div>
                                        <div class="col-md-12">
                                            {{ $user->profile->first_name }} {{ $user->profile->last_name }} 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                        Address
                                    <span class="pull-right">
                                        <a href="{{ route('admin.address.edit') }}">Edit Address</a>
                                    </span>
                                    <hr>
                                </div>
                            </div>
                            @if($user->profile->address)
                            <div class="row">
                                <div class="col-md-12">
                                    {{ $user->profile->address->region->place }}
                                </div>
                                <div class="col-md-12">
                                    {{ $user->profile->address->place->place }}
                                </div>
                                <div class="col-md-12">
                                    {{ $user->profile->address->address }}
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
@endsection

@section('scripts')
@endsection