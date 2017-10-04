@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-10 col-md-offset-1">
    <!-- Widget: user widget style 1 -->
    <div class="box box-widget widget-user">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-black" style="background: url('/bower_components/AdminLTE/dist/img/photo1.png') center center;">
        <h3 class="widget-user-username">{{ ucfirst(Auth::user()->name) }}</h3>
        <h5 class="widget-user-desc">Web Designer</h5>
      </div>
      <div class="widget-user-image">
        <img class="img-circle" src="/bower_components/AdminLTE/dist/img/user3-128x128.jpg" alt="User Avatar">
      </div>
      <div class="box-footer">
        <div class="row">
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">1</h5>
              <span class="description-text">POST</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">13,000</h5>
              <span class="description-text">FOLLOWERS</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4">
            <div class="description-block">
              <h5 class="description-header">35</h5>
              <span class="description-text">PRODUCTS</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
    </div>
    </div>
</div>
<!--modals-->
<div class="row margin-1per">
    <div class="clearfix">
        <div class="col-md-12">
            <div class="pull-right">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
                        Want to Sell
                </button>
            </div>
        
        <div class="pull-left">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                    Want to Buy
            </button>
        </div>
        </div>
    </div>
</div>
<p>Click on this paragraph.</p>

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
                <form action="" method="post">
                <div class="row">
                  <div class="col-md-4">
                    <div class="font-modal">ชื่อ</div>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control">
                  </div>
                </div>
                <!--rowend-->
                
                <div class="row">
                  <div class="col-md-4">
                    <div class="font-modal">หมวด</div>
                  </div>
                  <div class="col-md-6">
                    <select id="" class="form-control main-type">
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
                    <select id="" class="form-control sub-type">
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
                    <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea> 
                  </div>
                </div>
                <!--rowend-->
                <div class="row">
                  <div class="col-md-4">
                    <div class="font-modal">จำนวน</div>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control"> 
                  </div>
                </div>
                <!--rowend-->
                <div class="row">
                  <div class="col-md-4">
                    <div class="font-modal">เพศ</div>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control">
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
                    <select class="form-control">
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
                <!-- modal-body end -->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-outline">ตกลง</button>
                </div>
                </form>
              </div>
            </div>
          </div>
<!-- showmodal-red -->
<!-- showmodal-green -->
<div class="modal modal-success fade" id="modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">ตั้งซื้อ</h4>
              </div>
              <div class="modal-body">
              <form action="" method="post">
              <div class="row">
                <div class="col-md-4">
                  <div class="font-modal">ชื่อ</div>
                </div>
                <div class="col-md-6">
                  <input class="form-control">
                </div>
              </div>
              <!--rowend-->
              
              <div class="row">
              <div class="col-md-4">
                <div class="font-modal">หมวด</div>
              </div>
              <div class="col-md-6">
                <select id="" class="form-control main-type">
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
                <select id="" class="form-control sub-type">
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
                  <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea> 
                </div>
              </div>
              <!--rowend-->
              <div class="row">
                <div class="col-md-4">
                  <div class="font-modal">จำนวน</div>
                </div>
                <div class="col-md-6">
                  <input class="form-control"> 
                </div>
              </div>
              <!--rowend-->
              <div class="row">
                <div class="col-md-4">
                  <div class="font-modal">เพศ</div>
                </div>
                <div class="col-md-6">
                  <select class="form-control">
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
                  <select class="form-control">
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
              <!-- modal-body end -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline">ตกลง</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- showmodal-green -->
<!-- /.modal -->

<!--box-->
<div class="row margin-1per">
    <div class="col-md-4">
        <div class="box">
        </div>>
    </div>
    <div class="col-md-4">
        <div class="box">
        </div>>
    </div>
    <div class="col-md-4">
        <div class="box">
        </div>>
    </div>
</div>
<!--box-->

@endsection
