<?php
include 'inc/header.php';
// include 'inc/slider.php';
?>


 <div class="main">
    <div class="content">
    <?php
			if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $tukhoa = $_POST['tukhoa'];
                $search_product = $product -> search_product($tukhoa);
            }
			?>
    	<div class="content_top">
    		<div class="heading">
			<h3>Từ khoá tìm kiếm: <?php echo $tukhoa ?> </h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
				<?php
				if($search_product){
					while($result = $search_product -> fetch_assoc()){
				?>
				<div class="grid_1_of_4 images_1_of_4">
				<a href="preview-3.php"><img src="admin/upload/<?php echo $result['product_image']?>" width="200px" height="250px" alt="" /></a>
					 <h2><?php echo $result['product_name']?></h2>
					 <p><span class="price"><?php echo $fm -> format_currency($result['product_price'])." VNĐ"?></span></p>
				     <div class="button"><span><a href="detail.php?proid=<?php echo $result['product_id'] ?>" class="details">Thông tin sản phẩm</a></span></div>
				</div>
				<?php
					}
				}else{
					echo 'Chưa có sản phẩm';
				}
				?>
			</div>
    </div>
 </div>
<?php
include 'inc/footer.php';
?>

