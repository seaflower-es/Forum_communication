<meta charset="utf-8">
<?php
if(setcookie('name',$_COOKIE['name'],time()-3600,"/")){
    //注意cookie的路径，不同路径的cookie认为是两条cookie
    echo "<script>
            alert('退出登录成功，点击返回首页');
            window.location.href = './index.php';
        </script>";
}else{
    die("error");
}
?>
