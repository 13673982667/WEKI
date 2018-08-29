<?php

/**
 * @Author: Cui
 * @Date:   2018-08-17 11:48:22
 * @Last Modified by:   Administrator
 * @Last Modified time: 2018-08-22 15:42:13
 */
namespace app\api\controller;
use app\common\logic\Integral;
use app\common\logic\PlaceOrder;
use app\common\model\Goods;
use app\common\model\SpecGoodsPrice;

class Cart extends Base {

	/**
	 *  积分商品结算页
	 * @return mixed
	 */
	public function integral() {
		$goods_id = input('goods_id');
		$item_id = input('item_id');
		$goods_num = input('goods_num');
		$uId = input('uId');
		if (empty($uId)) {
			return show(2);
		}
		if (empty($goods_id)) {
			return show(2);
		}
		if (empty($goods_num)) {
			return show(2);
		}
		$Goods = new Goods();
		$goods = $Goods->where(['goods_id' => $goods_id])->find();
		if (empty($goods)) {
			return show(0, '该商品不存在');
		}
		$data = [];
		if (empty($item_id)) {
			$goods_spec_list = SpecGoodsPrice::all(['goods_id' => $goods_id]);
			if (count($goods_spec_list) > 0) {
				return show(0, '缺少规格参数');
			}
			$goods_price = $goods['shop_price'];
			//没有规格
		} else {
			//有规格
			$specGoodsPrice = SpecGoodsPrice::get(['item_id' => $item_id, 'goods_id' => $goods_id]);
			if ($goods_num > $specGoodsPrice['store_count']) {
				return show(0, '该商品规格库存不足，剩余' . $specGoodsPrice['store_count'] . '份');
			}
			$goods_price = $specGoodsPrice['price'];
			$data['specGoodsPrice'] = $specGoodsPrice;
			// $this->assign('specGoodsPrice', $specGoodsPrice);
		}
		$point_rate = tpCache('shopping.point_rate');
		// $backUrl = Url::build('Goods/goodsInfo', ['id' => $goods_id, 'item_id' => $item_id]);
		// $data['backUrl'] = $backUrl;
		$data['point_rate'] = $point_rate;
		$data['goods'] = $goods;
		$data['goods_price'] = $goods_price;
		$data['goods_num'] = $goods_num;
		return show(1, '', $data);
		// $this->assign('backUrl', $backUrl);
		// $this->assign('point_rate', $point_rate);
		// $this->assign('goods', $goods);
		// $this->assign('goods_price', $goods_price);
		// $this->assign('goods_num', $goods_num);
		// return $this->fetch();
	}
	/**
	 *  积分商品价格提交
	 * @return mixed
	 */
	public function integral2() {
		if (!$uId = input('uId')) {
			return show(2);
		}
		$goods_id = input('goods_id/d');
		$item_id = input('item_id/d');
		$goods_num = input('goods_num/d');
		$address_id = input("address_id/d"); //  收货地址id
		$user_note = input('user_note'); // 给卖家留言
		$invoice_title = input('invoice_title'); // 发票
		$taxpayer = input('taxpayer'); // 发票纳税人识别号
		$user_money = input("user_money/f", 0); //  使用余额
		$payPwd = input('payPwd');
		$shop_id = input('shop_id/d', 0); //自提点id
		$take_time = input('take_time/d'); //自提时间
		$consignee = input('consignee/s'); //自提点收货人
		$mobile = input('mobile/s'); //自提点联系方式
		$integral = new Integral();
		$integral->setUserById($uId);
		$integral->setShopById($shop_id);
		$integral->setGoodsById($goods_id);
		$integral->setBuyNum($goods_num);
		$integral->setSpecGoodsPriceById($item_id);
		$integral->setUserAddressById($address_id);
		$integral->useUserMoney($user_money);
		try {
			$integral->checkBuy();
			$pay = $integral->pay();
			// 提交订单
			if ($_REQUEST['act'] == 'submit_order') {
				$placeOrder = new PlaceOrder($pay);
				$placeOrder->setUserAddress($integral->getUserAddress());
				$placeOrder->setConsignee($consignee);
				$placeOrder->setMobile($mobile);
				$placeOrder->setInvoiceTitle($invoice_title);
				$placeOrder->setUserNote($user_note);
				$placeOrder->setTaxpayer($taxpayer);
				$placeOrder->setPayPsw($payPwd);
				$placeOrder->setTakeTime($take_time);
				$placeOrder->addNormalOrder();
				$order = $placeOrder->getOrder();
				return show(1, '提交订单成功', $order['order_id']);
			}
			return show(1, '计算成功', $pay->toArray());
		} catch (TpshopException $t) {
			$error = $t->getErrorArr();
			return show(0, $error);
		}
	}
}