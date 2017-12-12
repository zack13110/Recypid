$(document).ready(function(){
        $(".main-type").change(function() {
            
            var val = $(this).val();
            if (val == "เศษเหล็ก") {
                $(".sub-type").html("<option value='ลวด'>ลวด</option><option value='กระป๋อง'>กระป๋อง</option><option value='สังกะสี'>สังกะสี</option>");
            } else if (val == "เศษกระดาษ") {
                $(".sub-type").html("<option value='กระดาษลัง'>กระดาษลัง</option><option value='กระดาษหนังสือพิมพ์'>กระดาษหนังสือพิมพ์</option><option value='กระดาษย่อย'>กระดาษย่อย</option><option value='กระดาษหนังสือ'>กระดาษหนังสือ</option>");
    
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

                    // update
                    $('#exampleModal3').on('show.bs.modal', function (event) {
                        var button = $(event.relatedTarget) // Button that triggered the modal

                        var id_product = button.data('id_product')
                        var name = button.data('name')
                        var type = button.data('type')
                        var sub_type = button.data('sub_type')
                        var price = button.data('price')
                        var volume = button.data('volume')
                        var gender = button.data('gender')
                        var desc = button.data('desc')
                        var duration_name = button.data('duration_name')
                        if (type == "เศษเหล็ก") {
                            $('<option>').val('ลวด').text('ลวด').appendTo('select#sub_type');
                            $('<option>').val('กระป๋อง').text('กระป๋อง').appendTo('select#sub_type');
                            $('<option>').val('สังกะสี').text('สังกะสี').appendTo('select#sub_type');
                        } else if (type == "เศษกระดาษ") {
                            $('<option>').val('กระดาษลัง').text('กระดาษลัง').appendTo('select#sub_type');
                            $('<option>').val('กระดาษหนังสือพิมพ์').text('กระดาษหนังสือพิมพ์').appendTo('select#sub_type');
                            $('<option>').val('กระดาษย่อย').text('กระดาษย่อย').appendTo('select#sub_type');
                            $('<option>').val('กระดาษหนังสือ').text('กระดาษหนังสือ').appendTo('select#sub_type');
                
                        } else if (type == "ขวดแก้ว") {
                            $('<option>').val('ขวดสุรา').text('ขวดสุรา').appendTo('select#sub_type');
                            $('<option>').val('ขวดเครื่องดื่มชูกำลัง').text('ขวดเครื่องดื่มชูกำลัง').appendTo('select#sub_type');
                            $('<option>').val('เศษแก้ว').text('เศษแก้ว').appendTo('select#sub_type');
                
                        } else if (type == "พลาสติก") {
                            $('<option>').val('ขวด PET').text('ขวด PET').appendTo('select#sub_type');
                            $('<option>').val('ขวดน้ำขาว-ขุ่น').text('ขวดน้ำขาว-ขุ่น').appendTo('select#sub_type');
                            $('<option>').val('ท่อ PVC').text('ท่อ PVC').appendTo('select#sub_type');
                            $('<option>').val('โฟม').text('โฟม').appendTo('select#sub_type');
                
                        } else if (type == "โลหะ") {
                            $('<option>').val('อลูมิเนียม').text('อลูมิเนียม').appendTo('select#sub_type');
                            $('<option>').val('กระป๋องเครื่องดื่ม').text('กระป๋องเครื่องดื่ม').appendTo('select#sub_type');
                            $('<option>').val('ทองแดง').text('ทองแดง').appendTo('select#sub_type');
                            $('<option>').val('ทองเหลือง').text('ทองเหลือง').appendTo('select#sub_type');
                
                        } else if (type == "เครื่องใช้สำนักงาน") {
                            $('<option>').val('อุปกรณ์คอมพิวเตอร์').text('อุปกรณ์คอมพิวเตอร์').appendTo('select#sub_type');
                            $('<option>').val('เครื่องใช้ไฟฟ้า').text('เครื่องใช้ไฟฟ้า').appendTo('select#sub_type');
                            $('<option>').val('แผงวงจร').text('แผงวงจร').appendTo('select#sub_type');
                            $('<option>').val('แอร์คอนดิชั่น').text('แอร์คอนดิชั่น').appendTo('select#sub_type');

                        } else if (type == "อื่นๆ") {
                            $('<option>').val('น้ำมันพืชเก่า').text('น้ำมันพืชเก่า').appendTo('select#sub_type');
                            $('<option>').val('ยางรถยนต์').text('ยางรถยนต์').appendTo('select#sub_type');
                            $('<option>').val('ยางรถมอเตอร์ไซต์').text('ยางรถมอเตอร์ไซต์').appendTo('select#sub_type');
                        }
                        // Extract info from data-* attributes
                        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                        var modal = $(this)
                        modal.find('.modal-title').text('แก้ไขข้อมูลการขาย')
                        modal.find('#id_product').val(id_product)
                        modal.find('#name').val(name)
                        modal.find('select#type').val(type)
                        modal.find('select#sub_type').val(sub_type)
                        modal.find('#volume').val(volume)
                        modal.find('select#gender').val(gender)
                        modal.find('#price').val(price)
                        modal.find('#desc').val(desc)
                        modal.find('select#time').val(duration_name)
                      })
                      $('#exampleModal4').on('show.bs.modal', function (event) {
                        var button = $(event.relatedTarget) // Button that triggered the modal

                        var id_product = button.data('id_product')
                        var name = button.data('name')
                        var type = button.data('type')
                        var sub_type = button.data('sub_type')
                        var price = button.data('price')
                        var volume = button.data('volume')
                        var gender = button.data('gender')
                        var desc = button.data('desc')
                        var duration_name = button.data('duration_name')
                        if (type == "เศษเหล็ก") {
                            $('<option>').val('ลวด').text('ลวด').appendTo('select#sub_type');
                            $('<option>').val('กระป๋อง').text('กระป๋อง').appendTo('select#sub_type');
                            $('<option>').val('สังกะสี').text('สังกะสี').appendTo('select#sub_type');
                        } else if (type == "เศษกระดาษ") {
                            $('<option>').val('กระดาษลัง').text('กระดาษลัง').appendTo('select#sub_type');
                            $('<option>').val('กระดาษหนังสือพิมพ์').text('กระดาษหนังสือพิมพ์').appendTo('select#sub_type');
                            $('<option>').val('กระดาษย่อย').text('กระดาษย่อย').appendTo('select#sub_type');
                            $('<option>').val('กระดาษหนังสือ').text('กระดาษหนังสือ').appendTo('select#sub_type');
                
                        } else if (type == "ขวดแก้ว") {
                            $('<option>').val('ขวดสุรา').text('ขวดสุรา').appendTo('select#sub_type');
                            $('<option>').val('ขวดเครื่องดื่มชูกำลัง').text('ขวดเครื่องดื่มชูกำลัง').appendTo('select#sub_type');
                            $('<option>').val('เศษแก้ว').text('เศษแก้ว').appendTo('select#sub_type');
                
                        } else if (type == "พลาสติก") {
                            $('<option>').val('ขวด PET').text('ขวด PET').appendTo('select#sub_type');
                            $('<option>').val('ขวดน้ำขาว-ขุ่น').text('ขวดน้ำขาว-ขุ่น').appendTo('select#sub_type');
                            $('<option>').val('ท่อ PVC').text('ท่อ PVC').appendTo('select#sub_type');
                            $('<option>').val('โฟม').text('โฟม').appendTo('select#sub_type');
                
                        } else if (type == "โลหะ") {
                            $('<option>').val('อลูมิเนียม').text('อลูมิเนียม').appendTo('select#sub_type');
                            $('<option>').val('กระป๋องเครื่องดื่ม').text('กระป๋องเครื่องดื่ม').appendTo('select#sub_type');
                            $('<option>').val('ทองแดง').text('ทองแดง').appendTo('select#sub_type');
                            $('<option>').val('ทองเหลือง').text('ทองเหลือง').appendTo('select#sub_type');
                
                        } else if (type == "เครื่องใช้สำนักงาน") {
                            $('<option>').val('อุปกรณ์คอมพิวเตอร์').text('อุปกรณ์คอมพิวเตอร์').appendTo('select#sub_type');
                            $('<option>').val('เครื่องใช้ไฟฟ้า').text('เครื่องใช้ไฟฟ้า').appendTo('select#sub_type');
                            $('<option>').val('แผงวงจร').text('แผงวงจร').appendTo('select#sub_type');
                            $('<option>').val('แอร์คอนดิชั่น').text('แอร์คอนดิชั่น').appendTo('select#sub_type');

                        } else if (type == "อื่นๆ") {
                            $('<option>').val('น้ำมันพืชเก่า').text('น้ำมันพืชเก่า').appendTo('select#sub_type');
                            $('<option>').val('ยางรถยนต์').text('ยางรถยนต์').appendTo('select#sub_type');
                            $('<option>').val('ยางรถมอเตอร์ไซต์').text('ยางรถมอเตอร์ไซต์').appendTo('select#sub_type');
                        }
                        // Extract info from data-* attributes
                        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                        var modal = $(this)
                        modal.find('.modal-title').text('แก้ไขข้อมูลการขาย')
                        modal.find('#id_product').val(id_product)
                        modal.find('#name').val(name)
                        modal.find('select#type').val(type)
                        modal.find('select#sub_type').val(sub_type)
                        modal.find('#volume').val(volume)
                        modal.find('select#gender').val(gender)
                        modal.find('#price').val(price)
                        modal.find('#desc').val(desc)
                        modal.find('select#time').val(duration_name)
                      })
    });


  