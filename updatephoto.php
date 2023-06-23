<meta charset='utf-8'>
<link rel="stylesheet" href="./static/css/updatephoto.css">
<?php
include "./connect.php"//将数据库连接的文件包含到此文件中
?>

<?php
if(isset($_POST['userSubmit'])){
    $userName=$_COOKIE['name'];
    $tmp_path=$_FILES['userFile']['tmp_name'];
    $path=".\\images\\".$_FILES['userFile']['name'];
    if(move_uploaded_file($tmp_path,$path)){
        $path=mysqli_real_escape_string($link,$path);
        $sql="update users set photo='".$path."'where name='$userName'";
        if($results=mysqli_query($link,$sql)){
            // echo "<a href=\"./member.php\">回主页</a>";
            echo "<script>
                alert('图片上传成功，返回个人中心');
                window.location.href = \"./member.php\";
                console.log(1);
            </script>";
        }else{
            die("sql语句有误");
        }
    }
    else{
        echo "<script>
                alert('未选择图片！请重新选择！！');
                window.location.href = \"./updatephoto.php\";
            </script>";
        echo "图片上传失败";
    }
}else{
    $sql="select photo from users where name =\"".$_COOKIE['name']."\";";
    $image_path = mysqli_fetch_assoc(mysqli_query($link,$sql));
    $html=<<<HTML

    <div class="frame">
        <!-- 展示当前头像 -->
        <h1>当前头像</h1>
        <div class="imageframe">
            <img id="preview" src="{$image_path['photo']}" alt="your image" style="max-width: 90%; max-height: 90%;"/>
        </div>

        <!-- 按钮表单 -->
        <form 
            method="post"
            enctype="multipart/form-data"
        >
        <div class="formframe">
            <input type="file" name="userFile" onchange="previewImage(this)" style="width: 100%;">
        </div>
        <div class="formframe">
            <input type="submit" name="userSubmit" value="提交" style="width: 20%;">
            <input type="button" value="返回" style="width: 20%;" onclick="window.location.href='./member.php'">
        </div>
        </form>
    </div>
HTML;
    echo "$html";
}
?>

<?php
mysqli_close($link);
?>

<script src="./static/js/updatephoto.js"></script>
