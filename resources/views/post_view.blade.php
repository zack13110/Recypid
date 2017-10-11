@extends('layouts.app') @section('content')

<?php
    if(isset($db_buy)){
        $numbers_buy = count($db_buy);
        $count_buy=0;
        $bg_owner = "bg-sell";
    }else
    {
        $numbers_buy = 0; 
    }
?>

<?php
    if(isset($db_sell)){
        $numbers_sell = count($db_sell);
        $count_sell=0;
        $bg_owner = "bg-buy";
        print_r($db_sell);
    }else
    {
        $numbers_sell = 0;
    }
?>
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
                <div class="widget-user-header <?php echo $bg_owner?>">
                    <div class="widget-user-image">
                        <img class="img-circle" src="/bower_components/AdminLTE/dist/img/User_Circle.png" alt="User Avatar">
                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username"><?php echo $data_owner['name']?></h3>
                    <h5 class="widget-user-desc"><?php echo $data_owner['tel']?></h5>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked post_view_no_border">
                    <li>
                    <a href="#"><span class="badge bg-aqua font15">ชื่อสินค้า</span>
                        <span class="pull-right "><?php echo $data_owner['name_product']?></span>
                    </a>
                </li>
                    <li>
                    <a href="#"><span class="badge bg-aqua font15">หมวด</span>
                        <span class="pull-right"><?php echo $data_owner['type']?></span>
                    </a>
                </li>
                <li>
                    <a href="#"><span class="badge bg-aqua font15">ประเภท</span>
                        <span class="pull-right"><?php echo $data_owner['sub_type']?></span>
                    </a>
                </li>
                <li>
                <a href="#"><span class="badge bg-aqua font15">คำอธิบายเพิ่มเติม</span>
                    <span class="pull-right "><?php echo $data_owner['desc']?></span>
                </a>
            </li>
                <li>
                    <a href="#"><span class="badge bg-aqua font15">เพศ</span>
                        <span class="pull-right "><?php echo $data_owner['gender']?></span>
                    </a>
                </li>
                <li>
                    <a href="#"><span class="badge bg-aqua font15">ราคา</span>
                        <span class="pull-right "><?php echo $data_owner['price']?></span>
                    </a>
                </li>
                <li>
                <a href="#"><span class="badge bg-aqua font15">จำนวน</span>
                    <span class="pull-right"><?php echo $data_owner['volume']?></span>
                </a>
            </li>
            <li>
            <a href="#"><span class="badge bg-aqua font15">เวลาที่ว่าง</span>
                <span class="pull-right"><?php echo $data_owner['time']?></span>
            </a>
            
        </li>
                    </ul>
                </div>
            </div>
            <!-- /.widget-user -->
        </div>
    </div>

<?php
if($numbers_buy >=1){
    foreach($db_buy as $key)
    echo '<div class="row">
        <div class="col-md-12">
            <!-- /.info-box -->
          <div class="info-box bg-red">
              
            <span class="info-box-icon"><img class="img-circle" src="/bower_components/AdminLTE/dist/img/User_Circle.png" alt="User Avatar"></span>

            <div class="info-box-content">
                <span class="info-box-text">name</span>'.$key['name_buyer'].'
              <span class="info-box-text">Sub type</span>'.$key['sub_type'].'
              <span class="info-box-text">Name_product</span>'.$key['name_product'].'
              <span class="info-box-text">price</span>'.$key['price'].'
              <span class="info-box-text">volume</span>'.$key['volume'].'

             
            </div>
            <!-- /.info-box-content -->
          </div>
          
        </div>
    </div>';
}
?>


<?php
if($numbers_sell >=1){
    foreach($db_sell as $key)
    echo '<!-- Modal -->
    <div class="modal fade" id="modal_seller_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-sell2 font_c_white">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="font_c_white" aria-hidden="true">&times;</span>
        </button>
            <h3 class="modal-title" id="exampleModalLabel">'.$key['name_product'].'</h3>
            
          </div>
          <div class="modal-body">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                  <li class="active">
                      <a href="#tab_1_user_1" data-toggle="tab">Image</a>
                  </li>
                  <li>
                      <a href="#tab_2_user_1" data-toggle="tab">Maps</a>
                  </li>


              </ul>
              <div class="tab-content">
                  <div class="tab-pane active" id="tab_1_user_1">

                      <img class="img-responsive pad" src="/bower_components/AdminLTE/dist/img/photo2.png" alt="Photo">

                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2_user_1">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3777.056167471792!2d98.95062331446714!3d18.79565006560983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30da3a6e0d8891c9%3A0x2c728e2876b2505c!2z4LiE4LiT4Liw4Lin4Li04Lio4Lin4LiB4Lij4Lij4Lih4Lio4Liy4Liq4LiV4Lij4LmM!5e0!3m2!1sth!2sth!4v1507543261055"
                          width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                  </div>
                  <!-- /.tab-pane -->

              </div>
              <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
          </div>
          <div class="box-body"><!-- start/.box-body -->
            <dl class="dl-horizontal">
            <dt>ชื่อผู้ขาย</dt>
                <dd>'.$key['name_seller'].'</dd>
            <dt>เบอร์ติดต่อ</dt>
                <dd>'.$key['tel_seller'].'</dd>
            <dt>ประเภท</dt>
                <dd>'.$key['type'].'</dd>
            <dt>หมวด</dt>
                <dd>'.$key['sub_type'].'</dd>
            <dt>เพศ</dt>
                <dd>'.$key['gender'].'</dd>   
            <dt>คำอธิบาย</dt>
                <dd>'.$key['desc'].'</dd>
            <dt>ราคา</dt>
                <dd>'.$key['price'].'</dd> 
            <dt>จำนวน</dt>
                <dd>'.$key['volume'].'</dd>
            <dt>เวลา</dt>
                <dd>'.$key['time'].'</dd>   
            </dl>
        </div><!-- end/.box-body -->
        
        </div><!-- end div modal body-->
      </div>
    </div>';
    echo '<div class="row">
        <div class="col-md-12">
            <!-- /.info-box -->
            <a data-toggle="modal" data-target="#modal_seller_1">
          <div class="box_info bg-red">
            
            <span class="info-box-icon"><img class="img-circle" src="/bower_components/AdminLTE/dist/img/User_Circle.png" alt="User Avatar"></span>

            <div class="info_box_content">
              <div>
                <span class="info-box-text pull-left">name</span>'.$key['name_seller'].'
              </div>
              <div>
                <span class="info-box-text pull-left">Sub type</span>'.$key['sub_type'].'
              </div>
              <div>
                <span class="info-box-text pull-left">Name_product</span>'.$key['name_product'].'
              </div>
              <div>
                <span class="info-box-text pull-left">price</span>'.$key['price'].'
              </div>
              <div>
                <span class="info-box-text pull-left">volume</span>'.$key['volume'].'
              </div>
            </div>
            <!-- /.info-box-content -->
          </div>
          
        </div>
        </a>
    </div>';
}
?>


</div>
@endsection