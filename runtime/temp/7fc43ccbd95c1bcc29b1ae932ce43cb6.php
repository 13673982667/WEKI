<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:50:"./template/pc/rainbow/order\cancel_order_info.html";i:1530846811;s:57:"D:\phpStudy\WWW\shop\template\pc\rainbow\user\header.html";i:1530846812;s:55:"D:\phpStudy\WWW\shop\template\pc\rainbow\user\menu.html";i:1530846812;s:57:"D:\phpStudy\WWW\shop\template\pc\rainbow\user\footer.html";i:1530846812;s:59:"D:\phpStudy\WWW\shop\template\pc\rainbow\public\footer.html";i:1530846811;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>我的账户-<?php echo $tpshop_config['shop_info_store_title']; ?></title>
		<meta name="keywords" content="<?php echo $tpshop_config['shop_info_store_keyword']; ?>" />
		<meta name="description" content="<?php echo $tpshop_config['shop_info_store_desc']; ?>" />
		<link rel="stylesheet" type="text/css" href="/template/pc/rainbow/static/css/tpshop.css" />
		<link rel="stylesheet" type="text/css" href="/template/pc/rainbow/static/css/myaccount.css" />
		<link rel="shortcut  icon" type="image/x-icon" href="<?php echo (isset($tpshop_config['shop_info_store_ico']) && ($tpshop_config['shop_info_store_ico'] !== '')?$tpshop_config['shop_info_store_ico']:'/public/static/images/logo/storeico_default.png'); ?>" media="screen"  />
		<script src="/template/pc/rainbow/static/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="/public/js/global.js"></script>
		<script src="/public/js/pc_common.js"></script>
	</head>
	<body class="bg-f5">
		<script src="/public/js/global.js" type="text/javascript"></script>
<link rel="stylesheet" href="/template/pc/rainbow/static/css/location.css" type="text/css"><!-- 收货地址，物流运费 -->
<script src="/public/static/js/layer/layer.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="/template/pc/rainbow/static/css/base.css"/>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo (isset($tpshop_config['shop_info_store_ico']) && ($tpshop_config['shop_info_store_ico'] !== '')?$tpshop_config['shop_info_store_ico']:'/public/static/images/logo/storeico_default.png'); ?>" media="screen"/>
<style>
	.list1 li{float:left;}
