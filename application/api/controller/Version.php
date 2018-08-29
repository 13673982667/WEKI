<?php
namespace app\api\controller;
use \app\common\model\Version as Vs;

class Version extends Base {
	//获取静默更新版本 和下载地址
	public function getVersion() {
		$Version = new Vs;
		$res = $Version->order('id desc')->find();
		if ($res) {
			return $this->writeJson(1, $res);
		}
		return $this->writeJson(0);
	}
}
