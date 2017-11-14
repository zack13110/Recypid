$(document).ready(function(){
        $(".main-type").change(function() {
            
            var val = $(this).val();
            if (val == "1") {
                $(".sub-type").html("<option>ลวด</option><option>กระป๋อง</option><option>สังกะสี</option>");
            } else if (val == "2") {
                $(".sub-type").html("<option>กระดาษลัง</option><option>กระดาษหนังสือพิมพ์</option><option>กระดาษย่อย</option><option>กระดาษหนังสือ</option>");
    
            } else if (val == "3") {
                $(".sub-type").html("<option>ขวดสุรา</option><option>ขวดเครื่องดื่มชูกำลัง</option><option>เศษแก้ว</option>");
    
            } else if (val == "4") {
                $(".sub-type").html("<option>ขวด PET</option><option>ขวดน้ำขาว-ขุ่น</option><option>ท่อ PVC</option><option>โฟม</option>");
    
            } else if (val == "5") {
                $(".sub-type").html("<option>อลูมิเนียม</option><option>กระป๋องเครื่องดื่ม</option><option>ทองแดง</option><option>ทองเหลือง</option>");
    
            } else if (val == "6") {
                $(".sub-type").html("<option>อุปกรณ์คอมพิวเตอร์</option><option>เครื่องใช้ไฟฟ้า</option><option>แผงวงจร</option><option>แอร์คอนดิชั่น</option>");
    
            } else if (val == "7") {
                $(".sub-type").html("<option>น้ำมันพืชเก่า</option><option>ยางรถยนต์</option><option>ยางรถมอเตอร์ไซต์</option>");
    
            }
            
        });
        $('.submit').on('click',function(){

                    $("#sell_post").submit();
                });

         $('.submit_').on('click',function(){
                    
                    $("#buy_post").submit();
                });
            
    
    });

    
