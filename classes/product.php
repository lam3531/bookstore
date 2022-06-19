<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>

<?php 
class product{
    private $db;
    private $fm;

    public function __construct(){
        $this -> db = new Database();
        $this -> fm = new Format();
    }

    public function insert_product($data,$files){

        
        $product_name = mysqli_real_escape_string($this -> db -> link, $data['product_name']);
        $category = mysqli_real_escape_string($this -> db -> link, $data['category']);
        $brand = mysqli_real_escape_string($this -> db -> link, $data['brand']);
        $product_desc = mysqli_real_escape_string($this -> db -> link, $data['product_desc']);
        $product_price = mysqli_real_escape_string($this -> db -> link, $data['product_price']);
        $product_type = mysqli_real_escape_string($this -> db -> link, $data['product_type']);

        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['product_image']['name'];
        $file_size = $_FILES['product_image']['size'];
        $file_temp = $_FILES['product_image']['tmp_name'];

        $div = explode('.' ,$file_name);
        $file_exit = strtolower(end($div));
        // $unique_image = substr(md5(time()), 0, 10).'.'.$file_exit;
        $upload_image = "upload/".$file_name;

        if($product_name=="" || $category=="" || $brand=="" || $product_desc=="" || $product_price=="" || $product_type=="" || $file_name==""){
            $alert = "<span class='error'>Các ô không được để trống</span>";
            return $alert;
        } else{
            move_uploaded_file($file_temp, $upload_image);
            $query = "INSERT INTO tbl_product(product_name,category_id,brand_id,product_desc,product_type,product_price,product_image) VALUES('$product_name','$category','$brand','$product_desc','$product_type','$product_price','$file_name')";
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

    public function show_product(){
        $query="SELECT p.*,c.category_name,b.brand_name
        FROM tbl_product as p, tbl_category as c, tbl_brand as b WHERE p.category_id = c.category_id AND p.brand_id = b.brand_id ORDER BY p.product_id DESC";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function update_product($data,$files,$id){        
        $product_name = mysqli_real_escape_string($this -> db -> link, $data['product_name']);
        $category = mysqli_real_escape_string($this -> db -> link, $data['category']);
        $brand = mysqli_real_escape_string($this -> db -> link, $data['brand']);
        $product_desc = mysqli_real_escape_string($this -> db -> link, $data['product_desc']);
        $product_price = mysqli_real_escape_string($this -> db -> link, $data['product_price']);
        $product_type = mysqli_real_escape_string($this -> db -> link, $data['product_type']);

        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['product_image']['name'];
        $file_size = $_FILES['product_image']['size'];
        $file_temp = $_FILES['product_image']['tmp_name'];

        $div = explode('.' ,$file_name);
        $file_exit = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_exit;
        $upload_image = "upload/".$unique_image;
        if($product_name=="" || $category=="" || $brand=="" || $product_desc=="" || $product_price=="" || $product_type==""){
            $alert = "<span class='error'>Các ô không được để trống</span>";
            return $alert;
        } else{
            if(!empty($file_name)){
                // Nếu người dùng chọn hình ảnh
                if($file_size > 20480){
                    $alert = "<span class='error'>Dung lượng hình ảnh nên ít hơn 20GB!</span>";
                    return $alert;
                }
                elseif(in_array($file_exit, $permited)===false){
                    $alert = "<span class='error'>Bạn chỉ có thể đăng tải các loại sau:-".implode(',', $permited)."</span>";
                    return $alert;
                }
                $query = "UPDATE tbl_product SET 
                product_name = '$product_name',
                category_id = '$category', 
                brand_id = '$brand', 
                product_desc = '$product_desc', 
                product_type = '$product_type', 
                product_price = '$product_price', 
                product_image = '$product_image' 
                WHERE product_id = '$id'";
            } 
            // Nếu người dùng không chọn ảnh
            else{
                $query = "UPDATE tbl_product SET 
                product_name = '$product_name', 
                category_id = '$category', 
                brand_id = '$brand', 
                product_desc = '$product_desc', 
                product_type = '$product_type', 
                product_price = '$product_price' 
                WHERE product_id = '$id'";   
            }
        }
            $result = $this -> db -> update($query);
            if($result){
                $alert = "<span class='success'>Sửa thành công</span>";
                return $alert;
            } else{
                $alert = "<span class='error'>Sửa không thành công</span>";
                return $alert;
            }
    }

    public function delete_product($id){
        $query = "DELETE FROM tbl_product WHERE product_id = '$id'";
        $result = $this -> db -> delete($query);
        if($result){
            $alert = "<span class='success'>Xóa thành công</span>";
            return $alert;
        } else{
            $alert = "<span class='error'>Xóa không thành công</span>";
            return $alert;
        }
    }

    public function getproductbyid($id){
        $query = "SELECT * FROM tbl_product WHERE product_id = '$id'";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function getproduct_feature(){
        $query = "SELECT * FROM tbl_product WHERE product_type = '0'";
        $result = $this -> db -> select($query);
        return $result;
    }
    
    public function getproduct_new(){
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

    public function get_all_product(){
        $query = "SELECT * FROM tbl_product";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function get_detail($id){
        $query="SELECT p.*,c.category_name,b.brand_name
        FROM tbl_product as p, tbl_category as c, tbl_brand as b WHERE p.category_id = c.category_id AND p.brand_id = b.brand_id AND p.product_id = '$id'";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function getLastestA(){
        $query = "SELECT * FROM tbl_product WHERE category_id = '1' ORDER BY product_id DESC LIMIT 1";
        $result = $this -> db -> select($query);
        return $result;
    }
    
    public function getLastestB(){
        $query = "SELECT * FROM tbl_product WHERE category_id = '6' ORDER BY product_id DESC LIMIT 1";
        $result = $this -> db -> select($query);
        return $result;
    }
    
    public function getLastestC(){
        $query = "SELECT * FROM tbl_product WHERE category_id = '2' ORDER BY product_id DESC LIMIT 1";
        $result = $this -> db -> select($query);
        return $result;
    }
    
    public function getLastestD(){
        $query = "SELECT * FROM tbl_product WHERE category_id = '3' ORDER BY product_id DESC LIMIT 1";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function search_product($tukhoa){
        $tukhoa = $this -> fm -> validation($tukhoa);
        $query = "SELECT * FROM tbl_product WHERE product_name LIKE '%$tukhoa%'";
        $result = $this -> db -> select($query);
        return $result;
    }
}
?>