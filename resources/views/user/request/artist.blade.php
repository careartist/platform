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
                <p class="text-muted">If you have any questions, please feel free to contact us, our customer service center is working for you 24/7.</p>

                <hr>

                <form action="{{ route('user.request.role.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('uap_number') ? ' has-error' : '' }}">
                        <label for="uap_number">UAP Number</label>
                        <input type="text" class="form-control" name="uap_number" id="uap_number" placeholder="Public Screen Name" value="{{ old('uap_number') }}">

                        @if ($errors->has('uap_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('uap_number') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('legal_name') ? ' has-error' : '' }}">
                        <label for="legal_name">Legal Name</label>
                        <input type="text" class="form-control" name="legal_name" id="legal_name" placeholder="Your First name" value="{{ old('legal_name') }}">
                        
                        @if ($errors->has('legal_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('legal_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('authority') ? ' has-error' : '' }}">
                        <label for="authority">Authority</label>
                        <input type="text" class="form-control" name="authority" id="authority" placeholder="Your Last name" value="{{ old('authority') }}" required>
                        
                        @if ($errors->has('authority'))
                            <span class="help-block">
                                <strong>{{ $errors->first('authority') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Your Email address" value="{{ old('phone_number') }}" required>
                        
                        @if ($errors->has('phone_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone_number') }}</strong>
                            </span>
                        @endif
                    </div>
                    <hr>
                    <div class="text-center">
                        <button type="submit" class="btn btn-template-main"><i class="fa fa-user-md"></i> Request Artist Role</button>
                    </div>
                </form>
            </div>
        </div>
@endsection

@section('scripts')
@endsection