<?php
include "./connect.php"//将数据库连接的文件包含到此文件中
?>
<html>
<head>
<meta charset = "utf-8">
    <title>留言论坛</title>
    <link rel="stylesheet" href="./static/css/index.css">
    <link rel="stylesheet" href="./static/css/adminlte.min.css">
    
</head>
<body>
<?php
if(isset($_COOKIE['name'])){
    $sql="select photo from users where name =\"".$_COOKIE['name']."\";";
    $image_path = mysqli_fetch_assoc(mysqli_query($link,$sql));

    $html=<<<HTML

    <div class="row">
        <div class="col-12 col-sm-2">
            <div class="message-box">
                <!-- 用户头像与姓名 -->
                <img class="img2" src="{$image_path['photo']}"/>
                <h5>{$_COOKIE['name']}</h5>
            </div>
        </div>
        <div class="col-12 col-sm-10">
        <!-- 标题 + 正文 -->
            <hr/>
            <div class="replymes">
                <form method="post">
                    <div class="row">
                        <div class="col-12 col-sm-12"><h4>标题</h4></div>
                    </div>

                    <input type="text" name="userTitle" style="width: 100%; height: 10%; font-size: 24px;" placeholder="请输入您的标题...">

                    <div class="row">
                        <div class="col-12 col-sm-12"><h4>正文</h4></div>
                    </div>
                    <textarea name="userContent" style="width: 100%; height: 290px; resize: none; font-size: 18px;" placeholder="请输入您的内容..."></textarea>
                    <div style="text-align: right; margin-top: 10px;">
                        <input type="submit" name="userSubmit" value="提交">
                </form>
                    
            </div>
        </div>
    </div>

HTML;
    echo $html;
    if(isset($_POST['userSubmit']) && isset($_POST['userTitle'])){
        $userName=$_COOKIE['name'];
        $title=mysqli_real_escape_string($link,$_POST['userTitle']) ;//将提交的文本进行转义
        $content=mysqli_real_escape_string($link,$_POST['userContent']);
        if(empty($title) || empty($content)){
            if(empty($title)){
                echo "<script>
                    alert('标题不能为空，请重新输入！！！');
                    window.location.href = './addmessage.php';
                </script>";
            }
            else{
                echo "<script>
                    alert('文章内容不能为空，请重新输入！！！');
                    window.location.href = './addmessage.php';
                </script>";
            }
        }
        else
        {
            $time= date('Y-m-d H:i:s');
            $sql="insert into messages(uname,title, content,time) values
            ('$userName','$title','$content','$time')";
            if($results=mysqli_query($link,$sql)){
                // echo "留言成功，<a href='./index.php'>返回首页</a>";
                // 关闭小窗口
                echo "<script>window.opener.location.reload();";
                echo "window.close();</script>";
            }
            else{
                echo mysqli_error($link);
            }
        }
        
    }
    
}
else{
    // 用户未登录，显示警示框后跳转至登录页面
    echo '<script>';
    echo 'window.opener.location.href = "./login.php";';
    echo 'window.close();';
    echo 'alert("你还未登录，现在去登录。");';
    echo '</script>';
}

?>
</body>
</html>
<?php
mysqli_close($link);
?>
