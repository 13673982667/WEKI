<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:41:"./template/mobile/rainbow/user\index.html";i:1530846814;s:63:"D:\phpStudy\WWW\shop\template\mobile\rainbow\public\header.html";i:1530846810;s:67:"D:\phpStudy\WWW\shop\template\mobile\rainbow\public\footer_nav.html";i:1530846810;s:65:"D:\phpStudy\WWW\shop\template\mobile\rainbow\public\wx_share.html";i:1530846810;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>个人中心--<?php echo $tpshop_config['shop_info_store_title']; ?></title>
    <link rel="stylesheet" href="/template/mobile/rainbow/static/css/style.css">
    <link rel="stylesheet" type="text/css" href="/template/mobile/rainbow/static/css/iconfont.css"/>
    <script src="/template/mobile/rainbow/static/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
    <!--<script src="/template/mobile/rainbow/static/js/zepto-1.2.0-min.js" type="text/javascript" charset="utf-8"></script>-->
    <script src="/template/mobile/rainbow/static/js/style.js" type="text/javascript" charset="utf-8"></script>
    <script src="/template/mobile/rainbow/static/js/mobile-util.js" type="text/javascript" charset="utf-8"></script>
    <script src="/public/js/global.js"></script>
    <script src="/template/mobile/rainbow/static/js/layer.js"  type="text/javascript" ></script>
    <script src="/template/mobile/rainbow/static/js/swipeSlide.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo (isset($tpshop_config['shop_info_store_ico']) && ($tpshop_config['shop_info_store_ico'] !== '')?$tpshop_config['shop_info_store_ico']:'/public/static/images/logo/storeico_default.png'); ?>" media="screen"/>
</head>
<body class="g4">

<style>
    .my .content .floor_order ul li {
        width: 25%;
    }
