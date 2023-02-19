<?php
/**
 * 留言·访客
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
                        <h1><?php $this->title() ?></h1>
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
                        <?php if($this->options->github): ?>
						<li>
                         <b><a href="<?php $this->options->github();?>" target="_blank">Github</a></b>
                        </li><?php endif; ?>
                    <!--</ul>
                    <br/>
                    <ul><li><b>分类：</b></li>-->
					<li><b><a href="https://www.80srz.com/125.html" target="_blank" title="">关于</a></b></li>
                        <?php $this->widget('Widget_Metas_Category_List')->to($categorys);while($categorys->next()):?>
                        <li><b><a href="<?php $categorys->permalink(); ?>" title="<?php $categorys->name(); ?>"><?php $categorys->name(); ?></a></b></li>
                        <?php endwhile;?>
                    </ul>
                </div>
            </header>
        <div class="content index width mx-auto px3 my3">
            <section id="wrapper" class="home">

<!-- 读者墙 -->
<section class="FriendWall p05">
<h3 class="panel" style="color:#2bbc8a;">读者榜</h3>
<div class="row FriendWall-warpper flexbox" style="margin-right: 0;margin-left: 0;">
<?php
$period = time() - 999592000; // 時段: 30 天, 單位: 秒
$counts = Typecho_Db::get()->fetchAll(Typecho_Db::get()
->select('COUNT(author) AS cnt','author', 'url', 'mail')
->from('table.comments')
->where('created > ?', $period )
->where('status = ?', 'approved')
->where('type = ?', 'comment')
->where('authorId = ?', '0')
->group('author')
->order('cnt', Typecho_Db::SORT_DESC)
->limit(30)
);
$mostactive = '';
$avatar_path = 'https://cravatar.cn/avatar/';
foreach ($counts as $count) {
  $avatar = $avatar_path . md5(strtolower($count['mail'])) . '.jpg';
  $c_url = $count['url']; if ( !$c_url ) $c_url = Helper::options()->siteUrl;
  $mostactive .= "<div class='flex-20 FriendWall_a' name='FriendWall_a'><li><a href='" . $c_url . "' title='" . $count['author'] . "' target='_blank' rel='nofollow' class='FriendWall_a'><i>" . $count['cnt'] . "</i><img src='" . $avatar . "' alt='" . $count['author'] . "的头像' class='FriendWall_img' width='80px' height='80px'/><span class='FriendWall_span'>" . $count['author'] . "</span></a></li></div>\n";
}
echo $mostactive; ?>
</div>
</section>
				
<!-- 全站最新30条留言 -->
<h3 class="panel" style="color:#2bbc8a;">最新留言</h3>
<ol><?php $this->widget('Widget_Comments_Recent','pageSize=10&ignoreAuthor=true')->parse('<li><span style="padding:5px 15px;color:#f8f8f5">{author} ：</span><a href="{permalink}">{text}</a><span style="float:right;"><small>{dateWord}</small></span></li><br/>'); ?></ol><hr/>

                <article class="post" itemscope itemtype="http://schema.org/BlogPosting">                  
                    <div class="content" itemprop="articleBody">
                        <?php parseContent($this); ?>
                    </div>
                </article>
				
                 <?php $this->need('comments.php'); ?>

             </section>
        </div>
		</div>
 <?php $this->need('footer.php'); ?>