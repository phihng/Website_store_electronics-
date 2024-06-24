<?php include("../inc/top.php") ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">DÒNG SẢN PHẨM</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <p><a style="background-color: #EA0029; color: white;" class="btn " href="index.php?action=themdongsp">Thêm</a></p>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên dòng sản phẩm</th>
                      
                           
                            
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Chỉnh sửa</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php foreach ($dongsp as $dsp) :
                                
                                ?>
                                    <tr>
                                        <td><?php echo $dsp["id"] ?></td>
                                        <td><?php echo $dsp["tendong"] ?></td>
                                        <?php if ($dsp["trangthai"] == 1) { ?>
                                            <td class="text-success">Đang hoạt động</td>
                                        <?php } else { ?>
                                            <td class="text-primary">Ngừng hoạt động</td>
                                        <?php } ?>
                                   
                                  
                                        
                                       <td>
                                        <?php if ($dsp["trangthai"] == 1) { ?>
                                                <a href="index.php?action=sua&id=<?php echo $dsp['id']; ?>" class="btn btn-warning">Sửa</a>
                                                <a href="index.php?action=khoa&id=<?php echo $dsp['id']; ?>&trangthai=<?php echo $dsp['trangthai']; ?>" class="btn btn-danger">Khóa</a>
                                            <?php } else {
                                            ?>
                                                <a href="index.php?action=sua&id=<?php echo $dsp['id']; ?>" class="btn btn-warning">Sửa</a>
                                                <a href="index.php?action=khoa&id=<?php echo $dsp['id']; ?>&trangthai=<?php echo $dsp['trangthai']; ?>" class="btn btn-warning">Mở</a>
                                            <?php } ?>
                                        </td>
                                    </tr>

                                  
                        <?php
                             
                            endforeach;
                         ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include("../inc/bottom.php") ?>