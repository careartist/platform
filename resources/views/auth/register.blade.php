@extends('layout.master')

@section('head')
@endsection

@section('breadcrumbs')

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>New account</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a>
                            </li>
                            <li>New account</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

@endsection

@section('content')

                    <div class="col-md-6 col-md-offset-3">
                        <div class="box">
                            <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>

                            <hr>

                            <form action="{{ route('auth.register') }}" method="post">
                            	{{ csrf_field() }}
                                <div class="form-group{{ $errors->has('screen_name') ? ' has-error' : '' }}">
                                    <label for="screen_name">Screen Name</label>
                                    <input type="text" class="form-control" name="screen_name" id="screen_name" placeholder="Public Screen Name" value="{{ old('screen_name') }}" required>

                                    @if ($errors->has('screen_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('screen_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                    <label for="first_name">First name</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Your First name" value="{{ old('first_name') }}" required>
                                    
                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    <label for="last_name">Last name</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Your Last name" value="{{ old('last_name') }}" required>
                                    
                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <hr>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Your Email address" value="{{ old('email') }}" required>
                                    
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                    
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm">Confirm Password</label>
                                    <input type="password" class="form-control" name="password-confirm" id="password-confirm" placeholder="Confirm Password" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-template-main"><i class="fa fa-user-md"></i> Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
@endsection

@section('scripts')
@endsection