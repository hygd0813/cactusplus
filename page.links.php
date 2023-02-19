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
                    <ul><li><b>文章分类&nbsp;：&nbsp;</b></li>-->
					<li><b><a href="https://www.80srz.com/125.html" target="_blank" title="">关于</a></b></li>
                        <?php $this->widget('Widget_Metas_Category_List')->to($categorys);while($categorys->next()):?>
                        <li><b><a href="<?php $categorys->permalink(); ?>" title="<?php $categorys->name(); ?>"><?php $categorys->name(); ?></a></b></li>
                        <?php endwhile;?>
                    </ul>
                </div>
            </header>
            <section id="wrapper" class="home">
                <div id="Links-mian" class="main_element">
                <section class="Links-content">
	                <div class="Total" style="padding-left:10px;"><span class="fa fa-link 2x"></span>  共 <b class="count" style="color:#333">0</b> 条友链 [随机排序]</div>
                    <div id="links-content" class="links-content flexbox"> 
					<?php Links(); ?>
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
		
                 <?php $this->need('comments.php'); ?>
            </section>
		</div>
 <?php $this->need('footer.php'); ?>