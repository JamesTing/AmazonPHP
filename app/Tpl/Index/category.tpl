<extend name="base" />

<block name="meta">
    <title>{$category}</title> 
    <meta name="description" content="{$BeginWord} {$category}. {$SiteName} supply {$category}, {$RelativeBind} and more {$CoreProduct} {$EndWord}.">
</block>

<block name="main">
  <div id="side">
    <div class="section">
      <dl>
        <dt>Related Products</dt>
        <volist name="relative" id="vo">
        <dd><a href="/{$ListUrl}/{$vo.url}" title="{$vo.name}">{$vo.name}</a></dd>
        </volist>
      </dl>
    </div>
    {$CategoryAd}
  </div>
  <div id="content">
    <h1>{$category}</h1>
    <p class="description">{$BeginWord} <strong>{$category}</strong>. {$SiteName} supply {$category}, {$RelativeBind} and more {$CoreProduct} {$EndWord}.</p>
    <ul id="productlist" class="list clearfix">
      <volist name="products" id="vo">
      <li>
        <a onclick="addtocart('{$vo.asin}','{$AWS_ASSOCIATE_TAG}')" class="image" title="{$vo.title}"><img src="{$vo.src}" alt="{$vo.title}"></a>
        <p><a href="/{$DetailUrl}/{$vo.url}_{$vo.asin}" class="title" title="{$vo.title}">{$vo.title}</a></p>
        <span>{$vo.price}</span>
        <i><a href="/{$ListUrl}/{$vo.brand}" title="{$vo.brand}">{$vo.brand}</a></i>
      </li>
      </volist>
    </ul>

  </div>
</block>