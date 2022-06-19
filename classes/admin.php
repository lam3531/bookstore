<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>

<?php 
class admin{
    private $db;
    private $fm;

    public function __construct(){
        $this -> db = new Database();
        $this -> fm = new Format();
    }

    public function insert_admin($data){
        $admin_name = mysqli_real_escape_string($this -> db -> link, $data['admin_name']);
        $admin_email = mysqli_real_escape_string($this -> db -> link, $data['admin_email']);
        $admin_user = mysqli_real_escape_string($this -> db -> link, $data['admin_user']);
        $admin_pass = mysqli_real_escape_string($this -> db -> link, md5($data['admin_pass']));
        $level = mysqli_real_escape_string($this -> db -> link, $data['level']);

        if(empty($admin_name) || empty($admin_email) || empty($admin_user) || empty($admin_pass) || empty($level)){
            $alert = "<span class='error'>Các ô không được để trống</span>";
            return $alert;
        } else{
            $query = "INSERT INTO tbl_admin(admin_name,admin_email,admin_user,admin_pass,level) VALUES('$admin_name','$admin_email','$admin_user','$admin_pass','$level')";
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

    public function show_admin(){
        $query = "SELECT * FROM tbl_admin ORDER BY admin_id DESC";
        $result = $this -> db -> select($query);
        return $result;
    }
    
    public function profile_admin($id){
        $query = "SELECT * FROM tbl_admin WHERE admin_id = '$id' LIMIT 1";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function update_admin($data,$id){
        $admin_name = mysqli_real_escape_string($this -> db -> link, $data['admin_name']);
        $admin_email = mysqli_real_escape_string($this -> db -> link, $data['admin_email']);
        $level = mysqli_real_escape_string($this -> db -> link, $data['level']);
        $id = mysqli_real_escape_string($this -> db -> link, $id);
        if(empty($admin_name) || empty($admin_email) || empty($level)){
            $alert = "<span class='error'>Các ô không được để trống</span>";
            return $alert;
        } else{
            $query = "UPDATE tbl_admin SET admin_name = '$admin_name', admin_email = '$admin_email', level = '$level' WHERE admin_id = '$id'";
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

    public function getadminbyid($id){
        $query = "SELECT * FROM tbl_admin WHERE admin_id = '$id'";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function delete_admin($id){
        $query = "DELETE FROM tbl_admin WHERE admin_id = '$id'";
        $result = $this -> db -> delete($query);
        if($result){
            $alert = "<span class='success'>Xóa thành công</span>";
            return $alert;
        } else{
            $alert = "<span class='error'>Xóa không thành công</span>";
            return $alert;
        }
    }
}
?>