<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Wintage Backend</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url();?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url();?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <!-- <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet"> -->

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justi fy-content-center" href="home">
        <div class="sidebar-brand-icon rotate-n-0">
          <!-- <i class="fas fa-laugh-wink"></i> -->
          <img src="<?php echo base_url();?>assets/img/wintage64px.ico">
        </div>
        <div class="sidebar-brand-text mx-1">Wintage Backend <?= $this->lang->line('admin_page'); ?><sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url();?>home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>ภาพรวม</span></a>
      </li>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url();?>order">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>คำสั่งซื้อ</span></a>
          <!-- <a class="collapse-item" href="<?php echo base_url();?>order/new_order">สร้างคำสั่งซื้อ</a> -->
      </li>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url();?>payment">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>การชำระเงิน</span></a>
      </li>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url();?>order">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>คำสั่งซื้อตีกลับ</span></a>
      </li>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url();?>logistics">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>การจัดส่ง</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuproduct" aria-expanded="true" aria-controls="menuproduct">
          <i class="fas fa-box"></i>
          <span>สินค้า</span>
        </a>
        <div id="menuproduct" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">รายการ:</h6>
            <a class="collapse-item " href="<?php echo base_url();?>product">รายการสินค้า</a>
            <a class="collapse-item" href="<?php echo base_url();?>product/product_category">หมวดหมู่สินค้า</a>
            <a class="collapse-item" href="<?php echo base_url();?>supplier">ผู้ผลิต/ร้านค้าส่ง</a>
            <a class="collapse-item" href="<?php echo base_url();?>product/storage">คลังสินค้า/สาขา</a>
          </div>
        </div>  
      </li>

