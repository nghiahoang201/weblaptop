<?php
    include '../lib/database.php';
    include '../helpers/format.php';
?>
<?php
    class admin{
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();//gan db = class database
            $this->fm = new Format();
        }
        public function show_admin(){
            $query = "select * from tbl_admin order by adminId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function getadminbyId($adminId){
            $query = "select * from tbl_admin where adminId = '$adminId' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_admin($adminPass){
            $adminPass= $this->fm->validation( $adminPass);
           
            $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);
          
            
            if(empty($adminPass)){
                $alert = "<span class='error'>Vui lòng nhập mật khẩu</span>";
                return $alert;
            }
            else{
                $query = "update tbl_admin set adminPass='$adminPass'";
                $result = $this->db->update($query);
                if($result){
                    $alert = "<span class='success'>đổi mật khẩu thành công</span>";
                    return $alert;
                }
                else{
                    $alert = "<span class='error'>đổi mật khẩu thất bại</span>";
                    return $alert;
                }
            }
        }
    }
?>