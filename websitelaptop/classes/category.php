<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class category{
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();//gan db = class database
            $this->fm = new Format();
        }
        public function insert_category($catName)
        {
            // ktra hop le 0
            $catName = $this->fm->validation($catName);
            // ket noi voi co so du lieu
            $catName = mysqli_real_escape_string($this->db->link,$catName);//ham doi chuoi thanh query
            if(empty($catName)){
                $alert = "<span class='error'>Vui lòng nhập tên danh mục</span>";
                return $alert;
            }
            else{
                $query = "insert into tbl_category(catName) values('$catName')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Thêm danh mục thành công</span>";
                    return $alert;
                }
                else{
                    $alert = "<span class='error'>Thêm danh mục không thành công</span>";
                    return $alert;
                }
            }
        }
        public function show_category(){
            $query = "select * from tbl_category order by catId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function getcatbyId($id){
            $query = "select * from tbl_category where catId = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_category($catName,$id){
            $catName = $this->fm->validation($catName);
            $catName = mysqli_real_escape_string($this->db->link,$catName);
            $id = mysqli_real_escape_string($this->db->link,$id);
            if(empty($catName)){
                $alert = "<span class='error'>Vui lòng nhập tên danh mục</span>";
                return $alert;
            }
            else{
                $query = "update tbl_category set catName='$catName' where catId='$id'";
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
        public function del_category($id){
            $query = "delete from tbl_category where catId = '$id'";
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
        public function show_category_fontend()
		{
			$query = "SELECT * FROM tbl_category order by catId desc ";
			$result = $this->db->select($query);
			return $result;
		}
    }
?>