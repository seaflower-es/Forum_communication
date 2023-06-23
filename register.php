<html>
<head>
    <meta charset="utf-8">
    <title>注册----今日论坛</title>
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
    <!--使用了 POST 方法将用户提交的数据发送到 ./addUser.php 文件-->
    <div class="container">
        <form action="./addUser.php" method="post">
            <h2>用户注册平台</h2>
            <div>
                <label for="username">用户名:</label>
                <input type="text" id="username" name="userName" placeholder="用户名">
            </div>
            <div>
                <label for="password">密码:</label>
                <input type="password" id="password" name="userPass1" placeholder="密码">
            </div>
            <div>
                <label for="yanzhengma">确认密码:</label>
                <input type="password" id="password" name="userPass2" placeholder="确认密码">
            </div>

            <div class="bottom-links">
                <a href="./index.php">回首页</a>
                <a href="./login.php">去登录</a>
            </div>

            <div>
                <button type="submit" name="userSubmit">注册</button>
            </div>
            
        </form>
    </div>
    
</body>
</html>