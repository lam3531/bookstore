<?php
include 'inc/header.php';
?>

<?php
$login_check = session::get('customer_login'); 
if($login_check==false){
    header('Location:login.php');
}
?>

<?php
$id = session::get('customer_id');
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])){
	$update_customer = $customer -> update_customer($_POST, $id);
}
?>
<div class="main">
    <div class="content">
    	<div class="section group">
            <div class="content_top">
    		<div class="heading">
    		<h3>Cập nhật thông tin khách hàng</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
        <form action="" method="post">
        <table class="tblone">
            <tr>
                <?php
                if(isset($update_customer)){
                    echo '<td colspan="3">'.$update_customer.'</td>';
                }
                ?>
            </tr>

            <?php
            $id = session::get('customer_id');
            $get_customer = $customer -> show_customer($id);
            if($get_customer){
                while($result = $get_customer -> fetch_assoc()){
            ?>
            <tr>
                <td>Họ và tên</td>
                <td>:</td>
                <td><input type="text" name="customer_name" value="<?php echo $result['customer_name'] ?>"></td>
            </tr>
        
            <tr>
                <td>Số điện thoại</td>
                <td>:</td>
                <td><input type="text" name="customer_phone" value="<?php echo $result['customer_phone'] ?>"></td>
            </tr>
            
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="text" name="customer_email" value="<?php echo $result['customer_email'] ?>"></td>
            </tr>
            
            <tr>
                <td>Căn cước công dân</td>
                <td>:</td>
                <td><input type="text" name="customer_ci" value="<?php echo $result['customer_ci'] ?>"></td>
            </tr>
            
            <tr>
                <td>Thành phố</td>
                <td>:</td>
                <td><input type="text" name="customer_city" value="<?php echo $result['customer_city'] ?>"></td>
            </tr>
            
            <tr>
                <td>Quận</td>
                <td>:</td>
                <td><input type="text" name="customer_district" value="<?php echo $result['customer_district'] ?>"></td>
            </tr>
            
            <tr>
                <td>Địa chỉ</td>
                <td>:</td>
                <td><input type="text" name="customer_address" value="<?php echo $result['customer_address'] ?>"></td>
            </tr>
            
            <tr>
                <td colspan="2"><input type="submit" name="save" value="Lưu" style="font-size:19px;background:black;cursor:pointer;color:white"></td>
            </tr>

            <?php
                }
            }
            ?>

        </table>
        </form>
        </div>
    </div>
</div>
<?php
include 'inc/footer.php';
?>

