<?php
class SANPHAM
{
    // khai báo các thuộc tính
    private $id; 
    private $tensanpham;
    private $danhmuc_id;
    private $hang_id; //mới thêm
    private $mota;
    private $giagoc;
    private $giaban;
    private $soluongton;
    private $hinhanh;
    private $thongsokythuat; //mới thêm
    private $phankhuc; //mới thêm
    private $tendong_id; //new
    private $nv_id; //new
    private $trangthai; //new
    //private $giakhuyenmai; //new
    private $khuyenmai_id; //new

    // public function getgiakhuyenmai()
    // {
    //     return $this->giakhuyenmai;
    // }
    // public function setgiakhuyenmai($value)
    // {
    //     $this->giakhuyenmai = $value;
    // }

    public function getkhuyenmai_id()
    {
        return $this->khuyenmai_id;
    }
    public function setkhuyenmai_id($value)
    {
        $this->khuyenmai_id = $value;
    }
    public function getnv_id()
    {
        return $this->nv_id;
    }
    public function setnv_id($value)
    {
        $this->nv_id = $value;
    }

    public function gettrangthai()
    {
        return $this->trangthai;
    }
    public function settrangthai($value)
    {
        $this->trangthai = $value;
    }
    public function gettendong_id()
    {
        return $this->tendong_id;
    }
    public function settendong_id($value)
    {
        $this->tendong_id = $value;
    }

    public function gethang_id()
    {
        return $this->hang_id;
    }
    public function sethang_id($value)
    {
        $this->hang_id = $value;
    }

    public function getthongsokythuat()
    {
        return $this->thongsokythuat;
    }
    public function setthongsokythuat($value)
    {
        $this->thongsokythuat = $value;
    }


    public function getphankhuc()
    {
        return $this->phankhuc;
    }
    public function setphankhuc($value)
    {
        $this->phankhuc = $value;
    }    
    
    public function getid()
    {
        return $this->id;
    }
    public function setid($value)
    {
        $this->id = $value;
    }
    public function gettensanpham()
    {
        return $this->tensanpham;
    }
    public function settensanpham($value)
    {
        $this->tensanpham = $value;
    }
    public function getmota()
    {
        return $this->mota;
    }
    public function setmota($value)
    {
        $this->mota = $value;
    }
    public function getgiagoc()
    {
        return $this->giagoc;
    }
    public function setgiagoc($value)
    {
        $this->giagoc = $value;
    }
    public function getgiaban()
    {
        return $this->giaban;
    }
    public function setgiaban($value)
    {
        $this->giaban = $value;
    }
    public function getsoluongton()
    {
        return $this->soluongton;
    }
    public function setsoluongton($value)
    {
        $this->soluongton = $value;
    }
    public function gethinhanh()
    {
        return $this->hinhanh;
    }
    public function sethinhanh($value)
    {
        $this->hinhanh = $value;
    }
    public function getdanhmuc_id()
    {
        return $this->danhmuc_id;
    }
    public function setdanhmuc_id($value)
    {
        $this->danhmuc_id = $value;
    }

    // Lấy danh sách
    public function laysanpham()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM sanpham ORDER BY id DESC ";
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
    // Tìm kiếm 
    public function timkiemsanpham($search)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM sanpham where tensanpham like '%$search%'  ";
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

    // Lấy danh sách mặt hàng thuộc 1 danh mục
    public function laysanphamtheodanhmuc($danhmuc_id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM sanpham WHERE danhmuc_id=:madm";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":madm", $danhmuc_id);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function laysanphamtheohang($hang_id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM sanpham WHERE hang_id=:mahang";//hang_id == khóa hang_id bên bảng sp
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":mahang", $hang_id);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Lấy sản phẩm theo phân khúc
    public function laysanphamtheophankhucvahang($hang_id,$pk_id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM sanpham WHERE hang_id=:mahang AND phankhuc=:maphankhuc";//hang_id == khóa hang_id bên bảng sp
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":mahang", $hang_id);
            $cmd->bindValue(":maphankhuc", $pk_id);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy mặt hàng theo id
    public function laysanphamtheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM sanpham WHERE id=:id";
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
    // Cập nhật lượt xem
    public function tangluotxem($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE sanpham SET luotxem=luotxem+1 WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật số lượng
    public function giamsoluong($id, $soluongmua)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE sanpham SET soluongton=soluongton-:soluongmua WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":soluongmua", $soluongmua);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy mặt hàng xem nhiều
    public function laysanphamxemnhieu()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM sanpham ORDER BY luotxem DESC LIMIT 3";
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

