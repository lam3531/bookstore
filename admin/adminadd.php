<?php 
include 'inc/header.php';
?>

<?php 
include 'inc/sidebar.php';
?>

<?php
include '../classes/admin.php';
$admin = new admin();
?>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$admin_name = $_POST['admin_name'];
	$admin_email = $_POST['admin_email'];
	$admin_user = $_POST['admin_user'];
	$admin_pass = $_POST['admin_pass'];
	$level = $_POST['level'];

	$insert_admin = $admin -> insert_admin($_POST);
}
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm admin</h2>
               <div class="block copyblock"> 
               <?php
                if(isset($insert_admin)){
                    echo $insert_admin;
                }
                ?>
                 <form action="adminadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="admin_name" placeholder="Họ và tên" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="text" name="admin_email" placeholder="Email" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="text" name="admin_user" placeholder="Tên tài khoản" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="text" name="admin_pass" placeholder="Mật khẩu" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="text" name="level" placeholder="Quyền" class="medium" />
                            </td>
                        </tr>

						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Thêm" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>