<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
include_once ($filepath.'/../lib/session.php');
?>



<?php 
class customer{
    private $db;
    private $fm;

    public function __construct(){
        $this -> db = new Database();
        $this -> fm = new Format();
    }

    public function insert_customer($data){
        $customer_name = mysqli_real_escape_string($this -> db -> link, $data['customer_name']);
        $customer_phone = mysqli_real_escape_string($this -> db -> link, $data['customer_phone']);
        $customer_email = mysqli_real_escape_string($this -> db -> link, $data['customer_email']);
        $customer_password = mysqli_real_escape_string($this -> db -> link, md5($data['customer_password']));
        $customer_city = mysqli_real_escape_string($this -> db -> link, $data['customer_city']);
        $customer_district = mysqli_real_escape_string($this -> db -> link, $data['customer_district']);
        $customer_address = mysqli_real_escape_string($this -> db -> link, $data['customer_address']);
        $customer_ci = mysqli_real_escape_string($this -> db -> link, $data['customer_ci']);

        if($customer_name=="" || $customer_phone=="" || $customer_email=="" || $customer_password=="" || $customer_city=="" || $customer_district=="" || $customer_address=="" || $customer_ci==""){
            $alert = "<span style='color: red; font-size:18px;'>Các ô không được để trống</span>";
            return $alert;
        } else{
            $check_email = "SELECT * FROM tbl_customer WHERE customer_email ='$customer_email' LIMIT 1";
            $result_check = $this -> db -> select($check_email);
            if($result_check){
                $alert = "<span style='color: red; font-size:18px;'>Email đã tồn tại</span>";
                return $alert;
            }else{
                $query = "INSERT INTO tbl_customer(customer_name, customer_phone, customer_email, customer_password, customer_city, customer_district, customer_address, customer_ci) 
                VALUES('$customer_name','$customer_phone','$customer_email','$customer_password','$customer_city','$customer_district','$customer_address','$customer_ci')";
                $result = $this -> db -> insert($query);
                if($result){
                    $alert = "<span style='color: green; font-size:18px;'>Đăng ký tài khoản thành công</span>";
                    return $alert;
                } else{
                    $alert = "<span style='color: red; font-size:18px;'>Đăng ký tài khoản không thành công</span>";
                    return $alert;
                }
            }
        }

    }

    public function login_customer($data){
        $customer_email = mysqli_real_escape_string($this -> db -> link, $data['customer_email']);
        $customer_password = mysqli_real_escape_string($this -> db -> link, md5($data['customer_password']));
        if(empty($customer_email) || empty($customer_password)){
            $alert = "<span style='color: red; font-size:18px;'>Email và mật khẩu không được để trống</span>";
            return $alert;
        } else{
            $check_login = "SELECT * FROM tbl_customer WHERE customer_email ='$customer_email' AND customer_password='$customer_password'";
            $result_check = $this -> db -> select($check_login);
            if($result_check){
                $value = $result_check -> fetch_assoc();
                session::set('customer_login',true);
                session::set('customer_id',$value['customer_id']);
                session::set('customer_name',$value['customer_name']);
                header('Location: index.php');
            }else{
                $alert = "<span style='color: red; font-size:18px;'>Email và mật khẩu không khớp</span>";
                return $alert;
            }
        }
    }

    public function show_customer($id){
        $query = "SELECT * FROM tbl_customer WHERE customer_id ='$id'";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function update_customer($data, $id){
        $customer_name = mysqli_real_escape_string($this -> db -> link, $data['customer_name']);
        $customer_phone = mysqli_real_escape_string($this -> db -> link, $data['customer_phone']);
        $customer_email = mysqli_real_escape_string($this -> db -> link, $data['customer_email']);
        $customer_city = mysqli_real_escape_string($this -> db -> link, $data['customer_city']);
        $customer_district = mysqli_real_escape_string($this -> db -> link, $data['customer_district']);
        $customer_address = mysqli_real_escape_string($this -> db -> link, $data['customer_address']);
        $customer_ci = mysqli_real_escape_string($this -> db -> link, $data['customer_ci']);

        if($customer_name=="" || $customer_phone=="" || $customer_email=="" || $customer_city=="" || $customer_district=="" || $customer_address=="" || $customer_ci==""){
            $alert = "<span style='color: red; font-size:18px;'>Các ô không được để trống</span>";
            return $alert;
        } else{
            $query = "UPDATE tbl_customer SET customer_name='$customer_name', 
            customer_phone='$customer_phone', customer_email='$customer_email', 
            customer_city='$customer_city', customer_district='$customer_district', 
            customer_address='$customer_address', customer_ci='$customer_ci' WHERE customer_id='$id'";
            $result = $this -> db -> insert($query);
            if($result){
                $alert = "<span style='color: green; font-size:18px;'>Cập nhật thông tin thành công</span>";
                return $alert;
            }else{
                $alert = "<span style='color: red; font-size:18px;'>Cập nhật thông tin không thành công</span>";
                return $alert;
            }
        }
    }

    public function insert_comment(){
        $product_comment = $_POST['product_id'];
        $customer_name_comment = $_POST['customer_name'];
        $comment = $_POST['comment_info'];
        if($customer_name_comment=="" || $comment==""){
            $alert = "<span style='color: red; font-size:18px;'>Các ô không được để trống</span>";
            return $alert;
        } else{
            $query = "INSERT INTO tbl_comment(customer_name,comment_info,product_id)VALUES('$customer_name_comment','$comment','$product_comment')";
            $result = $this -> db -> insert($query);
            if($result){
                $alert = "<span style='color: green; font-size:18px;'>Bình luận sẽ được kiểm duyệt</span>";
                return $alert;
            }else{
                $alert = "<span style='color: red; font-size:18px;'>Lỗi</span>";
                return $alert;
            }
        }
    }
}
?>