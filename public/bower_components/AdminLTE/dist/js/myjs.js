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
                $(".sub-type").html("<option value='อุปกรณ์คอมพิวเตอร์'>อุปกรณ์คอมพิวเตอร์</option><option value='เครื่องใช้ไฟฟ้า'>เครื่องใช้ไฟฟ้า</option><option value='แผงวงจร'>แผงวงจร</option><option value='แอร์คอนดิชั่น'>แอร์คอนดิชั่น</option>");
    
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
            
                $('#exampleModal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget) // Button that triggered the modal
                    var recipient = button.data('whatever') // Extract info from data-* attributes
                    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                    var modal = $(this)
                    modal.find('.modal-title').text('คุณต้องการลบรายการนี้หรือไม่?')
                    modal.find('.modal-footer input#id_product').val(recipient)
                  })
              
                  $('#exampleModal2').on('show.bs.modal', function (event) {
                      var button = $(event.relatedTarget) // Button that triggered the modal
                      var recipient = button.data('whatever') // Extract info from data-* attributes
                      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                      var modal = $(this)
                      modal.find('.modal-title').text('คุณต้องการลบรายการนี้หรือไม่?')
                      modal.find('.modal-footer input#id_product').val(recipient)
                    })
    });


  