    // Lấy mặt hàng mua nhiều
    public function laysanphammuanhieu()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM sanpham ORDER BY luotmua DESC LIMIT 3";
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
    // Thêm mới
    public function themsanpham($sanpham)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO 
sanpham(tensanpham,danhmuc_id,hang_id,mota,giagoc,giaban,hinhanh,luotxem,luotmua,khuyenmai_id,soluongton,thongsokythuat,phankhuc,tendong_id,nv_id,trangthai) 
VALUES(:tensanpham,:danhmuc_id,:hang_id,:mota,:giagoc,:giaban,:hinhanh,0,0,:khuyenmai_id,:soluongton,:thongsokythuat,:phankhuc,:tendong_id,:nv_id,:trangthai)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tensanpham", $sanpham->tensanpham);
            $cmd->bindValue(":danhmuc_id", $sanpham->danhmuc_id);
            $cmd->bindValue(":mota", $sanpham->mota);
            $cmd->bindValue(":giagoc", $sanpham->giagoc);
            $cmd->bindValue(":giaban", $sanpham->giaban);
            //$cmd->bindValue(":giakhuyenmai", $sanpham->giakhuyenmai);
            $cmd->bindValue(":khuyenmai_id", $sanpham->khuyenmai_id);
            $cmd->bindValue(":soluongton", $sanpham->soluongton);
            $cmd->bindValue(":nv_id", $sanpham->nv_id);
            $cmd->bindValue(":hinhanh", $sanpham->hinhanh);
            $cmd->bindValue(":hang_id", $sanpham->hang_id);
            $cmd->bindValue(":tendong_id", $sanpham->tendong_id);
            $cmd->bindValue(":thongsokythuat", $sanpham->thongsokythuat);
            $cmd->bindValue(":trangthai", $sanpham->trangthai);
            $cmd->bindValue(":nv_id", $sanpham->nv_id);
            $cmd->bindValue(":phankhuc", $sanpham->phankhuc);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Xóa 
    public function xoasanpham($sanpham)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM sanpham WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $sanpham->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật 
    public function suasanpham($sanpham)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE sanpham SET tensanpham=:tensanpham,
            danhmuc_id=:danhmuc_id,
            hang_id=:hang_id,
            mota=:mota,
            giagoc=:giagoc,
            giaban=:giaban,
            hinhanh=:hinhanh,
            -- giakhuyenmai=:giakhuyenmai,
            khuyenmai_id=:khuyenmai_id,
            soluongton=:soluongton,
            thongsokythuat=:thongsokythuat,
            phankhuc=:phankhuc,
            tendong_id=:tendong_id,
            nv_id=:nv_id,
            trangthai=:trangthai WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tensanpham", $sanpham->tensanpham);
            $cmd->bindValue(":danhmuc_id", $sanpham->danhmuc_id);
            $cmd->bindValue(":mota", $sanpham->mota);
            $cmd->bindValue(":giagoc", $sanpham->giagoc);
            $cmd->bindValue(":giaban", $sanpham->giaban);
            //$cmd->bindValue(":giakhuyenmai", $sanpham->giakhuyenmai);
            $cmd->bindValue(":khuyenmai_id", $sanpham->khuyenmai_id);
            $cmd->bindValue(":soluongton", $sanpham->soluongton);
            $cmd->bindValue(":nv_id", $sanpham->nv_id);
            $cmd->bindValue(":hinhanh", $sanpham->hinhanh);
            $cmd->bindValue(":hang_id", $sanpham->hang_id);
            $cmd->bindValue(":tendong_id", $sanpham->tendong_id);
            $cmd->bindValue(":thongsokythuat", $sanpham->thongsokythuat);
            $cmd->bindValue(":trangthai", $sanpham->trangthai);
            $cmd->bindValue(":nv_id", $sanpham->nv_id);
            $cmd->bindValue(":phankhuc", $sanpham->phankhuc);
            $cmd->bindValue(":id", $sanpham->id);

            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
