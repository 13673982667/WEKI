<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:48:"./template/mobile/rainbow/order\add_comment.html";i:1530846810;s:63:"D:\phpStudy\WWW\shop\template\mobile\rainbow\public\header.html";i:1530846810;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>评论晒单--<?php echo $tpshop_config['shop_info_store_title']; ?></title>
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

<form id="add_comment" method="post" enctype="multipart/form-data">
    <input type="hidden" name="prom_type"  value="<?php echo $order_info['prom_type']; ?>">
    <input type="hidden" name="rec_id"  value="<?php echo $rec_id; ?>">
<!--顶部-s-->
    <div class="classreturn loginsignup">
        <div class="content">
            <div class="ds-in-bl return">
                <a href="javascript:history.back(-1);"><img src="/template/mobile/rainbow/static/images/return.png" alt="返回"></a>
            </div>
            <div class="ds-in-bl search ">
                <span>评价晒单</span>
            </div>
            <div class="ds-in-bl menu">
                <a class="submit_com" href="javascript:void(0);" onclick="validate_comment(this)">提交</a>
            </div>
        </div>
    </div>
<!--顶部-e-->
<!--评分-s-->
    <div class="sp_idear">
        <div class="maleri30">
            <img src="<?php echo goods_thum_images($order_goods['goods_id'],100,100); ?>"/>
            <div class="com_igy p">
                <p class="confine-wsp"><?php echo $order_goods['goods_name']; ?></p>
                <p class="confine-wsp  shuxg"><?php echo $order_goods['spec_key_name']; ?></p>
            </div>
        </div>
    </div>
<!--评分-e-->
<!--评论-s-->
    <div class="customer-messa comm_text_goods">
        <div class="maleri30">
            <textarea class="tapassa" onkeyup="checkfilltextarea('.tapassa','200')" d id="content_13" maxlength="200" name="content" placeholder="写下购买体会和使用感受来帮助其他小伙伴~"></textarea>
            <span class="xianzd"><em id="zero">200</em>/200</span>
        </div>
    </div>
<!--评论-e-->
<!--上传图片-s-->
    <div class="seravetype">
        <div class="maleri30">
            <ul id="imglen">
                <label>
                    <li class="file">
                        <div class="shcph" id="fileList0">
                            <img src="/template/mobile/rainbow/static/images/camera.png">
                        </div>
                        <input  type="file" accept="image/*" name="comment_img_file[]"  onchange="handleFiles(this,0)" style="display:none">
                    </li>
                </label>
                <label>
                    <li class="file">
                        <div class="shcph" id="fileList1">
                            <img src="/template/mobile/rainbow/static/images/camera.png">
                        </div>
                        <input  type="file" accept="image/*" name="comment_img_file[]"  onchange="handleFiles(this,1)" style="display:none">
                    </li>
                </label>
                <label>
                    <li class="file">
                        <div class="shcph" id="fileList2">
                            <img src="/template/mobile/rainbow/static/images/camera.png">
                        </div>
                        <input  type="file" accept="image/*" name="comment_img_file[]"  onchange="handleFiles(this,2)" style="display:none">
                    </li>
                </label>
                <label>
                    <li class="file">
                        <div class="shcph" id="fileList3">
                            <img src="/template/mobile/rainbow/static/images/camera.png">
                        </div>
                        <input  type="file" accept="image/*" name="comment_img_file[]"  onchange="handleFiles(this,3)" style="display:none">
                    </li>
                </label>
                <label>
                    <li class="file">
                        <div class="shcph" id="fileList4">
                            <img src="/template/mobile/rainbow/static/images/camera.png">
                        </div>
                        <input  type="file" accept="image/*" name="comment_img_file[]"  onchange="handleFiles(this,4)" style="display:none">
                    </li>
                </label>
            </ul>
            <div class="inspectrepot p">
                <div class="radio">
                    <span class="che"  onclick="hideUserName(this)">
                        <input type="checkbox" name="hide_username" style="display:none;" id="hide_username" value="1">
                        <i></i>
                        <span>匿名评价</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
<!--上传图片-e-->
<!--服务评价-s-->
    <div class="wlcomenser ma-to-20">
        <div class="maleri30">
            <div class="p_zyft p">
                <p class="fl">评分</p>
                <p class="fr lifi">满意请给5分哦</p>
            </div>
        </div>
    </div>
    <div class="thirs_commen jsstar">
        <div class="maleri30">
            <div class="al_comentaid p">
                <div class="taidh">商品符合度</div>
                <div class="star_click">
                   <span class="comment-item-star_wr" title="1">
                        <span class="real-star_wr" ></span>
                    </span>
                    <span class="comment-item-star_wr" title="2">
                        <span class="real-star_wr" ></span>
                    </span>
                    <span class="comment-item-star_wr" title="3">
                        <span class="real-star_wr" ></span>
                    </span>
                    <span class="comment-item-star_wr" title="4">
                        <span class="real-star_wr" ></span>
                    </span>
                    <span class="comment-item-star_wr" title="5">
                        <span class="real-star_wr" ></span>
                    </span>
                    <input name="goods_rank" value="0" type="hidden">
                </div>
            </div>
            <div class="al_comentaid p">
                <div class="taidh">店家服务态度</div>
                <div class="star_click">
                    <span class="comment-item-star_wr" title="1">
                        <span class="real-star_wr" ></span>
                    </span>
                    <span class="comment-item-star_wr" title="2">
                        <span class="real-star_wr" ></span>
                    </span>
                    <span class="comment-item-star_wr" title="3">
                        <span class="real-star_wr" ></span>
                    </span>
                    <span class="comment-item-star_wr" title="4">
                        <span class="real-star_wr" ></span>
                    </span>
                    <span class="comment-item-star_wr" title="5">
                        <span class="real-star_wr" ></span>
                    </span>
                    <input name="service_rank" value="0" type="hidden">
                </div>
            </div>
            <?php if($order_info['prom_type'] != 5): ?>
                <div class="al_comentaid p">
                <div class="taidh">物流发货速度</div>
                <div class="star_click">
                    <span class="comment-item-star_wr" title="1">
                        <span class="real-star_wr"  ></span>
                    </span>
                    <span class="comment-item-star_wr" title="2">
                        <span class="real-star_wr"  ></span>
                    </span>
                    <span class="comment-item-star_wr" title="3">
                        <span class="real-star_wr"  ></span>
                    </span>
                    <span class="comment-item-star_wr" title="4">
                        <span class="real-star_wr"  ></span>
                    </span>
                    <span class="comment-item-star_wr" title="5">
                        <span class="real-star_wr"  ></span>
                    </span>
                    <input name="deliver_rank" value="0" type="hidden">
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
<!--服务评价-e-->
    <input type="hidden" name="order_id" value="<?php echo $order_goods['order_id']; ?>">
    <input type="hidden" name="goods_id" value="<?php echo $order_goods['goods_id']; ?>">
