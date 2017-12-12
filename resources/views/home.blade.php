
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
        <img class="img-circle" src="/avatars/{{ ucfirst(Auth::user()->avatar) }}" alt="User Avatar">
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
                <form action="/sell" name="sell_post" id="sell_post" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                
                <input type="hidden" name="id_user" id="id_user" value="{{ ucfirst(Auth::user()->id) }}"/>
                <div class="row form-group">
                  <div class="col-md-4">
                    <div class="font-modal ">ชื่อสินค้า</div>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" id="name" name="name_product" required>
                  </div>
                </div>
                <!--rowend-->
                
                <div class="row form-group">
                  <div class="col-md-4">
                    <div class="font-modal">หมวด</div>
                  </div>
                  <div class="col-md-6">
                    <select id="type" name="type" class="form-control main-type">
                      <option value="เศษเหล็ก">เศษเหล็ก</option>
                      <option value="เศษกระดาษ">เศษกระดาษ</option>
                      <option value="ขวดแก้ว">ขวดแก้ว</option>
                      <option value="พลาสติก">พลาสติก</option>
                      <option value="โลหะ">โลหะ</option>
                      <option value="เครื่องใช้สำนักงาน">เครื่องใช้สำนักงาน</option>
                      <option value="อื่นๆ">อื่นๆ</option>
                    </select>
                  </div>
                </div>
                <!--endrow-->
                <div class="row form-group">
                  <div class="col-md-4">
                    <div  class="font-modal">ประเภท</div>
                  </div>
                  <div class="col-md-6">
                    <select id="sub_type" name="sub_type" class="form-control sub-type">
                    <option value='ลวด'>ลวด</option>
                <option value='กระป๋อง'>กระป๋อง</option>
                <option value='สังกะสี'>สังกะสี</option>
                    </select>
                  </div>
                </div>
                <!--endrow-->
                <div class="row form-group">
                  <div class="col-md-4">
                    <div class="font-modal">คำอธิบาย</div>
                  </div>
                  <div class="col-md-6">
                    <textarea class="form-control" name="desc" id="desc" cols="30" rows="10"></textarea> 
                  </div>
                </div>
                <!--rowend-->
                <div class="row form-group">
                  <div class="col-md-4">
                    <div class="font-modal">จำนวน</div>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" id="volume" name="volume" required> 
                  </div>
                </div>
                <!--rowend-->
                <div class="row form-group">
                  <div class="col-md-4">
                    <div class="font-modal">เพศที่สะดวก</div>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control" id="gender" name="gender_trade">
                    <option value="ทั้งหมด">ทั้งหมด</option>
                      <option value="ชาย">ชาย</option>
                      <option value="หญิง">หญิง</option>
                    </select>
                  </div>
                </div>
                <!--endrow-->
                <div class="row form-group">
                  <div class="col-md-4">
                    <div class="font-modal">เวลาที่สะดวก</div>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control" id="time" name="time">
                      <option value="เช้า">เช้า</option>
                      <option value="กลางวัน">กลางวัน</option>
                      <option value="บ่าย">บ่าย</option>
                      <option value="เย็น">เย็น</option>
                      <option value="กลางคืน">กลางคืน</option>
                      
                    </select>
                  </div>
                </div>
                <!--endrow-->
                <div class="row form-group">
                  <div class="col-md-4">
                    <div class="font-modal">ราคา</div>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" id="price" name="price" required> 
                  </div>
                </div>
                <!--rowend-->
                <!-- modal-body end -->
                <div class="row form-group">
                  <div class="col-md-4">
                    <div class="font-modal">รูปสินค้า</div>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" id="image" type="file" name="image"> 
                  </div>
                </div>
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
              <form action="/buy" name="buy_post" id="buy_post" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="modal-body">
              
              <input type="hidden" name="id_user" id="id_user" value="{{ ucfirst(Auth::user()->id) }}"/>
              <div class="row form-group">
                <div class="col-md-4">
                  <div class="font-modal ">ชื่อสินค้า</div>
                </div>
                <div class="col-md-6">
                  <input class="form-control" id="name" name="name_product">
                </div>
              </div>
              <!--rowend-->
              
              <div class="row form-group">
              <div class="col-md-4">
                <div class="font-modal ">หมวด</div>
              </div>
              <div class="col-md-6">
                <select id="type" name="type" class="form-control main-type">
                  <option value="เศษเหล็ก">เศษเหล็ก</option>
                      <option value="เศษกระดาษ">เศษกระดาษ</option>
                      <option value="ขวดแก้ว" selected>ขวดแก้ว</option>
                      <option value="พลาสติก">พลาสติก</option>
                      <option value="โลหะ">โลหะ</option>
                      <option value="เครื่องใช้สำนักงาน">เครื่องใช้สำนักงาน</option>
                      <option value="อื่นๆ">อื่นๆ</option>
                </select>
              </div>
            </div>
            <!--endrow-->
            <div class="row form-group">
              <div class="col-md-4">
                <div  class="font-modal">ประเภท</div>
              </div>
              <div class="col-md-6">
                <select id="sub_type" name="sub_type" class="form-control sub-type">
                <option value='ลวด'>ลวด</option>
                <option value='กระป๋อง'>กระป๋อง</option>
                <option value='สังกะสี'>สังกะสี</option>
                </select>
              </div>
            </div>
            <!--endrow-->
              <div class="row form-group">
                <div class="col-md-4">
                  <div class="font-modal">คำอธิบาย</div>
                </div>
                <div class="col-md-6">
                  <textarea class="form-control" name="desc" id="desc" cols="30" rows="10"></textarea> 
                </div>
              </div>
              <!--rowend-->
              <div class="row form-group">
                <div class="col-md-4">
                  <div class="font-modal">จำนวน</div>
                </div>
                <div class="col-md-6">
                  <input class="form-control" id="volume" name="volume"> 
                </div>
              </div>
              <!--rowend-->
              <div class="row form-group">
                <div class="col-md-4">
                  <div class="font-modal">เพศที่สะดวก</div>
                </div>
                <div class="col-md-6">
                  <select class="form-control" id="gender" name="gender_trade">
                    <option value="ทั้งหมด">ทั้งหมด</option>
                      <option value="ชาย">ชาย</option>
                      <option value="หญิง">หญิง</option>
                  </select>
                </div>
              </div>
              <!--endrow-->
              <div class="row form-group">
                <div class="col-md-4">
                  <div class="font-modal">เวลาที่สะดวก</div>
                </div>
                <div class="col-md-6">
                  <select class="form-control" id="time" name="time">
                    <option value="เช้า">เช้า</option>
                      <option value="กลางวัน">กลางวัน</option>
                      <option value="บ่าย">บ่าย</option>
                      <option value="เย็น">เย็น</option>
                      <option value="กลางคืน">กลางคืน</option>
                    
                  </select>
                </div>
              </div>
              <!--endrow-->
              <div class="row form-group">
                  <div class="col-md-4">
                    <div class="font-modal">ราคา</div>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" id="price" name="price"> 
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-4">
                    <div class="font-modal">รูปสินค้า</div>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" id="image" type="file" name="image"> 
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
          <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool"  data-toggle="modal" data-target="#exampleModal3" data-id_product="'.$x["id"].'" data-name="'.$x["name"].'" data-type="'.$x["type"].'" data-sub_type="'.$x["sub_type"].'" data-volume="'.$x["volume"].'" data-gender="'.$x["gender"].'" data-desc="'.$x["desc"].'" data-price="'.$x["price"].'" data-duration_name="'.$x["duration_name"].'" ><i class="fa fa-edit"></i></button>
          <button type="button" class="btn btn-box-tool"  data-toggle="modal" data-target="#exampleModal2" data-whatever="'.$x["id"].'"><i class="fa fa-remove"></i></button>
          
          </div>
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
            <a href="/sell/'.$x["id"].'">
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
          <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool"  data-toggle="modal" data-target="#exampleModal4" data-id_product="'.$x["id"].'" data-name="'.$x["name"].'" data-type="'.$x["type"].'" data-sub_type="'.$x["sub_type"].'" data-volume="'.$x["volume"].'" data-gender="'.$x["gender"].'" data-desc="'.$x["desc"].'" data-price="'.$x["price"].'" data-duration_name="'.$x["duration_name"].'" ><i class="fa fa-edit"></i></button>
          <button type="button" class="btn btn-box-tool"  data-toggle="modal" data-target="#exampleModal" data-whatever="'.$x["id"].'"><i class="fa fa-close"></i></button>
              </div>
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
</div>
</div>
</div>


