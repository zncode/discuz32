<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>87870论坛</title>
<link rel="stylesheet" type="text/css" href="<?php echo $source_path;?>/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo $source_path;?>/css/index.css">
</head>
<script src="<?php echo $source_path;?>/js/jquery-1.8.3.min.js" type="text/javascript" type="text/javascript"></script>
<script src="<?php echo $source_path;?>/js/index.js" type="text/javascript" type="text/javascript"></script>
<script src="<?php echo $source_path;?>/js/jquery.nav.js" type="text/javascript" type="text/javascript"></script>
<script src="<?php echo $source_path;?>/js/ScrollPic.js" type="text/javascript" type="text/javascript"></script>
<body>
<div class="header">
  <div class="midcoment">
    <div class="logo"> <a href="#" title=""><img src="<?php echo $source_path;?>/images/logo.jpg"></a> </div>
    <ul class="nav">
      <li class="navhov"><a href="#" title="">社区首页</a></li>
      <li><a href="#" title="">金币商城</a></li>
      <li><a href="#" title="">VR资源</a></li>
      <li><a href="#" title="">交流区</a></li>
      <li><a href="#" title="">游乐园</a></li>
      <li><a href="http://www.87870.com" title="">官网首页</a></li>
    </ul>
    <!-- 未登录状态 -->
    <?php if($is_login) { ?>
    <div class="loginTrwo">
    <a href="<?php echo $domain87870;?>member.php?mod=logging&action=logout&formhash=<?php echo $formhash;?>" title="" class="deaderTRA">退出</a>
    <span>|</span> <a href="<?php echo $domain87870;?>/home.php?mod=space&do=notice" title="" class="deaderTRA">提醒<?php echo $newprompt;?></a>
      <div class="yhm_name"><?php echo $_G['username'];?><em><img src="<?php echo $domain87870;?>/template/default/portal/images/sj.png"></em>
        <ul class="yhmUL">
          <li><a href="<?php echo $domain87870;?>home.php?mod=spacecp">个人设置</a></li>
          <li><a href="<?php echo $domain87870;?>home.php?mod=space&do=favorite&view=me">我的收藏</a></li>
          <li><a href="<?php echo $domain87870;?>forum.php?mod=guide&view=my">我的帖子</a></li>
          <li><a href="<?php echo $domain87870;?>home.php?mod=space&do=notice">我的通知</a></li>
        </ul>
      </div>
    	</div>
    <?php } else { ?> 
    	<div class="loginTone" > <a href="<?php echo $domain87870;?>member.php?mod=register" title="" class="buttonlog logHOV">注册</a> <a href="<?php echo $domain87870;?>member.php?mod=logging&action=login&referer=http%3A%2F%2Flocalhost%2Fdiscuz32%2Fportal.php" title="" class="buttonlog">登录</a> </div> 
    <?php } ?>

    <!-- 登录状态 -->
    
    <div class="searchbox">
      <input type="button" value="" class="searchbuton">
      <input type="text" class="searchinput">
    </div>
  </div>
</div>
<div class="banner_index"> 
  <!-- 代码 开始 -->
  <div id="inner">
    <div class="hot-event">
      <div class="switch-nav"> <a href="#" onclick="return false;" class="prev"><i class="ico i-prev"></i></a> <a href="#" onclick="return false;" class="next"><i class="ico i-next"></i></a> </div>
       <?php echo $article_pic;?>      <div class="switch-tab"> <a href="#" onclick="return false;" class="current">1</a> <a href="#" onclick="return false;">2</a> <a href="#" onclick="return false;">3</a> <a href="#" onclick="return false;">4</a> <a href="#" onclick="return false;">5</a> </div>
    </div>
  </div>

  <script type="text/javascript">
        $('#inner').nav({ t: 2000, a: 1000 });
    </script> 
  <!-- 代码 结束 --> 
</div>
<div class="combody">
  <div class="midcoment pdt28">
    <div class="onediv_bg">
      <div class="onedivtop">
        <div class="onedivtitle"> <i class="one_TL ibg1"></i><span>每日商城推荐</span>
          <div class="sc_button">
            <div class="scprev" id="LeftArr"><</div>
            <div class="scnext" id="RightArr">></div>
          </div>
        </div>
      </div>
      <div class="onedivbot">
        <div class="proscul" id="ISL_Cont_1">
        	 <?php echo $article_mall;?>        </div>
      </div>
    </div>
    <div class="onediv_bg">
      <div class="onedivtop">
        <div class="onedivtitle"> <i class="one_TL ibg2"></i><span>视频资源</span> <a href="<?php echo $more_video;?>" title="" class="oneTmore">更多 &nbsp; > </a> </div>
      </div>
      <div class="onedivbot">
        <div class="video_one"> <?php echo $article_focus_video;?></div>
        <?php echo $article_video;?>      </div>
    </div>
    <div class="onediv_bg">
      <div class="onedivtop">
        <div class="onedivtitle"> <i class="one_TL ibg3"></i><span>游戏应用</span> <a href="<?php echo $more_game;?>" title="" class="oneTmore">更多 &nbsp; > </a> </div>
      </div>
      <div class="onedivbot">
        <div class="video_one"> <?php echo $article_focus_game;?></div>
 <?php echo $article_game;?>      </div>
    </div>
    <div class="onediv_bg">
      <div class="onedivtop">
        <div class="onedivtitle"> <i class="one_TL ibg4"></i><span>活动专区</span> <a href="<?php echo $more_activity;?>" title="" class="oneTmore">更多 &nbsp; > </a> </div>
      </div>
      <div class="onedivbot">
 <?php echo $article_activity;?>      </div>
    </div>
    <div class="onediv_bg">
      <div class="onedivtop">
        <div class="onedivtitle"> <i class="one_TL ibg5"></i><span>论坛版块</span> </div>
      </div>
      <div class="onedivbot">
        <?php echo $forums;?>      </div>
    </div>
    <div class="onediv_bg">
      <div class="linkbox"> 友情链接: &nbsp; <?php echo $freind_links;?> </div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="in_Rbox">
     <a href="#"><img src="<?php echo $source_path;?>/images/qd1.png"></a>
     <a href="#"><img src="<?php echo $source_path;?>/images/qd2.png"></a>
     <a href="#"><img src="<?php echo $source_path;?>/images/qd3.png"></a>
     <a href="#"><img src="<?php echo $source_path;?>/images/qd4.png"></a>
     <a href="#"><img src="<?php echo $source_path;?>/images/qd5.png"></a>
  </div>
</div>
<div class="footer">
  <div class="midcoment">
    <div class="blogo"> <a href="#"><img src="<?php echo $source_path;?>/images/blogo.png"></a> </div>
    <div class="bmid">
      <div class="botnav"> <a href="#">关于我们</a>|<a href="#">信息举报</a>|<a href="#">招聘信息</a>|<a href="#">网站地图</a>|<a href="#">未成年人家长监护</a> </div>
      <div class="botP">
        <p>京ICP证160473号   |   京ICP备12034143号-3   |   京公网安备11010602080011号   |   广播电视节目制作经营许可证：（京）字第04386号   |   京网文(2015)2357-448号</p>
        <p>幸福互动（北京）网络科技有限公司 Copyright © 2001-2016 87870.com All rights reserved.</p>
      </div>
    </div>
    <div class="bRimg"> <img src="<?php echo $source_path;?>/images/bewm.jpg"> </div>
  </div>
</div>
<div id="baseurl" data-value="<?php echo $base_url;?>" style="display:none;"></div>
</body>
</html>
