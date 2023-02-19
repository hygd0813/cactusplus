<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="mx-auto px3 my5">
 <footer id="footer" style="display:block;">
            <div class="footer-left">
                 © <?php echo date('Y'); ?>.   <a href="<?php $this->options->siteUrl();?>" target="_blank"><?php $this->options->title();?></a> <?php if($this->options->beian): ?><!--<a href="https://beian.miit.gov.cn/" target="_blank" rel="nofollow"><?php $this->options->beian();?></a>--><a href="https://icp.gov.moe/?keyword=20221989" target="_blank" rel="nofollow"><?php $this->options->beian();?></a><?php endif; ?> <?php if($this->options->bdtongji): ?><a href="<?php $this->options->bdtongji();?>" rel="nofollow" target="_blank"> 统计</a><?php endif; ?> 
            </div>
            <div class="footer-right">
                <nav>
                    <ul>
                        <?php $this->widget('Widget_Contents_Page_List')->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
                        <?php if($this->options->github): ?><li>
                            <a href="<?php $this->options->github();?>" target="_blank">Github</a>
                        </li><?php endif; ?>		<li>
                            <a href="<?php $this->options->siteUrl();?>feed/">RSS</a>
                        </li>			
                        <li>
                            <a href="<?php $this->options->siteUrl();?>sitemap.xml">地图</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <p style="text-align:center;"></p>
<!--锚点-->
    <div class="go-Login">
        <a href="<?php $this->options->siteUrl();?>admin/" rel="login" title="Login" style="font-size:1rem;" target="_blank"><i class="fa fa-cog"></i></a>		
    </div>
    <div class="go-up">
        <a href="#" rel="go-top" title="Top" style="font-size:1rem;"><i class="fa fa-chevron-up"></i></a>                        
    </div> 
    <div  style="text-align:center;">
         加载:<?php echo timer_stop();?>&nbsp;｜&nbsp;更新:<?php get_last_update() ?>&nbsp;｜&nbsp;在线:<?php echo online_users() ?>人
	</div>
<!--主机续费时间开始--> 
    <div  style="text-align:center;">
		<script>
			(function(){
				var bp = document.createElement('script');
				var curProtocol = window.location.protocol.split(':')[0];
				if (curProtocol === 'https') {
					bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
				}
				else {
					 bp.src = 'http://push.zhanzhang.baidu.com/push.js';
				}
				var s = document.getElementsByTagName("script")[0];
				s.parentNode.insertBefore(bp, s);
				})();
		</script>	
		<?php if($this->options->docker_time_no == '1'): ?> 		
		距离主机到期剩：<SPAN id=span_dt_dd style="color: #2F889A;"></SPAN> 
		<script language=javascript>function show_date_time(){
			window.setTimeout("show_date_time()", 1000);
			BirthDay=new Date("<?php $this->options->docker_time(); ?> ");
			today=new Date();
			timeold=(BirthDay.getTime()-today.getTime());
			sectimeold=timeold/1000
			secondsold=Math.floor(sectimeold);
			msPerDay=24*60*60*1000
			e_daysold=timeold/msPerDay
			daysold=Math.floor(e_daysold);
			e_hrsold=(e_daysold-daysold)*24;
			hrsold=Math.floor(e_hrsold);
			e_minsold=(e_hrsold-hrsold)*60;
			minsold=Math.floor((e_hrsold-hrsold)*60);
			seconds=Math.floor((e_minsold-minsold)*60);
			span_dt_dd.innerHTML='<font style=color:#C40000>'+daysold+'</font> 天 <font style=color:#C40000>'+hrsold+'</font> 时 <font style=color:#C40000>'+minsold+'</font> 分 <font style=color:#C40000>'+seconds+'</font> 秒';
			}show_date_time();</script> 
			<?php endif; ?> 
    </div>
<!--主机续费时间结束-->		
<!--站点运行时间开始--> 
    <div  style="text-align:center;">
		<?php if($this->options->zmki_time_no == '1'): ?> 		
		站点已稳定运行：<SPAN id=span_dt_dt style="color: #2F889A;"></SPAN> 
		<script language=javascript>function show_date_time(){
			window.setTimeout("show_date_time()", 1000);
			BirthDay=new Date("<?php $this->options->zmki_time(); ?> ");
			today=new Date();
			timeold=(today.getTime()-BirthDay.getTime());
			sectimeold=timeold/1000
			secondsold=Math.floor(sectimeold);
			msPerDay=24*60*60*1000
			e_daysold=timeold/msPerDay
			daysold=Math.floor(e_daysold);
			e_hrsold=(e_daysold-daysold)*24;
			hrsold=Math.floor(e_hrsold);
			e_minsold=(e_hrsold-hrsold)*60;
			minsold=Math.floor((e_hrsold-hrsold)*60);
			seconds=Math.floor((e_minsold-minsold)*60);
			span_dt_dt.innerHTML='<font style=color:#C40000>'+daysold+'</font> 天 <font style=color:#C40000>'+hrsold+'</font> 时 <font style=color:#C40000>'+minsold+'</font> 分 <font style=color:#C40000>'+seconds+'</font> 秒';
			}show_date_time();</script> 
			<?php endif; ?> 
    </div>
