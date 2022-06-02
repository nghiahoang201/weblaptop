<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/staff.php'?>
<?php
	if(!isset($_GET['staffid']) || $_GET['staffid']==NULL){
		echo "<script>window.location='stafflist.php'</script>";
	}
    else{
        $id = $_GET['staffid'];
    }
    $staff = new staff();
	if($_SERVER['REQUEST_METHOD']==='POST'){
		$staffName = $_POST['staffName'];
        $staffSex = $_POST['staffSex'];
        $staffPhone = $_POST['staffPhone'];
        $staffAddress= $_POST['staffAddress'];
        $staffBirthday= $_POST['staffBirthday'];
		$updatestaff = $staff->update_staff($staffName,$id,$staffSex,$staffPhone,$staffAddress,$staffBirthday);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa nhân viên</h2>
               <div class="block copyblock"> 
               <?php
                    if(isset($updatestaff)){
                        echo $updatestaff;
                    }
                ?>
                <?php
                    $get_staff_name = $staff->getstaffbyId($id);
                    if($get_staff_name){
                        while($result = $get_staff_name->fetch_assoc()){
                    
                ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['staffName'] ?>" name="staffName" placeholder="Vui lòng nhập danh mục sản phẩm" class="medium" /><br>
                                Nam<input type="radio" value="Nam" name="staffSex" placeholder="Vui lòng thêm giới tính nhân viên"  />
                                Nữ<input type="radio" value="Nữ" name="staffSex" placeholder="Vui lòng thêm giới tính nhân viên"  /><br>
                                <input type="text" value="<?php echo $result['staffPhone'] ?>" name="staffPhone" placeholder="Vui lòng thêm sđt nhân viên" class="medium" />
                                <input type="text" value="<?php echo $result['staffAddress'] ?>" name="staffAddress" placeholder="Vui lòng thêm địa chỉ nhân viên" class="medium" />
                                <input type="date" value="<?php echo $result['staffBirthday'] ?>" name="staffBirthday" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Edit" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                    }
                    }
                    ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>