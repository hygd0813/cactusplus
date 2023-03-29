<?php 
require_once 'UserAgent.php';
if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
?>
<link rel="stylesheet" href="<?php cjUrl('css/comments.css'); ?>">
<link rel="stylesheet" href="<?php cjUrl('lib/OwO/OwO.min.css'); ?>">
<?php 
function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>
<?php
            $host = 'https://cravatar.cn'; 
            $url = '/avatar/'; 
            $rating = Helper::options()->commentsAvatarRating;
            $hash = md5(strtolower($comments->mail));
			$email = strtolower($comments->mail);
			$qq=str_replace('@qq.com','',$email);
			if(strstr($email,"qq.com") && is_numeric($qq) && strlen($qq) < 11 && strlen($qq) > 4)
			{
			$avatar = '//q3.qlogo.cn/g?b=qq&nk='.$qq.'&s=100';
			}else{
			  $avatar = $host . $url . $hash . '?s=50' . '&r=' . $rating . '&d=mm';
			}       
            ?>	
		<div class="vcard" id="<?php $comments->theId(); ?>">
			<img class="vimg" src="<?php echo $avatar ?>" alt="" />
			<div class="vh">
				<div class="vhead">
					 <span class="vnick"><?php $comments->author(); ?></span><span title="很帅的博主" style="background:#2bbc8a;padding:2px 5px 0 5px;font-size: 12px;border-radius: 3px;margin-left:0;">博主<i title="很帅的博主" class="fa fa-diamond" aria-hidden="true" style="color:orange"></i> </span>
                  	 <div class="right vat">
                    <!-- 评论点赞次数 -->
                         <?php 
                             $commentLikes =commentLikesNum($comments->coid); 
                             $commentLikesNum = $commentLikes['likes'];
                             $commentLikesRecording= $commentLikes['recording'];
                         ?>
                         <div class="commentLike">
                             <a class="commentLikeOpt" id="commentLikeOpt-<?php $comments->coid(); ?>" href="javascript:;" data-coid="<?php $comments->coid() ?>" data-recording="<?php echo $commentLikesRecording; ?>" style="font-size:12px;">
                                 <i id="commentLikeI-<?php $comments->coid(); ?>" class="<?php echo $commentLikesRecording?'fa fa-heart':'fa fa-heart-o'; ?>"></i>
                                 <span id="commentLikeSpan-<?php $comments->coid(); ?>"><?php echo $commentLikesNum ?></span>
                             </a>
                         </div>
                     </div>					
				</div>
				<div class="vmeta" >
					<span class="vtime"><i class="fa fa-clock-o" aria-hidden="true">&nbsp;&nbsp;</i><?php $comments->dateWord(); ?></span>
					<span class="vtime"><i class="fa fa-map-marker" aria-hidden="true">&nbsp;&nbsp;</i><?php echo convertip($comments->ip); ?></span>	
                    <?php $ua = new UserAgent($comments->agent);?>
					<span class="vtime qrcodeimg"><i class="fa fa-send" aria-hidden="true">&nbsp;&nbsp;</i><?php echo "发自" . $ua->returnTimeUa()['title'];?></span>            
				<div class="vcontent">
					 <?php $parentMail = get_comment_at($comments->coid)?><?php echo $parentMail;?>
					 <?php $comments->content(); ?>
				</div>	
			</div>
		</div>
		<?php if ($comments->children) { ?>
		<?php $comments->threadedComments($options); ?>
		<?php } ?>
<?php } ?>
<?php $this->comments()->to($comments); ?>
<?php if($this->allow('comment')): ?>	
<div class="blog-post-comments v" id="comments">
<div class="blog-post-comments v" id="<?php $this->respondId(); ?>">
<?php if($this->user->hasLogin()): ?>
<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form">
	<?php _e('登录身份: '); ?><h5><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></h5>
		<div class="vwrap">
<div class="vedit">
			<textarea  name="text" id="veditor" class="OwO-textarea veditor vinput" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('misubmit').click();return false};" placeholder="今天又想哔哔点啥呢 ？"><?php $this->remember('text'); ?></textarea>
			<div class="vrow"><div class="vcol vcol-60 status-bar"></div><div class="vcol vcol-40 vctrl text-right"><div title="表情" class="OwO"></div></div></div>
		</div>
		<div class="vcontrol">
			<div class="col col-20" title="Markdown is supported">
				<button type="button" data-chevereto-pup-trigger data-target="#veditor" title="评论支持图片 <img>标签" style="padding:0 8px 0 8px;border:none;border-radius:5px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path fill="none" d="M0 0h24v24H0z"/><path d="M21 15v3h3v2h-3v3h-2v-3h-3v-2h3v-3h2zm.008-12c.548 0 .992.445.992.993v9.349A5.99 5.99 0 0 0 20 13V5H4l.001 14 9.292-9.293a.999.999 0 0 1 1.32-.084l.093.085 3.546 3.55a6.003 6.003 0 0 0-3.91 7.743L2.992 21A.993.993 0 0 1 2 20.007V3.993A1 1 0 0 1 2.992 3h18.016zM8 7a2 2 0 1 1 0 4 2 2 0 0 1 0-4z" fill="rgba(102,102,102,1)"/></svg></button>          				
			</div>
			<div class="col col-80 text-right">
			<!--<?php spam_protection_math();?>-->
			<button type="submit" title="Cmd|Ctrl+Enter" class="vsubmit vbtn" id="misubmit">发表</button>
			<?php $security = $this->widget('Widget_Security'); ?>			
			</div>
		</div>		
		<div style="display:none;" class="vmark">
		</div>
	</div>	
	</form>
