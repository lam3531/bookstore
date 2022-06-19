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
// if(!isset($_GET['proid']) || $_GET['proid']== NULL){
//     echo "<script> window.location = '404.php'</script>";
// } else{
//     $id = $_GET['proid'];
// }

// if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
// 	$quantity = $_POST['quantity'];
// 	$addtocart = $cart -> add_to_cart($quantity, $id);
// }
?>
<div class="main">
    <div class="content">
    	<div class="section group">
            <div class="content_top">
    		<div class="heading">
    		<h3 style="color:rgb(211,51,25); font-family: 'Poppins', sans-serif; font-weight: bold;">Thông tin khách hàng</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
        <table class="tblone">
            <?php
            $id = session::get('customer_id');
            $get_customer = $customer -> show_customer($id);
            if($get_customer){
                while($result = $get_customer -> fetch_assoc()){
            ?>
            <tr>
                <td style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif; font-weight:bold;">Họ và tên</td>
                <td>:</td>
                <td><?php echo $result['customer_name'] ?></td>
            </tr>
        
            <tr>
                <td style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif; font-weight:bold;">Số điện thoại</td>
                <td>:</td>
                <td><?php echo $result['customer_phone'] ?></td>
            </tr>
            
            <tr>
                <td style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif; font-weight:bold;">Email</td>
                <td>:</td>
                <td><?php echo $result['customer_email'] ?></td>
            </tr>
            
            <tr>
                <td style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif; font-weight:bold;">Căn cước công dân</td>
                <td>:</td>
                <td><?php echo $result['customer_ci'] ?></td>
            </tr>
            
            <tr>
                <td style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif; font-weight:bold;">Thành phố</td>
                <td>:</td>
                <td><?php echo $result['customer_city'] ?></td>
            </tr>
            
            <tr>
                <td style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif; font-weight:bold;">Quận</td>
                <td>:</td>
                <td><?php echo $result['customer_district'] ?></td>
            </tr>
            
            <tr>
                <td style="color:#444; font-size: 13px; font-family: 'Poppins', sans-serif; font-weight:bold;">Địa chỉ</td>
                <td>:</td>
                <td><?php echo $result['customer_address'] ?></td>
            </tr>
            
            <tr>
                <td colspan="2"><a href="profile-edit.php">Cập nhật hồ sơ</a></td>
            </tr>

            <?php
                }
            }
            ?>

        </table>
        </div>
    </div>
</div>
<?php
include 'inc/footer.php';
?>

