<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/staff.php'?>
<?php
	$staff = new staff();
	if(isset($_GET['delid']))
	{
        $id = $_GET['delid'];
		$delStaff = $staff->del_staff($id);
    }
	
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh Sách nhân viên</h2>
                <div class="block">
				<?php
                    if(isset($delStaff)){
                        echo $delStaff;
                    }
                ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên nhân viên</th>
							<th>Giới tính</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Ngày sinh</th>
                            <th>Option</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$show_nv = $staff->show_staff();
							if(isset($show_nv)){
								$i=0;
								while ($result = $show_nv->fetch_assoc()){
									$i++;
								
							
						?>
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo $result['staffName'] ?></td>
                            <td><?php echo $result['staffSex'] ?></td>
                            <td><?php echo $result['staffPhone'] ?></td>
                            <td><?php echo $result['staffAddress'] ?></td>
                            <td><?php echo $result['staffBirthday'] ?></td>
							<td><a href="staffedit.php?staffid=<?php echo $result['staffId']; ?>">Edit</a> || <a onclick="return confirm('Bạn có chắc muốn xóa không?')" href="?delid=<?php echo $result['staffId']; ?>">Delete</a></td>
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
