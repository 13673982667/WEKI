<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:44:"./template/mobile/rainbow/order\express.html";i:1530846810;s:63:"D:\phpStudy\WWW\shop\template\mobile\rainbow\public\header.html";i:1530846810;s:67:"D:\phpStudy\WWW\shop\template\mobile\rainbow\public\header_nav.html";i:1530846810;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>查看物流信息--<?php echo $tpshop_config['shop_info_store_title']; ?></title>
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
<body class="f3">

<div class="classreturn loginsignup ">
    <div class="content">
        <div class="ds-in-bl return">
            <a id="[back]" href="javascript:history.back(-1)"><img src="/template/mobile/rainbow/static/images/return.png" alt="返回"></a>
        </div>
        <div class="ds-in-bl search center">
            <span>查看物流信息</span>
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
<div class="dindboxt p">
    <div class="maleri30">
        <div class="fl_addextra fl">
            <p><span class="gray">运单编号：</span><span><?php echo $delivery[invoice_no]; ?></span></p>
            <p><span class="gray">国内承运人：</span><span><?php echo $delivery[shipping_name]; ?></span></p>
        </div>
        <!--<div class="fr_extra fr">-->
            <!--<a class="tuid sueye" href="javascript:void(0);">我要催单</a>-->
        <!--</div>-->
    </div>
</div>
<div class="listschdule orderrefuce ma-to-20">
    <?php if($delivery['shipping_code'] AND $delivery['invoice_no']): ?>
        <p class="logis-detail-date" id="express_info"></p>
        <script>
            queryExpress();
            function queryExpress()
            {
                var shipping_code = "<?php echo $delivery['shipping_code']; ?>";
                var invoice_no = "<?php echo $delivery['invoice_no']; ?>";
                $.ajax({
                    type : "GET",
                    dataType: "json",
                    url:"/index.php?m=Home&c=Api&a=queryExpress&shipping_code="+shipping_code+"&invoice_no="+invoice_no,//+tab,
                    success: function(data){
                        var html = '';
                        if(data.status == 200){
                            $.each(data.data, function(i,o){
                                html +="<div class='tittimlord red-around'><h2>"+ o.context +"</h2> <p>"+ o.time +"</p></div>";
                            });
                        }else{
                            html +="<div class='tittimlord red-around'><h2>"+data.message+"</h2> <p></p></div>";
                        }
                        $("#express_info").after(html);
                    }
                });
            }
        </script>
    <?php endif; ?>
    <!--  物流信息 end-->
</div>
<div class="mask-filter-div" style="display: none;"></div>
</body>
</html>
