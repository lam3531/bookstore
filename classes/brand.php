<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>

<?php 
class brand{
    private $db;
    private $fm;

    public function __construct(){
        $this -> db = new Database();
        $this -> fm = new Format();
    }

    public function insert_brand($brand_name){
        $brand_name = $this -> fm -> validation($brand_name);
        
        $brand_name = mysqli_real_escape_string($this -> db -> link, $brand_name);

        if(empty($brand_name)){
            $alert = "<span class='error'>Tên thương hiệu không được để trống</span>";
            return $alert;
        } else{
            $query = "INSERT INTO tbl_brand(brand_name) VALUES('$brand_name')";
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

    public function show_brand(){
        $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function update_brand($brand_name,$id){
        $brand_name = $this -> fm -> validation($brand_name);
        
        $brand_name = mysqli_real_escape_string($this -> db -> link, $brand_name);
        $id = mysqli_real_escape_string($this -> db -> link, $id);
        if(empty($brand_name)){
            $alert = "<span class='error'>Tên thương hiệu không được để trống</span>";
            return $alert;
        } else{
            $query = "UPDATE tbl_brand SET brand_name = '$brand_name' WHERE brand_id = '$id'";
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

    public function delete_brand($id){
        $query = "DELETE FROM tbl_brand WHERE brand_id = '$id'";
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
        $query = "SELECT * FROM tbl_brand WHERE brand_id = '$id'";
        $result = $this -> db -> select($query);
        return $result;
    }
}
?>