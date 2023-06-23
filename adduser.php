<meta charset="utf-8">
<?php
//将数据库连接的文件包含到此文件中
include "./connect.php"
?>

<?php
//检测是否提交
if(isset($_POST['userSubmit'])){
    $userName=$_POST['userName'];
    $userPass1=$_POST['userPass1'];
    $userPass2=$_POST['userPass2'];
    //如果三个输入均存在
    if((bool)($userName) && (bool)($userPass1) && (bool)($userPass2)){
        // 查询数据库中是否有此用户，若无则新增，若有则要求重新输入
        $sql1="select name from users where name='$userName'";
        
        if(!$results1=mysqli_query($link,$sql1)){
            
            die("SQL语句有误");
        }
        else{
            //非空往数据库中增加
            if(!mysqli_num_rows($results1)){
                //如果两次密码一致则输入
                if($userPass1===$userPass2){
                    $sql2="insert into users (name, password) values('$userName','$userPass1')";
                    $res = mysqli_query($link,$sql2);
                    if(!$res){
                        die("SQL语句有误:".mysqli_error($link));
                       
                    }
                    else{
                        echo "<script>
                            alert('注册成功，去登录');
                            window.location.href = './login.php';
                        </script>";
                        //echo "注册成功，<a href='./login.php'>请登录<a>";
                    }
                }else{
                    echo "<script>
                            alert('两次密码输入不一致，请重新注册');
                            window.location.href = './register.php';
                        </script>";
                    //echo "两次密码输入不一致，<a href='./register.php'>请重新注册<a>";
                }
            }else{
                echo "<script>
                    alert('用户名已存在，请重新注册');
                    window.location.href = './register.php';
                </script>";
                //echo "用户名已存在，<a href='./register.php'>请重新注册<a>";
            }
        }
        $results1=mysqli_query($link,$sql1);
    }else{
        echo "<script>
            alert('账号或密码不能为空，请重新注册');
            window.location.href = './register.php';
        </script>";
        //echo "账号或密码不能为空, <a href='./register.php'>请重新注册<a>";
    }
}else{
    header("Location:./register.php");
}
//
?>

<?php
mysqli_close($link);
?>
