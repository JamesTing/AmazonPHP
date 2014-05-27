<extend name="base" />

<block name="meta">
    <title>{$title} series pumps</title> 
    <meta name="description" content="">
</block>

<block name="main">

  <div class="content">
    <h1>{$title} series pumps</h1>
    <ul class="inline clearfix">
      <volist name="thisletter" id="vo">
        <li><a href="/{$ListUrl}/{$vo.url}">{$vo.name}</a></li>
      </volist>
    </ul>
  </div>

</block>