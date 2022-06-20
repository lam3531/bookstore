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
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $product_name = $_POST['product_name'];
	$insert_product = $product -> insert_product($_POST,$_FILES);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm sản phẩm mới</h2>
        <div class="block">
        <?php
        if(isset($insert_product)){
            echo $insert_product;
        }
        ?>                
         <form action="productadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name="product_name" placeholder="Tên sản phẩm" class="medium" />
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
                            <option value="<?php echo $result['category_id'] ?>"><?php echo $result['category_name'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Tác giả</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>--Chọn tác giả--</option>
                            <?php
                            $brand = new brand();
                            $brandlist = $brand -> show_brand(); 
                            if($brandlist){
                                while($result = $brandlist -> fetch_assoc()){

                            ?>
                            <option value="<?php echo $result['brand_id'] ?>"><?php echo $result['brand_name'] ?></option>
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
                        <textarea name="product_desc" class="tinymce"></textarea>
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
                        <input type="text" name= "product_price"placeholder="Giá" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Ảnh mô tả</label>
                    </td>
                    <td>
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
                            <option value="0">Nổi bật</option>
                            <option value="1">Mới</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Thêm" />
                    </td>
                </tr>
            </table>
            </form>
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


