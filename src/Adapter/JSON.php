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

class JSON extends AbstractAdapter
{
	public $extension = ".php";

	public function parse($data)
	{
		return json_decode($data, true);
	}
}
