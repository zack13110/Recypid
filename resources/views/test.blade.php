@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <!-- Widget: user widget style 1 -->
      <div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header" style="background-color:#598a48">
          <h3 class="widget-user-username">{{ ucfirst(Auth::user()->name) }} {{ ucfirst(Auth::user()->sub_name) }}</h3>
          <span><h4 class="widget-user-desc"><b>Contract :</b> {{ ucfirst(Auth::user()->tel) }}</h4></span>
        </div>
        <div class="widget-user-image">
          <img class="img-circle" src="/bower_components/AdminLTE/dist/img/User_Circle.png" alt="User Avatar">
        </div>
        <div class="box-footer">
          <div class="row">
            <div class="col-sm-4 border-right">
              <div class="description-block">
                <h5 class="description-header">0</h5>
                <span class="description-text">BUYING POST</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4 border-right">
              <div class="description-block">
                <h5 class="description-header">0</h5>
                <span class="description-text">SELLING POST</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4">
              <div class="description-block">
                <h5 class="description-header">5</h5>
                <span class="description-text">RATING</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="row">
    <div class="col-md-10 col-md-offset-1">
    <div class="box-footer box-comments">

              <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-md" src="/bower_components/AdminLTE/dist/img/user3-128x128.jpg" alt="User Image">

                <div class="comment-text">
                      <span class="username">
                        Maria Gonzales
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
              <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-md" src="/bower_components/AdminLTE/dist/img/user4-128x128.jpg" alt="User Image">

                <div class="comment-text">
                      <span class="username">
                        Luna Stark
                        <span class="text-muted pull-right">5 <i class="fa fa-star text-yellow"></i></span>
                      </span><!-- /.username -->
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
              <form action="#" method="post">
                <img class="img-responsive img-circle img-md" src="/bower_components/AdminLTE/dist/img/user4-128x128.jpg" alt="Alt Text">
                <!-- .img-push is used to add margin to elements next to floating images -->
                <div class="img-push">
                    <div class="row">
                    <div class="col-md-1 ">
                        <lable>RATING<i class="fa fa-star text-yellow"></i></lable>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-10">
                        <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                    </div>
                    <div class="col-md-2 ">
                        <button type="submit" class="btn btn-flat btn-primary btn-block">POST</button>
                    </div>
                    </div>
                </div>
              </form>
            </div>
            <!-- /.box-footer -->
    </div>
    </div>
</div>


  @endsection