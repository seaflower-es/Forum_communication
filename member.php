<?php
    include "./connect.php";//将数据库连接的文件包含到此文件中
    include "./Navigation.php";
?>

<html>
<head>
    <meta charset='utf-8'>
    <title>今日论坛--个人中心</title>
    <link rel="stylesheet" href="./static/css/adminlte.min.css">
    <link rel="stylesheet" href="./static/css/index.css">
    <style>
       .content-header {
    background-image: url('background/denglu.jpg'); /* 替换为实际的图片路径 */
    background-size: cover;
    background-position: center;
    text-align: center;
  }  
  .content-header h1 {
    font-family: "楷体";
    font-weight: bold;
  }

    </style>
</head>

<body class="hold-transition layout-navbar-fixed layout-top-nav">
  
  <!-- 上侧导航栏 -->
    <?php
        $nav = new Navigation();
        $nav->displayNavigation("", "");
    ?>

    <!-- 内容 -->
    <div class="content-wrapper" style="background: white;">
        <!-- 标题 标签 -->
        <div class="content-header">
            <div class="container">
                <h2>个人中心喵</h2>
            </div>
        </div>

        


        <!-- 用户信息 -->
        <div class="content">
        <div class="container">

        <?php
        if(isset($_COOKIE['name'])){
            $userName=$_COOKIE['name'];
            $sql="select * from users where name='$userName'";
            if($results=mysqli_query($link,$sql)){
                if(mysqli_num_rows($results)>0){
                    $result=mysqli_fetch_assoc($results);
                    ?>
                    <hr class="hr-dashed-fixed"><b>
                    <?php echo $_COOKIE['name']."，欢迎来到您的个人中心！！！";?>
                    </b>
                    <hr class="hr-dashed-fixed">

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title"><b>用户信息</b></h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-2">
                                    <div class="message-box">
                                        <img class="img1" src="<?php echo $result['photo'];?>" style="max-width: 100%; height: auto;"/>
                                        <a href="./updatephoto.php">修改头像</a>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-10">
                                    <h3>详细信息</h3>
                                    <hr class="hr-dashed-fixed">
                                    <div class="col-12">
                                        <h5>用户名：<?php echo $result['name'];?></h5>
                                    </div>
                                    <div class="col-12">
                                        <h5>密  码：<?php echo $result['password'];?></h5>
                                    </div>
                                    <div class="col-12">
                                        <h5>余  额：<?php echo $result['money'];?></h5>
                                    </div>
                                    <div class="col-12">
                                        <h6><a href="#" style="color:red;">联系管理员</a></h6>
                                    </div>
                                </div>
                                <!-- 好看的图像 -->
                                
                            </div>
                        </div>
                    </div>
                <?php 
                }
                else{
                    die("该用户不存在");
                }
            }
            else{
                die("sql语句有误");
            }
        }
        else{
            echo "<script>
                alert('未登录，请先登录！');
                window.location.href = './login.php';
            </script>";
        }
        ?>
            </div>
          </div>
        </div>
      </div>
  </div>


</body>
</html>


<?php
    mysqli_close($link);
?>