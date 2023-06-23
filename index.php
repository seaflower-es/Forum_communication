<?php
include "./connect.php";//将数据库连接的文件包含到此文件中  
include "./Navigation.php";
?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>首页----帖子交流会</title>
  <link rel="stylesheet" href="./static/css/adminlte.min.css">
  <link rel="stylesheet" href="./static/css/index.css">
  
</head>

<style>
.link1 {
      display: inline-block;
      color: blue;
      text-decoration: none;
      transition: color 0.3s, font-size 0.3s;
      fontsize: 0.9em;
  }

.link1:hover {
    color: red;
    font-size: 1.25em;
}

.col-12.col-sm-11 {
    position: relative;
  }
.col-12.col-sm-11 img {
    position: absolute;
    top: 0;
    right: 0;
    max-width: 30px; /* 调整图像大小 */
    transform: translate(50%, -50%);
  }

  .content-header1 {
    color: red;
  }

  .card-footer {
    text-align: right;
  }

  .content-header {
    background-image: url('background/member.jpg'); /* 替换为实际的图片路径 */
    background-size: cover;
    background-position: center;
    text-align: center;
  }
  .content-header h1 {
    font-family: "楷体";
    font-weight: bold;
  }
</style>

<body id="isfixed" class="hold-transition layout-top-nav">
    
