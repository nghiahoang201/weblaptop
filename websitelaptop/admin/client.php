<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Đăng danh sách khách hàng</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
                    <th>Mã Khách hàng</th>
					<th>Tên khách hàng</th>
					<th>Ngày sinh</th>
                    <th>Giới tính</th>
					<th>Địa chỉ</th>
                    <th>Số điện thoại</th>
				</tr>
			</thead>
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