<?php
class PHANKHUCSANPHAM
{
    private $id;
    private $giatritoithieu;
    private $giatritoida;

    public function getid()
    {
        return $this->id;
    }

    public function setid($value)
    {
        $this->id = $value;
    }

    public function getgiatritoithieu()
    {
        return $this->giatritoithieu;
    }

    public function setgiatritoithieu($value)
    {
        $this->giatritoithieu = $value;
    }

    public function getgiatritoida()
    {
        return $this->giatritoida;
    }

    public function setgiatritoida($value)
    {
        $this->giatritoida = $value;
    }

    // Lấy danh sách
    public function layphankhucsp()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM phankhucsp";
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
    public function layphankhucsptheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT giatritoithieu, giatritoida FROM phankhucsp WHERE id=:id";
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
    public function themphankhucsp($phankhucsp)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO phankhucsp(giatritoithieu, giatritoida) VALUES(:giatritoithieu, :giatritoida)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":giatritoithieu", $phankhucsp->giatritoithieu);
            $cmd->bindValue(":giatritoida", $phankhucsp->giatritoida);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Xóa 
    public function xoaphankhucsp($phankhucsp)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM phankhucsp WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $phankhucsp->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật 
    public function suaphankhucsp($phankhucsp)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE phankhucsp SET giatritoithieu=:giatritoithieu, giatritoida=:giatritoida WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":giatritoithieu", $phankhucsp->giatritoithieu);
            $cmd->bindValue(":giatritoida", $phankhucsp->giatritoida);
            $cmd->bindValue(":id", $phankhucsp->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
