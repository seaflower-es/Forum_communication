function openArticleWindow() {
    // 计算弹出窗口的位置
    var width = 900;
    var height = 550;
    var left = (window.innerWidth - width) / 2;
    var top = (window.innerHeight - height) / 2;
  
    var popupWindow = window.open("./addmessage.php", 'comment', 'width=' + width + ', height=' + height + ', left=' + left + ', top=' + top);
  }