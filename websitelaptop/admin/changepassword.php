<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/password.php'?>
<?php

    $admin = new admin();
	if($_SERVER['REQUEST_METHOD']==='POST'){
		    $adminPass=$_POST['adminPass'];
		$updateadmin = $admin->update_admin(md5($adminPass));
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thay Đổi Mật Khẩu</h2>
        <div class="block">      
        <?php
                    if(isset($updateadmin)){
                        echo $updateadmin;
                    }
                ?>       
         <form method="POST">
            <table class="form">					
                <tr>
                    <td>
                        <label>Mật khẩu cũ</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Nhập mật khẩu cũ..."   class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Mật khẩu mới</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Nhập mật khẩu mới..." name="adminPass" class="medium" />
                    </td>
                </tr>
				 
				
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
 
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>