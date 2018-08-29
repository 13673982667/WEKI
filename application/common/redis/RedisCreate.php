<?php

/**
 * @Author: Cui
 * @Date:   2018-08-16 16:38:41
 * @Last Modified by:   Administrator
 * @Last Modified time: 2018-08-24 14:01:21
 */
namespace app\common\redis;

class RedisCreate {
	protected static $instance = null;

	protected $options = [
		'host' => '122.114.166.181',
		'port' => 6379,
		'password' => '',
		'select' => 0,
		'timeout' => 0,
		'expire' => 0,
		'persistent' => false,
		'prefix' => '',
	];

	/**
	 * 构造函数
	 * @param array $options 参数
	 * @access public
	 */
	public function __construct($options = []) {
		if (!extension_loaded('redis')) {
			throw new \BadFunctionCallException('not support: redis');
		}
		if (!empty($options)) {
			$this->options = array_merge($this->options, $options);
		}
	}

	/**
	 * 连接Redis
	 * @return void
	 */
	protected function connect() {
		if (!is_object(self::$instance)) {
			self::$instance = new \Redis;
			if ($this->options['persistent']) {
				self::$instance->pconnect($this->options['host'], $this->options['port'], $this->options['timeout'], 'persistent_id_' . $this->options['select']);
			} else {
				self::$instance->connect($this->options['host'], $this->options['port'], $this->options['timeout']);
			}

			if ('' != $this->options['password']) {
				self::$instance->auth($this->options['password']);
			}

			if (0 != $this->options['select']) {
				self::$instance->select($this->options['select']);
			}
		}
	}

	/**
	 * 获取连接句柄
	 * @return object Redis
	 */
	public function handler() {
		$this->connect();
		return self::$instance;
	}
}