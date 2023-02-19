<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
    <body>
        <div class="content index width mx-auto px3 my4">
            <header id="header">
                <a href="<?php $this->options->siteUrl();?>">
                    <div id="logo" style="background-image: url(<?php if($this->options->logoimg): ?><?php $this->options->logoimg();?><?php else : ?><?php $this->options->themeUrl('images/logo.png'); ?><?php endif; ?>);"></div>
                </a>
				<div id="title">
                        <h1><?php $this->category() ?></h1>
                    </div>
                <div id="nav">
                    <ul>
                        <li class="icon">
                            <a href="#">
                                <i class="fa fa-bars fa-2x"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php $this->options->siteUrl();?>">首页</a>
                        </li>
                        <?php $this->widget('Widget_Contents_Page_List')->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
                        <?php if($this->options->github): ?>
						<li>
                         <a href="<?php $this->options->github();?>" target="_blank">Github</a>
                        </li><?php endif; ?>
                    <!--</ul>
                    <br/>
                    <ul><li><b>分类：</b></li>-->
                        <?php $this->widget('Widget_Metas_Category_List')->to($categorys);while($categorys->next()):?>
                        <li><a href="<?php $categorys->permalink(); ?>" title="<?php $categorys->name(); ?>"><?php $categorys->name(); ?></a></li>
                        <?php endwhile;?>
                    </ul>
                </div>
            </header>			
            <!--<div id="theme-tagcloud" class="tagcloud-wrap">
			<?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=30')->to($tags); ?>
			<?php while($tags->next()): ?>
			<a style="font-size:<?php echo(rand(10, 24)); ?>px; text-transform:capitalize;" href="<?php $tags->permalink(); ?>" title="标签：“<?php $tags->name(); ?>”共<?php $tags->count(); ?> 篇文章"><?php $tags->name(); ?></a>
			<?php endwhile; ?>
            </div>-->
            <div class="content" style="border:1px dotted #ccc;border-radius: 8px;background-color: rgba(65,85,93,0.2);margin:1.5rem 0 1.5rem 0;padding:1rem;">	
            栏目“<?php echo $this->getArchiveTitle(); ?>”描述:<br/>
            <?php echo $this->getDescription(); ?>
            </div>				
            <section id="wrapper" class="home">
<span class="h2">栏目“<?php echo $this->getArchiveTitle(); ?>”下文章：</span>
                <div class="archive">
                    <ul class="post-list" id="post-list">
				 <?php while($this->next()): ?>
                        <li class="post-item"  style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;max-width:100%;">						
                            <div class="meta">							
                                <time datetime="<?php $this->date(); ?>" itemprop="datePublished"><?php $this->date('Y.n.j'); ?></time>
                            </div>							
                            <span  style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;width:780px;max-width:90%;">
                                <a href="<?php $this->permalink() ?>" target="_blank" title=""><?php $this->title() ?></a>								
                            </span>	
						    <span class="metatj"><a href="<?php $this->permalink() ?>#comments" target="_blank" title="">(<?php $this->commentsNum() ?>)</a></span>
                        </li>						
					 <?php endwhile; ?>					 
                    </ul>
                </div>
                <?php $this->pageNav('&#171', '&#187', '5', '……'); ?>			
            </section>
        </div>
 <?php $this->need('footer.php'); ?>