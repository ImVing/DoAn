<?php
    $open = "user";
    require ("../../autoload/autoload.php");
?>
<?php require ("../../layout/header.php"); ?>
                    <!-- Begin Page Content -->
                    <h1 align="center">Danh Sách Tài Khoản</h1>
                    <?php if(isset($_SESSION['success'])):?>
                            <div class="alert alert-success">
                                <?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
                            </div>
                    <?php endif ?>

                    <?php
                        if(isset($_GET['pages']))
                        {
                            $pages = $_GET['pages'];
                        }
                        else
                        {
                            $pages = 1; 
                            
                        }

                        $rowPerpage = 10;
                        $perRow = $pages*$rowPerpage - $rowPerpage;
                        
                        $sql = "SELECT * FROM `user` LIMIT $perRow,$rowPerpage";
                        $query = mysqli_query($connect, $sql);
                        $totalRows =  mysqli_num_rows(mysqli_query($connect, "SELECT * FROM user"));
                        $totalPages = ceil($totalRows / $rowPerpage); // ceil là làm tròn tăng thôi 4.1 lên 5. 4.4 lên 5
                       
                        $listPages  = "";
                        for($i =1; $i <= $totalPages; $i++)
                        {
                            if($pages == $i)
                            {
                                $listPages.=' <li class="page-item active"><a href="index.php?pages='.$i.'"></a>'.$i.'</a></li>';
                            }
                            else
                            {
                                $listPages.='<li class="page-item "><a href="index.php?pages='.$i.'"></a>'.$i.'</a></li>';
                                
                            }
                        }
                    ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <th width="5%">STT</th>
                                        <th width="20%">Tên tài khoản</th>
                                        <th width="30%">Địa chỉ</th>
                                        <th width="15%">Số điện thoại</th>
                                        <th width="15%">Level</th>
                                        <th width="15%">Hành động</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                       
                                            $stt = $rowPerpage * ($pages -1)+ 1;
                                            while($rows = mysqli_fetch_array($query))
                                            {
                                        ?>
                                        <tr>
                                            <td><?php echo $stt;?></td>
                                            <td><?php echo $rows['name'] ?></td>
                                            <td><?php echo $rows['address'] ?> </td>
                                            <td><?php echo $rows['phone'] ?></td>
                                            <td><?php echo $rows['level'] ?></td>
                                            <td>
                                                <a class="btn btn-info" href="edit.php?id=<?php echo $rows['id']?>"> <i class="fa fa-edit" ></i>&nbsp;Edit</a>
                                                <a class="btn btn-danger" href="delete.php?id=<?php echo $rows['id']?>" onclick="return confirm('Bạn có muốn xóa?')"><i class="fas fa-trash"></i>&nbsp;Delete</a>
                                            </td>
                                        </tr>

                                        <?php
                                            $stt++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <ul class="pagination">
                                    <?php
                                        for($t = 1; $t <= $totalPages; $t++)
                                        {
                                            echo "<li class='page-item'><a class='page-link' href='index.php?pages=$t'>Trang $t</a></li>";
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
<?php require ("../../layout/footer.php"); ?>