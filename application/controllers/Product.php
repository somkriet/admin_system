<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->CI = get_instance();
        $this->load->model('customer_model');
        $this->load->model('product_model');
        $this->load->library("pagination");
        $this->load->helper(array('form', 'url'));
        // $this->load->library('upload');

        $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '100';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';

        $this->load->library('upload', $config);

        if ($this->session->userdata('lang') == 'english') {
            $lang = 'english';
            $this->session->set_userdata('lang', $lang);
        }else{
        	$lang = 'thailand';
            $this->session->set_userdata('lang', $lang);
        }

        $data_user = $this->session->userdata('lang');

        $this->lang->load($data_user,$data_user);

    }
    
	public function index()
	{ 
		header("Access-Control-Allow-Origin: *");
		// $data = array(); 

		$sql = "SELECT * FROM tb_product WHERE delete_flag = 1;";
		$data['product_data'] = $this->product_model->show_all_product($sql);

		$this->template->set('title', 'product');
		$this->template->load('default_layout', 'contents' , 'product/show_product_all', $data);
	}

	public function new_product()
	{

		$data = array();
		$this->template->set('title', 'product');
		$this->template->load('default_layout', 'contents' , 'product/add_product', $data);

	}


	public function add_product()
	{
	
		$product_name = $this->input->post('name');
		$product_detail = $this->input->post('detail');
		$product_purchase_price = $this->input->post('purchase_price');
		$product_sale_price = $this->input->post('sale_price');
		$product_qty = $this->input->post('qty');
		$product_unit = $this->input->post('unit');
		$product_category = $this->input->post('category'); 
		$product_location = $this->input->post('location');
		$product_img = $this->input->post('img');


		if ($this->upload->do_upload('file_attach')) {
                        $upload_data = $this->upload->data();
                        $params['attach'] = $upload_data['full_path'];
                        // for insert into db
                    
                        if ($upload_data['file_name'] != "") {
                            $data['attach_file'] = $upload_data['file_name'];

                            // $img_url = 'uploads/'.$data['attach_file'];
                        }else{
                            $data['attach_file'] = 'nodata';    
                        }
                       
                    }else{
                        $data['attach_file'] = 'nodata';
                    }


                    if ($data['attach_file'] == 'nodata') {
                        
                        $img_url = 'uploads/-';
                    }else{
                        $img_url = 'uploads/'.$data['attach_file'];
                    }




		// $product_id = '2';
		$check_product_data = "SELECT pro_id FROM tb_product WHERE delete_flag = 1;";
		$get_check_product_data = $this->product_model->show_all_product($check_product_data);

		$product_date = date('Ymd');

		if ($get_check_product_data == "") {

			$product_id = "PD".$product_date."0001";

		}else{

			$check_product = "SELECT SUBSTR(pro_id,11,13) AS mypro_id 
							  FROM tb_product 
							  WHERE SUBSTR(pro_id,3,8) = $product_date  
							  AND delete_flag = 1";
			$data['get_check_product'] = $this->product_model->show_all_product($check_product);

			$product_id = "PD".$product_date.$this->add_index($data['get_check_product']);
			// print_r($get_check_product);

		}
			
		if($product_name != ""){

			$sql = "INSERT INTO tb_product (
						tb_product.pro_id,
						tb_product.pro_name,
						tb_product.pro_detail,
						tb_product.pro_purchase_price,
						tb_product.pro_sale_price,
						tb_product.pro_qty,
						tb_product.pro_unit,
						tb_product.pro_category,
						tb_product.pro_location,
						tb_product.pro_date,
						tb_product.pro_img
					) VALUES (
						'$product_id',
						'$product_name',
						'$product_detail',
						'$product_purchase_price',
						'$product_sale_price',
						'$product_qty',
						'$product_unit',
						'$product_category',
						'$product_location',
						'$product_date',
						'$product_img'
					)";

			$this->product_model->add_new_product($sql);

				$data['status'] = 'success';

			}else{ 

			 	$data['status'] = 'notsave';

			}

			echo json_encode($data);
	}

	function add_index($data){

		$data_num = $data;
	
		$run_max = max($data_num);
		$num = $run_max->mypro_id+1;
		$max = strlen($num);

		if ($max == 1) {
			$a = '000'.$num;
		}elseif ($max == 2) {
			$a = '00'.$num;
		}elseif ($max == 3) {
			$a = '0'.$num;
		}else{
			$a = $num;
		}

		// print_r($a);
		// exit();
		return $a;

	}


	public function uploads_img(){

	}

	public function custom_view(){
		// $this->load->view('custom_view', array('error' => ' ' ));

		$sql = "SELECT * FROM tb_product WHERE delete_flag = 1;";
		$data['product_data'] = $this->product_model->show_all_product($sql);

		$this->template->set('title', 'product');
		$this->template->load('default_layout', 'contents' , 'product/show_product_all', $data);
	}

	public function load_img(){
		if(is_array($_FILES)) {
			if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
				$sourcePath = $_FILES['userImage']['tmp_name'];
				$targetPath = "images/".$_FILES['userImage']['name'];
				if(move_uploaded_file($sourcePath,$targetPath)) {
				
				 // <img class="image-preview" src="<?php echo $targetPath;" class="upload-preview" />
				
				}
			}
		}
	}
