<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
define('INITIAL_VERSION_NUMBER', '1.6.9');
function themeConfig($form) {
    $logoimg = new Typecho_Widget_Helper_Form_Element_Text('logoimg', NULL, NULL, _t('页头logo地址'), _t('一般为https://www.80srz.com/image.png,支持 https:// 或 //,留空则使用默认图片'));
    $form->addInput($logoimg->addRule('xssCheck', _t('请不要在图片链接中使用特殊字符')));
    $favicon = new Typecho_Widget_Helper_Form_Element_Text('favicon', NULL, NULL, _t('favicon地址'), _t('一般为https://www.80srz.com/image.ico,支持 https:// 或 //,留空则不设置favicon'));
    $form->addInput($favicon->addRule('xssCheck', _t('请不要在图片链接中使用特殊字符')));
    $appleicon = new Typecho_Widget_Helper_Form_Element_Text('appleicon', NULL, NULL, _t('apple touch icon地址'), _t('一般为https://www.80srz.com/image.png,支持 https:// 或 //,留空则不设置Apple Touch Icon'));
    $form->addInput($appleicon->addRule('xssCheck', _t('请不要在图片链接中使用特殊字符')));
    $fontfamily = new Typecho_Widget_Helper_Form_Element_Text('fontfamily', NULL, '2.woff2', _t('字体设置'), _t('usr/themes/cactus/lib/meslo-LG/fonts/文件夹内字体名称！！！默认是2.woff2<鸿蒙字体>。'));
    $form->addInput($fontfamily);
    $bodybgimg = new Typecho_Widget_Helper_Form_Element_Text('bodybgimg', NULL, 'webg2.jpg', _t('背景设置'), _t('usr/themes/cactus/images/文件夹内背景图片名称！！！默认是webg2.jpg。'));
    $form->addInput($bodybgimg);	
	$email = new Typecho_Widget_Helper_Form_Element_Text('email', NULL, NULL, _t('Email地址'), _t('邮箱地址 ,留空则不设置Email地址'));
    $form->addInput($email->addRule('xssCheck', _t('请不要在图片链接中使用特殊字符')));
	$github = new Typecho_Widget_Helper_Form_Element_Text('github', NULL, NULL, _t('Github地址'), _t('一般为https://github.com/hygd0813 ,留空则不设置Github地址'));
    $form->addInput($github->addRule('xssCheck', _t('请不要在图片链接中使用特殊字符')));
	$weibo = new Typecho_Widget_Helper_Form_Element_Text('weibo', NULL, NULL, _t('微博地址'), _t('一般为http://www.weibo.com/xxx ,留空则不设置Weibo地址'));
    $form->addInput($weibo->addRule('xssCheck', _t('请不要在图片链接中使用特殊字符')));				
	$beian = new Typecho_Widget_Helper_Form_Element_Text('beian', NULL, NULL, _t('备案号设置'), _t('直接填写备案号即可如：京ICP备888888号'));
    $form->addInput($beian->addRule('xssCheck', _t('请不要在图片链接中使用特殊字符')));
 // 是否开启网站运行时间
    $zmki_time_no = new Typecho_Widget_Helper_Form_Element_Radio('zmki_time_no', array('0' => _t('禁用'), '1' => _t('启用')), '1', _t('是否开启网站运行时间'), _t("选择开启即会在网站底部栏显示网站已运行时间。如开启请不要忘记设置下边的创建时间"));
    $form->addInput($zmki_time_no);
 // 网站运行时间
    $zmki_time = new Typecho_Widget_Helper_Form_Element_Text('zmki_time', NULL, '10/1/2022 20:13:14', _t('网站运行时间'), _t('默认: 10/1/2022 20:13:14  请按照前边的实例按格式填写创建时间，分别是月/日/年 时:分:秒 '));
    $form->addInput($zmki_time);
//  静态资源CDN加速网址设置 	
    $cjcdnAddress = new Typecho_Widget_Helper_Form_Element_Text('cjcdnAddress', NULL, NULL, _t('CSS文件的链接地址替换'), _t('请输入你的CDN云存储地址，例如：https://cdn.jsdelivr.net/gh/hygd0813/cactusplus@main/，支持绝大部分有镜像功能的CDN服务<br><b>被替换的原地址为主题文件位置，即：https://www.80srz.com/usr/themes/cactus/</b>'));
    $form->addInput($cjcdnAddress);	
//走心评论列表设置    
    $commentszx = new Typecho_Widget_Helper_Form_Element_Text('commentszx', NULL, NULL, _t('走心评论'), _t('输入走心评论的coid')); 
    $form->addInput($commentszx);
//首页聚焦图设置    
    $Focuss = new Typecho_Widget_Helper_Form_Element_Textarea('Focuss', NULL, NULL, _t('首页 Focus 链接 设置（注意：切换主题会被清空，注意备份！）'), _t('按照格式输入链接信息，格式：<br><strong>链接标题（必须）|链接地址（必须）|链接图片地址（必须）</strong><br>不同信息之间用英文竖线“|”分隔，例如：<br><strong>荒野孤灯|https://www.80srz.com/|https://www.80srz.com/logo.png</strong>多个链接换行即可，至少三个，一行一个'));
	$form->addInput($Focuss);  
//首页项目示例     		
	$Projectsurl = new Typecho_Widget_Helper_Form_Element_Text('Projectsurl', NULL, NULL, _t('首页Projects跳转地址'), _t('一般为https://www.80srz.com ,留空则默认为#地址'));
    $form->addInput($Projectsurl->addRule('xssCheck', _t('请不要在图片链接中使用特殊字符')));       
    $Projects = new Typecho_Widget_Helper_Form_Element_Textarea('Projects', NULL, NULL, _t('首页 Projects 作品链接 设置（注意：切换主题会被清空，注意备份！）'), _t('按照格式输入链接信息，格式：<br><strong>链接名称（必须）|链接地址（必须）|链接描述</strong><br>不同信息之间用英文竖线“|”分隔，例如：<br><strong>荒野孤灯|https://www.80srz.com/|荒野中的一盏孤灯，照亮夜里依然前行的人们！</strong><br>若中间有暂时不想填的信息，请留空，例如暂时不想填写链接描述：<br><strong>荒野孤灯|https://www.80srz.com/||</strong><br>多个链接换行即可，一行一个'));
	$form->addInput($Projects);
//友情链接设置   
	$Links = new Typecho_Widget_Helper_Form_Element_Textarea('Links', NULL, NULL, _t('友情链接设置（注意：切换主题会被清空，注意备份！）'), _t('按照格式输入链接信息，格式：<br><strong>链接名称（必须）|链接地址（必须）|链接描述|头像地址</strong><br>不同信息之间用英文竖线“|”分隔，例如：<br><strong>荒野孤灯|https://www.80srz.com/|荒野中的一盏孤灯，照亮夜里依然前行的人们！|fav.icon</strong><br>多个链接换行即可，一行一个'));
	$form->addInput($Links);
 //  首页不显示分类设置  
    $nolist = new Typecho_Widget_Helper_Form_Element_Text('nolist', NULL, NULL, _t('首页不显示某特定分类'), _t('仅用在首页，首页不显示某分类，填入<b style="color: red;">mid</b>数字，隐藏多个分类用半角逗号分开！！！'));
    $form->addInput($nolist); 
 //   页底统计跳转 
    $bdtongji = new Typecho_Widget_Helper_Form_Element_Text('bdtongji', NULL, NULL, _t('网站统计跳转链接'), _t('页底 网站统计 跳转链接，到百度统计、cnzz申请。'));
    $form->addInput($bdtongji);	
 //  header 搜索引擎主动推送代码	
    $headertjcode = new Typecho_Widget_Helper_Form_Element_Textarea('headertjcode', NULL, NULL, _t('header 搜索引擎主动推送代码'), _t('header 搜索引擎主动推送代码。'));
    $form->addInput($headertjcode);
 //  footer 第三方统计代码	
    $footertjcode = new Typecho_Widget_Helper_Form_Element_Textarea('footertjcode', NULL, NULL, _t('footer 第三方统计代码'), _t('footer 第三方统计代码。'));
    $form->addInput($footertjcode);    
 //  页脚全局ads	
    $footerimgad = new Typecho_Widget_Helper_Form_Element_Textarea('footerimgad', NULL, NULL, _t('页底图片广告代码'), _t('页底图片广告代码。'));
    $form->addInput($footerimgad);
  //  文章列表页、页面ads
	$listpageads = new Typecho_Widget_Helper_Form_Element_Textarea('listpageads', NULL, NULL, _t('文章列表页、页面ads'), _t('文章列表页、页面ads,图片建议800*200px，内容随意！'));
    $form->addInput($listpageads); 
 //  内容页下方ads   
	$postdownads = new Typecho_Widget_Helper_Form_Element_Textarea('postdownads', NULL, NULL, _t('内容页下方ads'), _t('内容页下方ads,图片建议800*200px，内容随意！'));
    $form->addInput($postdownads);	
 //  内容页推荐列表左侧ads   
	$postlistleftads = new Typecho_Widget_Helper_Form_Element_Textarea('postlistleftads', NULL, NULL, _t('内容页推荐列表左侧ads '), _t('内容页推荐列表左侧ads ,图片建议400*200px，内容随意！'));
    $form->addInput($postlistleftads);	  
 //  内容页推荐列表右侧ads   
	$postlistrightads = new Typecho_Widget_Helper_Form_Element_Textarea('postlistrightads', NULL, NULL, _t('内容页推荐列表右侧ads '), _t('内容页推荐列表右侧ads ,图片建议400*200px，内容随意！'));
    $form->addInput($postlistrightads);	    
 //  内容页左侧ads
    $postleftads = new Typecho_Widget_Helper_Form_Element_Textarea('postleftads', NULL, NULL, _t('内容页左侧ads'), _t('内容页左侧ads,图片建议600*180px，内容随意！'));
    $form->addInput($postleftads);
 //  首页公告
    $indexmbads = new Typecho_Widget_Helper_Form_Element_Textarea('indexmbads', NULL, NULL, _t('首页公告'), _t('首页蒙版公告！'));
    $form->addInput($indexmbads);
 //  首页公告开关
    $indexmbadskaiguan = new Typecho_Widget_Helper_Form_Element_Select('indexmbadskaiguan',array('0'=>'不开启','1'=>'开启'),'0','首页公告','是否开启首页蒙板公告功能。');
    $form->addInput($indexmbadskaiguan);    
 //  目录树开关
	$catalog = new Typecho_Widget_Helper_Form_Element_Radio('catalog',array('able' => _t('启用'),'disable' => _t('禁止'),), 'disable', _t('文章目录设置'), _t('默认显示随机文章，启用则显示文章目录'));
    $form->addInput($catalog);
 //  emoji表情开关  
	$Emoji = new Typecho_Widget_Helper_Form_Element_Radio('Emoji',array('able' => _t('启用'), 'disable' => _t('禁止'),),'disable', _t('Emoji表情设置'), _t('默认显示Emoji表情，如果你的数据库charset配置不是utf8mb4请禁用'));
    $form->addInput($Emoji);
 //  html压缩
    $themecompress = new Typecho_Widget_Helper_Form_Element_Select('themecompress',array('0'=>'不开启','1'=>'开启'),'0','HTML压缩功能','是否开启HTML压缩功能,缩减页面代码');
    $form->addInput($themecompress);
 // 手机底部导航
    $themefooternav = new Typecho_Widget_Helper_Form_Element_Select('themefooternav',array('0'=>'不开启','1'=>'开启'),'0','手机底部导航功能','是否开启手机底部导航功能');
    $form->addInput($themefooternav);
 //  pjax开关
    $themepjax = new Typecho_Widget_Helper_Form_Element_Select('themepjax',array('0'=>'不开启','1'=>'开启'),'0','pjax功能','是否开启pjax功能,加快页面加载速度');
    $form->addInput($themepjax);
    //  鼠标右键美化
    $thememouseright = new Typecho_Widget_Helper_Form_Element_Select('thememouseright',array('0'=>'不开启','1'=>'开启'),'0','鼠标右键美化功能','是否鼠标右键美化功能');
    $form->addInput($thememouseright);
}

