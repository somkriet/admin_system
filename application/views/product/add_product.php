<!-- Begin Page Content -->
    <div class="container-fluid sizealert">
      <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">เพิ่มข้อมูลสินค้า</h1>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">เพิ่มสินค้า</h6>
            </div>
            <div class="card-body">
              <div class="container">
                <div class="row">  

                  <form id="fupForm1" enctype="multipart/form-data">
                  <div class="col-sm-12 col-md-12"> 
                    <!-- <form> -->

                      <hr>
                      <b style="color: rgb(0,0,0);">รายละเอียดสินค้า</b>
                      <hr>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label"><b>ชื่อสินค้า</b></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="product_name" name="product_name" placeholder="ชื่อสินค้า ...">
                        </div>
                      </div>
                    

                       <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label"><b>หมวดหมู่สินค้า</b></label>
                        <div class="col-sm-4">

                          <select class="form-control" id="product_category" name="product_category">
                            <option  value="">เลือกหมวดหมู่สินค้า</option>
                             <?php if(!empty($product_category_data)): 
                               foreach ($product_category_data as $row) {
                                
                                $category_id = $row->product_category_id;
                                $category_name = $row->product_category_name;
                                 
                      
                                echo '<option value="' . $category_id . '">' . $category_name . '</option>';

                                }
                            endif; 
                          ?>
                          </select>

                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label"><b>รายละเอียดสินค้า</b></label>
                        <div class="col-sm-8">
                           <textarea  id="product_detail" name="product_detail" rows="8" class="form-control" placeholder="รายละเอียดสินค้า ..." style="overflow: hidden; resize: none;"></textarea>
                        </div>
                      </div>

                      <hr>
                      <b style="color: rgb(0,0,0);">รูปภาพสินค้า</b>
                      <hr>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label"><b>อัพโหลดรูปภาพสินค้า</b></label>
                        <div class="col-sm-8">

                        <input type="file" class="form-control" id="file" name="file"  />
                       
                         </div> 

                      </div>

                      <hr>
                      <b style="color: rgb(0,0,0);">ตัวเลือกและสต็อคสินค้า</b><br><br>
                      <!-- <hr> -->


                      <div class="t-responsive">
                         <!-- <table class="table-bordered" id="myTbl"> -->
                          <table class="table" id="productrow">
                          
                            <thead>
                                <tr>
                                    
                                    <!-- <th class="select"></th> -->
                                    <!-- <th class="id">รหัส</th> -->
                                    <th class="name">ชื่อตัวเลือกสินค้า<span class="required-field">*</span></th>
                                    <th class="name">SKU<span class="required-field">*</span></th>
                                    <th class="name">บาร์โค้ด<span class="required-field">*</span></th>
                                    <th class="amount text-right"  style="width: 100px;">สต็อค<span class="required-field">*</span></th>
                                    <th class="value text-right"  style="width: 100px;">ต้นทุน (฿)<span class="required-field">*</span></th>
                                    <th class="discount text-right" style="width: 100px;">ราคาขาย (฿) *</th>
                                    <!-- <th class="total text-right"  style="width: 150px;">รวม</th> -->
                                    <th class="action text-center"  style="width: 50px;">ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                        <tr class="firstTr">
                                            <td>
                                                <input class="form-control option" name="option[]" type="text" id="option1" maxlength="256" value="">
                                                <span style=" font-size: 15px;">ตัวอย่าง: Size S, สีดำ</span>
                                            </td>
                                            <td>
                                               <input class="form-control sku" name="sku[]" type="text" id="sku1" maxlength="256" value="">
                                            </td>
                                            <td>
                                                <input class="form-control barcode" name="barcode[]" type="text" id="barcode1" maxlength="256" value="">
                                            </td>
                                            <td>
                                              <input type="hidden" id="stock_total" name="stock_total" value="">
                                                <input type="number" class="form-control form-text text-right" id="stock1" name="stock[]" placeholder="0.00" maxlength="32" value="">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-text text-right" id="cost1" name="cost[]" placeholder="0.00" maxlength="32" value="">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-text text-right" id="sale_price1" name="sale_price[]" placeholder="0.00"  maxlength="32" value="">
                                            </td>
                                            <td class="action text-center">
                                                <a href="javascript:deleteRow(1);" class="btn btn-danger btn-sm">
                                                  <i class="fa fa-times-circle" aria-hidden="true" ></i></a>
                                            </td>
                                        </tr>
                          </tbody>
                        </table>

                    </div>
                    <a href="javascript:addRow();" class="btn btn-primary btn-sm">
                      <i class="fa fa-plus-circle" aria-hidden="true"></i>
                      <span>เพิ่มตัวเลือกสินค้า</span>
                    </a>
                    <br><br>
                     
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label"><b>หน่วยนับสินค้า</b></label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control" id="unit_count" name="unit_count" placeholder="เช่น ตัว ชิ้น แพ็ค กล่อง...">
                        </div>
                      </div>

                      
                       <hr>
                      <b style="color: rgb(0,0,0);">คลังสินค้า</b>
                      <hr>

                       <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label"><b>ที่เก็บสินค้า</b></label>
                        <div class="col-sm-3">
                          <select class="form-control" id="product_location" name="product_location">

                             <option  value="">เลือกที่เก็บสินค้า</option>
                             <?php if(!empty($storage_data)): 
                               foreach ($storage_data as $row) {
                                
                                $storage_id = $row->storage_id;
                                $storage_name = $row->storage_name;
                                 
                      
                                echo '<option value="' . $storage_id . '">' . $storage_name . '</option>';

                                }
                            endif; 
                          ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label"><b>สินค้าคงคลังขั้นต่ำ</b></label>
                        <div class="col-sm-3">
                          <input type="number" class="form-control" id="product_minimum" name="product_minimum" placeholder="จำนวน ...">
                        </div>
                      </div>

                    </div>
                 
                <center>
                  <!-- <button type="button" id="add_product" class="btn btn-primary">เพิ่มข้อมูล</button> -->
                <input type="submit" name="submit" class="btn btn-primary" value="เพิ่มข้อมูล"/>    
                <button type="button" id="cancal_product" class="btn btn-danger">ยกเลิก</button>
              </center>
              </form>   
                <br><br>

        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- </div> -->

        <!-- /.container-fluid -->
       <!--   -->
       <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript">

  // File type validation
