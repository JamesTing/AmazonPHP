<?php
/**
 * 新建站点步骤:
 * 1.清空数据库 /clear/database, 清除文件缓存 /clear/filecache
 * 2.保存关键词到hub.txt，并导入数据库 /update
 * 3.修改下面的配置项
 * 4.最好改下模板 /app/Tpl
 *
 */
define('AWS_API_KEY', 'AKIAJORTHN3IBPMZEYYQ');
define('AWS_API_SECRET_KEY', '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');
define('AWS_ASSOCIATE_TAG', 'babystrollers0d8-20');

//内容配置
define('SearchIndex', 'Baby');
define('SiteName', 'Baby Strollers');
define('CoreProduct', 'Baby Strollers');
define('MainKeyword','baby strollers,best strollers,bob strollers,chicco strollers,double strollers,graco strollers,jogging strollers,lightweight strollers,maclaren strollers,travel system strollers,twin strollers');
define('SiteDescription', "Baby Strollers supply all Strollers, Travel Systems, Double & Jogging Strollers. Select from Graco, Britax, Chicco and other great brands!");

//url配置
define('ListUrl', 'stroller-list');
define('DetailUrl', 'stroller');
define('LetterUrl', 'stroller-letter');

//友情链接
define('Link', '百度,http://baidu.com;谷歌,http://google.com');
//缓存时间, 3600=1个小时
define('HtmlCache', true);
define('IndexCache', '86400');
define('ListCache', '0');
define('DetailCache', '0');

//统计代码
define('TrafficCode',<<<EOT
<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_5134725'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s16.cnzz.com/stat.php%3Fid%3D5134725%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
EOT
);

//分类页广告
define('CategoryAd',<<<EOT
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- List Side Top -->
<ins class="adsbygoogle"
     style="display:inline-block;width:250px;height:250px"
     data-ad-client="ca-pub-3548311360174246"
     data-ad-slot="4689178042"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
EOT
);

//产品页广告
define('DetailAd',<<<EOT
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Detail Side Top -->
<ins class="adsbygoogle"
     style="display:inline-block;width:250px;height:250px"
     data-ad-client="ca-pub-3548311360174246"
     data-ad-slot="8198034442"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
EOT
);



//数据库连接
define('DBType','pdo');  
define('DBDsn','sqlite:./data.db'); 
define('KeywordSQL', 'keyword');