</form>
<script type="text/javascript">
    /**
     * 留言字数限制
     * tea ：要限制数字的class名
     * nums ：允许输入的最大值
     * zero ：输入时改变数值的ID
     */
    function checkfilltextarea(tea,nums){
        var len = $(tea).val().length;
        if(len > nums){
            $(tea).val($(tea).val().substring(0,nums));
        }
        var num = nums - len;
        num <= 0 ? $("#zero").text(0): $("#zero").text(num);  //防止出现负数
    }
    $(function(){
        $(".jsstar input").val('');
        //评分
        $('.comment-item-star_wr').click(function(e){
            var obj = $(this);
            obj.find('span').addClass('comment-stars-width5');
            obj.prevAll().find('span').addClass('comment-stars-width5').parent();
            obj.nextAll().find('span').removeClass('comment-stars-width5');
            obj.siblings('input').val(obj.attr('title'));
        })
    })
    function hideUserName(obj){
        if($(obj).hasClass('check_t')){
            $('#hide_username').prop('checked',false);
        }else{
            $('#hide_username').prop('checked',true);
        }

    }

    function validate_comment(obj){
        $(obj).attr('disabled',true);
        var content = $("#content_13").val();
        var error = [];
        var img_num = 0;
        var AllImgExt=".jpg|.jpeg|.gif|.bmp|.png|";//全部图片格式类型
        $(".file input").each(function(index){
            FileExt = this.value.substr(this.value.lastIndexOf(".")).toLowerCase();
            if(this.value!=''){
                img_num++;
                if(AllImgExt.indexOf(FileExt+"|")==-1){
                    error.push("第"+(index+1)+"张图片格式错误");
                }
            }
        });
        $(".jsstar input").each(function(index,e){
            if(e.value == '0' || e.value == ''){
                if(e.name == 'goods_rank'){
                    error.push('请给描述评分！');
                };
                if(e.name == 'service_rank'){
                    error.push('请给服务评分！');
                };
                if(e.name == 'deliver_rank'){
                    error.push('请给物流评分！');
                };
            }
        });
        if(content == ''){
            error.push('请填写评价内容');
        }
        if(content.length < 10){
            error.push('评论内容最少10个字符');
        }
        if(content.length>500){
            error.push('评价内容长度超过限制');
        }

        if(error.length>0){
            $(obj).attr('disabled',false);
            showErrorMsg(error);
            return false;
        }else{
            var formObj = document.getElementById("add_comment");
            var formData = new FormData(formObj);//表单id
            $.ajax({
                type: "POST",
                url: "<?php echo U('Mobile/Order/add_comment'); ?>",
                data: formData,
                dataType: "json",
                async: false,
                cache: false,  //上传文件不需要缓存
                contentType: false,
                processData: false, //因为data值是FormData对象，不需要对数据做处理
                error: function () {
                    $(obj).attr('disabled',false);
                    layer.open({content:"服务器繁忙, 请联系管理员!",time:2});
                },
                success: function (data) {
                    $(obj).attr('disabled',false);
                    if (data.status == 1) {
                        layer.open({content:data.msg,time:2,end:function () {
                            location.href = data.url;
                        }});
                    }else {
                        layer.open({content: data.msg, time: 2});
                    }
                }
            });
        }
    }

    //显示上传照片
    window.URL = window.URL || window.webkitURL;
    function handleFiles(obj,id) {
        fileList = document.getElementById("fileList"+id);
        var files = obj.files;
        img = new Image();
        if(window.URL){

            img.src = window.URL.createObjectURL(files[0]); //创建一个object URL，并不是你的本地路径
            img.width = 60;
            img.height = 60;
            img.onload = function(e) {
                window.URL.revokeObjectURL(this.src); //图片加载后，释放object URL
            }
            if(fileList.firstElementChild){
                fileList.removeChild(fileList.firstElementChild);
            }
            fileList.appendChild(img);
        }else if(window.FileReader){
            //opera不支持createObjectURL/revokeObjectURL方法。我们用FileReader对象来处理
            var reader = new FileReader();
            reader.readAsDataURL(files[0]);
            reader.onload = function(e){
                img.src = this.result;
                img.width = 60;
                img.height = 60;
                fileList.appendChild(img);
            }
        }else
        {
            //ie
            obj.select();
            obj.blur();
            var nfile = document.selection.createRange().text;
            document.selection.empty();
            img.src = nfile;
            img.width = 60;
            img.height = 60;
            img.onload=function(){

            }
            fileList.appendChild(img);
        }
    }
</script>
</body>
</html>
