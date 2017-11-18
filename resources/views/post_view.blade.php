@extends('layouts.app') 
@section('content')

<?php

    if(isset($db_buy)){
        $numbers_buy = count($db_buy);
        $count_buy=0;
        $bg_owner = "bg-sell";
        $count_number_for_js =$numbers_buy; 
    }else
    {
        $numbers_buy = 0; 
        $count_number_for_js =0;
        
    }
?>

<?php
    if(isset($db_sell)){
        $numbers_sell = count($db_sell);
        $count_sell=0;
        $bg_owner = "bg-buy";
        $count_number_for_js =$numbers_sell;
        //echo '<pre>'; 
        //print_r($count_number_for_js);
        $i=0;
        
        
        //exit();
    }else
    {
        $numbers_sell = 0;
        $count_number_for_js = 0;
    }
    $lati_owner = $data_owner['latitude'];
    $long_owner = $data_owner['longitude'];
    $myVarValue = [$lati_owner,$long_owner];
    
    //print_r($db_sell);
    //exit();
    
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
                        <a href="#tab_1" data-toggle="tab">Maps</a>
                    </li>
                    <li >
                        <a href="#tab_2" data-toggle="tab">Image</a>
                    </li>
                    
    

                </ul>
                <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                        <div id="map_canvas" style="height: 450px; width: 100%;"></div>
                    </div>
                    <div class="tab-pane " id="tab_2">

                        <img class="img-responsive pad" src="/bower_components/AdminLTE/dist/img/photo2.png" alt="Photo">

                    </div>
                    <!-- /.tab-pane -->
                    
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
    foreach($db_buy as $key){
    echo '<!-- Modal -->
    <div class="modal fade modal_map" id="modal_buyer_'.$count_buy.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <a href="#tab_1_user_'.$count_buy.'" data-toggle="tab">Maps</a>
                  </li> 
                  <li>
                      <a href="#tab_2_user_'.$count_buy.'" data-toggle="tab">Image</a>
                  </li>


              </ul>
              <div class="tab-content">
                  <div class="tab-pane active" id="tab_1_user_'.$count_buy.'">
                    <div class="singleMap" id="allMaps_'.$count_buy.'"></div>
                      

                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2_user_'.$count_buy.'">
                  <img class="img-responsive pad" src="/bower_components/AdminLTE/dist/img/photo2.png" alt="Photo">
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
                <dd>'.$key['name_buyer'].'</dd>
            <dt>เบอร์ติดต่อ</dt>
                <dd>'.$key['tel_buyer'].'</dd>
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
    echo '<div class="container" >
    <div class="row margin-1per">
        <div class="col-md-12">
            <!-- /.info-box -->
            <a data-toggle="modal" data-target="#modal_buyer_'.$count_buy.'">
          <div class="box_info bg-red user_info_box  clearfix">
            <div class="pull-right">
            <span class="info-box-icon"><img class="img-circle" src="/bower_components/AdminLTE/dist/img/User_Circle.png" alt="User Avatar"></span>
            </div>
            <div class="info_box_content ">
            <div class="pull-left">
                <div><label class="font-text border_radius col-md-4">Name_product</label> <label>'.$key['name_product'].'</label></div>
                <div><label class="font-text border_radius ">Type</label> <label>'.$key['type'].'</label></div>
                <div><label class="font-text border_radius">Sub type</label> <label> '.$key['sub_type'].'</label></div>
            </div>
            <div class="pull-left margin_box_info">
                <div><label class="font-text border_radius">price</label> <label> '.$key['price'].'</label></div>
                <div><label class="font-text border_radius">volume</label> <label> '.$key['volume'].'</label></div>
              </div>
            </div>
            </div>
            <!-- /.info-box-content -->
          </div>
          
        </div>
        </a>
    </div>
    </div>
    ';
    $count_buy++;
                      }
}
?>
</div>

