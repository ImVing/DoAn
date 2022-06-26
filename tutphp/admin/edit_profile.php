<?php require("layout/header.php");
error_reporting(0);
require("autoload/autoload.php");
$id= $_GET['id'];
$query = "SELECT * FROM `user` WHERE user.id = $id";
     $result = mysqli_query($connect, $query);

     while($row = mysqli_fetch_array($result))
     {
         $nameold=$row['name'];
         $emailold = $row['email'];
         $passwordold = $row['password']; 
         $phoneold = $row['phone'];
         $addressold = $row['address'];
     }
     if($_SERVER["REQUEST_METHOD"] == "POST")
    {

        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['phone']) && isset($_POST['address']))
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $query = "UPDATE `user` SET `name`='$name',`email`='$email',`phone`=$phone,`address`='$address',`password`=$password WHERE user.id=$id"; 
            $result = mysqli_query($connect, $query);

            if($name == $nameold &&  $email ==  $emailold && $password == $passwordold && $phone == $phoneold &&   $address ==  $addressold && $password == $passwordold)
            {
                    $_SESSION['success'] = 'Không có gì thay đổi';
                    redirectUrl('/websitephp/admin/module/user/index.php');
            }
            else
            {
                    $_SESSION['success'] = 'Cập nhật thành công';
                    redirectUrl('/websitephp/admin/module/user/index.php');
            }
        }
        else
            echo "<script type='text/javascript'>alert('Vui lòng nhập đầy đủ dữ liệu');</script>";
    }
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Begin Page Content -->
    <h1 align="center">Chỉnh Sửa Thông Tin</h1>
                    <div class="col-md-12">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Đầy Đủ</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Vui lòng nhập họ và tên"  name="name" value="<?php echo $nameold ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Vui lòng nhập email"  name="email" value="<?php echo $emailold ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật khẩu</label>
                                <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Vui lòng nhập mật khẩu"  name="password" value="<?php echo $passwordold ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số điện thoại</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Vui lòng nhập SĐT"  name="phone" value="<?php echo $phoneold ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Vui lòng nhập địa chỉ"  name="address" value="<?php echo $addressold ?>">
                            </div>
                            <button type="submit" class="btn btn-success">Lưu</button>
                        </form>
                    </div>
    <?php require("layout/footer.php"); ?>