$("#file").change(function() {
    var file = this.files[0];
    var fileType = file.type;
    // var match = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'image/jpeg', 'image/png', 'image/jpg'];
    var match = ['image/jpeg', 'image/png', 'image/jpg'];
    // if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]))){
     if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]))){
        // alert('Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.');
        alert('Sorry, only JPG, JPEG, & PNG files are allowed to upload.');
        $("#file").val('');
        return false;
    }
});

 $(document).ready(function(e){
    // Submit form data via Ajax
    $("#fupForm1").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('product/add_new_product');?>',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#fupForm').css("opacity",".5");
            },
            success: function(data){ 
            console.log(data);
                if (data['status'] == '1') {
                    // alert("success!!");
                    Swal.fire('เพิ่มข้อมูลสินค้าเรียบร้อย!!!');
                    // swal("Good job!", "You have successfully added the order!", "success");
                    // swal("success!");
                    // window.location="<?php echo base_url('order/add_new_order');?>";

                    setTimeout(function(){ 
                      // alert("Hello"); 
                      window.location="<?php echo base_url('product/new_product');?>";
                    }, 3000);

                    return false;
                }else{
                  // swal("Error!");
                   // alert("Error!!");
                   Swal.fire('เพิ่มข้อมูลสินค้าไม่สำเร็จ!!!');
                  return false;
                }
                $('#fupForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });

});  


 var rowcount = 1;
  
   function addRow()
    {
        rowcount++;
        var table = document.getElementById("productrow");
        var length = table.rows.length;
        var row = table.insertRow();
        row.id = "prow" + rowcount;
        var cell0 = row.insertCell(0);
        var cell1 = row.insertCell(1);
        var cell2 = row.insertCell(2);
        var cell3 = row.insertCell(3);
        var cell4 = row.insertCell(4);
        var cell5 = row.insertCell(5);
        var cell6 = row.insertCell(6);
       
        cell0.innerHTML = "<input class=\"form-control option\" type=\"text\" id=\"option"+rowcount+"\" name=\"option[]\" maxlength=\"256\" value=\"\"/><span style=\"font-size: 15px;\">ตัวอย่าง: Size S, สีดำ</span>";

        cell1.innerHTML = "<input class=\"form-control sku\" type=\"search\" id=\"sku"+rowcount+"\" name=\"sku[]\" maxlength=\"256\" value=\"\"/>";

        cell2.innerHTML = "<input class=\"form-control barcode\" type=\"text\" id=\"barcode"+rowcount+"\" name=\"barcode[]\" maxlength=\"256\" value=\"\" />";

        cell3.innerHTML = "<input type=\"number\" placeholder='0.00' class=\"form-control form-text text-right\" id=\"stock"+rowcount+"\" name=\"stock[]\"  maxlength=\"32\" value='0.00' />"; 
      
        cell4.innerHTML = "<input type=\"number\" class=\"form-control form-text text-right\" id=\"cost"+rowcount+"\" name=\"cost[]\" placeholder='0.00' maxlength='32' value='0.00' />";

        cell5.innerHTML = "<input type=\"number\" class=\"form-control form-text text-right\" id=\"sale_price"+rowcount+"\" name=\"sale_price[]\" placeholder=0.00 maxlength='32' value='0.00' />";
       
        cell6.innerHTML = "<a href='javascript:deleteRow(" + rowcount + ");' class=\"btn btn-danger btn-sm\" ><i class=\"fa fa-times-circle\" ></i></a></a>";


        // updateTotalstock(rowcount);
        // autocalculate();

        $('#stock'+rowcount).change(function (e) {
                  autocalculate();
        });

    }

    function autocalculate()
    {

      // console.log('aa');
        var table = document.getElementById("productrow");
        var rCount = table.rows.length;
        var total = 0;
       
        var i = 0;
        for (var j = 1; j < rCount; j++) {
            i++;
            while (!document.getElementById('stock' + i)) {
                i++;
            }

            var tmp = ($("#stock" + i).val());
            total += Number(tmp);
           
        }

        $("#stock_total").val(total);

    }

    function deleteRow(id) {


        var table = document.getElementById("productrow");
        var rowid = 'prow' + id;

        console.log('rowid='+rowid);
        //var row = document.getElementById(rowid);
        //row.parentNode.removeChild(row);
        var row = document.getElementById(rowid);
        var count = table.rows.length;
        if (count > 1) {
            while (table && table.tagName != 'TABLE')
                table = table.parentNode;
            if (!table)
                return;
            table.deleteRow(row.rowIndex);

            var idTmp=0;
            for (var i = 1; i < (count - 1); i++) {
                idTmp++;
                //a/lert('ptotalid : ' + ptotalid);
                while (!document.getElementById('productcount' + idTmp)) {
                    idTmp++;
                    alert('ptotalTmp : ' + ptotalTmp);
                }
                // document.getElementById('productcount' + idTmp).innerHTML = i;
            }
            // autocalculate();
        }
    }


          
          $('#add_product').on('click', function(){
        
            var name = $('#product_name').val();
            var detail = $('#product_detail').val();
            var price = $('#product_price').val();
            var qty = $('#product_qty').val();
            var unit = $('#product_unit').val();
            var category = $('#product_category').val();
            var location = $('#product_location').val();
            // var img = $('#file').val();


            var file_data = $('.file').prop('files')[0];
            
          
            // var name = img.files[0].name; 
            // var form_data = new FormData();
            // var ext = name.split('.').pop().toLowerCase();
            // if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
            // {
            //  alert("Invalid Image File");
            // }
            // var oFReader = new FileReader();
              
            // oFReader.readAsDataURL($('#file').val().files[0]);
            // var f = img.files[0];
            // var fsize = f.size||f.fileSize;
            // if(fsize > 2000000)
            // {
            //   alert("Image File Size is very big");
            // }else{
            //   form_data.append("file", img.files[0]);
            // }


            if (name == "") {
              Swal.fire('กรอกข้อมูลชื่อสินค้า');

               $( "#product_name" ).focus();

            }else if(detail == ""){
              
              Swal.fire('กรอกข้อมูล รายละเอียดสินค้า');

              $( "#product_detail" ).focus();

            }else if(price == ""){
              
              Swal.fire('กรอกข้อมูลราคา');

              $( "#product_price" ).focus();  

            }else if(qty == ""){
              
              Swal.fire('กรอกข้อมูลจำนวนสินค้า');

              $( "#product_qty" ).focus();

            }else if(unit == ""){
              
              Swal.fire('กรอกข้อมูลหน่วยนับ');

              $( "#product_unit" ).focus();

            }else if(category == ""){
              
              Swal.fire('กรอกข้อมูลประเภทสินค้า');

              $( "#product_category" ).focus();

            }else if(location == ""){
              
              Swal.fire('กรอกข้อมูลที่เก็บสินค้า');

              $( "#product_location" ).focus();

            }else if(file_data == undefined){
                
              Swal.fire('กรุณาอัพโหลดรูปสินค้า');

              // $( "#product_img" ).focus();

            }else{

              var form_data = new FormData();                  
                form_data.append('file', file_data);
              // var img1 = new FormData();
              // if($(this).prop('files').length > 0)
              // {
              //     var file = $(this).prop('files')[0];
              //     img1.append("image/jpeg","image/png","image/jpg", file);
              // }

              $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "<?php echo base_url('product/add_product');?>",
                data: { 'name': name,
                        'detail': detail,
                        'price': price,
                        'qty': qty,
                        'unit': unit,
                        'category': category,
                        'location': location,
                        form_data
                      },

                success: function(res){

                  if(res['status'] == 'success'){

                    Swal.fire('เพิ่มข้อมูลสินค้าเรียบร้อย!!!');
                    
                    return false;

                  }else{

                    Swal.fire('ไม่สามารถเพิ่มข้อมูลสินค้า!!!')
                    
                    return false;
                  }
                },
                error: function(err){
                  Swal.fire('Error!')
                  return false;
                }
              });
          

            }

          });  



           $('#cancal_product').on('click', function(){

              $('#product_name').val('');
              $('#product_detail').val('');
              $('#product_price').val('');
              $('#product_qty').val('');
              $('#product_unit').val('');
              $('#product_category').val('');
              $('#product_location').val('');
              $('#product_img').val('');

           });



           // $(document).ready(function (e) {
          $("#uploadimage").on('submit',(function(e) {
              e.preventDefault();
              $("#message").empty();
              $('#loading').show();
                $.ajax({
                url: "ajax_php_file.php", // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data)   // A function to be called if request succeeds
                {
                $('#loading').hide();
                $("#message").html(data);
                }
              });
          }));

          // Function to preview image after validation
          $(function() {
            $("#file").change(function() {
            $("#message").empty(); // To remove the previous error message
            var file = this.files[0];
            var imagefile = file.type;
            var match= ["image/jpeg","image/png","image/jpg"];
            if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
            {
            $('#product_img').attr('src','noimage.png');
            $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
            return false;
            }
            else
            {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
            }
            });
          });

          
          function imageIsLoaded(e) {
            $("#file").css("color","green");
            $('#image_preview').css("display", "block");
            $('#product_img').attr('src', e.target.result);
            $('#product_img').attr('width', '250px');
            $('#product_img').attr('height', '230px');
            };
          // });

        </script>  