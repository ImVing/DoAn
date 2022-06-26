<?php
    $open = "category";
     require ("../../autoload/autoload.php");

     $id= $_GET['id'];
     $query = "SELECT * FROM `category` WHERE category.id = $id";
     $result = mysqli_query($connect, $query);

     while($row = mysqli_fetch_array($result))
     {
         $nameold=$row['name'];
         $homeold=$row['home'];
         $statusold=$row['status'];
     }
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['name']) && ($_POST['name'] != NULL))
        {
            $name = $_POST['name'];
            $query = "UPDATE `category` SET `name`='$name',`home`='$home',`status`='$status' WHERE category.id=$id"; 
            $result = mysqli_query($connect, $query);
            
            if($result)
            {
                if($name == $nameold && $home == $homeold && $status == $statusold)
                {
                    $_SESSION['success'] = 'Không có gì thay đổi';
                    redirectUrl('/websitephp/admin/module/category/index.php');
                }
                else
                {
                    $_SESSION['success'] = 'Cập nhật thành công';
                    redirectUrl('/websitephp/admin/module/category/index.php');
                }
            }
        }
        else
            echo "<script type='text/javascript'>alert('Vui lòng nhập đầy đủ dữ liệu');</script>";
    }
?>

<?php require ("../../layout/header.php"); ?>
                    <!-- Begin Page Content -->
                    <h1 align="center">Sửa Danh Mục</h1>
                    <div class="col-md-12">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="<?php echo $nameold?>" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ghim trang chủ</label>
                               
                                <select class="form-control" name="home">
                                <?php
                                    $selected = $homeold;
                                ?>
                                    <option value="0"  <?php if($selected == 0) {echo 'selected="selected"';} ?> >Không</option>
                                    <option value="1"  <?php if($selected == 1) {echo 'selected="selected"';} ?> >Có</option>
                                </select>
                            
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Trạng thái hoạt động</label>
                               
                                <select class="form-control" name="status">
                                <?php
                                    $selected = $statusold;
                                ?>
                                    <option value="0"  <?php if($selected == 0) {echo 'selected="selected"';} ?> >Đóng</option>
                                    <option value="1"  <?php if($selected == 1) {echo 'selected="selected"';} ?> >Mở</option>
                                </select>
                            
                            </div>
                            <button type="submit" class="btn btn-success">Lưu</button>
                        </form>
                    </div>
<?php require ("../../layout/footer.php"); ?>