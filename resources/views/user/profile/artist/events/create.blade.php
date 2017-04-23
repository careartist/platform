@extends('layout.master')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">
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

                <form action="{{ route('events.store') }}" method="post">
                	{{ csrf_field() }}

                    <div class="col-md-12">
                        <label for="title" class="col-md-3 control-label">Title</label>

                        <div class="col-md-9 form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Event Title" value="{{ old('title') }}" required>

                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="description" class="col-md-3 control-label">Description</label>

                        <div class="col-md-9 form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <textarea id="description" rows="5" class="form-control" name="description" required autofocus>{{ old('description') }}</textarea>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="start_at" class="col-md-3 control-label">Start date</label>

                        <div class="col-md-9 form-group{{ $errors->has('start_at') ? ' has-error' : '' }}">

<div class="input-append date form_datetime">
    <input size="16" type="text" value="{{ old('start_at') }}" name="start_at" id="start_at" readonly>
    <span class="add-on"><i class="fa fa-times" aria-hidden="true"></i></span>
    <span class="add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>
</div>

                            @if ($errors->has('start_at'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('start_at') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="end_at" class="col-md-3 control-label">Start date</label>

                        <div class="col-md-9 form-group{{ $errors->has('end_at') ? ' has-error' : '' }}">

<div class="input-append date form_datetime">
    <input size="16" type="text" value="{{ old('end_at') }}" name="end_at" id="end_at" readonly>
    <span class="add-on"><i class="fa fa-times" aria-hidden="true"></i></span>
    <span class="add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>
</div>

                            @if ($errors->has('end_at'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('end_at') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-template-main"><i class="fa fa-user-md"></i> Add Event</button>
                    </div>
                </form>
            </div>
        </div>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript">

    $(".form_datetime").datetimepicker({
        format: "yyyy-mm-dd hh:ii:ss",
        autoclose: true,
        todayBtn: true,
        minuteStep: 10,
        pickerPosition: "bottom-left"
    });

    var start_at = $('#start_at');

    $('#end_at').on('change', function(ev){
            if ($('#end_at').val() < $('#start_at').val()){
                // alert('date is low');
                $('#end_at').val('');
            }
        });
</script>

@endsection