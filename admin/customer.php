<?php 
$filepath = realpath(dirname(__FILE__));
include 'inc/header.php';
include 'inc/sidebar.php';

include_once ($filepath.'/../classes/cart.php');
include_once ($filepath.'/../classes/customer.php');
include_once ($filepath.'/../helpers/format.php');

$fm = new Format();
$cart = new cart();
$customer = new customer();
?>

<?php
if(!isset($_GET['customer_id']) || $_GET['customer_id']== NULL){
    echo "<script> window.location = 'inbox.php'</script>";
} else{
    $id = $_GET['customer_id'];
}
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thông tin khách hàng</h2>
               <div class="block copyblock"> 
               <?php
                $get_customer = $customer -> show_customer($id);
                if($get_customer){
                    while($result = $get_customer -> fetch_assoc()){
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>Họ và tên</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['customer_name'] ?>" name="customer_name" class="medium">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Số điện thoại</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['customer_phone'] ?>" name="customer_phone" class="medium">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['customer_email'] ?>" name="customer_email" class="medium">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Căn cước công dân</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['customer_ci'] ?>" name="customer_ci" class="medium">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Thành phố</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['customer_city'] ?>" name="customer_city" class="medium">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Quận</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['customer_district'] ?>" name="customer_district" class="medium">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Địa chỉ</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['customer_address'] ?>" name="customer_address" class="medium">
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