<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:41:"./template/mobile/rainbow/cart\cart4.html";i:1530846810;s:63:"D:\phpStudy\WWW\shop\template\mobile\rainbow\public\header.html";i:1530846810;s:67:"D:\phpStudy\WWW\shop\template\mobile\rainbow\public\header_nav.html";i:1530846810;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>支付,提交订单--<?php echo $tpshop_config['shop_info_store_title']; ?></title>
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
<body class="">

<div class="classreturn loginsignup ">
    <div class="content">
        <div class="ds-in-bl return">
            <a id="[back]" href="/index.php/Mobile/Order/order_list/type/WAITPAY"><img src="/template/mobile/rainbow/static/images/return.png" alt="返回"></a>
        </div>
        <div class="ds-in-bl search center">
            <span>支付,提交订单</span>
        </div>
        <div class="ds-in-bl menu">
            <a href="javascript:void(0);"><img src="/template/mobile/rainbow/static/images/class1.png" alt="菜单"></a>
        </div>
    </div>
</div>
<div class="flool up-tpnavf-wrap tpnavf [top-header]">
    <div class="footer up-tpnavf-head">
    	<div class="up-tpnavf-i"> </div>
        <ul>
            <li>
                <a class="yello" href="<?php echo U('Index/index'); ?>">
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
                <a href="<?php echo U('User/index'); ?>">
                    <div class="icon">
                        <i class="icon-wode iconfont"></i>
                        <p>我的</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>
<script type="text/javascript">
	
$(function(){	
	$(window).scroll(function() {		
		if($(window).scrollTop() >= 1){ 
			$('.tpnavf').hide()
		}
	})
})
</script>
<form action="<?php echo U('Mobile/Payment/getCode'); ?>" method="post" name="cart4_form" id="cart4_form">
    <div class="ddmoney">
        <div class="maleri30">
            <span class="fl">订单号</span>
            <span class="fr"><?php echo $order[order_sn]; ?></span>
        </div>
    </div>
    <div class="ddmoney">
        <div class="maleri30">
            <span class="fl">订单金额</span>
            <span class="fr"><?php echo $order[order_amount]; ?>元</span>
        </div>
    </div>
    <!--其他支付方式-s-->
    <div class="paylist">
        <div class="myorder debit otherpay p">
            <div class="content30">
                <a href="javascript:void(0);">
                    <div class="order">
                        <div class="fl">
                            <span>支付方式</span>
                        </div>
                        <div class="fr">
                            <!--<i class="Mright xjt"></i>-->
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="pay-list-4 p">
        <div class="maleri30">
            <ul>
                <?php if(is_array($paymentList) || $paymentList instanceof \think\Collection || $paymentList instanceof \think\Paginator): if( count($paymentList)==0 ) : echo "" ;else: foreach($paymentList as $k=>$v): ?>
                    <li  onClick="changepay(this);">
                        <label>
                        <div class="radio fl">
							<span class="che <?php echo $k; ?>">
								<i>
                                    <input type="radio" value="pay_code=<?php echo $v['code']; ?>" class="c_checkbox_t" name="pay_radio" style="display:none;"/>
                                </i>
							</span>
                        </div>
                            <div class="pay-list-img fl">
                                <img src="/plugins/<?php echo $v['type']; ?>/<?php echo $v['code']; ?>/<?php echo $v['icon']; ?>"/>
                            </div>
                            <div class="pay-list-font fl">
                                <?php echo $v[name]; ?>
                            </div>
                        </label>
                    </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <!--其他支付方式-s-->

    <div class="paiton">
        <div class="maleri30">
            <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>" />
            <a class="soon" href="javascript:void(0);" onClick="pay()"><span>立即支付</span></a>
            <!--<p class="fr"><a href="javascript:void(0);" class="lossbq">支付失败？</a></p>-->
        </div>
    </div>

<!--    <div class="quickpayment">
        <div class="maleri30">
            <div class="quicks fl"><img src="/template/mobile/rainbow/static/images/quick.png"/></div>
            <div class="paym fl">
                <p class="titp">快捷支付</p>
                <p class="spi">银行卡快捷支付服务</p>
            </div>
        </div>
    </div>
    <div class="myorder debit usedeb p">
        <div class="content30">
            <a href="javascript:void(0)">
                <div class="order">
                    <div class="fl">
                        <span>使用银行卡</span>
                    </div>
                    <div class="fr">
                        <i class="Mright xjt"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
