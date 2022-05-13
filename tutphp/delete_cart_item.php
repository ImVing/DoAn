<?php
    require ("admin/autoload/autoload.php");
        $id= $_GET['id'];
        $query ="DELETE FROM `cart` WHERE  id=$id";
        $resultd= mysqli_query($connect,$query);

        if($resultd)
        {
            echo 'a';
            $_SESSION['success'] = 'Xóa thành công';
            redirectUrl('/tutphp/cart.php');
        }
?>