// Congragulation You Have Successfuly Uploaded
// file_name: 78952308_2536811219771671_5999549174792585216_n.jpg
// file_type: image/jpeg
// file_path: C:/xampp/htdocs/admin_system/uploads/
// full_path: C:/xampp/htdocs/admin_system/uploads/78952308_2536811219771671_5999549174792585216_n.jpg
// raw_name: 78952308_2536811219771671_5999549174792585216_n
// orig_name: 78952308_2536811219771671_5999549174792585216_n.jpg
// client_name: 78952308_2536811219771671_5999549174792585216_n.jpg
// file_ext: .jpg
// file_size: 60.98
// is_image: 1
// image_width: 720
// image_height: 450
// image_type: jpeg
// image_size_str: width="720" height="450"
	
	public function do_upload(){
			$config = array(
				'upload_path' => "./uploads/",
				'allowed_types' => "gif|jpg|png|jpeg|pdf",
				'overwrite' => TRUE,
				// 'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
				'max_height' => "1768",
				'max_width' => "1024"
			);
			$this->load->library('upload', $config);

		

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			    $fileName = $_FILES['inputFile']['name'];
			    //$fileExt = pathinfo($_FILES["inputFile"]["name"], PATHINFO_EXTENSION);
			    $filePath = "./uploads/".$fileName;
			    if (move_uploaded_file($_FILES["inputFile"]["tmp_name"], $filePath)) {
			        $data = "Upload success";
			    } else {
			        $data = "Upload failed";
			    }
			}


			// ตรวจสอบนามสกุลของภาพที่อัพโหลด 
			// $valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
			// if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") 
			// {
			// 	$uploaddir = "./uploads/"; //โฟลเดอร์ที่เก็บภาพ อย่าลืมสร้างนะครับ!!
			// 	foreach ($_FILES['inputFile']['name'] as $name => $value)
			// 	{
			// 		$filename = stripslashes($_FILES['inputFile']['name'][$name]);
			// 		$size=filesize($_FILES['inputFile']['tmp_name'][$name]);
			// 		//Convert extension into a lower case format
			// 		$ext = $this->getExtension($filename);
			// 		$ext = strtolower($ext);
			// 	//File extension check
			// 		if(in_array($ext,$valid_formats))
			// 	{
			// 	//ขนาดของภาพหน้ามเกิน 1mb
			// 		if ($size < (MAX_SIZE*1024))
			// 		{ 
			// 		$image_name=time().$filename; 
			// 		echo "<img src='".$uploaddir.$image_name."' class='imgList'>"; 
			// 		$newname=$uploaddir.$image_name; 
			// 		//อัพโหลดไฟล์ไปในโฟลเดอร์ที่กำหนด
			// 			if (move_uploaded_file($_FILES['photos']['tmp_name'][$name], $newname)) 
			// 			{ 
			//  				$data = "Upload success";
			// 			//เพิ่มเข้าฐานข้อมูล
			// 			// mysql_query("INSERT INTO uploadimg(image_name)VALUES('$image_name')");
			 
			// 			}else{ 
			// 				// echo '<span class="imgList">You have exceeded the size limit! so moving unsuccessful! </span>'; 
			// 				$data = "You have exceeded the size limit! so moving unsuccessful!";
			// 			} 
			// 		}
			 
			// 		else{ 
			// 		// echo '<span class="imgList">You have exceeded the size limit!</span>'; 
			// 		$data = "You have exceeded the size limit!";
			// 		} 
			// 	}else{ 
			// 		// echo '<span class="imgList">Unknown extension!</span>'; 
			// 		$data = "Unknown extension!";
			// 	} 
			 
			// 	} //foreach end
			 
			// } 


			// if($this->upload->do_upload())
			// {
			// 	$data = array('upload_data' => $this->upload->data());
			// 	// $this->load->view('product/upload_success',$data);

			// 	 // foreach ($upload_data as $item => $value):
   //  	// 			// echo $item; 
   //  	// 			$data = $item['file_name'];
   //  	// 			// echo $value;
   //  	// 		endforeach;
			// 	$data = 'success';
			// }
			// else
			// {
			// 	$data = 'error';
			// }

		echo json_encode($data);	
			// print_r($data);
    }


	function getExtension($str)
	{
		$i = strrpos($str,".");
		if (!$i) { return ""; }
		$l = strlen($str) - $i;
		$ext = substr($str,$i+1,$l);
		return $ext;
	}


	public function callDetails(){

		$product_id = $this->input->post('id');

		$sql = "SELECT * FROM tb_product WHERE pro_id = '$product_id' AND delete_flag = 1;";

		$product = $this->product_model->show_all_product($sql);

		if ($product != "") {
			$data['status'] = 'success';
			$data['show_product'] = $product;
		}else{
			$data['status'] = 'notsuccess';
			$data['show_product'] = 'nodata';
		}

		echo json_encode($data);
	}

	public function save_edit_product(){

		$product_id = $this->input->post('id');
		$product_name = $this->input->post('name');
		$product_detail = $this->input->post('detail');
		$product_price = $this->input->post('price');
		$product_qty = $this->input->post('qty');
		$product_unit = $this->input->post('unit');
		$product_category = $this->input->post('category');
		$product_location = $this->input->post('location');
		// $product_img = $this->input->post('img');
		 // tb_product.pro_img = '$product_img'


		$sql = "UPDATE
					tb_product
				SET
					tb_product.pro_name = '$product_name',
					tb_product.pro_detail = '$product_detail',
					tb_product.pro_sale_price = '$product_price',
					tb_product.pro_qty = '$product_qty',
					tb_product.pro_unit = '$product_unit',
					tb_product.pro_category = '$product_category',
					tb_product.pro_location = '$product_location'
					
				WHERE
					tb_product.pro_id = '$product_id'
				AND tb_product.delete_flag = 1;";
		$this->product_model->edit_product($sql);

		$data['status'] = 'success';
		echo json_encode($data);

	}

	public function show_product_update()
	{

		$sql = "SELECT * FROM tb_product WHERE delete_flag = 1;";

		$data['show_product'] = $this->product_model->add_new_product($sql);

		echo json_encode($data);
	}


	public function update_product()
	{

		$product_name = $this->input->post('name');
		$product_detail = $this->input->post('detail');
		$product_price = $this->input->post('price');
		$product_qty = $this->input->post('qty');
		$product_unit = $this->input->post('unit');
		$product_category = $this->input->post('category');
		$product_location = $this->input->post('location');
		$product_img = $this->input->post('img');

		// $data['update_product'] = $this->product_model->update_product($sql);
		// $id = $this->input->post('id');
		// // $customerID = $this->input->post('customerID');
		// $customername = $this->input->post('name');
		// $customername_socail = $this->input->post('name_socail');
		// $customerphone = $this->input->post('phone');
		// $customeremail = $this->input->post('email');
		// $customerid_card = $this->input->post('id_card');
		// $customeraddress = $this->input->post('address');
		// $customerpostal = $this->input->post('postal');
		// // $customerchanel = $this->input->post('chanel');
		// $customerchanel = 1;
		
		$sql = "UPDATE
					tb_customer
				SET
					tb_customer.cus_name = '$customername',
					tb_customer.cus_name_social = '$customername_socail',
					tb_customer.cus_phone = '$customerphone',
					tb_customer.cus_email = '$customeremail',
					tb_customer.cus_id_card_number = '$customerid_card',
					tb_customer.cus_address = '$customeraddress',
					tb_customer.cus_postal = '$customerpostal',
					tb_customer.cus_sales_channel = '$customerchanel'
				WHERE
					tb_customer.cus_id = '$id'";
		$this->customer_model->edit_customer($sql);

		$data['status'] = 'success';
		echo json_encode($data);

	}


	public function delete_product()
	{

		$product_id = $this->input->post('id');

		$sql = "UPDATE
					tb_product
				SET
					tb_product.delete_flag = 0
				WHERE
					tb_product.pro_id = '$product_id'";
		$this->customer_model->delete_customer($sql);

		echo json_encode('success');

	}

	 public function change($type)
    {
        $this->langlib->chooseLang($type);// ใช้สำหรับเปลี่ยนภาษาในทุก ๆ controller

    }


	
}
