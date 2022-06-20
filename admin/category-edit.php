<?php 
include 'inc/header.php';
?>

<?php 
include 'inc/sidebar.php';
?>

<?php
include '../classes/category.php';
?>

<?php
$category = new category();
if(!isset($_GET['category_id']) || $_GET['category_id']== NULL){
    echo "<script> window.location = 'catlist.php'</script>";
} else{
    $id = $_GET['category_id'];
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$category_name = $_POST['category_name'];

	$update_category = $category -> update_category($category_name,$id);
}

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>
               <div class="block copyblock"> 
               <?php
                if(isset($update_category)){
                    echo $update_category;
                }
                ?>
                <?php
                $get_cat_name = $category -> getcatbyid($id);
                if($get_cat_name){
                    while($result = $get_cat_name -> fetch_assoc()){
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['category_name'] ?>" name="category_name" placeholder="Sửa tên danh mục" class="medium" />
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