function themeFields ($layout) {
    $keyword = new Typecho_Widget_Helper_Form_Element_Textarea('keyword', NULL, NULL, _t('keywords关键词'), _t('多个关键词用英文下逗号隔开'));
    $description = new Typecho_Widget_Helper_Form_Element_Textarea('description', NULL, NULL, _t('description描述'), _t('简单一句话描述'));
    $layout->addItem($keyword);
    $layout->addItem($description);
}

function themeInit($archive) {
    if ($archive->is('index')) {
        $archive->parameter->pageSize = 10; // 自定义条数
    }
	if ($archive->is('single')) {  
    $archive->content = createCatalog($archive->content);//文章锚点实现
}
	@$comment = spam_protection_pre($comment,$post, $result);//数字验证码
	  //创建一个路由
    if ($archive->request->is("commentLike")) {
//功能处理函数 - 评论点赞
commentLikes($archive);
}
}
//新标签页打开连接
function parseContent($obj){
    $options = Typecho_Widget::widget('Widget_Options');
    if(!empty($options->src_add) && !empty($options->cdn_add)){
        $obj->content = str_ireplace($options->src_add,$options->cdn_add,$obj->content);
    }
	$obj->content = preg_replace("/<a href=\"([^\"]*)\">/i", "<a href=\"\\1\">", $obj->content);
    echo trim($obj->content);
}
/**设置CDN**/
function cjUrl($path) {
    $options = Helper::options();
    $ver = '?ver='.constant("INITIAL_VERSION_NUMBER");
    if ($options->cjcdnAddress) {
        echo rtrim($options->cjcdnAddress, '/').'/'.$path.$ver;
    } else {
        $options->themeUrl($path.$ver);
    }
}
/**首页聚焦图片轮播
<?php Focuss(); ?>
*/
function Focuss($sorts = NULL) {
    $options = Typecho_Widget::widget('Widget_Options');
    $Focus = NULL;
    if ($options->Focuss) {
        $list = explode("\r\n", $options->Focuss);
        foreach ($list as $val) {
            list($name, $url, $imgurl, $sort) = explode("|", $val);
            if ($sorts) {
                $arr = explode("|", $sorts);
                if ($sort && in_array($sort, $arr)) {
                    $Focus .= $url ? '<section class="swiper-slide col-md-4"><div class="swiper-slide"><div class="thslidelist gundongimg "><a href="'.$url.'" target="_blank" style="background: none;"><img src="'.$imgurl.'" alt="'.$name.'" width="100%" height="120px" style="border-radius: 5px;"><p style="text-align: center;"><small>'.$name.'</small></p></a></div></div></section>' : '<section class="swiper-slide col-md-4"><div class="swiper-slide"><div class="thslidelist gundongimg "><a href="'.$url.'" target="_blank" style="background: none;"><img src="'.$imgurl.'" alt="'.$name.'" width="100%" height="120px" style="border-radius: 5px;"><p style="text-align: center;"><small>'.$name.'</small></p></a></div></div></section>';
                }
            } else {
                    $Focus .= $url ? '<section class="swiper-slide col-md-4"><div class="swiper-slide"><div class="thslidelist gundongimg "><a href="'.$url.'" target="_blank" style="background: none;"><img src="'.$imgurl.'" alt="'.$name.'" width="100%" height="120px" style="border-radius: 5px;"><p style="text-align: center;"><small>'.$name.'</small></p></a></div></div></section>' : '<section class="swiper-slide col-md-4"><div class="swiper-slide"><div class="thslidelist gundongimg "><a href="'.$url.'" target="_blank" style="background: none;"><img src="'.$imgurl.'" alt="'.$name.'" width="100%" height="120px" style="border-radius: 5px;"><p style="text-align: center;"><small>'.$name.'</small></p></a></div></div></section>';
            }
        }
    }
    echo $Focus ? $Focus : '荒野中的一盏孤灯，照亮夜里依然前行的人们';
}