</style>
    <div class="myhearder">
        <div class="person">
            <!--<a href="">-->
                <div class="fl personicon">
                    <div class="personicon">
                        <img src="<?php echo (isset($user[head_pic]) && ($user[head_pic] !== '')?$user[head_pic]:"/template/mobile/rainbow/static/images/user68.jpg"); ?>"/>
                    </div>
                </div>
                <div class="fl lors">
                    <span><?php echo $user['nickname']; ?></span>
                    <?php if($first_nickname != ''): ?>
                        <br />
                        <span style="font-size:20px">由(<?php echo $first_nickname; ?>)推荐</span>
                    <?php endif; ?>
                </div>
            <!--</a>-->
        </div>
        <div class="set">
            <!--设置-->
            <a class="setting" href="<?php echo U('Mobile/User/userinfo'); ?>"><i></i></a>
            <!--&lt;!&ndash;我的留言&ndash;&gt;-->
            <!--<a class="massage" href="<?php echo U('User/message_notice'); ?>"><i></i></a>-->
        </div>
        <div class="scgz">
            <ul>
                <li>
                    <a href="<?php echo U('Mobile/User/collect_list'); ?>">
                        <h2><?php echo $user['collect_count']; ?></h2>
                        <p>我的收藏</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Mobile/User/message_notice'); ?>">
                        <h2><?php echo $user_message_count; ?></h2>
                        <p>消息通知</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="floor my p">
        <div class="content">
            <!--订单管理模块-s-->
            <div class="floor myorder ma-to-20 p">
                <div class="content30">
                    <div class="order">
                        <div class="fl">
                            <img src="/template/mobile/rainbow/static/images/mlist.png"/>
                            <span>我的订单</span>
                        </div>
                        <div class="fr">
                            <a href="<?php echo U('Mobile/Order/order_list'); ?>">
                                <span>全部订单</span>
                                <i class="Mright"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="floor floor_order">
                <ul>
                    <li>
                        <a href="<?php echo U('/Mobile/Order/order_list',array('type'=>'WAITPAY')); ?>">
                            <span><?php echo $user['waitPay']; ?></span>
                            <img src="/template/mobile/rainbow/static/images/q1.png" alt="" />
                            <p>待付款</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('/Mobile/Order/wait_receive',array('type'=>'WAITRECEIVE')); ?>">
                            <span><?php echo $user['waitReceive']; ?></span>
                            <img src="/template/mobile/rainbow/static/images/q2.png" alt="" />
                            <p>待收货</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('Mobile/Order/comment',array('status'=>0)); ?>">
                            <span><?php echo $user['uncomment_count']; ?></span>
                            <img src="/template/mobile/rainbow/static/images/q3.png" alt="" />
                            <p>待评价</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('Mobile/Order/return_goods_list',array('type'=>1)); ?>">
                            <span><?php echo $user['return_count']; ?></span>
                            <img src="/template/mobile/rainbow/static/images/q4.png" alt="" />
                            <p>退款/退货</p>
                        </a>
                    </li>
                </ul>
            </div>
            <!--订单管理模块-e-->

            <!--资金管理-s-->
            <div class="floor myorder ma-to-20 p">
                <div class="content30">
                    <div class="order">
                        <div class="fl">
                            <img src="/template/mobile/rainbow/static/images/mwallet.png"/>
                            <span>我的钱包</span>
                        </div>
                        <div class="fr">
                            <!--<a href="bankrollmm.html">-->
                            <a href="<?php echo U('Mobile/User/account'); ?>">
                                <span>资金管理</span>
                                <i class="Mright"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="floor w3">
                <ul>
                    <li>
                        <a href="<?php echo U('Mobile/User/account'); ?>">
                            <h2><?php echo $user['user_money']; ?></h2>
                            <p>余额</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('Mobile/User/coupon'); ?>">
                            <h2><?php echo $user['coupon_count']; ?></h2>
                            <p>优惠券</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('Mobile/User/points_list'); ?>">
                            <h2><?php echo $user['pay_points']; ?></h2>
                            <p>积分</p>
                        </a>
                    </li>
                </ul>
            </div>
            <!--资金管理-e-->

            <div class="floor list7 ma-to-20">
                <?php if($tpshop_config['distribut_switch'] == 1): ?>
                    <div class="myorder p">
                        <div class="content30">
						<a href="javascript:void(0);" onclick="alert('请购买高级版支持哦!');">	
                                <div class="order">
                                    <div class="fl">
                                        <img src="/template/mobile/rainbow/static/images/w1.png"/>
                                        <span>我的分销</span>
                                    </div>
                                    <div class="fr">
                                        <i class="Mright"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="myorder p">
                    <div class="content30">
					<a href="javascript:void(0);" onclick="alert('请购买高级版支持哦!');">	
                            <div class="order">
                                <div class="fl">
                                    <img src="/template/mobile/rainbow/static/images/w10.png"/>
                                    <span>虚拟订单</span>
                                </div>
                                <div class="fr">
                                    <i class="Mright"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="myorder p">
                    <div class="content30">
                    <a href="javascript:void(0);" onclick="alert('请购买高级版支持哦!');">    
                            <div class="order">
                                <div class="fl">
                                    <img src="/template/mobile/rainbow/static/images/w4.png"/>
                                    <span>拼团订单</span>
                                </div>
                                <div class="fr">
                                    <i class="Mright"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="myorder p">
                    <div class="content30">
                        <a href="<?php echo U('Mobile/Order/comment',array('status'=>1)); ?>">
                            <div class="order">
                                <div class="fl">
                                    <img src="/template/mobile/rainbow/static/images/w2.png"/>
                                    <span>我的评价</span>
                                </div>
                                <div class="fr">
                                    <i class="Mright"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="myorder p">
                    <div class="content30">
                        <a href="<?php echo U('Mobile/Goods/integralMall'); ?>">
                            <div class="order">
                                <div class="fl">
                                    <img src="/template/mobile/rainbow/static/images/w5.png"/>
                                    <span>积分商城</span>
                                </div>
                                <div class="fr">
                                    <i class="Mright"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="myorder p">
                    <div class="content30">
                        <a href="<?php echo U('Mobile/Activity/coupon_list'); ?>">
                            <div class="order">
                                <div class="fl">
                                    <img src="/template/mobile/rainbow/static/images/w7.png"/>
                                    <span>领券中心</span>
                                </div>
                                <div class="fr">
                                    <i class="Mright"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="myorder p">
                    <div class="content30">
                        <a href="<?php echo U('Mobile/User/visit_log'); ?>">
                            <div class="order">
                                <div class="fl">
                                    <img src="/template/mobile/rainbow/static/images/w3.png"/>
                                    <span>浏览历史</span>
                                </div>
                                <div class="fr">
                                    <i class="Mright"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <?php if(tpCache('sign')['sign_on_off'] == 1): ?>
                <div class="myorder p">
                    <div class="content30">
					<a href="javascript:void(0);" onclick="alert('请购买高级版支持哦!');">	
                            <div class="order">
                                <div class="fl">
                                    <img src="/template/mobile/rainbow/static/images/w11.png"/>
                                    <span>我的签到</span>
                                </div>
                                <div class="fr">
                                    <i class="Mright"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endif; ?>

                <div class="myorder p">
                    <div class="content30">
                        <a href="<?php echo U('Mobile/User/address_list'); ?>">
                            <div class="order">
                                <div class="fl">
                                    <img src="/template/mobile/rainbow/static/images/w8.png"/>
                                    <span>地址管理</span>
                                </div>
                                <div class="fr">
                                    <i class="Mright"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php if(!$is_wx): ?>
            <div class="setting">
                <div class="close">
                    <a href="<?php echo U('Mobile/User/logout'); ?>" id="logout">安全退出</a>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!--底部导航-start-->
    <div class="foohi">
    <div class="footer">
        <ul>
            <li>
                <a <?php if(CONTROLLER_NAME == 'Index'): ?>class="yello" <?php endif; ?>  href="<?php echo U('Index/index'); ?>">
                    <div class="icon">
                        <i class="icon-shouye iconfont"></i>
                        <p>首页</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Goods/categoryList'); ?>">
                    <div class="icon">
                        <i class="icon-fenlei iconfont"></i>
                        <p>分类</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Cart/index'); ?>">
                    <div class="icon">
                        <i class="icon-gouwuche iconfont"></i>
                        <p>购物车</p>
                    </div>
                </a>
            </li>
            <li>
                <a <?php if(CONTROLLER_NAME == 'User'): ?>class="yello" <?php endif; ?> href="<?php echo U('User/index'); ?>">
                    <div class="icon">
                        <i class="icon-wode iconfont"></i>
                        <p>我的</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>
