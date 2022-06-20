<?php 
include 'inc/header.php';
?>

<?php 
include 'inc/sidebar.php';
?>

<?php
include '../classes/category.php';
?>

<?php
$category = new category();
if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
	$delete_category = $category -> delete_category($id);
}

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách danh mục</h2>
                <div class="block">
				<?php
                if(isset($delete_category)){
                    echo $delete_category;
                }
                ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên danh mục</th>
							<th>Tùy biến</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$show_category = $category -> show_category();
						if($show_category){
							$i = 0;
							while($result = $show_category -> fetch_assoc()){
								$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['category_name'] ?></td>
							<td><a href="category-edit.php?category_id=<?php echo $result['category_id'] ?>">Sửa</a> || <a onclick="return confirm('Bạn thực sự có muốn xóa ?')" href="?delete_id=<?php echo $result['category_id'] ?>">Xóa</a></td>
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