<!-- http://programmingtoweb.com/program/pos/cashier/lastbill/ -->
      <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url();?>customer">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>ลูกค้า</span></a>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menustorage" aria-expanded="true" aria-controls="menustorage">
          <i class="fas fa-box"></i>
          <span>สต็อคสินค้า</span>
        </a>
        <div id="menustorage" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">รายการ:</h6>
            <a class="collapse-item " href="<?php echo base_url();?>product">รายการสินค้า</a>
            <a class="collapse-item" href="<?php echo base_url();?>product/product_category">หมวดหมู่สินค้า</a>
            <a class="collapse-item" href="<?php echo base_url();?>supplier">ผู้ผลิต/ร้านค้าส่ง</a>
            <a class="collapse-item" href="<?php echo base_url();?>product/storage">คลังสินค้า/สาขา</a>
          </div>
        </div>  
      </li>


       <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url();?>sales_channels">
          <i class='far fa-file-alt'></i>
          <span>ช่องทางการขาย</span></a>
      </li>




      <!-- Nav Item - Pages Collapse Menu -->
     <!--  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuorder" aria-expanded="true" aria-controls="menuorder">
          <i class="fas fa-cart-plus"></i>
          <span>รายการขาย</span>
        </a>
        <div id="menuorder" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">รายการขาย:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>order/new_order">สร้างคำสั่งซื้อ</a>
            <a class="collapse-item" href="<?php echo base_url();?>order">ดูรายการคำสั่งซื้อ</a>
            <a class="collapse-item" href="<?php echo base_url();?>logistics">ดูรายการการจัดส่ง</a>
            <a class="collapse-item" href="<?php echo base_url();?>order">รายการยกเลิก</a>
            <a class="collapse-item" href="<?php echo base_url();?>order">การคืนเงิน/คืนสินค้า</a>
          </div>
        </div>
      </li> -->


      <!-- Nav Item - Pages Collapse Menu -->
     <!--  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuorder" aria-expanded="true" aria-controls="menuorder">
          <i class="fas fa-cart-plus"></i>
          <span>รายการซื้อ</span>
        </a>
        <div id="menuorder" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">รายการขาย:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>order/new_order">สร้างรายการซื้อ</a>
            <a class="collapse-item" href="<?php echo base_url();?>order">ดูรายการซื้อ</a>
            <a class="collapse-item" href="<?php echo base_url();?>logistics">ดูรายการการจัดส่ง</a>
            <a class="collapse-item" href="<?php echo base_url();?>order">รายการยกเลิก</a>
            <a class="collapse-item" href="<?php echo base_url();?>order">การคืนเงิน/คืนสินค้า</a>
          </div>
        </div>
      </li> -->


       <!-- Nav Item - Pages Collapse Menu -->
     <!--  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menucustomer" aria-expanded="true" aria-controls="menucustomer">
          <i class='fas fa-user-tie'></i>
          <span>ลูกค้า</span>
        </a>
        <div id="menucustomer" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>customer">ข้อมูลลูกค้า</a>
            <a class="collapse-item" href="<?php echo base_url();?>customer/new_customer">เพิ่มลูกค้า</a>
          </div>
        </div>
      </li> -->


      


      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menustorage" aria-expanded="true" aria-controls="menustorage">
          <i class="fas fa-box"></i>
          <span>สินค้า</span>
        </a>
        <div id="menustorage" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">รายการ:</h6>
            <a class="collapse-item " href="<?php echo base_url();?>product">รายการสินค้า</a>
            <a class="collapse-item" href="<?php echo base_url();?>product/product_category">หมวดหมู่สินค้า</a>
            <a class="collapse-item" href="<?php echo base_url();?>supplier">ผู้ผลิต/ร้านค้าส่ง</a>
            <a class="collapse-item" href="<?php echo base_url();?>product/storage">คลังสินค้า/สาขา</a>
          </div>
        </div>  
      </li> -->


       <!-- Nav Item - Pages Collapse Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menupayment" aria-expanded="true" aria-controls="menupayment">
          <i class='fas fa-user-tie'></i>
          <span>การเงิน</span>
        </a>
        <div id="menupayment" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">การเงิน:</h6>
            <a class="collapse-item"  href="<?php echo base_url();?>payment">การชำระเงิน</a>
            <a class="collapse-item" href="<?php echo base_url();?>payment">การยกเลิก</a>
            <a class="collapse-item" href="<?php echo base_url();?>payment">การคืนเงิน/คืนสินค้า</a>
          </div>
        </div>
      </li> -->


       <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menupomotion" aria-expanded="true" aria-controls="menupomotion">
          <i class="fas fa-fw fa-cog"></i>
          <span>การตลาด</span>
        </a>
        <div id="menupomotion" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>marketing_center">จัดการโปรโมชัน/ส่วนลด</a>
         <!--    <a class="collapse-item" href="cards.html">เพิ่มสินค้า</a>
            <a class="collapse-item" href="cards.html">สมุดราคา</a>
            <a class="collapse-item" href="cards.html">ซัพพลายเออร์</a> -->
          </div>
        </div>
      </li>

       <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menureport" aria-expanded="true" aria-controls="menureport">
          <i class="fas fa-fw fa-cog"></i>
          <span>รายงาน</span>
        </a>
        <div id="menureport" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">ยอดขาย</h6>
            <a class="collapse-item" href="<?php echo base_url();?>product">ยอดขายรายวัน</a>
            <a class="collapse-item" href="<?php echo base_url();?>product">ยอดขายเดือน</a>
         <!--    <a class="collapse-item" href="cards.html">เพิ่มสินค้า</a>
            <a class="collapse-item" href="cards.html">สมุดราคา</a>
            <a class="collapse-item" href="cards.html">ซัพพลายเออร์</a> -->
          </div>

         
        </div>
      </li>


       <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url();?>cost">
          <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
          <i class='far fa-file-alt'></i>
          <span>ค่าใช้จ่าย</span></a>
      </li>


       <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url();?>accounting">
          <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
          <i class='far fa-file-alt'></i>
          <span>ระบบบัญชี</span></a>
      </li>

        <!-- Nav Item - Dashboard -->
     <!--  <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url();?>order">
          <i class='far fa-file-alt'></i>
          <span>ข้อมูลเชิงลึกทางธุรกิจ</span></a>
      </li> -->

       <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url();?>order">
          <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
          <i class='far fa-file-alt'></i>
          <span>นำเข้า/ส่งออกข้อมูล</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>ตั้งค่าระบบ</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar"> 
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">ข้อมูลบริษัท:</h6>
            <a class="collapse-item" href="buttons.html">บริษัท/ร้านค้า</a>
          </div>
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">ข้อมูลผู้ใช้งาน:</h6>
            <a class="collapse-item" href="buttons.html">ข้อมูลส่วนตัว</a>
          </div>
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">ตั้งค่าระบบ:</h6>
            <a class="collapse-item" href="cards.html">ผู้ใช้งาน</a>
            <a class="collapse-item" href="cards.html">สิทธิ์การใช้งาน</a>
            <a class="collapse-item" href="cards.html">การแจ้งเตือน</a>
            <a class="collapse-item" href="cards.html">การเชื่อมต่อบริการอื่น</a>
          </div>    
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div> 
      </li>
 -->
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information header -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>


              </div>
            </li>

             <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php if ($this->session->userdata('lang') == 'english') {
                  echo "English";
                }else{
                  echo "ภาษาไทย";
                }?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                <a class="dropdown-item" href="<?php echo $this->router->class."/change/thailand"; ?>">ภาษาไทย</a>
                <a class="dropdown-item" href="<?php echo $this->router->class."/change/english"; ?>">English language</a>

              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <!-- <div class="container-fluid"> -->

         <?php echo $contents;?>

        <!-- </div> -->
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url('login/logout');?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>

  <!-- Bootbox JavaScript-->
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootbox.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootbox.locales.min.js"></script>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script  src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script  src="<?php echo base_url();?>assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <!-- <script  src="<?php echo base_url();?>assets/vendor/chart.js/Chart.min.js"></script>
   <script  src="<?php echo base_url();?>assets/vendor/chart.js/Chart.js"></script>
 -->
  <!-- Page level custom scripts -->
<!--   <script  src="<?php echo base_url();?>assets/js/demo/chart-area-demo.js"></script>
  <script  src="<?php echo base_url();?>assets/js/demo/chart-pie-demo.js"></script> -->


  <!-- Page level plugins -->
  <script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <script src="<?php echo base_url();?>assets/js/sweetalert2-8.16.3/dist/sweetalert2.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>assets/js/sweetalert2-8.16.3/dist/sweetalert2.css">
  <script src="<?php echo base_url();?>assets/js/sweetalert2-8.16.3/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>assets/js/sweetalert2-8.16.3/dist/sweetalert2.min.css">

  <!-- Page level custom scripts -->
  <script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>assets/js/demo/datatables-demo.js"></script>


   <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/jquery.dataTables.css"/>
   <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/jquery.dataTables.min.css"/>

  <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>


</body>

</html>
  