<?php
namespace Aurora\Adapter;

use Aurora\AbstractAdapter;

class INI extends AbstractAdapter
{
	public $extension = ".ini";

	public function parse($data)
	{
		return parse_ini_string($data);
	}
}
