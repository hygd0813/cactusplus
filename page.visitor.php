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
                     <div id="logo" style="background-image: url(<?php if($this->options->logoimg): ?><?php $this->options->logoimg();?><?php else : ?><?php cjUrl('images/logo.png'); ?><?php endif; ?>);"></div>
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

        <section id="wrapper" class="home">
            <div id="Links-mian" class="main_element">
                <section class="Links-content">
	                <div class="Total" style="margin:0.1rem;padding:10px;text-align: center;max-width: none;">
	                    哈喽，<?php if($this->user->hasLogin()): ?><small style="color:orange">「</small><?php echo $this->user->screenName() ; ?><small style="color:orange">」</small><?php else : ?><?php if($this->remember('author',true)): ?><small style="color:orange">「</small><?php echo $this->remember('author',true); ?><small style="color:orange">」</small><?php endif; ?><?php endif; ?>，我们又见面了啦！✌️
                    </div>
                </section>
            </div>
        </section>

        <section id="wrapper" class="home">
            <h3 style="color:#2bbc8a;"><?php _e('您近期的回复：'); ?></h3>
            <ol class="widget-list">
                
                <?php if($this->user->hasLogin()): ?>
                    <?php $userMail = $this->user->mail; ?>
                <?php else : ?>
                    <?php $userMail = $this->remember('mail',true); ?>
                <?php endif; ?>

                <?php $this->widget('Widget_Comments_RecentPlus', 'mail='.$userMail)->to($comments); ?>
                <?php while($comments->next()): ?>
                <li style="margin:1rem 0;border-bottom:1px dashed;">
                    <div class="d1">
                        <i class="fa fa-file-text-o">&nbsp;&nbsp;</i> <?php $comments->title(); ?><span class="qrcodeimg"style="float:right;"><?php $comments->dateWord(); ?></span>
                    </div></br>				
                    <div class="d2">
                        <i class="fa fa-comments-o">&nbsp;&nbsp;</i> 
                        <?php $comments->author(false); ?>    : <a href="<?php $comments->permalink(); ?>" style="text-decoration:none;"><?php $comments->excerpt(64, '...'); ?></a>
                    </div>

                </li>
                <?php endwhile; ?>
            </ol>
        </section>
<!--列表页、页面ads -->	 	 
<?php if($this->options->listpageads): ?> <?php $this->options->listpageads();?> <?php endif; ?>		
    </div>
</body>
<?php $this->need('footer.php'); ?>