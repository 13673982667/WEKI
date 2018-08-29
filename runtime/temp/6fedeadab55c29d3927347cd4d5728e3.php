<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:49:"./template/mobile/rainbow/order\refund_order.html";i:1530846810;s:63:"D:\phpStudy\WWW\shop\template\mobile\rainbow\public\header.html";i:1530846810;s:67:"D:\phpStudy\WWW\shop\template\mobile\rainbow\public\header_nav.html";i:1530846810;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>取消订单--<?php echo $tpshop_config['shop_info_store_title']; ?></title>
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

<div class="classreturn loginsignup ">
    <div class="content">
        <div class="ds-in-bl return">
            <a id="[back]" href="javascript:history.back(-1);"><img src="/template/mobile/rainbow/static/images/return.png" alt="返回"></a>
        </div>
        <div class="ds-in-bl search center">
            <span>取消订单</span>
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
<form id='cancelForm'>
    <input type="hidden" class="text gray" name="order_id" value="<?php echo $order['order_id']; ?>"/>
    <input type="hidden" class="text gray user_note" name="user_note" value=""/>
    <div class="n_hadgetgoods">
        <div class="reminder">
            <div class="maleri30 bop">
                <div class="message">
                    <p>温馨提示：</p>
                    <p>1.限时特价、预约资格等购买优惠可能一并取消</p>
                    <p>2.如遇订单拆分、使用优惠券无法返还</p>
                    <p>3.支付金额，抵扣余额积分都按原路退款</p>
                    <p>4.订单一旦取消，无法恢复</p>
                </div>
            </div>
        </div>
        <div class="resonalist list7 detailsfloo">
            <div class="maleri30">
                <div class="myorder returnreson p">
                    <a href="javascript:void(0)">
                        <div class="order">
                            <div class="fl">
                                <span class="firde">退款原因：</span>
                                <span id="user_note">订单不能按预计时间送达</span>
                            </div>
                            <div class="fr">
                                <i class="Mright"></i>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="myorder p">
                    <span class="tp-left-label">联 系 人 : </span>
                    <input class="tp-right-cont" type="text" name="consignee" id="consignee" value="<?php echo (isset($order['consignee']) && ($order['consignee'] !== '')?$order['consignee']:$user['nickname']); ?>">
                </div>
                <div class="myorder p">
                    <span class="tp-left-label">手 机 号 : </span>
                    <input class="tp-right-cont" type="text" name="mobile" id="mobile" value="<?php echo $order['mobile']; ?>">
                </div>
            </div>
        </div>

        <div class="applyandreyurn ma-to-30">
            <a href="javascript:;" onclick="btnSubmit()">申请退款</a>
        </div>
    </div>
    <div class="y_hadgetgoods">
        <div class="reminder">
            <div class="maleri30 bop">
                <div class="message">
                    <p>若您对已收到的货的商品质量不满意，您可以提交返修/退换货申请，订单状态将自动设置为"已完成"</p>
                </div>
            </div>
        </div>
        <div class="reminder reminder_r">
            <div class="maleri30">
                <div class="message">
                    <p>您的商品已出库，订单拦截可能不成功，您可到订单详情页关注最新进度。</p>
                </div>
            </div>
        </div>
        <div class="applyandreyurn ma-to-30">
            <a href="">申请返修/退换货</a>
        </div>
    </div>
    <!--取消订单-s-->
    <div class="losepay closeorder">
        <div class="maleri30">
            <div class="l_top">
                <span>取消原因</span>
                <em class="turenoff"></em>
            </div>
            <div class="resonco">
                <div class="radio">
                    <span class="che">
                        <i></i>
                        <span>订单不能按预计时间送达</span>
                    </span>
                </div>
                <div class="radio">
                    <span class="che">
                        <i></i>
                        <span>操作有误(商品、地址等选错)</span>
                    </span>
                </div>
                <div class="radio">
                    <span class="che">
                        <i></i>
                        <span>重复下单/误下单</span>
                    </span>
                </div>
                <div class="radio">
                    <span class="che">
                        <i></i>
                        <span>其他渠道价格更低</span>
                    </span>
                </div>
                <div class="radio">
                    <span class="che">
                        <i></i>
                        <span>该商品降价了</span>
                    </span>
                </div>
                <div class="radio">
                    <span class="che">
                        <i></i>
                        <span>不想买了</span>
                    </span>
                </div>
                <div class="radio">
                    <span class="che">
                        <i></i>
                        <span>其他原因</span>
                    </span>
                </div>
            </div>
        </div>
        <a href="javascript:;" onclick="btnConfirm()"><div class="submits_de">确定</div></a>
    </div>
    <!--取消订单-e-->
</form>
<div class="mask-filter-div" style="display: none;"></div>
<script type="text/javascript">
    $(function(){
        //弹出层
        $('.returnreson').click(function(){
            $('.mask-filter-div').show();
            $('.losepay').show();
        });
        $('.turenoff').click(function(){
            $('.mask-filter-div').hide();
            $('.losepay').hide();
        });
        //未/已收到货切换
        $('.item_ask_2 .n').click(function(){
            $(this).addClass('action').siblings().removeClass('action');
            $('.n_hadgetgoods').show();
            $('.y_hadgetgoods').hide();
        });
        $('.item_ask_2 .y').click(function(){
            $(this).addClass('action').siblings().removeClass('action');
            $('.n_hadgetgoods').hide();
            $('.y_hadgetgoods').show();
        });
        $('.che').on('click', function() {
           if ($(this).hasClass('check_t')) {
               $('.check_t').removeClass('check_t');
               $(this).addClass('check_t');
           }
           if ($('.check_t').length > 0) {
               $('.submits_de').addClass('bagrr');
           } else {
               $('.submits_de').removeClass('bagrr');
           }
        });
        $('.turenoff').on('click', function () {
            if ($('.check_t span').text() !== '') {
                var user_note = $('.check_t span').text();
                $('#user_note').text(user_note);
                $('.user_note').val(user_note);
            }
        });
    });

    function btnSubmit() {
       var prom_type = parseInt("<?php echo $order['prom_type']; ?>");
        var back_url = '';
        switch (prom_type){
            case 5: back_url="<?php echo U('Virtual/virtual_list'); ?>";break;
            case 6: back_url="<?php echo U('Order/team_list'); ?>";break;
            default: back_url ="<?php echo U('Order/order_list'); ?>";break;
        }
        $.ajax({
            url:"<?php echo U('Order/record_refund_order'); ?>",
            method:'POST',
            data: {
                'order_id' : "<?php echo $order['order_id']; ?>",
                'user_note' : $('#user_note').text(),
                'consignee' : $('#consignee').val(),
                'mobile' :    $('#mobile').val()
            },
            dataType:'json',
            error: function () {
//                layer.open({content:"服务器繁忙, 请联系管理员!", time:2});
            },
            success: function (data) {
                console.log(data);
                if (data.status === 1) {
                    layer.open({content: data.msg,time:2,end:function () {
                        location.href = back_url;
                    }});
                } else {
                    layer.open({content: data.msg,time:2});
                }
            }
        });
    }
    function btnConfirm() {
        if ($('.submits_de').hasClass('bagrr')) {
            $('.turenoff').click();
        }
    }
</script>
</body>
</html>
