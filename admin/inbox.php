<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../classes/cart.php');
include_once ($filepath.'/../classes/customer.php');
include_once ($filepath.'/../helpers/format.php');

$fm = new Format();
$cart = new cart();
$customer = new customer();
?>

<?php
if(isset($_GET['shipid'])){
    $id = $_GET['shipid'];
	$time = $_GET['time'];
	$price = $_GET['price'];
	$status = $_GET['status'];
	$ship = $cart -> ship($id,$time,$price,$status);
}
?>

<?php
if(isset($_GET['delid'])){
    $id = $_GET['delid'];
	$time = $_GET['time'];
	$price = $_GET['price'];
	$status = $_GET['status'];
	$del = $cart -> del($id,$time,$price);
}
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">
				<?php
				if(isset($ship)){
					echo $ship;
				}
				?>     
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Thời gian đặt</th>
							<th>Sản phẩm</th>
							<th>Giá</th>
							<th>Thông tin khách hàng</th>
							<th>Tình trạng đơn hàng</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$cart = new cart();
						$get_inbox_cart = $cart -> get_inbox_cart();
						if($get_inbox_cart){
							$i=0;
							while($result = $get_inbox_cart -> fetch_assoc()){
								$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo $fm -> formatDate($result['date_order'])?></td>
							<td><?php echo $result['product_name']?></td>
							<td><?php echo $fm -> format_currency($result['product_price'])." VNĐ"?></td>
							<td><a href="customer.php?customer_id=<?php echo $result['customer_id']?>">Xem thông tin khách hàng</a></td>
							
							<td>
							<?php
                                if($result['status']==0){
                                    echo 'Đơn hàng đang được xử lý';
                                } elseif($result['status']==1){
                                    echo 'Đơn hàng đã được xử lý';
                                } elseif($result['status']==2){
                                    echo 'Đơn hàng đã được gửi cho bên giao hàng';
                                } elseif($result['status']==3){
                                    echo 'Đã nhận hàng';
                                }
                                ?>
							</td>
							
							<td>
							<?php
							if($result['status']==0){
							?>

							<a href="?shipid=<?php echo $result['order_id'] ?>&price=<?php echo $result['product_price'] ?>&time=<?php echo $result['date_order'] ?>&status=<?php echo $result['status'] ?>">Xác nhận</a>
							
							<?php
							}elseif($result['status']==1){
							?>

							<a href="?shipid=<?php echo $result['order_id'] ?>&price=<?php echo $result['product_price'] ?>&time=<?php echo $result['date_order'] ?>&status=<?php echo $result['status'] ?>">Vận chuyển</a>
							
							<?php
							}elseif($result['status']==2){
							?>
							<a href="?shipid=<?php echo $result['order_id'] ?>&price=<?php echo $result['product_price'] ?>&time=<?php echo $result['date_order'] ?>&status=<?php echo $result['status'] ?>">Giao hàng</a>
							
							<?php
							}elseif($result['status']==3){
							?>
							<a href="?delid=<?php echo $result['order_id'] ?>&price=<?php echo $result['product_price'] ?>&time=<?php echo $result['date_order'] ?>&status=<?php echo $result['status'] ?>">Xoá</a>
							<?php
							}
							?>
							</td>
						</tr>
						<?php
							}
						}
						?>
					</tbody>
					</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
