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
                        <h1 style="color:#2bbc8a;margin:1rem;font-size:36px;line-height:42px;"><?php $this->category() ?></h1>
                    </div>
                <div id="nav">
                    <ul>
                        <li class="icon">
                            <a href="#">
                                <i class="fa fa-bars fa-2x"></i>
                            </a>
                        </li>
                        <li>
                            <b><a href="<?php $this->options->siteUrl();?>">首页</a></b>
                        </li>
                        <?php $this->widget('Widget_Contents_Page_List')->parse('<li><b><a href="{permalink}">{title}</a></b></li>'); ?>
                        <?php $this->widget('Widget_Metas_Category_List')->to($categorys);while($categorys->next()):?>
                        <li><b><a href="<?php $categorys->permalink(); ?>" title="<?php $categorys->name(); ?>"><?php $categorys->name(); ?></a></b></li>
                        <?php endwhile;?>
                        <li>
                            <b><a href="https://foreverblog.cn/go.html" rel="nofollow">虫洞</a></b>
                        </li>
                        <li>
                            <b><a href="https://www.travellings.cn/go.html" rel="nofollow">开往</a></b>
                        </li>                           
                    </ul>
                </div>
            </header>			
            <div class="content" style="border:1px dotted #ccc;border-radius: 8px;background-color: rgba(65,85,93,0.1);margin:1.5rem 0 1.5rem 0;padding:1rem;">	
            栏目“<?php echo $this->getArchiveTitle(); ?>”描述:<br/>
            <?php echo $this->getDescription(); ?>
            </div>	
            <div id="theme-tagcloud" class="tagcloud-wrap">
                 <h2> 热门标签 </h2>	
                 <?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=20')->to($tags); ?>
			     <?php while($tags->next()): ?>
			<a style="font-size:<?php echo(rand(12, 24)); ?>px; text-transform:capitalize;" href="<?php $tags->permalink(); ?>" title="标签：“<?php $tags->name(); ?>”共<?php $tags->count(); ?> 篇文章"><?php $tags->name(); ?></a>
			<?php endwhile; ?>         
            </div>
            <section id="wrapper" class="home">
                <h2>栏目“<?php echo $this->getArchiveTitle(); ?>”下文章：</h2>
<!--内容页下方ads -->	 	 
<?php if($this->options->postdownads): ?><?php $this->options->postdownads();?><?php endif; ?>               
                <div class="archive">
                    <ul class="post-list" id="post-list">
				 <?php while($this->next()): ?>
                        <li class="post-item"  style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;max-width:100%;">						
                            <div class="meta" style="border-radius: 5px;background-color: rgba(65,85,93,0.1);padding:1rem;">							
                                <time datetime="<?php $this->date(); ?>" itemprop="datePublished"><?php $this->date('Y.n.j'); ?></time>
                            </div>							
                            <span  style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;width:780px;max-width:90%;border-radius: 5px;background-color: rgba(65,85,93,0.1);padding:.5rem;">
                                <h4><a href="<?php $this->permalink() ?>" title=""><?php $this->title() ?></a></h4>								
                            </span>	
						    <span class="metatj" style="border-radius: 5px;background-color: rgba(65,85,93,0.1);padding:.5rem;"><a href="<?php $this->permalink() ?>#comments" target="_blank" title="">(<?php $this->commentsNum() ?>)</a></span>
                        </li>	
						<div style="color:#666;margin:10px 0 18px 0;padding:10px 0 18px 0;border-bottom:1px dotted #ccc;">
						     <span ><?php $this->description(); ?></span>
						     <span style="float:right;"><small><a href="<?php $this->permalink() ?>" title="">阅读全文...</a></small></span>
						</div>						
					 <?php endwhile; ?>					 
                    </ul>
<!--文章列表页、页面ads -->	 	 
<?php if($this->options->listpageads): ?><?php $this->options->listpageads();?><?php endif; ?>	 
                </div>
                <?php $this->pageNav('&#171', '&#187', '5', '…'); ?>			
            </section>
        </div>
 <?php $this->need('footer.php'); ?>