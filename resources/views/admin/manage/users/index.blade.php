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
                            <li><a href="{{ route('home') }}">Home</a>
                            </li>
                            <li>Manage Users</li>
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
                                @foreach($users as $user)
                                @if(Sentinel::getUser()->id !== $user->id)
                                <div class="col-md-12">
                                    {{ $user->profile->screen_name }} 
                                    <span class="pull-right">
                                        <a href="{{ route('users.show', ['user' => $user->id]) }}">Show User</a>
                                    </span>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
@endsection

@section('scripts')
@endsection