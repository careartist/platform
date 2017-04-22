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

                <form action="{{ route('artist.store') }}" method="post">
                	{{ csrf_field() }}

                    <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                        <label for="bio" class="col-md-4 control-label">Bio</label>

                        <div class="col-md-6">
                            <textarea id="bio" class="form-control" name="bio"  autofocus>{{ old('bio') }}</textarea>

                            @if ($errors->has('bio'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('bio') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                        <label for="tags" class="col-md-4 control-label">Tags</label>

                        <div class="col-md-6">
                            <textarea id="tags" class="form-control" name="tags"  autofocus>{{ old('tags') }}</textarea>

                            @if ($errors->has('tags'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tags') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-template-main"><i class="fa fa-user-md"></i> Add Bio</button>
                    </div>
                </form>
            </div>
        </div>
@endsection

@section('scripts')
@endsection