</style>
<div class="tpshop-tm-hander home-index-top p">
	<div class="top-hander clearfix">
		<div class="w1224 pr clearfix">
			<div class="fl">
				<div class="sendaddress pr fl">
				  <span>送货至：</span>
				  <!-- <span>深圳<i class="share-a_a1"></i></span>-->
				  <span>
					  <ul class="list1">
						  <li class="summary-stock though-line">
							  <div class="dd" style="border-right:0px;width:200px;">
								  <div class="store-selector add_cj_p">
									  <div class="text"><div></div><b></b></div>
									  <div onclick="$(this).parent().removeClass('hover')" class="close"></div>
								  </div>
							  </div>
						  </li>
					  </ul>
				  </span>
				</div>
				<div class="fl nologin">
					<a class="red" href="<?php echo U('Home/user/login'); ?>">登录</a>
					<a href="<?php echo U('Home/user/reg'); ?>">注册</a>
				</div>
				<div class="fl islogin hide">
					<a class="red userinfo" href="<?php echo U('Home/user/index'); ?>"></a>
					<a  href="<?php echo U('Home/user/logout'); ?>"  title="退出" target="_self">安全退出</a>
				</div>
			</div>
			<ul class="top-ri-header fr clearfix">
				<li><a target="_blank" href="<?php echo U('Home/Order/order_list'); ?>">我的订单</a></li>
				<li class="spacer"></li>
				<li><a target="_blank" href="<?php echo U('Home/User/visit_log'); ?>">我的浏览</a></li>
				<li class="spacer"></li>
				<li><a target="_blank" href="<?php echo U('Home/User/goods_collect'); ?>">我的收藏</a></li>
				<li class="spacer"></li>
				<li>客户服务</li>
				<li class="spacer"></li>
				<li class="hover-ba-navdh">
					<div class="nav-dh">
						<span>网站导航</span>
						<i class="share-a_a1"></i>
					</div>
					<ul class="conta-hv-nav clearfix">
						<li>
							<a href="<?php echo U('Home/Activity/promoteList'); ?>">优惠活动</a>
						</li>
						<li>
							<a href="<?php echo U('Home/Activity/pre_sell_list'); ?>">预售活动</a>
						</li>
						<!--<li>
							<a href="<?php echo U('Home/Goods/integralMall'); ?>">拍卖活动</a>
						</li>-->
						<li>
							<a href="<?php echo U('Home/Goods/integralMall'); ?>">兑换中心</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="nav-middan-z p home-index-head">
	<div class="header w1224">
		<div class="ecsc-logo" >
			<a href="/" class="logo">
                <img src="<?php echo (isset($tpshop_config['shop_info_store_user_logo']) && ($tpshop_config['shop_info_store_user_logo'] !== '')?$tpshop_config['shop_info_store_user_logo']:'/public/static/images/logo/pc_home_user_logo_default.png'); ?>" style="width: 159px;height: 58px">
            </a>
		</div>
		<div class="m-index">
			<a href="<?php echo U('Home/User/index'); ?>" class="index">我的商城</a>
			<a href="/" class="home">返回商城首页</a>
		</div>
		<div class="m-navitems">
			<ul class="fixed p">
				<li><a href="<?php echo U('Home/Index/index'); ?>">首页</a></li>
				<li>
					<div class="u-dl">
						<div class="u-dt">
							<span>账户设置</span>
							<i></i>
						</div>
						<div class="u-dd">
							<a href="<?php echo U('Home/User/info'); ?>">个人信息</a>
							<!--<a href="<?php echo U('Home/User/safety_settings'); ?>">安全设置</a>-->
							<a href="<?php echo U('Home/User/address_list'); ?>">收货地址</a>
						</div>
					</div>
				</li>
				<li class="u-msg"><a class="J-umsg" href="<?php echo U('Home/User/message_notice'); ?>">消息<span><?php if($user_message_count > 0): ?><?php echo $user_message_count; endif; ?></span></a></li>
				<li><a href="<?php echo U('Home/Goods/integralMall'); ?>">积分商城</a></li>
				<li class="search_li">
				   <form id="sourch_form" id="sourch_form" method="post" action="<?php echo U('Home/Goods/search'); ?>">
		           	<input class="search_usercenter_text" name="q" id="q" type="text" value="<?php echo \think\Request::instance()->param('q'); ?>"/>
		           	<a class="search_usercenter_btn" href="javascript:;" onclick="if($.trim($('#q').val()) != '') $('#sourch_form').submit();">搜索</a>
		           </form>
		        </li>
			</ul>
		</div>
		<div class="u-g-cart fr" id="hd-my-cart">
			<a href="<?php echo U('Home/Cart/index'); ?>">
			<div class="c-n fl">
				<i class="share-shopcar-index"></i>
				<span>我的购物车</span>
				<em class="shop-nums" id="cart_quantity"></em>
			</div>
			</a>
			<div class="u-fn-cart" id="show_minicart">
				<div class="minicartContent" id="minicart">
				</div>
			</div>
		</div>
	</div>
