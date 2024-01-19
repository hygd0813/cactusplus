<?php
/**
 * 微语·碎语
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
            <section id="wrapper" class="home">
                <article class="post" id="content" itemscope itemtype="http://schema.org/BlogPosting">
                    <div class="content" itemprop="articleBody">
                        <?php parseContent($this); ?>											           
                    </div>
              <!-- 爱情计时器插入点 -->
                </article>                   
        <!-- 一言 section class="home" id="GetHitokoto">
            <div class="main_element">
                <section class="Links-content">
	                <div  style="margin: 0;padding:0 .5em 3rem .5em;max-width: none;"><?php echo GetHitokoto(); ?></div>
                </section>
            </div>
        </section --> 

        <!--添加古诗词-->
        <script>
          $("#content").after('<div class="poem-wrap"><div class="poem-border poem-left"></div><div class="poem-border poem-right"></div><h2>念两句诗</h2><div id="poem_sentence"></div><div id="poem_info"></div></div>')
        </script>
        <script src="https://sdk.jinrishici.com/v2/browser/jinrishici.js" charset="utf-8"></script>
        <script type="text/javascript">
            jinrishici.load(function(result) {
              var sentence = document.querySelector("#poem_sentence");
              var info = document.querySelector("#poem_info");
              sentence.innerHTML = result.data.content;
              info.innerHTML = '【' + result.data.origin.dynasty + '】' + result.data.origin.author + '《' + result.data.origin.title + '》';
            });
        </script>

                 <?php $this->need('comments.whisper.php'); ?>
            </section>
		</div>
 <?php $this->need('footer.php'); ?>