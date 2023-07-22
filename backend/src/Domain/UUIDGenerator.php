<?php

namespace Src\Domain;


class  UUIDGenerator
{

	public static function create()
	{
		return uniqid();
	}
}
