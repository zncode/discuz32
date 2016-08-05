<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: portal_index.php 31313 2012-08-10 03:51:03Z zhangguosheng $
 */

// source\module\portal\portal_index.php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

list($navtitle, $metadescription, $metakeywords) = get_seosetting('portal');
if(!$navtitle) {
	$navtitle = $_G['setting']['navs'][1]['navname'];
	$nobbname = false;
} else {
	$nobbname = true;
}
if(!$metakeywords) {
	$metakeywords = $_G['setting']['navs'][1]['navname'];
}
if(!$metadescription) {
	$metadescription = $_G['setting']['navs'][1]['navname'];
}

if(isset($_G['makehtml'])){
	helper_makehtml::portal_index();
}

if (empty($_G['uid'])) {
	$is_login = false;
}
else
{
	$is_login = true;
}
$formhash = formhash();
$category = category_remake(2);


$base_url =  $_G['siteurl'];

$source_path = $base_url.'template/default/portal';
$domain87870 = $base_url;

$thread_url = $base_url.'forum.php?mod=viewthread&tid=';
$attachment_url = $base_url.'data/attachment/';
$user_logo = $base_url.'uc_server/avatar.php?';
//系统提醒
if($_G['member']['newprompt']){
	$newprompt = '('.$_G['member']['newprompt'].')';
}
else
{
	$newprompt = '';
}

//获取频道id
$catid_video 	= category_get_catid('视频资源');
$catid_game 	= category_get_catid('游戏应用');
$catid_activity = category_get_catid('活动专区');
$catid_mall     = category_get_catid('每日商城推荐');
$catid_pic     	= category_get_catid('轮播图');

//获取焦点文章
$article_focus_video 	= article_focus_load($catid_video);
$article_focus_game    	= article_focus_load($catid_game);

//获取文章
$article_video 		= article_load($catid_video);
$article_game 		= article_load($catid_game);
$article_activity 	= article_load($catid_activity);

//每日商城推荐
$article_mall = article_mall_load($catid_mall);

//轮播图
$article_pic = article_pic_load($catid_pic);

//版块更多
$more_video 	= $base_url.'forum.php?mod=forumdisplay&fid=2';
$more_game 		= $base_url.'forum.php?mod=forumdisplay&fid=36';
$more_activity 	= $base_url.'forum.php?mod=forumdisplay&fid=37';

//版块信息
$forums = forum_load();

//友情链接
$freind_links = freind_link_load();


include_once template('diy:portal/index');

function category_get_catid($type=''){
	$catid = false;
	
	$query = DB::query("SELECT * FROM ".DB::table('portal_category') );
	while($result = DB::fetch($query)) {
		if($result['catname'] == $type){
			$catid = $result['catid'];
			return $catid;
		}
	}
}

function article_load($catid){
	global $thread_url, $attachment_url,$source_path,$user_logo;

	$query = DB::query("SELECT * FROM ".DB::table('portal_article_title')." WHERE catid= {$catid} AND tag != 2 ORDER BY aid DESC");
	$articles = array();
	
	while($result = DB::fetch($query)) {
		$tid = $result['author'];
		$url = $thread_url.$tid;
		$thread = thread_load($tid);
		$authorid = $thread['authorid'];
		$author   = $thread['author'];

		$articles[] = ' <div class="video_li">
      <div class="videoliimg"><a href="'.$url.'"><img width="215px" height="130px" src="'.$attachment_url.$result['pic'].'"></a></div>
      <div class="videoliname"><a href="'.$url.'">'.$result['title'].'</a></div>
      <div class="videolibot">
        <div class="video_bA"><i class="video_look"></i><span>'.$thread['views'].'</span></div>
        <div class="video_bA"><i class="video_pl"></i><span>'.$thread['replies'].'</span></div>
        <div class="video_BRman"> <span>'.$author.'</span><i><img src="'.$user_logo.'uid='.$authorid.'&size=small"></i> </div>
      </div>
    </div>';


	}

	if($articles){
			foreach($articles as $article){
				$output .= $article;
			}
		}else{
			$output = '没有内容';
	}

	return $output;
}

