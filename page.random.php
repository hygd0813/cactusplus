<?php
    /**
     * 随机一篇文章
     *
     * @package custom
     */
    if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
    <?php
    $db = Typecho_Db::get();
    $sql = $db->select('MAX(cid)')->from('table.contents')
        ->where('status = ?','publish')
        ->where('type = ?', 'post')
        ->where('created <= unix_timestamp(now())', 'post');
    $result = $db->fetchAll($sql);
    $max_id = $result[0]['MAX(`cid`)'];
    // 以上代码，是获取文章表里的最大文章id

    $sql = $db->select('MIN(cid)')->from('table.contents')
        ->where('status = ?','publish')
        ->where('type = ?', 'post')
        ->where('created <= unix_timestamp(now())', 'post');
    $result = $db->fetchAll($sql);
    $min_id = $result[0]['MIN(`cid`)'];
    // 以上代码，是获取文章表里的最小文章id


    $result = NULL;
    while($result == NULL) {
        $rand_id = mt_rand($min_id,$max_id);
        // 以上代码，是获取最小值-最大值直接的id

        $sql = $db->select()->from('table.contents')
             ->where('status = ?','publish')
             ->where('type = ?', 'post')
             ->where('created <= unix_timestamp(now())', 'post')
             ->where('cid = ?',$rand_id);
        // 以上代码，根据随机id获取文章相关信息
        $result = $db->fetchAll($sql);
    }
    ?>

    <?php $target = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($result['0']); ?>
    <?php $this->response->redirect($target['permalink'],307); ?>
    //将结果307跳转
