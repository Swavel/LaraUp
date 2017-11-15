@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <div class="panel panel-default">

                    <div class="panel-heading">@lang('guestbook.pages.settings.global_settings')</div>
                    {{-- CREATE a mask to fill in settings for the guestbook --}}
                    <div class="panel-body">

                        <form method="post" action="{{ route('gb_settings_store') }}">
                            {!! csrf_field() !!}

                            <div class="row">
                                <div class="col-lg-5">
                                    <label>
                                        @lang('guestbook.settings.global.max_text_size')
                                    </label>
                                </div>
                                <div class="col-lg-7 form-group" >
                                    <input type="text" value="{{ $settisizer->getSetting('max_text_size') }}" name="max_text_size" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="submit" value="gimmu">
                                </div>
                            </div>
                        </form>

                    </div>



                </div>

                @if(Auth::check())
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('guestbook.pages.settings.user_settings')</div>
                    <div class="panel-body">

                        <form method="post" action="{{ route('gb_settings_private_store') }}">
                            {!! csrf_field() !!}

                            <div class="row" @if(Auth::user()->getSetting('background_color')) style="background-color: {{ Auth::user()->getSetting('background_color') }}" @endif>
                                <div class="col-lg-5">
                                    <label>
                                        @lang('guestbook.settings.user.background_color')
                                    </label>
                                </div>
                                <div class="col-lg-7 form-group" >
                                    <input type="text" value="{{ Auth::user()->getSetting('background_color') }}" name="background_color" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="submit" value="@lang('guestbook.general.save')">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