<?php endif; ?>	
	</div>
	<?php if($this->commentsNum!=0): ?>
	<div class="vinfo" style="display:block;">
		<div class="vcount col">
			共发布<span class="vnum" style="color:#2bbc8a;">  <?php $this->commentsNum('%d'); ?></span>  条微语&nbsp;&nbsp;， &nbsp;引来&nbsp;<span class="vnum" style="color:#2bbc8a;"><?php Postviews($this); ?></span>&nbsp;&nbsp;次围观
		</div>                                                                   
	</div>
	<?php else: ?>
	<div class="vempty" style="display:block;">快来做第一个评论的人吧~</div>
	<?php endif; ?>
	<div class="vlist">
	<?php if ($comments->have()): ?>
	<?php $comments->listComments(); ?>
	<?php endif; ?>
	</div>
<!--文章列表页、页面ads -->	 	 
<?php if($this->options->listpageads): ?> <?php $this->options->listpageads();?> <?php endif; ?>	
	<?php $comments->pageNav('&#171', '&#187', '5', '…'); ?>			
</div>
	<script type="text/javascript">
function showhidediv(id){var sbtitle=document.getElementById(id);if(sbtitle){if(sbtitle.style.display=='flex'){sbtitle.style.display='none';}else{sbtitle.style.display='flex';}}}
(function(){window.TypechoComment={dom:function(id){return document.getElementById(id)},pom:function(id){return document.getElementsByClassName(id)[0]},iom:function(id,dis){var alist=document.getElementsByClassName(id);if(alist){for(var idx=0;idx<alist.length;idx++){var mya=alist[idx];mya.style.display=dis}}},create:function(tag,attr){var el=document.createElement(tag);for(var key in attr){el.setAttribute(key,attr[key])}return el},reply:function(cid,coid){var comment=this.dom(cid),parent=comment.parentNode,response=this.dom("<?php echo $this->respondId(); ?>"),input=this.dom("comment-parent"),form="form"==response.tagName?response:response.getElementsByTagName("form")[0],textarea=response.getElementsByTagName("textarea")[0];if(null==input){input=this.create("input",{"type":"hidden","name":"parent","id":"comment-parent"});form.appendChild(input)}input.setAttribute("value",coid);if(null==this.dom("comment-form-place-holder")){var holder=this.create("div",{"id":"comment-form-place-holder"});response.parentNode.insertBefore(holder,response)}comment.appendChild(response);this.iom("comment-reply","");this.pom("cp-"+cid).style.display="none";this.iom("cancel-comment-reply","none");this.pom("cl-"+cid).style.display="";if(null!=textarea&&"text"==textarea.name){textarea.focus()}return false},cancelReply:function(){var response=this.dom("<?php echo $this->respondId(); ?>"),holder=this.dom("comment-form-place-holder"),input=this.dom("comment-parent");if(null!=input){input.parentNode.removeChild(input)}if(null==holder){return true}this.iom("comment-reply","");this.iom("cancel-comment-reply","none");holder.parentNode.insertBefore(response,holder);return false}}})();
</script>
	<script src="<?php cjUrl('lib/OwO/OwO.min.js'); ?>"></script>
	<script type="text/javascript">
//OwO
var OwO_winds = new OwO({
    logo: '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>',
    container: document.getElementsByClassName('OwO')[0],
    target: document.getElementsByClassName('OwO-textarea')[0],
    api: '<?php if ($this->options->Emoji == 'able'): ?><?php $this->options->themeUrl('lib/OwO/OwO.json'); ?><?php else: ?><?php $this->options->themeUrl('lib/OwO/OwOmini.json'); ?><?php endif; ?>',
    position: 'down',
    width: '100%',
    maxHeight: '250px'
});</script>
<?php endif; ?>

  <script type="text/javascript">
    $(".vlist").on('click', "a[id^='commentLikeOpt']", function() {
    //$(".commentLikeOpt").click(function(){
        
           var coid = $(this).data("coid");
           var recording = $(this).attr("data-recording");
           
           if(recording){
               alert("你已经点过赞啦！感谢你的喜爱！");
               return;
           }
           

            $.ajax({
                url: "?commentLike",
                type: "POST",
                data: {
                    coid:coid,
                    behavior:'dz',
                },
                async: true,
                dataType: "json",
                success: function(data) {
                    if (data == null) {} else {
                        console.log(data);
                        
                        if(data.state == 'success'){
                            alert("点赞成功");
                            //修改点赞数量
                            $('#commentLikeSpan-'+coid).html(data.num);
                            //变更点赞图标样式
                            $('#commentLikeI-'+coid).removeAttr("class","fa fa-heart-o");
                            $('#commentLikeI-'+coid).attr("class","fa fa-heart");
                            //设置recording的属性值
                            $('#commentLikeI-'+coid).parent().attr("data-recording","1");
                        }
                        
                    }
                },
                error: function(err) {}
            });
            
        })
</script>             
