<?php include("../inc/top.php"); ?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold">PHẢN HỒI</h6>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="index.php">
                <input type="hidden" name="action" value="xulyphanhoi">
                <input type="hidden" name="dg_id" value="<?php echo $danhgia_ht['id']; ?>">
                <input type="hidden" name="MaND" value="<?php echo $_SESSION['nguoidung']["id"]; ?>">

                <div class="row">
                    <div class="col">
                    <div class="md-3 mt-3">
                        <?php
                         foreach($khachhang as $kh):
                         foreach($traloidanhgia as $tl):
                        if( $danhgia_ht['id_kh']==$kh['id'] &&  $danhgia_ht['id']==$tl['dg_id']){?>
                            <label for="txthoten" class="form-label">Đánh giá từ người dùng</label>
                            <input disabled  type="text" class="form-control" name="txthoten" value="<?php echo $kh["hoten"]; ?>"></input>
                            <?php
                        }
                    endforeach;
                endforeach;
                            ?>
                        </div>
                        <div class="md-3 mt-3">
                            <input disabled  type="text" class="form-control" name="txtdanhgia" value="<?php echo $danhgia_ht["nhanxet"]; ?>"></input>
                        </div>
                    </div>
                    
                        <div class="md-3 mt-3">
                            <label for="txttraloi" class="form-label">Trả lời đánh giá</label>
                            <textarea id="editor1" rows="5" class="form-control" name="txttraloi"></textarea>
                        </div>
                    
                </div>
                <div class="md-3 mt-3">
                    <a href="index.php?action=xem" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Trở về </a>
                    <input type="submit" value="Trả Lời" class="btn btn-success"></input>
                    <input type="reset" value="Hủy" class="btn btn-warning"></input>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("../inc/bottom.php"); ?>