/**项目展示
<?php Projects(); ?>
*/
function Projects($sorts = NULL) {
    $options = Typecho_Widget::widget('Widget_Options');
    $Project = NULL;
    if ($options->Projects) {
        $list = explode("\r\n", $options->Projects);
        foreach ($list as $val) {
            list($name, $url, $description, $sort) = explode("|", $val);
            if ($sorts) {
                $arr = explode("|", $sorts);
                if ($sort && in_array($sort, $arr)) {
                    $Project .= $url ? '<li class="project-item"><a href="'.$url.'" target="_blank" title="'.$description.'">'.$name.'</a></li>' : '<li class="project-item">'.$name.': '.$description.'</li>';
                }
            } else {
                    $Project .= $url ? '<li class="project-item"><a href="'.$url.'" target="_blank" title="'.$description.'">'.$name.'</a></li>' : '<li class="project-item">'.$name.': '.$description.'</li>';
            }
        }
    }
    echo $Project ? $Project : '荒野中的一盏孤灯，照亮夜里依然前行的人们';
}
/**友情链接
<?php Links(); ?>
*/
function Links($sorts = NULL) {
    $options = Typecho_Widget::widget('Widget_Options');
    $Link = NULL;
    if ($options->Links) {
        $list = explode("\r\n", $options->Links);
        foreach ($list as $val) {
            list($name, $url, $description, $icon, $sort) = explode("|", $val);
            if ($sorts) {
                $arr = explode("|", $sorts);
                if ($sort && in_array($sort, $arr)) {
                    $Link .= $url ? '<div class="links-card flex-yl link_a" name="link_a"><div class="links-list-item" style=""><a href="'.$url.'" title="'.$name.'" target="_blank"><img class="links-avatar lazy" alt="'.$name.'" data-src="'.$icon.'" src="'.$icon.'"/><div class="links-item-info"><span class="links-item-name text-ell">'.$name.'</span><span class="links-item-desc text-ell" title="'.$description.'">'.$description.'</span></div></a></div></div>':'<li class="project-item">'.$name.': '.$description.'</li>';
                }
            } else {
                    $Link .= $url ? '<div class="links-card flex-yl link_a" name="link_a"><div class="links-list-item" style=""><a href="'.$url.'" title="'.$name.'" target="_blank"><img class="links-avatar lazy" alt="'.$name.'" data-src="'.$icon.'" src="'.$icon.'"/><div class="links-item-info"><span class="links-item-name text-ell">'.$name.'</span><span class="links-item-desc text-ell" title="'.$description.'">'.$description.'</span></div></a></div></div>':'<li class="project-item">'.$name.': '.$description.'</li>';
            }
        }
    }
    echo $Link ? $Link : '荒野中的一盏孤灯，照亮夜里依然前行的人们';
}
/**阅读浏览次数 
<?php Postviews($this); ?>
*/
function Postviews($archive) {
    $db = Typecho_Db::get();
    $cid = $archive->cid;
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `'.$db->getPrefix().'contents` ADD `views` INT(10) DEFAULT 0;');
    }
    $exist = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid))['views'];
    if ($archive->is('single')) {
        $cookie = Typecho_Cookie::get('contents_views');
        $cookie = $cookie ? explode(',', $cookie) : array();
        if (!in_array($cid, $cookie)) {
            $db->query($db->update('table.contents')
                ->rows(array('views' => (int)$exist+1))
                ->where('cid = ?', $cid));
            $exist = (int)$exist+1;
            array_push($cookie, $cid);
            $cookie = implode(',', $cookie);
            Typecho_Cookie::set('contents_views', $cookie);
        }
    } 
    echo $exist == 0 ?  : $exist;
}
/**随机文章 
<?php theme_random_posts(); ?>
**/
function theme_random_posts(){
$defaults = array(
'number' => 6,
'xformat' => '<li><a href="{permalink}">{title}</a></li>'
);
$db = Typecho_Db::get();
$adapterName = $db->getAdapterName();//兼容非MySQL数据库
if($adapterName == 'pgsql' || $adapterName == 'Pdo_Pgsql' || $adapterName == 'Pdo_SQLite' || $adapterName == 'SQLite'){
   $order_by = 'RANDOM()';
   }else{
   $order_by = 'RAND()';
 }
$sql = $db->select()->from('table.contents') 
->where('status = ?','publish')
->where('type = ?', 'post')
->where('created <= unix_timestamp(now())', 'post') //添加这一句避免未达到时间的文章提前曝光
->limit($defaults['number'])
->order($order_by);
$result = $db->fetchAll($sql);
foreach($result as $val){
$val = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($val);
echo str_replace(array('{permalink}', '{title}'),array($val['permalink'], $val['title']), $defaults['xformat']);
}
}
//html压缩 
/***
<?php $html_source = ob_get_contents(); ob_clean(); print compressHtml($html_source); ob_end_flush(); ?>
**/
function compressHtml($html_source) {
    $chunks = preg_split('/(<!--<nocompress>-->.*?<!--<\/nocompress>-->|<nocompress>.*?<\/nocompress>|<pre.*?\/pre>|<textarea.*?\/textarea>|<script.*?\/script>)/msi', $html_source, -1, PREG_SPLIT_DELIM_CAPTURE);
    $compress = '';
    foreach ($chunks as $c) {
        if (strtolower(substr($c, 0, 19)) == '<!--<nocompress>-->') {
            $c = substr($c, 19, strlen($c) - 19 - 20);
            $compress .= $c;
            continue;
        } else if (strtolower(substr($c, 0, 12)) == '<nocompress>') {
            $c = substr($c, 12, strlen($c) - 12 - 13);
            $compress .= $c;
            continue;
        } else if (strtolower(substr($c, 0, 4)) == '<pre' || strtolower(substr($c, 0, 9)) == '<textarea') {
            $compress .= $c;
            continue;
        } else if (strtolower(substr($c, 0, 7)) == '<script' && strpos($c, '//') != false && (strpos($c, "\r") !== false || strpos($c, "\n") !== false)) {
            $tmps = preg_split('/(\r|\n)/ms', $c, -1, PREG_SPLIT_NO_EMPTY);
            $c = '';
            foreach ($tmps as $tmp) {
                if (strpos($tmp, '//') !== false) {
                    if (substr(trim($tmp), 0, 2) == '//') {
                        continue;
                    }
                    $chars = preg_split('//', $tmp, -1, PREG_SPLIT_NO_EMPTY);
                    $is_quot = $is_apos = false;
                    foreach ($chars as $key => $char) {
                        if ($char == '"' && $chars[$key - 1] != '\\' && !$is_apos) {
                            $is_quot = !$is_quot;
                        } else if ($char == '\'' && $chars[$key - 1] != '\\' && !$is_quot) {
                            $is_apos = !$is_apos;
                        } else if ($char == '/' && $chars[$key + 1] == '/' && !$is_quot && !$is_apos) {
                            $tmp = substr($tmp, 0, $key);
                            break;
                        }
                    }
                }
                $c .= $tmp;
            }
        }
        $c = preg_replace('/[\\n\\r\\t]+/', ' ', $c);
        $c = preg_replace('/\\s{2,}/', ' ', $c);
        $c = preg_replace('/>\\s</', '> <', $c);
        $c = preg_replace('/\\/\\*.*?\\*\\//i', '', $c);
        $c = preg_replace('/<!--[^!]*-->/', '', $c);
        $compress .= $c;
    }
    return $compress;
}

