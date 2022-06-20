<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/slide.php';?>

<?php
$slide = new slide();
if(isset($_GET['type_slide'])&&isset($_GET['type'])){
	$id = $_GET['type_slide'];
	$type = $_GET['type'];
	$update_type_slide = $slide -> update_type_slide($id,$type);
}

if(isset($_GET['del_slide'])){
	$id = $_GET['del_slide'];
	$delete_slide = $slide -> delete_slide($id);
}

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách slide</h2>
        <div class="block"> 
		<?php
		if(isset($delete_slide)){
			echo $delete_slide;
		}
		?> 
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên slide</th>
					<th>Hình ảnh</th>
					<th>Trạng thái</th>
					<th>Hành động</th>
				</tr>
			</thead>
			<tbody>
					<?php
						$get_slide = $slide -> show_slide_list();
						if($get_slide){
							$i=0;
							while($result_slide = $get_slide -> fetch_assoc()){
								$i++;
					?>
					
				<tr class="odd gradeX">
					
					<td><?php echo $i;?></td>
					<td><?php echo $result_slide['slide_name'] ?></td>
					<td><img src="upload/<?php echo $result_slide['slide_image'] ?>" height="80px" width="100px" alt="<?php echo $result_slide['slide_name'] ?>" /></td>				
					<td>
					<?php
					if($result_slide['slide_type']==1){
						echo 'Bật';
					}elseif($result_slide['slide_type']==0){
						echo 'Tắt';
					}
					?>
					</td>
				<td>
					<a href="?type_slide=<?php echo $result_slide['slide_id'] ?> & type=<?php echo $result_slide['slide_type']?>">
					<?php
					if($result_slide['slide_type']==1){
						echo 'Tắt';
					}elseif($result_slide['slide_type']==0){
						echo 'Bật';
					}
					?></a> 
					||
					<a href="?del_slide=<?php echo $result_slide['slide_id'] ?>" onclick="return confirm('Bạn thực sự có muốn xóa ?');" >Xoá</a> 
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
