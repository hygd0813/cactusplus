<?php
/**
 * 仙人掌(Cactus)是优雅简洁的暗色主题，本主题基于Cactus魔改而成。
 *
 *发布页：<a href="https://www.80srz.com/306.html">https://www.80srz.com/306.html</a>
 *主题文档：<a href="https://www.80srz.com/docs/typecho/">https://www.80srz.com/docs/typecho/</a>
 *邮箱：hygd0813@qq.com
 * @package Cactus Theme
 * @author 荒野孤灯
 * @version 1.7.0
 * @link https://www.80srz.com
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<body>
    <div class="content index widthindex mx-auto px3 my4">
 <!-- header导航栏 -->
        <header id="header">
            <a href="<?php $this->options->siteUrl();?>">
                 <div id="logo" style="background-image: url(<?php if($this->options->logoimg): ?><?php $this->options->logoimg();?><?php else : ?><?php cjUrl('images/logo.png'); ?><?php endif; ?>);"></div>
			 </a>
             <div id="title">
                 <h1 style="color:#2bbc8a;margin:1rem;font-size:36px;line-height:42px;"><?php $this->options->title(); ?></h1>
             </div>
             <div id="nav">
                 <ul>
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
        <section id="wrapper" class="Home">
 <!-- 信息栏 -->				
            <section id="about">
                <div class="description coding">
                  <span class="typed prompt"></span>                                             
                </div>               
    <section class=""><small><br></small>
    <?php if($this->user->hasLogin()): ?>
        <script type="text/javascript"> var now=(new Date()).getHours(); if(now>0&&now<=5){ document.write("夜猫子！"); }else if(now>5&&now<=11){ document.write("上午好！"); }else if(now>11&&now<=14){ document.write("中午好！"); }else if(now>14&&now<=18){ document.write("下午好！"); }else{ document.write("晚上好！"); } </script> <span style="color:orange">「</span><a href="<?php $this->options ->siteUrl(); ?>visitor.html" target="_blank" style="background: none;"><?php echo $this->user->screenName(); ?></a><span style="color:orange">」</span> 站长大人！
    <?php else : ?>
        <?php if($this->remember('author',true)): ?>
            <script type="text/javascript"> var now=(new Date()).getHours(); if(now>0&&now<=6){ document.write("夜猫子！"); }else if(now>6&&now<=11){ document.write("上午好！"); }else if(now>11&&now<=14){ document.write("中午好！"); }else if(now>14&&now<=18){ document.write("下午好！"); }else{ document.write("晚上好！"); } </script> <span style="color:orange">「</span><a href="<?php $this->options ->siteUrl(); ?>visitor.html" target="_blank" style="background: none;"><?php echo $this->remember('author',true); ?></a><span style="color:orange">」</span> 朋友！
        <?php else : ?>
            <script type="text/javascript"> var now=(new Date()).getHours(); if(now>0&&now<=6){ document.write("快睡觉！"); }else if(now>6&&now<=11){ document.write("早上好！"); }else if(now>11&&now<=14){ document.write("中午好！"); }else if(now>14&&now<=18){ document.write("下午好！"); }else{ document.write("晚上好！"); } </script><?php echo '<span style="color:orange">「</span>'.convertip(getIp()).'<span style="color:orange">」</span> 的朋友！'; ?>
        <?php endif; ?>
    <?php endif; ?> 

    <?php $this->widget('Widget_Comments_Recent', 'pageSize=1&parentId=4')->to($comments); ?><?php if ($comments->have()): ?><?php while($comments->next()): ?><span class="tooltip" data-msg="<?php $comments->dateWord(); ?>：<?php $comments->excerpt(32, '...'); ?>" style="margin-right:5px;float:right;"><a href="<?php $comments->permalink(); ?>" style="background: none;"><i class="fa fa-twitch 2x" aria-hidden="true" style="font-size:18px;color:orange;"></i></a><span class="ani_dot">...</span></span><?php endwhile; ?><?php endif; ?>
    <style>
.ani_dot {font-family: simsun;font-size:18px;color:orange;}
:root .ani_dot {display: inline-block;width: 1.5em;vertical-align: bottom;overflow: hidden;}
@-webkit-keyframes dot {0% { width: 0; margin-right: 1.5em; }33% { width: .5em; margin-right: 1em; }66% { width: 1em; margin-right: .5em; }100% { width: 1.5em; margin-right: 0;}}
.ani_dot {-webkit-animation: dot 3s infinite step-start;}
@keyframes dot { 0% { width: 0; margin-right: 1.5em; }33% { width: .5em; margin-right: 1em; }66% { width: 1em; margin-right: .5em; }100% { width: 1.5em; margin-right: 0;}}
.ani_dot {animation: dot 3s infinite step-start;}
    </style>     

</section>                     
				<?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
                    <p style="display: inline;">
                        <span>
                            <i class="fa fa-eye" aria-hidden="true"></i>&nbsp;<span class="tooltip" style="margin-right:5px;" data-msg="访客总数"><?php echo theAllViews();?></span>
							<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>&nbsp;<span class="tooltip" style="margin-right:5px;" data-msg="文章点赞总数"><?php echo agreeCount();?></span>
							<i class="fa fa-comments-o" aria-hidden="true"></i>&nbsp;<span class="tooltip" style="margin-right:5px;" data-msg="评论总数"><?php echo get_comments_count();?></span>                            
							<i class="fa fa fa-heart-o" aria-hidden="true"></i>&nbsp;<span class="tooltip" style="margin-right:0px;" data-msg="评论点赞总数"><?php echo plagreeCount();?></span>                            
                      </span>
                    </p>
                    <ul id="sociallinks"style="style-type:none;"><small class="qrcodeimg" style="color:orange;margin:0 15px 0 15px;">|</small><span class="">Find me on &nbsp;</span>
			             <li>
						     <?php if($this->options->github): ?><a class="icon" href="<?php $this->options->github();?>" target="_blank" title="github" rel="nofollow"><i class="fa fa-github"></i></a>&nbsp;<?php endif; ?>
							 <?php if($this->options->weibo): ?><a class="icon" href="<?php $this->options->weibo();?>" target="_blank" title="weibo" rel="nofollow"><i class="fa fa-weibo"></i></a>&nbsp;<?php endif; ?>
							 <?php if($this->options->email): ?><a class="icon" href="https://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=<?php $this->options->email();?>" target="_blank" title="email" rel="nofollow"><i class="fa fa-envelope"></i></a>&nbsp;<?php endif; ?>
                    <?php if($this->options->follow): ?><a class="icon" href="<?php $this->options->follow();?>" target="_blank" title="follow" rel="nofollow"><i class="fa fa-reply fa-rotate-180"></i></a>&nbsp;<?php endif; ?>
							 <small class="qrcodeimg" style="color:orange;margin:0 15px 0 15px;">|</small><a id="search" class="search icon" href="javascript:;" title="站内搜索"><span class="">&nbsp;Search&nbsp;</span><i class="fa fa-search"></i></a>
                        </li>
					</ul>
					<p class="prompt ad-text output new-output"><i class="fa fa-share-square-o" aria-hidden="true"></i>：<a href="https://www.80srz.com/posts/306.html" style="background: none;">本站主题更新至1.7.0版(2024.1.20)</a></p>
            </section> 

<!-- 首页聚焦-->  
<link rel="stylesheet"  href="<?php cjUrl('css/swiper.min.css'); ?>" media="all" />
<script src="<?php cjUrl('js/swiper.min.js'); ?>" type="text/javascript"></script>
            <?php if($this->options->Focuss): ?>
                <div class="row qrcodeimg">
                    <span class="h1 tooltip" data-msg="博主墙裂推荐内容"><a href="#">聚焦</a></span>    
                    <div class="th-button-next" tabindex="0" role="button" aria-label="Next slide"><i class="iconfont  icon-jiantou_zuo"></i></div>
                    <div class="th-button-prev" tabindex="0" role="button" aria-label="Previous slide"><i class="iconfont  icon-jiantou_you"></i></div>  
                    <div class="swiper-container thslide2">
                        <div class="swiper-wrapper">                                           
                                <?php Focuss(); ?> 
                        </div>
                    </div>                                
                </div>	
            <?php endif; ?>

        <script type="text/javascript" >
            var swiper = new Swiper('.thslide2', {
                slidesPerView: 3,
                spaceBetween: 10,
                loop: true,
                autoplay: {
                    delay: 3600,
                    stopOnLastSlide: false,//如果设置为true，当切换到最后一个slide时停止自动切换
                    disableOnInteraction: true,//用户操作swiper之后，是否禁止autoplay
                },
                navigation: {
                    nextEl: '.th-button-next',
                    prevEl: '.th-button-prev',
                },
            });
        </script>

 <!-- 文章CMS列表 -->				
            <div class="row">		                  
                <?php $this->widget('Widget_Metas_Category_List@options')->to($categories);$ignoreMidArr = explode(',', $this->options->nolist);?>
                <?php while ($categories->next()): ?>
                <?php if (!in_array($categories->mid,$ignoreMidArr)): ?>
                   <section id="writing" class="col-lg-6 col-xs-12">
                    <span class="h1 tooltip" data-msg="分类“<?php $categories->name(); ?>”下所有文章"><a href="<?php $categories->permalink(); ?>"><?php $categories->name(); ?></a></span>	
                    <ul class="post-list" id="post-list">		
<?php $this->widget('Widget_Archive@index-' . $categories->mid, 'pageSize=10&type=category', 'mid=' . $categories->mid)->to($posts); ?>
<?php while ($posts->next()): ?>
<li class="post-item" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;max-width:100%;">
    <div class="meta"><time datetime="<?php $posts->date(); ?>" itemprop="datePublished"><?php $posts->date('Y.n.j'); ?></time></div>
    <span style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;max-width:95%;"><a href="<?php $posts->permalink(); ?>"><?php $posts->title(); ?></a>
    </span>
</li>
<?php endwhile;?>			
                    </ul>
                </section>
    <?php endif; ?>
<?php endwhile; ?>  
                <section id="projects">
                    <span class="h1 tooltip" data-msg="搜集的一些常用网址，方便快速访问！">
                        <a href="<?php if($this->options->Projectsurl): ?><?php $this->options->Projectsurl();?><?php else : ?>#<?php endif; ?>"  target="_blank">便签</a>
                    </span>            
                    <ul class="project-list">
                      <?php Projects(); ?>                     
                    </ul>
                </section>
 <!--文章列表ads -->	 	 
<?php if($this->options->indexlistdownads): ?><?php $this->options->indexlistdownads();?><?php endif; ?>		               
            </div>
        </section>				
    </div>	
      
<!--首页蒙版公告 -->	
 <?php if ($this->options->indexmbadskaiguan == '1'):?><?php $this->options->indexmbads();?><?php endif; ?>    
    
 <?php $this->need('footer.php'); ?>