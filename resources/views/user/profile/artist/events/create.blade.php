@extends('layout.master')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
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
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('events.index') }}">Events</a></li>
                            <li>Add Event</li>
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
                        <label for="title" class="col-md-3 control-label">Title*</label>

                        <div class="col-md-9 form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Event Title" value="{{ old('title') }}" autofocus required>
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="event_type" class="col-md-3 control-label">Event Type*</label>

                        <div class="col-md-9 form-group{{ $errors->has('event_type') ? ' has-error' : '' }}">
                            <select id="event_type" class="form-control" name="event_type" >
                                <option value="">Select</option>
                                @foreach($event_types as $type)
                                <option value="{{ $type->name }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('event_type'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('event_type') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="description" class="col-md-3 control-label">Description*</label>

                        <div class="col-md-9 form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <textarea id="description" rows="5" class="form-control" name="description" required>{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="start_at" class="col-md-3 control-label">Start Date*</label>

                        <div class="col-md-9 form-group{{ $errors->has('start_at') ? ' has-error' : '' }}">

                            <div class="input-append date form_datetime">
                                <input size="25" type="text" value="{{ old('start_at') }}" name="start_at" id="start_at" readonly>
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
                        <label for="end_at" class="col-md-3 control-label">End Date</label>

                        <div class="col-md-9 form-group{{ $errors->has('end_at') ? ' has-error' : '' }}">
                            <div class="input-append date form_datetime">
                                <input size="25" type="text" value="{{ old('end_at') }}" name="end_at" id="end_at" readonly>
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

                    <div class="col-md-12">
                        <label for="event_price" class="col-md-3 control-label">Event Price*</label>

                        <div class="col-md-9 form-group{{ $errors->has('event_price') ? ' has-error' : '' }}">
                            <select id="event_price" class="form-control" name="event_price" >
                                <option value="">Select</option>
                                <option value="free">Free</option>
                                <option value="paid">Paid</option>
                            </select>
                            @if ($errors->has('event_price'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('event_price') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="contact_name" class="col-md-3 control-label">Contact Name</label>

                        <div class="col-md-9 form-group{{ $errors->has('contact_name') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="contact_name" id="contact_name" placeholder="Contact Name" value="{{ old('contact_name') }}" required>
                            @if ($errors->has('contact_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('contact_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="contact_email" class="col-md-3 control-label">Contact Email</label>

                        <div class="col-md-9 form-group{{ $errors->has('contact_email') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="contact_email" id="contact_email" placeholder="Contact Email" value="{{ old('contact_email') }}" required>
                            @if ($errors->has('contact_email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('contact_email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="contact_phone" class="col-md-3 control-label">Contact Email</label>

                        <div class="col-md-9 form-group{{ $errors->has('contact_phone') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="contact_phone" id="contact_phone" placeholder="Contact Phone Number" value="{{ old('contact_phone') }}" required>
                            @if ($errors->has('contact_phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('contact_phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="tags" class="col-md-3 control-label">Tags</label>

                        <div class="col-md-9 form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                            <select class="js-example-tokenizer form-control" name="tags[]" id="tags" multiple="multiple">
                            @foreach($tags as $tag)
                                <option>{{ $tag->name }}</option>
                            @endforeach
                            </select>
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
<script type="text/javascript" src="{{ asset('js/select2.full.min.js') }}"></script>

<script>
    $(".js-example-tokenizer").select2({
      tags: true,
      tokenSeparators: [',', ' '],
      placeholder: 'Select or type your tags'
    })
</script>

<script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
<script>

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