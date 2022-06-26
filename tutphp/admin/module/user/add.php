<?php
    $open = "user";
    require ("../../autoload/autoload.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $error = array();
            if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['address']) && !empty($_POST['password']))
            {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $password = $_POST['password'];
                $level = $_POST['level'];
                $query = "INSERT INTO `user`(`name`, `email`, `phone`, `address`, `password`, `level`) VALUES ('$name','$email','$phone','$address','$password','$level')";
                    
                $result = mysqli_query($connect, $query);
                
                if($result)
                {
                    $_SESSION['success'] = 'Thêm mới thành công';
                    redirectUrl('/websitephp/admin/module/user/index.php');
                }
            }
            else
            {
                echo "<script type='text/javascript'>alert('Vui lòng nhập đầy đủ dữ liệu');</script>";
            }
     }
?>

<?php require ("../../layout/header.php"); ?>
                    <!-- Begin Page Content -->
                    <h1 align="center">Chỉnh Sửa Thông Tin</h1>
                    <div class="col-md-12">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Đầy Đủ</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Vui lòng nhập họ và tên"  name="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Vui lòng nhập email"  name="email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật khẩu</label>
                                <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Vui lòng nhập mật khẩu"  name="password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số điện thoại</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Vui lòng nhập SĐT"  name="phone">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Vui lòng nhập địa chỉ"  name="address">
                            </div>
                            <?php 
                            if($_SESSION["level"] == 2)
                            {
                            ?>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Level</label>
                               
                                <select class="form-control" name="level">
                                    <option value="0" selected="selected">Khách hàng</option>
                                    <option value="1" >Quản trị viên</option>
                                </select>
                            
                            </div>
                            <?php
                            }
                            ?>
                            <button type="submit" class="btn btn-success">Tạo</button>
                        </form>
                    </div>
<?php require ("../../layout/footer.php"); ?>