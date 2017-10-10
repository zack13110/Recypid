@extends('layouts.app')

@section('content')
<!--modals-->
<div class="row margin-1per">
    <div class="clearfix">
        <div class="col-md-12">
            <div class="">
            <button type="button" class="btn btn-danger btn-block btn-flat" data-toggle="modal" data-target="#modal-danger">
                        Want to Sell
                </button>
            </div>
        
        
        </div>
    </div>
</div>

<!-- showmodals-red -->
<div class="modal modal-danger fade" id="modal-danger">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">ตั้งขาย</h4>
                </div>
                <div class="modal-body">
                <form action="/home" name="sell_post" id="sell_post" method="post">
                {{ csrf_field() }}
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <input type="hidden" name="id_user" id="id_user" value="{{ ucfirst(Auth::user()->id) }}"/>
                <div class="row">
                  <div class="col-md-4">
                    <div class="font-modal">ชื่อสินค้า</div>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" id="name" name="name" required>
                  </div>
                </div>
                <!--rowend-->
                
                <div class="row">
                  <div class="col-md-4">
                    <div class="font-modal">หมวด</div>
                  </div>
                  <div class="col-md-6">
                    <select id="type" name="type" class="form-control main-type">
                      <option value="1">เศษเหล็ก</option>
                      <option value="2">เศษกระดาษ</option>
                      <option value="3">ขวดแก้ว</option>
                      <option value="4">พลาสติก</option>
                      <option value="5">โลหะ</option>
                      <option value="6">เครื่องใช้สำนักงาน</option>
                      <option value="7">อื่นๆ</option>
                    </select>
                  </div>
                </div>
                <!--endrow-->
                <div class="row">
                  <div class="col-md-4">
                    <div  class="font-modal">ประเภท</div>
                  </div>
                  <div class="col-md-6">
                    <select id="sub_type" name="sub_type" class="form-control sub-type">
                      <option value="">-- select one -- </option>
                    </select>
                  </div>
                </div>
                <!--endrow-->
                <div class="row">
                  <div class="col-md-4">
                    <div class="font-modal">คำอธิบาย</div>
                  </div>
                  <div class="col-md-6">
                    <textarea class="form-control" name="desc" id="desc" cols="30" rows="10"></textarea> 
                  </div>
                </div>
                <!--rowend-->
                <div class="row">
                  <div class="col-md-4">
                    <div class="font-modal">จำนวน</div>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" id="volume" name="volume"> 
                  </div>
                </div>
                <!--rowend-->
                <div class="row">
                  <div class="col-md-4">
                    <div class="font-modal">เพศ</div>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control" id="gender" name="gender">
                      <option value="1">ชาย</option>
                      <option value="5">หญิง</option>
                    </select>
                  </div>
                </div>
                <!--endrow-->
                <div class="row">
                  <div class="col-md-4">
                    <div class="font-modal">เวลาที่สะดวก</div>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control" id="time" name="time">
                    <option value="1">00.00-03.00</option>
                      <option value="2">03.00-06.00</option>
                      <option value="3">06.00-09.00</option>
                      <option value="4">09.00-12.00</option>
                      <option value="5">12.00-15.00</option>
                      <option value="6">15.00-18.00</option>
                      <option value="7">18.00-21.00</option>
                      <option value="8">21.00-24.00</option>
                      
                    </select>
                  </div>
                </div>
                <!--endrow-->
                <div class="row">
                  <div class="col-md-4">
                    <div class="font-modal">ราคา</div>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" id="price" name="price"> 
                  </div>
                </div>
                <!--rowend-->
                <!-- modal-body end -->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-outline submit">ตกลง</button>
                </div>
                </form>
              </div>
            </div>
          </div>
<!-- showmodal-red -->
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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
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