<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>

<?php 
class category{
    private $db;
    private $fm;

    public function __construct(){
        $this -> db = new Database();
        $this -> fm = new Format();
    }

    public function insert_category($category_name){
        $category_name = $this -> fm -> validation($category_name);
        
        $category_name = mysqli_real_escape_string($this -> db -> link, $category_name);

        if(empty($category_name)){
            $alert = "<span class='error'>Tên danh mục không được để trống</span>";
            return $alert;
        } else{
            $query = "INSERT INTO tbl_category(category_name) VALUES('$category_name')";
            $result = $this -> db -> insert($query);
            if($result){
                $alert = "<span class='success'>Thêm thành công</span>";
                return $alert;
            } else{
                $alert = "<span class='error'>Thêm không thành công</span>";
                return $alert;
            }
        }
    }

    public function show_category(){
        $query = "SELECT * FROM tbl_category ORDER BY category_id DESC";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function update_category($category_name,$id){
        $category_name = $this -> fm -> validation($category_name);
        
        $category_name = mysqli_real_escape_string($this -> db -> link, $category_name);
        $id = mysqli_real_escape_string($this -> db -> link, $id);
        if(empty($category_name)){
            $alert = "<span class='error'>Tên danh mục không được để trống</span>";
            return $alert;
        } else{
            $query = "UPDATE tbl_category SET category_name = '$category_name' WHERE category_id = '$id'";
            $result = $this -> db -> update($query);
            if($result){
                $alert = "<span class='success'>Sửa thành công</span>";
                return $alert;
            } else{
                $alert = "<span class='error'>Sửa không thành công</span>";
                return $alert;
            }
        }
    }

    public function delete_category($id){
        $query = "DELETE FROM tbl_category WHERE category_id = '$id'";
        $result = $this -> db -> delete($query);
        if($result){
            $alert = "<span class='success'>Xóa thành công</span>";
            return $alert;
        } else{
            $alert = "<span class='error'>Xóa không thành công</span>";
            return $alert;
        }
    }

    public function getcatbyid($id){
        $query = "SELECT * FROM tbl_category WHERE category_id = '$id'";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function show_category_front(){
        $query = "SELECT * FROM tbl_category ORDER BY category_id DESC";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function get_product_by_cat($id){
        $query = "SELECT * FROM tbl_product WHERE category_id = '$id' ORDER BY category_id DESC LIMIT 8";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function cname($id){
        $query = "SELECT tbl_product.*,tbl_category.category_name,tbl_category.category_id FROM tbl_product,tbl_category WHERE tbl_product.category_id = tbl_category.category_id
        AND tbl_product.category_id='$id' LIMIT 1";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function caname($id){
        $query = "SELECT tbl_product.*,tbl_category.category_name,tbl_category.category_id FROM tbl_product,tbl_category WHERE tbl_product.category_id = tbl_category.category_id
        AND tbl_product.category_id='$id' LIMIT 1";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function get_product_by_cat_all($id){
        $query = "SELECT * FROM tbl_product WHERE category_id = '$id' ORDER BY category_id DESC";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function getproduct_new_cate(){
        $sp_tungtrang = 4;
        if(!isset($_GET['trang'])){
            $trang = 1;
        } else{
            $trang = $_GET['trang'];
        }
        $tung_trang = ($trang-1)*$sp_tungtrang; 
        $query = "SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT $tung_trang,$sp_tungtrang";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function get_all_product_cate(){
        $query = "SELECT * FROM tbl_product";
        $result = $this -> db -> select($query);
        return $result;
    }
}
?>