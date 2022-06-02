<?php
	include 'inc/header.php';
?>

<div class="main">
    <div class="content">
    	<div class="content_top">
        <div class="cont-desc span_1_of_2">		
    		<div class="heading">
    		<h3>Tin tức</h3>
    		</div>
        </div>
           
    	</div>

        <div class="section group">
        <div class="rightsidebar span_3_of_1" style="float: right">
        <?php  
        $show_post= $news->show_post();
         $result=$show_post->fetch_assoc();
          ?>
					<h2>Tin tức mới</h2>
					<ul>
				      <li><a href="news1.php"><?php echo $result['postName'] ?></a></li>
                      <li><a href="#">Loạt laptop trang bị CPU AMD hướng đến người dùng trẻ</a></li>
                      <li><a href="#">5 mẫu laptop Lenovo gọn nhẹ, cấu hình cao</a></li>
                      <li><a href="#">Acer Nitro 5 trang bị vi xử lý Intel Core i thế hệ thứ 11</a></li>
                      <li><a href="#">Acer ra mắt loạt sản phẩm laptop trang bị card đồ họa Nvidia GeForce RTX 30 Series</a></li>
                      
    				</ul>
    	
 				</div>
          <?php  
        $show_post= $news->show_post();
          if($show_post){
              while($result=$show_post->fetch_assoc()){
          ?>
          <div>
         <a href="news1.php"><img width="400px" height="100%" style="line-height: 140px;" src="admin/img/<?php echo $result['image']?>"></a>
          </div>
          <div>
              <h2 style="width:550px;line-height: 1.1em;"><?php echo $result['postName'] ?></h2>
              <p style="width:550px;line-height: 1.5em;"><?php echo $result['postDesc']  ?></p>
          </div>
          <?php
              }
            }
          
          ?>
        </div>
        <div ><a href="news.php"><button type="button" class="btn btn-primary" style="width:60px;height:30px">1</button></a>	<a href="" ><button type="button" class="btn btn-primary"style="width:60px;height:30px">2</button></a>	<a href="" ><button type="button" class="btn btn-primary"style="width:60px;height:30px">3</button></a><a href="" class="btn-page next-page "><svg class="ic ic-arrow-right"></svg></a>
      </div>
    
        </div>

</div>

<?php
	include 'inc/footer.php';
?>
