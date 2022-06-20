<?php
include '../classes/admin_check.php';
$ad = new admin_check();
$id = session::get('admin_id');
?>

<div class="grid_2">
    <div class="box sidemenu">
        <div class="block" id="section-menu">
            <ul class="section menu">
                
                <?php
                $check_level = $ad -> show_admin($id);
                if($check_level){
                    $result = $check_level -> fetch_assoc();
                    if($result['level']==0){
                        echo '<li><a class="menuitem">Danh mục sản phẩm</a>
                        <ul class="submenu">
                            <li><a href="catadd.php">Thêm danh mục</a> </li>
                            <li><a href="catlist.php">Danh sách danh mục</a> </li>
                        </ul>
                    </li>';
                    }elseif($result['level']==1) {
                        echo '<li><a class="menuitem">Danh mục sản phẩm</a>
                        <ul class="submenu">
                            <li><a href="catlist.php">Danh sách danh mục</a> </li>
                        </ul>
                    </li>';
                    }else{
                        echo '';
                    }
                }
                ?>
                
                <?php
                $check_level = $ad -> show_admin($id);
                if($check_level){
                    $result = $check_level -> fetch_assoc();
                    if($result['level']==0){
                        echo '<li><a class="menuitem">Tác giả</a>
                        <ul class="submenu">
                            <li><a href="brandadd.php">Thêm tác giả</a> </li>
                            <li><a href="brandlist.php">Danh sách tác giả</a> </li>
                        </ul>
                    </li>';
                    }elseif($result['level']==1) {
                        echo '<li><a class="menuitem">Tác giả</a>
                        <ul class="submenu">
                            <li><a href="brandlist.php">Danh sách tác giả</a> </li>
                        </ul>
                    </li>';
                    }else{
                        echo '';
                    }
                }
                ?>
                
                <?php
                $check_level = $ad -> show_admin($id);
                if($check_level){
                    $result = $check_level -> fetch_assoc();
                    if($result['level']==0){
                        echo '<li><a class="menuitem">Sản phẩm</a>
                        <ul class="submenu">
                            <li><a href="productadd.php">Thêm sản phẩm</a> </li>
                            <li><a href="productlist.php">Danh sách sản phẩm</a> </li>
                        </ul>
                    </li>';
                    }elseif($result['level']==1) {
                        echo '<li><a class="menuitem">Sản phẩm</a>
                        <ul class="submenu">
                            <li><a href="productlist.php">Danh sách sản phẩm</a> </li>
                        </ul>
                    </li>';
                    }else{
                        echo '';
                    }
                }
                ?>
                
                <?php
                $check_level = $ad -> show_admin($id);
                if($check_level){
                    $result = $check_level -> fetch_assoc();
                    if($result['level']==0){
                        echo '<li><a class="menuitem">Tác giả</a>
                        <ul class="submenu">
                            <li><a href="slideradd.php">Thêm slide</a> </li>
                            <li><a href="sliderlist.php">Danh sách slide</a> </li>
                        </ul>
                    </li>';
                    }elseif($result['level']==1) {
                        echo '<li><a class="menuitem">Danh mục slide</a>
                        <ul class="submenu">
                            <li><a href="sliderlist.php">Danh sách slide</a> </li>
                        </ul>
                    </li>';
                    }else{
                        echo '';
                    }
                }
                ?>
                
                <?php
                $check_level = $ad -> show_admin($id);
                if($check_level){
                    $result = $check_level -> fetch_assoc();
                    if($result['level']==0){
                        echo '<li><a class="menuitem">Admin</a>
                        <ul class="submenu">
                            <li><a href="adminadd.php">Thêm admin</a> </li>
                            <li><a href="adminlist.php">Danh sách admin</a> </li>
                        </ul>
                    </li>';
                    }elseif($result['level']==1){
                        echo '<li><a class="menuitem">Admin</a>
                        <ul class="submenu">
                            <li><a href="adminlist.php">Danh sách admin</a> </li>
                        </ul>
                    </li>';
                    }else{
                        echo '';
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>