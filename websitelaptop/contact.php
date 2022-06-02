<?php
	include 'inc/header.php';
?>

<?php
   $lhe=new lhe();
   if($_SERVER['REQUEST_METHOD']==='POST'){
	   $lheName = $_POST['lheName'];
	   $lheEmail = $_POST['lheEmail'];
	   $lhePhone = $_POST['lhePhone'];
	   $lheCommen = $_POST['lheCommen'];
	   $insertlhe = $lhe->insert_lhe($lheName,$lheEmail,$lhePhone,$lheCommen);
   }
  ?>
 <div class="main">
    <div class="content">
    	<div class="support">
  			<div class="support_desc">
  				<h3>Hỗ trợ trực tiếp</h3>
  				<p><span>24 giờ | 7 ngày trong tuần | 365 ngày trong năm &nbsp;&nbsp; Hỗ trợ kỹ thuật trực tiếp</span></p>
  				
  			</div>
  				<img src="web/images/contact.png" alt="" />
  			<div class="clear"></div>
  		</div>
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Liên hệ chúng tôi</h2>
					  <?php
                    if(isset($insertlhe)){
                        echo $insertlhe;
                    }
                      ?>
					    <form action="contact.php" method="POST">
					    	<div>
						    	<span><label>Tên</label></span>
						    	<span><input name="lheName" type="text" value=""></span>
						    </div>
						    <div>
						    	<span><label>Email</label></span>
						    	<span><input name="lheEmail" type="text" value=""></span>
						    </div>
						    <div>
						     	<span><label>Số điện thoại</label></span>
						    	<span><input name="lhePhone" type="text" value=""></span>
						    </div>
						    <div>
						    	<span><label>Nội dung</label></span>
						    	<span><textarea name="lheCommen"> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" value="SUBMIT"></span>
						  </div>
					    </form>
				  </div>
  				</div>
				<div class="col span_1_of_3">
      			<div class="company_address">
				     	<h2>Thông tin công ty :</h2>
						    	<p>19 Liễu Giai-Ba Đình-Hà Nội</p>
						   		<p>Việt Nam</p>
				   		<p>Phone:(00) 222 666 444</p>
				   		<p>Fax: (000) 000 00 00 0</p>
				 	 	<p>Email: <span>nnshop.com</span></p>
				   		<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
				   </div>
				 </div>
			  </div>    	
    </div>
 </div>
 <?php
	include 'inc/footer.php';
?>
