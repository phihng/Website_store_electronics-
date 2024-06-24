<?php
class DANHMUC
{
    private $id;
    private $tentbdt;
    private $trangthai;


    public function getid()
    {
        return $this->id;
    }

    public function setid($value)
    {
        $this->id = $value;
    }

    public function gettentbdt()
    {
        return $this->tentbdt;
    }

    public function settentbdt($value)
    {
        $this->tentbdt = $value;
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
    public function laydanhmuc()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM danhmuc";
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
    public function laydanhmuctheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM danhmuc WHERE id=:id";
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
    public function themdanhmuc($danhmuc)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO danhmuc(tentbdt, trangthai) VALUES(:tentbdt, :trangthai)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tentbdt", $danhmuc->tentbdt);
            $cmd->bindValue(":trangthai", $danhmuc->trangthai);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Xóa 
    public function xoadanhmuc($danhmuc)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM danhmuc WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $danhmuc->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật 
    public function suadanhmuc($danhmuc)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE danhmuc SET tentbdt=:tentbdt,  trangthai=:trangthai WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $danhmuc->id);
            $cmd->bindValue(":tentbdt", $danhmuc->tentbdt);
            $cmd->bindValue(":trangthai", $danhmuc->trangthai);
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
            $sql = "UPDATE danhmuc set trangthai=:trangthai where id=:id";
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
