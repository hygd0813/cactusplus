<?php
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
                        <li>
                            <b><a href="https://foreverblog.cn/go.html" rel="nofollow">虫洞</a></b>
                        </li>
                        <li>
                            <b><a href="https://www.travellings.cn/go.html" rel="nofollow">开往</a></b>
                        </li>                           
                    </ul>
                </div>
            </header>
        <div class="content index width mx-auto px3 my3">
            <section id="wrapper" class="home">
                <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
                   
                    <div class="content" itemprop="articleBody">
                        <?php parseContent($this); ?>
                <?php if ($this->attachment->isImage): ?>
                        <p><h3>图片描述：</h3><br/><span style="padding-left:40px;"><?php $this->attachment->description();?></span></p>
                <?php endif; ?>
<!--文章列表页、页面ads -->	 	 
<?php if($this->options->listpageads): ?> <?php $this->options->listpageads();?> <?php endif; ?>				
                    </div>
                </article>
                 <?php $this->need('comments.php'); ?>
            </section>
        </div>
		</div>
 <?php $this->need('footer.php'); ?>