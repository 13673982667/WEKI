<?php
namespace app\api\controller;
use \app\common\model\Users;
use \think\Cache;

class login extends Base {
	public function _initialize() {
		parent::_initialize();
	}
	function in() {
		if (!($phone = input('phone')) || !($code = input('code'))) {
			return $this->writeJson(2);
		}
		if (!$cache = CaChe::get($phone)) {
			return $this->writeJson(2, '验证码已过期');
		}
		if ($cache != $code) {
			return $this->writeJson(2, '验证码已过期');
		}
		$Users = new Users;
		$where = [
			'phone' => $phone,
		];
		// p($_POST);
		if ($res = $Users->where($where)->find()) {

			return $this->writeJson(1, ['id' => $res['user_id']]);
		} else {
			$where['pay_points'] = 10;
			$where['mobile'] = $phone;
			$where['nickname'] = $where['phone'];

			if ($id = $Users->insertGetId($where)) {
				Cb::set($id, 1, 60 * 60 * 24);
				return $this->writeJson(1, ['id' => $id]);
			}
		}
		// p($res);
	}
	public function sendSms() {
		if (!($phone = input('phone'))) {
			return $this->writeJson(2);
		}
		$code = rand(1000, 9999);
		$res = \app\common\lib\ali\Common::sendSms($phone, $code);
		try {
			if ($res->Code == 'OK') {
				Cache::set($phone, $code, (60 * 60));
				return $this->writeJson(1, $code);
			} else {
				p($res);
				return $this->writeJson(10, $res->Message);
			}
		} catch (\Exception $e) {
			return $this->writeJson(9, $e->getMessage(), '出错了');
		}

	}
}
