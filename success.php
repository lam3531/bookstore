<?php
include 'inc/header.php';
?>
<?php
if(isset($_GET['orderid']) && $_GET['orderid']== 'order_id'){
    $customer_id = session::get('customer_id');
    $insert_order = $cart -> insert_order($customer_id);
    $delcart = $cart -> del_all_data_cart();
    header('Location:success.php');
}
?>
<style>

h2.success_order{
    text-align: center;
    color: red;
}

p.success_note{
    text-align:center;
    padding:8px;
    font-size:17px;
}

</style>
<form action="" method="POST">
<div class="main">
    <div class="content">
    	<div class="section group">
        <h2 class="success_order">Đặt hàng thành công</h2><br>
        <p class="success_note">Cảm ơn bạn đã mua hàng</p>
        <p class="success_note">Kiểm tra đơn hàng của bạn tại<a href="orderdetail.php"> đây</a></p>
        </div>
        
 	</div>
</div>
</form>
<?php
include 'inc/footer.php';
?>