<?php
if($numbers_sell >=1){
    foreach($db_sell as $key){
    echo '<!-- Modal -->
    <div class="modal fade" id="modal_seller_'.$count_sell.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <li  class="active">
                      <a href="#tab_1_user_'.$count_sell.'" data-toggle="tab">Maps</a>
                  </li>
                  <li >
                      
                      <a href="#tab_2_user_'.$count_sell.'" data-toggle="tab">Image</a>
                  </li>


              </ul>
              <div class="tab-content">
               <div class="tab-pane active" id="tab_1_user_'.$count_sell.'">
                      <div class="singleMap" id="allMaps_'.$count_sell.'"></div>
                  </div>
                  
                  <!-- /.tab-pane -->
                 <div class="tab-pane" id="tab_2_user_'.$count_sell.'">
                    <img class="img-responsive pad" src="/bower_components/AdminLTE/dist/img/photo2.png" alt="Photo">
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
    echo '<div class="container" >
    <div class="row margin-1per">
        <div class="col-md-12">
            <!-- /.info-box -->
            <a data-toggle="modal" data-target="#modal_seller_'.$count_sell.'">
          <div class="box_info bg-red user_info_box  clearfix">
            <div class="pull-right">
            <span class="info-box-icon"><img class="img-circle" src="/bower_components/AdminLTE/dist/img/User_Circle.png" alt="User Avatar"></span>
            </div>
            <div class="info_box_content ">
            <div class="pull-left width35">
                <div class="padding_5px"><label class="font-text border_radius ">Name_product</label> <label>'.$key['name_product'].'</label></div>
                <div class="padding_5px"><label class="font-text border_radius ">Type</label> <label>'.$key['type'].'</label></div>
                <div class="padding_5px"><label class="font-text border_radius">Sub type</label> <label> '.$key['sub_type'].'</label></div>
            </div>
            <div class="pull-left margin_box_info">
                <div class="padding_5px"><label class="font-text border_radius">price</label> <label> '.$key['price'].'</label></div>
                <div class="padding_5px"><label class="font-text border_radius">volume</label> <label> '.$key['volume'].'</label></div>
                <div class="padding_5px"><label class="font-text border_radius">Distance</label> <label ><span id="directions-panel" ></span> </label></div>
              </div>
            </div>
            </div>
            <!-- /.info-box-content -->
          </div>
          
        </div>
        </a>
    </div>
    </div>
    ';
    $count_sell++;
                      }
}
?>


</div>
<div class="padding"></div>
@endsection
@section('googlemap')
 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOu-BjBwPObD2LS7AjqxkcQ_tt_zQ9A10&libraries=places&callback=initialize"></script>
 <script>
    var mylocation = <?php echo json_encode($myVarValue); ?>;
    var map2;
    
var global_markers = [];    
var markers = <?php echo json_encode($location);?>;


function initialize() {


    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(mylocation[0],mylocation[1]);
    var myOptions = {
        zoom: 10,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map2 = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    var infowindow = new google.maps.InfoWindow({});
    for (var i = 0; i < markers.length; i++) {
        // obtain the attribues of each marker
        var lat = parseFloat(markers[i][0]);
        var lng = parseFloat(markers[i][1]);
        var trailhead_name = markers[i][2];

        var myLatlng = new google.maps.LatLng(lat, lng);

        var contentString = "<html><body><div><p><h2>" + trailhead_name + "</h2></p></div></body></html>";

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map2,
            title: "Coordinates: " + lat + " , " + lng + " | Trailhead name: " + trailhead_name
        });

        marker['infowindow'] = contentString;

        global_markers[i] = marker;

        google.maps.event.addListener(global_markers[i], 'click', function() {
            infowindow.setContent(this['infowindow']);
            infowindow.open(map2, this);
        });
    }
    var point_start = new google.maps.LatLng(mylocation[0],mylocation[1]);
    var mapList = "";
    //var abc= 0;

    //var start_array = [ [],mylocation[1]];
    var end_array = <?php echo (json_encode($location_end));?>;
    //var start_array = [ ["18.808217", "98.954631"],["16.808217", "100"]];
    //var end_array = [ ["18.769325", "98.976480"],["17.08217", "102"]];
    for (i = 0; i < end_array.length; i++) {
        var start = new google.maps.LatLng(mylocation[0],mylocation[1]);
        var end = new google.maps.LatLng(end_array[i][0],end_array[i][1]); 
        var directionsDisplay = new google.maps.DirectionsRenderer();
        var directionsService = new google.maps.DirectionsService();
        //abc = i;
        //var name = '#allMaps_'+ abc +'_';
        //$(name).append('<div class="singleMap" id="map_' + i + '"></div>');
        var mapOptions = {
            center: point_start,
            zoom: 10
        };
        var map = new google.maps.Map(document.getElementById("allMaps_"+i), mapOptions);
        directionsDisplay.setMap(map);
        calculateAndDisplayRoute(directionsService, directionsDisplay,start,end);
        
    }
    
}




function calculateAndDisplayRoute(directionsService, directionsDisplay,start,end) {
    
    
    directionsService.route({
      origin: start,
      destination: end,
      optimizeWaypoints: true,
      travelMode: 'DRIVING'
    }, function(response, status) {
      if (status === 'OK') {
        directionsDisplay.setDirections(response);
        var route = response.routes[0];
        var summaryPanel = document.getElementById('directions-panel');
        summaryPanel.innerHTML = '';
        // For each route, display summary information.
        for (var i = 0; i < route.legs.length; i++) {
          var routeSegment = i + 1;
          /*summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
              '</b><br>';
          summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
          summaryPanel.innerHTML += route.legs[i].end_address + '<br>';*/
          summaryPanel.innerHTML += route.legs[i].distance.text + '';
        }
      } else {
        window.alert('Directions request failed due to ' + status);
      }
    });
  }
window.onload = initialize;
 </script>
 @endsection