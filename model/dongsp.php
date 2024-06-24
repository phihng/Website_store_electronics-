<?php
class DONGSP
{
    private $id;
    private $tendong;
    private $trangthai;


    public function getid()
    {
        return $this->id;
    }

    public function setid($value)
    {
        $this->id = $value;
    }

    public function gettendong()
    {
        return $this->tendong;
    }

    public function settendong($value)
    {
        $this->tendong = $value;
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
    public function laydongsp()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM dongsp";
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
    public function laydongsptheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM dongsp WHERE id=:id";
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
    public function themdongsp($dongsp)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO dongsp(tendong, trangthai) VALUES(:tendong, :trangthai)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tendong", $dongsp->tendong);
            $cmd->bindValue(":trangthai", $dongsp->trangthai);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Xóa 
    public function xoadongsp($dongsp)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM dongsp WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $dongsp->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật 
    public function suadongsp($dongsp)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE dongsp SET tendong=:tendong,  trangthai=:trangthai WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $dongsp->id);
            $cmd->bindValue(":tendong", $dongsp->tendong);
            $cmd->bindValue(":trangthai", $dongsp->trangthai);
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
            $sql = "UPDATE dongsp set trangthai=:trangthai where id=:id";
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
