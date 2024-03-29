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
                        <h1 style="color:#2bbc8a;margin:1rem;font-size:36px;line-height:42px;"><?php $this->title() ?></h1>
                    </div>
                </a>
                <div id="nav">
                 <ul style ="padding-inline-start:0px;">
                    <li class="icon"><a href="#"><i class="fa fa-bars fa-2x"></i></a></li>
                    <li style ="padding:0px;margin:0px;"><b><a href="<?php $this->options->siteUrl();?>">首页</a></b></li>
                    <li style ="padding:0 0 0 5px;margin:0px;"><b><a href="<?php $this->options->siteUrl();?>music/" target="_blank" title="网易云音乐">音乐</a></b></li>
                    <?php $this->widget('Widget_Metas_Category_List')->to($categorys);while($categorys->next()):?>
                    <li style ="padding:0 0 0 5px;margin:0px;"><b><a href="<?php $categorys->permalink(); ?>"><?php $categorys->name(); ?></a></b></li>
                    <?php endwhile;?>                    				
                    <?php $this->widget('Widget_Contents_Page_List')->parse('<li  style ="padding:0 0 0 5px;margin:0px;"><b><a href="{permalink}">{title}</a></b></li>'); ?>
                    <li class="tooltip" data-msg="随机访问一位“十年之约”博友！" style ="padding:0 0 0 5px;margin:0px;"><b><a href="https://foreverblog.cn/go.html" rel="nofollow" target="_blank">虫洞</a></b></li>
                    <li class="tooltip" data-msg="随机访问一位“开往”博友！" style ="padding:0 0 0 5px;margin:0px;"><b><a href="https://www.travellings.cn/go.html" rel="nofollow" target="_blank">开往</a></b></li>                       
                 </ul>
                </div>
            </header>
        <div class="content index width mx-auto px3 my3">
            <section id="wrapper" class="home">      
<!-- 读者墙 -->
<section class="FriendWall p05">
<h3 class="panel" style="color:#2bbc8a;">读者墙<span style="float:right;padding-top:20px;font-size:10px;color:#666;"><i class="fa fa-bell-o" style="padding-right:5px;color:orange;"></i>你的热情，我铭记于心</span></h3></br>
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
->limit(15)
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
</section><hr/>
<!-- 走心评论 -->
<h3 class="panel" style="color:#2bbc8a;">走心留言<span style="float:right;padding-top:20px;font-size:10px;color:#666;"><i class="fa fa-bell-o" style="padding-right:5px;color:orange;"></i>你说过的，我都记得</span></h3>
     <ol>
         <?php		 
            $coid = Helper::options()->commentszx;			
            $arr = explode(',',$coid);
            foreach ($arr as $value){
                $db = Typecho_Db::get();
                $select = $db->select()->from('table.comments')->where('coid = ?', $value)->limit(1);
                $result = $db->fetchAll($select);
                foreach ($result as $res){
                    $id = $res['cid'];
                    if($id){
                        $getid = explode(',',$id);
                        $resu = $db->fetchAll($db->select()->from('table.contents')
                            ->where('cid in ?',$getid)
                            ->order('cid', Typecho_Db::SORT_DESC));
                        foreach($resu as $val){
                            $val = Typecho_Widget::widget('Widget_Abstract_Contents')->push($val);
                            $post_titles = htmlspecialchars($val['title']);
                            $permalinks = $val['permalink'];
                            }
                    }
                    echo '<li><p>';
                            echo '<span style="padding:5px 15px;color:#f8f8f5">' . $res['author'] .' ：</span><a href="'.$permalinks .'#'.$res['type'].'-'. $value .'" target="_blank">' . $res['text'] . '</a><span style="float:right;"><small>';
                            echo date('Y-n-j H:i',  $res['created']);
                    echo '</small></span></p></li>';
                }
            }
         ?>
	</ol><hr/>	      
          
<!-- 全站最新5条留言 -->
<h3 class="panel" style="color:#2bbc8a;">最新留言<span style="float:right;padding-top:20px;font-size:10px;color:#666;"><i class="fa fa-bell-o" style="padding-right:5px;color:orange;"></i>最新 5 条留言</h3>
<ol><?php $this->widget('Widget_Comments_Recent','pageSize=5&ignoreAuthor=true')->parse('<li><p><span style="padding:5px 15px;color:#f8f8f5;"> {author} : </span> <a href="{permalink}" style="text-decoration:none;" title="点击查看“{author}”在《{title}》的留言">{text}</a><span style="float:right;"><small> {dateWord}</small></span></p></li>'); ?></ol><hr/>       
                <article class="post" itemscope itemtype="http://schema.org/BlogPosting">                  
                    <div class="content" itemprop="articleBody">
                        <?php parseContent($this); ?>
                    </div>
                </article>
  
<!--内容页下方ads -->	 	 
<?php if($this->options->postdownads): ?><?php $this->options->postdownads();?><?php endif; ?>  		
  
                 <?php $this->need('comments.php'); ?>
             </section>
        </div>
		</div>
 <?php $this->need('footer.php'); ?>