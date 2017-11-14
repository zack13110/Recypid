<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = Auth::user()->id;
        
        /*----------------------  buy ---------------------------*/
        $db_buy = DB::table('buys')->where('id_user', $id_user)->get();
        $buy =array();
        // foreach ($db_buy as $b){
        //     $sub_type_x = $b->type;
        //     $gender_x = $b->gender_trade;
        //     $time_x = $b->time;
        //     $type_name_sel = DB::table('type_names')->where( ['id'=> $b->type])->get();
        //     $sub_type_name_sel = DB::table('sub_type_names')->where( ['type_id'=> $b->type,'sub_type_id'=> $b->sub_type])->get();
        //     foreach ($type_name_sel as $x){
        //         $type_name =$x->name;
        //     }
        //     foreach ($sub_type_name_sel as $y){
        //         $sub_type_name =$y->sub_type_name;
        //     }
        //     /*---นับจำนวนของผู้ซื้อที่ตรงกับ คนขาย--*/
        //     $data_seller_matching = DB::table('sells')->where( ['type'=> $b->type])->where('id_user','!=',$id_user)->get();/*หา id ที่มี type คล้าย*/
        //     $matching =array();
        //     if(count($data_seller_matching) != 0)
        //     {
        //         foreach ($data_seller_matching as $key_){
        //             $type_y = $key_->type;
        //             $sub_type_y = $key_->sub_type;
        //             $gender_y = $key_->gender;
        //             $time_y = $key_->time;
        //             /*calculate */
        //             $cal_xdoty = ($sub_type_x*$sub_type_y)+($gender_x*$gender_y)+($time_x*$time_y);
        //             $cal_xy = sqrt(pow($sub_type_x,2)+pow($gender_x,2)+pow($time_x,2)) * sqrt(pow($sub_type_y,2)+pow($gender_y,2)+pow($time_y,2));
        //             $cal = $cal_xdoty / $cal_xy;
                    
        //             if($cal > 0.75){
        //                 $matching[] = $key_->id;
        //             }
        //         }
        //         $countmatching_= count($matching);
        //     }
        //     else{
        //         $countmatching_= 0;
        //     }
        //     if($countmatching_==0)
        //     {
        //         $countmatching_ = '';
        //     }
        //     $buy[] = array(
        //         "id" => $b->id,
        //         "name" => $b->name,  
        //         "type" => $type_name,
        //         "sub_type" => $sub_type_name,
        //         "volume" => $b->volume,
        //         "price" => $b->price,
        //         "countmatching" => $countmatching_,
        //         "date" => $b->created_at,
        //     );    
        // }
         
        // /*----------------------  buy end---------------------------*/
        // /*----------------------  sell ---------------------------*/
        // $db_sell = DB::table('sells')->where('id_user', $id_user)->get();
         $sell =array();
        // foreach ($db_sell as $b){
        //     $sub_type_x = $b->type;
        //     $gender_x = $b->gender;
        //     $time_x = $b->time;
        //     $type_name_sel = DB::table('type_names')->where( ['id'=> $b->type])->get();
        //     $sub_type_name_sel = DB::table('sub_type_names')->where( ['type_id'=> $b->type,'sub_type_id'=> $b->sub_type])->get();
        //     foreach ($type_name_sel as $x){
        //         $type_name =$x->name;
        //     }
        //     foreach ($sub_type_name_sel as $y){
        //         $sub_type_name =$y->sub_type_name;
        //     }
        //     /*---นับจำนวนของผู้ซื้อที่ตรงกับ คนขาย--*/
        //     $data_buyer_matching = DB::table('buys')->where( ['type'=> $b->type])->where('id_user','!=',$id_user)->get();/*หา id ที่มี type คล้าย*/
        //     $matching =array();
        //     if(count($data_buyer_matching) != 0)
        //     {
        //         foreach ($data_buyer_matching as $key_){
        //             $type_y = $key_->type;
        //             $sub_type_y = $key_->sub_type;
        //             $gender_y = $key_->gender;
        //             $time_y = $key_->time;
        //             /*calculate */
        //             $cal_xdoty = ($sub_type_x*$sub_type_y)+($gender_x*$gender_y)+($time_x*$time_y);
        //             $cal_xy = sqrt(pow($sub_type_x,2)+pow($gender_x,2)+pow($time_x,2)) * sqrt(pow($sub_type_y,2)+pow($gender_y,2)+pow($time_y,2));
        //             $cal = $cal_xdoty / $cal_xy;
                    
        //             if($cal > 0.75){
        //                 $matching[] = $key_->id;
        //             }
        //         }
        //         $countmatching_= count($matching);
        //     }
        //     else{
        //         $countmatching_= 0;
        //     }
        //     $sell[] = array(
        //         "id" => $b->id,
        //         "name" => $b->name,  
        //         "type" => $type_name,
        //         "sub_type" => $sub_type_name,
        //         "volume" => $b->volume,
        //         "price" => $b->price,
        //         "date" => $b->created_at,
        //         "countmatching" => $countmatching_,
        //         "image" => "/bower_components/AdminLTE/dist/img/photo1.png",
        //     );    
        // }
        
        // /*----------------------  sell end ---------------------------*/
        // krsort($buy);
        // krsort($sell);
        return view('home',['db_sell'=> $sell, 'db_buy' => $buy, 'id_user' => $id_user]);
    }
    public function test()
    {
        return view('test');
    }
    public function test2(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:posts|max:255',
            'type' => 'required',
        ]);
    
        // The blog post is valid, store in database...
    }
    
}