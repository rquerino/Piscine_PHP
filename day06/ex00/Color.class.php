<?php
	class Color {
		public			$red = 0;
		public			$green = 0;
		public			$blue = 0;
		public static	$verbose = false;
		
		function __construct($ar) {
			if (isset($ar['rgb']))
			{
				$this->red	  = ($ar['rgb'] >> 16) & 0xFF;
				$this->green  = ($ar['rgb'] >> 8) & 0xFF;
				$this->blue	  = $ar['rgb'] & 0xFF;
			}
			else
			{
				$this->red = intval($ar['red']);
				$this->green = intval($ar['green']);
				$this->blue = intval($ar['blue']);
			}
			if (Color::$verbose)
				printf("%s constructed.\n", $this);
		}

		function __toString() {
			return (sprintf("Color( red: %3.3s, green: %3.3s, blue: %3.3s )", $this->red, $this->green, $this->blue));
		}

		static function doc() {
			printf("%s", file_get_contents(dirname(__FILE__).'/Color.doc.txt'));
		}

		function add($v) {
			$c = new Color(array(
				'red' => $this->red + $v->red,
				'green' => $this->green + $v->green,
				'blue' => $this->blue + $v->blue));
			return ($c);
		}

		function sub($v) {
			$c = new Color(array(
				'red' => $this->red - ($v->red),
				'green' => $this->green - ($v->green),
				'blue' => $this->blue - ($v->blue)));
			return ($c);
		}

		function mult($m) {
			if ($m instanceof Color)
				$c = new Color(array(
					'red'   => $this->red * $m->red,
					'green' => $this->green * $m->green,
					'blue'  => $this->blue * $m->blue));
			else
				$c = new Color(array(
					'red'   => $this->red * $m,
					'green' => $this->green * $m,
					'blue'  => $this->blue * $m));
			return ($c);
		}
		function __destruct() {
			if (Color::$verbose)
                printf("%s destructed.\n", $this);
		}
	}
?>