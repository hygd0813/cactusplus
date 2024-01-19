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
    
<style>
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview {
  display: flex !important;
  flex-direction: column !important;
  justify-content: center !important;
  margin-top: 30px !important;
  padding: clamp(17px, 5%, 40px) clamp(17px, 7%, 50px) !important;
  max-width: none !important;
  border-radius: 6px !important;
  box-shadow: 0 5px 25px rgba(34, 60, 47, 0.25) !important;
}
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview,
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview *{
  box-sizing: border-box !important;
}
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview .preview-heading {
  width: 100% !important;
}
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview .preview-heading h5{
  margin-top: 0 !important;
  margin-bottom: 0 !important;
}
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview .preview-input-field {
  margin-top: 20px !important;
  width: 100% !important;
}
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview .preview-input-field input {
  width: 100% !important;
  height: 40px !important;
  border-radius: 6px !important;
  border: 2px solid #e9e8e8 !important;
  background-color: #fff !important;
  outline: none !important;
}
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview .preview-input-field input {
  color: #000000 !important;
  font-family: "Montserrat" !important;
  font-size: 14px !important;
  font-weight: 400 !important;
  line-height: 20px !important;
  text-align: center !important;
}
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview .preview-input-field input::placeholder {
  color: #000000 !important;
  opacity: 1 !important;
}

.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview .preview-input-field input:-ms-input-placeholder {
  color: #000000 !important;
}

.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview .preview-input-field input::-ms-input-placeholder {
  color: #000000 !important;
}
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview .preview-submit-button {
  margin-top: 10px !important;
  width: 100% !important;
}
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview .preview-submit-button button {
  width: 100% !important;
  height: 40px !important;
  border: 0 !important;
  border-radius: 6px !important;
  line-height: 0px !important;
}
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview .preview-submit-button button:hover {
  cursor: pointer !important;
}
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .powered-by-line {
  color: #231f20 !important;
  font-family: "Montserrat" !important;
  font-size: 13px !important;
  font-weight: 400 !important;
  line-height: 25px !important;
  text-align: center !important;
  text-decoration: none !important;
  display: flex !important;
  width: 100% !important;
  justify-content: center !important;
  align-items: center !important;
  margin-top: 10px !important;
}
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .powered-by-line img {
  margin-left: 10px !important;
  height: 1.13em !important;
  max-height: 1.13em !important;
}
</style><div class="followit--follow-form-container" attr-a attr-b attr-c attr-d attr-e attr-f><form data-v-1bbcb9ec="" action="https://api.follow.it/subscription-form/SFBkSys2Mm94QnFCdHVFV2hjN1IwNDNIemx3OE5UdWVER1djcWYvSGUxemdLalBGRU4wY3pqck9qNk9DeEhUbnhraUVFR0lIUG1RYnNVZmlCYzBzQmlrY1ZZUUR3ZnJ3N2dvQUdlTXZmVGtwQmVLa1JubzNKM01oUjgwZ2VUdjN8Z2lIRFI3T0FFaW9LU0YrRzRyWm1CVjhlNko0d1h3K1d6UnVtMzhNSllodz0=/8" method="post"><div data-v-1bbcb9ec="" class="form-preview" style="background-color: rgb(67, 67, 67); position: relative;"><div data-v-1bbcb9ec="" class="preview-heading"><h5 data-v-1bbcb9ec="" style="text-transform: none !important; font-family: Arial; font-weight: bold; color: rgb(183, 181, 181); font-size: 16px; text-align: center;" _msttexthash="82650399" _msthash="3440">订阅本站，随时关注最新动态！</h5></div> <div data-v-1bbcb9ec="" class="preview-input-field"><input data-v-1bbcb9ec="" type="email" name="email" required="required" placeholder="请输入邮箱地址" spellcheck="false" _mstplaceholder="26120809" _msthash="3396" style="text-transform: none !important; font-family: Arial; font-weight: normal; color: rgb(0, 0, 0); font-size: 14px; text-align: center; background-color: rgb(255, 255, 255);"></div> <div data-v-1bbcb9ec="" class="preview-submit-button"><button data-v-1bbcb9ec="" type="submit" style="text-transform: none !important; font-family: Arial; font-weight: bold; color: rgb(255, 255, 255); font-size: 16px; text-align: center; background-color: rgb(0, 0, 0);" _msttexthash="15698254" _msthash="3441">确认订阅</button></div></div></form></div> 
    
<br>  
<!--内容页下方ads -->	 	 
<?php if($this->options->postdownads): ?><?php $this->options->postdownads();?><?php endif; ?>  		
  
                 <?php $this->need('comments.php'); ?>
             </section>
        </div>
		</div>
 <?php $this->need('footer.php'); ?>