<div class="wrapper">
    <!-- //图标+标题 -->
    <div class="content-header">
        <div class="container">
            <h1>校园论坛喵</h1>
        </div>
    </div>

    <!-- 上侧导航栏 -->
    <?php
    $nav = new Navigation();
    $nav->displayNavigation("发帖", "个人中心");
    ?>

    <br/>

  <!-- 主页内容 -->
  <div class="content-wrapper" style="background: white;">
    <!-- 帖子列表 -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-3" >
                    <div class="card card-dark card-outline">
                        <div class="card-header">
                            <h3>帖子分类</h3>
                        </div>

                        <div class="card-body card-outline">
                            <!-- <div class="boxdir"> -->
                                <h4>娱乐</h4>
                                <a class="link1" href="#">明星</a>
                                <a class="link1" href="#">粉丝组织</a>
                                <a class="link1" href="#">网络红人</a>
                                <a class="link1" href="#">选秀选手</a>
                                <a class="link1" href="#">CP</a>
                                <a class="link1" href="#">娱乐明星话题</a>
                                <a class="link1" href="#">导演</a>
                                <hr class="hr-dashed-fixed">

                                <h4>体育</h4>
                                <a class="link1" href="#">足球</a>
                                <a class="link1" href="#">篮球</a>
                                <a class="link1" href="#">NBA</a>
                                <a class="link1" href="#">CBA</a>
                                <a class="link1" href="#">乒乓球</a>
                                <a class="link1" href="#">网络</a>
                                <a class="link1" href="#">舞蹈</a>
                                <a class="link1" href="#">健身</a>
                                <hr class="hr-dashed-fixed">

                                <h4>小说</h4>
                                <a class="link1" href="#">奇幻类</a>
                                <a class="link1" href="#">言情类</a>
                                <a class="link1" href="#">灵异类</a>
                                <a class="link1" href="#">穿越</a>
                                <a class="link1" href="#">连载</a>
                                <a class="link1" href="#">修真</a>
                                <a class="link1" href="#">历史</a>
                                <a class="link1" href="#">架空</a>
                                <hr class="hr-dashed-fixed">

                                <h4>生活家</h4>
                                <a class="link1" href="#">小而美</a>
                                <a class="link1" href="#">DIY</a>
                                <a class="link1" href="#">美食</a>
                                <a class="link1" href="#">摄影</a>
                                <a class="link1" href="#">旅行</a>
                                <a class="link1" href="#">变美</a>
                                <a class="link1" href="#">留学移民</a>
                                <a class="link1" href="#">文玩</a>
                                <hr class="hr-dashed-fixed">

                                <h4>闲趣</h4>
                                <a class="link1" href="#">萌宠</a>
                                <a class="link1" href="#">萝莉</a>
                                <a class="link1" href="#">重口味</a>
                                <a class="link1" href="#">吐槽</a>
                                <a class="link1" href="#">恐怖</a>
                                <a class="link1" href="#">星座</a>
                                <a class="link1" href="#">爆料</a>
                                <a class="link1" href="#">喵星人</a>
                                <hr class="hr-dashed-fixed">

                                <h4>游戏</h4>
                                <a class="link1" href="#">游戏角色</a>
                                <a class="link1" href="#">电子竞技及选手</a>
                                <a class="link1" href="#">网络游戏</a>
                                <a class="link1" href="#">其它游戏及话题</a>
                                <hr class="hr-dashed-fixed">

                                <h4>动漫</h4>
                                <a class="link1" href="#">日本动漫</a>
                                <a class="link1" href="#">国产动漫</a>
                                <a class="link1" href="#">搞笑</a>
                                <a class="link1" href="#">热血</a>
                                <a class="link1" href="#">推理</a>
                                <a class="link1" href="#">声优</a>
                                <hr class="hr-dashed-fixed">

                                <h4>地区</h4>
                                <a class="link1" href="#">国内地区</a>
                                <a class="link1" href="#">海外地区</a>
                                <hr class="hr-dashed-fixed">
                            <!-- </div> -->
                        </div>
                    </div>
                    
                </div>

                <div class="col-12 col-sm-9">
                    <!-- 小标题 -->
                    <div class="content-header1">
                        <div class="container">
                            <h3>热门</h3>
                        </div>
                    </div>
                
                <?php
                    $sql = "select * from messages order by id desc;";
                    //查询是否有留言信息
                    if($results = mysqli_query($link,$sql)){
                        if(mysqli_num_rows($results)>0){
                            while($result = mysqli_fetch_assoc($results)){
                                
                                // 帖子标题限定40字
                                $title = $result['title'];
                                $limit = 40;
                                if (mb_strlen($title, 'UTF-8') > $limit) {
                                    $title = mb_substr($title, 0, $limit, 'UTF-8') . '......';
                                }
                                // 发帖人用户名限定5个字
                                $name = $result['uname'];
                                $limit = 5;
                                if (mb_strlen($name, 'UTF-8') > $limit) {
                                    $name = mb_substr($name, 0, $limit, 'UTF-8') . '...';
                                }
                                // 帖子内容 限定15个字
                                $content = $result['content'];
                                $limit = 15;
                                if (mb_strlen($content, 'UTF-8') > $limit) {
                                    $content = mb_substr($content, 0, $limit, 'UTF-8') . '...';
                                }

                                // 发帖人、发帖人头像、帖子标题
                                $sql1="select photo from users where name =\"".$result['uname']."\";";
                                $image_path = mysqli_fetch_assoc(mysqli_query($link,$sql1));
                                ?>
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-12 col-sm-1">
                                                <div class="message-box">
                                                    <img class="img1" src="<?php echo $image_path['photo']; ?>"/>
                                                    <b><?php echo $name; ?></b>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-11">
                                               <img src="background/huo.jpg" alt="热门图片">  
                                                <h3><a href='showmessage.php?id=<?php echo $result['id']; ?>' class="title-link"><?php echo $title; ?></a></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $content; ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-text"><?php echo $result['time']; ?></p>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        else{
                            echo "暂无留言内容，快来发第一个帖子吧o(〃＾▽＾〃)o";
                        }
                    }
                    else{
                        echo mysqli_error($link);
                    }
                    
                    ?>  
            </div>
            </div> 
        </div>
    </div>
</div>

</body>
</html>

<script src="./static/js/addmessage.js"></script>


<script>
    //如果滚动的高度低于460，则浮动
    window.onscroll = function () {
        var myDiv = document.getElementById('isfixed');
        console.log(myDiv)
        // scrollTop表示滚动后距离顶端多少
        // 当距离页面顶端大于164px的距离时会让导航栏浮动且宽度100%适配浏览器，否则导航栏采用相对定位，宽度变成1040px
        var scrollHeight = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollHeight <= 135) 
        {
            var className = "hold-transition layout-top-nav";
            myDiv.setAttribute('class', className);
            console.log(scrollHeight);
        }
        else{
            var className = "hold-transition layout-navbar-fixed layout-top-nav";
            myDiv.setAttribute('class', className);
            console.log(scrollHeight);
        }
        
    }
</script>

<?php
mysqli_close($link);
?>