function article_focus_load($catid){
	global $thread_url, $attachment_url,$source_path;
	$query = DB::query("SELECT * FROM ".DB::table('portal_article_title')." WHERE catid= {$catid} AND tag = 2 ORDER BY aid DESC");

	if($query){
		while($result = DB::fetch($query)) {
			$tid = $result['author'];
			$url = $thread_url.$tid;
			$output = '<a href="'.$url.'"><img width="450px" height="400px" src="'.$attachment_url.$result['pic'].'"> </a><a href="'.$url.'"><span class="viLbg">'.$result['title'].'</span></a>';
		}
	}else{
		$output = '没有内容';
	}


	return $output;
} 


function thread_load($tid){
	$query = DB::query("SELECT * FROM ".DB::table('forum_thread')." WHERE tid= {$tid}");
	if($query){
		$thread = DB::fetch($query);
	}
	else{
		$thread = false;
	}

	return $thread;
} 

function article_mall_load($catid){
	global $thread_url, $attachment_url,$source_path;
	$query = DB::query("SELECT * FROM ".DB::table('portal_article_title')." WHERE catid= {$catid} ORDER BY aid DESC");

	if($query){
		while($result = DB::fetch($query)) {
			$tid 		= $result['author'];
			$summary 	= $result['summary'];
			$url 		= $thread_url.$tid;
			$articles[] = '<div class="prosc_li">
            <div class="prosc_liimg"> <a  href="'.$url.'"><img src="'.$attachment_url.$result['pic'].'"> </a></div>
            <div class="prosc_liname"> '.$result['title'].' </div>
            <div class="prosc_lifeng"> '.$summary.' </div>
            <a href="'.$url.'" title="" class="prosc_libuy">换购</a> </div>';
		}

		if($articles){
			foreach($articles as $article){
				$output .= $article;
			}
		}else{
			$output = '没有内容';
		}
	}else{
		$output = '没有内容';
	}


	return $output;
} 

function article_pic_load($catid){
	global $thread_url, $attachment_url,$source_path;
	$query = DB::query("SELECT * FROM ".DB::table('portal_article_title')." WHERE catid= {$catid} ORDER BY aid DESC");


	if($query){
		while($result = DB::fetch($query)) {
			$tid 		= $result['author'];
			$title      = $result['title'];
			$url 		= $thread_url.$tid;
			$pic     	= $attachment_url.$result['pic'];

			$articles[] = '<div class="event-item" style="display: block;"> <a href="'.$url.'" class="banner"> <img src="'.$pic.'" class="photo" alt="'.$title.'" /> <span class="bannP">'.$title.' </span> </a> </div>';
		}

		if($articles){
			foreach($articles as $article){
				$output .= $article;
			}
		}else{
			$output = '没有内容';
		}
	}else{
		$output = '没有内容';
	}


	return $output;
} 

function freind_link_load(){
	$query = DB::query("SELECT * FROM ".DB::table('common_friendlink')." ORDER BY displayorder ASC");

	if($query){
		while($result = DB::fetch($query)) {
			$name 		= $result['name'];
			$url      = $result['url'];

			$links[] = '<a href="'.$url.'" target="_blank" > '.$name.'</a> ';
		}

		if($links){
			$output = implode('  |  ', $links);
		}else{
			$output = '没有内容';
		}
	}else{
		$output = '没有内容';
	}


	return $output;
} 

function forum_load(){
	global $attachment_url, $base_url;

	$forumArrays = C::t('forum_forum')->fetch_all_forum();

	if($forumArrays){
		foreach($forumArrays AS $forumArray) {
			$type = $forumArray['type'];
			if($type != 'group'){
				$name     = $forumArray['name'];
				$threads  = $forumArray['threads'];
				$posts    = $forumArray['posts'];
				$icon     = $attachment_url.'common/'.$forumArray['icon'];
				$fid      = $forumArray['fid'];
				$url      = $base_url.'forum.php?mod=forumdisplay&fid='.$fid;

				$forumStrs[]  = '<div class="bk_one marL0 marT0">
			          <div class="bk_oneleft"> <a href="'.$url.'"><img src="'.$icon.'"></a></div>
			          <div class="bk_oneright">
			            <div class="bk_onename"> <a href="'.$url.'">'.$name.'</a></div>
			            <div class="bk_oneP">帖子：'.$threads.'；回复：'.$posts.'</div>
			          </div>
			        </div>';				
			}
		}

		if($forumStrs){
			foreach($forumStrs as $forumStr){
				$output .= $forumStr;
			}
		}else{
			$output = '没有内容';
		}
	}else{
		$output = '没有内容';
	}


	return $output;
} 