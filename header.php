<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="zh">
    <head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="HandheldFriendly" content="True">
		<meta name="renderer" content="webkit">
        <meta name="viewport" content="initial-scale=1,width=device-width,minimum-scale=1,maximum-scale=6">
        <meta name="wap-font-scale" content="no">
		<meta http-equiv="Cache-Control" content="no-transform"/>
		<meta http-equiv="Cache-Control" content="no-siteapp"/>
		<meta name="theme-color" media="(prefers-color-scheme: dark)" content="black">
		<meta property="og:type" content="blog"/>
        <meta property="og:locale" content="zh_CN">
        <meta property="og:image" content="<?php if($this->options->logoimg): ?><?php $this->options->logoimg();?><?php else : ?><?php cjUrl('images/logo.png'); ?><?php endif; ?>">
        <meta property="og:site_name" content="<?php $this->options->title(); ?>">
		 <?php if ($this->is('index')): ?>
		<meta property="og:url" content="<?php $this->options->siteUrl();?>"/>
		<meta property="og:title" content="<?php $this->options->title();?>"/>
		<meta property="og:author" content="<?php $this->author->name();?>"/>
		<meta property="og:description" content="<?php $this->options->description();?>"/>
		<?php endif;?>
		<?php if ($this->is('post') || $this->is('page') || $this->is('attachment')): ?>
		<meta name="description" itemprop="description" content="<?php $this->description();?>">
		<meta property="og:url" content="<?php $this->permalink();?>"/>
		<meta property="og:title" content="<?php $this->title();?> - <?php $this->options->title();?>"/>
		<meta property="og:author" content="<?php $this->author();?>"/>
		<meta property="og:description" content="<?php $this->description();?>"/>
		<meta property="og:release_date" content="<?php $this->date(); ?>"/>
		<?php endif;?>
        <?php $this->header('generator=&template=&pingback=&xmlrpc=&wlw=&commentReply='); ?>
		<title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
        <?php if($this->options->favicon): ?><link rel="shortcut icon" href="<?php $this->options->favicon();?>"><?php endif; ?>
        <?php if($this->options->appleicon): ?><link rel="apple-touch-icon" sizes="180x180" href="<?php $this->options->appleicon();?>"><?php endif; ?>
        <link rel="manifest" href="<?php cjUrl('manifest.json'); ?>">
		<link rel="stylesheet" href="<?php cjUrl('css/bootstrap-grid.min.css'); ?>">
        <link rel="stylesheet" href="<?php cjUrl('css/style.css'); ?>">
        <script src="<?php cjUrl('js/jquery.min.js'); ?>"></script>
        <script>
            document.addEventListener("error", function(e) {
                var elem = e.target;
                if (elem.tagName.toLowerCase() == 'img') {
                    elem.style.display = 'none'
                }
            }, true);
        </script>
<!-- 搜索引擎主动推送-->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?76bfe89d3948e8de81935a6a232b2d8c";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<script>
!function(p){"use strict";!function(t){var s=window,e=document,i=p,c="".concat("https:"===e.location.protocol?"https://":"http://","sdk.51.la/js-sdk-pro.min.js"),n=e.createElement("script"),r=e.getElementsByTagName("script")[0];n.type="text/javascript",n.setAttribute("charset","UTF-8"),n.async=!0,n.src=c,n.id="LA_COLLECT",i.d=n;var o=function(){s.LA.ids.push(i)};s.LA?s.LA.ids&&o():(s.LA=p,s.LA.ids=[],o()),r.parentNode.insertBefore(n,r)}()}({id:"JejorxMXajxsrti7",ck:"JejorxMXajxsrti7"});
</script>
<script>
(function(){
var el = document.createElement("script");
el.src = "https://lf1-cdn-tos.bytegoofy.com/goofy/ttzz/push.js?88155cc1fed8b19d59bf870f88f793c983ff71c46064c4456171dc9f519b599a3d72cd14f8a76432df3935ab77ec54f830517b3cb210f7fd334f50ccb772134a";
el.id = "ttzz";
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(el, s);
})(window)
</script>
<!-- 搜索引擎主动推送END-->

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4962709126690252" crossorigin="anonymous"></script>

<style type="text/css">
@font-face{font-family:'Meslo LG';font-style:normal;font-size:18px;src:local('Meslo LG S'),url(<?php cjUrl('lib/meslo-LG/fonts/'.$this->options->fontfamily.'.woff2'); ?>) format('woff2');font-display: swap;}
*{font-family:Meslo LG;}
</style>
    </head>