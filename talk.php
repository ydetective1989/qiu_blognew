  <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>邱氏博客</title>
    <script type="text/javascript" src="jquery-3.2.1.min.js" >
    </script>
  <link rel="stylesheet" href="css\layui.css">
   <script type="text/javascript" src="layui.js" >
  </script>
  </head>
<body>
<div class="site-demo-button" id="layerDemo" style="margin-bottom: 0;">
  <button data-method="setTop" class="layui-btn layui-btn-mini">评论</button>

</div>
<!-- 通用-970*90 -->
<div>
  <ins class="adsbygoogle" style="display:inline-block;width:970px;height:90px" data-ad-client="ca-pub-6111334333458862" data-ad-slot="6835627838"></ins>
</div>
<script src="//res.layui.com/layui/dist/layui.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
layui.use('layer', function(){ //独立版的layer无需执行这一句
  var $ = layui.jquery, layer = layui.layer; //独立版的layer无需执行这一句

  //触发事件
  var active = {
    setTop: function(){
      var that = this;
      //多窗口模式，层叠置顶
      layer.open({
        type: 2 //此处以iframe举例
        ,title: '当你选择该窗体时，即会在最顶端'
        ,area: ['600', '360px']
        ,shade: 0
        ,maxmin: true
        ,offset: [ //为了演示，随机坐标
          Math.random()*($(window).height()-300)
          ,Math.random()*($(window).width()-390)
        ]
        ,content: 'talkpage.php'
        ,btn: ['继续弹出', '全部关闭'] //只是为了演示
        ,yes: function(){
          $(that).click();
        }
        ,btn2: function(){
          layer.closeAll();
        }

        ,zIndex: layer.zIndex //重点1
        ,success: function(layero){
          layer.setTop(layero); //重点2
        }
      });
    }
  };

  $('#layerDemo .layui-btn').on('click', function(){
    var othis = $(this), method = othis.data('method');
    active[method] ? active[method].call(this, othis) : '';
  });

});
</script>

</body>
</html>
