<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/news.php'?>
<?php
	$news = new news();
	if(isset($_GET['delid']))
	{
        $id = $_GET['delid'];
		$delpost = $news->del_post($id);
    }
	
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh Sách tin tức</h2>
                <div class="block">
				<?php
                    if(isset($delpost)){
                        echo $delpost;
                    }
                ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
                            <th>STT</th>
							<th>Tên tin tức</th>
							<th>tiêu đề bài đăng</th>
							<th>ảnh tinh tức</th>
                            <th>Option</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$show_post = $news->show_post();
							if(isset($show_post)){
								$i=0;
								while ($result = $show_post->fetch_assoc()){
									$i++;
								
							
						?>
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo $result['postName'] ?></td>
                            <td><?php echo $result['postDesc'] ?></td>
                            <td><img width="200px" height="100%" style="line-height: 140px;" src="img/<?php echo $result['image']?>"> </td>
							<td> <a onclick="return confirm('Bạn có chắc muốn xóa không?')" href="?delid=<?php echo $result['postId']; ?>">Delete</a></td>
						</tr>
						<?php 
						}
						} 
						?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>
