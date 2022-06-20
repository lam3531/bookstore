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
include '../classes/brand.php';
?>

<?php
include '../classes/product.php';
?>

<?php
include_once '../helpers/format.php';
$fm = new format();
?>

<?php
$product = new product();
if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
	$delete_product = $product -> delete_product($id);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách sản phẩm</h2>
        <div class="block">
			<?php
			if(isset($delete_product)){
				echo $delete_product;
			}
			?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
					<th>ID</th>
					<th>Tên sản phẩm</th>
					<th>Tên thể loại</th>
					<th>Tên tác giả</th>
					<th>Mô tả sản phẩm</th>
					<th>Loại sản phẩm</th>
					<th>Giá</th>
					<th>Hình ảnh</th>
					<th>Tùy biến</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$product = new product();
				$pdlist = $product -> show_product();
				if($pdlist){
					$i = 0;
					while($result = $pdlist -> fetch_assoc()){
						$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['product_id'] ?></td>
					<td><?php echo $result['product_name'] ?></td>
					<td><?php echo $result['category_name'] ?></td>
					<td><?php echo $result['brand_name'] ?></td>
					<td><?php echo $result['product_desc']?></td>
					<td><?php 
					if($result['product_type']==0){
						echo 'Nổi bật';
					} elseif($result['product_type']==1){
						echo'Mới';
					}
					?></td>
					<td><?php echo $fm -> format_currency($result['product_price'])." VNĐ"?></td>
					<td><img src="upload/<?php echo $result['product_image'] ?>" width="60" height="50"></td>
					<td><a href="product-edit.php?product_id=<?php echo $result['product_id'] ?>">Sửa</a> || <a onclick="return confirm('Bạn thực sự có muốn xóa ?')" href="?delete_id=<?php echo $result['product_id'] ?>">Xoá</a></td>
				</tr>
				<?php
					}
				}
				?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
