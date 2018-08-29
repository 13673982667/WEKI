<?php
/**
 * Created by PhpStorm.
 * User: baidu
 * Date: 17/7/27
 * Time: 下午5:57
 */
namespace app\common\model;
use think\Model;

class Room extends Base {
	public function getList() {
		$where = [
			'status' => 1,
		];
		$res = $this->where($where)->select();
		return $res;
	}
	public function getInfo() {

		$res = $this->where($this->map)->find();
		return $res;
	}

}