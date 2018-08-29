<?php
namespace app\api\controller;
use app\common\logic\UsersLogic;
use app\common\model\UserAddress;
use \app\common\model\Users as U;
use \think\Cache;
use \think\Config;
use \think\Loader;

class Users extends Base {
	public function _initialize() {
		// deleteUrl('http://192.168.0.110/./public/uploads/images/20180726//1532586342.png');
		// http://www.63218860.com/APP/home/MyFiles/20171130022127.jpeg
		// deleteUrl('http://192.168.0.110/./public/uploads/images/20180726/1532589390.png');
		parent::_initialize();
	}

	public function getUserInfo() {
		if (!$uId = input('uId')) {
			return show(2);
		}
		// p(json_encode(U::get(43)), 1);
		$Users = Loader::model('Users');
		if ($res = $Users->where('user_id', $uId)->find()) {
			return show(1, '', $res);
		}
		return show(0);
	}
	//jiance user
	public function checkUser() {
		if (!$uId = input('uId')) {
			return show(2);
		}
		// jifen
		if (!Cache::get($uId)) {
			$Users = new U;
			if ($Users->where('user_id', $uId)->setInc('pay_points', 10)) {
				Cache::set($uId, 1, 60 * 60 * 24);
			}
		}
		if ($res = U::get($uId)) {
			return $this->writeJson(1, $res);
		}
		return $this->writeJson(0);
	}

	//修改用户信息
	public function updateUserInfo() {
		if (!($uId = input('uId'))) {
			return show(2);
		}
		$post = input('post.');
		$Users = Loader::model('Users');

		if (isset($post['head_pic']) && !empty($post['head_pic'])) {
			file_put_contents('asd.php', json_encode($post));
			if ($head_pic = $Users->where(['user_id' => $uId])->value('head_pic')) {
				deleteUrl($head_pic);
			}
			$post['head_pic'] = Config::get('apiconfig.this_host') . uploadbase64($post['head_pic']);
		}

		if ($Users->isUpdate(true)->save($post, ['user_id' => $uId])) {

			return show(1);
		}
		return show();
	}
	/**
	 * 用户地址列表
	 */
	public function address_list() {
		if (!($uId = input('uId'))) {
			return show(2);
		}
		$address_lists = get_user_address_list($uId);
		$region_list = get_user_addres_list($uId); //地区列表
		$data = [
			'address_lists' => $address_lists,
			'region_list' => $region_list,
		];
		return show(1, '', $data);
	}
	/**
	 * 一个地址
	 */
	public function getDefaultAddress() {
		if (!($uId = input('uId'))) {
			return show(2);
		}
		$where = [
			'user_id' => $uId,

		];
		if ($address_id = input('address_id')) {
			$where['address_id'] = $address_id;
		} else {
			$where['is_default'] = 1;
		}
		$UserAddress = new UserAddress();
		$address_list = $UserAddress->where($where)->find();
		if ($address_list) {
			$address_list = $address_list->append(['address_area'])->toArray();
		} else {
			$address_list = [];
		}
		return show(1, '', $address_list);
	}
	/**
	 * 用户地址信息
	 * @return [type] [description]
	 */
	public function address_info() {
		if (!($uId = I('uId')) || !($address_id = I('address_id'))) {
			return show(2);
		}
		$res = get_user_address_info($uId, $address_id);
		//获取省份
		$res['p'] = M('region')->where(array('id' => $res['province']))->cache(true)->getField('id,name');
		$res['c'] = M('region')->where(array('id' => $res['city']))->cache(true)->getField('id,name');
		$res['d'] = M('region')->where(array('id' => $res['district']))->cache(true)->getField('id,name');
		return show(1, '', $res);
	}
	/**
	 * 用户地址列表
	 */
	public function getRegionList() {
		$id = input('parent_id') ? input('parent_id') : 0;
		$res = M('region')
			->where('parent_id', $id)
			->cache(true)
			->getField('id,name');
		// $res = get_region_list1();
		return show(1, '', $res);
	}

	/**
	 * 地址删除
	 */
	public function del_address() {
		if (!($id = input('address_id')) || !($user_id = input('uId'))) {
			return show(2);
		}
		$address = M('user_address')->where("address_id", $id)->find();
		$row = M('user_address')->where(array('user_id' => $user_id, 'address_id' => $id))->delete();
		// 如果删除的是默认收货地址 则要把第一个地址设置为默认收货地址
		if ($address['is_default'] == 1) {
			$address2 = M('user_address')->where("user_id", $user_id)->find();
			$address2 && M('user_address')->where("address_id", $address2['address_id'])->save(array('is_default' => 1));
		}
		if ($row) {
			return show(1, $row);
		} else {
			return show(0);
		}

	}
	/**
	 * 编辑地址
	 */
	public function edit_address() {
		$post_data = input('post.');
		if (!isset($post_data['uId'])) {
			return json_encode(array('status' => -1, 'msg' => '参数错误'));
		}
		$uId = $post_data['uId'];
		unset($post_data['uId']);
		$address_id = input('address_id') ? input('address_id') : 0;
		if (isset($post_data['address_id'])) {
			unset($post_data['address_id']);
		}
		$logic = new UsersLogic();
		$data = $logic->add_address($uId, $address_id, $post_data);
		return json_encode($data);
	}

}
