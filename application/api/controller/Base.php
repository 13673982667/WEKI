<?php
namespace app\api\controller;
use \think\Controller;

class Base extends Controller {
	public $page = 1;
	public $size = 10;
	public $from = 0;

	public function _initialize() {
		parent::_initialize();
		$this->getPageAndSize();
	}
	/**
	 * 获取分页page size 内容
	 */
	public function getPageAndSize() {
		$this->page = intval(input('page')) ? intval(input('page')) : $this->page;
		$this->size = intval(input('size')) ? intval(input('size')) : $this->size;
		$this->from = ($this->page - 1) * $this->size;
	}
	public function writeJson($Code = 0, $msg = '', $result = '') {
		return show($Code, $result, $msg);
	}
}
