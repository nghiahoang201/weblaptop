<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/lhe.php'?>
<?php
	$lhe = new lhe();
	if(isset($_GET['delid']))
	{
        $id = $_GET['delid'];
		$dellhe = $lhe->del_lhe($id);
    }
	
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thư khách hàng</h2>
                <div class="block">
				<?php
                    if(isset($dellhe)){
                        echo $dellhe;
                    }
                ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên khách hàng</th>
							<th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Nội dung</th>
                            <th>Option</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$show_lhe = $lhe->show_lhe();
							if(isset($show_lhe)){
								$i=0;
								while ($result = $show_lhe->fetch_assoc()){
									$i++;
								
							
						?>
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo $result['lheName'] ?></td>
                            <td><?php echo $result['lheEmail'] ?></td>
                            <td><?php echo $result['lhePhone'] ?></td>
                            <td><?php echo $result['lheCommen'] ?></td>
							<td><a onclick="return confirm('Bạn có chắc muốn xóa không?')" href="?delid=<?php echo $result['lheId']; ?>">Delete</a></td>
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