<!--站点运行时间结束-->
</footer>
</div>					
		<link rel="stylesheet" href="<?php cjUrl('lib/font-awesome/css/font-awesome.min.css'); ?>">
		 <script src="<?php cjUrl('js/main.js'); ?>"></script>
		 <!--<script src="<?php cjUrl('js/lizi.js'); ?>"></script>	-->	 
        <?php if ($this->is('index')) : ?>
		<script src="<?php cjUrl('lib/typed.js'); ?>"></script>
		<script async src="https://busuanzi.ibruce.info/busuanzi/2.3/busuanzi.pure.mini.js"></script>

<!--<?php echo date('Ymd').'.json';?> 代替下面/hygd.json-->
		<script>	
$(function () {
  $.get("<?php cjUrl('lib/hygd.json'); ?>", function (data) {
     var data = data.data;

	var str = (data.content || "") + "\n" + (data.translation || "")+"\n---- ";
    
    var options = {
      strings: [ 
        str + "Who???^1000",
        str + "It's me.^1000",
        str + "Haha, make a joke.^1000",
        str + "Welcome to my blog. ^1000",
        str + "Have a good day. ^1000",
        str + `${data.author}. ^1000`,		
      ],
      typeSpeed: 20,
      startDelay: 300,
      //  loop: true,
    };
    var typed = new Typed(".description .typed", options);
  })
});</script>
		<?php endif; ?>
		<?php if ($this->is('post') || $this->is('page'))  : ?>
		<link rel="stylesheet" href="<?php cjUrl('css/lightbox.min.css'); ?>">
		<script src="<?php cjUrl('js/lightbox.min.js'); ?>"></script>
		<script src="<?php cjUrl('lib/highlight.min.js'); ?>"></script>
		<script>
		$('#post-content img').wrap(function () {
		return '<a href="' + this.src + '" title="' + this.alt + '" data-lightbox="roadtrip"></a>';
		});
		</script>
        <script>
            hljs.highlightAll();
        </script>
       <?php endif; ?>
	   <div class="searchbox">
    <div class="searchbox-container">
        <div class="searchbox-input-wrapper">
            <form class="search-form" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                <input name="s" type="search" class="searchbox-input" placeholder="输入您感兴趣的关键词尽情搜索吧！" />
                <span class="searchbox-close searchbox-selectable"><i class="fa fa-times-circle"></i></span>
            </form>
        </div>
    </div>
</div>		
<script>
document.addEventListener('DOMContentLoaded',function(){(function($){$('#search').click(function(){$('.searchbox').toggleClass('show')});$('.searchbox .searchbox-mask').click(function(){$('.searchbox').removeClass('show')});$('.searchbox-close').click(function(){$('.searchbox').removeClass('show')})})(jQuery)});
</script>
        <script>
			if ('serviceWorker' in navigator) {
			  window.addEventListener('load', function() {
				navigator.serviceWorker.register('<?php cjUrl('sw.js'); ?>').then(function(registration) {
				  console.log('ServiceWorker registration successful with scope: ', registration.scope);
				}, function(err) {
				  console.log('ServiceWorker registration failed: ', err);
				});
			  });
			}
        </script>	
	<script src="<?php cjUrl('js/codecopy.js'); ?>"></script>	
		<?php $this->footer(); ?>
            <p style="text-align:center;"> <?php if($this->options->footerimgad): ?> <?php $this->options->footerimgad();?> <?php endif; ?></p>			
<!--移动端页底导航开始-->
	<div class="footer-tabbar">
		<ul>
			<li class="footer-tabbar__item">
				<a class="" href="<?php $this->options->siteUrl();?>">
					<i class="fa fa-home fa-2x" aria-hidden="true"></i>首页
				</a>
			</li>
<li class="footer-tabbar__item">
				<a class="active" href="<?php $this->options->siteUrl();?>guests.html">
					<i class="fa fa-commenting-o fa-2x" aria-hidden="true"></i>微语
				</a>
			</li>
			<li class="footer-tabbar__item">
				<a class="" href="<?php $this->options->siteUrl();?>archives.html">
					<i class="fa fa-history fa-2x" aria-hidden="true"></i>归档
				</a>
			</li>			
			<li class="footer-tabbar__item">
				<a class="" href="<?php $this->options->siteUrl();?>link.html">
					<i class="fa fa fa-bullseye fa-2x" aria-hidden="true"></i>友链
				</a>
			</li>		
			<li class="footer-tabbar__item">
				<a class="" href="<?php $this->options->siteUrl();?>125.html">
					<i class="fa fa-smile-o fa-2x" aria-hidden="true"></i>关于
				</a>
			</li>		
		</ul>
	</div>
<!--移动端页底导航结束-->							
    </body>
</html>