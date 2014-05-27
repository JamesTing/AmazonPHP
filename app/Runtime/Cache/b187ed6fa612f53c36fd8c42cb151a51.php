<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
    <title><?php echo ($title); ?> series pumps</title> 
    <meta name="description" content="">

  <link rel="stylesheet" type="text/css" href="/static/css/home.css" />
  <script type="text/javascript" src="/static/js/script.js"></script>
</head>
<body>
  <div id="wrap">
    
      <a id="logo" href="/"><?php echo ($SiteName); ?></a>
      <ul id="navigator" class="clearfix">
        <?php if(is_array($menu)): $i = 0; $__LIST__ = array_slice($menu,0,8,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/<?php echo ($ListUrl); ?>/<?php echo ($vo["url"]); ?>" title="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    

    <div id="main" class="clearfix">
    

  <div class="content">
    <h1><?php echo ($title); ?> series pumps</h1>
    <ul class="inline clearfix">
      <?php if(is_array($thisletter)): $i = 0; $__LIST__ = $thisletter;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/<?php echo ($ListUrl); ?>/<?php echo ($vo["url"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>


    </div>

    <div id="footer" class="clearfix">
    
        <ul id="keyword" class="inline clearfix">
          <?php if(is_array($keyword)): foreach($keyword as $key=>$vo): ?><li><a href="/<?php echo ($ListUrl); ?>/<?php echo ($vo["url"]); ?>" title="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; ?>
        </ul>

        <ul id="letter" class="inline clearfix">
          <?php if(is_array($letter)): foreach($letter as $key=>$vo): ?><li><a href="/<?php echo ($LetterUrl); ?>/<?php echo ($vo); ?>" title="<?php echo ($vo); ?>"><?php echo ($vo); ?></a></li><?php endforeach; endif; ?>
        </ul>
    
    </div>

    <i style="display:none;"><?php echo ($TrafficCode); ?></i>
    
  </div>
</body>
</html>