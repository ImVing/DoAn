<?php

    $open = "user";
    $capacityold = "";
     require ("../../autoload/autoload.php");

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
         $levelold = $row['level'];
     }

    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {

        if(isset($_POST['name']) && ($_POST['name'] != NULL) && isset($_POST['email']) && ($_POST['email'] != NULL) && isset($_POST['password']) && ($_POST['password'] != NULL) && isset($_POST['phone']) && ($_POST['phone'] != NULL) && isset($_POST['address']) && ($_POST['address'] != NULL))
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            if($_SESSION["level"] == 2)
            {
                $level = $_POST['level'];
                $query = "UPDATE `user` SET `name`='$name',`email`='$email',`phone`=$phone,`address`='$address',`password`=$password,`level`='$level' WHERE user.id=$id"; 
            }
            else
            {
                $query = "UPDATE `user` SET `name`='$name',`email`='$email',`phone`=$phone,`address`='$address',`password`=$password WHERE user.id=$id";
            } 
            $result = mysqli_query($connect, $query);
            $_SESSION['success'] = 'Cập nhật thành công';
            redirectUrl('/websitephp/admin/module/user/index.php');
        }
        else
            echo "<script type='text/javascript'>alert('Vui lòng nhập đầy đủ dữ liệu');</script>";
    }
?>

<?php require ("../../layout/header.php"); ?>
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
                            <?php 
                            if($_SESSION["level"] == 2)
                            {
                            ?>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Level</label>
                                <select class="form-control" name="level">
                                <?php
                                    $selected = $levelold;
                                ?>
                                    <option value="0" <?php if($selected == 0) {echo 'selected="selected"';} ?> >Khách hàng</option>
                                    <option value="1" <?php if($selected == 1) {echo 'selected="selected"';} ?> >Quản trị viên</option>
                                </select>
                            
                            </div>
                            <?php
                            }
                            ?>
                            <button type="submit" class="btn btn-success">Lưu</button>
                        </form>
                    </div>
<?php require ("../../layout/footer.php"); ?>