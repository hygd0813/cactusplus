<?php
/**
 * 微语·碎语
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
                    </ul>
                </div>
            </header>									
            <section id="wrapper" class="home">
                <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
                    <div class="content" itemprop="articleBody">
                        <?php parseContent($this); ?>
<!--内容页下方ads -->	 	 
<?php if($this->options->postdownads): ?> <?php $this->options->postdownads();?> <?php endif; ?>						
						<br/><center><?php echo GetHitokoto(); ?></center>
                    </div>						
                </article>
                 <?php $this->need('comments1.php'); ?>
            </section>
		</div>
 <?php $this->need('footer.php'); ?>