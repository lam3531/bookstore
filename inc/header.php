<?php
$filepath = realpath(dirname(__FILE__));
include "lib/session.php";
session::init();
?>

<?php
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
include_once ($filepath.'/../classes/product.php');
include_once ($filepath.'/../classes/cart.php');
include_once ($filepath.'/../classes/user.php');
include_once ($filepath.'/../classes/category.php');
include_once ($filepath.'/../classes/customer.php');
include_once ($filepath.'/../classes/slide.php');

$db = new Database();
$fm = new Format();
$cart = new cart();
$user = new user();
$category = new category();
$customer = new customer();
$product = new product();
$slide = new slide();
?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE HTML>
<head>
<title>Book Store</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/newsletter.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>



</head>
<body>
	<div class="banner1" style="background-color: rgb(252,236,141); text-align: center;">
    	<img src="images/052022_bigsaleresize_1263.jpg">
    </div>
  <div class="wrap">
		<div class="header_top" style="padding: 0px;">
			<div class="logo" style="text-align:center; padding: 2.5rem 7%;">
				<a href="index.php" class="logo-1" style="font-size: 3rem; font-weight: bolder; color: #444; text-decoration: none;"><i class="fas fa-book" style="color: rgb(211,51,25);"></i> Book Store</a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form action="search.php" method="post">
				    	<input type="text" placeholder="Tìm kiếm" name="tukhoa">
						<input type="submit" name="search_product" value="Tìm kiếm">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="cart.php" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Giỏ hàng</span>
								<span class="no_product">
								<?php 
								$check_cart = $cart -> check_cart();
								if($check_cart){
									$all = session::get("sum");  
									$qty = session::get("qty");  
									echo $qty. ' Sản phẩm';
								} else{
									echo 'trống';
								}
								?></span>
							</a>
						</div>
			      </div>
		   <?php
		   if(isset($_GET['customer_id'])){
				$delcart = $cart -> del_all_data_cart();
				session::destroy();
		   }
		   ?>
		   <div class="login">
		   <?php
		   $login_check = session::get('customer_login');
		   if($login_check==false){
			echo '<a href="login.php">Đăng nhập</a>';
		   }else{
			echo '<a href="?customer_id='.session::get('customer_id').'">Đăng xuất</a>';
		   }
		   ?>
		   </div>
		   
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu" >
	<ul id="dc_mega-menu-orange" class="dc_mm-orange" >
	  <li><a href="index.php">Trang chủ</a></li>
	  <li><a href="products.php">Danh mục sản phẩm</a> </li>
	  <!-- <li><a href="topbrands.php">Sản phẩm thịnh hành</a></li> -->
	  <?php
	  $check_cart = $cart -> check_cart();
	  if($check_cart==true){
		  echo '<li><a href="cart.php">Giỏ hàng</a></li>';
	  }else{
		  echo '';
	  }
	  ?>
	  
	  <?php
	  $customer_id = session::get('customer_id');
	  $check_order = $cart -> check_order($customer_id);
	  if($check_order==true){
		  echo '<li><a href="orderdetail.php">Chi tiết đơn hàng</a></li>';
	  }else{
		  echo '';
	  }
	  ?>
	  <li><a href="contact.php">Hỗ trợ</a> </li>
	  <?php
	 	$login_check = session::get('customer_login'); 
		if($login_check==false){
			echo '';
		}else{
			echo '<li><a href="profile.php">Thông tin</a></li>';
		}
	  ?>
	  <div class="clear"></div>
	</ul>
</div>


