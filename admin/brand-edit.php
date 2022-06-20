<?php 
include 'inc/header.php';
?>

<?php 
include 'inc/sidebar.php';
?>

<?php
include '../classes/brand.php';
?>

<?php
$brand = new brand();
if(!isset($_GET['brand_id']) || $_GET['brand_id']== NULL){
    echo "<script> window.location = 'catlist.php'</script>";
} else{
    $id = $_GET['brand_id'];
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$brand_name = $_POST['brand_name'];

	$update_brand = $brand -> update_brand($brand_name,$id);
}

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa tác giả</h2>
               <div class="block copyblock"> 
               <?php
                if(isset($update_brand)){
                    echo $update_brand;
                }
                ?>
                <?php
                $get_cat_name = $brand -> getcatbyid($id);
                if($get_cat_name){
                    while($result = $get_cat_name -> fetch_assoc()){
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['brand_name'] ?>" name="brand_name" placeholder="Sửa tên tác giả" class="medium" />
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