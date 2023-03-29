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
                <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
                    <div class="content" itemprop="articleBody">
                        <?php parseContent($this); ?>											           
                    </div>
                </article>                   
                  <!-- 爱情计时器 -->
                  <style>.touxiang{width:80px;height:80px;vertical-align:-20px;border-radius:50%;margin-right:5px;margin-bottom:5px;-webkit-box-shadow:1px 1px 1px rgba(0,0,0,.1),1px 1px 1px rgba(0,0,0,0.1),1px 1px 1px rgba(0,0,0,0.1);box-shadow:1px 1px 1px rgba(0,0,0,.1),1px 1px 1px rgba(0,0,0,0.1),1px 1px 1px rgba(0,0,0,0.1);border:2px solid #fff}.my-face{-webkit-animation:haha 5s infinite ease-in-out;animation:haha 5s infinite ease-in-out;display:inline-block;margin:0 5px}@-webkit-keyframes haha{2%,24%,80%{-webkit-transform:translate(0,1.5px) rotate(1.5deg);transform:translate(0,1.5px) rotate(1.5deg)}4%,68%,98%{-webkit-transform:translate(0,-1.5px) rotate(-0.5deg);transform:translate(0,-1.5px) rotate(-0.5deg)}38%,6%{-webkit-transform:translate(0,1.5px) rotate(-1.5deg);transform:translate(0,1.5px) rotate(-1.5deg)}8%,86%{-webkit-transform:translate(0,-1.5px) rotate(-1.5deg);transform:translate(0,-1.5px) rotate(-1.5deg)}10%,72%{-webkit-transform:translate(0,2.5px) rotate(1.5deg);transform:translate(0,2.5px) rotate(1.5deg)}12%,64%,78%,96%{-webkit-transform:translate(0,-0.5px) rotate(1.5deg);transform:translate(0,-0.5px) rotate(1.5deg)}14%,54%{-webkit-transform:translate(0,-1.5px) rotate(1.5deg);transform:translate(0,-1.5px) rotate(1.5deg)}16%{-webkit-transform:translate(0,-0.5px) rotate(-1.5deg);transform:translate(0,-0.5px) rotate(-1.5deg)}18%,22%{-webkit-transform:translate(0,0.5px) rotate(-1.5deg);transform:translate(0,0.5px) rotate(-1.5deg)}20%,36%,46%{-webkit-transform:translate(0,-1.5px) rotate(2.5deg);transform:translate(0,-1.5px) rotate(2.5deg)}26%,50%{-webkit-transform:translate(0,0.5px) rotate(0.5deg);transform:translate(0,0.5px) rotate(0.5deg)}28%{-webkit-transform:translate(0,0.5px) rotate(1.5deg);transform:translate(0,0.5px) rotate(1.5deg)}30%,40%,62%,76%,88%{-webkit-transform:translate(0,-0.5px) rotate(2.5deg);transform:translate(0,-0.5px) rotate(2.5deg)}32%,34%,66%{-webkit-transform:translate(0,1.5px) rotate(-0.5deg);transform:translate(0,1.5px) rotate(-0.5deg)}42%{-webkit-transform:translate(0,2.5px) rotate(-1.5deg);transform:translate(0,2.5px) rotate(-1.5deg)}44%,70%{-webkit-transform:translate(0,1.5px) rotate(0.5deg);transform:translate(0,1.5px) rotate(0.5deg)}48%,74%,82%{-webkit-transform:translate(0,-0.5px) rotate(0.5deg);transform:translate(0,-0.5px) rotate(0.5deg)}52%,56%,60%{-webkit-transform:translate(0,2.5px) rotate(2.5deg);transform:translate(0,2.5px) rotate(2.5deg)}58%{-webkit-transform:translate(0,0.5px) rotate(2.5deg);transform:translate(0,0.5px) rotate(2.5deg)}84%{-webkit-transform:translate(0,1.5px) rotate(2.5deg);transform:translate(0,1.5px) rotate(2.5deg)}90%{-webkit-transform:translate(0,2.5px) rotate(-0.5deg);transform:translate(0,2.5px) rotate(-0.5deg)}92%{-webkit-transform:translate(0,0.5px) rotate(-0.5deg);transform:translate(0,0.5px) rotate(-0.5deg)}94%{-webkit-transform:translate(0,2.5px) rotate(0.5deg);transform:translate(0,2.5px) rotate(0.5deg)}0%,100%{-webkit-transform:translate(0,0) rotate(0);transform:translate(0,0) rotate(0)}}@keyframes haha{2%,24%,80%{-webkit-transform:translate(0,1.5px) rotate(1.5deg);transform:translate(0,1.5px) rotate(1.5deg)}4%,68%,98%{-webkit-transform:translate(0,-1.5px) rotate(-0.5deg);transform:translate(0,-1.5px) rotate(-0.5deg)}38%,6%{-webkit-transform:translate(0,1.5px) rotate(-1.5deg);transform:translate(0,1.5px) rotate(-1.5deg)}8%,86%{-webkit-transform:translate(0,-1.5px) rotate(-1.5deg);transform:translate(0,-1.5px) rotate(-1.5deg)}10%,72%{-webkit-transform:translate(0,2.5px) rotate(1.5deg);transform:translate(0,2.5px) rotate(1.5deg)}12%,64%,78%,96%{-webkit-transform:translate(0,-0.5px) rotate(1.5deg);transform:translate(0,-0.5px) rotate(1.5deg)}14%,54%{-webkit-transform:translate(0,-1.5px) rotate(1.5deg);transform:translate(0,-1.5px) rotate(1.5deg)}16%{-webkit-transform:translate(0,-0.5px) rotate(-1.5deg);transform:translate(0,-0.5px) rotate(-1.5deg)}18%,22%{-webkit-transform:translate(0,0.5px) rotate(-1.5deg);transform:translate(0,0.5px) rotate(-1.5deg)}20%,36%,46%{-webkit-transform:translate(0,-1.5px) rotate(2.5deg);transform:translate(0,-1.5px) rotate(2.5deg)}26%,50%{-webkit-transform:translate(0,0.5px) rotate(0.5deg);transform:translate(0,0.5px) rotate(0.5deg)}28%{-webkit-transform:translate(0,0.5px) rotate(1.5deg);transform:translate(0,0.5px) rotate(1.5deg)}30%,40%,62%,76%,88%{-webkit-transform:translate(0,-0.5px) rotate(2.5deg);transform:translate(0,-0.5px) rotate(2.5deg)}32%,34%,66%{-webkit-transform:translate(0,1.5px) rotate(-0.5deg);transform:translate(0,1.5px) rotate(-0.5deg)}42%{-webkit-transform:translate(0,2.5px) rotate(-1.5deg);transform:translate(0,2.5px) rotate(-1.5deg)}44%,70%{-webkit-transform:translate(0,1.5px) rotate(0.5deg);transform:translate(0,1.5px) rotate(0.5deg)}48%,74%,82%{-webkit-transform:translate(0,-0.5px) rotate(0.5deg);transform:translate(0,-0.5px) rotate(0.5deg)}52%,56%,60%{-webkit-transform:translate(0,2.5px) rotate(2.5deg);transform:translate(0,2.5px) rotate(2.5deg)}58%{-webkit-transform:translate(0,0.5px) rotate(2.5deg);transform:translate(0,0.5px) rotate(2.5deg)}
        84%{-webkit-transform:translate(0,1.5px) rotate(2.5deg);transform:translate(0,1.5px) rotate(2.5deg)}90%{-webkit-transform:translate(0,2.5px) rotate(-0.5deg);transform:translate(0,2.5px) rotate(-0.5deg)}92%{-webkit-transform:translate(0,0.5px) rotate(-0.5deg);transform:translate(0,0.5px) rotate(-0.5deg)}94%{-webkit-transform:translate(0,2.5px) rotate(0.5deg);transform:translate(0,2.5px) rotate(0.5deg)}0%,100%{-webkit-transform:translate(0,0) rotate(0);transform:translate(0,0) rotate(0)}}@-webkit-keyframes slide{0%{-webkit-transform:scale(1);transform:scale(1)}50%{opacity:.3;-webkit-transform:scale(2);transform:scale(2)}100%{-webkit-transform:scale(1);transform:scale(1)}}.texts{letter-spacing:.03rem;padding:.2em;-webkit-box-sizing:border-box;box-sizing:border-box;border:0;font-size:1.5rem;word-wrap:break-word;outline:0;-webkit-appearance:none;background:transparent;line-height:30px;color:#f77777;width:100%;text-align:center!important;margin-top:10px;margin-bottom:15px}</style>
              <div  class="main_element" style="text-align:center;margin:3rem 0;padding:3rem 0;">
                        <img class="touxiang" src="https://cravatar.cn/avatar/74f46cfaa3e14600f5f55619346b6e70?s=50&r=R&d=mm">
                        <svg class="my-face" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" width="50" height="50"><path d="M866.944 256.768c-95.488-95.488-250.496-95.488-345.984 0l-13.312 13.312-9.472-9.472c-93.824-93.824-246.656-100.736-343.68-10.368-101.888 94.976-104.064 254.592-6.4 352.256l13.568 13.568 299.264 299.264c25.728 25.728 67.584 25.728 93.44 0l312.576-312.576c95.488-95.488 95.488-250.368 0-345.984zM335.36 352.64c-20.48 0-40.832 6.016-56.704 18.944a85.4912 85.4912 0 0 0-6.912 126.976c9.984 9.984 9.984 26.24 0 36.224l-3.2 3.2c-8.192 8.192-21.632 8.192-29.952 0-52.608-52.608-57.216-138.496-6.528-192.896 26.112-28.032 61.952-43.52 100.096-43.52 14.08 0 25.6 11.52 25.6 25.6v3.072c0 12.416-9.984 22.4-22.4 22.4z" p-id="21617" data-spm-anchor-id="a313x.7781069.0.i46" class="selected" fill="#FF2727"></path></svg>
                        <img class="touxiang" src="https://cravatar.cn/avatar/f1af11072944f28411000d017bfb0003.png?s=100&d=retro&r=y"><br>                
                    <p style="text-align:center;">
                        <span class="lover-card-title">Sometimes meeting is a kind of fate.</span><br/>
                        <span class="lover-card-title">How long have we known each other?</span><br/>
                        <span class="lover-card-title">It's been</span> <span class="texts"><?php /** 爱情计时器 */ function lovedtoDays($day1, $day2) {   $second1 = strtotime($day1);   $second2 = strtotime($day2);    if ($second1 < $second2) {     $tmp = $second2;     $second2 = $second1;     $second1 = $tmp;   }   return ($second1 - $second2) / 86400; } $day1 = "2022-07-28"; $day2 = date('Y-m-d'); $diff = lovedtoDays($day1, $day2); echo $diff."\n"; ?></span> <span class="lover-card-title">Days.</span> 
		            </p>
              </div>          
                  <!-- 爱情计时器结束 -->   
        <section  class="home">
            <div  class="main_element">
                <section class="Links-content">
	                <div  style="margin: 0;padding:0 .5em 3rem .5em;max-width: none;"><?php echo GetHitokoto(); ?></div>
                </section>
            </div>
        </section>          
                 <?php $this->need('comments1.php'); ?>
            </section>
		</div>
 <?php $this->need('footer.php'); ?>