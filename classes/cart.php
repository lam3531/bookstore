<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
include_once ($filepath.'/../lib/session.php');
?>



<?php 
class cart{
    private $db;
    private $fm;

    public function __construct(){
        $this -> db = new Database();
        $this -> fm = new Format();
    }

    public function add_to_cart($quantity, $id){
        $quantity = $this -> fm -> validation($quantity);
        $quantity = mysqli_real_escape_string($this -> db -> link, $quantity);
        $id = mysqli_real_escape_string($this -> db -> link, $id);
        $section_id = session_id();

        $query = "SELECT * FROM tbl_product WHERE product_id = '$id'";
        $result = $this -> db -> select($query) -> fetch_assoc();

        $image = $result["product_image"];
        $price = $result["product_price"];
        $name = $result["product_name"];

        $query_insert = "INSERT INTO tbl_cart(product_id,section_id,product_name,product_price,quantity,product_image)VALUES('$id','$section_id','$name' , '$price','$quantity','$image')";
            $insert_cart = $this -> db -> insert($query_insert);
            if($insert_cart){
                header('Location:cart.php');
            }else{
                header('Location:404.php');
            }
        // $check_cart = "SELECT * FROM tbl_cart WHERE product_id = '$id' AND ";
        // if($check_cart){
        //     $msg = "Sản phẩm đã được tồn tại trong giỏ hàng";
        //     return $msg;
        // }else{
        //     $query_insert = "INSERT INTO tbl_cart(product_id,section_id,product_name,product_price,quantity,product_image) 
        //     VALUES('$id','$section_id','$name' , '$price','$quantity','$image')";
        //     $insert_cart = $this -> db -> insert($query_insert);
        //     if($insert_cart){
        //         header('Location:cart.php');
        //     } else{
        //         header('Location:404.php');
        //     }
        // }
    }

    public function get_product_cart(){
        $section_id = session_id();
        $query = "SELECT * FROM tbl_cart WHERE section_id='$section_id'";
        $result = $this -> db -> select($query); 
        return $result;
    }

    public function update_quantity_cart($quantity, $cartid){
        $quantity = mysqli_real_escape_string($this -> db -> link, $quantity);
        $cartid = mysqli_real_escape_string($this -> db -> link, $cartid);
        $query = "UPDATE tbl_cart SET quantity = '$quantity' WHERE cart_id = '$cartid'";
        $result = $this -> db -> update($query);
        if($result){
            header('Location: cart.php');
        } else{
            $msg = "<span style='color: red; font-size:18px;'>Cập nhật số lượng sản phẩm không thành công</span>";
            return $msg;
        }
    }

    public function delete_cart($cartid){
        $cartid = mysqli_real_escape_string($this -> db -> link, $cartid);
        $query = "DELETE FROM tbl_cart WHERE cart_id='$cartid'";
        $result = $this -> db -> delete($query);
        return $result;
        if($result){
            header('Location: cart.php');
        } else{
            $msg = "<span style='color: red; font-size:18px;'>Xoá sản phẩm không thành công</span>";
            return $msg;
        }
    }

    public function check_cart(){
        $section_id = session_id();
        $query = "SELECT * FROM tbl_cart WHERE section_id='$section_id'";
        $result = $this -> db -> select($query); 
        return $result;
    }

    public function check_order($customer_id){
        $section_id = session_id();
        $query = "SELECT * FROM tbl_order WHERE customer_id='$customer_id'";
        $result = $this -> db -> select($query); 
        return $result;
    }

    public function del_all_data_cart(){
        $section_id = session_id();
        $query = "DELETE FROM tbl_cart WHERE section_id='$section_id'";
        $result = $this -> db -> select($query); 
        return $result;
    }

    public function insert_order($customer_id){
        $section_id = session_id();
        $query = "SELECT * FROM tbl_cart WHERE section_id='$section_id'";
        $get_product = $this -> db -> select($query);
        if($get_product){
            while($result = $get_product -> fetch_assoc()){
                $product_id = $result['product_id'];
                $product_name = $result['product_name'];
                $quantity = $result['quantity'];
                $product_price = $result['product_price'] * $quantity;
                $product_image = $result['product_image'];
                $customer_id = $customer_id;
                
                $query_order = "INSERT INTO tbl_order(product_id, product_name, customer_id, quantity, product_price, product_image)
                VALUES('$product_id','$product_name','$customer_id' , '$quantity','$product_price','$product_image')";
                
                $insert_order = $this -> db -> insert($query_order);
            }
        }
    }

    public function get_product_ordered($customer_id){
        $query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id'";
        $get_product_ordered = $this -> db -> select($query);
        return $get_product_ordered;
    }

    public function get_inbox_cart(){
        $query = "SELECT * FROM tbl_order ORDER BY date_order";
        $get_inbox_cart = $this -> db -> select($query);
        return $get_inbox_cart;
    }

    public function ship($id,$time,$price,$status){
        $id = mysqli_real_escape_string($this -> db -> link, $id);
        $time = mysqli_real_escape_string($this -> db -> link, $time);
        $price = mysqli_real_escape_string($this -> db -> link, $price);
        $status = mysqli_real_escape_string($this -> db -> link, $status);
        if($status==0){
            $a = "UPDATE tbl_order SET status = '1' WHERE order_id = '$id' AND date_order = '$time' AND product_price = '$price' AND status = '0'";
            $result= $this -> db -> update($a);
            $msg = "<span style='color: green; font-size:18px;'>Đã xác nhận đơn hàng</span>";
            return $msg;
        }
        elseif($status==1){
            $b = "UPDATE tbl_order SET status = '2' WHERE order_id = '$id' AND date_order = '$time' AND product_price = '$price' AND status = '1'";
            $result= $this -> db -> update($b);
            $msg = "<span style='color: green; font-size:18px;'>Đơn hàng đã gửi cho bên giao hàng</span>";
            return $msg;
        }
        elseif($status==2){
            $c = "UPDATE tbl_order SET status = '3' WHERE order_id = '$id' AND date_order = '$time' AND product_price = '$price' AND status = '2'";
            $result= $this -> db -> update($c);
            $msg = "<span style='color: green; font-size:18px;'>Đã nhận hàng</span>";
            return $msg;
        }
    }

    public function del($id,$time,$price){
        $id = mysqli_real_escape_string($this -> db -> link, $id);
        $time = mysqli_real_escape_string($this -> db -> link, $time);
        $price = mysqli_real_escape_string($this -> db -> link, $price);
        $query = "DELETE FROM tbl_order WHERE order_id = '$id' AND date_order = '$time' AND product_price = '$price'";
        $result = $this -> db -> delete($query);
    }
}
?>