</div>
<script src="/template/pc/rainbow/static/js/common.js"></script>
<!--------收货地址，物流运费-开始-------------->
<script src="/public/js/locationJson.js"></script>
<script src="/template/pc/rainbow/static/js/location.js"></script>
<script>doInitRegion();</script>


		<div class="home-index-middle">
			<div class="w1224">
				<div class="g-crumbs">
			       	<a href="">我的商城</a>
			       	<i class="litt-xyb"></i>
			       	<span>我的订单</span>
			    </div>
			    <div class="home-main">
					<div class="le-menu fl">
	<div class="menu-ul">
		<ul>
			<li class="ma"><i class="account-acc1"></i>交易中心</li>
			<li><a href="<?php echo U('Home/Order/order_list'); ?>">我的订单</a></li>
			<li><a href="<?php echo U('Home/Virtual/virtual_list'); ?>">虚拟订单</a></li>
			<!--<li><a href="">我的预售</a></li>-->
			<li><a href="<?php echo U('Home/Order/comment'); ?>">我的评价</a></li>
		</ul>
		<ul>
			<li class="ma"><i class="account-acc2"></i>资产中心</li>
			<li><a href="<?php echo U('Home/User/coupon'); ?>">我的优惠券</a></li>
			<!--<li><a href="">我的购物卡</a></li>-->
			<li><a href="<?php echo U('Home/User/recharge'); ?>">账户余额</a></li>
			<li><a href="<?php echo U('Home/User/account'); ?>">我的积分</a></li>
			<!--<li><a href="">积分换券明细</a></li>-->
		</ul>
		<ul>
			<li class="ma"><i class="account-acc3"></i>关注中心</li>
			<li><a href="<?php echo U('Home/User/goods_collect'); ?>">我的收藏</a></li>
			<!--<li><a href="">曾经购买</a></li>-->
			<li><a href="<?php echo U('Home/User/visit_log'); ?>">我的足迹</a></li>
		</ul>
		<ul>
			<li class="ma"><i class="account-acc4"></i>个人中心</li>
			<li><a href="<?php echo U('Home/User/info'); ?>">个人信息</a></li>
			<li><a href="<?php echo U('Home/User/bind_auth'); ?>">账号绑定</a></li>
			<li><a href="<?php echo U('Home/User/address_list'); ?>">地址管理</a></li>
			<li><a href="<?php echo U('Home/User/safety_settings'); ?>">安全设置</a></li>
		</ul>
		<ul>
			<li class="ma"><i class="account-acc5"></i>服务中心</li>
			<!--<li><a href="">我的咨询</a></li>-->
			<li><a href="<?php echo U('Home/Order/return_goods_list'); ?>">退货管理</a></li>
			<li><a href="<?php echo U('Home/User/message_notice'); ?>">消息通知</a></li>
		</ul>
		<ul>
			<li class="ma"><i class="account-acc6"></i>分销中心</li>
			<li><a href="<?php echo U('Home/Order/lower_list'); ?>">我的推广</a></li>
			<li><a href="<?php echo U('Home/Order/income'); ?>">我的收益</a></li>
		</ul>
	</div>
