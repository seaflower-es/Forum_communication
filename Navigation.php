<?php 

class Navigation {
  public function displayNavigation($str1, $str2) {

    include "./connect.php";
    ?>
    <nav class="main-header navbar navbar-expand-md navbar-dark ">
    <!-- 左侧部分 -->
        <div class="container">
            <ul class="nav navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href='./index.php' class="nav-link"><strong>主页</strong></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="javascript:void(0)" onclick="openArticleWindow()" href='./addMessage.php' class="nav-link"><strong><?php echo $str1 ?></strong></a>
                </li>
                
                <?php if (isset($_COOKIE['name'])): 
                    $userName=$_COOKIE['name'];
                    $sql="select * from users where name='$userName'";
                    if($results=mysqli_query($link,$sql)){
                        if(mysqli_num_rows($results)>0){
                            $result=mysqli_fetch_assoc($results);
                        }
                    }?>

                <li class="nav-item d-none d-sm-inline-block">
                    <a href='./member.php' class="nav-link"><strong><?php echo $str2 ?></strong></a>
                </li>
            </ul>
                
            <!-- <a href='./logout.php' class="nav-link">退出登录</a> -->
            <!-- 右侧部分 -->
            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                <!-- 退出登录 -->
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" role="button">
                        <b>退出登录</b>
                    </a>
                </li>

                <li class="nav-item dropdown-hover user-menu">
                    <!-- 菜单切换按钮 -->
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">

                        <!-- 导航栏中的用户图像 -->
                        <img src=<?php echo $result['photo'];?> class="user-image img-circle elevation-2" alt="用户头像"/> 

                        <!-- 在小型设备上隐藏用户名，只显示图像 -->
                        <span class="hidden-xs"><strong><?php echo $_COOKIE['name'] ?></strong></span>
                    </a>
        
                    <ul class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                        <!-- 菜单中的用户图像 -->
                        <li class="user-header user-header bg-primary">
                            <img src=<?php echo $result['photo'];?> class="img-circle elevation-4" alt="用户头像"/> 
                            <p>
                                <!-- 账户密码余额 -->
                                <small>余额: <?php echo $result['money']; ?></small>
                                <b><?php echo $_COOKIE['name'] ?> -- <?php echo $result['password'] ?></b>
                                
                            </p>
                        </li>

                        <!-- 用户菜单底部：个人中心与注销用户 -->
                        <div style="display: flex; justify-content: space-between;">
                            <a href="./member.php" class="btn btn-default btn-flat">个人中心</a>

                            <a href="./logout.php" class="btn btn-default btn-flat">退出登录</a>
                        </div>
                
                    </ul>
                </li>
                    
                
            </ul>

            <!-- 如果未登录上 -->
            <?php else: ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <a href='./register.php' class="nav-link"><strong>注册</strong></a>
                    <a href='./login.php' class="nav-link"><strong>登录</strong></a>
                </ul>
            <?php endif; ?>
        </div>
  </nav>
    <?php
  }
}
?>