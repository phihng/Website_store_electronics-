<?php
class DONHANGCT
{
    private $id;
    private $donhang_id;
    private $sanpham_id;
    private $dongia;
    private $soluong;
    private $thanhtien;

    public function getid()
    {
        return $this->id;
    }

    public function setid($value)
    {
        $this->id = $value;
    }

    public function getdonhang_id()
    {
        return $this->donhang_id;
    }

    public function setdonhang_id($value)
    {
        $this->donhang_id = $value;
    }
    public function getsanpham_id()
    {
        return $this->sanpham_id;
    }

    public function setsanpham_id($value)
    {
        $this->sanpham_id = $value;
    }
    public function getdongia()
    {
        return $this->dongia;
    }

    public function setdongia($value)
    {
        $this->dongia = $value;
    }
    public function getsoluong()
    {
        return $this->soluong;
    }

    public function setsoluong($value)
    {
        $this->soluong = $value;
    }
    public function getthanhtien()
    {
        return $this->thanhtien;
    }

    public function setthanhtien($value)
    {
        $this->thanhtien = $value;
    }

    // Lấy danh sách
    public function laydonhangct()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM donhang_ct";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }


    // Lấy danh mục theo id
    public function laydonhangcttheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM donhang_ct WHERE id=:id";
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
    // Thêm mới
    public function themdonhangct($donhangct)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO donhang_ct(donhang_id,sanpham_id,dongia,soluong,thanhtien) VALUES(:donhang_id,:sanpham_id,:dongia,:soluong,:thanhtien)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":donhang_id", $donhangct->donhang_id);
            $cmd->bindValue(":sanpham_id", $donhangct->sanpham_id);
            $cmd->bindValue(":dongia", $donhangct->dongia);
            $cmd->bindValue(":soluong", $donhangct->soluong);
            $cmd->bindValue(":thanhtien", $donhangct->thanhtien);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Xóa 
    public function xoadonhangct($donhang)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM donhang_ct WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $donhang->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật 
    public function suadonhangct($donhang)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE donhang_ct SET tendonhang=:tendonhang WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tendonhang", $donhang->tendonhang);
            $cmd->bindValue(":id", $donhang->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
