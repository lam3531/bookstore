<?php
include 'inc/header.php';
// include 'inc/slider.php';
?>

<?php
$login_check = session::get('customer_login');
if($login_check){
header('Locatin: order.php');
}
?>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){

	$insert_customer = $customer -> insert_customer($_POST);
}
?>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])){

	$login_customer = $customer -> login_customer($_POST);
}
?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3 style="color:rgb(211,51,25); font-family: 'Poppins', sans-serif; font-weight: bold;">Đã có tài khoản?</h3>
        	<p style="color:#444; font-size: 10px; font-family: 'Poppins', sans-serif; font-weight:bold;">Đăng nhập bằng biểu mẫu bên dưới.</p>
			<?php
			if(isset($login_customer)){
				echo $login_customer;
			}
			?>
        	<form action="" method="POST">
                	<input type="text" name="customer_email" class="field" placeholder="Email">
                    <input type="password" name="customer_password" class="field" placeholder="Mật khẩu">

                 <p class="note" style="color:#444; font-size: 10px; font-family: 'Poppins', sans-serif; font-weight:bold;">Nếu bạn quên mật khẩu, nhấp vào <a href="#"> đây</a></p>
                    <div class="buttons" style="color:rgb(211,51,25); font-family: 'Poppins', sans-serif; font-weight: bold;"><div><input type="submit" name="login" value="Đăng nhập" style="font-size:19px;background:#fff;cursor:pointer"></div></div>
			</form>
		</div>

		<?php
		
		?>
		<div class="register_account">
    		<h3 style="color:rgb(211,51,25); font-family: 'Poppins', sans-serif; font-weight: bold;">Đăng ký tài khoản</h3>
			<?php
			if(isset($insert_customer)){
				echo $insert_customer;
			}
			?>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="customer_name" placeholder="Họ và tên">
							</div>
							
							<div>
							   <input type="text" name="customer_phone" placeholder="Số điện thoại"> 
							</div>
							
							<div>
								<input type="text" name="customer_email" placeholder="Email"> 
							</div>
							<div>
								<input type="text" name="customer_ci" placeholder="Căn cước công dân"> 
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="customer_city" placeholder="Thành phố"> 
						</div>
		    		<div>
						<input type="text" name="customer_district" placeholder="Quận"> 
						<!-- <select id="country" name="Quận"> 
							<option value="null">Select a Country</option>         
							<option value="AF">Afghanistan</option>

		         </select> -->
				 </div>		        
	
		           <div>
		          <input type="text" name="customer_address" placeholder="Địa chỉ"> 
		          </div>
				  
				  <div>
				  <input type="text" name="customer_password" placeholder="Mật khẩu"> 
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <br><div class="search"><div><input type="submit" style="color:rgb(211,51,25); font-family: 'Poppins', sans-serif; font-weight: bold;" name="submit" value="Tạo tài khoản" style="font-size:19px;background:#fff;cursor:pointer"></div></div>
		    <p class="terms" style="color:#444; font-size: 10px; font-family: 'Poppins', sans-serif; font-weight:bold;">Bằng cách nhấp vào 'Tạo Tài khoản', bạn đồng ý với <a href="#">các điều khoản  &amp; điều kiện</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php
include 'inc/footer.php';
?>

