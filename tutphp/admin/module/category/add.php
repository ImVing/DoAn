<?php
    $open = "category";
     require ("../../autoload/autoload.php");
     
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(!empty($_POST['name']))
        {
            $name = $_POST['name'];
            $home = $_POST['home'];
            $status = $_POST['status'];
            
            
                $query = "INSERT INTO `category`(`name`,`home`,`status`) VALUES ('$name','$home','$status')";
                $result = mysqli_query($connect, $query);
                
                if($result)
                {
                    $_SESSION['success'] = 'Thêm mới thành công';
                    redirectUrl('/websitephp/admin/module/category/index.php');
                }
            
           
        }
        else
            echo "<script type='text/javascript'>alert('Vui lòng nhập đầy đủ dữ liệu');</script>";
     }
?>

<?php require ("../../layout/header.php"); ?>
                    <!-- Begin Page Content -->
                    <h1 align="center">Thêm Mới Danh Mục</h1>
                    <div class="col-md-12">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Vui lòng nhập tên danh mục vào đây"  name="name">
                            </div>
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Ghim trang chủ</label>
                                
                                    <select class="form-control" name="home">
                                        <option value="0" selected="selected">Không</option>
                                        <option value="1" >Có</option>
                                    </select>
                                
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trạng thái hoạt động</label>
                                    <select class="form-control" name="status">
                                        <option value="0" >Đóng</option>
                                        <option value="1" selected="selected">Mở</option>
                                    </select>
                                
                                </div>
                            <button type="submit" class="btn btn-success">Lưu</button>
                        </form>
                    </div>
<?php require ("../../layout/footer.php"); ?>