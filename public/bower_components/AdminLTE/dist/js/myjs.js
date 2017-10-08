$(document).ready(function(){
        $(".main-type").change(function() {
            
            var val = $(this).val();
            if (val == "1") {
                $(".sub-type").html("<option value='1'>ลวด</option><option value='2'>กระป๋อง</option><option value='3'>สังกะสี</option>");
            } else if (val == "2") {
                $(".sub-type").html("<option value='1'>กระดาษแข็ง</option><option value='2'>กระดาษหนังสือพิมพ์</option><option value='3'>กระดาษย่อย</option>");
    
            } else if (val == "3") {
                $(".sub-type").html("<option value='1'>ขวดสุรา</option><option value='2'>ขวดเครื่องดื่มชูกำลัง</option><option value='3'>เศษแก้ว</option>");
    
            } else if (val == "4") {
                $(".sub-type").html("<option value='1'>ขวด PET</option><option value='2'>ขวดน้ำขาว-ขุ่น</option><option value='3'>ท่อ PVC</option><option value='4'>โฟม</option>");
    
            } else if (val == "5") {
                $(".sub-type").html("<option value='1'>อลูมิเนียม</option><option value='2'>กระป๋องเครื่องดื่ม</option><option value='3'>ทองแดง</option><option value='4'>ทองเหลือง</option>");
    
            } else if (val == "6") {
                $(".sub-type").html("<option value='1'>อื่นๆ</option>");
    
            } else if (val == "7") {
                $(".sub-type").html("<option value='1'>น้ำมันพืชเก่า</option><option value='2'>ยางรถยนต์</option><option value='3'>ยางรถมอเตอร์ไซต์</option>");
    
            }
            
        });
        $('.submit').on('click',function(){

                    $("#sell_post").submit();
                });

         $('.submit_').on('click',function(){
                    
                    $("#buy_post").submit();
                });
            
    
    });

    
