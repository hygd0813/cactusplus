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
		<style type="text/css">
            @font-face{font-family:'Meslo LG';font-style:normal;font-size:18px;src:local('Meslo LG S'),url(<?php cjUrl('lib/meslo-LG/fonts/'.$this->options->fontfamily.'.woff2'); ?>) format('woff2');font-display: swap;}
            *{font-family:Meslo LG;}
            body{background-image: url("<?php cjUrl('images/webg'.$this->options->bodybgimg.'.jpg'); ?>"); }
        </style>		
        <script src="<?php cjUrl('js/jquery.min.js'); ?>"></script>
        <script>
            document.addEventListener("error", function(e) {
                var elem = e.target;
                if (elem.tagName.toLowerCase() == 'img') {
                    elem.style.display = 'none'
                }
            }, true);
        </script>
<!--header 统计、广告代码	 --> 
<?php if($this->options->headertjcode): ?> <?php $this->options->headertjcode();?> <?php endif; ?>		
    </head>