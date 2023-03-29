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
	$email = strtolower($comments->mail);
	$address = strtolower(trim($email) );
    $hash    = md5($address );
	$avatar = 'https://cravatar.cn/avatar/'.$hash.'.png?s=100' . '&d=retro' . '&r=y';			       
?>
		<div class="vcard " id="<?php $comments->theId(); ?>" style="padding-right:.5rem;">
			<img class="vimg" src="<?php echo $avatar ?>" alt="" />
			<div class="vh">
				<div class="vhead">
					<?php $commentApprove = commentApprove($comments, $comments->mail); ?>
<span class="vnick"><a href="<?php $comments->url(); ?>" title="<?php echo $commentApprove['userDesc'] ?>" rel="external nofollow noopener noreferrer" target="_blank"><?php $comments->author(false); ?>
        <span class="isauthor" title="Author">
            <span title="<?php echo $commentApprove['userDesc'] ?>" style="background:<?php echo $commentApprove['bgColor'] ?>;padding:1px 5px 1px 5px;font-size:12px;border-radius: 3px;margin-left:5px;"><?php echo $commentApprove['userLevel'] ?><?php if ($commentApprove['isAuthor'] == 1){ ;?>
                <i title="<?php echo $commentApprove['userDesc'] ?>" class="fa fa-diamond" aria-hidden="true" style="color:orange;"></i>
            <?php } ?>
<?php if ($commentApprove['userLevel'] == '基佬'){ ;?>
                <i title="<?php echo $commentApprove['userDesc'] ?>" class="fa fa-diamond" aria-hidden="true" style="color:orange;"></i>
            <?php } ?></span>
</span>
        </span></a>

	</span><small style="margin-left:5px;"><?php $parentMail = get_comment_at($comments->coid);?><?php $parentMail ;?></small> 
              </div>
				<div class="vmeta" >
					<span class="vtime"><i class="fa fa-clock-o" aria-hidden="true">&nbsp;&nbsp;</i><?php $comments->dateWord(); ?></span>
					<span class="vtime"><i class="fa fa-map-marker" aria-hidden="true">&nbsp;&nbsp;</i><?php echo convertip($comments->ip); ?></span>	
                    <?php $ua = new UserAgent($comments->agent);?>
					<span class="vtime qrcodeimg"><i class="fa fa-send" aria-hidden="true">&nbsp;&nbsp;</i><?php echo "发自" . $ua->returnTimeUa()['title'];?></span>
					<span class="vat comment-reply cp-<?php $comments->theId(); ?> text-muted comment-reply-link" style="padding-right:.5rem;"><?php $comments->reply('回复'); ?></span><span id="vat cancel-comment-reply" class="cancel-comment-reply cl-<?php $comments->theId(); ?> text-muted comment-reply-link" style="padding-right:.5rem;display:none" ><?php $comments->cancelReply('取消'); ?></span>
				</div>
				<div class="vcontent">
