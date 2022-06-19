<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>

<?php 
class admin_check{
    private $db;
    private $fm;

    public function __construct(){
        $this -> db = new Database();
        $this -> fm = new Format();
    }

    public function show_admin($id){
        $query = "SELECT * FROM tbl_admin WHERE admin_id ='$id'";
        $result = $this -> db -> select($query);
        return $result;
    }
}
?>