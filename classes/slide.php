<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
include_once ($filepath.'/../lib/session.php');
?>

<?php 
class slide{
    private $db;
    private $fm;

    public function __construct(){
        $this -> db = new Database();
        $this -> fm = new Format();
    }

    public function insert_slide($data,$files){
        $slide_name = mysqli_real_escape_string($this -> db -> link, $data['slide_name']);
        $slide_type = mysqli_real_escape_string($this -> db -> link, $data['slide_type']);

        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['slide_image']['name'];
        $file_size = $_FILES['slide_image']['size'];
        $file_temp = $_FILES['slide_image']['tmp_name'];

        $div = explode('.' ,$file_name);
        $file_exit = strtolower(end($div));
        // $unique_image = substr(md5(time()), 0, 10).'.'.$file_exit;
        $upload_image = "upload/".$file_name;
        if($slide_name=="" || $slide_type==""){
            $alert = "<span class='error'>Các ô không được để trống</span>";
            return $alert;
        } else{
            if(!empty($file_name)){
                // Nếu người dùng chọn hình ảnh
                if($file_size > 204800){
                    $alert = "<span class='error'>Dung lượng hình ảnh nên ít hơn 20GB!</span>";
                    return $alert;
                }
                elseif(in_array($file_exit, $permited)===false){
                    $alert = "<span class='error'>Bạn chỉ có thể đăng tải các loại sau:-".implode(',', $permited)."</span>";
                    return $alert;
                }
                move_uploaded_file($file_temp, $upload_image);
                $query = "INSERT INTO tbl_slide(slide_name,slide_image,slide_type)
                VALUES('$slide_name','$file_name','$slide_type')";
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
    }
    
    public function show_slide(){
        $query = "SELECT * FROM tbl_slide WHERE slide_type = '1' ORDER BY slide_id DESC";
        $result = $this -> db -> select($query);
        return $result;
    }
    
    public function show_slide_list(){
        $query = "SELECT * FROM tbl_slide ORDER BY slide_id DESC";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function update_type_slide($id,$type){
        $type = mysqli_real_escape_string($this -> db -> link,$type);
        if($type==0){
            $a = "UPDATE tbl_slide SET slide_type = '1' WHERE slide_id='$id' AND slide_type = '0'";
            $result= $this -> db -> update($a);
            return $result;
        }
        elseif($type==1){
            $b = "UPDATE tbl_slide SET slide_type = '0' WHERE slide_id='$id' AND slide_type = '1'";
            $result= $this -> db -> update($b);
            return $result;
        }
    }

    public function delete_slide($id){
        $query = "DELETE FROM tbl_slide WHERE slide_id = '$id'";
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