//为文章标题添加锚点
function createCatalog($obj) {    
    global $catalog;
    global $catalog_count;
    $catalog = array();
    $catalog_count = 0;
    $obj = preg_replace_callback('/<h([1-6])(.*?)>(.*?)<\/h\1>/i', function($obj) {
        global $catalog;
        global $catalog_count;
        $catalog_count ++;
        $catalog[] = array('text' => trim(strip_tags($obj[3])), 'depth' => $obj[1], 'count' => $catalog_count);
        return '<h'.$obj[1].$obj[2].'><a name="cl-'.$catalog_count.'"></a>'.$obj[3].'</h'.$obj[1].'>';
    }, $obj);
    return $obj;
}
//输出文章目录容器
function getCatalog() {    
    global $catalog;
    $index = '';
    if ($catalog) {
        
        $prev_depth = '';
        $to_depth = 0;
        foreach($catalog as $catalog_item) {
            $catalog_depth = $catalog_item['depth'];
            if ($prev_depth) {
                if ($catalog_depth == $prev_depth) {
                    $index .= '</li>';
                } elseif ($catalog_depth > $prev_depth) {
                    $to_depth++;
                   
                } else {
                    $to_depth2 = ($to_depth > ($prev_depth - $catalog_depth)) ? ($prev_depth - $catalog_depth) : $to_depth;
                    if ($to_depth2) {
                        for ($i=0; $i<$to_depth2; $i++) {
                            $index .= '</li>';
                            $to_depth--;
                        }
                    }
                    $index .= '</li>';
                }
            }
            $index .= '<li class="toc-level-'.$catalog_depth.'"><a href="#cl-'.$catalog_item['count'].'">'.$catalog_item['text'].'</a>';
            $prev_depth = $catalog_item['depth'];
        }
        for ($i=0; $i<=$to_depth; $i++) {
            $index .= '</li>';
        }
    }
    echo $index;
}
/**
 * 根据$coid获取链接
 */