<script src="/public/js/jqueryUrlGet.js"></script><!--获取get参数插件-->
<script type="text/javascript">
$(document).ready(function(){
	  var cart_cn = getCookie('cn');
	  if(cart_cn == ''){
		$.ajax({
			type : "GET",
			url:"/index.php?m=Home&c=Cart&a=header_cart_list",//+tab,
			success: function(data){								 
				cart_cn = getCookie('cn');
				$('#cart_quantity').html(cart_cn);						
			}
		});	
	  }
	  $('#cart_quantity').html(cart_cn);
});

set_first_leader();//设置推荐人
</script>
<!-- 微信浏览器 调用微信 分享js-->
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
 //如果微信分销配置正常, 商品详情分享内容中的"图标"不显示, 则检查域名否配置了https, 如果配置了https,分享图片地址也要https开头
 var httpPrefix = "http://<?php echo \think\Request::instance()->server('SERVER_NAME'); ?>";
<?php if(ACTION_NAME == 'goodsInfo'): ?>
var ShareLink = httpPrefix+"/index.php?m=Mobile&c=Goods&a=goodsInfo&id=<?php echo $goods[goods_id]; ?>"; //默认分享链接
	var ShareImgUrl = httpPrefix+"<?php echo goods_thum_images($goods[goods_id],100,100); ?>"; // 分享图标
	var ShareTitle = "<?php echo (isset($goods['goods_name']) && ($goods['goods_name'] !== '')?$goods['goods_name']:$tpshop_config['shop_info_store_title']); ?>"; // 分享标题
	var ShareDesc = "<?php echo (isset($goods['goods_remark']) && ($goods['goods_remark'] !== '')?$goods['goods_remark']:$tpshop_config['shop_info_store_desc']); ?>"; // 分享描述
<?php elseif(ACTION_NAME == 'info'): ?>
	var ShareLink = "<?php echo $team['bd_url']; ?>"; //默认分享链接
	var ShareImgUrl = "<?php echo $team['bd_pic']; ?>"; //分享图标
	var ShareTitle = "<?php echo $team[share_title]; ?>"; //分享标题
	var ShareDesc = "<?php echo $team[share_desc]; ?>"; //分享描述
<?php elseif(ACTION_NAME == 'found'): ?>
var ShareLink = httpPrefix+"/index.php?m=Mobile&c=Team&a=found&id=<?php echo $teamFound[found_id]; ?>"; //默认分享链接
	var ShareImgUrl = "<?php echo $team[bd_pic]; ?>"; //分享图标
	var ShareTitle = "<?php echo $team[share_title]; ?>"; //分享标题
	var ShareDesc = "<?php echo $team[share_desc]; ?>"; //分享描述
<?php elseif(ACTION_NAME == 'my_store'): ?>
	var ShareLink = httpPrefix+"/index.php?m=Mobile&c=Distribut&a=my_store"; 
	var ShareImgUrl = httpPrefix+"<?php echo $tpshop_config['shop_info_store_logo']; ?>"; 
	var ShareTitle = "<?php echo $share_title; ?>"; 
	var ShareDesc = httpPrefix+"/index.php?m=Mobile&c=Distribut&a=my_store}"; 
<?php else: ?>
	var ShareLink = httpPrefix+"/index.php?m=Mobile&c=Index&a=index"; //默认分享链接
	var ShareImgUrl = httpPrefix+"<?php echo $tpshop_config['shop_info_wap_home_logo']; ?>"; //分享图标
	var ShareTitle = "<?php echo $tpshop_config['shop_info_store_title']; ?>"; //分享标题
	var ShareDesc = "<?php echo $tpshop_config['shop_info_store_desc']; ?>"; //分享描述
<?php endif; ?>