</div>
			    	<div class="ri-menu fr">
						<div class="cancel-order-record" id="cancel-order-record" data-state="<?php echo $order['pay_status']; ?>">
							<div class="title">
								<div class="left-title">取消订单详情</div>
								<a class="right-btn" href="tencent://message/?uin=<?php echo (isset($tpshop_config['shop_info_phone']) && ($tpshop_config['shop_info_phone'] !== '')?$tpshop_config['shop_info_phone']:'2812952605'); ?>&Site=TPshop商城&Menu=yes"><i class="ico-contact-small"></i>联系卖家</a>
							</div>
							<div class="cont">
								<ul class="mes">
									<li>订单编号 : <span class="id-num"><?php echo $order['order_sn']; ?></span></li>
									<li>取消进度 : <span class="show-record">取消处理</span></li>
									<li class="mes-item">支付总额 : <span class="pay-total">￥<?php echo $order['total_amount']; ?></span></li>
								</ul>
								<p class="tip">亲爱的客户，我们正在为您处理中，请耐心等待。</p>
							</div>
							<div class="progress-bar"></div>
							<script>
								// function setOrderRecord(){  //设置订单状态
								// 	var $_orderRecord=$('#cancel-order-record');
								// 	var orderState=parseInt($_orderRecord.attr('data-state'));
								// 	var data=[
								// 		{'state':1,'showRecord':'取消处理','progressBar':'/template/pc/rainbow/static/images/progress-bar-1.png'},
								// 		{'state':2,'showRecord':'退款处理','progressBar':'/template/pc/rainbow/static/images/progress-bar-2.png'},
								// 		{'state':3,'showRecord':'完成','progressBar':'/template/pc/rainbow/static/images/progress-bar-3.png'}
								// 	]
								// 	$_orderRecord.find('.show-record').text(data[orderState-1].showRecord);
								// 	$_orderRecord.find('.progress-bar').css('backgroundImage','url('+data[orderState-1].progressBar+')');
								// }
                                function setOrderRecord(){  //设置订单状态
                                    var $_orderRecord=$('#cancel-order-record');
                                    var orderState=parseInt($_orderRecord.attr('data-state'));
                                    var data=[
                                        {'state':1,'showRecord':'取消处理','progressBar':'/template/pc/rainbow/static/images/progress-bar-1.png'},
                                        {'state':2,'showRecord':'退款处理','progressBar':'/template/pc/rainbow/static/images/progress-bar-2.png'},
                                        {'state':3,'showRecord':'完成','progressBar':'/template/pc/rainbow/static/images/progress-bar-3.png'},
                                        {'state':4,'showRecord':'审核失败','progressBar':'/template/pc/rainbow/static/images/progress-bar-3.png'}
                                    ]
                                    $_orderRecord.find('.show-record').text(data[orderState-1].showRecord);
                                    $_orderRecord.find('.progress-bar').css('backgroundImage','url('+data[orderState-1].progressBar+')');
                                }
								setOrderRecord();
							</script>
						</div>
						<!--  
						<div class="cancel-order-des">
							<div class="title">
								<div class="left-title">取消申请记录</div>
								<a class="right-btn" href="javascript:;">收起</a>
							</div>
							<table class="cancel-order-detail">
								<tr>
									<th class="deal-time">处理时间</th>
									<th class="deal-meg">处理信息</th>
									<th class="operator">操作人</th>
								</tr>
								<tr>
									<td class="time">2017-06-17 15:17:59</td>
									<td class="text-left">您的取消申请已提交</td>
									<td>客户</td>
								</tr>
								<tr>
									<td class="time">2017-06-17 15:17:59</td>
									<td class="text-left">您的订单正在生产，系统正在尝试拦截，请耐心等待。</td>
									<td>商城物流</td>
								</tr>
								<tr>
									<td class="time">2017-06-17 15:17:59</td>
									<td class="text-left">您的订单拦截成功，财务正在进行退款审核，请耐心等待。</td>
									<td>商城财务</td>
								</tr>
								<tr>
									<td class="time">2017-06-17 15:17:59</td>
									<td class="text-left">受理完成，到账周期<a href="javascript:;">（链接）</a>。</td>
									<td>商城财务</td>
								</tr>
							</table>
						</div>-->
						<div class="cancel-order-des">
							<div class="title">
								<div class="left-title">申请单详细信息</div>
								<a class="right-btn" href="javascript:;">收起</a>
							</div>
							<table class="cancel-order-detail">
								<tr>
									<th class="til">订单编号</th>
									<td class="cont"><span><?php echo $order['order_sn']; ?></span></td>
								</tr>
								<tr>
									<th class="til">支付明细</th>
									<td class="cont">
										<p class="cont-des">支付总金额 : <span class="td-red">￥<?php echo $order['total_amount']; ?></span></p>
										<p class="cont-des">余额支付 : <span class="td-red">￥<?php echo $order['user_money']; ?></span></p>
										<p class="cont-des">积分抵扣 : <span class="td-red">￥<?php echo $order['integral_money']; ?></span></p>
										<!--<p class="cont-des">优惠 : <span>￥<?php echo $order['coupon_price']; ?></span> 在线支付 : <span>￥<?php echo $order['total_amount']; ?></span></p>-->
										<p class="cont-des">优惠 : <span>￥<?php echo $order['order_prom_amount']; ?></span> 在线支付 : <span>￥<?php echo $order['total_amount']; ?></span></p>
									</td>
								</tr>
								<tr>
									<th class="til">取消原因</th>
									<td class="cont"><?php echo $order['user_note']; ?></td>
								</tr>
								<tr>
									<th class="til">联系方式</th>
									<td class="cont">
										<i class="td-m-r">联系人：<?php echo $order['consignee']; ?></i>联系电话：<?php echo $order['mobile']; ?>
									</td>
								</tr>
							</table>
						</div>
						<div class="cancel-order-des">
							<div class="title">
								<div class="left-title">退款明细状态详解</div>
							</div>
							<p class="refund-detail">1、已退：商城已完成退款处理，实际退款时间以到账时间为准。</p>
							<p class="refund-detail">2、待退：订单含有未退款项，待系统处理，请您耐心等待。</p>
							<p class="refund-detail">3、未退：商城劵发生拆分是不予返还、商城劵、手机红包请您联系客服处理。</p>
						</div>
			    	</div>
			    </div>
			</div>
		</div>
		<!--footer-s-->
