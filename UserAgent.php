<?php
/**
 * UserAgent
 * @author 荒野孤灯
 * @package custom
 */
class UserAgent{

    public $ua;

    public function __construct($ua = '')
    {
        $this->ua = $ua;
    }

    public function returnOS(){
        $ua = $this->ua;
        $title = "未知浏览器";
        if (preg_match('/win/i', $ua)) {
            if (preg_match('/Windows NT 6.1/i', $ua)) {
                $title = "Windows 7";
            }elseif (preg_match('/Windows 98/i', $ua)) {
                $title = "Windows 98";
            }elseif (preg_match('/Windows NT 5.0/i', $ua)) {
                $title = "Windows 2000";
            }elseif (preg_match('/Windows NT 5.1/i', $ua)) {
                $title = "Windows XP";
            }elseif (preg_match('/Windows NT 5.2/i', $ua)) {
                if (preg_match('/Win64/i', $ua)) {
                    $title = "Windows XP 64 bit";
                } else {
                    $title = "Windows Server 2003";
                }
            }elseif (preg_match('/Windows NT 6.0/i', $ua)) {
                $title = "Windows windows";
            }elseif (preg_match('/Windows NT 6.2/i', $ua)) {
                $title = "Windows 8";
            }elseif (preg_match('/Windows NT 6.3/i', $ua)) {
                $title = "Windows 8.1";
            }elseif (preg_match('/Windows NT 10.0/i', $ua)) {
                $title = "Windows 10";
            }elseif (preg_match('/Windows Phone/i', $ua)) {
                $matches = explode(';',$ua);
                $title = $matches[2];
            }
        } elseif (preg_match('#iPod.*.CPU.([a-zA-Z0-9.( _)]+)#i', $ua, $matches)) {
            $title = "iPod ";//.$matches[1]
        } elseif (preg_match('/iPhone OS ([_0-9]+)/i', $ua, $matches)) {
            $title = "Iphone ";//.$matches[1]
        } elseif (preg_match('/iPad; CPU OS ([_0-9]+)/i', $ua, $matches)) {
            $title = "iPad ";//.$matches[1]
        } elseif (preg_match('/Mac OS X ([0-9_]+)/i', $ua, $matches)) {
            if(count(explode(7,$matches[1]))>1) $matches[1] = 'Lion '.$matches[1];
            elseif(count(explode(8,$matches[1]))>1) $matches[1] = 'Mountain Lion '.$matches[1];
            $title = "Mac OSX";
        } elseif (preg_match('/Macintosh/i', $ua)) {
            $title = "Mac OS";
        } elseif (preg_match('/CrOS/i', $ua)){
            $title = "Google Chrome OS";
        } elseif (preg_match('/Linux/i', $ua)) {
            $title = 'Linux';
            if (preg_match('/Ubuntu/i', $ua)) {
                $title = "Ubuntu Linux";
            }elseif(preg_match('#Debian#i', $ua)) {
                $title = "Debian GNU/Linux";
            }elseif (preg_match('#Fedora#i', $ua)) {
                $title = "Fedora Linux";
            }elseif (preg_match('/Kraitnabo\/([^\s|;]+)/i', $ua, $matches)) {
            $title = '南博app '. $matches[1];
            }elseif (preg_match('/Android.([0-9. _]+)/i',$ua, $matches)) {
                $title= "Android";
            }
        } elseif (preg_match('/Android.([0-9. _]+)/i',$ua, $matches)) {
            $title= "Android";
        } elseif (preg_match('/siri/i',$ua, $matches)) {
            $title= "iOS Siri快捷指令";
        }
        return array("title"=>$title);
    }

    /**
     * 还可以自行扩展
     */
    public function returnTimeUa(){
        if ($this->ua == "weixin" || $this->ua == "weChat"){
            return array("title"=>("微信公众号"));
        }elseif ($this->ua == "crx"){
            return array("title"=>("Chrome扩展"));
        }elseif ($this->ua == "yearcross"){
            return array("title"=>("YearCross"));
        }elseif ($this->ua == "Kraitnabo"){
            return array("title"=>("南博app"));
        }elseif ($this->ua == "python"){
            return array("title"=>("python脚本"));
        }else{
            $ua = $this->returnOS();
            return $ua;
        }
    }
}