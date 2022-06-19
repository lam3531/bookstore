<?php
include 'inc/header.php';
?>
<?php
if(!isset($_GET['proid']) || $_GET['proid']== NULL){
    echo "<script> window.location = '404.php'</script>";
} else{
    $id = $_GET['proid'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
	$quantity = $_POST['quantity'];
	$addtocart = $cart -> add_to_cart($quantity, $id);
}

if(isset($_POST['comment_submit'])){
	$comment = $customer -> insert_comment();
}
?>
<div class="main">
    <div class="content">
    	<div class="section group">
			<?php
			$get_product_detail = $product -> get_detail($id);
			if($get_product_detail){
				while($result_detail = $get_product_detail -> fetch_assoc()){

			?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/upload/<?php echo $result_detail ['product_image'] ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2 style="color:#444; font-family: 'Poppins', sans-serif; font-weight: bold;"><?php echo $result_detail['product_name'] ?></h2>
					<p></p>					
					<div class="price">
						<p style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif;">Giá: <span><?php echo $fm -> format_currency($result_detail['product_price'])." VNĐ"?></span></p>
						<p style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif;">Thể loại: <span><?php echo $result_detail['category_name'] ?></span></p>
						<p style="color:s#444; font-size: 13px; font-family: 'Poppins', sans-serif;">Tác giả: <span><?php echo $result_detail['brand_name'] ?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<p style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif;"> Số lượng: </p>
						<input type="number" class="buyfield" name="quantity" value="1" min="1"/>
						<input type="submit" class="buysubmit" style="background-color: rgb(211,51,25);" name="submit" value="Thêm vào giỏ hàng"/>
					</form>
					<?php
						if(isset($addtocart)){
							echo '<span style="color: red; font-size:18px;">Sản phẩm đã có trong giỏ hàng </span>';
						}
					?>			
				</div>
			</div>
			<div class="product-desc">
			<h2 style="background-color: rgb(211,51,25); font-family: 'Poppins', sans-serif; font-weight: bold;">Chi tiết sản phẩm</h2>
			<p><?php echo $result_detail['product_desc']?></p>
	    </div>
				
	</div>
	<?php
					}
				}
	?>
				<div class="rightsidebar span_3_of_1">
					<h2 style="color:#444; font-family: 'Poppins', sans-serif; font-weight: bold;">Thể loại</h2>
					<?php
					$get_all_category = $category -> show_category_front();
					if($get_all_category){
						while($result_all = $get_all_category -> fetch_assoc()){
					?>
					<ul>
				      <li><a href="productbycat.php?catid=<?php echo $result_all['category_id'] ?>"><?php echo $result_all['category_name'] ?></a></li>
					<?php
						}
					}
					?>
    				</ul>
 				</div>
 		</div>
 	</div>
	<div class="comment_info">
	<div class="row">
	<div class="col-md-8">
	<h5 style="color:#444; font-family: 'Poppins', sans-serif; font-weight: bold;">Ý kiến khách hàng</h5>
	<?php
	if(isset($comment)){
		echo $comment;
	}
	?>
	<form action="" method="POST">
	<p><input type="hidden" value="<?php echo $id ?>" name="product_id"></p>
	<p><input type="text" placeholder="Họ và tên" class="form-control" name="customer_name"></p>
	<p><textarea rows="5" style="resize:none;" name="comment_info" class="form-control" placeholder="Bình luận"></textarea></p>
	<p><input type="submit" style="background-color: rgb(211,51,25);" name="comment_submit" class="btn btn-success" value="Gửi"></p>
	</form>
	</div>
	</div>
	</div>
</div>
<?php
include 'inc/footer.php';
?>

