<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/customer.php');
    include_once ($filepath.'/../helpers/format.php');
 ?>
<?php
    $cs = new customer(); 
    if(isset($_GET['customerid'])){
        $id = $_GET['customerid']; // Lấy catid trên host
        $delCustomer = $cs->del_customer($id);
    } 
  ?>
    <div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách khách hàng</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>NAME</th>
					<th>Address</th>
					<th>City</th>
					<th>Phone</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				
				$cslist = $cs->show_customers1();
				$i = 0;
				
				
					if($cslist){
					
							while ($result = $cslist->fetch_assoc()){
								$i++;
									
									
				 ?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['name'] ?></td>
					<td>
						<?php echo $result['address'] ?>

					</td>
					<td>
						<?php echo $result['city'] ?>

					</td>
					<td>
						<?php echo $result['phone'] ?>

					</td>
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