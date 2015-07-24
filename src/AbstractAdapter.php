<?php

namespace Aurora;

class AbstractAdapter implements AdapterInterface
{
	public $basePath;
	public $extension;

	public function __construct($basePath)
	{
		$this->basePath = $basePath;
	}

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
		if ($data = $this->getContent($file)) {
			return $this->parse($data);
		}

		return null;
	}

	private function getValidPath($path)
	{
		if (file_exists($path)) {
			return true;
		}

		return false;
	}


	protected function getContent($path)
	{
		if ($this->getValidPath($this->basePath.$path.$this->extension)) {
			return file_get_contents($this->basePath.$path.$this->extension);
		}

		return null;
	}

}
