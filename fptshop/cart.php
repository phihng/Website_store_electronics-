<?php

use Google\Service\AlertCenter\Resource\Alerts;

include("inc/top.php"); ?>

<?php
if (demhangtronggio() == 0) { ?>
    <h3 class="row justify-content-center">Giỏ hàng rỗng!</h3>
    <p class="row justify-content-center">Vui lòng chọn sản phẩm...</p>
    <h3 class="text-info" style="padding-left: 50px;">Đơn hàng đã đặt</h3>
    <table class="table table-hover">
        <tr>
            <th style="padding-left: 50px;" class="text-dark">Đơn hàng</th>
            <th class="text-dark">Hình ảnh</th>
            <th class="text-dark">Tên sản phẩm</th>
            <th class="text-dark">Số lượng</th>
            <th class="text-dark">Đơn giá</th>
            <th class="text-dark">Trạng thái</th>
        </tr>
        <?php
        foreach ($donhang as $h) :
            foreach ($khachhang as $kh) :
                foreach ($dh_dadat as $d) :
                    foreach ($sanpham as $sp) :
                        if ($d["sanpham_id"] == $sp["id"] && $h["khachhang_id"] == $kh["id"] && $h["id"] == $d["donhang_id"]) {
        ?>
                            <tr>
                                <!-- <a href="index.php?action=chitiet&id=<php echo $d['id']; ?>"><php echo $d["id"]; ?></a> -->
                                <td style="padding-left: 50px;"><?php echo $d["donhang_id"]; ?></td>
                                <td><img width="40px" class="thumnail" src="../fptshop/images/img/chung/<?php echo $sp["hinhanh"]; ?>" alt=""> </td>
                                <td><?php echo $sp["tensanpham"]; ?></td>
                                <td><?php echo $d["soluong"]; ?></td>
                                <td><?php echo $sp["giaban"]; ?></td>
                                <td class="text-success">Đã thanh toán</td>
                            </tr>
        <?php
                        }
                    endforeach;
                endforeach;
            endforeach;
        endforeach;
        ?>
    </table>
<?php } else { ?>
    <h3 style="color: #EE0033; padding-left: 10px;">Giỏ hàng của bạn: </h3>
    <form action="index.php" style="padding-left: 10px;">
        <table class="table table-hove">
            <tr>
                <th>ID</th>
                <th>Hình ảnh</th>
                <th>Tên hàng</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
            <?php foreach ($giohang as $id => $sp) :
                foreach ($sanpham as $sph) ?>
                <tr>
                    <td><?php echo $sp["id"]; ?></td>
                    <td><img width="50" src="../fptshop/images/img/chung/<?php echo $sp["hinhanh"]; ?>" alt=""> </td>
                    <td><?php echo $sp["tensanpham"]; ?></td>
                    <td><?php echo number_format($sp["giaban"]); ?>VNĐ</td>
                    <td><input type="number" name="sp[<?php echo $id; ?>]" id="" value="<?php echo $sp["soluong"]; ?>"> <?php
                                                                                                                        if ($sp["soluong"] > $sph["soluongton"]) {
                                                                                                                            echo '<div class="notification">Không đủ số lượng sản phẩm, xin nhập lại số lượng nhỏ hơn</div>';
                                                                                                                        }
                                                                                                                        ?>
                        <style>
                            .notification {
                                width: 415px;
                                background-color: #f8d7da;
                                color: #721c24;
                                padding: 10px;
                                margin-bottom: 10px;
                                border: 1px solid #f5c6cb;
                                border-radius: 4px;
                            }
                        </style>
                    </td>
                    <td><?php echo number_format($sp["thanhtien"]); ?>VNĐ</td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3"></td>
                <td class="fw-bold">Tổng tiền</td>
                <td class="text-danger fw-bold">
                    <?php echo number_format(tinhtiengiohang()); ?>VNĐ
                </td>
            </tr>
        </table>
        <div class="row">
            <div class="col">
                <a style="color: red;" href="index.php?action=xoagiohang"><i>Xóa giỏ hàng</i></a>
                <!-- (Xóa một mặt hàng nhập số lượng = 0) -->
            </div>
            <div class="col text-end">
                <input type="hidden" name="action" value="capnhatgio">
                <input type="submit" class="btn btn-warning" value="Cập nhật">
                <a href="index.php?action=thanhtoan" class="btn btn-success">Thanh toán</a>


            </div>
        </div>
        <hr>
        <h3 class="text-info" style="padding-left: 50px;">Đơn hàng đã đặt</h3>
        <table class="table table-hover" style="padding-left: 50px;">
            <tr>
                <th style="padding-left: 50px;" class="text-dark">Đơn hàng</th>
                <th class="text-dark">Hình ảnh</th>
                <th class="text-dark">Tên sản phẩm</th>
                <th class="text-dark">Số lượng</th>
                <th class="text-dark">Đơn giá</th>
                <th class="text-dark">Trạng thái</th>
            </tr>
            <?php
            foreach ($donhang as $h) :
                foreach ($khachhang as $kh) :
                    foreach ($dh_dadat as $d) :
                        foreach ($sanpham as $sp) :
                            if ($d["sanpham_id"] == $sp["id"] && $h["khachhang_id"] == $kh["id"] && $h["id"] == $d["donhang_id"]) {
            ?>
                                <tr>
                                    <!-- <a href="index.php?action=chitiet&id=<php echo $d['id']; ?>"><php echo $d["id"]; ?></a> -->
                                    <td style="padding-left: 50px;"><?php echo $d["donhang_id"]; ?></td>
                                    <td><img width="40px" class="thumnail" src="../fptshop/images/img/chung/<?php echo $sp["hinhanh"]; ?>" alt=""> </td>
                                    <td><?php echo $sp["tensanpham"]; ?></td>
                                    <td><?php echo $d["soluong"]; ?></td>
                                    <td><?php echo $sp["giaban"]; ?></td>
                                    <td class="text-success">Đã thanh toán</td>
                                </tr>
            <?php
                            }
                        endforeach;
                    endforeach;
                endforeach;
            endforeach;
            ?>
        </table>

    </form>
<?php } //end if 
?>
<?php include("inc/bottom.php"); ?>