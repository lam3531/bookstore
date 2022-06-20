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
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$category_name = $_POST['category_name'];

	$insert_category = $category -> insert_category($category_name);
}
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm danh mục</h2>
               <div class="block copyblock"> 
               <?php
                if(isset($insert_category)){
                    echo $insert_category;
                }
                ?>
                 <form action="catadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="category_name" placeholder="Tên danh mục" class="medium" />
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