<?php
namespace Aurora\Adapter;

use Aurora\AbstractAdapter;

class XML extends AbstractAdapter
{
	public $extension = ".xml";

	public function parse($data)
	{
		$p = xml_parser_create();
		xml_parse_into_struct($p, $data, $vals, $index);
		xml_parser_free($p);
		return $vals;
	}
}
