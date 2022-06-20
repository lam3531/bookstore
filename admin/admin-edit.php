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
if(!isset($_GET['admin_id']) || $_GET['admin_id']== NULL){
    echo "<script> window.location = 'catlist.php'</script>";
} else{
    $id = $_GET['admin_id'];
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$admin_name = $_POST['admin_name'];
	$admin_email = $_POST['admin_email'];
	$level = $_POST['level'];
	$update_admin = $admin -> update_admin($_POST,$id);
}

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa admin</h2>
               <div class="block copyblock"> 
               <?php
                if(isset($update_admin)){
                    echo $update_admin;
                }
                ?>
                <?php
                $get_admin_name = $admin -> getadminbyid($id);
                if($get_admin_name){
                    while($result = $get_admin_name -> fetch_assoc()){
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['admin_name'] ?>" name="admin_name" placeholder="Sửa tên admin" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['admin_email'] ?>" name="admin_email" placeholder="Sửa email admin" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['level'] ?>" name="level" placeholder="Sửa quyền admin" class="medium" />
                            </td>
                        </tr>
                        
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Sửa" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>