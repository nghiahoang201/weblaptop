<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>   
<?php include '../classes/news.php'?>
<?php
    $news = new news();
	if($_SERVER['REQUEST_METHOD']==='POST'){
		$postName = $_POST['postName'];
        $postDesc = $_POST['postDesc'];
        $image = $_POST['image'];
		$insertpost = $news->insert_post($postName, $postDesc,$image );
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Tin tức</h2>
        <div class="block">    
        <?php
                    if(isset($insertpost)){
                        echo $insertpost;
                    }
        ?>          
         <form action="newsadd.php" method="POST">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên bài viết</label>
                    </td>
                    <td>
                        <input type="text" name="postName" placeholder="Nhập tên bài viết.." class="medium" />
                    </td>
                </tr>
			
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả</label>
                    </td>
                    <td>
                        <textarea name="postDesc" style="width:500px;height:200px"></textarea>
                    </td>
                </tr>
	
                <tr>
                    <td>
                        <label>Tải ảnh</label>
                    </td>
                    <td>
                        <input type="file" name="image"/>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input  type="submit" name="submit" Value="Save" >
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
    </div>
</div>
<?php include 'inc/footer.php';?>