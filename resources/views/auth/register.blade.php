@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sub_name') ? ' has-error' : '' }}">
                            <label for="sub_name" class="col-md-4 control-label">Sub Name</label>

                            <div class="col-md-6">
                                <input id="sub_name" type="text" class="form-control" name="sub_name" value="{{ old('sub_name') }}" required autofocus>

                                @if ($errors->has('sub_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sub_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
                            <label for="tel" class="col-md-4 control-label">Tel</label>

                            <div class="col-md-6">
                                <input id="tel" type="text" class="form-control" name="tel" value="{{ old('tel') }}" required autofocus>

                                @if ($errors->has('tel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<<<<<<< HEAD
                        <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
                            <label for="tel" class="col-md-4 control-label">Profile Image</label>

                            <div class="col-md-6">
                                <input id="avatar" type="file" class="form-control" name="avatar" value="{{ old('avatar') }}">

                                @if ($errors->has('avatar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
=======

                   <div class="form-group row">
>>>>>>> deca1e8184a4fc67a067251438ce76b34edb097e
                        <label class="col-md-4 control-label">Map</label>
                                

                                    <div class="col-lg-3">
                            <div>latitude </div>
                            <div><input class="form-control" type="text" name="latitude" id="latitude" readonly></div>
                        </div> 
                        <div class="col-lg-3">
                        <div>longitude  </div>
                        <div><input class="form-control" type="text" name="longitude" id="longitude" readonly></div>
                        </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-10 col-lg-offset-1">
                        <div id="maptab_1" style="height: 300px; width: 100%;"></div>
                    </div>
                </div>
                        <input type="hidden" name="rating" id="rating" value="5"/>
                    
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <button type="submit" class="btn btn-primary btn-flat btn-block">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
   
@endsection

@section('googlemap')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOu-BjBwPObD2LS7AjqxkcQ_tt_zQ9A10&libraries=places&callback=initMap"></script>
@endsection