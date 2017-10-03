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

<!-- showmodals-red -->
<div class="modal modal-danger fade" id="modal-danger">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Danger Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline">Save changes</button>
              </div>
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
                <h4 class="modal-title">BUY</h4>
              </div>
              <div class="modal-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="font-modal">Name</div>
                </div>
                <div class="col-md-6">
                  <input class="form-control">
                </div>
              </div>
              <!--rowend-->
              
              <div class="row">
                <div class="col-md-4">
                  <div class="font-modal">Category</div>
                </div>
                <div class="col-md-6">
                  <select class="form-control">
                    <option value="volvo"></option>
                    <option value="saab">Saab</option>
                    <option value="mercedes">Mercedes</option>
                    <option value="audi">Audi</option>
                  </select>
                </div>
              </div>
              <!--endrow-->
              <div class="row">
                <div class="col-md-4">
                  <div class="font-modal">Sub-category</div>
                </div>
                <div class="col-md-6">
                  <select class="form-control">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="mercedes">Mercedes</option>
                    <option value="audi">Audi</option>
                  </select>
                </div>
              </div>
              <!--endrow-->
              <div class="row">
                <div class="col-md-4">
                  <div class="font-modal">Description</div>
                </div>
                <div class="col-md-6">
                  <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea> 
                </div>
              </div>
              <!--rowend-->
              <div class="row">
                <div class="col-md-4">
                  <div class="font-modal">Volume</div>
                </div>
                <div class="col-md-6">
                  <input class="form-control"> 
                </div>
              </div>
              <!--rowend-->
              <div class="row">
                <div class="col-md-4">
                  <div class="font-modal">Gender</div>
                </div>
                <div class="col-md-6">
                  <select class="form-control">
                    <option value="volvo">Male</option>
                    <option value="saab">Female</option>
                  </select>
                </div>
              </div>
              <!--endrow-->
              <div class="row">
                <div class="col-md-4">
                  <div class="font-modal">Time</div>
                </div>
                <div class="col-md-6">
                  <select class="form-control">
                  <option value="mercedes">00.00-03.00</option>
                    <option value="audi">03.00-06.00</option>
                    <option value="volvo">06.00-09.00</option>
                    <option value="saab">09.00-12.00</option>
                    <option value="mercedes">12.00-15.00</option>
                    <option value="audi">15.00-18.00</option>
                    <option value="volvo">18.00-21.00</option>
                    <option value="saab">21.00-24.00</option>
                    
                  </select>
                </div>
              </div>
              <!--endrow-->
              <!-- modal-body end -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline">Save changes</button>
              </div>
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
