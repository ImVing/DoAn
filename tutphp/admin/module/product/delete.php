<?php
    $open = "product";
    require ("../../autoload/autoload.php");
    $id= $_GET['id'];
    $query ="DELETE FROM `product` WHERE  id=$id";
    $resultd= mysqli_query($connect,$query);

        if($resultd)
        {
            $_SESSION['success'] = 'Xóa thành công';
            redirectUrl('/websitephp/admin/module/product/index.php');
        }
?>