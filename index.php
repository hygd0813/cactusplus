<?php
/**
 * 仙人掌(Cactus)是优雅简洁的暗色主题，本主题基于Cactus魔改而成。
 *
 *发布页：<a href="https://www.80srz.com/306.html">https://www.80srz.com/306.html</a>
 *
 *邮箱：hygd0813@qq.com
 * @package Cactusplus Theme
 * @author 荒野孤灯
 * @version 1.6.6
 * @link https://www.80srz.com
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<body>
    <div class="content index widthindex mx-auto px3 my4">
 <!-- header导航栏 -->
        <header id="header">
            <a href="<?php $this->options->siteUrl();?>">
                 <div id="logo" style="background-image: url(<?php if($this->options->logoimg): ?><?php $this->options->logoimg();?><?php else : ?><?php cjUrl('images/logo.png'); ?><?php endif; ?>);"></div>
			 </a>
             <div id="title">
                 <h1 style="color:#2bbc8a;margin:1rem;font-size:36px;line-height:42px;"><?php $this->options->title(); ?></h1>
             </div>
             <div id="nav">
                 <ul>
                     <li class="icon"><a href="#"><i class="fa fa-bars fa-2x"></i></a></li>
                     <!-- <li><b><a href="<?php $this->options->siteUrl();?>">首页</a></b></li> -->
                     <li><b><a href="<?php $this->options->siteUrl();?>music/" target="_blank" title="网易云音乐">音乐</a></b></li>				
                     <?php $this->widget('Widget_Contents_Page_List')->parse('<li><b><a href="{permalink}">{title}</a></b></li>'); ?>
                     <?php $this->widget('Widget_Metas_Category_List')->to($categorys);while($categorys->next()):?>
                     <li><b><a href="<?php $categorys->permalink(); ?>"><?php $categorys->name(); ?></a></b></li>
                     <?php endwhile;?>
                 </ul>
             </div>
        </header>		
        <section id="wrapper" class="Home">
 <!-- 信息栏 -->				
            <section id="about">
                <div class="description coding">
                  <span class="typed prompt"></span>                                              
                </div>
    <section class="">
    <?php if($this->user->hasLogin()): ?>
        <script type="text/javascript"> var now=(new Date()).getHours(); if(now>0&&now<=6){ document.write("夜猫子！"); }else if(now>6&&now<=11){ document.write("上午好！"); }else if(now>11&&now<=14){ document.write("中午好！"); }else if(now>14&&now<=18){ document.write("下午好！"); }else{ document.write("晚上好！"); } </script> <span style="color:orange">「</span><a href="<?php $this->options ->siteUrl(); ?>visitor.html" target="_blank" style="background: none;"><?php echo $this->user->screenName(); ?></a><span style="color:orange">」</span> 站长大人！
    <?php else : ?>
        <?php if($this->remember('author',true)): ?>
            <script type="text/javascript"> var now=(new Date()).getHours(); if(now>0&&now<=6){ document.write("夜猫子！"); }else if(now>6&&now<=11){ document.write("上午好！"); }else if(now>11&&now<=14){ document.write("中午好！"); }else if(now>14&&now<=18){ document.write("下午好！"); }else{ document.write("晚上好！"); } </script> <span style="color:orange">「</span><a href="<?php $this->options ->siteUrl(); ?>visitor.html" target="_blank" style="background: none;"><?php echo $this->remember('author',true); ?></a><span style="color:orange">」</span> 老朋友！
        <?php else : ?>
            <script type="text/javascript"> var now=(new Date()).getHours(); if(now>0&&now<=6){ document.write("快睡觉！"); }else if(now>6&&now<=11){ document.write("早上好！"); }else if(now>11&&now<=14){ document.write("中午好！"); }else if(now>14&&now<=18){ document.write("下午好！"); }else{ document.write("晚上好！"); } </script><?php echo '来自<span style="color:orange">「</span>'.convertip(getIp()).'<span style="color:orange">」</span> 的新朋友！'; ?>
        <?php endif; ?>
    <?php endif; ?> 
</section>                     
				<?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
                    <p style="display: inline;">
                        <span>
                            <i class="fa fa-eye"></i>&nbsp;<span style="margin-right:8px;"><span><?php echo theAllViews();?></span></span>
							<i class="fa fa-thumbs-o-up"></i>&nbsp;<span style="margin-right:8px;"><span><?php echo agreeCount();?></span></span>
							<i class="fa fa-comments-o"></i>&nbsp;<span style="margin-right:8px;"><span><?php $stat->publishedCommentsNum();?></span></span>
                      </span>
                    </p>
                    <ul id="sociallinks"style="style-type:none;">|&nbsp;&nbsp;<span class="qrcodeimg">Find me on &nbsp;</span>
			             <li>
						     <?php if($this->options->github): ?><a class="icon" href="<?php $this->options->github();?>" target="_blank" title="github" rel="nofollow"><i class="fa fa-github" style="margin-right:5px;"></i></a>&nbsp;<?php endif; ?>
							 <?php if($this->options->weibo): ?> <a class="icon" href="<?php $this->options->weibo();?>" target="_blank" title="weibo" rel="nofollow"><i class="fa fa-weibo" style="margin-right:5px;"></i></a>&nbsp;<?php endif; ?>
							 <?php if($this->options->douban): ?> <a class="icon" href="<?php $this->options->douban();?>" target="_blank" title="douban" rel="nofollow" style="margin-right:5px;"> 豆 </a>&nbsp;<?php endif; ?>
							 <?php if($this->options->email): ?> <a class="icon" href="https://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=<?php $this->options->email();?>" target="_blank" title="email" rel="nofollow"><i class="fa fa-envelope"></i></a> &nbsp;<?php endif; ?>
							 |&nbsp;<a id="search" class="search icon" href="javascript:;" title="站内搜索"> &nbsp;<span class="qrcodeimg">Search &nbsp;</span><i class="fa fa-search"></i></a>
                        </li>						
					</ul>                           
					<p class="prompt ad-text output new-output">公告：主题更新至1.6.5版(2023/2/23)</p>	
              
            </section>
          
 <!-- 文章CMS列表 -->						
            <div class="row">		                  
                <?php $this->widget('Widget_Metas_Category_List@options')->to($categories);$ignoreMidArr = explode(',', $this->options->nolist);?>
                <?php while ($categories->next()): ?>
                <?php if (!in_array($categories->mid,$ignoreMidArr)): ?>
                   <section id="writing" class="col-lg-6 col-xs-12">
                    <span class="h1"><a href="<?php $categories->permalink(); ?>"><?php $categories->name(); ?></a></span>	
                    <ul class="post-list" id="post-list">
<!--文章置顶-->
                <?php if($this->options->indextopnum1): ?>
                <?php 
                    $archiveTop1 = explode(',', $this->options->indextopnum1);
                    $top1Cid = $archiveTop1[0];
                    $top1Mid = count($archiveTop1) == 2?$archiveTop1[1]:0
                ?>
<?php if($top1Mid == 0 || ($categories->mid == $top1Mid)): ?>
<?php $this->widget('Widget_Archive@indextj1', 'pageSize=1&type=post', 'cid='.$top1Cid.'')->to($indextop); ?>
<li class="post-item" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;max-width:100%;">
    <div class="meta"><time datetime="<?php $indextop->date('Y.n.j'); ?>" itemprop="datePublished"><?php $indextop->date('Y.n.j'); ?></time>
    </div>
    <span style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;max-width:95%;"><small style="color:Orange;margin-right:5px;font-size:8px;">Top</small><a href="<?php $indextop->permalink(); ?>"><?php $indextop->title(); ?></a>
    </span>
</li>
<?php endif; ?> 
<?php endif; ?>
<?php if($this->options->indextopnum2): ?>
<?php 
    $archiveTop2 = explode(',', $this->options->indextopnum2);
    $top2Cid = $archiveTop2[0];
    $top2Mid = count($archiveTop2) == 2?$archiveTop2[1]:0
?>
<?php if($top2Mid == 0 || ($categories->mid == $top2Mid)): ?>
<?php $this->widget('Widget_Archive@indextj2', 'pageSize=1&type=post', 'cid='.$top2Cid.'')->to($indextop); ?>
<li class="post-item" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;max-width:100%;">
    <div class="meta"><time datetime="<?php $indextop->date('Y.n.j'); ?>" itemprop="datePublished"><?php $indextop->date('Y.n.j'); ?></time>
    </div>
    <span style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;max-width:95%;"><small style="color:Orange;margin-right:5px;font-size:8px;">Top</small><a href="<?php $indextop->permalink(); ?>"><?php $indextop->title(); ?></a>
    </span>
</li>
<?php endif; ?> 
<?php endif; ?> 
<!--文章置顶结束-->				
<?php $this->widget('Widget_Archive@index-' . $categories->mid, 'pageSize=10&type=category', 'mid=' . $categories->mid)->to($posts); ?>
<?php while ($posts->next()): ?>
<?php if(($posts->cid != $top1Cid) && ($posts->cid != $top2Cid)): ?>
<li class="post-item" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;max-width:100%;">
    <div class="meta"><time datetime="<?php $posts->date(); ?>" itemprop="datePublished"><?php $posts->date('Y.n.j'); ?></time>
    </div>
    <span style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;max-width:95%;"><a href="<?php $posts->permalink(); ?>"><?php $posts->title(); ?></a>
    </span>
</li>
<?php endif; ?>
<?php endwhile;?>
					
                    </ul>
                </section>
    <?php endif; ?>
<?php endwhile; ?>  
                <section id="projects">
                    <span class="h1">
                        <a href="<?php if($this->options->Projectsurl): ?><?php $this->options->Projectsurl();?><?php else : ?>#<?php endif; ?>"  target="_blank">便签</a>
                    </span>
                    <ul class="project-list">
                       <li class="project-item"><a href="https://www.runoob.com/" target="_blank" title="学的不仅是技术，更是梦想！" rel="external nofollow noopener noreferrer">菜鸟教程</a></li>
                      <?php Projects(); ?>
                    </ul>
                </section>				
            </div>
        </section>				
    </div>	
 <?php $this->need('footer.php'); ?>
