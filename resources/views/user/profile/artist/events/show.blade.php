@extends('layout.master')

@section('head')
@endsection

@section('breadcrumbs')

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>{{ $event->name }}</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>Artist Event</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

@endsection

@section('content')
        <div class="col-md-8 col-md-offset-2">
            <div class="box">
                <div class="row">
                    <div class="col-md-12">
                        {{ $event->name }}
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{ $event->artist->user->profile->screen_name }}
                        <hr>
                    </div>
                    <div class="col-md-12">
                        {{ $event->title }}
                        <span class="pull-right">
                            <a href="{{ route('events.edit', ['event' => $event->id]) }}" class="btn btn-xs btn-primary">
                            Edit
                            </a>
                        </span>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            From: {{ Carbon\Carbon::parse($event->start_at)->format('d M Y h:i A') }}
                        </div>
                        <div class="col-md-6">
                            @if($event->end_at)
                            Until: {{ Carbon\Carbon::parse($event->end_at)->format('d M Y h:i A') }}
                            @endif
                        </div>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        {{ $event->description }}
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            {{ $event->type }}
                        </div>
                        <div class="col-md-6">
                            {{ $event->price }}
                        </div>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            {{ $event->contact_name }}
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    {{ $event->contact_email }}
                                </div>
                                <div class="col-md-12">
                                    {{ $event->contact_phone }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('script')

@endsection