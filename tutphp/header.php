<!DOCTYPE html>
<html lang="">
<head>
<title>Cửa hàng Trường Phát</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="user/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<!-- Bootstrap core JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      
      <!-- Third party plugin JS-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
      <!-- Contact form JS-->
   
      <!-- Core theme JS-->
      <script src="user/layout/scripts/script.js"></script>
</head>
<?php
    session_start();
    error_reporting(0);
    // session_destroy(); 
    if($_SESSION['login'] == true && $_SESSION['level'] != 0)
    {
      session_destroy();
      header('Location: '.'index.php');
    }
    if(isset($_POST['login']))
    {
        header('Location: '.'login.php');
        //redirectUrl('login.php');
    }
    if(isset($_POST['logout']))
    {
        unset($_SESSION['login']);
          // session_unset($_SESSION["login"]);
          if(isset($_SESSION['login']))
          {
              $_SESSION['login'] = false;
              //session_unset($_SESSION["login"]);
          }
          if(isset($_SESSION['email']))
          unset($_SESSION['email']);
          if(isset($_SESSION['password']))
          unset($_SESSION['password']);
          
    }
?>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div  id="topbar" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="fl_left">
      <ul class="nospace">
        <li><a href="index.php"><i style="font-size:15px;" class="fas fa-home fa-lg"> Trang chủ</i></a></li>
        <li><a href="javascript:void(0)">Thanh Tìm Kiếm</a></li>
        <li><a href="javascript:void(0)">Thanh Drop down</a></li>
        <li><a class="js-scroll-trigger" href="#giamgia">Siêu giảm giá</a></li>
        <li><a class="js-scroll-trigger" href="#moinhat">Sản phẩm mới nhất</a></li>
      </ul>
    </div>
    <form action="" method="post">
        <div class="fl_right">
          <ul class="nospace">
            <?php 
              if(isset($_SESSION['login']) && $_SESSION['login'] == true)
              {
                ?>
                 <li>
                 <?php
                     echo  $_SESSION["email"];
                    ?>
                  </li>
                  <li>
                        <!-- <button style="background: transparent; border: none" type="submit" name="logout" value="logout"><a class="rgtspace-5" href="">Đăng xuất</a></button> -->
                        <input type="submit" name="logout"  value="ĐĂNG XUẤT"  style="background: transparent; border: none; cursor: pointer;" >
                  </li>
                  <?php 
                  if($_SESSION['level'] != 0)
                  {
                    ?>
                  <li>
                      <a href="admin/index.php"><i style="font-size:15px;" class="fas fa-home fa-lg"> QTV</i></a>
                  </li>
                  <?php 
                  }
                  else
                  {
                    ?>
                  <li>
                      <a href="cart.php"><i style="color:white; font-size:20px;" class="fas fa-shopping-cart"></i></a>
                  </li>
              <?php
                  }
              }
              else
                {?>
                <li>
                      <!-- <button style="background: transparent; border: none" type="submit" name="login" value="login"><i class="rgtspace-5">Đăng nhập</i></button> -->
                    <input  type="submit"  name="login"  value="ĐĂNG NHẬP" style="background: transparent; border: none; cursor: pointer;">
                  </li>
                <?php
              }
            ?>
          </ul>
        </div>
    </form>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="one_half first">
      <h1 class="logoname"><a href="index.php"><span>TP</span>computer</a></h1>
    </div>
    <div class="one_half">
      <ul class="nospace clear">
        <li class="one_half first">
          <div class="block clear"><i class="fas fa-phone"></i> <span><strong class="block">Gọi cho chúng tôi:</strong> +0898 396 140</span> </div>
        </li>
        <li class="one_half">
          <div class="block clear"><i class="far fa-clock"></i> <span><strong class="block"> Thứ 2 - Thứ 7 :</strong> 08.00am - 18.00pm</span> </div>
        </li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </header>
  <nav id="mainav" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <ul class="clear">
        <li><a href="/websitephp/cpu.php">CPU -  Bộ Xử Lí</a></li>
        <li><a href="/websitephp/ram.php">RAM</a></li>
        <li><a href="/websitephp/ssd.php">Ổ cứng SSD</a></li>
        <li><a href="/websitephp/hdd.php">Ổ cứng HDD</a></li>
        <li><a href="/websitephp/odd.php">ODD - Ổ đĩa quang</a></li>
        <li><a href="/websitephp/vga.php">VGA - Card Màn Hình</a></li>
        <li><a href="/websitephp/psu.php">PSU - Nguồn Máy Tính</a></li>
    </ul>
    <!-- ################################################################################################ -->
  </nav>
</div>
