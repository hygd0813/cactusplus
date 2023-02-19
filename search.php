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
                        <h1><?php $this->options->title(); ?></h1>
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
                    <ul><li><b>文章分类&nbsp;：&nbsp;</b></li>-->
                        <?php $this->widget('Widget_Metas_Category_List')->to($categorys);while($categorys->next()):?>
                        <li><a href="<?php $categorys->permalink(); ?>" title="<?php $categorys->name(); ?>"><?php $categorys->name(); ?></a></li>
                        <?php endwhile;?>
                    </ul>
                </div>
            </header>
            <section id="wrapper" class="home">
                
                <section id="writing">
                    <span class="h1">
                        <?php $this->archiveTitle(array('search'  =>  _t('包含关键字“ %s ”的文章'),), '', ''); ?>
                    </span>
                    <ul class="post-list" id="post-list">
					 <?php if ($this->have()): ?>
					<?php while($this->next()): ?>
                        <li class="post-item" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;max-width:100%;">
                            <div class="meta">
                                <time datetime="<?php $this->date(); ?>" itemprop="datePublished"><?php $this->date('Y.n.j'); ?></time>
                            </div>
                            <span style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;width:780px;max-width:90%;">
                                <a href="<?php $this->permalink() ?>" target="_blank" title=""><?php $this->title() ?></a>
                            </span>
							<span class="metatj"><a href="<?php $this->permalink() ?>#comments" target="_blank" title="">(<?php $this->commentsNum() ?>)</a></span>
                        </li>
					 <?php endwhile; ?>
					 <?php else: ?>
            <h2>没有找到相关内容</h2>
            
        <?php endif; ?>
                    </ul>
                </section>
                 <?php $this->pageNav('&#171', '&#187', '5', '……'); ?>	                    
            </section>
        </div>
 <?php $this->need('footer.php'); ?>