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
</div>


  @endsection