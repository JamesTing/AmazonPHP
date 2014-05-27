<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <title><?php echo ($product["title"]); ?></title>
  <meta name="description" content="<?php echo ($description); ?>">
  <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
  <script type="text/javascript">stLight.options({publisher: "fbc1ce21-1396-4db3-a0cc-4541de230f23", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

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
    
  <div id="product" itemscope itemtype="http://data-vocabulary.org/Product">
    <ul id="breadcrumb" class="clearfix">
      <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/"  itemprop="url"><span itemprop="title"><?php echo ($SiteName); ?></span></a> <span class="divider">></span></li>
      <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/<?php echo ($ListUrl); ?>/<?php echo ($product["binding"]); ?>"  itemprop="url"><span itemprop="title"><?php echo ($product["binding"]); ?></span></a> <span class="divider">></span></li>
      <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/<?php echo ($ListUrl); ?>/<?php echo ($product["brand"]); ?>" itemprop="url"><span itemprop="title"><?php echo ($product["brand"]); ?></span></a> <span class="divider">></span></li>
      <li class="active"><?php echo ($product["title"]); ?></li>
    </ul>
    <div class="between clearfix">
      <a class="picture" onclick="addtocart('<?php echo ($product["asin"]); ?>','<?php echo ($AWS_ASSOCIATE_TAG); ?>')"><img itemprop="image" src="<?php echo ($product["src"]); ?>" /></a>
      <div class="meta">
        <h1 itemprop="name"><?php echo ($product["title"]); ?></h1>
        <span itemprop="brand"><a href="/<?php echo ($ListUrl); ?>/<?php echo ($product["brand"]); ?>" title="<?php echo ($product["brand"]); ?>"><?php echo ($product["brand"]); ?></a></span>
        <span itemprop="offerDetails" itemscope itemtype="http://data-vocabulary.org/Offer">
          <meta itemprop="currency" content="USD" />
          <div class="price" itemprop="price"><?php echo ($product["price"]); ?></div>
        </span>

        <a class="btn orange" itemprop="availability" content="in_stock" onclick="addtocart('<?php echo ($product["asin"]); ?>','<?php echo ($AWS_ASSOCIATE_TAG); ?>')">
          Add to Cart
        </a>
        <a class="gray" onclick="addtocart('<?php echo ($product["asin"]); ?>','<?php echo ($AWS_ASSOCIATE_TAG); ?>')">
          Add to Wish List
        </a>

        <dl itemprop="description">
          <?php if(is_array($product["feature"])): $i = 0; $__LIST__ = $product["feature"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dd><?php echo ($vo); ?></dd><?php endforeach; endif; else: echo "" ;endif; ?>
        </dl>
      </div>
    </div>

    <div id="description">
      <?php if(is_array($product["editorreview"])): $i = 0; $__LIST__ = $product["editorreview"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
    </div>

    <h2>More <?php echo ($CoreProduct); ?> of <?php echo ($product["brand"]); ?></h2>
    <ul id="related" class="list clearfix">
      <?php if(is_array($relative)): $i = 0; $__LIST__ = array_slice($relative,0,8,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
          <a onclick="addtocart('<?php echo ($vo["asin"]); ?>','<?php echo ($AWS_ASSOCIATE_TAG); ?>')" class="image" title="<?php echo ($vo["title"]); ?>"><img src="<?php echo ($vo["src"]); ?>" alt="<?php echo ($vo["title"]); ?>"></a>
          <p><a href="/<?php echo ($DetailUrl); ?>/<?php echo ($vo["url"]); ?>_<?php echo ($vo["asin"]); ?>" class="title" title="<?php echo ($vo["title"]); ?>"><?php echo ($vo["title"]); ?></a></p>
          <span><?php echo ($vo["price"]); ?></span>
          <i><a href="/<?php echo ($ListUrl); ?>/<?php echo ($vo["brand"]); ?>" title="<?php echo ($vo["brand"]); ?>"><?php echo ($vo["brand"]); ?></a></i>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>

    <div class="share">
      <span class='st_facebook_hcount' displayText='Facebook'></span>
      <span class='st_twitter_hcount' displayText='Tweet'></span>
      <span class='st_pinterest_hcount' displayText='Pinterest'></span>
      <span class='st_googleplus_hcount' displayText='Google +'></span>
    </div>
  </div>

  <div id="sidebar">
    <?php echo ($DetailAd); ?>

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