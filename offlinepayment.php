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
.a{
    text-decoration:none;
}

.block_left{
    margin-top: 10px;
    width: 50%;
    border: 1px solid #666;
    float: left;
    padding: 4px;
}

.block_right{
    margin-top: 10px;
    width: 45%;
    border: 1px solid #666;
    float: right;
    padding: 4px;
}

.submit_order{
    padding: 10px 70px;
    border: none;
    background: red;
    font-size: 25px;
    color: #fff;
    border-radius: 5%;
    margin: 10px;
    cursor:pointer;
}

.back{
    padding: 10px 70px;
    border: none;
    background: grey;
    font-size: 25px;
    color: #fff;
    border-radius: 5%;
    margin: 10px;
    cursor:pointer;
}
</style>
<form action="" method="POST">
<div class="main">
    <div class="content">
    	<div class="section group">
        <div class="content_top">
    		<div class="heading">
    		<h3 style="color:rgb(211,51,25); font-family: 'Poppins', sans-serif; font-weight: bold;">Tiền mặt</h3>
    		</div>
            <div class="clear"></div>
 		</div>
        <div class="block_left">
        <div class="cartpage">
			    	<h2 style="color:rgb(211,51,25); font-family: 'Poppins', sans-serif; font-weight: bold;">Giỏ hàng</h2>
					<?php
					if(isset($update_quantity_cart)){
						echo $update_quantity_cart;
					}
					?>
						<table class="tblone" style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif; font-weight:bold;">
							<tr>
								<th width="5%">STT</th>
								<th width="15%">Tên sản phẩm</th>
								<th width="15%">Giá</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Tổng số tiền</th>
							</tr>
							<?php
							
							$get_product_cart = $cart -> get_product_cart();
							if($get_product_cart){
								$sum = 0;
								$qty = 0;
                                $i=0;
								while($result = $get_product_cart -> fetch_assoc()){
                                    $i++;

							?>
							<tr>
								<td><?php echo $i?></td>
								<td><?php echo $result['product_name']?></td>
								<td><?php echo $fm -> format_currency($result['product_price']). " VNĐ"?></td>
								<td><?php echo $result['quantity']?></td>
								<td><?php
								$total = $fm -> format_currency($result['product_price'] * $result['quantity']). " VNĐ";
								$sum = ($result['product_price'] * $result['quantity']) + $sum;
								$fil = $sum + $sum * 0.1;
								echo $total;
								$qty = $qty + $result['quantity'];
								?></td>
							</tr>
							<?php
								}
							}
							?>
						</table>
						<?php
						$check_cart = $cart -> check_cart();
						if($check_cart){
						?>
						<table style="float:right;text-align:left;margin:5px;" width="40%">
							<tr>
								<br><th style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif; font-weight:bold;">Tổng: </th>
								<td><?php
								
								echo $fm -> format_currency($sum)." VNĐ";
								session::set('sum',$sum);
								session::set('qty',$qty);
								?></td>
							</tr>
							<tr>
								<th style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif; font-weight:bold;">Phí VAT: </th>
								<td>10% (<?php echo $fm -> format_currency($vat = $sum * 0.1) ." VNĐ" ?>)</td>
							</tr>
							<tr>
								<th style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif; font-weight:bold;">Giá cuối:</th>
								<td><?php
								echo $fm -> format_currency($fil)." VNĐ";
								?></td>
							</tr>
					   </table>
					   <?php
						}else{
							echo 'Giỏ hàng trống';
						}
					   ?>
					</div>
        </div>
        <div class="block_right">
        <table class="tblone">
            <?php
            $id = session::get('customer_id');
            $get_customer = $customer -> show_customer($id);
            if($get_customer){
                while($result = $get_customer -> fetch_assoc()){
            ?>
            <tr>
                <td style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif; font-weight:bold;">Họ và tên</td>
                <td>:</td>
                <td><?php echo $result['customer_name'] ?></td>
            </tr>
        
            <tr>
                <td style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif; font-weight:bold;">Số điện thoại</td>
                <td>:</td>
                <td><?php echo $result['customer_phone'] ?></td>
            </tr>
            
            <tr>
                <td style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif; font-weight:bold;">Email</td>
                <td>:</td>
                <td><?php echo $result['customer_email'] ?></td>
            </tr>
            
            <tr>
                <td style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif; font-weight:bold;">Căn cước công dân</td>
                <td>:</td>
                <td><?php echo $result['customer_ci'] ?></td>
            </tr>
            
            <tr>
                <td style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif; font-weight:bold;">Thành phố</td>
                <td>:</td>
                <td><?php echo $result['customer_city'] ?></td>
            </tr>
            
            <tr>
                <td style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif; font-weight:bold;">Quận</td>
                <td>:</td>
                <td><?php echo $result['customer_district'] ?></td>
            </tr>
            
            <tr>
                <td style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif; font-weight:bold;">Địa chỉ</td>
                <td>:</td>
                <td><?php echo $result['customer_address'] ?></td>
            </tr>
            
            <tr>
                <td colspan="2"><a href="profile-edit.php">Cập nhật hồ sơ</a></td>
            </tr>

            <?php
                }
            }
            ?>

        </table>
        </div>
        
 	</div>
    <br>
    <center><a href="?orderid=order_id" class="submit_order">Đặt mua</a></center><br>
    <center><a href="payment.php" class="back">Quay lại trang phương thức thanh toán</a></center>
</div>
</form>
        </div>
<?php
include 'inc/footer.php';
?>


