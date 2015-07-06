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
use Aurora\Exception\UnableToParseFormatException;

class PHP extends AbstractAdapter
{
	public $extension = ".php";

	public function parse($data)
	{

		if (is_callable($data)) {
			$data = call_user_func($data);
		}

		if (!$data || !is_array($data)) {
			throw new UnableToParseFormatException;
		}

		return $data;
	}

	protected function getContent($path)
	{
		if ($this->getValidPath($this->basePath.$path.$this->extension)) {
			return require_once $this->basePath.$path.$this->extension;
		}

		return null;
	}
}
