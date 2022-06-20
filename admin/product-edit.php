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
include '../classes/category.php';
?>

<?php
include '../classes/product.php';
?>

<?php
$product = new product();
if(!isset($_GET['product_id']) || $_GET['product_id']== NULL){
    echo "<script> window.location = 'productlist.php'</script>";
} else{
    $id = $_GET['product_id'];
}
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){

	$update_product = $product -> update_product($_POST, $_FILES, $id);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa sản phẩm</h2>
        <div class="block">
        <?php
        if(isset($update_product)){
            echo $update_product;
        }
        ?>

        <?php
        $getproductbyid = $product -> getproductbyid($id);
        if($getproductbyid){
            while($result_product = $getproductbyid -> fetch_assoc()){
        ?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name="product_name" value="<?php echo $result_product['product_name'] ?>"class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Thể loại</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>--Chọn thể loại--</option>
                            <?php
                            $category = new category();
                            $catlist = $category -> show_category(); 
                            if($catlist){
                                while($result = $catlist -> fetch_assoc()){

                            ?>
                            <option <?php if($result['category_id']==$result_product['category_id']){
                                echo 'selected';
                            } ?> value="<?php echo $result['category_id'] ?>"><?php echo $result['category_name'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Thương hiệu</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>--Chọn thương hiệu--</option>
                            <?php
                            $brand = new brand();
                            $brandlist = $brand -> show_brand(); 
                            if($brandlist){
                                while($result = $brandlist -> fetch_assoc()){

                            ?>
                            <option <?php if($result['brand_id']==$result_product['brand_id']){
                                echo 'selected';
                            } ?> value="<?php echo $result['brand_id'] ?>"><?php echo $result['brand_name'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả</label>
                    </td>
                    <td>
                        <textarea name="product_desc" class="tinymce" <?php echo $result_product['product_desc'] ?>></textarea>
                    </td>
                </tr>
				
                <!-- <tr>
                    <td>
                        <label>Tác giả</label>
                    </td>
                    <td>
                        <input type="text" name= "author"placeholder="Tên tác giả" class="medium" />
                    </td>
                </tr> -->

				<tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text" name= "product_price" value="<?php echo $result_product['product_price'] ?> "class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Ảnh mô tả</label>
                    </td>
                    <td>
                        <img src="upload/<?php echo $result_product['product_image'] ?>" width="100" height="100"><br>
                        <input type="file" name="product_image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Loại sản phẩm</label>
                    </td>
                    <td>
                        <select id="select" name="product_type">
                            <option>--Chọn loại sản phẩm--</option>
                            <?php
                            if($result_product['product_type']==0){
                            ?>
                            <option selected value="0">Nổi bật</option>
                            <option value="1">Mới</option>
                            <?php
                            } else{
                            ?>
                            <option value="0">Nổi bật</option>
                            <option selected value="1">Mới</option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
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
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


