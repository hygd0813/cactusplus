<?php
//  判断是否是点赞的 POST 请求
if (isset($_POST['agree'])) {
    if ($_POST['agree'] == $this->cid) {
        exit(agree($this->cid));
    }
    exit('error');
}
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<body>
<!--内容页左侧ads -->	
     <div id="header-post-ads" style="border:1px;height:auto;width:180px;margin-top:3rem;text-align: right;"> 
         <?php if($this->options->postleftads): ?> <?php $this->options->postleftads();?> <?php endif; ?>
     </div>
<!--内容页右侧导航 -->	 
     <div id="header-post">
         <a id="menu-icon" href="#" class="tooltip" data-msg="隐藏侧边栏"><i class="fa fa-bars fa-lg"></i></a>
         <a id="menu-icon-tablet" href="#"><i class="fa fa-bars fa-lg"></i></a>
         <a id="top-icon-tablet" href="#" onclick="$('html, body').animate({ scrollTop: 0 }, 'fast');" style="display:none;"><i class="fa fa-chevron-up fa-lg"></i></a>
         <span id="menu">
         <span id="actions">
             <ul>
				 <li><a id="search" class="search-form-input icon"href="javascript:;" onclick="$('html, body').animate({ scrollTop: 0 }, 'fast');"><i class="fa fa-search" aria-hidden="true" onmouseover='$("#i-search").toggle();' onmouseout='$("#i-search").toggle();'></i></a></li>
                 <li><?php $this->theNext('%s', '', array('title' => '<i class="fa fa-chevron-left" aria-hidden="true" onmouseover=\'$("#i-prev").toggle();\' onmouseout=\'$("#i-prev").toggle();\'></i>', 'tagClass' => 'icon')); ?></li>
                 <li> <?php $this->thePrev('%s', '', array('title' => '<i class="fa fa-chevron-right" aria-hidden="true" onmouseover=\'$("#i-next").toggle();\' onmouseout=\'$("#i-next").toggle();\'></i>', 'tagClass' => 'icon')); ?></li>			 
                 <li><a class="icon" href="#" onclick="$('html, body').animate({ scrollTop: 0 }, 'fast');"><i class="fa fa-chevron-up" aria-hidden="true" onmouseover='$("#i-top").toggle();' onmouseout='$("#i-top").toggle();'></i></a></li>
                 <li><a class="icon" href="<?php $this->options->siteUrl();?>random.html" target="_blank"><i class="fa fa-random" aria-hidden="true" onmouseover='$("#i-random").toggle();' onmouseout='$("#i-random").toggle();' ></i></a></li>
             </ul>
				 <span id="i-search" class="info" style="display:none;">Search</span>
                 <span id="i-prev" class="info" style="display:none;">Previous post</span>
                 <span id="i-next" class="info" style="display:none;">Next post</span>					 
                 <span id="i-top" class="info" style="display:none;">Back to top</span>
                 <span id="i-random" class="info" style="display:none;">Random post</span>				 			 
         </span><br/>
             
         <div id="toc">
             <!--内容页右侧ads -->
             <?php if($this->options->postrightads): ?>
             <div style="height:auto;width:320px;margin-top:1.5rem;padding: 0;"> 
               <?php $this->options->postrightads();?>
             </div> 
             <?php endif; ?>               
             <nav id="TableOfContents">
                 <ul class="tree">
                    <?php if ($this->fields->Toctype == 1): ?><li><b style="color: #2bb283;">文 章 目 录</b></li><?php getCatalog(); ?>
                    <?php else: ?><li><b style="color: #2bb283;">推 荐 文 章</b></li><?php theme_random_posts();?><?php endif; ?>
                 </ul>                                 
             </nav>           
         </div>            
         </span>
     </div>
