$(document).ready(function(){
        $(".main-type").change(function() {
            
            var val = $(this).val();
            if (val == "เศษเหล็ก") {
                $(".sub-type").html("<option value='ลวด'>ลวด</option><option value='กระป๋อง'>กระป๋อง</option><option value='สังกะสี'>สังกะสี</option>");
            } else if (val == "เศษกระดาษ") {
                $(".sub-type").html("<option value='กระดาษลัง'>กระดาษลัง</option><option value='3'>กระดาษหนังสือพิมพ์</option><option value='5'>กระดาษย่อย</option><option value='7'>กระดาษหนังสือ</option>");
    
            } else if (val == "ขวดแก้ว") {
                $(".sub-type").html("<option value='ขวดสุรา'>ขวดสุรา</option><option value='ขวดเครื่องดื่มชูกำลัง'>ขวดเครื่องดื่มชูกำลัง</option><option value='เศษแก้ว'>เศษแก้ว</option>");
    
            } else if (val == "พลาสติก") {
                $(".sub-type").html("<option value='ขวด PET'>ขวด PET</option><option value='ขวดน้ำขาว-ขุ่น'>ขวดน้ำขาว-ขุ่น</option><option value='ท่อ PVC'>ท่อ PVC</option><option value='โฟม'>โฟม</option>");
    
            } else if (val == "โลหะ") {
                $(".sub-type").html("<option value='อลูมิเนียม'>อลูมิเนียม</option><option value='กระป๋องเครื่องดื่ม'>กระป๋องเครื่องดื่ม</option><option value='ทองแดง'>ทองแดง</option><option value='ทองเหลือง'>ทองเหลือง</option>");
    
            } else if (val == "เครื่องใช้สำนักงาน") {
                $(".sub-type").html("<option value='อื่นๆ'>อื่นๆ</option>");
    
            } else if (val == "อื่นๆ") {
                $(".sub-type").html("<option value='น้ำมันพืชเก่า'>น้ำมันพืชเก่า</option><option value='ยางรถยนต์'>ยางรถยนต์</option><option value='ยางรถมอเตอร์ไซต์'>ยางรถมอเตอร์ไซต์</option>");
            }
            
        });
        $('.submit').on('click',function(){

                    $("#sell_post").submit();
                });

         $('.submit_').on('click',function(){
                    
                    $("#buy_post").submit();
                });
            
    
    });

    
