<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="mx-auto px3 my5">
 <footer id="footer" style="display:block;">
 	     <?php if($this->options->footerimgad): ?> <div  style="text-align:center;margin-top: .5rem;margin-bottom: 2rem;"><?php $this->options->footerimgad();?></div> <?php endif; ?>       
            <div class="footer-left">
                 © 2021-<?php echo date('Y'); ?> ♡ <a href="<?php $this->options->siteUrl();?>" target="_blank"><?php $this->options->title();?></a> | <a href="https://wiki.80srz.com" target="_blank">八零后百科网</a> | <a href="https://www.80srz.com/link/" target="_blank">站长导航</a> <?php if($this->options->bdtongji): ?> | <a href="<?php $this->options->bdtongji();?>" rel="nofollow" target="_blank">统计</a><?php endif; ?>
            </div>
            <div class="footer-right">
                <nav>
                    <ul>
                        <!-- <li><a href="<?php $this->options->siteUrl();?>">首页</a>|</li> -->                     
                        <?php $this->widget('Widget_Contents_Page_List')->parse('<li><a href="{permalink}">{title}</a>|</li>'); ?>
                        <li><a href="<?php $this->options->siteUrl();?>photos.html" target="_blank">相册</a>|</li>                     
						<li><a href="<?php $this->options->siteUrl();?>feed/">订阅</a>|</li>			
                        <li><a href="<?php $this->options->siteUrl();?>sitemap.xml">地图</a></li>
                    </ul>
                </nav>
            </div>
            <p style="text-align:center;margin:2rem 0;"></p>
    <div  style="text-align:center;">    
	     <?php if($this->options->footertjcode): ?> <?php $this->options->footertjcode();?> <?php endif; ?>
	</div>
	<div  style="text-align:center;">
         加载:<?php echo timer_stop();?>&nbsp;｜&nbsp;更新:<?php get_last_update() ?>&nbsp;｜&nbsp;在线:<?php echo online_users() ?>人
	</div>
    <div class="go-Login">
        <a href="<?php $this->options->siteUrl();?>admin/" rel="login" title="Login" style="font-size:.8rem;" target="_blank"><i class="fa fa-cog fa-2x"></i></a>		
    </div>
    <div class="go-up">
        <a href="#" rel="go-top" title="Top" style="font-size:.8rem;"><i class="fa fa-chevron-up fa-2x"></i></a>                        
    </div> 	

<!--站点运行时间开始--> 
    <div  style="text-align:center;">
<!-- 站点运行时间 -->
<?php if($this->options->zmki_time_no == '1'): ?> 		
		十年之约：<SPAN id=span_dt_dt style="color: #2F889A;"></SPAN> 
		<script language=javascript>function show_date_time(){
			window.setTimeout("show_date_time()", 1000);
			BirthDay=new Date("<?php $this->options->zmki_time(); ?> ");
			today=new Date();
			timeold=(today.getTime()-BirthDay.getTime());
			sectimeold=timeold/1000;
			secondsold=Math.floor(sectimeold);
			msPerDay=24*60*60*1000;
			msPerYear=365*24*60*60*1000;			

			e_yearsold=timeold/msPerYear;
			yearsold=Math.floor(e_yearsold);	
			
			e_daysold=timeold/msPerDay;
			daysold=Math.floor(e_daysold-yearsold*365);
			
			daysolds=Math.floor(e_daysold);			
			e_hrsold=(e_daysold-daysolds)*24;
			hrsold=Math.floor(e_hrsold);
			
			e_minsold=(e_hrsold-hrsold)*60;
			minsold=Math.floor((e_hrsold-hrsold)*60);
			
			seconds=Math.floor((e_minsold-minsold)*60);
			
			span_dt_dt.innerHTML='<font style=color:#C40000>'+yearsold+'</font> 年 <font style=color:#C40000>'+daysold+'</font> 天 <font style=color:#C40000>'+hrsold+'</font> 时 <font style=color:#C40000>'+minsold+'</font> 分 <font style=color:#C40000>'+seconds+'</font> 秒';
			}
			show_date_time();
			</script> 
<?php endif; ?> 
</div>
<!--站点运行时间结束-->
<!--站点备案开始--> 
    <div  style="text-align:center;">
         <?php if($this->options->beian): ?><a href="https://beian.miit.gov.cn/" target="_blank" rel="nofollow"><?php $this->options->beian();?></a><?php endif; ?>
    </div>
