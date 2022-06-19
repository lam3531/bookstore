<?php
include 'inc/header.php';
?>

<?php

if(isset($_GET['cartid'])){
    $cartid = $_GET['cartid'];
	$delete_cart = $cart -> delete_cart($cartid);
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
	$cart_id = $_POST['cart_id'];
	$quantity = $_POST['quantity'];
	$update_quantity_cart = $cart -> update_quantity_cart($quantity, $cart_id);
	if($quantity==0){
		$delete_cart = $cart -> delete_cart($cart_id);
	}
}
?>

<?php
if(!isset($_GET['id'])){
	echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
}
?>

<div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2 style="color:rgb(211,51,25); font-family: 'Poppins', sans-serif; font-weight: bold;">Giỏ hàng</h2>
					<?php
					if(isset($update_quantity_cart)){
						echo $update_quantity_cart;
					}
					?>
						<table class="tblone" style="font-family: 'Poppins', sans-serif; font-weight:bold;">
							<tr>
								<th width="20%">Tên sản phẩm</th>
								<th width="10%">Hình ảnh</th>
								<th width="15%">Giá</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Tổng số tiền</th>
								<th width="10%">Hành động</th>
							</tr>
							<?php
							
							$get_product_cart = $cart -> get_product_cart();
							if($get_product_cart){
								$sum = 0;
								$qty = 0;
								while($result = $get_product_cart -> fetch_assoc()){

							?>
							<tr>
								<td><?php echo $result['product_name']?></td>
								<td><img src="admin/upload/<?php echo $result['product_image']?>" alt=""></td>
								<td><?php echo $fm -> format_currency($result['product_price']). " VNĐ"?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cart_id" value="<?php echo $result['cart_id']?>"/>
										<input type="number" name="quantity" min="0" value="<?php echo $result['quantity']?>"/>
										<input type="submit" name="submit" value="Cập nhật"/>
									</form>
								</td>
								<td><?php
								$total = $fm -> format_currency($result['product_price'] * $result['quantity']). " VNĐ";
								$sum = ($result['product_price'] * $result['quantity']) + $sum;
								$fil = $sum + $sum * 0.1;
								echo $total;
								$qty = $qty + $result['quantity'];
								?></td>
								<td><a onclick="return confirm('Bạn thực sự có muốn xóa ?')" href="?cartid=<?php echo $result['cart_id'] ?>">Xoá</a></td>
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
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th style="color:#444; font-size: 15px; font-family: 'Poppins', sans-serif; font-weight:bold;">Tổng: </th>
								<td><?php
								
								echo $fm -> format_currency($sum)." VNĐ";
								session::set('sum',$sum);
								session::set('qty',$qty);
								?></td>
							</tr>
							<tr>
								<th style="color:#444; font-size: 15px; font-family: 'Poppins', sans-serif; font-weight:bold;">Phí VAT: </th>
								<td>10%</td>
							</tr>
							<tr>
								<th style="color:#444; font-size: 15px; font-family: 'Poppins', sans-serif; font-weight:bold;">Giá cuối:</th>
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
					<div class="shopping">
						<div class="shopleft">
						<button class="ml-auto" style="border-style:none; background-color:white;"><a href="index.php" style="color: white; text-decoration: none; font-size: 25px;
    background-color: rgb(177, 37, 15);border-radius: 10px; 
    padding: 5px;">Tiếp tục mua hàng</a> </button>
						</div>
						<div class="shopright">
						<button class="ml-auto" style="border-style:none; background-color:white;"><a href="payment.php" style="color: white; text-decoration: none; font-size: 25px;
    background-color: rgb(177, 37, 15);border-radius: 10px;padding: 5px;"> Đặt hàng và thanh toán </a></button>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php
include 'inc/footer.php';
?>
