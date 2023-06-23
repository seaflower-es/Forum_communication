<?php
include "./connect.php";//将数据库连接的文件包含到此文件中
include "./Navigation.php";
?>

<html>
<head>
  <meta charset="utf-8">
  <title>留言论坛</title>
  <link rel="stylesheet" href="./static/fontawesome-free/css/all.min.css">  <!-- 图标 -->
  <link rel="stylesheet" href="./static/css/adminlte.min.css">
  <link rel="stylesheet" href="./static/css/index.css">
  <style>
  .col-12.col-sm-3 {
    float: right;
  }
  .card-footer {
    text-align: right;
  }

  .card-footer p {
    float: right;
  }
</style>
</head>

<body class="hold-transition layout-top-nav layout-navbar-fixed"> 
  <div class="wrapper">
  <!-- 上侧导航栏 -->
  <?php
    $nav = new Navigation();
    $nav->displayNavigation("发表评论", "个人中心");
    ?>

  <!-- 主页内容 -->
    <div class="content-wrapper" style="background: white;">
      <!-- 标题 标签 -->
      <section class="content-header">
          <div class="container">
            <h2 style="text-align:center;">帖子详情</h2>
          </div>
      </section>

      <!-- 帖子列表 -->
      <div class="content">
        <div class="container">
          
          <?php
          if(isset($_GET['id'])){

              $id=$_GET['id'];
              $sql="select * from messages where id=".$id;
              if($results=mysqli_query($link,$sql)){
                  $result=mysqli_fetch_assoc($results);
                  // 发帖人、发帖人头像、帖子标题
                  $sql1="select photo from users where name =\"".$result['uname']."\";";
                  // 发帖人姓名不超过10个字
                  $content = $result['uname'];
                  $limit = 10;
                  if (mb_strlen($content, 'UTF-8') > $limit) {
                      $content = mb_substr($content, 0, $limit, 'UTF-8') . '...';
                  }

                  $image_path = mysqli_fetch_assoc(mysqli_query($link,$sql1));
                  echo "<div class=\"card card-primary card-outline\"><div class=\"card-header\"><div class=\"row\">";
                  echo "<div class=\"col-12 col-sm-1\"><div class=\"message-box\"><img class=\"img2\" src=\"{$image_path['photo']}\"/><b>{$content}</b></div></div>";
                  echo "<div class=\"col-12 col-sm-11\"><h3 class=\"title-detail\">{$result['title']}</h3></div>";

                  echo "</div></div>";

                  // 帖子内容及时间
                  $content = $result['content'];
                  echo "<div class=\"card-body\"><p class=\"card-text\">{$content}</p></div>";
                  echo "<div class=\"card-footer\"><p class=\"card-text\">{$result['time']}</p></div></div>";
                  
                  // 评论区
                  // 获取该帖子下的所有评论信息
                  $sql1 = "select * from reply where reply_title=\"".$result['title']."\" order by reply_time desc;";
                  $sql3 = "select count(*) from reply where reply_title=\"".$result['title']."\";";
                  // 获取总回复数
                  $reply_nums = mysqli_fetch_assoc(mysqli_query($link,$sql3));
                  echo "<div class=\"card card-success card-outline\"><div class=\"card-header\">";
                  ?>
                  <!-- // 评论区头部  无论有无评论都存在的部分 -->
              
                  <h3 class="card-title"><b>评论区</b></h3>

                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" >
                          <i class="far fa-comments" style="font-size: 20px; left: 10%; position: relative;">
                        <?php echo "<a href=\"javascript:void(0)\" onclick=\"openCommentWindow('{$id}')\">发表评论</a>"; ?>
                          </i>
                      </button>
                      <button id="button1" type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="far fa-comments" style="font-size: 20px; left: 10%; position: relative;"><span class="badge badge-danger navbar-badge"><?php echo $reply_nums['count(*)'] ?></span><a href="#">折叠评论</a></i>
                      </button>
                      
                  </div></div>
                  <div class="card-body">

                  <?php if($results=mysqli_query($link,$sql1)){
                      if(mysqli_num_rows($results)>0){
                          while($result=mysqli_fetch_assoc($results)){
                              // 获得并输出回复者的头像
                              $sql2="select photo from users where name =\"".$result['mname']."\";";
                              $image_path = mysqli_fetch_assoc(mysqli_query($link,$sql2));
                              ?>
                              <div class="row">
                                <div class="col-12 col-sm-1">
                                  <div class="message-box">
                                    <img class="img2" src="<?php echo $image_path['photo']; ?>"/>
                                  </div>
                                </div>
                                <div class="col-12 col-sm-11">
                                  <div class="row">
                                    <div class="col-12">
                                      <b><?php echo $result['mname']; ?></b>
                                    </div>
                                  </div>
                                  <div class="replymes">
                                    <?php echo $result['reply_content']; ?>
                                  </div>
                                  <div class="col-12 col-sm-3">
                                      <?php echo $result['reply_time']; ?>
                                    </div>
                                </div>
                              </div>
                              <hr class="hr-dashed-fixed">
                              
                            <?php
                          }
                          echo "</div></div>";
                      }
                      else{
                          echo "暂无评论内容，快来发表你的评论吧o(〃＾▽＾〃)o";              
                      }
                  }
              }
          }
          else{
              echo "id error";
          }
          ?>
          </div>
        </div>
      </div>

    </div>
  </div>
</body>
</html>

<!-- 图标与部分功能js文件 -->
<script src="./static/js/jquery.min.js"></script>
<script src="./static/js/bootstrap.bundle.min.js"></script>
<script src="./static/js/adminlte.min.js"></script>

<script src="./static/js/showmessage.js"></script>

<?php
mysqli_close($link);
?>