<!--站点备案结束--> 
</footer>
</div>					
		<link rel="stylesheet" href="<?php cjUrl('lib/font-awesome/css/font-awesome.min.css'); ?>">
		<script src="<?php cjUrl('js/main.js'); ?>"></script>
        <?php if ($this->is('index')) : ?>
		<script src="<?php cjUrl('lib/typed.js'); ?>"></script>
		<script async src="https://busuanzi.ibruce.info/busuanzi/2.3/busuanzi.pure.mini.js"></script>

<!--<?php echo date('Ymd').'.json';?> 代替下面/hygd.json-->
		<script type="text/javascript">	
$(function () {
  $.get("<?php cjUrl('lib/hygd'.rand(0,4).'.json');?>", function (data) {
    var data = data.data;
	var str = (data.content || "") + "\n" + (data.translation || "")+"\n--- ";   
    var options = {
      strings: [
        str + "Welcome to my blog ! ^1200",
       // str + "Have a good day ! ^1200",
       // str + `${data.author}. ^1200`,
      ],
      typeSpeed: 60,
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
        <script type="text/javascript">
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
<script type="text/javascript">
document.addEventListener('DOMContentLoaded',function(){(function($){$('#search').click(function(){$('.searchbox').toggleClass('show')});$('.searchbox .searchbox-mask').click(function(){$('.searchbox').removeClass('show')});$('.searchbox-close').click(function(){$('.searchbox').removeClass('show')})})(jQuery)});
</script>
        <script type="text/javascript">
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
	<script src="<?php cjUrl('js/codecopy.js'); ?>" type="text/javascript"></script>
	<script src="<?php cjUrl('js/imgpup.js'); ?>" type="text/javascript"></script>
		<?php $this->footer(); ?>
            <p style="text-align:center;"></p>	
<?php if ($this->options->themefooternav == '1'):?>
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
					<i class="fa fa-chain fa-2x" aria-hidden="true"></i>友链
				</a>
			</li>		
			<li class="footer-tabbar__item">
				<a class="" href="<?php $this->options->siteUrl();?>comment.html">
					<i class="fa fa-twitch fa-2x" aria-hidden="true"></i>留言
				</a>
			</li>		
		</ul>
	</div>
<?php endif; ?>
<?php if ($this->options->themepjax == '1'):?>
<!-- pjax jquery --> 
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.js" type="text/javascript"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).pjax(
  'a[href^="<?php Helper::options()->siteUrl()?>"]:not(a[target="_blank"],a[no-pjax]), a[href^="?"]',
  {
    container: '#wrapper #header-post-ads #header-post',
    fragment: '#wrapper #header-post-ads #header-post',
    timeout: 8000,
  };
)
</script>
<?php endif; ?>
<!-- 复制带版权 --> 
  <script>
document.body.addEventListener('copy', function (e) {
    if (window.getSelection().toString() && window.getSelection().toString().length > 10) {
        setClipboardText(e);
    }
}); 
function setClipboardText(event) {
    var clipboardData = event.clipboardData || window.clipboardData;
    if (clipboardData) {
        event.preventDefault();
        var htmlData = ''
            + '著作权归作者所有。<br>'
            + '商业转载请联系作者获得授权，非商业转载请注明出处。<br>'
            + '作者：<?php $this->author() ?><br>'
            + '文章：<?php $this->title() ?><br>'        
            + '链接：' + window.location.href + '<br><br>'
            + window.getSelection().toString();
        var textData = ''
            + '著作权归作者所有。\n'
            + '商业转载请联系作者获得授权，非商业转载请注明出处。\n'
            + '作者：<?php $this->author() ?>\n'
            + '文章：<?php $this->title() ?>\n'
            + '链接：' + window.location.href + '\n\n'
            + window.getSelection().toString();
        clipboardData.setData('text/html', htmlData);
        clipboardData.setData('text/plain',textData);
    }
}
</script> 
    </body>
</html>
<?php if ($this->options->thememouseright == '1'):?>
<!-- 鼠标右键美化 -->
<script src="https://lib.baomitu.com/layer/3.1.1/layer.js"></script>
<!-- 自定义右键菜单美化 -->
  <style type="text/css">
    a {text-decoration: none;}
    div.usercm{background-repeat:no-repeat;background-position:center center;background-size:cover;background-color:#fff;font-size:13px!important;width:130px;-moz-box-shadow:1px 1px 3px #b5b5b5;box-shadow:0px 0px 15px #b5b5b5;position:absolute;display:none;z-index:10000;opacity:0.9; border-radius: 8px;overflow:hidden;}
    div.usercm ul{list-style-type:none;list-style-position:outside;margin:0px;padding:0px;display:block}
    div.usercm ul li{margin:0px;padding:0px;line-height:35px;}
    div.usercm ul li a{color:#333;padding:0 15px;display:block}
    div.usercm ul li a:hover{color:#fff;background:#A0DAD0}
    div.usercm ul li a i{margin-right:10px}
    a.disabled{color:#c8c8c8!important;cursor:not-allowed}
    a.disabled:hover{background-color:rgba(255,11,11,0)!important}
    div.usercm{background:#fff !important;}
    </style>
<div class="usercm" style="left: 199px; top: 5px; display: none;">
    <ul>
        <li><a href="https://www.80srz.com"><i class="fa fa-home fa-fw"></i><span>首页</span></a></li>
        <li><a href="javascript:void(0);" onclick="getSelect();"><i class="fa fa-copy fa-fw"></i><span>复制</span></a></li>
        <li><a href="javascript:void(0);" onclick="baiduSearch();"><i class="fa fa-search fa-fw"></i><span>百度搜索</span></a></li>
        <li><a href="javascript:history.go(1);"><i class="fa fa-arrow-right fa-fw"></i><span>前进</span></a></li>
        <li><a href="javascript:history.go(-1);"><i class="fa fa-arrow-left fa-fw"></i><span>后退</span></a></li>
        <li style="border-bottom:1px solid gray"><a href="javascript:window.location.reload();"><i class="fa fa-refresh fa-fw"></i><span>重载网页</span></a></li>
		<li><a href="https://www.80srz.com/guests.html"><i class="fa fa-solid fa-paper-plane"></i><span>我的动态</span></a></li>
		<li><a href="https://www.80srz.com/random.html"><i class="fa fa-solid fa-random"></i><span>随机文章</span></a></li>      
        <li><a href="https://www.80srz.com/link.html"><i class="fa fa-solid fa-link"></i><span>申请友链</span></a></li>  
        <li><a href="https://www.80srz.com/comment.html"><i class="fa fa-commenting-o"></i><span>给我留言</span></a></li>
    </ul>
</div>
<script type="text/javascript">
    (function(a) {
        a.extend({
            mouseMoveShow: function(b) {
                var d = 0,
                    c = 0,
                    h = 0,
                    k = 0,
                    e = 0,
                    f = 0;
                a(window).mousemove(function(g) {
                    d = a(window).width();
                    c = a(window).height();
                    h = g.clientX;
                    k = g.clientY;
                    e = g.pageX;
                    f = g.pageY;
                    h + a(b).width() >= d && (e = e - a(b).width() - 5);
                    k + a(b).height() >= c && (f = f - a(b).height() - 5);
                    a("html").on({
                        contextmenu: function(c) {
                            3 == c.which && a(b).css({
                                left: e,
                                top: f,
                            }).show();
                        },
                        click: function() {
                            a(b).hide();
                        }
                    })
                })
            },
            disabledContextMenu: function() {
                window.oncontextmenu = function() {
                    return !1
                }
            }
        })
    })(jQuery);
   
    function getSelect() {
        "" == (window.getSelection ? window.getSelection() : document.selection.createRange().text) ? layer.msg("啊噢...你没还没选择文字呢！") : document.execCommand("Copy")
    }
    function baiduSearch() {
        var a = window.getSelection ? window.getSelection() : document.selection.createRange().text;
        "" == a ? layer.msg("啊噢...你没还没选择文字呢！") : window.open("https://www.baidu.com/s?wd=" + a)
    }
    $(function() {
        for (var a = navigator.userAgent, b = "Android;iPhone;SymbianOS;Windows Phone;iPad;iPod".split(";"), d = !0, c = 0; c < b.length; c++) if (0 < a.indexOf(b[c])) {
            d = !1;
            break
        }
        d && ($.mouseMoveShow(".usercm"), $.disabledContextMenu())
    });
</script>
<?php endif; ?>
<!-- html代码压缩 -->
<?php if ($this->options->themecompress == '1'):?>
<?php error_reporting(0); $html_source = ob_get_contents(); ob_clean(); print compressHtml($html_source); ob_end_flush(); ?>
<?php endif; ?>