var is_distribut = getCookie('is_distribut'); // 是否分销代理
var user_id = getCookie('user_id'); // 当前用户id
// 如果已经登录了, 并且是分销商
if(parseInt(is_distribut) == 1 && parseInt(user_id) > 0)
{									
	ShareLink = ShareLink + "&first_leader="+user_id;									
}

$(function() {
	if(isWeiXin() && parseInt(user_id)>0){
		$.ajax({
			type : "POST",
			url:"/index.php?m=Mobile&c=Index&a=ajaxGetWxConfig&t="+Math.random(),
			data:{'askUrl':encodeURIComponent(location.href.split('#')[0])},		
			dataType:'JSON',
			success: function(res)
			{
				//微信配置
				wx.config({
				    debug: false, 
				    appId: res.appId,
				    timestamp: res.timestamp, 
				    nonceStr: res.nonceStr, 
				    signature: res.signature,
				    jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage','onMenuShareQQ','onMenuShareQZone','hideOptionMenu'] // 功能列表，我们要使用JS-SDK的什么功能
				});
			},
			error:function(res){
				console.log("wx.config error:");
				console.log(res);
				return false;
			}
		}); 

		// config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
		wx.ready(function(){
		    // 获取"分享到朋友圈"按钮点击状态及自定义分享内容接口
		    wx.onMenuShareTimeline({
		        title: ShareTitle, // 分享标题
		        link:ShareLink,
		        desc: ShareDesc,
		        imgUrl:ShareImgUrl // 分享图标
		    });

		    // 获取"分享给朋友"按钮点击状态及自定义分享内容接口
		    wx.onMenuShareAppMessage({
		        title: ShareTitle, // 分享标题
		        desc: ShareDesc, // 分享描述
		        link:ShareLink,
		        imgUrl:ShareImgUrl // 分享图标
		    });
			// 分享到QQ
			wx.onMenuShareQQ({
		        title: ShareTitle, // 分享标题
		        desc: ShareDesc, // 分享描述
		        link:ShareLink,
		        imgUrl:ShareImgUrl // 分享图标
			});	
			// 分享到QQ空间
			wx.onMenuShareQZone({
		        title: ShareTitle, // 分享标题
		        desc: ShareDesc, // 分享描述
		        link:ShareLink,
		        imgUrl:ShareImgUrl // 分享图标
			});

		   <?php if(CONTROLLER_NAME == 'User'): ?> 
				wx.hideOptionMenu();  // 用户中心 隐藏微信菜单
		   <?php endif; ?>	
		});
	}
});

function isWeiXin(){
    var ua = window.navigator.userAgent.toLowerCase();
    if(ua.match(/MicroMessenger/i) == 'micromessenger'){
        return true;
    }else{
        return false;
    }
}
</script>
<!--微信关注提醒 start-->
<?php if(\think\Session::get('subscribe') == 0): ?>
<button class="guide" style="display:none;" onclick="follow_wx()">关注公众号</button>
<style type="text/css">
.guide{width:0.627rem;height:2.83rem;text-align: center;border-radius: 8px ;font-size:0.512rem;padding:8px 0;border:1px solid #adadab;color:#000000;background-color: #fff;position: fixed;right: 6px;bottom: 200px;z-index: 99;}
#cover{display:none;position:absolute;left:0;top:0;z-index:18888;background-color:#000000;opacity:0.7;}
#guide{display:none;position:absolute;top:5px;z-index:19999;}
#guide img{width: 70%;height: auto;display: block;margin: 0 auto;margin-top: 10px;}
div.layui-m-layerchild h3{font-size:0.64rem;height:1.24rem;line-height:1.24rem;}
.layui-m-layercont img{height:8.96rem;width:8.96rem;}
</style>
<script type="text/javascript">
  //关注微信公众号二维码	 
function follow_wx()
{
	layer.open({
		type : 1,  
		title: '关注公众号',
		content: '<img src="<?php echo $wechat_config['qr']; ?>">',
		style: ''
	});
}
  
$(function(){
	if(isWeiXin()){
		var subscribe = getCookie('subscribe'); // 是否已经关注了微信公众号		
		if(subscribe == 0)
			$('.guide').show();
	}else{
		$('.guide').hide();
	}
})
 
</script>
<?php endif; ?>
<!--微信关注提醒  end-->
<!-- 微信浏览器 调用微信 分享js  end-->
    <!--底部导航-end-->
    <script src="/template/mobile/rainbow/static/js/style.js" type="text/javascript" charset="utf-8"></script>
<script>
    $(function(){
        var ua = window.navigator.userAgent.toLowerCase();
        if(ua.match(/MicroMessenger/i) == 'micromessenger'){
            $('#logout').hide();
        }
    });
</script>
</body>
</html>