<!--内容页 -->	 
     <div class="content index width mx-auto px3 my3">
                 
               <header id="header">
                <a href="<?php $this->options->siteUrl();?>">
                    <div id="logo" style="background-image: url(<?php if($this->options->logoimg): ?><?php $this->options->logoimg();?><?php else : ?><?php $this->options->themeUrl('images/logo.png'); ?><?php endif; ?>);"></div>
                </a>
				<div id="title">
                        <h1 style="color:#2bbc8a;margin:1rem;font-size:36px;line-height:42px;"><?php $this->options->title(); ?></h1>
                    </div>
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
         
         <section id="wrapper" class="home">
             <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
                 <header style="margin-bottom:1rem;border-bottom:1px dotted #fff;">
                      <h1 class="posttitle" itemprop="name headline" style="margin-top:3rem;margin-bottom:1rem;text-align: center;"><a href="<?php $this->permalink(); ?>"><?php $this->title() ?></a></h1>
					 <div class="edit qrcodeimg share" style="float:right;">
                             <a id="wx"class="icon tooltip" style="margin:0 5px;" data-msg="分享至微信"><i class="fa fa-wechat" aria-hidden="true" /></i><span>用微信扫描分享给好友</br><img src="<?php $this->options->themeUrl(); ?>qrcode.php?size=240&text=<?php $this->permalink(); ?>" width="160px" height="160px" alt="文章网址二维码"/></span></a>                     
                             <a class="icon tooltip" style="margin:0 5px;" href="https://service.weibo.com/share/share.php?url=<?php $this->permalink() ?>&title=<?php $this->title() ?>&appkey=#_loginLayer_1698383598156" data-msg="分享至微博"><i class="fa fa-weibo" aria-hidden="true"></i></a>
                             <a class="icon tooltip" style="margin:0 5px;" href="mailto:?subject=<?php $this->title() ?>&body=Check out this article: <?php $this->permalink() ?>" data-msg="分享至邮箱"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                             <a class="icon tooltip" style="margin:0 5px;" href="https://www.facebook.com/sharer.php?u=<?php $this->permalink() ?>" data-msg="分享至Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                             <a class="icon tooltip" style="margin:0 5px;" href="https://twitter.com/share?url=<?php $this->permalink() ?>&text=<?php $this->title() ?>" data-msg="分享至Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a> 
                             <style>.share a span {display: none;}.share a:hover span {display: block;position: absolute;background-color: #fff;border: 5px solid #666;width:180px;height:200px;text-align:center;}</style>
                     </div>	
                     <div class="meta">
                         <div class="postdate">
                             <i class="fa fa-clock-o" aria-hidden="true">&nbsp;&nbsp;</i><time datetime="<?php $this->date('Y.n.j'); ?>" itemprop="datePublished"><?php $this->date('Y.n.j'); ?></time>
                         </div>
                         <div class="article-tag">
                             <i class="fa fa-eye" aria-hidden="true">&nbsp;&nbsp;</i><span><?php Postviews($this); ?></span>
                         </div>
                         <div class="article-tag">
                             <i class="fa fa-tag" aria-hidden="true" >&nbsp;&nbsp;</i> <?php $this->tags(', ', true, 'none'); ?>
                         </div>	
                         <div class="article-tag">
                          <?php if($this->user->hasLogin()):?>
							 <a href="<?php $this->options->adminUrl(); ?>write-post.php?cid=<?php echo $this->cid;?>" target="_blank">编辑</a>
					      <?php else: ?>
                             <i class="fa fa-file-word-o"></i><span> <?php echo art_time($this->cid); ?> 分钟</span>					  
                          <?php endif;?>                         
                         </div>	                        
                         <div class="article-tag-box"></div>
                     </div>
                 </header> 
                 <div class="content " itemprop="articleBody" id="post-content" style="padding:.25rem .5rem .5rem 1rem;">
                     <div class="main_element Links-content" rel="nofollow"> 
                         <p style="font-size:12px;text-align:center;">
                            本文最后由<a href="<?php $this->author->permalink(); ?>" target="_blank" title="<?php $this->author('intro'); ?>"><?php $this->author() ?></a>更新于<?php echo date('Y 年 n 月 j 日' , $this->modified);?>，已超过<?php echo floor((time()-($this->modified))/86400);?>天没有更新。如果文章内容或图片资源失效，请留言反馈，将会及时处理，谢谢！
                         </p>
                     </div>																			
                     <?php parseContent($this); ?>	                     
				 </div>	  

                 <div style="text-align:center;margin-top:2rem;"><span style="color:#2bbc8a;border-bottom:3px double #f1f3fa;">~&nbsp;&nbsp;~&nbsp;&nbsp;The&nbsp;&nbsp;&nbsp;End&nbsp;&nbsp;~&nbsp;&nbsp;~</span></div>
                 
<!-- 赞赏点赞 -->
                     <section class="j-fabulous"><p><br/></p>
                     <div class="button has-admire">
	                     <?php $agree = $this->hidden?array('agree' => 0, 'recording' => true):agreeNum($this->cid); ?>	
                         <section disabled id="agree-btn" class="left like tooltip" data-cid="<?php echo $this->cid; ?>" data-url="<?php $this->permalink(); ?>" data-msg="不错，不错，赞一个！">
                             <svg viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d=" M883.069529 202.542591c-47.178415-45.274046-109.900819-70.216061-176.61411-70.216061s-120.187073 23.000807-167.368557 68.272806c-0.018419 0.033769-0.053212 0.068561-0.068561 0.104377-0.019443 0-0.019443 0-0.034792 0L512.184195 233.104593l-26.815685-30.459671c-0.019443-0.034792-0.054235-0.069585-0.070608-0.069585-0.019443 0-0.019443 0-0.019443-0.033769-47.179438-45.274046-100.654243-70.216061-167.367534-70.216061-66.728641 0-129.451045 24.943039-176.631507 70.216061-47.164088 45.305768-73.146804 105.529264-73.146804 169.571731 0 64.004605 25.947923 124.194332 73.077219 169.467354l331.562825 320.963441c10.425423 10.094895 24.614558 15.78549 39.40949 15.78549 14.794931 0 28.984067-5.690594 39.410513-15.78549l331.543382-320.928649c47.147716-45.273022 73.096662-105.497542 73.096662-169.502147C956.234752 308.071855 930.251013 247.848359 883.069529 202.542591z" p-id="16451" fill="currentColor" style="color:#ea8a86;"></path></svg>
                             <span > &nbsp;赞&nbsp;</span><span  class="agree-num"> <?php echo $agree['agree']; ?></span>
                         </section>
                         <script>$('#agree-btn').on('click',function(){$('#agree-btn').get(0).disabled=true;$.ajax({type:'post',url:$('#agree-btn').attr('data-url'),data:'agree='+$('#agree-btn').attr('data-cid'),async:true,timeout:30000,cache:false,success:function(data){var re=/\d/;if(re.test(data)){$('#agree-btn .agree-num').html(data)}},error:function(){$('#agree-btn').get(0).disabled=false},})});</script>		
                         <section class="right tooltip" id="j-admire" data-msg="不错，不错，赏一亿！">
                             <svg viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M960 512c0-246.5-200.6-446.4-448-446.4S64 265.5 64 512c0 246.6 200.6 446.4 448 446.4S960 758.6 960 512z m-269.5 78.3c21.2-0.3 37.3 14.3 37.3 40.4 0 26.1-14.9 41.3-37.3 40.4l-117.3-0.6v68c-0.6 36.3-21.7 54.5-59.9 54.5-37.7 0-59.5-17.7-61.1-54.5v-66.7H327.9c-23.2-1.7-38-16-38-43.6s14.8-36.1 38-37.8h124.2V550l-124.2-0.6c-23.2-1.7-38-15-38-39.8 0-24.8 14.8-36.1 38-37.8h92.7l-80-99c-16.9-28.8-19.3-62 5.7-79.1 25-17.1 56.7-7.2 73.5 20.7l91.6 126L594 317.1c14.9-26.4 40.3-44.5 72.9-27.7 27.9 14.4 25.6 47.4 10.2 77.1l-74.9 105.1h88.4c22.3 1.7 37.3 9.7 37.3 37.9 0 28.1-15.6 39.3-38 41l-116.7 0.6v39.1h117.3v0.1z" p-id="12711" fill="currentColor" style="color:#86d286;"></path></svg>
                             <span> &nbsp;赏&nbsp; </span>
                         </section>
                     </div>
                 </section>
                 <section class="j-admire-modal j-modal-mask">
                         <section class="contentzs">
                             <section class="title">感谢您的支持，我会继续努力哒!</section>
                                 <section class="codezs">
                                     <img src=" <?php cjUrl('images/weixin.jpg'); ?>" alt="支付宝收款码"/>
                                 </section>  
                                 <section class="tips">
                                     <img src="<?php cjUrl('images/tips.png'); ?>" alt="tips"/>                
                                 </section>		
                                     <svg class="close" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M6.713 512C6.713 232.562 233.13 6.2 512 6.2c278.926 0 505.287 226.362 505.287 505.288V512A504.718 504.718 0 0 1 512 1017.287 505.116 505.116 0 0 1 6.713 512z m539.079 0l176.47-176.47a22.983 22.983 0 0 0 0-32.71l-1.082-1.081a22.983 22.983 0 0 0-32.71 0L512 478.72 335.53 301.739a22.983 22.983 0 0 0-32.71 0l-1.081 1.08a22.983 22.983 0 0 0 0 32.712l176.469 176.981-176.47 176.47a22.983 22.983 0 0 0 0 32.767l1.082 1.024a22.983 22.983 0 0 0 32.71 0L512 546.304l176.47 176.47a22.983 22.983 0 0 0 32.71 0l1.081-1.025a22.983 22.983 0 0 0 0-32.768L545.792 512z" p-id="13836"></path></svg>
                            </section>
                        </section>						 
                         <script>/* 初始化赏按钮 */$('#j-admire').on('click', function () {$('.j-admire-modal').addClass('active');$('body').css('overflow', 'hidden');});$('.j-admire-modal .close').on('click', function () {$('.j-admire-modal').removeClass('active');$('body').css('overflow', '');});</script>

<!-- 文章信息 -->
                 <div class="content " style="border-left:8px solid #666;margin:.875rem 0 1.5rem 0;padding:.5rem;font-size:12px;min-height:120px;vertical-align:middle;">
					 <span style="float:right;background-color:#999;height:100px;" class="qrcodeimg tooltip" data-msg="扫描二维码，手机浏览！"><img src="<?php $this->options->themeUrl(); ?>qrcode.php?size=240&text=<?php $this->permalink(); ?>" width="100px" height="100px" alt="文章二维码"/></span>           
                     <span>分类标签：</span><?php $this->category(','); ?>，<?php $this->tags('，', true, 'none'); ?><br/>
                     <span>文章标题：</span><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a><br/>
                     <span>文章链接：</span><a href="<?php $this->permalink() ?>"><?php $this->permalink() ?></a><br/>
                     <span>最后编辑：</span><?php echo date('Y 年 n 月 j 日 H:i' , $this->modified); ?>	  By  <a href="<?php $this->author->permalink(); ?>" target="_blank" title="<?php $this->author('intro'); ?>"><?php $this->author() ?></a><br/>
					 <span>许可协议：</span> <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.zh" rel="nofollow" target="_blank" title="版权协议">署名-非商业性使用-相同方式共享 4.0 国际 (CC BY-NC-SA 4.0)</a>				 
                 </div>
<!--内容页下方ads -->	
<?php if($this->options->postdownads): ?> <div class="" ><?php $this->options->postdownads();?></div> <?php endif; ?>
<!--推荐、热门文章-->
                 <div class="row " >
                     <section id="writing" class="col-lg-6 col-xs-12">
                         <h3 style="color:#2bbc8a;">相关推荐</h3>
                         <ul class="post-list" id="post-list">
                             <?php $this->related(10)->to($relatedPosts); ?>
							 <?php while ($relatedPosts->next()): ?>
                             <li class="post-item" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;max-width:100%;">
	                             <div class="meta"><time datetime="<?php $relatedPosts->date(); ?>" itemprop="datePublished"><?php $relatedPosts->date('Y.n.j'); ?></time></div>
	                             <span style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;max-width:95%;"><a href="<?php $relatedPosts->permalink(); ?>" title="<?php $relatedPosts->title(); ?>"><?php $relatedPosts->title(30,'…'); ?></a></span>
		                     </li>
			                 <?php endwhile;?> 
                         </ul>
<!-- 内容页推荐列表左侧ads -->	 	 
<?php if($this->options->postlistleftads): ?><?php $this->options->postlistleftads();?><?php endif; ?>  
                     </section>
                     <section id="writing" class="col-lg-6 col-xs-12">
                         <h3 style="color:#2bbc8a;">热门推荐</h3>
                         <ul class="post-list" id="post-list">
                             <?php $this->widget('Widget_Post_hotview@hotview', 'pageSize=5')->to($hotview); ?>
                             <?php while($hotview->next()): ?>
                             <li class="post-item"  style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;max-width:100%;" >
	                             <div class="meta"><time datetime="<?php $hotview->date(); ?>" itemprop="datePublished"><?php $hotview->date('Y.n.j'); ?></time></div>
	                             <span style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;max-width:95%;"><a href="<?php $hotview->permalink(); ?>" title="<?php $hotview->title(); ?>"><?php $hotview->title(30,'…'); ?></a></span>
		                     </li>
			                 <?php endwhile;?>
                             <?php $this->widget('Widget_Post_hotpl@hotpl', 'pageSize=5')->to($hotpl); ?>
                             <?php while($hotpl->next()): ?>
                             <li class="post-item" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;max-width:100%;">
	                             <div class="meta"><time datetime="<?php $hotpl->date(); ?>" itemprop="datePublished"><?php $hotpl->date('Y.n.j'); ?></time></div>
	                             <span style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;max-width:95%;"><a href="<?php $hotpl->permalink(); ?>" title="<?php $hotpl->title(); ?>"><?php $hotpl->title(30,'…'); ?></a></span>
		                     </li>
			                 <?php endwhile;?>	
                         </ul>
<!--内容页推荐列表右侧ads -->	 	 
<?php if($this->options->postlistrightads): ?><?php $this->options->postlistrightads();?><?php endif; ?>                        
                     </section>					 
					 </div>
                </article>			
                 <?php $this->need('comments.php'); ?>
            </section>
        </div>
 <?php $this->need('footer.php'); ?>
    