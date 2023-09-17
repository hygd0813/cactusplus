<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="zh">
    <head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="renderer" content="webkit">
        <meta name="viewport" content="initial-scale=1,width=device-width,minimum-scale=1,maximum-scale=6">
        <meta name="wap-font-scale" content="no">
		<meta http-equiv="Cache-Control" content="no-transform"/>
		<meta http-equiv="Cache-Control" content="no-siteapp"/>
        <meta name="applicable-device" content="pc,mobile">
        <meta name="MobileOptimized" content="width">
        <meta name="HandheldFriendly" content="true">
        <meta content="always" name="referrer">     
		<meta name="theme-color" media="(prefers-color-scheme: dark)" content="black">
        <meta property="og:locale" content="zh_CN">
        <meta property="og:image" content="<?php if($this->options->logoimg): ?><?php $this->options->logoimg();?><?php else : ?><?php cjUrl('images/logo.png'); ?><?php endif; ?>">
        <meta property="og:site_name" content="<?php $this->options->title(); ?>">
		<?php if ($this->is('index')): ?>
      	<meta property="og:type" content="blog"/>
		<meta property="og:url" content="<?php $this->options->siteUrl();?>"/>
		<meta property="og:title" content="<?php $this->options->title();?>"/>
		<meta property="og:author" content="<?php $this->author->name();?>"/>
        <meta name="keywords"  content="<?php $this->keywords();?>"> 
        <meta name="description"  content="<?php $this->options->description();?>">
		<?php endif;?>
		<?php if ($this->is('post') || $this->is('page') || $this->is('attachment') || $this->is('search') || $this->is('category') ): ?>
		<meta property="og:url" content="<?php $this->permalink();?>"/>
		<meta property="og:title" content="<?php $this->title();?> - <?php $this->options->title();?>"/>
		<meta property="og:author" content="<?php $this->author();?>"/>    
        <meta property="og:type" content="article"/>
        <meta property="article:published_time" content="<?php $this->date('c'); ?>"/>
        <meta property="article:published_first" content="<?php $this->options->title() ?>, <?php $this->permalink() ?>" /> 
        <meta name="keywords"  content="<?php $k=$this->fields->keyword;if(empty($k)){echo $this->keywords();}else{ echo $k;};?>">
        <meta name="description" content="<?php $d=$this->fields->description;if(empty($d) || !$this->is('single')){if($this->getDescription()){echo $this->getDescription();}}else{ echo $d;};?>" />
		<?php endif;?>
        <?php $this->header('description=&generator=&pingback=&template=&xmlrpc=&wlw=&commentReply=&keywords='); ?>
		<title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php if($this->_currentPage>1) echo ' 第 '.$this->_currentPage.' 页 - '; ?><?php $this->options->title(); ?></title>
        <link rel="shortcut icon" href="<?php if($this->options->favicon): ?><?php $this->options->favicon();?><?php else : ?><?php cjUrl('images/favicon.ico'); ?><?php endif; ?>" type="image/x-icon">
        <?php if($this->options->appleicon): ?><link rel="apple-touch-icon" sizes="180x180" href="<?php $this->options->appleicon();?>"><?php endif; ?>
        <link rel="manifest" href="<?php cjUrl('manifest.json'); ?>">
	    <link rel="stylesheet" href="<?php cjUrl('css/bootstrap-grid.min.css'); ?>">
        <link rel="stylesheet" href="<?php cjUrl('css/style.css'); ?>">
		<style type="text/css">
            @font-face{font-family:'Meslo LG';font-style:normal;font-size:18px;src:local('Meslo LG S'),url("<?php cjUrl('lib/meslo-LG/fonts/'.$this->options->fontfamily.''); ?>") format('woff2');font-display: swap;}
            *{font-family:Meslo LG;}
            body{background-image: url("<?php cjUrl('images/'.$this->options->bodybgimg.''); ?>"); }
        </style>		
        <script src="<?php cjUrl('js/jquery.min.js'); ?>"  type="text/javascript"></script>
        <script type="text/javascript">
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