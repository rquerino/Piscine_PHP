<?php
	abstract class Fighter
	{
		abstract function fight($target);
		public $type_soldier;

		public function __construct($type_s)
		{
			$this->type_warrior = $type_s;
		}

		public function getType()
		{
			return ($this->type_warrior);
		}
	}
?>