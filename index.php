<?php
include 'inc/header.php';
include 'inc/slider.php';
?>

 <div class="main">
	
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3 style="color:rgb(211,51,25); font-family: 'Poppins', sans-serif; font-weight: bold;">Sản phẩm nổi bật</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
			  <?php
				$product_feature = $product -> getproduct_feature();
				if($product_feature){
					while($result = $product_feature -> fetch_assoc()){
			  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="detail.php"><img src="admin/upload/<?php echo $result['product_image'] ?>"width="1600" height="150" alt="" /></a>
					 <h2 style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif; font-weight:bold;"><?php echo $result['product_name'] ?></h2>
					 <!-- <p><?php echo $result['product_desc']?></p> -->
					 <p style="color:rgb(211,51,25); font-family: 'Poppins', sans-serif; font-weight: bold;"><span class="price"><?php echo $fm -> format_currency($result['product_price'])." VNĐ"?></span></p>
				     <div class="button"><span><a href="detail.php?proid=<?php echo $result['product_id']?>" class="details">Xem thêm</a></span></div>
				</div>
				<?php
					}
				}
				?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3 style="color:rgb(211,51,25); font-family: 'Poppins', sans-serif; font-weight: bold;">Sản phẩm mới</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			<?php
				$product_new = $product -> getproduct_new();
				if($product_new){
					while($result_new = $product_new -> fetch_assoc()){
			?>
				<div class="grid_1_of_4 images_1_of_4" style="text-align:center;">
					<a href="detail.php"><img src="admin/upload/<?php echo $result_new ['product_image'] ?>"width="2000" height="150" alt="" /></a>
					 <h2 style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif; font-weight:bold;"><?php echo $result_new ['product_name'] ?></h2>
					 <!-- <p><?php echo $result_new ['product_desc']?></p> -->
					 <p style="color:rgb(211,51,25); font-family: 'Poppins', sans-serif; font-weight: bold;"><span class="price"><?php echo $fm -> format_currency($result_new ['product_price'])." VNĐ"?></span></p>
				     <div class="button" ><span><a href="detail.php?proid=<?php echo $result_new ['product_id']?>" class="details">Xem thêm</a></span></div>
				</div>
				
				<?php
					}
				}
				?>
			</div>
			<div class="">
				<?php
				$product_all = $product -> get_all_product();
				$product_count = mysqli_num_rows($product_all);
				$product_button = ceil($product_count/4);
				echo '<p>Trang: </p>';
				for($i=1;$i<=$product_button;$i++){
					echo '<a style="margin:0 5px;" href="index.php?trang='.$i.'">'.$i.'</a>';
				}
				?>
			</div>
    </div>
	
 </div>
			</div>

			<section class="newsletter" style="padding:10px">
          <div class="container" style="background-color: white;">
            <form action="">
              <h3>Đăng kí để biết thêm thông tin mới nhất</h3>
              <input type="email" name="" placeholder="Email của bạn" id="" class="box">
              <input type="submit" value="subcribe" class="btn">
            </form>
          </div>
</section>
<?php
include 'inc/footer.php';
?>
