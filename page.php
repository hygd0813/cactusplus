<?php
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
        <div class="content index width mx-auto px3 my3">
            <section id="wrapper" class="home">
                <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
                  <script src="//cdn.staticfile.org/jquery_lazyload/1.9.7/jquery.lazyload.min.js"></script> <script>setTimeout(function() {$("img").lazyload({effect: "fadeIn", threshold: 100, failurelimit: 2});},100);</script>	                  
                    <div id="post-content" class="content" itemprop="articleBody">
                        <?php parseContent($this); ?>
                <?php if ($this->attachment->isImage): ?>
                        <p><h3>图片描述：</h3><br/><span style="padding-left:40px;"><?php $this->attachment->description();?></span></p>
                <?php endif; ?>		
                    </div>
                
<style>
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview {
  display: flex !important;
  flex-direction: column !important;
  justify-content: center !important;
  margin-top: 30px !important;
  padding: clamp(17px, 5%, 40px) clamp(17px, 7%, 50px) !important;
  max-width: none !important;
  border-radius: 6px !important;
  box-shadow: 0 5px 25px rgba(34, 60, 47, 0.25) !important;
}
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview,
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview *{
  box-sizing: border-box !important;
}
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview .preview-heading {
  width: 100% !important;
}
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview .preview-heading h5{
  margin-top: 0 !important;
  margin-bottom: 0 !important;
}
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview .preview-input-field {
  margin-top: 20px !important;
  width: 100% !important;
}
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview .preview-input-field input {
  width: 100% !important;
  height: 40px !important;
  border-radius: 6px !important;
  border: 2px solid #e9e8e8 !important;
  background-color: #fff !important;
  outline: none !important;
}
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview .preview-input-field input {
  color: #000000 !important;
  font-family: "Montserrat" !important;
  font-size: 14px !important;
  font-weight: 400 !important;
  line-height: 20px !important;
  text-align: center !important;
}
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview .preview-input-field input::placeholder {
  color: #000000 !important;
  opacity: 1 !important;
}

.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview .preview-input-field input:-ms-input-placeholder {
  color: #000000 !important;
}

.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview .preview-input-field input::-ms-input-placeholder {
  color: #000000 !important;
}
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview .preview-submit-button {
  margin-top: 10px !important;
  width: 100% !important;
}
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview .preview-submit-button button {
  width: 100% !important;
  height: 40px !important;
  border: 0 !important;
  border-radius: 6px !important;
  line-height: 0px !important;
}
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .form-preview .preview-submit-button button:hover {
  cursor: pointer !important;
}
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .powered-by-line {
  color: #231f20 !important;
  font-family: "Montserrat" !important;
  font-size: 13px !important;
  font-weight: 400 !important;
  line-height: 25px !important;
  text-align: center !important;
  text-decoration: none !important;
  display: flex !important;
  width: 100% !important;
  justify-content: center !important;
  align-items: center !important;
  margin-top: 10px !important;
}
.followit--follow-form-container[attr-a][attr-b][attr-c][attr-d][attr-e][attr-f] .powered-by-line img {
  margin-left: 10px !important;
  height: 1.13em !important;
  max-height: 1.13em !important;
}
</style><div class="followit--follow-form-container" attr-a attr-b attr-c attr-d attr-e attr-f><form data-v-1bbcb9ec="" action="https://api.follow.it/subscription-form/SFBkSys2Mm94QnFCdHVFV2hjN1IwNDNIemx3OE5UdWVER1djcWYvSGUxemdLalBGRU4wY3pqck9qNk9DeEhUbnhraUVFR0lIUG1RYnNVZmlCYzBzQmlrY1ZZUUR3ZnJ3N2dvQUdlTXZmVGtwQmVLa1JubzNKM01oUjgwZ2VUdjN8Z2lIRFI3T0FFaW9LU0YrRzRyWm1CVjhlNko0d1h3K1d6UnVtMzhNSllodz0=/8" method="post"><div data-v-1bbcb9ec="" class="form-preview" style="background-color: rgb(67, 67, 67); position: relative;"><div data-v-1bbcb9ec="" class="preview-heading"><h5 data-v-1bbcb9ec="" style="text-transform: none !important; font-family: Arial; font-weight: bold; color: rgb(183, 181, 181); font-size: 16px; text-align: center;" _msttexthash="82650399" _msthash="3440">订阅本站，随时关注最新动态！</h5></div> <div data-v-1bbcb9ec="" class="preview-input-field"><input data-v-1bbcb9ec="" type="email" name="email" required="required" placeholder="请输入邮箱地址" spellcheck="false" _mstplaceholder="26120809" _msthash="3396" style="text-transform: none !important; font-family: Arial; font-weight: normal; color: rgb(0, 0, 0); font-size: 14px; text-align: center; background-color: rgb(255, 255, 255);"></div> <div data-v-1bbcb9ec="" class="preview-submit-button"><button data-v-1bbcb9ec="" type="submit" style="text-transform: none !important; font-family: Arial; font-weight: bold; color: rgb(255, 255, 255); font-size: 16px; text-align: center; background-color: rgb(0, 0, 0);" _msttexthash="15698254" _msthash="3441">确认订阅</button></div></div></form></div> 
    
<br>                 
                
<!--内容页下方ads -->	
<?php if($this->options->postdownads): ?> <div class="" ><?php $this->options->postdownads();?></div> <?php endif; ?>
                   
                </article>
                 <?php $this->need('comments.php'); ?>
            </section>
        </div>
		</div>
 <?php $this->need('footer.php'); ?>