function getPermalinkFromCoid($coid)
{
    $db = Typecho_Db::get();
    $options = Helper::options();
    $contents = Typecho_Widget::widget('Widget_Abstract_Contents');
    $row = $db->fetchRow($db->select('cid, type, author, text')->from('table.comments')->where('coid = ? AND status = ?', $coid, 'approved'));
    if (empty($row)) {
        return 'Comment not found!';
    }
    $cid = $row['cid'];
    $select = $db->select('coid, parent')->from('table.comments')->where('cid = ? AND status = ?', $cid, 'approved')->order('coid');
    if ($options->commentsShowCommentOnly) {
        $select->where('type = ?', 'comment');
    }
    $comments = $db->fetchAll($select);
    if ($options->commentsOrder == 'DESC') {
        $comments = array_reverse($comments);
    }
    foreach ($comments as $key => $val) {
        $array[$val['coid']] = $val['parent'];
    }
    $i = $coid;
    while ($i != 0) {
        $break = $i;
        $i = $array[$i];
    }
    $count = 0;
    foreach ($array as $key => $val) {
        if ($val == 0) {
            $count++;
        }
        if ($key == $break) {
            break;
        }
    }
    $parentContent = $contents->push($db->fetchRow($contents->select()->where('table.contents.cid = ?', $cid)));
    $permalink = rtrim($parentContent['permalink'], '/');
    $page = ($options->commentsPageBreak) ? '/comment-page-' . ceil($count / $options->commentsPageSize) : (substr($permalink, -5, 5) == '.html' ? '' : '/');
    return array("author" => $row['author'], "text" => $row['text'], "href" => "{$permalink}{$page}#{$row['type']}-{$coid}");
}
//算术验证评论
function spam_protection_math(){
    $num1=rand(2,8);
    $num2=rand(3,9);
    echo "$num1 + $num2 = ";
    echo "<input type=\"text\" name=\"sum\" class=\"vnick vinput\" value=\"\" size=\"25\" tabindex=\"4\" style=\" width:48px;\" placeholder=\"验证码\">\n";
    echo "<input type=\"hidden\" name=\"num1\" value=\"$num1\">\n";
    echo "<input type=\"hidden\" name=\"num2\" value=\"$num2\">";
}
function spam_protection_pre($comment, $post, $result){
    $sum=$_POST['sum'];
    switch($sum){
        case $_POST['num1']+$_POST['num2']:
        break;
        case null:
        throw new Typecho_Widget_Exception(_t('对不起: 请输入验证码。<a href="javascript:history.back(-1)">返回上一页</a>。','评论失败'));
        break;
        default:
        throw new Typecho_Widget_Exception(_t('对不起: 验证码错误，请<a href="javascript:history.back(-1)">返回重试</a>。','评论失败'));
    }
    return $comment;
}
/**
* 文章点赞功能
*/
function agreeNum($cid) {
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();   
    //  判断点赞数量字段是否存在
    if (!array_key_exists('agree', $db->fetchRow($db->select()->from('table.contents')))) {
        //  在文章表中创建一个字段用来存储点赞数量
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `agree` INT(10) NOT NULL DEFAULT 0;');
    }
    //  查询出点赞数量
    $agree = $db->fetchRow($db->select('table.contents.agree')->from('table.contents')->where('cid = ?', $cid));
    //  获取记录点赞的 Cookie
    $AgreeRecording = Typecho_Cookie::get('typechoAgreeRecording');
    //  判断记录点赞的 Cookie 是否存在
    if (empty($AgreeRecording)) {
        //  如果不存在就写入 Cookie
        Typecho_Cookie::set('typechoAgreeRecording', json_encode(array(0)));
    }
    //  返回
    return array(
        //  点赞数量
        'agree' => $agree['agree'],
        //  文章是否点赞过
        'recording' => in_array($cid, json_decode(Typecho_Cookie::get('typechoAgreeRecording')))?true:false
    );
}
function agree($cid) {
    $db = Typecho_Db::get();
    //  根据文章的 `cid` 查询出点赞数量
    $agree = $db->fetchRow($db->select('table.contents.agree')->from('table.contents')->where('cid = ?', $cid));

    //  获取点赞记录的 Cookie
    $agreeRecording = Typecho_Cookie::get('typechoAgreeRecording');
    //  判断 Cookie 是否存在
    if (empty($agreeRecording)) {
        //  如果 cookie 不存在就创建 cookie
        Typecho_Cookie::set('typechoAgreeRecording', json_encode(array($cid)));
    }else {
        //  把 Cookie 的 JSON 字符串转换为 PHP 对象
        $agreeRecording = json_decode($agreeRecording);
        //  判断文章是否点赞过
        if (in_array($cid, $agreeRecording)) {
            //  如果当前文章的 cid 在 cookie 中就返回文章的赞数，不再往下执行
            return $agree['agree'];
        }
        //  添加点赞文章的 cid
        array_push($agreeRecording, $cid);
        //  保存 Cookie
        Typecho_Cookie::set('typechoAgreeRecording', json_encode($agreeRecording));
    }

    //  更新点赞字段，让点赞字段 +1
    $db->query($db->update('table.contents')->rows(array('agree' => (int)$agree['agree'] + 1))->where('cid = ?', $cid));
    //  查询出点赞数量
    $agree = $db->fetchRow($db->select('table.contents.agree')->from('table.contents')->where('cid = ?', $cid));
    //  返回点赞数量
    return $agree['agree'];
}
/**
* 自动添加tag标签
*/
Typecho_Plugin::factory('admin/write-post.php')->bottom = array('tagshelper', 'tagslist');
class tagshelper {
    public static function tagslist()
    {      
    $tag="";$taglist="";$i=0;//循环一次利用到两个位置
Typecho_Widget::widget('Widget_Metas_Tag_Cloud', 'sort=count&desc=1&limit=200')->to($tags);
while ($tags->next()) {
$tag=$tag."'".$tags->name."',";
$taglist=$taglist."<a id=".$i." onclick=\"$(\'#tags\').tokenInput(\'add\', {id: \'".$tags->name."\', tags: \'".$tags->name."\'});\">".$tags->name."</a>";
$i++;
}
?><style>.Posthelper a{cursor: pointer; padding: 0px 6px; margin: 2px 0;display: inline-block;border-radius: 2px;text-decoration: none;}
.Posthelper a:hover{background: #ccc;color: #fff;}.fullscreen #tab-files{right: 0;}/*解决全屏状态下鼠标放到附件上传按钮上导致的窗口抖动问题*/
</style>
<script>
  function chaall () {
   var html='';
 $("#file-list li .insert").each(function(){
   var t = $(this), p = t.parents('li');
   var file=t.text();
   var url= p.data('url');
   var isImage= p.data('image');
   if ($("input[name='markdown']").val()==1) {
   html = isImage ? html+'\n!['+file+'](' + url + ')\n':''+html+'';
   }else{
   html = isImage ? html+'<img src="' + url + '" alt="' + file + '" />\n':''+html+'';
   }
    });
   var textarea = $('#text');
   textarea.replaceSelection(html);return false;
    }
    function chaquan () {
   var html='';
 $("#file-list li .insert").each(function(){
   var t = $(this), p = t.parents('li');
   var file=t.text();
   var url= p.data('url');
   var isImage= p.data('image');
   if ($("input[name='markdown']").val()==1) {
   html = isImage ? html+'':html+'\n['+file+'](' + url + ')\n';
   }else{
   html = isImage ? html+'':html+'<a href="' + url + '"/>' + file + '</a>\n';
   }
    });
   var textarea = $('#text');
   textarea.replaceSelection(html);return false;
    }
function filter_method(text, badword){
    //获取文本输入框中的内容
    var value = text;
    var res = '';
    //遍历敏感词数组
    for(var i=0; i<badword.length; i++){
        var reg = new RegExp(badword[i],"g");
        //判断内容中是否包括敏感词        
        if (value.indexOf(badword[i]) > -1) {
            $('#tags').tokenInput('add', {id: badword[i], tags: badword[i]});
        }
    }
    return;
}
var badwords = [<?php echo $tag; ?>];
function chatag(){
var textarea=$('#text').val();
filter_method(textarea, badwords); 
}
  $(document).ready(function(){
    $('#file-list').after('<div class="Posthelper"><a class="w-100" onclick=\"chaall()\" style="background: #467B96;background-color: #3c6a81;text-align: center; padding: 5px 0; color: #fbfbfb; box-shadow: 0 1px 5px #ddd;">插入所有图片</a><a class="w-100" onclick=\"chaquan()\" style="background: #467B96;background-color: #3c6a81;text-align: center; padding: 5px 0; color: #fbfbfb; box-shadow: 0 1px 5px #ddd;">插入所有非图片附件</a></div>');
    $('#tags').after('<div style="margin-top: 35px;" class="Posthelper"><ul style="list-style: none;border: 1px solid #D9D9D6;padding: 6px 12px; max-height: 240px;overflow: auto;background-color: #FFF;border-radius: 2px;margin-bottom: 0;"><?php echo $taglist; ?></ul><a class="w-100" onclick=\"chatag()\" style="background: #467B96;background-color: #3c6a81;text-align: center; padding: 5px 0; color: #fbfbfb; box-shadow: 0 1px 5px #ddd;">检测内容插入标签</a></div>');
  }); 
  </script>
<?php
    }
}
/**
* 热门文章
*/
class Widget_Post_hotview extends Widget_Abstract_Contents
{public function __construct($request, $response, $params = NULL)
    {parent::__construct($request, $response, $params);
        $this->parameter->setDefault(array('pageSize' => $this->options->commentsListSize, 'parentId' => 0, 'ignoreAuthor' => false));
    }
    public function execute()
    {$select  = $this->select()->from('table.contents')
            ->where("table.contents.password IS NULL OR table.contents.password = ''")
            ->where('table.contents.status = ?', 'publish')
            ->where('table.contents.created <= ?', time())
            ->where('table.contents.type = ?', 'post')
            ->limit($this->parameter->pageSize)
            ->order('table.contents.views', Typecho_Db::SORT_DESC);
        $this->db->fetchAll($select, array($this, 'push'));
    }
}
/*CMS热评文章*/
class Widget_Post_hotpl extends Widget_Abstract_Contents
{public function __construct($request, $response, $params = NULL)
    {parent::__construct($request, $response, $params);
        $this->parameter->setDefault(array('pageSize' => $this->options->commentsListSize, 'parentId' => 0, 'ignoreAuthor' => false));
    }
    public function execute()
    {$select  = $this->select()->from('table.contents')
            ->where("table.contents.password IS NULL OR table.contents.password = ''")
            ->where('table.contents.status = ?', 'publish')
            ->where('table.contents.created <= ?', time())
            ->where('table.contents.type = ?', 'post')
            ->limit($this->parameter->pageSize)
            ->order('table.contents.commentsNum', Typecho_Db::SORT_DESC);
        $this->db->fetchAll($select, array($this, 'push'));
    }
}
//总访问量
function theAllViews()
{
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    $row = $db->fetchAll('SELECT SUM(VIEWS) FROM `' . $prefix . 'contents`');
 // return number_format($row[0]['SUM(VIEWS)']);
    $rows = $row[0]['SUM(VIEWS)'];
      if($rows < 10000) {
    return $rows;
  } else {
    return round($rows/10000, 1) . 'w';
  }  
}

//总评论量
function get_comments_count() {
    $db = Typecho_Db::get();
    $result = $db->fetchAll($db->select()->from('table.comments')->where('status = ?', 'approved'));
    $count = count($result);
    if ($count < 1000) {
        return $count;
    } else {
        return round($count/1000, 1) . 'k';
    }
}

//标签数量
function tagCount() {
    $db = Typecho_Db::get();
    $count = $db->fetchRow($db->select('COUNT(*)')->from('table.metas')->where('type = ?', 'tag'));
    return $count['COUNT(*)'];
}

//总点赞数
function agreeCount() {
    $db = Typecho_Db::get();
    $count = $db->fetchRow($db->select('SUM(agree) AS agreeCount')->from('table.contents'));
    $count1 = $db->fetchRow($db->select('SUM(likes) AS agreeCount')->from('table.comments'));  
    $allagreecount = $count['agreeCount']+$count1['agreeCount'];
    if($allagreecount < 1000) {
    return $allagreecount;
  } else {
    return round($allagreecount/1000, 1) . 'k';
  }  
}

//微语总点赞数
function wyagreeCount() {
    $db = Typecho_Db::get();
    $count2 = $db->fetchRow($db->select('SUM(likes) AS wyagreeCount')->from('table.comments'));  
    $allagreecount = $count2['wyagreeCount'];
    if($allagreecount < 1000) {
    return $allagreecount;
  } else {
    return round($allagreecount/1000, 1) . ' k';
  }  
}

//各分类的文章数
function fenleinum($id){
$db = Typecho_Db::get();
$po=$db->select('table.metas.count')->from ('table.metas')->where ('parent = ?', $id);
$pom = $db->fetchAll($po);
$num = count($pom);
$shul = 0;
for ($x=0; $x<$num; $x++) {
$shul=$pom[$x]['count']+$shul;
}
$shu=$db->fetchAll($db->select('table.metas.count')->from ('table.metas')->where ('mid = ?', $id))[0]['count']+$shul;
echo $shu;
}

//输出作者文章总数、评论总数、上传附件总数可以指定
function userstat($id,$type) {
	$db = Typecho_Db::get();
	if ($type == 'comment') {
		$commentnum=$db->fetchRow($db->select(array('COUNT(authorId)'=>'allcommentnum'))->from ('table.comments')->where ('table.comments.authorId=?',$id)->where('table.comments.type=? AND status=?', 'comment', 'approved'));
		$commentnum = $commentnum['allcommentnum'];
		return $commentnum;
	} elseif ($type == 'attachment') {
		$attachmentnum=$db->fetchRow($db->select(array('COUNT(authorId)'=>'allattachmentnum'))->from ('table.contents')->where ('table.contents.authorId=?',$id)->where('table.contents.type=? AND status=?', 'attachment', 'publish'));
		$attachmentnum = $attachmentnum['allattachmentnum'];
		return $attachmentnum;
	} else {
		$postnum=$db->fetchRow($db->select(array('COUNT(authorId)'=>'allpostnum'))->from ('table.contents')->where ('table.contents.authorId=?',$id)->where('table.contents.type=?', 'post'));
		$postnum = $postnum['allpostnum'];
		return $postnum;
	}
}

/* 获取最后更新时间 */
function get_last_update()
{
    $num = "1";
    $now = time();
    $db     = Typecho_Db::get();
    $prefix = $db->getPrefix();
    $create = $db->fetchRow($db->select('created')->from('table.contents')->limit($num)->order('created', Typecho_Db::SORT_DESC));
    $update = $db->fetchRow($db->select('modified')->from('table.contents')->limit($num)->order('modified', Typecho_Db::SORT_DESC));
    if ($create >= $update) {
        echo Typecho_I18n::dateWord($create['created'], $now);
    } else {
        echo Typecho_I18n::dateWord($update['modified'], $now);
    }
}

//统计多少天内发布的文章数量
function getNumPosts($days){
    $db = Typecho_Db::get();
    $st_days= time()-$days*24*60*60;
    $result = $db->fetchAll($db->select()->from('table.contents')
        ->where('status = ?','publish')
        ->where('type = ?', 'post')
        ->where('modified >= ?', $st_days)
        //统计时间
    );
    $total_posts = count($result);
    return $total_posts;
}

//加载时间
function timer_start() {
    global $timestart;
    $mtime     = explode( ' ', microtime() );
    $timestart = $mtime[1] + $mtime[0];
    return true;
}
timer_start();
function timer_stop( $display = 0, $precision = 3 ) {
    global $timestart, $timeend;
    $mtime     = explode( ' ', microtime() );
    $timeend   = $mtime[1] + $mtime[0];
    $timetotal = number_format( $timeend - $timestart, $precision );
    $r         = $timetotal < 1 ? $timetotal * 1000 . " ms" : $timetotal . " s";
    if ( $display ) {
        echo $r;
    }
    return $r;
}
//评论回复加@
    function get_comment_at($coid){
    $db   = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent,status')->from('table.comments')
        ->where('coid = ?', $coid));//当前评论
    $mail = "";
    $parent = @$prow['parent'];
    if ($parent != "0") {//子评论
        $arow = $db->fetchRow($db->select('author,status,mail')->from('table.comments')
            ->where('coid = ?', $parent));//查询该条评论的父评论的信息
        @$author = @$arow['author'];//作者名称
        $mail = @$arow['mail'];
        if(@$author && $arow['status'] == "approved"){//父评论作者存在且父评论已经审核通过
            if (@$prow['status'] == "waiting"){
                echo '<div class="comment-waiting">您的评论需管理员审核后才能显示！</div>';
            }
            echo '<a href="#comment-' . $parent . '">@ &nbsp;' . $author . '</a>';
        }else{//父评论作者不存在或者父评论没有审核通过
            if (@$prow['status'] == "waiting"){
                echo '<div class="comment-waiting">您的评论需管理员审核后才能显示！</div>';
            }else{
                echo '';
            }
        }
    } else {//母评论，无需输出锚点链接
        if (@$prow['status'] == "waiting"){
            echo '<div class="comment-waiting">您的评论需管理员审核后才能显示！</div>';
        }else{
            echo '';
        }
    }
    }

