<?php
    $open = "product";
    require ("../../autoload/autoload.php");
    $id= $_GET['id'];
    $query ="DELETE FROM `user` WHERE  id=$id";
    $resultd= mysqli_query($connect,$query);

        if($resultd)
        {
            $_SESSION['success'] = 'Xóa thành công';
            redirectUrl('/websitephp/admin/module/user/index.php');
        }
?>