&lt;!&ndash;选择银行卡弹窗-s&ndash;&gt;
		<div class="chooseebitcard">
			<div class="maleri30">
				<div class="choose-titr">
					<span>选择银行卡</span>
					<i class="gb-close"></i>
				</div>

				<div class="card">
					<div class="card-list">
						<div class="radio fl">
							<span class="che">
								<i>
                                    <input type="radio"   value="pay_code=<?php echo $v['code']; ?>" class="c_checkbox_t" name="pay_radio" style="display:none;"/>
                                </i>
							</span>
						</div>
						<p class="fl">&nbsp;&nbsp;<span>工商银行储蓄卡</span>&nbsp;&nbsp;<span>(3689)</span></p>
					</div>
				</div>

				<p class="teuse"><span class="red">+</span><span>使用新银行卡</span></p>
			</div>
		</div>
&lt;!&ndash;选择银行卡弹窗-e&ndash;&gt;

&lt;!&ndash;支付失败-s&ndash;&gt;
		<div class="losepay">
			<div class="maleri30">
				<p class="red">支付失败</p>
				<p class="lo-tit">以下两种情况需要您重新绑卡：</p>
				<p class="con-lo">1.信用卡有效期过期或更换了卡片</p>
				<p class="con-lo">2.修改了银行卡预留手机号码</p>
				<div class="qx-rebd">
					<a class="ax">取消</a>
					<a class="are">重新绑定</a>
				</div>
			</div>
		</div>
&lt;!&ndash;支付失败-e&ndash;&gt;-->

<div class="mask-filter-div" style="display: none;"></div>
</form>
<script type="text/javascript">
    $(function(){
        //默认选中第一个
        $('.pay-list-4 div ul li:first').find('.che').addClass('check_t').end().find(':radio').prop('checked',true);
    })
    //切换支付方式
    function changepay(obj){
        $(obj).find('.che').addClass('check_t').parents('li').siblings('li').find('.che').removeClass('check_t');
        //改变中状态
        if($(obj).find('.che').hasClass('check_t')){
            $(obj).find(':radio').prop('checked',true);//选中
            $(obj).siblings('li').find(':radio').prop('checked',false);
        }else{
            $(obj).find(':radio').prop('checked',false);//取消选中
        }
    }

    function pay(){
    	if($("input[name='pay_radio']:checked").length == 0){
    		layer.open({content:'请选择支付方式',time:2});
    		return false;
    	}
        $('#cart4_form').submit();
        return;//微信JS支付
    }

    $(function(){
        //使用银行卡
        $('.usedeb').click(function(){
            cover();
            $('.chooseebitcard').show();
        })
        $('.gb-close').click(function(){
            undercover();
            $('.chooseebitcard').hide();
        })

//        // 其他支付方式
//        $('.pay-list-4 ul li').click(function(){
//            $(this).find('.che').toggleClass('check_t').parents('li').siblings('li').find('.che').removeClass('check_t');
//        })

        //选择银行卡
        $('.card').click(function(){
            $(this).find('.che').toggleClass('check_t').parents('.card').siblings().find('.che').removeClass('check_t');
        })
//        $('.che').click(function(){
//            $(this).toggleClass('check_t')
//        })

        //支付失败弹窗
        $('.lossbq').click(function(){
            cover();
            $('.losepay').show();
        })
        $('.qx-rebd .ax').click(function(){
            undercover();
            $('.losepay').hide();
        })
        $('.are').click(function(){
            $('.losepay').hide();
            $('.chooseebitcard').show();
        })
    })
</script>
<!--支付返回弹窗-->
		<div class="package-pop-bg-opacity" style="display: none;"></div>
		<div class="package-pop p "  style="display: none;">
			<p>便宜不等人，请三思而行</p>
			<div class="package-pop-select p">
				<a href="" class="fl">
					我再想想
				</a>
				<a href="" class="fr">
					去意已决
				</a>
				<div class="package-pop-icon">
					
				</div>
			</div>
		</div>
	</body>
</html>