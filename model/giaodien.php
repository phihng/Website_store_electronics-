<?php
class GIAODIEN
{
    private $id;
    private $hinhanh;
    private $url;
    private $trangthai;

    public function getid()
    {
        return $this->id;
    }

    public function setid($value)
    {
        $this->id = $value;
    }

    public function gettrangthai()
    {
        return $this->trangthai;
    }
    public function settrangthai($value)
    {
        $this->trangthai = $value;
    }
    public function gethinhanh()
    {
        return $this->hinhanh;
    }
    public function sethinhanh($value)
    {
        $this->hinhanh = $value;
    }

    public function geturl()
    {
        return $this->url;
    }
    public function seturl($value)
    {
        $this->url = $value;
    }
    // Lấy danh sách
    public function laygiaodien()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM giaodien";
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
    public function laygiaodientheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM giaodien WHERE id=:id";
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
    public function themgiaodien($giaodien)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO giaodien(hinhanh, url, trangthai) VALUES(:hinhanh, :url, :trangthai)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":hinhanh", $giaodien->hinhanh);
            $cmd->bindValue(":url", $giaodien->url);
            $cmd->bindValue(":trangthai", $giaodien->trangthai);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Xóa 
    // public function xoagiao($giaodien)
    // {
    //     $dbcon = DATABASE::connect();
    //     try {
    //         $sql = "DELETE FROM danhgiasp WHERE id=:id";
    //         $cmd = $dbcon->prepare($sql);
    //         $cmd->bindValue(":id", $danhgiasp->id);
    //         $result = $cmd->execute();
    //         return $result;
    //     } catch (PDOException $e) {
    //         $error_message = $e->getMessage();
    //         echo "<p>Lỗi truy vấn: $error_message</p>";
    //         exit();
    //     }
    // }
    // Cập nhật 
    public function suagiaodien($giaodien)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE giaodien SET hinhanh=:hinhanh, url=:url, trangthai=:trangthai WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $giaodien->id);
            $cmd->bindValue(":hinhanh", $giaodien->hinhanh);
            
            $cmd->bindValue(":url", $giaodien->url);
            $cmd->bindValue(":trangthai", $giaodien->trangthai);
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
            $sql = "UPDATE giaodien set trangthai=:trangthai where id=:id";
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