<!--modal delele for buy-->
<div class="modal fade bs-example-modal-sm" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
      <div class="modal-footer">
      <form action="/buy/delete" method="post">
      {{ csrf_field() }}
            <input type="hidden" class="form-control" name="id_product" id="id_product" value="">
          <div class="form-group pull-left col-md-6">
              <button type="submit" class="btn btn-success btn-block btn-flat">ใช่</button>
          </div>
          <div class="form-group pull-right col-md-6">
          <button type="button" class="btn btn-danger btn-block btn-flat" data-dismiss="modal">ไม่</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
<!--modal delele for sell-->
<div class="modal fade bs-example-modal-sm" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
      <div class="modal-footer">
      <form action="/sell/delete" method="post">
      {{ csrf_field() }}
            <input type="hidden" class="form-control" name="id_product" id="id_product" value="">
          <div class="form-group pull-left col-md-6">
              <button type="submit" class="btn btn-success btn-block btn-flat">ใช่</button>
          </div>
          <div class="form-group pull-right col-md-6">
          <button type="button" class="btn btn-danger btn-block btn-flat" data-dismiss="modal">ไม่</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<!--modal delele for sell-->

<!-- showmodals-red -->
<div class="modal modal-danger fade bs-example-modal-sm" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">ตั้งขาย</h4>
                </div>
                <form action="/sell/update" name="sell_post" id="sell_post" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                
                <input type="hidden" name="id_user" id="id_user" value="{{ ucfirst(Auth::user()->id) }}"/>
                <input type="hidden" name="id_product" id="id_product" value=""/>
                <div class="row form-group">
                  <div class="col-md-4">
                    <div class="font-modal ">ชื่อสินค้า</div>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" id="name" name="name_product" required>
                  </div>
                </div>
                <!--rowend-->
                
                <div class="row form-group">
                <div class="col-md-4">
                  <div class="font-modal">หมวด</div>
                </div>
                <div class="col-md-6">
                  <select id="type" name="type" class="form-control main-type">
                    <option value="เศษเหล็ก">เศษเหล็ก</option>
                    <option value="เศษกระดาษ">เศษกระดาษ</option>
                    <option value="ขวดแก้ว">ขวดแก้ว</option>
                    <option value="พลาสติก">พลาสติก</option>
                    <option value="โลหะ">โลหะ</option>
                    <option value="เครื่องใช้สำนักงาน">เครื่องใช้สำนักงาน</option>
                    <option value="อื่นๆ">อื่นๆ</option>
                  </select>
                </div>
              </div>
              <!--endrow-->
              <div class="row form-group">
                <div class="col-md-4">
                  <div  class="font-modal">ประเภท</div>
                </div>
                <div class="col-md-6">
                  <select id="sub_type" name="sub_type" class="form-control sub-type">
                  </select>
                </div>
              </div>
                <!--endrow-->
                <div class="row form-group">
                  <div class="col-md-4">
                    <div class="font-modal">คำอธิบาย</div>
                  </div>
                  <div class="col-md-6">
                    <textarea class="form-control" name="desc" id="desc" cols="30" rows="10"></textarea> 
                  </div>
                </div>
                <!--rowend-->
                <div class="row form-group">
                  <div class="col-md-4">
                    <div class="font-modal">จำนวน</div>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" id="volume" name="volume"> 
                  </div>
                </div>
                <!--rowend-->
                <div class="row form-group">
                  <div class="col-md-4">
                    <div class="font-modal">เพศที่สะดวก</div>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control" id="gender" name="gender_trade">
                    <option value="ทั้งหมด">ทั้งหมด</option>
                      <option value="ชาย">ชาย</option>
                      <option value="หญิง">หญิง</option>
                    </select>
                  </div>
                </div>
                <!--endrow-->
                <div class="row form-group">
                  <div class="col-md-4">
                    <div class="font-modal">เวลาที่สะดวก</div>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control" id="time" name="time">
                      <option value="เช้า">เช้า</option>
                      <option value="กลางวัน">กลางวัน</option>
                      <option value="บ่าย">บ่าย</option>
                      <option value="เย็น">เย็น</option>
                      <option value="กลางคืน">กลางคืน</option>
                      
                    </select>
                  </div>
                </div>
                <!--endrow-->
                <div class="row form-group">
                  <div class="col-md-4">
                    <div class="font-modal">ราคา</div>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" id="price" name="price"> 
                  </div>
                </div>
                <!--rowend-->
                <!-- modal-body end -->
                <div class="row form-group">
                  <div class="col-md-4">
                    <div class="font-modal">รูปสินค้า</div>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" id="image" type="file" name="image"> 
                  </div>
                </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-outline submit">ตกลง</button>
                </div>
                </form>
              </div>
            </div>
          </div>

          <!-- showmodals-green -->