<div class="footer p">
    <div class="w1224">
        <div class="tpshop-service">
	<ul class="w1224 clearfix">
		<li>
			<i class="ico ico-day7"><?php echo $tpshop_config['shopping_auto_service_date']; ?></i>
			<p class="service"><?php echo $tpshop_config['shopping_auto_service_date']; ?>天无理由退货</p>
		</li>
		<li>
			<i class="ico ico-day15">15</i>
			<p class="service">15天免费换货</p>
		</li>
		<li>
			<i class="ico ico-quality"></i>
			<p class="service">正品行货 品质保障</p>
		</li>
		<li>
			<i class="ico ico-service"></i>
			<p class="service">专业售后服务</p>
		</li>
	</ul>
</div>
<div class="footer">
	<div class="w1224 clearfix" style="padding-bottom: 10px;">
		<div class="left-help-list">
			<div class="help-list-wrap clearfix">
				<?php
                                   
                                $md5_key = md5("select * from `__PREFIX__article_cat` where cat_id < 6  order by sort_order asc");
                                $result_name = $sql_result_v = S("sql_".$md5_key);
                                if(empty($sql_result_v))
                                {                            
                                    $result_name = $sql_result_v = \think\Db::query("select * from `__PREFIX__article_cat` where cat_id < 6  order by sort_order asc"); 
                                    S("sql_".$md5_key,$sql_result_v,1);
                                }    
                              foreach($sql_result_v as $k=>$v): ?>
					<dl>
						<dt><?php echo $v[cat_name]; ?></dt>
						<?php
                                   
                                $md5_key = md5("select * from `__PREFIX__article` where cat_id = $v[cat_id]  and is_open=1 limit 5");
                                $result_name = $sql_result_v2 = S("sql_".$md5_key);
                                if(empty($sql_result_v2))
                                {                            
                                    $result_name = $sql_result_v2 = \think\Db::query("select * from `__PREFIX__article` where cat_id = $v[cat_id]  and is_open=1 limit 5"); 
                                    S("sql_".$md5_key,$sql_result_v2,1);
                                }    
                              foreach($sql_result_v2 as $k2=>$v2): ?>
						<dd><a href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id])); ?>"><?php echo $v2[title]; ?></a></dd>
						<?php endforeach; ?>
					</dl>
				<?php endforeach; ?>
			</div>
			<div class="friendship-links clearfix">
	            <span>友情链接 : </span>
                <div class="links-wrap-h clearfix">
                <?php
                                   
                                $md5_key = md5("select * from `__PREFIX__friend_link` where is_show=1");
                                $result_name = $sql_result_v = S("sql_".$md5_key);
                                if(empty($sql_result_v))
                                {                            
                                    $result_name = $sql_result_v = \think\Db::query("select * from `__PREFIX__friend_link` where is_show=1"); 
                                    S("sql_".$md5_key,$sql_result_v,1);
                                }    
                              foreach($sql_result_v as $k=>$v): ?>
                    <a href="<?php echo $v[link_url]; ?>" <?php if($v['target'] == 1): ?>target="_blank"<?php endif; ?> ><?php echo $v[link_name]; ?></a>
                <?php endforeach; ?>
                </div>
	        </div>	
		</div>
		<div class="right-contact-us">
			<h3 class="title">联系我们</h3>
			<span class="phone"><?php echo $tpshop_config['shop_info_phone']; ?></span>
			<p class="tips">周一至周日8:00-18:00<br />(仅收市话费)</p>
			<!--<div class="qr-code-list clearfix">-->
				<!--<a class="qr-code" href="javascript:;"><img class="w-100" src="/template/pc/rainbow/static/images/qrcode.png" alt="" /></a>-->
				<!--<a class="qr-code qr-code-tpshop" href="javascript:;"><img class="w-100" src="/template/pc/rainbow/static/images/qrcode.png" alt="" /></a>-->
			<!--</div>-->
		</div>
	</div>
    <div class="mod_copyright p">
        <div class="grid-top">
            <?php
                                   
                                $md5_key = md5("SELECT * FROM `__PREFIX__navigation` where is_show = 1 AND position = 'bottom' ORDER BY `sort` DESC");
                                $result_name = $sql_result_vv = S("sql_".$md5_key);
                                if(empty($sql_result_vv))
                                {                            
                                    $result_name = $sql_result_vv = \think\Db::query("SELECT * FROM `__PREFIX__navigation` where is_show = 1 AND position = 'bottom' ORDER BY `sort` DESC"); 
                                    S("sql_".$md5_key,$sql_result_vv,1);
                                }    
                              foreach($sql_result_vv as $kk=>$vv): ?>
                <a href="<?php echo $vv[url]; ?>" <?php if($vv[is_new] == 1): ?> target="_blank" <?php endif; ?> ><?php echo $vv[name]; ?></a><span>|</span>
            <?php endforeach; ?>
            <!--<a href="javascript:void (0);">关于我们</a><span>|</span>-->
            <!--<a href="javascript:void (0);">联系我们</a><span>|</span>-->
            <!--<?php
                                   
                                $md5_key = md5("select * from `__PREFIX__article` where cat_id = 5 and is_open=1");
                                $result_name = $sql_result_v = S("sql_".$md5_key);
                                if(empty($sql_result_v))
                                {                            
                                    $result_name = $sql_result_v = \think\Db::query("select * from `__PREFIX__article` where cat_id = 5 and is_open=1"); 
                                    S("sql_".$md5_key,$sql_result_v,1);
                                }    
                              foreach($sql_result_v as $k=>$v): ?>-->
                <!--<a href="<?php echo U('Home/Article/detail',array('article_id'=>$v[article_id])); ?>"><?php echo $v[title]; ?></a>-->
                <!--<span>|</span>-->
            <!--<?php endforeach; ?>-->
        </div>
        <p>Copyright © 2016-2025 <?php echo (isset($tpshop_config['shop_info_store_name']) && ($tpshop_config['shop_info_store_name'] !== '')?$tpshop_config['shop_info_store_name']:'TPshop商城'); ?> 版权所有 保留一切权利 备案号:<?php echo $tpshop_config['shop_info_record_no']; ?></p>
        <p class="mod_copyright_auth">
            <a class="mod_copyright_auth_ico mod_copyright_auth_ico_1" href="" target="_blank">经营性网站备案中心</a>
            <a class="mod_copyright_auth_ico mod_copyright_auth_ico_2" href="" target="_blank">可信网站信用评估</a>
            <a class="mod_copyright_auth_ico mod_copyright_auth_ico_3" href="" target="_blank">网络警察提醒你</a>
            <a class="mod_copyright_auth_ico mod_copyright_auth_ico_4" href="" target="_blank">诚信网站</a>
            <a class="mod_copyright_auth_ico mod_copyright_auth_ico_5" href="" target="_blank">中国互联网举报中心</a>
        </p>
    </div>
