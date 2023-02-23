<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
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
					<span class="vnick"><?php $comments->author(); ?></span>
				</div>
				<div class="vmeta" >
					<span class="vtime"><i class="fa fa-clock-o" aria-hidden="true">&nbsp;&nbsp;</i><?php $comments->dateWord(); ?></span>
					<span class="vtime"><i class="fa fa-map-marker" aria-hidden="true">&nbsp;&nbsp;</i><?php echo convertip($comments->ip); ?></span>	
                  	<div class="right vat">
    <!-- 评论点赞次数 -->
    <?php 
        $commentLikes =commentLikesNum($comments->coid); 
        $commentLikesNum = $commentLikes['likes'];
        $commentLikesRecording= $commentLikes['recording'];
    ?>
    <div class="commentLike">
        <a class="commentLikeOpt" id="commentLikeOpt-<?php $comments->coid(); ?>" href="javascript:;" data-coid="<?php $comments->coid() ?>" data-recording="<?php echo $commentLikesRecording; ?>">
        <i id="commentLikeI-<?php $comments->coid(); ?>" class="<?php echo $commentLikesRecording?'fa fa-heart':'fa fa-heart-o'; ?>"></i>
        <span id="commentLikeSpan-<?php $comments->coid(); ?>"><?php echo $commentLikesNum ?></span>
        </a>
    </div>
</div>	
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
				<a href="https://www.80srz.com/175.html" target="_blank"><svg class="markdown" viewbox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M14.85 3H1.15C.52 3 0 3.52 0 4.15v7.69C0 12.48.52 13 1.15 13h13.69c.64 0 1.15-.52 1.15-1.15v-7.7C16 3.52 15.48 3 14.85 3zM9 11H7V8L5.5 9.92 4 8v3H2V5h2l1.5 2L7 5h2v6zm2.99.5L9.5 8H11V5h2v3h1.5l-2.51 3.5z"></path></svg></a>
				<a href="https://imgchr.com/upload" target="_blank" title="本站评论支持图片 html 和 Markdown 格式"><svg width="24" height="14" xmlns="http://www.w3.org/2000/svg"><text x="50%" y="50%" font-size="10" fill="#a2a9b6" fill-opacity="0.9" text-anchor="middle" dominant-baseline="middle">图片</text></svg></a>				
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
			共发布<span class="vnum" style="color:#2bbc8a;">  <?php $this->commentsNum('%d'); ?></span>  条微语&nbsp;&nbsp;， &nbsp;共&nbsp;<span class="vnum" style="color:#2bbc8a;"><?php Postviews($this); ?></span>&nbsp;&nbsp;次围观
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
	<?php $comments->pageNav('&#171', '&#187', '3', '……'); ?>			
</div>
	<script type="text/javascript">
function showhidediv(id){var sbtitle=document.getElementById(id);if(sbtitle){if(sbtitle.style.display=='flex'){sbtitle.style.display='none';}else{sbtitle.style.display='flex';}}}
(function(){window.TypechoComment={dom:function(id){return document.getElementById(id)},pom:function(id){return document.getElementsByClassName(id)[0]},iom:function(id,dis){var alist=document.getElementsByClassName(id);if(alist){for(var idx=0;idx<alist.length;idx++){var mya=alist[idx];mya.style.display=dis}}},create:function(tag,attr){var el=document.createElement(tag);for(var key in attr){el.setAttribute(key,attr[key])}return el},reply:function(cid,coid){var comment=this.dom(cid),parent=comment.parentNode,response=this.dom("<?php echo $this->respondId(); ?>"),input=this.dom("comment-parent"),form="form"==response.tagName?response:response.getElementsByTagName("form")[0],textarea=response.getElementsByTagName("textarea")[0];if(null==input){input=this.create("input",{"type":"hidden","name":"parent","id":"comment-parent"});form.appendChild(input)}input.setAttribute("value",coid);if(null==this.dom("comment-form-place-holder")){var holder=this.create("div",{"id":"comment-form-place-holder"});response.parentNode.insertBefore(holder,response)}comment.appendChild(response);this.iom("comment-reply","");this.pom("cp-"+cid).style.display="none";this.iom("cancel-comment-reply","none");this.pom("cl-"+cid).style.display="";if(null!=textarea&&"text"==textarea.name){textarea.focus()}return false},cancelReply:function(){var response=this.dom("<?php echo $this->respondId(); ?>"),holder=this.dom("comment-form-place-holder"),input=this.dom("comment-parent");if(null!=input){input.parentNode.removeChild(input)}if(null==holder){return true}this.iom("comment-reply","");this.iom("cancel-comment-reply","none");holder.parentNode.insertBefore(response,holder);return false}}})();
</script>
	<script src="<?php $this->options->themeUrl('lib/OwO/OwO.min.js'); ?>"></script>
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

  <script>
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
                    behavior:'dz'
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
                            $('#commentLikeI-'+coid).removeAttr("class","fa fa-heart-o")
                            $('#commentLikeI-'+coid).attr("class","fa fa-heart")
                            //设置recording的属性值
                            $('#commentLikeI-'+coid).parent().attr("data-recording","1");
                        }
                        
                    }
                },
                error: function(err) {}
            });
            
        })
</script>        
