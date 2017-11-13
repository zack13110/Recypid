@extends('layouts.app')

@section('content')

<div id="map_canvas" style="height: 300px; width: 100%;"></div>
<?php
for ($i=0; $i < 2;$i++){
    echo '<div class="singleMap" id="allMaps_'.$i.'"></div>';
}
?>
<div id="allMaps"></div>

@endsection
@section('googlemap')
 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOu-BjBwPObD2LS7AjqxkcQ_tt_zQ9A10&libraries=places&callback=initialize"></script>
@endsection