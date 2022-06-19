<div class="header_bottom">
		<div class="header_bottom_left">
		<?php
		$getLastestA = $product -> getLastestA();
		if($getLastestA){
			while($resultA = $getLastestA -> fetch_assoc()){
		?>
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="detail.php"> <img src="admin/upload/<?php echo $resultA['product_image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2 style="font-family: 'Poppins', sans-serif; font-weight: bold;">Văn học</h2>
						<p style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif;"><?php echo $resultA['product_name'] ?></p>
						<div class="button" ><span ><a href="detail.php?proid=<?php echo $resultA['product_id']?>">Xem thêm</a></span></div>
				   </div>
			   </div>
			   	<?php
			   		}
				}
			   	?>

			   	<?php
				$getLastestB = $product -> getLastestB();
				if($getLastestB){
					while($resultB = $getLastestB -> fetch_assoc()){
				?>		
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="detail.php"><img src="admin/upload/<?php echo $resultB['product_image'] ?>" alt=""></a>
					</div>
					<div class="text list_2_of_1">
						  <h2 style="font-family: 'Poppins', sans-serif; font-weight: bold;">Sách Nước Ngoài</h2>
						  <p style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif;"><?php echo $resultB['product_name'] ?></p>
						  <div class="button"><span><a href="detail.php?proid=<?php echo $resultB['product_id']?>">Xem thêm</a></span></div>
					</div>
				</div>
			</div>
				<?php
			   		}
				}
			   	?>

				<?php
				$getLastestC = $product -> getLastestC();
				if($getLastestC){
					while($resultC = $getLastestC -> fetch_assoc()){
				?>
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="detail.php"> <img src="admin/upload/<?php echo $resultC['product_image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2 style="font-family: 'Poppins', sans-serif; font-weight: bold;">Thiếu Nhi</h2>
						<p style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif;"><?php echo $resultC['product_name'] ?></p>
						<div class="button"><span><a href="detail.php?proid=<?php echo $resultC['product_id']?>">Xem thêm</a></span></div>
				   </div>
			   </div>	
			   <?php
			   		}
				}
			   	?>

				<?php
				$getLastestD = $product -> getLastestD();
				if($getLastestD){
					while($resultD = $getLastestD -> fetch_assoc()){
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="detail.php"><img src="admin/upload/<?php echo $resultD['product_image'] ?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2 style="font-family: 'Poppins', sans-serif; font-weight: bold;">Sách Giáo Khoa</h2>
						  <p style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif;"><?php echo $resultD['product_name'] ?></p>
						  <div class="button"><span><a href="detail.php?proid=<?php echo $resultD['product_id']?>">Xem thêm</a></span></div>
					</div>
				</div>
				<?php
			   		}
				}
			   	?>
			</div>
			
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<?php
						$get_slide = $slide -> show_slide();
						if($get_slide){
							while($result_slide = $get_slide -> fetch_assoc()){
						?>
						<li><img src="admin/upload/<?php echo $result_slide['slide_image'] ?>" alt="<?php echo $result_slide['slide_name'] ?>" height="80px" width="100px" /></li>
						<?php
							}
						}
						?>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>