<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class brand{
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();//gan db = class database
            $this->fm = new Format();
        }
        public function insert_brand($brandName)
        {
            // ktra hop le 0
            $brandName = $this->fm->validation($brandName);
            // ket noi voi co so du lieu
            $brandName = mysqli_real_escape_string($this->db->link,$brandName);//ham doi chuoi thanh query
            if(empty($brandName)){
                $alert = "<span class='error'>Vui lòng nhập tên thương hiệu</span>";
                return $alert;
            }
            else{
                $query = "insert into tbl_brand(brandName) values('$brandName')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Thêm thương hiệu thành công</span>";
                    return $alert;
                }
                else{
                    $alert = "<span class='error'>Thêm thương hiệu không thành công</span>";
                    return $alert;
                }
            }
        }
        public function show_brand(){
            $query = "select * from tbl_brand order by brandId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function getcatbyId($id){
            $query = "select * from tbl_brand where brandId = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_brand($brandName,$id){
            $brandName = $this->fm->validation($brandName);
            $brandName = mysqli_real_escape_string($this->db->link,$brandName);
            $id = mysqli_real_escape_string($this->db->link,$id);
            if(empty($brandName)){
                $alert = "<span class='error'>Vui lòng nhập tên thương hiệu</span>";
                return $alert;
            }
            else{
                $query = "update tbl_brand set brandName='$brandName' where brandId='$id'";
                $result = $this->db->update($query);
                if($result){
                    $alert = "<span class='success'>Sửa thương hiệu thành công</span>";
                    return $alert;
                }
                else{
                    $alert = "<span class='error'>Sửa thương hiệu không thành công</span>";
                    return $alert;
                }
            }
        }
        public function del_brand($id){
            $query = "delete from tbl_brand where brandId = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Xóa thương hiệu thành công</span>";
                return $alert;
            }
            else{
                $alert = "<span class='error'>Xóa thương hiệu không thành công</span>";
                return $alert;
            }
        }
    }
?>