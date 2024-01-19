<?php 
/**
* 文章归档
*
* @package custom
*/
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
   <body>
        <div class="content index width mx-auto px3 my4">
            <header id="header">
                <a href="<?php $this->options->siteUrl();?>">
                    <div id="logo" style="background-image: url(<?php if($this->options->logoimg): ?><?php $this->options->logoimg();?><?php else : ?><?php $this->options->themeUrl('images/logo.png'); ?><?php endif; ?>);"></div>
                    <div id="title">
                        <h1 style="color:#2bbc8a;margin:1rem;font-size:36px;line-height:42px;"><?php $this->title() ?></h1>
                    </div>
                </a>
                <div id="nav">
                 <ul style ="padding-inline-start:0px;">
                    <li class="icon"><a href="#"><i class="fa fa-bars fa-2x"></i></a></li>
                    <li style ="padding:0px;margin:0px;"><b><a href="<?php $this->options->siteUrl();?>">首页</a></b></li>
                    <?php $this->widget('Widget_Metas_Category_List')->to($categorys);while($categorys->next()):?>
                    <li style ="padding:0 0 0 5px;margin:0px;"><b><a href="<?php $categorys->permalink(); ?>"><?php $categorys->name(); ?></a></b></li>
                    <?php endwhile;?>                    				
                    <?php $this->widget('Widget_Contents_Page_List')->parse('<li  style ="padding:0 0 0 5px;margin:0px;"><b><a href="{permalink}">{title}</a></b></li>'); ?>
                    <li class="tooltip" data-msg="随机访问一位“十年之约”博友！" style ="padding:0 0 0 5px;margin:0px;"><b><a href="https://foreverblog.cn/go.html" rel="nofollow" target="_blank">虫洞</a></b></li>
                    <li class="tooltip" data-msg="随机访问一位“开往”博友！" style ="padding:0 0 0 5px;margin:0px;"><b><a href="https://www.travellings.cn/go.html" rel="nofollow" target="_blank">开往</a></b></li>                       
                 </ul>
                </div>			
            </header>

<section id="wrapper" class="home">
     <h3 class="panel" style="color:#2bbc8a;">站点统计</h3>
<?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
<table width="100%" style="border: 1px solid #333;" summary="《<?php $this->options->title(); ?>》博客统计">
  <tbody>
    <tr>
      <td width="18%" align="center" style="border-right: 1px dashed #333;border-bottom: 1px dashed #333;">分类:<br></td>
      <td colspan="3" align="left" style="border-bottom: 1px dashed #333;word-break:break-all;"><small>(&nbsp;共<b style="font-size:18px;margin:0 5px 5px 5px;"><?php $stat->categoriesNum();?></b>类&nbsp;)</small><br/>“折腾”：&nbsp;<?php fenleinum(1); ?>&nbsp;篇；&nbsp;“杂记”：&nbsp;<?php fenleinum(3); ?>&nbsp;篇；&nbsp;&nbsp;“读书”：&nbsp;<?php fenleinum(55); ?>&nbsp;篇；&nbsp;“饭碗”：&nbsp;<?php fenleinum(48); ?>&nbsp;篇</td>
    </tr>
    <tr>
      <td width="18%" align="center" style="border-right: 1px dashed #333;border-bottom: 1px dashed #333;">运行:</td>
      <td width="30%" align="left" style="border-right: 1px dashed #333;border-bottom: 1px dashed #333;">&nbsp;<?php echo $this->options->zmki_time?round((time() - strtotime($this->options->zmki_time)) / 86400, 0) . '':'0'; ?>&nbsp;天</td>
	  <td width="18%" align="center" style="border-right: 1px dashed #333;border-bottom: 1px dashed #333;">更新:</td>
      <td width="30%" align="left" style="border-bottom: 1px dashed #333;">&nbsp;<?php echo get_last_update();?></td>
    </tr>
    <tr>
      <td width="18%" align="center" style="border-right: 1px dashed #333;border-bottom: 1px dashed #333;">周更:</td>
      <td width="30%" align="left" style="border-right: 1px dashed #333;border-bottom: 1px dashed #333;">&nbsp;<?php echo getNumPosts(7); ?>&nbsp;篇</td>
      <td width="18%" align="center" style="border-right: 1px dashed #333;border-bottom: 1px dashed #333;">月更:</td>
      <td width="30%" align="left" style="border-bottom: 1px dashed #333;">&nbsp;<?php echo getNumPosts(30); ?>&nbsp;篇</td>
    </tr>	
    <tr>
      <td width="18%" align="center" style="border-right: 1px dashed #333;border-bottom: 1px dashed #333;">文章:</td>
      <td width="30%" align="left" style="border-right: 1px dashed #333;border-bottom: 1px dashed #333;">&nbsp;<?php $stat->publishedPostsNum();?>&nbsp;篇</td>
      <td width="18%" align="center" style="border-right: 1px dashed #333;border-bottom: 1px dashed #333;">标签:</td>
      <td width="30%" align="left" style="border-bottom: 1px dashed #333;">&nbsp;<?php echo tagCount();?>&nbsp;个</td>
    </tr>
	<tr>
	<?php if($this->user->hasLogin()): ?>
      <td width="18%" align="center" style="border-right: 1px dashed #333;border-bottom: 1px dashed #333;">附件:</td>
      <td width="30%" align="left" style="border-right: 1px dashed #333;border-bottom: 1px dashed #333;">&nbsp;<?php echo userstat($this->user->uid,'attachment'); ?>&nbsp;个</td>
	<?php else: ?> 
      <td width="18%" align="center" style="border-right: 1px dashed #333;border-bottom: 1px dashed #333;">页面:</td>
      <td width="30%" align="left" style="border-right: 1px dashed #333;border-bottom: 1px dashed #333;">&nbsp;<?php $stat->publishedPagesNum();?>&nbsp;页</td>
    <?php endif; ?>	  
      <td width="18%" align="center" style="border-right: 1px dashed #333;border-bottom: 1px dashed #333;">浏览:</td>
      <td width="30%" align="left" style="border-bottom: 1px dashed #333;">&nbsp;<?php echo theAllViews();?>&nbsp;阅</td>
    </tr>
    <tr>
      <td width="18%" align="center" style="border-bottom: 1px dashed #333;border-right: 1px dashed #333;">评论:</td>
      <td width="30%" align="left" style="border-bottom: 1px dashed #333;border-right: 1px dashed #333;">&nbsp;<?php $stat->publishedCommentsNum();?>&nbsp;评</td>
      <td width="18%" align="center" style="border-bottom: 1px dashed #333;border-right: 1px dashed #333;">点赞:</td>
      <td width="30%" align="left" style="border-bottom: 1px dashed #333;">&nbsp;<?php echo agreeCount();?>&nbsp;赞</td>
    </tr>
    <tr>
      <td colspan="4" align="center"><?php echo allwords(); ?></td>
    </tr>	
  </tbody>
