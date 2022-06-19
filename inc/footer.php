</div>



<div class="footer" style="background: white; margin-top:20px; box-shadow: none;" >
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col-lg-3 col-md-6 col-sm-12">
				<h2><a href="index.php"><img src="images/logo book store.jpg"></a></h2>
				<p style="text-transform:none; font-size: 13px;">
                            <i class="fa-solid fa-location-dot"></i> Số 338 Phố Xã Đàn, Phương Liên, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Đống Đa, Hà Nội
							<br><br><i class="fa fa-phone" aria-hidden="true"></i>  Hotline: (04) 35.738.739
                          <br><br><i class="fa-solid fa-envelope" aria-hidden="true"></i>  Mail: bookstore@gmail.com</p>
                </p>
					</div>
				<div class="col-lg-3 col-md-6 col-sm-12">
					<h3 style="color: black; font-size: 20px; margin-top: 35px; border-bottom:1px solid #333;">Dịch Vụ</h3>
                          <a href="a.php"><p style="font-size: 13px; color: black;">Điều khoản sử dụng</p></a>
                          <a href="b.php"><p style="font-size: 13px; color: black;">Chính sách bảo mật</p></a>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12">
				<h3  style="color: black; font-size: 20px; margin-top: 35px; border-bottom:1px solid #333;">Hỗ Trợ</h3>
					<a href="e.php"><p style="font-size: 13px; color: black;">Chính sách khách sỉ</p></a>
                    <a href="f.php"><p style="font-size: 13px; color: black;">Phương thức vận chuyển</p></a>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12">
				<h3  style="color: black; font-size: 20px; margin-top: 35px; border-bottom:1px solid #333;">Tài khoản của tôi</h3>
						<ul>
							<a href="login.php"><p style="font-size: 13px; color: black;">Đăng nhập/Tạo mới tài khoản</p></a>
							<a href="profile-edit.php"> <p style="font-size: 13px; color: black;">Thay đổi địa chỉ khách hàng</p></a>
							<a href="profile.php"> <p style="font-size: 13px; color: black;">Chi tiết tài khoản</p></a>
							<a href="orderdetail.php"><p style="font-size: 13px; color: black;">Lịch sử mua hàng</p></a>
						</ul>
				</div>
			</div>
     </div>
	 <div id="footer-bottom" style="background:#1D1E24;">
            	<div class="container">
                	<div class="row">
                    	<div class="col-lg-12 col-md-12 col-sm-12">
                        	<p align="center" style="color:#a1b1bc;">
                              2022 © BOOK STORE. All rights reserved. 
                          	</p>
                    	</div>
                	</div>
            	</div>
          	</div>
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
</body>
</html>