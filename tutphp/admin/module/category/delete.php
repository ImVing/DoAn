<?php
    $open = "category";
    require ("../../autoload/autoload.php");
        $id= $_GET['id'];
        $query ="DELETE FROM `category` WHERE  id=$id";
        $resultd= mysqli_query($connect,$query);

        if($resultd)
        {
            $_SESSION['success'] = 'Xóa thành công';
            redirectUrl('/websitephp/admin/module/category/index.php');
        }
?>