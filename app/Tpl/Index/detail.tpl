<extend name="base" />

<block name="meta">
  <title>{$product.title}</title>
  <meta name="description" content="{$description}">
  <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
  <script type="text/javascript">stLight.options({publisher: "fbc1ce21-1396-4db3-a0cc-4541de230f23", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
</block>

<block name="main">
  <div id="product" itemscope itemtype="http://data-vocabulary.org/Product">
    <ul id="breadcrumb" class="clearfix">
      <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/"  itemprop="url"><span itemprop="title">{$SiteName}</span></a> <span class="divider">></span></li>
      <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/{$ListUrl}/{$product.binding}"  itemprop="url"><span itemprop="title">{$product.binding}</span></a> <span class="divider">></span></li>
      <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/{$ListUrl}/{$product.brand}" itemprop="url"><span itemprop="title">{$product.brand}</span></a> <span class="divider">></span></li>
      <li class="active">{$product.title}</li>
    </ul>
    <div class="between clearfix">
      <a class="picture" onclick="addtocart('{$product.asin}','{$AWS_ASSOCIATE_TAG}')"><img itemprop="image" src="{$product.src}" /></a>
      <div class="meta">
        <h1 itemprop="name">{$product.title}</h1>
        <span itemprop="brand"><a href="/{$ListUrl}/{$product.brand}" title="{$product.brand}">{$product.brand}</a></span>
        <span itemprop="offerDetails" itemscope itemtype="http://data-vocabulary.org/Offer">
          <meta itemprop="currency" content="USD" />
          <div class="price" itemprop="price">{$product.price}</div>
        </span>

        <a class="btn orange" itemprop="availability" content="in_stock" onclick="addtocart('{$product.asin}','{$AWS_ASSOCIATE_TAG}')">
          Add to Cart
        </a>
        <a class="gray" onclick="addtocart('{$product.asin}','{$AWS_ASSOCIATE_TAG}')">
          Add to Wish List
        </a>

        <dl itemprop="description">
          <volist name="product.feature" id="vo">
            <dd>{$vo}</dd>
          </volist>
        </dl>
      </div>
    </div>

    <div id="description">
      <volist name="product.editorreview" id="vo">{$vo}</volist>
    </div>

    <h2>More {$CoreProduct} of {$product.brand}</h2>
    <ul id="related" class="list clearfix">
      <volist name="relative" id="vo" offset='0' length='8'>
        <li>
          <a onclick="addtocart('{$vo.asin}','{$AWS_ASSOCIATE_TAG}')" class="image" title="{$vo.title}"><img src="{$vo.src}" alt="{$vo.title}"></a>
          <p><a href="/{$DetailUrl}/{$vo.url}_{$vo.asin}" class="title" title="{$vo.title}">{$vo.title}</a></p>
          <span>{$vo.price}</span>
          <i><a href="/{$ListUrl}/{$vo.brand}" title="{$vo.brand}">{$vo.brand}</a></i>
        </li>
      </volist>
    </ul>

    <div class="share">
      <span class='st_facebook_hcount' displayText='Facebook'></span>
      <span class='st_twitter_hcount' displayText='Tweet'></span>
      <span class='st_pinterest_hcount' displayText='Pinterest'></span>
      <span class='st_googleplus_hcount' displayText='Google +'></span>
    </div>
  </div>

  <div id="sidebar">
    {$DetailAd}

  </div>
</block>