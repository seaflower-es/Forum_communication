function openCommentWindow(id) {
    // 计算弹出窗口的位置
    var width = 900;
    var height = 400;
    var left = (window.innerWidth - width) / 2;
    var top = (window.innerHeight - height) / 2;
  
    var url = "./reply.php?id=" + encodeURIComponent(id); // 将消息 ID 作为参数传递给评论页面
    var popupWindow = window.open(url, 'comment',  'width=' + width + ', height=' + height + ', left=' + left + ', top=' + top);
  }
  
  // 折叠评论与现实评论切换
  function commentsCon() {
    var button = document.getElementById("button1");
    if (button.innerHTML === "显示评论") {
      button.innerHTML = "折叠评论";
    } else {
      button.innerHTML = "显示评论";
    }
  }