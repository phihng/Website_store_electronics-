<?php
class NGUOIDUNG
{
    private $id;
    private $taikhoan;
    //private $sodienthoai;
    private $matkhau;
   //private $hoten;
    private $loaiquyen;
    private $trangthai;
    //private $hinhanh;
    //private $diachi;

    public function getid()
    {
        return $this->id;
    }
    public function setid($value)
    {
        $this->id = $value;
    }
    public function gettaikhoan()
    {
        return $this->taikhoan;
    }
    public function settaikhoan($value)
    {
        $this->taikhoan = $value;
    }
    // public function getsodienthoai()
    // {
    //     return $this->sodienthoai;
    // }
    // public function setsodienthoai($value)
    // {
    //     $this->sodienthoai = $value;
    // }
    public function getmatkhau()
    {
        return $this->matkhau;
    }
    public function setmatkhau($value)
    {
        $this->matkhau = $value;
    }
    // public function gethoten()
    // {
    //     return $this->hoten;
    // }
    // public function sethoten($value)
    // {
    //     $this->hoten = $value;
    // }
    public function getloaiquyen()
    {
        return $this->loaiquyen;
    }
    public function setloaiquyen($value)
    {
        $this->loaiquyen = $value;
    }
    public function gettrangthai()
    {
        return $this->trangthai;
    }
    public function settrangthai($value)
    {
        $this->trangthai = $value;
    }
    // public function gethinhanh()
    // {
    //     return $this->hinhanh;
    // }
    // public function sethinhanh($value)
    // {
    //     $this->hinhanh = $value;
    // }
    // public function getdiachi()
    // {
    //     return $this->diachi;
    // }
    // public function setdiachi($value)
    // {
    //     $this->diachi = $value;
    // }
    // khai báo các thuộc tính (SV tự viết)

    public function kiemtranguoidunghople($taikhoan, $matkhau)
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung WHERE taikhoan=:taikhoan AND matkhau=:matkhau AND trangthai=1";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":taikhoan", $taikhoan);
            $cmd->bindValue(":matkhau", $matkhau);
            $cmd->execute();
            $valid = ($cmd->rowCount() == 1);
            $cmd->closeCursor();
            return $valid;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // lấy thông tin người dùng có $taikhoan
    public function laythongtinnguoidung($taikhoan)
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung WHERE taikhoan=:taikhoan";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":taikhoan", $taikhoan);
            $cmd->execute();
            $ketqua = $cmd->fetch();
            $cmd->closeCursor();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    //lay ds người dùng theo id
    public function laynguoidungtheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // lấy tất cả ng dùng
    public function laydanhsachnguoidung()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            $ketqua = $cmd->fetchAll();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    
    // Thêm ng dùng mới, trả về khóa của dòng mới thêm
    // (SV nên truyền tham số là 1 đối tượng kiểu người dùng, không nên truyền nhiều tham số rời rạc như thế này)
    public function themnguoidung($nguoidung)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO nguoidung(taikhoan,matkhau,loaiquyen,trangthai) 
VALUES(:taikhoan,:matkhau,:loaiquyen,:trangthai)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':taikhoan', $nguoidung->taikhoan);
            $cmd->bindValue(':matkhau', md5($nguoidung->matkhau));
 
            $cmd->bindValue(':loaiquyen', $nguoidung->loaiquyen);
            $cmd->bindValue(':trangthai', $nguoidung->trangthai);
            $cmd->execute();
            $id = $db->lastInsertId();
            return $id;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật thông tin ng dùng: họ tên, số đt, taikhoan, ảnh đại diện 
    // (SV nên truyền tham số là 1 đối tượng kiểu người dùng, không nên truyền nhiều tham số rời rạc như thế này)
    
    // Đổi mật khẩu
    public function doimatkhau($taikhoan, $matkhau)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE nguoidung set matkhau=:matkhau where taikhoan=:taikhoan";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':taikhoan', $taikhoan);
            $cmd->bindValue(':matkhau', md5($matkhau));
            $ketqua = $cmd->execute();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Đổi quyền (loại người dùng: 1 quản trị, 2 nhân viên. Không cần nâng cấp quyền đối với loại người dùng 3 khách hàng)
    public function doiloaiquyenquyennguoidung($taikhoan, $loaiquyenquyen)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE nguoidung set loaiquyenquyen=:loaiquyenquyen where taikhoan=:taikhoan";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':taikhoan', $taikhoan);
            $cmd->bindValue(':loaiquyenquyen', $loaiquyenquyen);
            $ketqua = $cmd->execute();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Đổi trạng thái (0 khóa, 1 kích hoạt)
    public function doitrangthai($id, $trangthai)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE nguoidung set trangthai=:trangthai where id=:id";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':id', $id);
            $cmd->bindValue(':trangthai', $trangthai);
            $ketqua = $cmd->execute();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
