<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class staff{
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();//gan db = class database
            $this->fm = new Format();
        }
        public function insert_staff($staffName,$staffSex,$staffPhone,$staffAddress,$staffBirthday)
        {
            // ktra hop le 0
            $staffName = $this->fm->validation($staffName);
            $staffSex = $this->fm->validation($staffSex);
            $staffPhone = $this->fm->validation($staffPhone);
            $staffAddress = $this->fm->validation($staffAddress);
            $staffBirthday = $this->fm->validation($staffBirthday);
            // ket noi voi co so du lieu
            $staffName = mysqli_real_escape_string($this->db->link,$staffName);
            $staffSex = mysqli_real_escape_string($this->db->link,$staffSex);
            $staffPhone = mysqli_real_escape_string($this->db->link,$staffPhone);
            $staffAddress = mysqli_real_escape_string($this->db->link,$staffAddress);
            $staffBirthday = mysqli_real_escape_string($this->db->link,$staffBirthday);
            if(empty($staffName)){
                $alert = "<span class='error'>Vui lòng nhập thông tin nhân viên</span>";
                return $alert;
            }
            else{
                $query = "insert into tbl_staff(staffName,staffSex,staffPhone,staffAddress,staffBirthday) values('$staffName','$staffSex','$staffPhone','$staffAddress','$staffBirthday')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Thêm nhân viên thành công</span>";
                    return $alert;
                }
                else{
                    $alert = "<span class='error'>Thêm nhân viên không thành công</span>";
                    return $alert;
                }
            }
        }
        public function show_staff(){
            $query = "select * from tbl_staff order by staffId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function getstaffbyId($id){
            $query = "select * from tbl_staff where staffId = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_staff($staffName,$id,$staffSex,$staffPhone,$staffAddress,$staffBirthday){
            $staffName = $this->fm->validation($staffName);
            $staffSex = $this->fm->validation($staffSex);
            $staffPhone = $this->fm->validation($staffPhone);
            $staffAddress = $this->fm->validation($staffAddress);
            $staffBirthday = $this->fm->validation($staffBirthday);
            $staffName = mysqli_real_escape_string($this->db->link,$staffName);
            $id = mysqli_real_escape_string($this->db->link,$id);
            $staffSex = mysqli_real_escape_string($this->db->link,$staffSex);
            $staffPhone = mysqli_real_escape_string($this->db->link,$staffPhone);
            $staffAddress = mysqli_real_escape_string($this->db->link,$staffAddress);
            $staffBirthday = mysqli_real_escape_string($this->db->link,$staffBirthday);
            if(empty($staffName)){
                $alert = "<span class='error'>Vui lòng nhập tên danh mục</span>";
                return $alert;
            }
            else{
                $query = "update tbl_staff set staffName='$staffName',staffSex='$staffSex',staffPhone='$staffPhone',staffAddress='$staffAddress',staffBirthday='$staffBirthday' where staffId='$id'";
                $result = $this->db->update($query);
                if($result){
                    $alert = "<span class='success'>Sửa danh mục thành công</span>";
                    return $alert;
                }
                else{
                    $alert = "<span class='error'>Sửa danh mục không thành công</span>";
                    return $alert;
                }
            }
        }
        public function del_staff($id){
            $query = "delete from tbl_staff where staffId = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Xóa danh mục thành công</span>";
                return $alert;
            }
            else{
                $alert = "<span class='error'>Xóa danh mục không thành công</span>";
                return $alert;
            }
        }
    }
?>