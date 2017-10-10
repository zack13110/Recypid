@extends('layouts.app') @section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            
        </div>
        <div class="col-md-6">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_1" data-toggle="tab">Image</a>
                    </li>
                    <li>
                        <a href="#tab_2" data-toggle="tab">Maps</a>
                    </li>


                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">

                        <img class="img-responsive pad" src="/bower_components/AdminLTE/dist/img/photo2.png" alt="Photo">

                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3777.056167471792!2d98.95062331446714!3d18.79565006560983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30da3a6e0d8891c9%3A0x2c728e2876b2505c!2z4LiE4LiT4Liw4Lin4Li04Lio4Lin4LiB4Lij4Lij4Lih4Lio4Liy4Liq4LiV4Lij4LmM!5e0!3m2!1sth!2sth!4v1507543261055"
                            width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <!-- /.tab-pane -->

                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
        <div class="col-md-6">
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-yellow">
                    <div class="widget-user-image">
                        <img class="img-circle" src="/bower_components/AdminLTE/dist/img/user7-128x128.jpg" alt="User Avatar">
                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username">Nadia Carmichael</h3>
                    <h5 class="widget-user-desc">Lead Developer</h5>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <li>
                            <a href="#">หมวด
                                <span class="pull-right badge bg-blue">31</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">Sub Type
                                <span class="pull-right badge bg-aqua">5</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">Completed Projects
                                <span class="pull-right badge bg-green">12</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">Followers
                                <span class="pull-right badge bg-red">842</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.widget-user -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- /.info-box -->
          <div class="info-box bg-red">
              
            <span class="info-box-icon"><img class="img-circle" src="/bower_components/AdminLTE/dist/img/user7-128x128.jpg" alt="User Avatar"></span>

            <div class="info-box-content">
              <span class="info-box-text">Name</span>
              <span class="info-box-number">Telephone number</span>
              <span class="info-box-number">volume</span>
              <span class="info-box-number">Price</span>

             
            </div>
            <!-- /.info-box-content -->
          </div>
          
        </div>
    </div>
</div>
@endsection