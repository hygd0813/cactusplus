<?php
/**
 * 仙人掌(Cactusplus)是优雅简洁的暗色主题
 * @package Cactusplus Theme
 * @author 荒野孤灯
 * @version 1.6.3
 * @link https://www.80srz.com
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');

?>
<body>
    <div class="content index widthindex mx-auto px3 my4">
        <header id="header">
            <a href="<?php $this->options->siteUrl();?>">
                 <div id="logo" style="background-image: url(<?php if($this->options->logoimg): ?><?php $this->options->logoimg();?><?php else : ?><?php $this->options->themeUrl('images/logo.png'); ?><?php endif; ?>);"></div>
			 </a>
             <div id="title">
                 <h1><?php $this->options->title(); ?></h1>
             </div>
             <div id="nav">
                 <ul>
                     <li class="icon"><a href="#"><i class="fa fa-bars fa-2x"></i></a></li>
                        <!-- <li>
                            <b><a href="<?php $this->options->siteUrl();?>" target="_blank">首页</a></b>
                        </li> 	-->	
                     <li><b><a href="<?php $this->options->siteUrl();?>music/" target="_blank" title="网抑云Music">音乐</a></b></li>				
                     <?php $this->widget('Widget_Contents_Page_List')->parse('<li><b><a href="{permalink}" target="_blank">{title}</a></b></li>'); ?>
                     <?php if($this->options->github): ?>
					 <li><b><a href="<?php $this->options->github();?>" target="_blank">Github</a></b></li><?php endif; ?>						
                    <!--</ul>
                    <br/>
                    <ul><li><b>分类&nbsp;：</b></li>-->					
                     <?php $this->widget('Widget_Metas_Category_List')->to($categorys);while($categorys->next()):?>
                     <li><b><a href="<?php $categorys->permalink(); ?>" target="_blank"><?php $categorys->name(); ?></a></b></li>
                     <?php endwhile;?>
                 </ul>
             </div>
        </header>		
        <section id="wrapper" class="Home">
            <section id="about">
                <div class="description coding">
                      <span class="typed prompt"></span>
                </div> 
				<?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
                    <p style="display: inline">
                        <span>
                            <i class="fa fa-eye"></i>
                            <span style="margin-right:5px;"><!--原主题span标签 id="busuanzi_container_site_pv"  -->
                                <span><?php echo theAllViews();?></span> <!--原主题span标签 id="busuanzi_value_site_pv" -->
                            </span>
							<i class="fa fa-thumbs-o-up"></i>
							<span style="margin-right:5px;">
							<span><?php echo agreeCount();?></span>
							</span>
							<i class="fa fa-comments-o"></i>
							<span style="margin-right:5px;">
							<span><?php $stat->publishedCommentsNum();?></span>
							</span>
                        </span>
                          |&nbsp;&nbsp;
                    </p>
                    <ul id="sociallinks">
						<li><?php if($this->options->github): ?><a class="icon" href="<?php $this->options->github();?>" target="_blank" title="github" rel="nofollow"><i class="fa fa-github" style="margin-right:5px;"></i></a><?php endif; ?><?php if($this->options->weibo): ?> <a class="icon" href="<?php $this->options->weibo();?>" target="_blank" title="weibo" rel="nofollow"><i class="fa fa-weibo" style="margin-right:5px;"></i></a><?php endif; ?> <?php if($this->options->douban): ?> <a class="icon" href="<?php $this->options->douban();?>" target="_blank" title="douban" rel="nofollow" style="margin-right:5px;"> 豆 </a><?php endif; ?><?php if($this->options->email): ?> <a class="icon" href="https://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=<?php $this->options->email();?>" target="_blank" title="email" rel="nofollow"><i class="fa fa-envelope"></i></a><?php endif; ?>
                        </li>
                    </ul>&nbsp;  |<a id="search" class="search icon" href="javascript:;" title="站内搜索">&nbsp;&nbsp;<i class="fa fa-search"></i></a><p></p>
                    <p class="prompt ad-text output new-output">支持PWA.为了您的健康,请保持社交距离\勤洗手</p>
					
            </section>			
            <div class="row">		
                <?php $this->widget('Widget_Metas_Category_List@options','ignore= '.$this->options->nolist.'')->to($categories);?>			
                <?php while ($categories->next()): ?>
                <section id="writing" class="col-lg-6 col-xs-12">
                    <span class="h1">
                        <a href="<?php $categories->permalink(); ?>"><?php $categories->name(); ?></a>
                    </span>					
                    <ul class="post-list" id="post-list">
					<?php if($this->options->indextopnum1): ?>
					<?php $this->widget('Widget_Archive@indextj1', 'pageSize=1&type=post', 'cid='.$this->options->indextopnum1.'')->to($indextop); ?>
                    <li class="post-item" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;max-width:100%;">
                        <div class="meta"><time datetime="<?php $indextop->date('Y.n.j'); ?>" itemprop="datePublished"><?php $indextop->date('Y.n.j'); ?></time></div>
                        <span style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;max-width:95%;"><a href="<?php $indextop->permalink(); ?>" target="_blank"><small style="color:Orange;margin-right:5px;">[Top]</small><?php $indextop->title(); ?></a></span>
                    </li>
					<?php endif; ?> 
					<?php if($this->options->indextopnum2): ?>
					<?php $this->widget('Widget_Archive@indextj2', 'pageSize=1&type=post', 'cid='.$this->options->indextopnum2.'')->to($indextop); ?>
                    <li class="post-item" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;max-width:100%;">
                        <div class="meta"><time datetime="<?php $indextop->date('Y.n.j'); ?>" itemprop="datePublished"><?php $indextop->date('Y.n.j'); ?></time></div>
                        <span style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;max-width:95%;"><a href="<?php $indextop->permalink(); ?>" target="_blank"><small style="color:Orange;margin-right:5px;">[Top]</small><?php $indextop->title(); ?></a></span>
                    </li>
                    <?php endif; ?> 					
                    <?php $this->widget('Widget_Archive@index-' . $categories->mid, 'pageSize=12&type=category', 'mid=' . $categories->mid)->to($posts); ?>
                    <?php while ($posts->next()): ?>
                    <li class="post-item" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;max-width:100%;">
                        <div class="meta"><time datetime="<?php $posts->date(); ?>" itemprop="datePublished"><?php $posts->date('Y.n.j'); ?></time></div>
                        <span style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;max-width:95%;"><a href="<?php $posts->permalink(); ?>" target="_blank"><?php $posts->title(); ?></a></span>
		            <?php endwhile;?>
                    </li>
                    </ul>
                </section>
	            <?php endwhile; ?>				
                <section id="projects">
                    <span class="h1">
                        <a href="<?php if($this->options->Projectsurl): ?><?php $this->options->Projectsurl();?><?php else : ?>#<?php endif; ?>" rel="external nofollow noopener noreferrer" target="_blank">收藏</a>
                    </span>
                    <ul class="project-list">
					<?php Projects(); ?>
                    </ul>
                </section>				
            </div>
        </div>		
 <?php $this->need('footer.php'); ?>