<?php
    $filepath = realpath(dirname(__FILE__));
	include ($filepath.'/../lib/session.php');
	Session::checkLogin(); // gọi hàm check login để ktra session
	include_once($filepath.'/../lib/database.php');
	include_once($filepath.'/../helpers/format.php');
?>
<?php
    class adminlogin{
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();//gan db = class database
            $this->fm = new Format();
        }
        public function login_admin($adminUser,$adminPass)
        {
            // ktra hop le 0
            $adminUser = $this->fm->validation($adminUser);
            $adminPass = $this->fm->validation($adminPass);
            // ket noi voi co so du lieu
            $adminUser = mysqli_real_escape_string($this->db->link,$adminUser);//ham doi chuoi thanh query
            $adminPass = mysqli_real_escape_string($this->db->link,$adminPass);//link use ket noi vs sql
            if(empty($adminPass)||empty($adminPass)){
                $alert = "Bạn phải nhập tên và mật khẩu!";
                return $alert;
            }
            else{
                $query = "select * from tbl_admin where adminUser = '$adminUser' and adminPass = '$adminPass' limit 1";
                $result = $this->db->select($query);
                if($result!=false){
                    $value =$result->fetch_assoc();// đổi từ mảng thành chuỗi kết hợp
                    Session::set('adminlogin',true);
                    Session::set('adminId',$value['adminId']);
                    Session::set('adminUser',$value['adminUser']);
                    Session::set('adminPass',$value['adminPass']);
                    Session::set('adminName',$value['adminName']);
                    header('Location:index.php');

                }
                else{
                    $alert = "tên mật khẩu sai!";
                    return $alert;
                }
            }
        }
    }
?>