//评论链接新窗口打开	
function CommentAuthor($obj, $autoLink = NULL, $noFollow = NULL) {    //后两个参数是原生函数自带的，为了保持原生属性，我并没有删除，原版保留
    $options = Helper::options();
    $autoLink = $autoLink ? $autoLink : $options->commentsShowUrl;    //原生参数，控制输出链接
    $noFollow = $noFollow ? $noFollow : $options->commentsUrlNofollow;    //原生参数，控制输出链接额外属性
    if ($obj->url && $autoLink) {
        echo '<a href="'.$obj->url.'"'.($noFollow ? ' rel="noopener noreferrer external nofollow"' : NULL).(strstr($obj->url, $options->index) == $obj->url ? NULL : ' target="_blank"').'>'.$obj->author.'</a>';
    } else {
        echo $obj->author;
    }
}	

//在线人数
function online_users() {
    $filename='./online.txt'; //数据文件
    $cookiename='Nanlon_OnLineCount'; //Cookie名称
    $onlinetime=30; //在线有效时间
    $online=file($filename); 
    $nowtime=$_SERVER['REQUEST_TIME']; 
    $nowonline=array(); 
    foreach($online as $line){ 
        $row=explode('|',$line); 
        $sesstime=trim($row[1]); 
        if(($nowtime - $sesstime)<=$onlinetime){
            $nowonline[$row[0]]=$sesstime;
        } 
    } 
    if(isset($_COOKIE[$cookiename])){
        $uid=$_COOKIE[$cookiename]; 
    }else{
        $vid=0;
        do{
            $vid++; 
            $uid='U'.$vid; 
        }while(array_key_exists($uid,$nowonline)); 
        setcookie($cookiename,$uid); 
    } 
    $nowonline[$uid]=$nowtime;
    $total_online=count($nowonline); 
    if($fp=@fopen($filename,'w')){ 
        if(flock($fp,LOCK_EX)){ 
            rewind($fp); 
            foreach($nowonline as $fuid=>$ftime){ 
                $fline=$fuid.'|'.$ftime."\n"; 
                @fputs($fp,$fline); 
            } 
            flock($fp,LOCK_UN); 
            fclose($fp); 
        } 
    } 
    echo "$total_online"; 
}

//一言
function GetHitokoto(){
    $url = 'https://v1.hitokoto.cn/?encode=json';
    $ch = curl_init();  
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 6);
    $response = curl_exec($ch);  
    if($error=curl_error($ch)){  
        return '荒野中的一盏孤灯，照亮夜里依然前行的人们';
    }  
    curl_close($ch);
    $array_data = json_decode($response,true);
   // $Emu_content = $array_data['hitokoto'].' ——《'.$array_data['from'].'》';
    $Emu_content = '<p><span class="left" style="color:#f2f2f2;padding-left:.2rem;">'.$array_data['hitokoto'].'</span></p></br><p><span class="right" style="color:#2bbc8a;padding-right:.2rem;"> From . '.$array_data['from'].'</span></p>';
    return $Emu_content;
}

/*
 * 全站字数
 */