<div class="modal modal-danger fade bs-example-modal-sm" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">ตั้งขาย</h4>
                </div>
                <form action="/buy/update" name="buy_post" id="buy_post" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                
                <input type="hidden" name="id_user" id="id_user" value="{{ ucfirst(Auth::user()->id) }}"/>
                <input type="hidden" name="id_product" id="id_product" value=""/>
                <div class="row form-group">
                  <div class="col-md-4">
                    <div class="font-modal ">ชื่อสินค้า</div>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" id="name" name="name_product" required>
                  </div>
                </div>
                <!--rowend-->
                
                <div class="row form-group">
                <div class="col-md-4">
                  <div class="font-modal">หมวด</div>
                </div>
                <div class="col-md-6">
                  <select id="type" name="type" class="form-control main-type">
                    <option value="เศษเหล็ก">เศษเหล็ก</option>
                    <option value="เศษกระดาษ">เศษกระดาษ</option>
                    <option value="ขวดแก้ว">ขวดแก้ว</option>
                    <option value="พลาสติก">พลาสติก</option>
                    <option value="โลหะ">โลหะ</option>
                    <option value="เครื่องใช้สำนักงาน">เครื่องใช้สำนักงาน</option>
                    <option value="อื่นๆ">อื่นๆ</option>
                  </select>
                </div>
              </div>
              <!--endrow-->
              <div class="row form-group">
                <div class="col-md-4">
                  <div  class="font-modal">ประเภท</div>
                </div>
                <div class="col-md-6">
                  <select id="sub_type" name="sub_type" class="form-control sub-type">
                  </select>
                </div>
              </div>
                <!--endrow-->
                <div class="row form-group">
                  <div class="col-md-4">
                    <div class="font-modal">คำอธิบาย</div>
                  </div>
                  <div class="col-md-6">
                    <textarea class="form-control" name="desc" id="desc" cols="30" rows="10"></textarea> 
                  </div>
                </div>
                <!--rowend-->
                <div class="row form-group">
                  <div class="col-md-4">
                    <div class="font-modal">จำนวน</div>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" id="volume" name="volume"> 
                  </div>
                </div>
                <!--rowend-->
                <div class="row form-group">
                  <div class="col-md-4">
                    <div class="font-modal">เพศที่สะดวก</div>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control" id="gender" name="gender_trade">
                    <option value="ทั้งหมด">ทั้งหมด</option>
                      <option value="ชาย">ชาย</option>
                      <option value="หญิง">หญิง</option>
                    </select>
                  </div>
                </div>
                <!--endrow-->
                <div class="row form-group">
                  <div class="col-md-4">
                    <div class="font-modal">เวลาที่สะดวก</div>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control" id="time" name="time">
                      <option value="เช้า">เช้า</option>
                      <option value="กลางวัน">กลางวัน</option>
                      <option value="บ่าย">บ่าย</option>
                      <option value="เย็น">เย็น</option>
                      <option value="กลางคืน">กลางคืน</option>
                      
                    </select>
                  </div>
                </div>
                <!--endrow-->
                <div class="row form-group">
                  <div class="col-md-4">
                    <div class="font-modal">ราคา</div>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" id="price" name="price"> 
                  </div>
                </div>
                <!--rowend-->
                <!-- modal-body end -->
                <div class="row form-group">
                  <div class="col-md-4">
                    <div class="font-modal">รูปสินค้า</div>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" id="image" type="file" name="image"> 
                  </div>
                </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-outline submit">ตกลง</button>
                </div>
                </form>
              </div>
            </div>
          </div>

@endsection
