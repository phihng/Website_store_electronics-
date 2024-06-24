<?php
class HANG
{
    private $id;
    private $tenhang;
    private $trangthai;


    public function getid()
    {
        return $this->id;
    }

    public function setid($value)
    {
        $this->id = $value;
    }

    public function gettenhang()
    {
        return $this->tenhang;
    }

    public function settenhang($value)
    {
        $this->tenhang = $value;
    }

    public function gettrangthai()
    {
        return $this->trangthai;
    }

    public function settrangthai($value)
    {
        $this->trangthai = $value;
    }


    // Lấy danh sách
    public function layhang()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM hang";
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
    public function layhangtheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM hang WHERE id=:id";
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
    public function themhang($hang)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO hang(tenhang, trangthai) VALUES(:tenhang, :trangthai)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenhang", $hang->tenhang);
            $cmd->bindValue(":trangthai", $hang->trangthai);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Xóa 
    public function xoahang($hang)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM hang WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $hang->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật 
    public function suahang($hang)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE hang SET tenhang=:tenhang,  trangthai=:trangthai WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $hang->id);
            $cmd->bindValue(":tenhang", $hang->tenhang);
            $cmd->bindValue(":trangthai", $hang->trangthai);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function doitrangthai($id, $trangthai)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE hang set trangthai=:trangthai where id=:id";
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
