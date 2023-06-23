<?php
include "./connect.php"//将数据库连接的文件包含到此文件中
?>

<html>
<head>
    <meta charset = "utf-8">
    <link rel="stylesheet" href="./static/css/index.css">
    <link rel="stylesheet" href="./static/css/adminlte.min.css">
</head>
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
            <!-- 右侧评论区 -->
            <div class="row">
                <div class="col-12 col-sm-12"><h4>评论千万条，友善第一条</h4></div>
            </div>
            <div class="replymes">
                <form method="post">
                    <textarea name="Content" style="width: 100%; height: 240px; resize: none; font-size: 18px;" placeholder="请输入您的评论..."></textarea>
                    <div style="text-align: right; margin-top: 10px;">
                        <input type="submit" name="userSubmit" value="提交">
                    </div>
                </form>
                
            </div>
        </div>
    </div>
HTML;
    echo $html;
    if(isset($_POST['userSubmit'])){
        $reply_content=mysqli_real_escape_string($link,$_POST['Content']);
        if(empty($reply_content)){
            echo "<script>
                alert('评论内容不能为空，请重新输入！！！');
                window.location.href = \"./reply.php?id=\" + {$_GET['id']};
            </script>";
            // echo "内容不能为空！！！";
        }
        else{
            $mName=$_COOKIE['name'];
            $reply_id=$_GET['id'];
            $sql="select * from messages where id='$reply_id'";
            $results=mysqli_query($link,$sql);
            $result=mysqli_fetch_assoc($results);
            $reply_title=$result['title'];
            $reply_name=$result['uname'];
            $time= date('Y-m-d H:i:s');
        
            $sql="insert into reply(mname,reply_content,reply_name,reply_title,reply_time) values
            ('$mName','$reply_content','$reply_name','$reply_title','$time')";
                if($results1=mysqli_query($link,$sql)){
                    //echo "评论成功"; 
                    echo "<script>window.opener.location.reload();";
                    echo "window.close();</script>";

                }
            }
        }
    else{
            echo mysqli_error($link);
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

