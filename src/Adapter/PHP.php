<?php

/**
 * Aurora - Framework
 *
 * Aurora is fast, simple, extensible Framework
 *
 * PHP version 6
 *
 * @category   Framework
 * @package    Aurora
 * @author     VeeeneX <veeenex@gmail.com>
 * @copyright  2015 Caroon
 * @license    MIT
 * @version    0.1.2
 * @link       http://caroon.com/Aurora
 *
 */

namespace Aurora\Adapter;

use Aurora\AbstractAdapter;

class PHP extends AbstractAdapter
{

	public function parse($path){

		try {
			$temp = require $path;
		} catch (\Exception $e) {
			// To do throw errors
		}

		if (is_callable($temp)) {
			$temp = call_user_func($temp);
		}

		if (!$temp || !is_array($temp)) {
			// To do throw error
		}

		return $temp;
	}
}
