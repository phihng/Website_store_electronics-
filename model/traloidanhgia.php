<?php
class TRALOIDANHGIA
{
    private $id;
    private $traloi;
    private $dg_id;
   
    private $ngaytl;

    
    public function getid()
    {
        return $this->id;
    }
    public function setid($value)
    {
        $this->id = $value;
    }
    public function gettraloi()
    {
        return $this->traloi;
    }
    public function settraloi($value)
    {
        $this->traloi = $value;
    }
    public function getdg_id()
    {
        return $this->dg_id;
    }
    public function setdg_id($value)
    {
        $this->dg_id = $value;
    }

    
    public function getngaytl()
    {
        return $this->ngaytl;
    }
    public function setngaytl($value)
    {
        $this->ngaytl = $value;
    }
    // khai báo các thuộc tính (SV tự viết)


    // lấy thông tin người dùng có $email
    // public function laythongtinbaiviet($email)
    // {
    //     $db = DATABASE::connect();
    //     try {
    //         $sql = "SELECT * FROM baiviet WHERE Email=:Email";
    //         $cmd = $db->prepare($sql);
    //         $cmd->bindValue(":Email", $Email);
    //         $cmd->execute();
    //         $ketqua = $cmd->fetch();
    //         $cmd->closeCursor();
    //         return $ketqua;
    //     } catch (PDOException $e) {
    //         $error_message = $e->getMessage();
    //         echo "<p>Lỗi truy vấn: $error_message</p>";
    //         exit();
    //     }
    // }

    // lấy tất cả ng dùng
    public function laydanhsachtraloidanhgiatheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM traloidanhgia WHERE id=:id";
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
    public function laydanhsachtraloidanhgia()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM traloidanhgia ORDER BY id DESC";
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
    public function themtraloidanhgia($traloidanhgia)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO traloidanhgia(traloi, dg_id, ngaytl) 
VALUES(:traloi, :dg_id,  :ngaytl)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':traloi', $traloidanhgia->traloi);
            $cmd->bindValue(':dg_id', $traloidanhgia->dg_id);
            $cmd->bindValue(':ngaytl', $traloidanhgia->ngaytl);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật thông tin ng dùng: họ tên, số đt, email, ảnh đại diện 
    // (SV nên truyền tham số là 1 đối tượng kiểu người dùng, không nên truyền nhiều tham số rời rạc như thế này)
    public function capnhattraloidanhgia($traloidanhgia)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE traloidanhgia set traloi=:traloi,dg_id=:dg_id,  ngaytl=:ngaytl  where id=id";
            $cmd = $db->prepare($sql);
            $cmd->bindValue('id', $traloidanhgia->id);
            $cmd->bindValue(':traloi', $traloidanhgia->traloi);
            $cmd->bindValue(':dg_id', $traloidanhgia->dg_id);

            $cmd->bindValue(':ngaytl', $traloidanhgia->ngaytl);
            $ketqua = $cmd->execute();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function capnhattraloi($id, $traloi, $NguoiTL)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE traloidanhgia set traloi=:traloi, NguoiTL=:NguoiTL where id=:id";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':id', $id);
            $cmd->bindValue(':traloi', $traloi);
            $cmd->bindValue(':NguoiTL', $NguoiTL);
            $ketqua = $cmd->execute();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Đổi quyền (loại người dùng: 1 quản trị, 2 nhân viên. Không cần nâng cấp quyền đối với loại người dùng 3 khách hàng)
    // public function doiloaibaiviet($Email, $QuyenND)
    // {
    //     $db = DATABASE::connect();
    //     try {
    //         $sql = "UPDATE baiviet set QuyenND=:QuyenND where Email=:Email";
    //         $cmd = $db->prepare($sql);
    //         $cmd->bindValue(':Email', $Email);
    //         $cmd->bindValue(':QuyenND', $QuyenND);
    //         $ketqua = $cmd->execute();
    //         return $ketqua;
    //     } catch (PDOException $e) {
    //         $error_message = $e->getMessage();
    //         echo "<p>Lỗi truy vấn: $error_message</p>";
    //         exit();
    //     }
    // }
    // // Đổi trạng thái (0 khóa, 1 kích hoạt)
    // public function doiMaND($traloi, $kh_id)
    // {
    //     $db = DATABASE::connect();
    //     try {
    //         $sql = "UPDATE baiviet set kh_id=:kh_id where traloi=:traloi";
    //         $cmd = $db->prepare($sql);
    //         $cmd->bindValue(':traloi', $traloi);
    //         $cmd->bindValue(':kh_id', $kh_id);
    //         $ketqua = $cmd->execute();
    //         return $ketqua;
    //     } catch (PDOException $e) {
    //         $error_message = $e->getMessage();
    //         echo "<p>Lỗi truy vấn: $error_message</p>";
    //         exit();
    //     }
    // }
}
