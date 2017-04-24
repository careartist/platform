@extends('layout.master')

@section('head')
@endsection

@section('breadcrumbs')

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>{{ Sentinel::getUser()->profile->screen_name }}</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>Profile</li>
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
                        Profile
                        <span class="pull-right">
                            <a href="{{ route('user.profile.edit') }}" class="btn btn-xs btn-primary">Edit Profile</a>
                        </span>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <img id="img-avatar" src="@if($user->profile->avatar) {{route('home')}}/{{ $user->profile->avatar }} @else https://placeholdit.imgix.net/~text?txtsize=33&txt=150%C3%97150&w=150&h=150 @endif" class="thumbnail img-responsive">
                        <p>
                            <form id="user-avatar" action="{{route('user.avatar', ['profile' => $user->profile->id])}}">
                                <input type="hidden" name="avatar" id="avatar" role="uploadcare-uploader" data-image-shrink="800x800 60%" data-crop="1:1" data-file-types="jpg JPG" />
                                {{ csrf_field() }}
                                <div id="upload-image-btn" class="hide">
                                    <input type="submit" class="btn btn-primary" value="Save!" />
                                </div>
                            </form>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                {{ $user->profile->screen_name }}
                            </div>
                            <div class="col-md-12">
                                {{ $user->profile->first_name }} {{ $user->profile->last_name }} 
                            </div>
                            <div class="col-md-12">
                                {{ $user->profile->phone_number }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                    Address
                                <span class="pull-right">
                                    <a href="{{ route('user.address.edit') }}" class="btn btn-xs btn-primary">Edit Address</a>
                                </span>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ $user->profile->address->region->place }}
                            </div>
                            <div class="col-md-12">
                                {{ $user->profile->address->place->place }}
                            </div>
                            <div class="col-md-12">
                                {{ $user->profile->address->address }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                    @if($user->profile->artist_profile)
                        @if($user->profile->artist_profile->approved == 0 && $user->profile->artist_profile->rejected == 0)
                        <div class="row">
                            <div class="col-md-12">
                            request pending
                            </div>
                        </div>
                        @elseif($user->profile->artist_profile->rejected == 1)
                        <div class="row">
                            <div class="col-md-12">
                            request rejected
                            </div>
                        </div>
                        @else
                        <div class="row">
                            <div class="col-md-12">
                                {{ $user->profile->artist_profile->cui_number }}
                            </div>
                            <div class="col-md-12">
                                {{ $user->profile->artist_profile->legal_name }}
                            </div>
                            <div class="col-md-12">
                                {{ $user->profile->artist_profile->authority }}
                            </div>
                            @if($user->profile->artist_profile->artist_bio)
                                <div class="col-md-12">
                                    <a href="http://{{ $user->profile->artist_profile->artist_bio->subdomain }}.{{ config('app.domain_name') }}" target="_blank">{{ $user->profile->artist_profile->artist_bio->subdomain }}.{{ config('app.domain_name') }}</a>
                                </div>
                            @else
                                <div class="col-md-12">
                                    <a href="{{ route('artist.index') }}" class="btn btn-xs btn-primary">
                                        Add Artist Bio
                                    </a>
                                </div>
                            @endif
                        </div>
                        @endif
                    @else
                        @if($user->profile->account_type == 'uap' || $user->profile->account_type == 'artist')
                        <div class="row">
                            <div class="col-md-12">
                                <span class="pull-right">
                                    <a href="{{ route('user.request.role.create', ['type' => $user->profile->account_type]) }}" class="btn btn-xs btn-primary">Request Artist Role</a>
                                </span>
                            </div>
                        </div>
                        @else
                        <div class="row">
                            <div class="col-md-12">
                                request buyer/bidder role
                            </div>
                        </div>
                        @endif
                    @endif
                    </div>

                    @if($user->profile->artist_profile && count($user->profile->artist_profile->artist_events) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                                Events
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($user->profile->artist_profile->artist_events as $event)
                        <div class="col-md-12">
                            {{ $event->title }}
                            <span class="pull-right">
                                From: {{ Carbon\Carbon::parse($event->start_at)->format('d M Y h:i A') }}
                                @if($event->end_at)
                                <br>
                                Until: {{ Carbon\Carbon::parse($event->end_at)->format('d M Y h:i A') }}
                                @endif
                            </span>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                                Roles
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        @if(count($user->roles) > 0)
                            @foreach($user->roles as $role)
                            <div class="col-md-12">
                                <a href="{{ route('describe.role', ['role' => $role->slug]) }}">{{ $role->name }}</a>
                                @if($role->slug === 'artist')
                                <span class="pull-right">
                                    <a href="{{ route('artist.index') }}" class="btn btn-xs btn-primary">
                                        Artist Profile
                                    </a>
                                </span>
                                @endif
                            </div>
                            @endforeach
                        @else
                        <div class="col-md-12">
                            @if($user->profile->account_type == 'uap' || $user->profile->account_type == 'artist')

                            <div class="row">
                                <div class="col-md-12">
                                    <span class="pull-right">
                                        <a href="{{ route('user.request.role.create', ['type' => $user->profile->account_type]) }}" class="btn btn-xs btn-primary">Request Artist Role</a>
                                    </span>
                                </div>
                            </div>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('script')
    <script>
        UPLOADCARE_PUBLIC_KEY = '{{$ucare->public_key}}';
        UPLOADCARE_TABS = 'file';
        UPLOADCARE_INPUT_ACCEPT_TYPES = '.jpg'
        UPLOADCARE_IMAGES_ONLY = true;
        UPLOADCARE_CLEARABLE = true;
        UPLOADCARE_LOCALE_TRANSLATIONS = {
            errors: {
            'fileType': 'This type of files is not allowed.'
            },
            dialog: {
                tabs: {
                    preview: {
                        error: {
                            'fileType': {
                                title: 'File error.',
                                text: 'Only .jpg files.',
                                back: 'Back'
                            }
                        }
                    }
                }
            }
        };
    </script>

    <script charset="utf-8" src="https://ucarecdn.com/libs/widget/2.10.3/uploadcare.full.min.js"></script>

    <script>

        var widget = uploadcare.Widget('[role=uploadcare-uploader]');

        function fileTypeLimit(types) {
            types = types.split(' ');
            return function(fileInfo) {
                if (fileInfo.name === null) {
                    return;
                }
                var extension = fileInfo.name.split('.').pop();
                if (types.indexOf(extension) == -1) {
                    throw new Error("fileType");
                }
            };
        }

        $(function() {
            $('[role=uploadcare-uploader][data-file-types]').each(function() {
                var input = $(this);
                var widget = uploadcare.Widget(input);
                widget.validators.push(fileTypeLimit(input.data('file-types')));
            });
        });

        widget.onUploadComplete(function(fileInfo) {
            incrementUploads();
            $('#upload-image-btn').removeClass('hide');
        });

        $(document).on('click', '.uploadcare-panel-footer .uploadcare-dialog-preview-back, .uploadcare-dialog-close', function () {
            incrementUploads();
        });

        $(document).on('click', '.uploadcare-widget-button-remove', function () {
            $('#upload-image-btn').addClass('hide');
        });

    </script>

    <script>

        $('#user-avatar').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: { avatar: $('#avatar').val() },
                success: function success(response) {
                    if(response !== 'error')
                    {
                        widget.value(null);
                        $('#upload-image-btn').addClass('hide');
                        $('#img-avatar').attr("src",'{{route('home')}}/' + response + "?no-cache=" + $.now());
                    }
                },
                error: function error(response) {
                    console.log(response);
                }
            });
        });

        function incrementUploads() {
            $.ajax({
                url: '{{route('ucare.increment')}}',
                type: 'POST',
                data: { avatar: $('#avatar').val() },
                success: function success(response) {
                    //
                },
            });
        }
</script>

@endsection