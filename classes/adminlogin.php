<?php
$filepath = realpath(dirname(__FILE__));
include ($filepath.'/../lib/session.php');
session::checkLogin();
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>

<?php 
class adminLogin{
    private $db;
    private $fm;

    public function __construct(){
        $this -> db = new Database();
        $this -> fm = new Format();
    }

    public function login_admin($admin_user, $admin_pass){
        $admin_user = $this -> fm -> validation($admin_user);
        $admin_pass = $this -> fm -> validation($admin_pass);

        $admin_user = mysqli_real_escape_string($this -> db -> link, $admin_user);
        $admin_pass = mysqli_real_escape_string($this -> db -> link, $admin_pass);

        if(empty($admin_user) || empty($admin_pass)){
            $alert = "Tài khoản và mật khẩu không được để trống";
            return $alert;
        } else{
            $query = "SELECT * FROM tbl_admin WHERE admin_user = '$admin_user' AND admin_pass = '$admin_pass' LIMIT 1";
            $result = $this -> db -> select($query);

            if($result != false){
                $value = $result -> fetch_assoc();
                session::set('login',true);
                session::set('admin_id',$value['admin_id']);
                session::set('admin_user',$value['admin_user']);
                session::set('admin_name',$value['admin_name']);
                header('Location:index.php');
            } else{
                $alert = "Tài khoản hoặc mật khẩu không hợp lệ";
                return $alert;
            }
        }
    }

    public function show_admin(){
        $query = "SELECT * FROM tbl_admin LIMIT 1";
        $result = $this -> db -> select($query);
    }
}
?>