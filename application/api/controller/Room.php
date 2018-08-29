<?php

/**
 * @Author: Cui
 * @Date:   2018-08-16 15:56:44
 * @Last Modified by:   Administrator
 * @Last Modified time: 2018-08-16 17:57:36
 */
namespace app\api\controller;
use \app\common\model\Room as MRoom;
use \app\common\model\Users;
use \app\common\redis\Room as Rm;

class Room extends Base {
	public function _initialize() {
		parent::_initialize();
	}
	public function getlist() {
		$room = new MRoom;
		$res = $room->getList();
		if ($res) {
			return show(1, '', $res);

		}
		return show();
	}

	public function getRoomInfo() {
		if (!$roomId = input('roomId')) {
			return $this->writeJson(2);
		}
		$room = new MRoom;
		$where = [
			'id' => $roomId,
		];
		$res = $room->setval('map', $where)->getInfo();
		if ($res) {
			$Users = new Users;
			if ($uId = input('uId')) {
				if ($r = Users::get($uId)) {
					$res['UserInfo'] = $r;
				}
			}
			$userArr = Rm::selectRoomUserId($roomId);
			$res['userArr'] = $Users->where('user_id', 'IN', $userArr)->select();

			return $this->writeJson(1, $res);
		}
		return $this->writeJson();
	}

}