<?php 
include 'inc/header.php';
?>

<?php 
include 'inc/sidebar.php';
?>

<?php
include '../classes/admin.php';
?>

<?php
$admin = new admin();
if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
	$delete_admin = $admin -> delete_admin($id);
}

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách admin</h2>
                <div class="block">
				<?php
                if(isset($delete_admin)){
                    echo $delete_admin;
                }
                ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên admin</th>
							<th>Email admin</th>
							<th>Tùy biến</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$show_admin = $admin -> show_admin();
						if($show_admin){
							$i = 0;
							while($result = $show_admin -> fetch_assoc()){
								$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['admin_name'] ?></td>
							<td><?php echo $result['admin_email'] ?></td>
							<td><a href="admin-edit.php?admin_id=<?php echo $result['admin_id'] ?>">Sửa</a> || <a onclick="return confirm('Bạn thực sự có muốn xóa ?')" href="?delete_id=<?php echo $result['admin_id'] ?>">Xóa</a></td>
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