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
                    <div class="form-group{{ $errors->has('cui_number') ? ' has-error' : '' }}">
                        <label for="cui_number">UAP Number</label>
                        <input type="text" class="form-control" name="cui_number" id="cui_number" placeholder="Public Screen Name" value="{{ old('cui_number') }}">

                        @if ($errors->has('cui_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cui_number') }}</strong>
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