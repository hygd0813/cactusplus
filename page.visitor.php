<?php
/**
* 访客中心
*
* @package custom
*/
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
?>
<link rel="stylesheet" href="<?php cjUrl('css/comments.css'); ?>">
<link rel="stylesheet" href="<?php cjUrl('lib/OwO/OwO.min.css'); ?>">
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
            <div id="Links-mian" class="main_element">
                <section class="Links-content">
	                <div class="Total" style="margin:0.1rem;padding:10px;text-align: center;max-width: none;">
	                    哈喽，<?php if($this->user->hasLogin()): ?><?php echo $this->user->screenName() ; ?><?php else : ?><?php if($this->remember('author',true)): ?><?php echo $this->remember('author',true); ?><?php endif; ?><?php endif; ?>，我们又见面了啦！✌️
                    </div>
                </section>
            </div>
        </section>

        <section id="wrapper" class="home">
            <h3 style="color:#2bbc8a;"><?php _e('您近期的回复：'); ?></h3>
            <ul class="widget-list">
                
                <?php if($this->user->hasLogin()): ?>
                    <?php $userMail = $this->user->mail; ?>
                <?php else : ?>
                    <?php $userMail = $this->remember('mail',true); ?>
                <?php endif; ?>

                <?php $this->widget('Widget_Comments_RecentPlus', 'mail='.$userMail)->to($comments); ?>
                <?php while($comments->next()): ?>
                <li style="margin:1rem 0;">
                    <div class="d1">
                        <i class="fa fa-file-text-o"></i> <?php $comments->title(); ?><span class="qrcodeimg"style="float:right;"><?php $comments->dateWord(); ?></span>
                    </div></br>				
                    <div class="d2" style="border-bottom:1px;">
                        <i class="fa fa-comments-o"></i> 
                        <?php $comments->author(false); ?>    : <a href="<?php $comments->permalink(); ?>"><?php $comments->excerpt(64, '...'); ?></a>
                    </div>

                </li>
                <?php endwhile; ?>
            </ul>
        </section>
<!--内容页下方ads -->	 	 
<?php if($this->options->postdownads): ?> <?php $this->options->postdownads();?> <?php endif; ?>		
    </div>
</body>
<?php $this->need('footer.php'); ?>