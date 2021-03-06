<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
		$this->load->library('langlib');
		$this->load->helper(array('form', 'url'));

        $this->CI = get_instance();
        $this->load->model('order_model');
        $this->load->model('customer_model');
        $this->load->model('product_model');
        
        // $this->load->library("pagination");

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
		$data = array();

     
		$this->template->set('title', 'order');
		$this->template->load('default_layout', 'contents' , 'v_test', $data);
	}


    public function test_data(){


        //  $new_arr = $this->input->post('new_arr');

        // print_r($new_arr); exit();

        //     foreach($new_arr as $idx => $val){
        //         $insert_detail = "INSERT INTO order_details(
        //                                         order_id,
        //                                          productID,
        //                                          price,
        //                                          quantity,
        //                                          discount,
        //                                          total,
        //                                          IDSKU,
        //                                          size,
        //                                          color,
        //                                          location
        //                                     )
        //                                     VALUES(
        //                                         '1234',
        //                                         '".$val['productcode']."',
        //                                         '".$val['value']."',
        //                                         '".$val['amount']."',
        //                                         '".$val['discount']."',
        //                                         '".$val['total']."',
        //                                         '1221',
        //                                         'L',
        //                                         'blue',
        //                                         'A001'
        //                                     )";
        //         $data['order_add_detail'] = $this->order_model->add_new_order($insert_detail);
        //     }

         
        //     if($insert_detail){ 
        //         $data['status'] = 1; 
        //         $data['message'] = 'Form data submitted successfully!'; 
        //         // response
        //     } 
        //     echo json_encode($data);





        if($_POST['Submit']){

            // print_r($_POST); exit();
     
            // ตรวจสอบค่า id หลักของข้อมูล ว่ามีข้อมูลหรือไม่
            if(count($_POST['h_item_id1'])>0){
                // แยกค่า id หลักของข้อมูลเดิม ถ้ามี เก็บเป็นตัวแปร array
                $h_data_id_arr=explode(",",substr($_POST['h_all_id_data'],0,-1));
                foreach($_POST['h_item_id1'] as $key_data=>$value_data){// วนลูป จัดการกับค่า id หลัก
                    // if($value_data==""){ // ถ้าไม่มีค่า แสดงว่า จะเป็นการเพิ่มข้อมูลใหม่


                    // print_r($value_data); exit();
                  
                            $insert_detail = "INSERT INTO order_details (
                                                 order_id,
                                                 productID,
                                                 price,
                                                 quantity,
                                                 discount,
                                                 total,
                                                 IDSKU,
                                                 size,
                                                 color,
                                                 location
                            )
                            VALUES (
                                                 '123458',
                                                '".$_POST['productcode'][$key_data]."',
                                                '".$_POST['value'][$key_data]."',
                                                '".$_POST['amount'][$key_data]."',
                                                '".$_POST['discount'][$key_data]."',
                                                '123',
                                                '1221',
                                                'L',
                                                'blue',
                                                'A001'
                            )";

            $data['order_add_detail'] = $this->order_model->add_new_order($insert_detail);
                    // }
                    // else{ // ถ้ามีค่าอยู่แล้ว ให้อัพเดท รายการข้อมูลเดิม โดยใช้ ค่า id หลัก
                    //     @mysql_query("
                    //         UPDATE  tbl_data SET  
                    //         data_text =  '".$_POST['data2'][$key_data]."',
                    //         data_select =  '".$_POST['data1'][$key_data]."'
                    //         WHERE data_id='".$value_data."' ;               
                    //     ");
                    // }
                }
                 
                // ตรวจสอบ id หลัก ค่าเดิม และค่าใหม่ เพื่อหาค่าที่ถูกลบออกไป
                // $h_data_id_arr_del = array_diff($h_data_id_arr, $_POST['h_item_id']);
                // if(count($h_data_id_arr_del)>0){ // ถ้ามี array ค่า id หลัก ที่จะถูกลบ
                //     foreach($h_data_id_arr_del as $key_data=>$value_data){// วนลูป ลบรายการที่ไม่ต้องการ
                //         @mysql_query("
                //             DELETE FROM tbl_data WHERE data_id='".$value_data."' ;      
                //         ");
                //     }
                // }
                 
         
            }
        }




    }

	public function new_order() 
	{
		// $data = array();

        $sql = "SELECT * FROM customer WHERE delete_flag = 1;";
        $data['customer_data'] = $this->customer_model->show_all_customer($sql);

        $sql = "SELECT * FROM product WHERE delete_flag = 1;";

        $data['product_data'] = $this->product_model->show_all_product($sql);

		$this->template->set('title', 'about'); 
		$this->template->load('default_layout', 'contents' , 'order/add_new_order', $data);
	}


    public function add_new_order(){

        $order_date = $this->input->post('order_date');
        $name_customer = $this->input->post('name_customer');
        $name_socail = $this->input->post('name_socail');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $customer_address = $this->input->post('customer_address');

        $productcode1 = $this->input->post('productcode1');
        $productname1 = $this->input->post('productname1');
        $productnumber1 = $this->input->post('productnumber1');
        $productpricepernumber1 = $this->input->post('productpricepernumber1');
        $discountpernumber1 = $this->input->post('discountpernumber1');
        $producttotalprice1 = $this->input->post('producttotalprice1');

        $shippingchannel = $this->input->post('shippingchannel');
        $description = $this->input->post('description');
        $discounttext = $this->input->post('discounttext');
        $shippingamount = $this->input->post('shippingamount');

        $name_receiver = $this->input->post('name_receiver');
        $phone_receiver = $this->input->post('phone_receiver');
        $email_receiver = $this->input->post('email_receiver');
        $address_receiver = $this->input->post('address_receiver');
        $sent_date = $this->input->post('sent_date');
        $track_no = $this->input->post('track_no');

        $payment_channel = $this->input->post('payment_channel');
        $file = $this->input->post('file');



        $check_order_data = "SELECT cus_id FROM customer WHERE delete_flag = 1;";
        $get_check_order_data = $this->order_model->show_all_order($check_order_data);
        $order_datecheck = date('Ymd');

        if ($get_check_order_data == "") {

            $order_id = "OR".$order_datecheck."0001";

            // OR202008050002

        }else{

            $check_order = "SELECT SUBSTR(order_id,11,13) AS myorder_id 
                                              FROM order_table 
                                              WHERE SUBSTR(order_id,3,8) = '".$order_datecheck."'
                                              AND delete_flag = 1";
            // $check_order = "SELECT SUBSTR(order_id,11,13) AS myorder_id 
            //                                   FROM order_detail 
            //                                   WHERE SUBSTR(order_id,3,8) = '".$order_datecheck."'";
            $data['get_check_order'] = $this->order_model->show_all_order($check_order);

            $order_id = "OR".$order_datecheck.$this->add_index($data['get_check_order']);

            $insert = "INSERT INTO order_table (
                                     order_id,
                                     cus_id,
                                     sales_channels,
                                     link_img,
                                     status_order,
                                     transport,
                                     payment_chanels,
                                     total_price,
                                     status_payment,
                                     balance,
                                     employee_id,
                                     money_transfer_slip,
                                     date_pay,
                                     date_order,
                                     delete_flag
                                    ) VALUES (
                                    '".$order_id."',
                                    '".$name_customer."',
                                    '".$shippingchannel."',
                                    '22222',
                                    'on',
                                    'ems',
                                    '".$payment_channel."',
                                    '".$producttotalprice1."',
                                    '1',
                                    '1111',
                                    'jay',
                                    'test',    
                                    '".$order_date."',
                                    '".$order_date."',
                                    '1'
                                    )"; 

            $data['order_add'] = $this->order_model->add_new_order($insert);


            $insert_detail = "INSERT INTO order_details (
                                     order_id,
                                     productID,
                                     price,
                                     quantity,
                                     discount,
                                     total,
                                     IDSKU,
                                     size,
                                     color,
                                     location
                                    ) VALUES (
                                    '".$order_id."',
                                    '".$productcode1."',
                                    '".$productpricepernumber1."',
                                    '".$productnumber1."',
                                    '".$discountpernumber1."',
                                    '".$producttotalprice1."',
                                    '1221',
                                    'L',
                                    'blue',
                                    'A001'
                                    )"; 

            $data['order_add_detail'] = $this->order_model->add_new_order($insert_detail);

            if($insert){ 
                $data['status'] = 1; 
                $data['message'] = 'Form data submitted successfully!'; 
                // response
            } 

        }

            echo json_encode($data);
        
    }


    public function add_new_order2(){

        $new_arr = $this->input->post('new_arr');

        print_r($new_arr); exit();

            foreach($new_arr as $idx => $val){
                $insert_detail = "INSERT INTO order_details(
                                                order_id,
                                                 productID,
                                                 price,
                                                 quantity,
                                                 discount,
                                                 total,
                                                 IDSKU,
                                                 size,
                                                 color,
                                                 location
                                            )
                                            VALUES(
                                                '1234',
                                                '".$val['productcode']."',
                                                '".$val['value']."',
                                                '".$val['amount']."',
                                                '".$val['discount']."',
                                                '".$val['total']."',
                                                '1221',
                                                'L',
                                                'blue',
                                                'A001'
                                            )";
                $data['order_add_detail'] = $this->order_model->add_new_order($insert_detail);
            }

         
            if($insert_detail){ 
                $data['status'] = 1; 
                $data['message'] = 'Form data submitted successfully!'; 
                // response
            } 
            echo json_encode($data);
        
    }


    public function auto_name(){

        $sql = "select * from province ";
        $query = mysql_query($sql);

        echo json_encode($data);
    }

    // public function call_data_customer(){
    //     $id = $this->input->post('id');

    //     $sql = "SELECT * 
    //             FROM customer 
    //             WHERE cus_id = '$id' 
    //             AND delete_flag = 1;";
    //     $data['customer_data'] = $this->customer_model->show_all_customer($sql);
    //     $data['status'] = 'success';
    //     echo json_encode($data);
    // }


    // public function show_data_customer($order_id){

    //     // $customer_id = $_POST['$cus_id'];

        
    //     $sql = "SELECT * FROM customer WHERE cus_id = '".$cus_id."' AND delete_flag = 1;";
    //     $data['customer_data'] = $this->customer_model->show_all_customer($sql);
    //     // print_r($data);
    //     // exit();
    //     // $data['status'] = 'success';
    //     $this->template->set('title', 'Show customer');
    //     $this->template->load('default_layout', 'contents' , 'customer/show_data_customer', $data);

    // }


    public function call_order_detail($order_id){

            $sql = "SELECT * FROM order_table WHERE order_id = '".$order_id."' AND delete_flag = 1;";
            $data['order_detail'] = $this->order_model->show_all_order($sql);

            $sql = "SELECT * FROM order_details WHERE order_id = '".$order_id."';";
            $data['order_detail_iteam'] = $this->order_model->show_all_order($sql);


       $this->template->set('title', 'order');
       $this->template->load('default_layout', 'contents' , 'order/show_order_detail', $data);

    }


    public function order_detail(){

        $orderid = $this->input->post('id');

        // if($orderid != ""){
            // $sql = "SELECT * FROM order WHERE order_id = $orderid AND delete_flag = 1;";
            // $data['detail'] = $this->order_model->show_all_order($sql);
            // $data['status'] = 'success';

            // $this->template->set('title', 'order');
            // $this->template->load('default_layout', 'contents' , 'order/show_all_order', $data);

        // }else{
        //     $data['status'] = 'error';
        // }
        // $data['status'] = 'success';

        // json_encode($data);
        $data = 1;

        $this->template->set('title', 'order');
        $this->template->load('default_layout', 'contents' , 'order/show_order_detail', $data);
        
        // $this->PAGE['order_code'] = $omise_order_code;
        // $this->template->load('default_layout', 'contents' , 'order/show_order_detail', $data);
        // $this->load->view('order/show_order_detail', $data);
        // echo json_encode($data);

    }


    public function new_quotation(){
        $data = array();
        $this->template->set('title', 'about'); 
        $this->template->load('default_layout', 'contents' , 'order/add_new_quotation', $data);
    }

    // public function check_ip(){

    //     // $ip = $_SERVER['REMOTE_ADDR']; // อ่าน ip จาก เพจที่เรียก
    //     // $ip = '222.123.92.135';
    //     $ip = '184.82.225.104'; //thai
    //     // $ip = '110.33.122.75';
    //     // if(!empty($_SERVER['HTTP_CLIENT_IP'])){
    //     //     $ip=$_SERVER['HTTP_CLIENT_IP'];
    //     // }else{
    //     //     $ip=$_SERVER['REMOTE_ADDR'];
    //     // }
    //     // print_r($ip);
    //     $ip_number = sprintf("%u", ip2long($ip)); // แปลง ip เป็นตัวเลข
    //      print_r($ip_number);
    //     $sql = "SELECT country_3 
    //             FROM iptocountry 
    //             WHERE $ip_number >= ip_from 
    //             AND $ip_number <= ip_to;";

    //     $show_ip= $this->customer_model->show_all_customer($sql);

    //     return $show_ip;
    // }

    public function get_id_country(){//ดึงข้อมูลประเทศของลูกค้า

          // $country_name = $this->input->post('country_name');
        $country = $this->check_ip();//ประเทศของลูกค้า

        foreach($country as $value){
            $name_country = $value->country_3;
        }

        $sql = 'SELECT country_id FROM application_country WHERE  UCASE(country_name) = "'.$name_country.'"';
        $show_country = $this->customer_model->show_all_customer($sql);

          // print_r($show_country);
          echo json_encode($show_country);
    }


    function add_index($data){

        $data_num = $data;
    
        $run_max = max($data_num);
        $num = $run_max->myorder_id+1;
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

	 public function change($type)
    {
        $this->langlib->chooseLang($type);// ใช้สำหรับเปลี่ยนภาษาในทุก ๆ controller

    }
}
