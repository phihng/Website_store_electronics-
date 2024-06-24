<?php
class DONHANG
{
    private $id;
    private $khachhang_id;
    private $ngaygiao;
    private $ngaynhan;
    private $tongtien;
    private $ghichu;
    private $trangthai;

    public function gettrangthai()
    {
        return $this->trangthai;
    }

    public function settrangthai($value)
    {
        $this->trangthai = $value;
    }

    public function getid()
    {
        return $this->id;
    }

    public function setid($value)
    {
        $this->id = $value;
    }

    public function getkhachhang_id()
    {
        return $this->khachhang_id;
    }

    public function setkhachhang_id($value)
    {
        $this->khachhang_id = $value;
    }
    public function getngaygiao()
    {
        return $this->ngaygiao;
    }

    public function setngaygiao($value)
    {
        $this->ngaygiao = $value;
    }
    public function getngaynhan()
    {
        return $this->ngaynhan;
    }

    public function setngaynhan($value)
    {
        $this->ngaynhan = $value;
    }
    public function gettongtien()
    {
        return $this->tongtien;
    }

    public function settongtien($value)
    {
        $this->tongtien = $value;
    }
    public function getghichu()
    {
        return $this->ghichu;
    }

    public function setghichu($value)
    {
        $this->ghichu = $value;
    }

    // Lấy danh sách
    public function laydonhang()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM donhang";
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
    public function laydonhangtheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM donhang WHERE id=:id";
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
    public function themdonhang($donhang)
    {
        $dbcon = DATABASE::connect();
        try {
            
            $tongtien = tinhtiengiohang(); // Lấy tổng tiền từ hàm tinhtiengiohang
            $sql = "INSERT INTO donhang(khachhang_id,ngaygiao, ngaynhan,tongtien,ghichu, trangthai) VALUES(:khachhang_id,:ngaygiao,:ngaynhan,:tongtien,:ghichu,:trangthai)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":khachhang_id", $donhang->khachhang_id);
            $cmd->bindValue(":ngaygiao", $donhang->ngaygiao);
            $cmd->bindValue(":ngaynhan", $donhang->ngaynhan);
            $cmd->bindValue(":tongtien",$donhang->tongtien);
            $cmd->bindValue(":ghichu", $donhang->ghichu);
            $cmd->bindValue(":trangthai", $donhang->trangthai);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Xóa 
    public function xoadonhang($donhang)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM donhang WHERE id=:id";
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
    public function suadonhang($donhang)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE donhang SET khachhang_id=:khachhang_id, ngaygiao=:ngaygiao,ngaynhan=:ngaynhan,tongtien=:tongtien,ghichu=:ghichu,trangthai=:trangthai WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":khachhang_id", $donhang->khachhang_id);
            $cmd->bindValue(":ngaygiao", $donhang->ngaygiao);
            $cmd->bindValue(":ngaynhan", $donhang->ngaynhan);
            $cmd->bindValue(":tongtien",$donhang->tongtien);
            $cmd->bindValue(":ghichu", $donhang->ghichu);
            $cmd->bindValue(":trangthai", $donhang->trangthai);
            $result = $cmd->execute();
            return $result;
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
              $sql = "UPDATE donhang set trangthai=:trangthai where id=:id";
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

      public function capnhatngaygiaohang($id, $ngaynhan)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE donhang SET ngaynhan = :ngaynhan WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":ngaynhan", $ngaynhan);
            $cmd->bindValue(":id",$id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    
}
