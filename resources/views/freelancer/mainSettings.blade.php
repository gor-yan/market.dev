@extends('layouts.home')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('assets/css/freelancer/settings.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/countrySelect.min.css')}}">
@endsection
@section('content')
    @include('freelancer.header')
    <div class="wthree-services-grids">
        <div class="agile-heading">
            <h3>Profile Settings</h3>
        </div>
        <div class="container">
            <div class="wthree-services-grids">
                <div class="wthree-services">
                    <div class="col-sm-3" style="margin-top: 4px;">
                        @include('freelancer.settingsTabs')
                    </div>
                    <div class="col-sm-9">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane  active" id="mainSettings">
                                <div id="login">
                                    <div>
                                        <div class="">
                                            <div class="wthree-services">
                                                <div class="wthree-services-grid">
                                                    <div class="wthree-services-info">
                                                        <form method="POST"
                                                              action="{{ url('/freelancer/settings/main') }}">
                                                            {{ csrf_field() }}
                                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                                <input id="name" type="text" class="form-control"
                                                                       name="name"
                                                                       value="{{ $errors->has('name') ? old('name') : auth()->user()->name }}"
                                                                       placeholder="Name" autofocus>
                                                                @if ($errors->has('name'))
                                                                    <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                                                @endif
                                                            </div>
                                                            <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                                                                <input id="surname" type="text" class="form-control"
                                                                       name="surname"
                                                                       value="{{ $errors->has('surname') ? old('surname') : auth()->user()->surname }}"
                                                                       placeholder="Surname" autofocus>

                                                                @if ($errors->has('surname'))
                                                                    <span class="help-block">
                                            <strong>{{ $errors->first('surname') }}</strong>
                                        </span>
                                                                @endif
                                                            </div>
                                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                                <input id="email" disabled type="email"
                                                                       class="form-control"
                                                                       name="email"
                                                                       value="{{ auth()->user()->email }}">
                                                                @if ($errors->has('email'))
                                                                    <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                                                @endif
                                                            </div>

                                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                                <input id="password" type="password"
                                                                       class="form-control"
                                                                       name="password"
                                                                       placeholder="Password">
                                                                @if ($errors->has('password'))
                                                                    <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                                                @endif
                                                            </div>

                                                            <div class="form-group">
                                                                <input id="password-confirm" type="password"
                                                                       class="form-control"
                                                                       name="password_confirmation"
                                                                       placeholder="Confirm Password">
                                                            </div>

                                                            <div class="form-group form-item {{ $errors->has('country') ? ' has-error' : '' }}">
                                                                <input id="country_selector" type="text" name="country"
                                                                       id="country"
                                                                       value="{{ $errors->has('country') ? old('country') : auth()->user()->country }}">
                                                                <label for="country_selector" style="display:none;">Select
                                                                    a
                                                                    country
                                                                    here...</label>
                                                                @if ($errors->has('country'))
                                                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="form-group form-item" style="display:none;">
                                                                <input type="text"
                                                                       value="{{auth()->user()->country_iso}}"
                                                                       id="country_selector_code" name="country_iso"
                                                                       data-countrycodeinput="1" readonly="readonly"
                                                                       placeholder="Selected country code will appear here"/>
                                                                <label for="country_selector_code">...and the selected
                                                                    country code
                                                                    will be updated here</label>
                                                            </div>

                                                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                                                <input id="city" type="text" class="form-control"
                                                                       name="city"
                                                                       placeholder="City"
                                                                       value="{{ $errors->has('city') ? old('city') : auth()->user()->city }}">
                                                                @if ($errors->has('city'))
                                                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                                                @endif
                                                            </div>

                                                            <div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
                                                                <input id="address1" type="text" class="form-control"
                                                                       name="address1"
                                                                       value="{{ $errors->has('address1') ? old('address1') : auth()->user()->address1 }}"
                                                                       placeholder="Address 1">
                                                                @if ($errors->has('address1'))
                                                                    <span class="help-block">
                                            <strong>{{ $errors->first('address1') }}</strong>
                                        </span>
                                                                @endif
                                                            </div>

                                                            <div class="form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
                                                                <input id="address2" type="text" class="form-control"
                                                                       name="address2"
                                                                       value="{{ $errors->has('address2') ? old('address2') : auth()->user()->address2 }} "
                                                                       placeholder="Address 2">
                                                                @if ($errors->has('address2'))
                                                                    <span class="help-block">
                                            <strong>{{ $errors->first('address2') }}</strong>
                                        </span>
                                                                @endif
                                                            </div>

                                                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                                <input id="phone" type="text" class="form-control"
                                                                       name="phone"
                                                                       value="{{ $errors->has('phone') ? old('phone') : auth()->user()->phone }}"
                                                                       placeholder="Phone">
                                                                @if ($errors->has('phone'))
                                                                    <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                                                @endif
                                                            </div>

                                                            <button type="submit" class="btn btn-default">Update
                                                                Information
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/countrySelect.min.js') }}"></script>
    <script>
        $("#country_selector").countrySelect({
            preferredCountries: ['us', 'ca', 'gb']
        });
    </script>
    <script src="{{asset('assets/js/freelancer/settings.js')}}"></script>
@endsection