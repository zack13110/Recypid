@extends('layouts.app')

@section('content')


<div class="container">
  <div class="row testclass">

<?php
if(count($db_buy) != 0){
$vol_buy = count($db_buy);
$count_buy=0;

}
else{
  $vol_buy=0;
}
if(count($db_sell) !=0){
$vol_sell = count($db_sell);
$count_sell=0;

}
else{
  $vol_sell=0;
}
?>
  </div>
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
        <img class="img-circle" src="/bower_components/AdminLTE/dist/img/user3-128x128.jpg" alt="User Avatar">
      </div>
      <div class="box-footer">
        <div class="row">
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header"><?php echo count($db_buy) ?></h5>
              <span class="description-text">BUYING POST</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header"><?php echo count($db_sell) ?></h5>
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
                <form action="/sell" name="sell_post" id="sell_post" method="post">
                {{ csrf_field() }}
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
                    <option value='1'>ลวด</option>
                <option value='3'>กระป๋อง</option>
                <option value='5'>สังกะสี</option>
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
              <form action="/buy" name="buy_post" id="buy_post" method="post">
                {{ csrf_field() }}
              <input type="hidden" name="id_user" id="id_user" value="{{ ucfirst(Auth::user()->id) }}"/>
              <div class="row">
                <div class="col-md-4">
                  <div class="font-modal">ชื่อสินค้า</div>
                </div>
                <div class="col-md-6">
                  <input class="form-control" id="name" name="name">
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
                <option value='1'>ลวด</option>
                <option value='3'>กระป๋อง</option>
                <option value='5'>สังกะสี</option>
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
                <button type="button" class="btn btn-outline submit_">ตกลง</button>
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
<?php 
if($vol_sell !=0){

if($count_sell%3==0) 
{
 echo '<div class="row margin-1per">';
}
foreach($db_sell as $x)

    echo '<div class="col-md-4">
      <!-- *****************sell************* -->
        <div class="box box-danger" >
          <div class="box box-widget widget-user box_sell">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-sell2" >
              <h3 class="widget-user-username"><span class="pull-right badge bg-red badge_sell">SELL</span></h3>
              <h5 class="widget-user-desc">'.$x["name"].'</h5>
            </div>
            <div class="widget-user-image">
              <!--<div class="circle">sell</div>-->
              
            </div>
            <div class="box-footer no-padding">
            <ul class="nav nav-stacked">
                <li>
                    <a href="#">หมวด
                        <span class="pull-right badge bg-blue">'.$x["type"].'</span>
                    </a>
                </li>
                <li>
                    <a href="#">ประเภท
                        <span class="pull-right badge bg-aqua">'.$x["sub_type"].'</span>
                    </a>
                </li>
                <li>
                    <a href="#">ราคา
                        <span class="pull-right badge bg-green">'.$x["price"].'</span>
                    </a>
                </li>
                <li>
                    <a href="#">จำนวน
                        <span class="pull-right badge bg-yellow">'.$x["volume"].'</span>
                    </a>
                </li>
                <li>
                <a href="#">เวลาที่สร้าง
                    <span class="pull-right badge bg-red">'.$x["date"].'</span>
                </a>
            </li>
            <li class="link bg-sell2">
            <a href="/buy/'.$x["id"].'">
                VIEW MATCHING  <span class="badge bg-red">'.$x["countmatching"].'</span>
            </a>
        </li>
            </ul>
        </div>
          </div>
        </div>
    </div>
    <!-- *****************sell************* -->';
    
    if($count_sell%3==0) 
    {
    echo '</div>';
    }
$count_sell++;
}
?>
<!--modals-->
<div class="row margin-1per">
    <div class="clearfix">
        <div class="col-md-12">
        <div class="">
            <button type="button" class="btn btn-success btn-block btn-flat" data-toggle="modal" data-target="#modal-success">
                    Want to Buy
            </button>
        </div>
        </div>
    </div>
</div>
<?php 
if($vol_buy !=0){

if($count_buy%3==0) 
{
 echo '<div class="row margin-1per">';
}
foreach($db_buy as $x)

    echo '<div class="col-md-4">
      <!-- *****************BUY************* -->
        <div class="box box-success">
          <div class="box box-widget widget-user box_buy">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-buy2">
              <h3 class="widget-user-username"><span class="pull-right badge bg-green badge_buy">BUY</span></h3>
              <h5 class="widget-user-desc">'.$x["name"].'</h5>
            </div>
            <div class="widget-user-image">
              <!--<div class="circle">BUY</div>-->
              
            </div>
            <div class="box-footer no-padding">
            <ul class="nav nav-stacked">
                <li>
                    <a href="#">หมวด
                        <span class="pull-right badge bg-blue">'.$x["type"].'</span>
                    </a>
                </li>
                <li>
                    <a href="#">ประเภท
                        <span class="pull-right badge bg-aqua">'.$x["sub_type"].'</span>
                    </a>
                </li>
                <li>
                    <a href="#">ราคา
                        <span class="pull-right badge bg-green">'.$x["price"].'</span>
                    </a>
                </li>
                <li>
                <a href="#">จำนวน
                    <span class="pull-right badge bg-yellow">'.$x["volume"].'</span>
                </a>
            </li>
            <li>
            <a href="#">เวลาที่สร้าง
                <span class="pull-right badge bg-red">'.$x["date"].'</span>
            </a>
        </li>
        <li class="link bg-buy2">
        <a href="/buy/'.$x["id"].'">
            VIEW MATCHING  <span class="badge bg-red">'.$x["countmatching"].'</span>
        </a>
    </li>
            </ul>
        </div>
          </div>
        </div>
    </div>
    <!-- *****************BUY************* -->';
    
    if($count_buy%3==0) 
    {
    echo '</div>';
    }
$count_buy++;
}
?>

</div>


<!--box-->

@endsection
