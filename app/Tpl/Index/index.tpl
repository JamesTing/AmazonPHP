<extend name="base" />

<block name="meta">
    <title>{$SiteName}</title> 
    <meta name="description" content="{$SiteDescription}">
</block>

<block name="main">
  <div class="content">
    <volist name="MainProduct" id='vo'>
      <h2>{$vo.keyword}</h2>
      <ul class="homelist list clearfix">
        <volist name="vo.list" id="product" offset='0' length='8'>
        <li>
          <a onclick="addtocart('{$product.asin}','{$AWS_ASSOCIATE_TAG}')" class="image" title="{$product.title}"><img src="{$product.src}" alt="{$product.title}"></a>
          <p><a href="/{$DetailUrl}/{$product.url}_{$product.asin}" class="title" title="{$product.title}">{$product.title}</a></p>
          <span>{$product.price}</span>
          <i><a href="/{$ListUrl}/{$product.brand}" title="{$product.brand}">{$product.brand}</a></i>
        </li>
        </volist>
      </ul>
    </volist>

  </div>
</block>

<block name="footer">
    <ul id="keyword" class="inline clearfix">
      <foreach name="keyword" item="vo">
      <li><a href="/{$ListUrl}/{$vo.url}" title="{$vo.name}">{$vo.name}</a></li>
      </foreach>
    </ul>

    <ul id="letter" class="inline clearfix">
      <foreach name="letter" item="vo">
      <li><a href="/{$LetterUrl}/{$vo}" title="{$vo}">{$vo}</a></li>
      </foreach>
    </ul>

    <ul id="link" class="inline clearfix">
      <foreach name="link" item="vo">
      <li><a href="{$vo.1}" target="_blank">{$vo.0}</a></li>
      </foreach>
    </ul>
</block>