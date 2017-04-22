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
                            <li>Role Requests</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

@endsection

@section('content')
        <div class="col-md-6 col-md-offset-3">
            <div class="box">
                @if(count($requests) > 0)
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                        @foreach($requests as $request)
                            <li>
                                <a href="{{ route('users.show', ['user' => $request->user->id]) }}">
                                    {{ $request->user->profile->screen_name }}
                                </a>

                                <span class="pull-right">
                                    <a href="{{ route('requests.show', ['request' => $request->artist_profile_id]) }}">
                                        See Request
                                    </a>
                                </span>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-md-12">
                        no requests
                    </div>
                </div>
                @endif
            </div>
        </div>
@endsection

@section('scripts')
@endsection