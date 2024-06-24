<?php include("../include/top.php"); ?>

<h4 class="text-info">Danh sách đơn hàng</h4>
<table class="table table-hover">
    <tr>
        <th class="text-info">ID đơn hàng</th>
        <th class="text-info">Khách hàng</th>
        <th class="text-info">Địa chỉ</th>
        <th class="text-info">Ngày</th>
        <th class="text-info">Tổng tiền</th>
        <th class="text-info">Ghi chú</th>
    </tr>
    <?php
    foreach ($donhang as $d) :
        foreach ($khachhang as $n) :
            if ($d["khachhang_id"] == $n["id"]) {
    ?>
                <tr>
                <td><a href="index.php?action=chitiet&id=<?php echo $d['id']; ?>"><?php echo $d["id"]; ?></a></td>
                    <td><?php echo $n["hoten"]; ?></td>
                    <td><?php echo $n["diachi"]; ?></td>
                    <td><?php echo $d["ngay"]; ?></td>
                    <td><?php echo $d["tongtien"]; ?></td>
                    <td><?php echo $d["ghichu"]; ?></td>
                </tr>
    <?php
            }
        endforeach;
    endforeach;
    ?>
</table>
<?php include("../include/bottom.php"); ?>