<?php
     $db = Typecho_Db::get();
     $smyk=$db->fetchRow($db->select('mail')->from('table.comments')->where('coid = ?', $comments->parent)->limit(1));
     $smhf=$comments->mail;
     Typecho_Widget::widget('Widget_User')->to($user);
     if(strpos($comments->content,'私密#')==true){                   
     $ykmail=Typecho_Cookie::get('__typecho_remember_mail');
     if($smhf==$user->mail or $smhf==$ykmail or $user->group=='administrator' or $smyk['mail']==$ykmail and !empty($smyk['mail'])){
     $comments->content();
     }else{
     echo'该评论仅博主及评论双方可见！';
     }
     }else{
    echo  $comments->content();
}
?>
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
<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form">
	<?php if($this->user->hasLogin()): ?>
	<?php _e('登录身份: '); ?><h5><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></h5>
		<div class="vwrap">
		<?php else: ?>
		<div class="vwrap">
		<div class="vheader item3">
			<input name="author" placeholder="昵称（*）" class="vnick vinput" type="text" value="<?php $this->remember('author'); ?>" required><input name="mail" placeholder="邮箱（*）" class="vmail vinput" type="email" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?>><input name="url" placeholder="网址(http://)" class="vlink vinput" type="url" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?>>
						<input type="hidden" name="receiveMail" id="receiveMail" value="yes" />
		</div>
		<?php endif; ?>
		<div class="vedit">
			<textarea  name="text" id="veditor" class="OwO-textarea veditor vinput" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('misubmit').click();return false};" placeholder="大佬，请赐教！(👀了，就💌)"><?php $this->remember('text'); ?></textarea>
			<div class="vrow"><div class="vcol vcol-60 status-bar"></div><div class="vcol vcol-40 vctrl text-right"><div title="表情" class="OwO"></div></div></div>             				          
		</div>
		<div class="vcontrol">
			<div class="col col-20">
				<button type="button" data-chevereto-pup-trigger data-target="#veditor" title="评论支持图片 <img>标签" style="padding:0 2px 0 4px;border:none;border-radius:5px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path fill="none" d="M0 0h24v24H0z"/><path d="M21 15v3h3v2h-3v3h-2v-3h-3v-2h3v-3h2zm.008-12c.548 0 .992.445.992.993v9.349A5.99 5.99 0 0 0 20 13V5H4l.001 14 9.292-9.293a.999.999 0 0 1 1.32-.084l.093.085 3.546 3.55a6.003 6.003 0 0 0-3.91 7.743L2.992 21A.993.993 0 0 1 2 20.007V3.993A1 1 0 0 1 2.992 3h18.016zM8 7a2 2 0 1 1 0 4 2 2 0 0 1 0-4z" fill="rgba(102,102,102,1)"/></svg></button>          
           <button type="button" title="私密评论，仅评论者及作者可见！"onclick="secret()" style="padding:0 2px 0 4px;border:none;border-radius:5px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path fill="none" d="M0 0L24 0 24 24 0 24z"/><path d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10c-1.702 0-3.305-.425-4.708-1.175L2 22l1.176-5.29C2.426 15.306 2 13.703 2 12 2 6.477 6.477 2 12 2zm0 5c-1.598 0-3 1.34-3 3v1H8v5h8v-5h-1v-1c0-1.657-1.343-3-3-3zm2 6v1h-4v-1h4zm-2-4c.476 0 1 .49 1 1v1h-2v-1c0-.51.487-1 1-1z" fill="rgba(102,102,102,1)"/></svg></button>               
			</div>
			<div class="col col-80 text-right">	
			
			<span style="color:red" title="验证码，必填项！">(*) </span><?php spam_protection_math();?>
			<button type="submit" title="Cmd|Ctrl+Enter" class="vsubmit vbtn" id="misubmit">回复</button>
			<?php $security = $this->widget('Widget_Security'); ?>			
			</div>
		</div>
		<div style="display:none;" class="vmark">
		</div>
	</div>
	</form>   
<script>
function secret() {
                     i = document.getElementById("veditor");
                     if (i.value.indexOf("私密# ") != -1) {
                     reg = new RegExp('私密# ');
                     i.value = i.value.replace(reg, '');
                     } else {
                     i.value = '私密# ' + i.value;
                    };
                 };
 </script>	
	</div>
	<?php if($this->commentsNum!=0): ?>
	<div class="vinfo" style="display:block;">
		<div class="vcount col">
			<span style="text-align:middle;">  本文共&nbsp;&nbsp;<span class="vnum" style="color:#2bbc8a;"><?php $this->commentsNum('%d'); ?></span>&nbsp;&nbsp;条评论。您也快来参与吧！</span>
		</div>
	</div>
	<?php else: ?>
	<div class="vempty " style="display:block;">快来做第一个评论的人吧~</div>
	<?php endif; ?>
	<div class="vlist ">
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
	<script src="<?php $this->options->themeUrl('lib/OwO/OwO.min.js'); ?>"></script>
	<script type="text/javascript">
//OwO
var OwO_winds = new OwO({
    logo: '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>',
    container: document.getElementsByClassName('OwO')[0],
    target: document.getElementsByClassName('OwO-textarea')[0],
    api: '<?php if ($this->options->Emoji == 'able'): ?><?php cjUrl('lib/OwO/OwO.json'); ?><?php else: ?><?php cjUrl('lib/OwO/OwOmini.json'); ?><?php endif; ?>',
    position: 'down',
    width: '100%',
    maxHeight: '250px'
});</script>
<?php endif; ?>