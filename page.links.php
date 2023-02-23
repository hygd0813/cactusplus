<?php 
/**
* 友情链接
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
	                <div class="Total" style="padding-left:10px;"><span class="fa fa-link 3x"></span>  共 <b class="count" style="color:#2bbc8a;">0</b> 条 [随机排序]</div>
                    <div id="links-content" class="links-content flexbox"> 
					<?php Links(); ?>
                    </div>          
                </section>
                </div>
                <div id="Links-mian" class="main_element">
                <section class="Links-content1">			
                    <div class="Total1" style="padding-left:10px;"><span class="fa fa-subway 3x"  style="padding-right:10px;"></span> 随机博客</div> 
                    <div id="links-content1" class="links-content flexbox"> 

                    <div class="links-card1 flex-yl link_a1" name="link_a1"><div class="links-list-item" style=""><a href="https://foreverblog.cn/go.html" title="十年之约—虫洞" target="_blank"><img class="links-avatar lazy" alt="十年之约—虫洞" data-src="https://80srz.com/usr/themes/cactus/images/linkimg/chongdong.gif" src="https://80srz.com/usr/themes/cactus/images/linkimg/chongdong.gif"/><div class="links-item-info"><span class="links-item-name text-ell">十年之约—虫洞</span><span class="links-item-desc text-ell" title="随机跳转到十年之约正式成员的博客">随机跳转到十年之约正式成员的博客</span></div></a></div></div>

                    <div class="links-card1 flex-yl link_a" name="link_a1"><div class="links-list-item" style=""><a href="https://www.travellings.cn/go.html" title="BlogFinder" target="_blank"><img class="links-avatar lazy" alt="BlogFinder" data-src="https://travellings.cn/assets/travelling-dark.png" src="https://travellings.cn/assets/travelling-dark.png"/><div class="links-item-info"><span class="links-item-name text-ell">开往-虫洞</span><span class="links-item-desc text-ell" title="一个以跳转功能为主的友链接力项目，其名字“开往”取自“开放的网络”。">一个以跳转功能为主的友链接力项目，其名字“开往”取自“开放的网络”。</span></div></a></div></div>
					
                    <div class="links-card1 flex-yl link_a" name="link_a1"><div class="links-list-item" style=""><a href="https://bf.zzxworld.com" title="BlogFinder" target="_blank"><img class="links-avatar lazy" alt="BlogFinder" data-src="https://bf.zzxworld.com/images/favicon.png" src="https://bf.zzxworld.com/images/favicon.png"/><div class="links-item-info"><span class="links-item-name text-ell">BlogFinder</span><span class="links-item-desc text-ell" title="发现优秀的个人博客">发现优秀的个人博客</span></div></a></div></div>
					
					<div class="links-card1 flex-yl link_a" name="link_a1"><div class="links-list-item" style=""><a href="https://storeweb.cn/s/1656" title="个站商店-荒野孤灯-虫洞" target="_blank"><img class="links-avatar lazy" alt="个站商店" data-src="https://storeweb.cn/static/favicon.ico" src="https://storeweb.cn/static/favicon.ico"/><div class="links-item-info"><span class="links-item-name text-ell">个站商店-虫洞</span><span class="links-item-desc text-ell" title="一个精致的，带社交元素的个人网站发布平台，博客收录网站">一个精致的，带社交元素的个人网站发布平台，博客收录网站</span></div></a></div></div>     

                </div>
                </section>
                </div>											
															
                <article class="post" itemscope itemtype="http://schema.org/BlogPosting">   
                    <div class="content" itemprop="articleBody">
                        <?php parseContent($this); ?>
                    </div>
                </article>	
				
<script>
    var links = $(".Links-content").find(".links-card");
    if (links.length> 0){
        $(".Links-content").find(".Total .count").get(0).innerText=''+links.length+'';
    }
    var span=document.getElementById('links-content');
    var spanItem=document.getElementsByName('link_a');
    var random=function(){return Math.random()>0.5 ? -1 : 1};
    var spanArr=new Array();
    var k,m;
    for(var i=0; i<spanItem.length; i++){
      spanArr.push(spanItem[i]);
    }
    spanArr.sort(random);
    for(k=0; k<spanArr.length; k++){
      span.appendChild(spanArr[k]);
    }    
</script>	
<!--内容页下方ads -->	 	 
<?php if($this->options->postdownads): ?> <?php $this->options->postdownads();?> <?php endif; ?>	
                 <?php $this->need('comments.php'); ?>
            </section>
		</div>
 <?php $this->need('footer.php'); ?>