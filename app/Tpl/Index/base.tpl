<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <block name="meta">
    <title></title>
    <meta name="description" content="">
  </block>
  <load href="/static/css/home.css" />
  <load href="/static/js/script.js" />
</head>
<body>
  <div id="wrap">
    <block name="header">
      <a id="logo" href="/">{$SiteName}</a>
      <ul id="navigator" class="clearfix">
        <volist name="menu" id="vo" offset="0" length='8'>
          <li><a href="/{$ListUrl}/{$vo.url}" title="{$vo.name}">{$vo.name}</a></li>
        </volist>
      </ul>
    </block>

    <div id="main" class="clearfix">
    <block name="main"></block>
    </div>

    <div id="footer" class="clearfix">
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
    </block>
    </div>

    <i style="display:none;">{$TrafficCode}</i>
    
  </div>
</body>
</html>