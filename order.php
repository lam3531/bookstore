<?php
include 'inc/header.php';
?>

<?php
$login_check = session::get('customer_login');
if($login_check==false){
header('Locatin: login.php');
}
?>

<style>
    h3{
        font-size: 30px;
        font-weight: bold;
        color: aqua;
    }
</style>
<div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
    	        <div class="order_page">
                    <h3>Đơn hàng</h3>
                </div>
            </div>
        </div>	
       <div class="clear">

       </div>
    </div>
</div>
<?php
include 'inc/footer.php';
?>