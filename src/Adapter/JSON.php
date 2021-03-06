<?php
namespace Aurora\Adapter;

use Aurora\AbstractAdapter;

class JSON extends AbstractAdapter
{
	public $extension = ".json";

	public function parse($data)
	{
		return json_decode($data, true);
	}
}
