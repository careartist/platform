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
                                        <a href="{{ route('user.edit', ['role' => $user->id]) }}" class="btn btn-xs btn-primary">
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
                                    <ul>
                                    @foreach($user->roles as $role)
                                        <li>{{ $role->name }} 
                                        <span class="pull-right">
                                            <a href="{{ route('remove.role', ['user' => $user->id, 'role' => $role->id]) }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('remove-{{ $role->slug }}-role').submit();">
                                                Remove role {{ $role->name }} 
                                            </a>
                                            <form id="remove-{{ $role->slug }}-role" action="{{ route('remove.role', ['user' => $user->id, 'role' => $role->id]) }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </span></li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@section('scripts')
@endsection