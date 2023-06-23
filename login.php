<?php
include "./connect.php"//将数据库连接的文件包含到此文件中
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./static/css/login.css">
    <link rel="stylesheet" type="text/css" href="./static/css/adminlte.min.css">
    <style>
        body {
            background-image: url("background/denglu.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
    
    <?php
    if(isset($_POST['userSubmit'])){
        if($_POST['vcode']==$_COOKIE['vcode']){
            $userName=$_POST['userName'];
            $userPass=$_POST['userPass'];
            $sql="select * from users where name='$userName' && password='$userPass'";
            if($results=mysqli_query($link,$sql)){
                if(mysqli_num_rows($results)>0){
                    setcookie('name',$userName,time()+3600*24,"/");
                    header("Location: ./index.php");
                    exit();
                    //注意cookie的路径，不同路径的cookie认为是两条cookie
                    //echo "登录成功，返回<a href='./index.php'>首页</a>或<a href='./index.php'>个人中心</a>";
                }else{
                    echo "<script>
                        alert('用户名或密码错误，请重新登录');
                        window.location.href = './login.php';
                    </script>";
                    //echo "用户名或密码错误，<a href='./login.php'>请重新登录</a>";
                }
            }else{
                die("sql语句有误");
            }

        }else{
            echo "<script>
                alert('验证码错误，请重新登录');
                window.location.href = './login.php';
            </script>";
            //echo "验证码错误，<a href='./login.php'>请重新登录</a>";
        }
    }
    else{
        $html=<<<HTML

        <div class="container">
            <form method="post">
                <h2>用户登录平台</h2>
                <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="userName" placeholder="用户名">
                </div>
                <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="userPass" placeholder="密码">
                </div>
                <label for="yanzhengma">验证码:</label>
                <div class="row">
                    <div class="col-12 col-sm-7">
                        
                        <input type="text" id="vcode" name="vcode" placeholder="验证码">
                    </div>
                    <div class="col-12 col-sm-5">
                        <iframe src= "./vcode.php" width="100" height=30 frameboder="0"></iframe>
                    </div>
                </div>

                <div class="bottom-links">
                    <a href="./index.php">回首页</a>
                    <a href="./register.php">去注册</a>
                </div>

                <div>
                    <button type="submit" name="userSubmit">登录</button>
                </div>
                
            </form>
            
        </div>
        
HTML;
        echo $html;
    }
    ?>
    <hr/>
</body>
</html>

<?php
mysqli_close($link);
?>
