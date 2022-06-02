<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class news{
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();//gan db = class database
            $this->fm = new Format();
        }
        public function insert_post($postName,$postDesc,$image)
        {
            // ktra hop le 0
            $postName = $this->fm->validation($postName);
            $postDesc = $this->fm->validation($postDesc);
            $image = $this->fm->validation($image);
            // ket noi voi co so du lieu
            $postName = mysqli_real_escape_string($this->db->link, $postName);
            $postDesc = mysqli_real_escape_string($this->db->link,$postDesc);
            $image = mysqli_real_escape_string($this->db->link,$image);
           
            if(empty($postName)){
                $alert = "<span class='error'>Vui lòng nhập tên danh mục</span>";
                return $alert;
            }
            else{
                $query = "insert into tbl_post(postName,postDesc,image) values('$postName','$postDesc','$image')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Thêm tin tức thành công</span>";
                    return $alert;
                }
                else{
                    $alert = "<span class='error'>Thêm tin tức không thành công</span>";
                    return $alert;
                }
            }
        }
        public function show_post(){
            $query = "select * from tbl_post order by postId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function getpostbyId($id){
            $query = "select * from tbl_post where postId = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }
        
        public function del_post($id){
            $query = "delete from tbl_post where postId = '$id'";
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