<?php
include 'inc/header.php';
?>

<?php
$login_check = session::get('customer_login'); 
if($login_check==false){
    header('Location:login.php');
}
?>

<?php
// if(!isset($_GET['proid']) || $_GET['proid']== NULL){
//     echo "<script> window.location = '404.php'</script>";
// } else{
//     $id = $_GET['proid'];
// }

// if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
// 	$quantity = $_POST['quantity'];
// 	$addtocart = $cart -> add_to_cart($quantity, $id);
// }
?>
<style>
h3.payment{
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    text-decoration: underline;
}

.wrapper_method{
    width: 550px;
    margin: 0 auto;
    border: 1px solid #666;
    padding: 20px;
    background: cornsilk;
    text-align: center;
}

.wrapper_method a{
    padding: 10px;
    background: red;
    color: #fff;
}

.wrapper_method h3{
    margin-bottom: 20px;
}

</style>
<div class="main">
    <div class="content">
    	<div class="section group">
            <div class="content_top">
    		<div class="heading">
    		<h3 style="color:rgb(211,51,25); font-family: 'Poppins', sans-serif; font-weight: bold;">Phương thức thanh toán</h3>
            
    		</div>
    		<div class="clear"></div>
            <div class="wrapper_method">
            <h3 class="payment" style="color:#444; font-size: 20px; font-family: 'Poppins', sans-serif; font-weight:bold;">Chọn phương thức thanh toán</h3>
            <a href="offlinepayment.php" style="font-size: 13px; font-family: 'Poppins', sans-serif;">Tiền mặt</a>
            <a href="onlinepayment.php" style="font-size: 13px; font-family: 'Poppins', sans-serif;">Chuyển khoản</a><br><br><br>
            <a style="background:grey; font-size: 13px; font-family: 'Poppins', sans-serif;" href="cart.php"><< Quay lại trang giỏ hàng</a>
            </div>
    	    </div>
        </div>
    </div>
</div>
<?php
include 'inc/footer.php';
?>