</table>  
</section>				
<div id="theme-tagcloud" class="tagcloud-wrap">
    <h3 class="panel" style="color:#2bbc8a;">标签云集</h3>
	<?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1')->to($tags); ?>
    <ul>
	<?php while($tags->next()): ?>
		<li><a style="font-size:<?php echo(rand(14, 22)); ?>px; text-transform:capitalize;" href="<?php $tags->permalink(); ?>" title="#<?php $tags->name(); ?>#标签共<?php $tags->count(); ?> 篇文章"><?php $tags->name(); ?></a><sup style="color:orange;font-size:10px;"><?php $tags->count(); ?></sup><li>
	<?php endwhile; ?>
</ul></div><br>	
<!--内容页下方ads -->	 	 
<?php if($this->options->postdownads): ?><?php $this->options->postdownads();?><?php endif; ?>            
<section id="wrapper" class="home">
    <h3 class="panel" style="color:#2bbc8a;">文章归档</h3>
    <?php
    $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);   
    $year=0; $mon=0; $i=0; $j=0;$output = ''; 
    while($archives->next()):   
        $year_tmp = date('Y',$archives->created);   
        $mon_tmp = date('n',$archives->created);   
        $y=$year; $m=$mon;   
        if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';   
        if ($year != $year_tmp && $year > 0) $output .= '</ul>';   
        if ($mon != $mon_tmp) {   
            $mon = $mon_tmp;   
            @$output .= '<div class="item"><h4 class="panel" style="color:#2bbc8a;">' . $year_tmp . ' 年 ' . $mon . ' 月<span style="float:right;"><i class="fa fa-angle-down" aria-hidden="true"></i></span></h4><ul class="post-list" id="post-list">'; //输出年份   
        }    
        $output .= '<li class="post-item" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;max-width:100%;"><div class="meta"><time datetime="'.date('Y-m-d ',$archives->created).'" itemprop="datePublished">'.date('n月j日 ',$archives->created).'</time></div><span style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;width:780px;max-width:98%;"><a href="'.$archives->permalink .'" title="">'. $archives->title .'</a></span><span class="metatj"><a href="'.$archives->permalink .'#comments" title="">('. $archives->commentsNum.')</a></span></li>'; //输出文章日期和标题以及所属分类
    endwhile;   
    $output .= '</ul></div>';
    echo $output;
    ?>
</section>	         
</div>   
 <?php $this->need('footer.php'); ?>
 <div>