</div>
<style>
    .mod_copyright {
        border-top: 1px solid #EEEEEE;
    }
    .grid-top {
        margin-top: 20px;
        text-align: center;
    }
    .grid-top span {
        margin: 0 10px;
        color: #ccc;
    }
    .mod_copyright > p {
        margin-top: 10px;
        color: #666;
        text-align: center;
    }
    .mod_copyright_auth_ico {
        overflow: hidden;
        display: inline-block;
        margin: 0 3px;
        width: 103px;
        height: 32px;
        background-image: url(/template/pc/rainbow/static/images/ico_footer.png);
        line-height: 1000px;
    }
    .mod_copyright_auth_ico_1 {
        background-position: 0 -151px;
    }
    .mod_copyright_auth_ico_2 {
        background-position: -104px -151px;
    }
    .mod_copyright_auth_ico_3 {
        background-position: 0 -184px;
    }
    .mod_copyright_auth_ico_4 {
        background-position: -104px -184px;
    }
    .mod_copyright_auth_ico_5 {
        background-position: 0 -217px;
    }
</style>
<script>
    // 延时加载二维码图片
    jQuery(function($) {
        $('img[img-url]').each(function() {
            var _this = $(this),
                    url = _this.attr('img-url');
            _this.attr('src',url);
        });
    });
</script>
    </div>
</div>
<!--footer-e-->
		<script>
			/*
			* 打开收起
			* */
			$('.cancel-order-des').find('.right-btn').click(function () {
				$(this).parents('.cancel-order-des').find('.cancel-order-detail').toggle();
				if($(this).text()=='收起'){
					$(this).text('打开');
				}else{
					$(this).text('收起');
				}
			});
		</script>
	</body>
</html>