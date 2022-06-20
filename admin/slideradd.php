<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
include '../classes/slide.php';
?>

<?php
$slide = new slide();
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
	

	$insert_slide = $slide -> insert_slide($_POST, $_FILES);
}

?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm slide mới</h2>
    <div class="block">
    <?php
    if(isset($insert_slide)){
        echo $insert_slide;
    }
    ?>               
         <form action="slideradd.php" method="post" enctype="multipart/form-data">
            <table class="form">     
                <tr>
                    <td>
                        <label>Tên slide</label>
                    </td>
                    <td>
                        <input type="text" name="slide_name" placeholder="Tên slide" class="medium" />
                    </td>
                </tr>           
    
                <tr>
                    <td>
                        <label>Hình ảnh</label>
                    </td>
                    <td>
                        <input type="file" name="slide_image"/>
                    </td>
                </tr>
    
                <tr>
                    <td>
                        <label>Loại</label>
                    </td>
                    <td>
                        <select name="slide_type">
                        <option value="1">Bật</option>
                        <option value="0">Tắt</option>
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