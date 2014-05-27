<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
    <title><?php echo ($SiteName); ?></title> 
    <meta name="description" content="<?php echo ($SiteDescription); ?>">

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
    <?php if(is_array($MainProduct)): $i = 0; $__LIST__ = $MainProduct;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><h2><?php echo ($vo["keyword"]); ?></h2>
      <ul class="homelist list clearfix">
        <?php if(is_array($vo["list"])): $i = 0; $__LIST__ = array_slice($vo["list"],0,8,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$product): $mod = ($i % 2 );++$i;?><li>
          <a onclick="addtocart('<?php echo ($product["asin"]); ?>','<?php echo ($AWS_ASSOCIATE_TAG); ?>')" class="image" title="<?php echo ($product["title"]); ?>"><img src="<?php echo ($product["src"]); ?>" alt="<?php echo ($product["title"]); ?>"></a>
          <p><a href="/<?php echo ($DetailUrl); ?>/<?php echo ($product["url"]); ?>_<?php echo ($product["asin"]); ?>" class="title" title="<?php echo ($product["title"]); ?>"><?php echo ($product["title"]); ?></a></p>
          <span><?php echo ($product["price"]); ?></span>
          <i><a href="/<?php echo ($ListUrl); ?>/<?php echo ($product["brand"]); ?>" title="<?php echo ($product["brand"]); ?>"><?php echo ($product["brand"]); ?></a></i>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul><?php endforeach; endif; else: echo "" ;endif; ?>

  </div>

    </div>

    <div id="footer" class="clearfix">
    
    <ul id="keyword" class="inline clearfix">
      <?php if(is_array($keyword)): foreach($keyword as $key=>$vo): ?><li><a href="/<?php echo ($ListUrl); ?>/<?php echo ($vo["url"]); ?>" title="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; ?>
    </ul>

    <ul id="letter" class="inline clearfix">
      <?php if(is_array($letter)): foreach($letter as $key=>$vo): ?><li><a href="/<?php echo ($LetterUrl); ?>/<?php echo ($vo); ?>" title="<?php echo ($vo); ?>"><?php echo ($vo); ?></a></li><?php endforeach; endif; ?>
    </ul>

    <ul id="link" class="inline clearfix">
      <?php if(is_array($link)): foreach($link as $key=>$vo): ?><li><a href="<?php echo ($vo["1"]); ?>" target="_blank"><?php echo ($vo["0"]); ?></a></li><?php endforeach; endif; ?>
    </ul>

    </div>

    <i style="display:none;"><?php echo ($TrafficCode); ?></i>
    
  </div>
</body>
</html>