function allwords() {
    $chars = 0;
    $db = Typecho_Db::get();
    $select = $db ->select('text')->from('table.contents')->where('type = ?','post');//如果只要统计文章总字数不要统计单页的话可在后面加入->where('type = ?','post')
    $rows = $db->fetchAll($select);
    foreach ($rows as $row) { $chars += mb_strlen(trim($row['text']), 'UTF-8'); }
    if($chars<50000){
    echo '全站共 '.$chars.' 字，还在努力更新中..加油！加油啦！';}
    elseif ($chars<70000 && $chars>50000){
    echo '全站共 '.$chars.' 字，写完一本埃克苏佩里的《小王子》了！';}
    elseif ($chars<90000 && $chars>70000){
    echo '全站共 '.$chars.' 字，写完一本鲁迅的《呐喊》了！';}
    elseif ($chars<100000 && $chars>90000){
    echo '全站共 '.$chars.' 字，写完一本林海音的《城南旧事》了！';}
    elseif ($chars<110000 && $chars>100000){
    echo '全站共 '.$chars.' 字，写完一本马克·吐温的《王子与乞丐》了！';}
    elseif ($chars<120000 && $chars>110000){
    echo '全站共 '.$chars.' 字，写完一本鲁迅的《彷徨》了！';}
    elseif ($chars<130000 && $chars>120000){
    echo '全站共 '.$chars.' 字，写完一本余华的《活着》了！';}
    elseif ($chars<140000 && $chars>130000){
    echo '全站共 '.$chars.' 字，写完一本曹禺的《雷雨》了！';}
    elseif ($chars<150000 && $chars>140000){
    echo '全站共 '.$chars.' 字，写完一本史铁生的《宿命的写作》了！';}
    elseif ($chars<160000 && $chars>150000){
    echo '全站共 '.$chars.' 字，写完一本伯内特的《秘密花园》了！';}
    elseif ($chars<170000 && $chars>160000){
    echo '全站共 '.$chars.' 字，写完一本曹禺的《日出》了！';}
    elseif ($chars<180000 && $chars>170000){
    echo '全站共 '.$chars.' 字，写完一本马克·吐温的《汤姆·索亚历险记》了！';}
    elseif ($chars<190000 && $chars>180000){
    echo '全站共 '.$chars.' 字，写完一本沈从文的《边城》了！';}
    elseif ($chars<200000 && $chars>190000){
    echo '全站共 '.$chars.' 字，写完一本亚米契斯的《爱的教育》了！';}
    elseif ($chars<210000 && $chars>200000){
    echo '全站共 '.$chars.' 字，写完一本巴金的《寒夜》了！';}
    elseif ($chars<220000 && $chars>210000){
    echo '全站共 '.$chars.' 字，写完一本东野圭吾的《解忧杂货店》了！';}
    elseif ($chars<230000 && $chars>220000){
    echo '全站共 '.$chars.' 字，写完一本莫泊桑的《一生》了！';}
    elseif ($chars<250000 && $chars>230000){
    echo '全站共 '.$chars.' 字，写完一本简·奥斯汀的《傲慢与偏见》了！';}
    elseif ($chars<280000 && $chars>250000){
    echo '全站共 '.$chars.' 字，写完一本钱钟书的《围城》了！';}
    elseif ($chars<300000 && $chars>280000){
    echo '全站共 '.$chars.' 字，写完一本张炜的《古船》了！';}
    elseif ($chars<310000 && $chars>300000){
    echo '全站共 '.$chars.' 字，写完一本茅盾的《子夜》了！';}
    elseif ($chars<320000 && $chars>310000){
    echo '全站共 '.$chars.' 字，写完一本阿来的《尘埃落定》了！';}
    elseif ($chars<340000 && $chars>320000){
    echo '全站共 '.$chars.' 字，写完一本艾米莉·勃朗特的《呼啸山庄》了！';}
    elseif ($chars<350000 && $chars>340000){
    echo '全站共 '.$chars.' 字，写完一本雨果的《巴黎圣母院》了！';}
    elseif ($chars<400000 && $chars>350000){
    echo '全站共 '.$chars.' 字，写完一本东野圭吾的《白夜行》了！';}
    elseif ($chars<1000000 && $chars>400000){
    echo '全站共 '.$chars.' 字，写完一本我国著名的四大名著了！';}
    elseif ($chars>1000000){
    echo '全站共 '.$chars.' 字，咳咳，还没想好写啥~';}
}

/** 获取评论者物理地址 */
function convertip($ip){  
  $ip1num = 0; 
  $ip2num = 0; 
  $ipAddr1 =""; 
  $ipAddr2 =""; 
  $dat_path = './usr/themes/cactus/qqwry.dat';         
  if(!preg_match("/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/", $ip)) {  
    return 'IP 数据库路径不对';  
  }   
  if(!$fd = @fopen($dat_path, 'rb')){  
    return 'IP 数据库路径不正确';  
  }   
  $ip = explode('.', $ip);  
  $ipNum = $ip[0] * 16777216 + $ip[1] * 65536 + $ip[2] * 256 + $ip[3];   
  $DataBegin = fread($fd, 4);  
  $DataEnd = fread($fd, 4);  
  $ipbegin = implode('', unpack('L', $DataBegin));  
  if($ipbegin < 0) $ipbegin += pow(2, 32);  
    $ipend = implode('', unpack('L', $DataEnd));  
  if($ipend < 0) $ipend += pow(2, 32);  
    $ipAllNum = ($ipend - $ipbegin) / 7 + 1;  
  $BeginNum = 0;  
  $EndNum = $ipAllNum;   
  while($ip1num>$ipNum || $ip2num<$ipNum) {  
    $Middle= intval(($EndNum + $BeginNum) / 2);  
    fseek($fd, $ipbegin + 7 * $Middle);  
    $ipData1 = fread($fd, 4);  
    if(strlen($ipData1) < 4) {  
      fclose($fd);  
      return 'System Error';  
    } 
    $ip1num = implode('', unpack('L', $ipData1));  
    if($ip1num < 0) $ip1num += pow(2, 32);  
   
    if($ip1num > $ipNum) {  
      $EndNum = $Middle;  
      continue;  
    }  
    $DataSeek = fread($fd, 3);  
    if(strlen($DataSeek) < 3) {  
      fclose($fd);  
      return 'System Error';  
    }  
    $DataSeek = implode('', unpack('L', $DataSeek.chr(0)));  
    fseek($fd, $DataSeek);  
    $ipData2 = fread($fd, 4);  
    if(strlen($ipData2) < 4) {  
      fclose($fd);  
      return 'System Error';  
    }  
    $ip2num = implode('', unpack('L', $ipData2));  
    if($ip2num < 0) $ip2num += pow(2, 32);   
      if($ip2num < $ipNum) {  
        if($Middle == $BeginNum) {  
          fclose($fd);  
          return 'Unknown';  
        }  
        $BeginNum = $Middle;  
      }  
    }   
    $ipFlag = fread($fd, 1);  
    if($ipFlag == chr(1)) {  
      $ipSeek = fread($fd, 3);  
      if(strlen($ipSeek) < 3) {  
        fclose($fd);  
        return 'System Error';  
      }  
      $ipSeek = implode('', unpack('L', $ipSeek.chr(0)));  
      fseek($fd, $ipSeek);  
      $ipFlag = fread($fd, 1);  
    }  
    if($ipFlag == chr(2)) {  
      $AddrSeek = fread($fd, 3);  
      if(strlen($AddrSeek) < 3) {  
      fclose($fd);  
      return 'System Error';  
    }  
    $ipFlag = fread($fd, 1);  
    if($ipFlag == chr(2)) {  
      $AddrSeek2 = fread($fd, 3);  
      if(strlen($AddrSeek2) < 3) {  
        fclose($fd);  
        return 'System Error';  
      }  
      $AddrSeek2 = implode('', unpack('L', $AddrSeek2.chr(0)));  
      fseek($fd, $AddrSeek2);  
    } else {  
      fseek($fd, -1, SEEK_CUR);  
    }  
    while(($char = fread($fd, 1)) != chr(0))  
    $ipAddr2 .= $char;  
    $AddrSeek = implode('', unpack('L', $AddrSeek.chr(0)));  
    fseek($fd, $AddrSeek);  
    while(($char = fread($fd, 1)) != chr(0))  
    $ipAddr1 .= $char;  
  } else {  
    fseek($fd, -1, SEEK_CUR);  
    while(($char = fread($fd, 1)) != chr(0))  
    $ipAddr1 .= $char;  
    $ipFlag = fread($fd, 1);  
    if($ipFlag == chr(2)) {  
      $AddrSeek2 = fread($fd, 3);  
      if(strlen($AddrSeek2) < 3) {  
        fclose($fd);  
        return 'System Error';  
      }  
      $AddrSeek2 = implode('', unpack('L', $AddrSeek2.chr(0)));  
      fseek($fd, $AddrSeek2);  
    } else {  
      fseek($fd, -1, SEEK_CUR);  
    }  
    while(($char = fread($fd, 1)) != chr(0)){  
      $ipAddr2 .= $char;  
    }  
  }  
  fclose($fd);   
  if(preg_match('/http/i', $ipAddr2)) {  
    $ipAddr2 = '';  
  }  
  $ipaddr = "$ipAddr1";  
  $ipaddr = preg_replace('/CZ88.NET/is', '', $ipaddr);  
  $ipaddr = preg_replace('/^s*/is', '', $ipaddr);  
  $ipaddr = preg_replace('/s*$/is', '', $ipaddr);  
  if(preg_match('/http/i', $ipaddr) || $ipaddr == '') {  
    $ipaddr = '可能来自火星';  
  }
  $ipaddr = iconv('gbk', 'utf-8//IGNORE', $ipaddr); 
  return $ipaddr;  
}

