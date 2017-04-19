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
                                <a href="{{ route('user.index') }}">Manage Users</a> - 
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
                                    {{ $user->profile->screen_name }} 
                                    <span class="pull-right">
                                        <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn btn-xs btn-primary">
                                        Edit User
                                        </a>
                                    </span>
                                </div>
                                <div class="col-md-12">
                                    {{ $user->email }}
                                </div>
                                <div class="col-md-12">
                                    {{ $user->profile->first_name }} {{ $user->profile->last_name }}
                                </div>
                                <div class="col-md-12">
                                    <a href="{{ route('roles.show', ['role' => $user->id]) }}" class="btn btn-xs btn-primary">
                                    Manage Roles
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@section('scripts')
@endsection