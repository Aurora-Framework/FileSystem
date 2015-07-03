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

namespace Aurora;

class AbstractAdapter implements AdapterInterface
{
	public $basePath;

	public function setBasePath($basePath)
	{
		$this->basePath = $basePath;
	}

	public function getBasePath()
	{
		return $this->basePath;
	}

	public function parse($data)
	{
		return $data;
	}

	public function load($data)
	{
		return $this->parse($data);
	}

	public function loadFile($file)
	{
		$data = $this->getContent($file);

		if ($data) {
			$this->parse($data);
		}

		return null;
	}

	private function getValidPath($path)
	{
		if (file_exists($basePath.$path)) {
			return true;
		}

		return false;
	}


	protected function getContent($path)
	{
		if ($this->getValidPath($this->basePath.$path)) {
			return file_get_contents($this->basePath.$path);
		}

		return null;
	}

}