// 获取访客当前ip
function getIP ()
{
global $_SERVER;
if (getenv('HTTP_CLIENT_IP')) {
$ip = getenv('HTTP_CLIENT_IP');
} else if (getenv('HTTP_X_FORWARDED_FOR')) {
$ip = getenv('HTTP_X_FORWARDED_FOR');
} else if (getenv('REMOTE_ADDR')) {
$ip = getenv('REMOTE_ADDR');
} else {
$ip = $_SERVER['REMOTE_ADDR'];
}
return $ip;
}

//文章阅读时间统计
function art_time ($cid){
    $db=Typecho_Db::get ();
    $rs=$db->fetchRow ($db->select ('table.contents.text')->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
    $text = preg_replace("/[^\x{4e00}-\x{9fa5}]/u", "", $rs['text']);
    $text_word = mb_strlen($text,'utf-8');
    echo ceil($text_word / 180);
}
  
//访客历史评论
class Widget_Comments_RecentPlus extends Widget_Abstract_Comments
{
    public function __construct($request, $response, $params = NULL)
    {
        parent::__construct($request, $response, $params);
        $this->parameter->setDefault(array('pageSize' => $this->options->commentsListSize, 'parentId' => 0, 'ignoreAuthor' => false));
    }
    public function execute()
    {
        $select  = $this->select()->limit($this->parameter->pageSize)
        ->where('table.comments.status = ?', 'approved')
        ->order('table.comments.coid', Typecho_Db::SORT_DESC);
        if ($this->parameter->parentId) {
            $select->where('cid = ?', $this->parameter->parentId);
        }
        if ($this->options->commentsShowCommentOnly) {
            $select->where('type = ?', 'comment');
        }
        /** 忽略作者评论 */
        if ($this->parameter->ignoreAuthor) {
            $select->where('ownerId <> authorId');
        }
        if ($this->parameter->mail) {
            $select->where('mail = ?', $this->parameter->mail);
        }
        $this->db->fetchAll($select, array($this, 'push'));
    }
}

// 评论点赞
/* 获取评论点赞数量 */
function commentLikesNum($coid, &$record = NULL)
{
    $db = Typecho_Db::get();
    $callback = array(
        'likes' => 0,
        'recording' => false,
    );
    //  判断点赞数量字段是否存在
    if (array_key_exists('likes', $data = $db->fetchRow($db->select()->from('table.comments')->where('coid = ?', $coid)))) {
        //  查询出点赞数量
        $callback['likes'] = $data['likes'];
    } else {
        //  在文章表中创建一个字段用来存储点赞数量
        $db->query('ALTER TABLE `' . $db->getPrefix() . 'comments` ADD `likes` INT(10) NOT NULL DEFAULT 0;');
    }
     //获取记录点赞的 Cookie
     //判断记录点赞的 Cookie 是否存在
    if (empty($recording = Typecho_Cookie::get('__typecho_comment_likes_record'))) {
        //  如果不存在就写入 Cookie
        Typecho_Cookie::set('__typecho_comment_likes_record', '[]');
    } else {
        $callback['recording'] = is_array($record = json_decode($recording)) && in_array($coid, $record);
    }
    //  返回
    return $callback;
}
/* 评论点赞处理 */
function commentLikes($archive)
{  
    // 状态
    $archive->response->setStatus(200);   
    //评论id
    $_POST['coid']; 
    /**
     * 行为
     * dz  进行点赞
     * ct  进行踩踏
    **/
    $_POST['behavior'];
    //判断是否为登录 true 为已经登录
    $loginState = Typecho_Widget::widget('Widget_User')->hasLogin();
    $res1 = commentLikesNum($_POST['coid'], $record);
    $num = 0;
    if(!empty($_POST['coid']) && !empty($_POST['behavior'])){
        $db = Typecho_Db::get();
        $prefix = $db->getPrefix();
        $coid = (int)$_POST['coid'];
        if (!array_key_exists('likes', $db->fetchRow($db->select()->from('table.comments')))) {
        $db->query('ALTER TABLE `' . $prefix . 'comments` ADD `likes` INT(30) DEFAULT 0;');
        }
        //先获取当前赞
        $row = $db->fetchRow($db->select('likes')->from('table.comments')->where('coid = ?', $coid));
        $updateRows = $db->query($db->update('table.comments')->rows(array('likes' => (int) $row['likes'] + 1))->where('coid = ?', $coid));    
        if($updateRows){
            $num = $row['likes'] + 1;
            $state =  "success";            
            //  添加点赞评论的 coid
            array_push($record, $coid);
            //  保存 Cookie
            Typecho_Cookie::set('__typecho_comment_likes_record', json_encode($record));
        }else{
            $num = $row['likes'];
            $state =  'error';
        }       
    }else{
        $state = 'Illegal request';
    }  
    //返回一个jsonv数据state数据
    $archive->response->throwJson(array(
       "state" => $state,
       "num" => $num,
    ));    
}

/**    
 * 评论者认证等级 + 身份    
 *    
 * @author Chrison & 荒野孤灯  
 * @access public    
 * @param str $email 评论者邮址    
 * @return result     
 */     
function commentApprove($widget, $email = NULL)      
{   
    $result = array(
        "state" => -1,//状态
        "isAuthor" => 0,//是否是博主
        "userLevel" => '',//用户身份或等级名称
        "userDesc" => '',//用户title描述
        "bgColor" => '',//用户身份或等级背景色
        "commentNum" => 0//评论数量
    );
    if (empty($email)) return $result;      
    
    $result['state'] = 1;
    $master = array(      
        '564375261@qq.com',
        '3051532614@qq.com',
        '1058875179@qq.com'
    );      
    if ($widget->authorId == $widget->ownerId) {      
        $result['isAuthor'] = 1;
        $result['userLevel'] = '博主';
        $result['userDesc'] = '很帅的博主';
        $result['bgColor'] = '#2bbc8a';
        $result['commentNum'] = 9999;
    } else if (in_array($email, $master)) {      
        $result['userLevel'] = '基佬';
        $result['userDesc'] = '很基的基友';
        $result['bgColor'] = '#2bbc8a';
        $result['commentNum'] = 8888;
    } else {
        //数据库获取
        $db = Typecho_Db::get();
        //获取评论条数
        $commentNumSql = $db->fetchAll($db->select(array('COUNT(cid)'=>'commentNum'))
            ->from('table.comments')
            ->where('mail = ?', $email));
        $commentNum = $commentNumSql[0]['commentNum'];
        
        //获取友情链接
        //$linkSql = $db->fetchAll($db->select()->from('table.links')->where('user = ?',$email));
        
        //等级判定
        if($commentNum==1){
            $result['userLevel'] = '初次见面';
            $result['bgColor'] = '#999999';
            $userDesc = '我们的友谊成功迈出了第一步！';
        } else {
            if ($commentNum<3 && $commentNum>1) {
                $result['userLevel'] = '初次见面';
                $result['bgColor'] = '#999999';
            }elseif ($commentNum<9 && $commentNum>=3) {
                $result['userLevel'] = '点头之交';
                $result['bgColor'] = '#999999';
            }elseif ($commentNum<27 && $commentNum>=9) {
                $result['userLevel'] = '酒肉朋友';
                $result['bgColor'] = '#669999';
            }elseif ($commentNum<81 && $commentNum>=27) {
                $result['userLevel'] = '互相认同';
                $result['bgColor'] = '#3399CC';
            }elseif ($commentNum<100 && $commentNum>=81) {
                $result['userLevel'] = '交情莫逆';
                $result['bgColor'] = '#003366';
            }elseif ($commentNum>=100) {
                $result['userLevel'] = '生死之交';
                $result['bgColor'] = '#2bbc8a';
            }
             $userDesc = '我们的友谊已经加深'.$commentNum.'次！'; 
        }
        //if($linkSql){
            //$result['userLevel'] = '博友';
            //$result['bgColor'] = '#21b9bb';
            //$userDesc = '🔗'.$linkSql[0]['description'].'&#10;✌️'.$userDesc;
        //}
        
        $result['userDesc'] = $userDesc;
        $result['commentNum'] = $commentNum;
    } 
    return $result;
}

?>