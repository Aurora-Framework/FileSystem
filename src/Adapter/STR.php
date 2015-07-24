<?php
namespace Aurora\Adapter;

use Aurora\AbstractAdapter;

class STR extends AbstractAdapter
{
	public $extension = ".str";

	public function parse($data)
	{
		return parse_str($data);
	}
}
