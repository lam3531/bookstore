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
$id = session::get('admin_id');
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Hồ sơ</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Tên admin</th>
							<th>Email admin</th>
                            <th>Chức vụ</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$profile_admin = $admin -> profile_admin($id);
						if($profile_admin){
							$result = $profile_admin -> fetch_assoc();
                            $id = $result['admin_id'];
						?>
						<tr class="odd gradeX">
							<td><?php echo $result['admin_name'] ?></td>
							<td><?php echo $result['admin_email'] ?></td>
                            <td><?php if($result['level']==0){
                                echo 'Chủ cửa hàng';
                            }elseif ($result['level']==1) {
                                echo 'Quản lý';
                            }elseif ($result['level']==2) {
                                echo 'Nhân viên';
                            }
                             ?></td>
						</tr>
						<?php
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