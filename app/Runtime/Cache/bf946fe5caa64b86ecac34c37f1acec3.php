<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
    <title><?php echo ($category); ?></title> 
    <meta name="description" content="<?php echo ($BeginWord); ?> <?php echo ($category); ?>. <?php echo ($SiteName); ?> supply <?php echo ($category); ?>, <?php echo ($RelativeBind); ?> and more <?php echo ($CoreProduct); ?> <?php echo ($EndWord); ?>.">

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
    
  <div id="side">
    <div class="section">
      <dl>
        <dt>Related Products</dt>
        <?php if(is_array($relative)): $i = 0; $__LIST__ = $relative;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dd><a href="/<?php echo ($ListUrl); ?>/<?php echo ($vo["url"]); ?>" title="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
      </dl>
    </div>
    <?php echo ($CategoryAd); ?>
  </div>
  <div id="content">
    <h1><?php echo ($category); ?></h1>
    <p class="description"><?php echo ($BeginWord); ?> <strong><?php echo ($category); ?></strong>. <?php echo ($SiteName); ?> supply <?php echo ($category); ?>, <?php echo ($RelativeBind); ?> and more <?php echo ($CoreProduct); ?> <?php echo ($EndWord); ?>.</p>
    <ul id="productlist" class="list clearfix">
      <?php if(is_array($products)): $i = 0; $__LIST__ = $products;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
        <a onclick="addtocart('<?php echo ($vo["asin"]); ?>','<?php echo ($AWS_ASSOCIATE_TAG); ?>')" class="image" title="<?php echo ($vo["title"]); ?>"><img src="<?php echo ($vo["src"]); ?>" alt="<?php echo ($vo["title"]); ?>"></a>
        <p><a href="/<?php echo ($DetailUrl); ?>/<?php echo ($vo["url"]); ?>_<?php echo ($vo["asin"]); ?>" class="title" title="<?php echo ($vo["title"]); ?>"><?php echo ($vo["title"]); ?></a></p>
        <span><?php echo ($vo["price"]); ?></span>
        <i><a href="/<?php echo ($ListUrl); ?>/<?php echo ($vo["brand"]); ?>" title="<?php echo ($vo["brand"]); ?>"><?php echo ($vo["brand"]); ?></a></i>
      </li><?php endforeach; endif; else: echo "" ;endif; ?>
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