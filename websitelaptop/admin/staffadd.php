<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/staff.php'?>
<?php
    $staff = new staff();
	if($_SERVER['REQUEST_METHOD']==='POST'){
		$staffName = $_POST['staffName'];
        $staffSex = $_POST['staffSex'];
        $staffPhone = $_POST['staffPhone'];
        $staffAddress = $_POST['staffAddress'];
        $staffBirthday = $_POST['staffBirthday'];
		$insertStaff = $staff->insert_staff($staffName,$staffSex,$staffPhone,$staffAddress,$staffBirthday);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm nhân viên</h2>
               <div class="block copyblock"> 
               <?php
                    if(isset($insertStaff)){
                        echo $insertStaff;
                    }
                ?>
                 <form action="staffadd.php" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="staffName" placeholder="Vui lòng thêm tên nhân viên" class="medium" /><br>
                                Nam<input type="radio"  value="Nam" name="staffSex" placeholder="Vui lòng thêm giới tính nhân viên"  />
                                Nữ<input type="radio" value="Nữ" name="staffSex" placeholder="Vui lòng thêm giới tính nhân viên"  /><br>
                                <input type="text" name="staffPhone" placeholder="Vui lòng thêm sđt nhân viên" class="medium" />
                                <input type="text" name="staffAddress" placeholder="Vui lòng thêm địa chỉ nhân viên" class="medium" />
                                <input type="date" name="staffBirthday" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>


