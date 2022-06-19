<?php
include 'inc/header.php';
?>
<?php
$login_check = session::get('customer_login');
if($login_check==false){
    header('Location:login.php');
}
?>

<style>
.block_left{
    margin-top: 10px;
    width: 100%;
    border: 1px solid #666;
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
</style>
<form action="" method="POST">
<div class="main">
    <div class="content">
    	<div class="section group">
        <div class="content_top">
    		<div class="heading">
    		<h3 style="color:rgb(211,51,25); font-family: 'Poppins', sans-serif; font-weight: bold;">Chi tiết đơn hàng</h3>
    		</div>
            <div class="clear"></div>
 		</div>
        <div class="block_left">
        <div class="cartpage">
			    	<form action="" method="post">
						<table class="tblone" style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif; font-weight:bold;">
							<tr>
								<th width="5%">STT</th>
								<th width="15%">Tên sản phẩm</th>
								<th width="10%">Hình ảnh</th>
                                <th width="10%">Giá</th>
								<th width="10%">Số lượng</th>
								<th width="15%">Ngày đặt</th>
								<th width="10%">Tổng</th>
								<th width="25%">Tình trạng</th>
							</tr>
							<?php
							$customer_id = session::get('customer_id');
							$get_product_ordered = $cart -> get_product_ordered($customer_id);
							if($get_product_ordered){
								$i = 0;
								while($result = $get_product_ordered -> fetch_assoc()){
                                    $i++;
							?>
							<tr>
								<td><?php echo $i?></td>
								<td><?php echo $result['product_name']?></td>
								<td><img src="admin/upload/<?php echo $result['product_image'] ?>" alt=""></td>
								<td><?php echo $fm -> format_currency($result['product_price'])." VNĐ"?></td>
								<td><?php echo $result['quantity']?></td>
								<td><?php echo $fm -> formatDate($result['date_order'])?></td>
								<td><?php
								$total = $result['product_price'];
                                $vat = $total * 0.1;
								// $sum = ($result['product_price'] * $result['quantity']) + $sum;
								$fil = $total + $vat;
								// $qty = $qty + $result['quantity'];
                                echo $fm -> format_currency($fil)." VNĐ";
								?></td>
                                <td>
                                <?php
                                if($result['status']==0){
                                    echo 'Đơn hàng đang được xử lý';
                                } elseif($result['status']==1){
                                    echo 'Đơn hàng đã được xác nhận';
                                } elseif($result['status']==2){
                                    echo 'Đơn hàng đã được gửi cho bên giao hàng';
                                } elseif($result['status']==3){
                                    echo 'Đã nhận hàng';
                                }
                                ?>
                                </td>
							</tr>
                            <?php
                                }
                            }
                            ?>
                            <tr>
                                <td colspan="3"><input type="submit" name="update" value="Cập nhật" style="font-size:19px;background:rgb(211,51,25);cursor:pointer;color:white;"></td>
                            </tr>
						</table>
                        </form>
					</div>
        </div>
        
 	</div>
    <br>
</div> 
                        </div>
</form>
<?php
include 'inc/footer.php';
?>


