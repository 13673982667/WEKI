<?php
namespace app\api\controller;
use \think\Cache;

class Index extends Base {
	public function _initialize() {
		parent::_initialize();
	}
	public function index() {
		p(Cache::get('aaa'));
		// ini_set('date.timezone', 'Etc/GMT-8');
		// p(date('Y-m-d H:i:s'));
		// include_once './application/common/lib/ali/Test.php';
		// p(input('aa', 'asd'));
		// die('ads');
	}
	public function set1() {
		Cache::set('aaa', '555', 60 * 60);
	}
}
