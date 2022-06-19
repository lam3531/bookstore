<?php
include 'inc/header.php';
// include 'inc/slider.php';
?>

<?php
if(!isset($_GET['catid']) || $_GET['catid']== NULL){
    echo "<script> window.location = '404.php'</script>";
} else{
    $id = $_GET['catid'];
}

// if($_SERVER['REQUEST_METHOD'] === 'POST'){
// 	$category_name = $_POST['category_name'];

// 	$update_category = $category -> update_category($category_name,$id);
// }

?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<?php
			$cname = $category -> caname($id);
			if($cname){
				while($resultname = $cname -> fetch_assoc()){
			?>
			<h3 style="color:rgb(211,51,25); font-family: 'Poppins', sans-serif; font-weight: bold;">Thể loại: <?php echo $resultname['category_name']?> </h3>
			<?php
				}
			}
			?>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
				<?php
				$pdbyca = $category -> get_product_by_cat_all($id);
				if($pdbyca){
					while($result = $pdbyca -> fetch_assoc()){
				?>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="preview-3.php"><img src="admin/upload/<?php echo $result['product_image']?>" width="200px" height="250px" alt="" /></a>
					 <h2 style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif; font-weight:bold;"><?php echo $result['product_name']?></h2>
					 <p><span class="price"><?php echo $fm -> format_currency($result['product_price'])." VNĐ"?></span></p>
				     <div class="button"><span><a href="detail.php?proid=<?php echo $result['product_id'] ?>" class="details">Xem thêm</a></span></div>
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
