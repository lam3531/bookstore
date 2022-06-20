<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/admin.php');
include_once ($filepath.'/../helpers/format.php');
$admin = new admin();
?>

<?php
if(!isset($_GET['admin_id']) || $_GET['admin_id']== NULL){
    echo "<script> window.location = 'login.php'</script>";
} else{
    $id = $_GET['admin_id'];
}
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thông tin Admin</h2>
                <div class="block">   
                <?php
                $get_admin = $admin -> show_admin($id);
                if($get_admin){
                    while($result = $get_admin -> fetch_assoc()){
                ?>            
                <table class="form">					
                        <tr>
                            <td>Họ và tên</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['admin_name'] ?>" name="admin_name" class="medium">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['admin_email'] ?>" name="admin_email" class="medium">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Quyền</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['level'] ?>" name="level" class="medium">
                            </td>
                        </tr>
                    </table>
                    <?php
                    }
                }
                    ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>