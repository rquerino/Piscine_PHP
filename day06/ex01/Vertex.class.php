<?php
	require_once dirname(__FILE__) . '/../ex00/Color.class.php';

	class Vertex {
		public static	$verbose = false;
		private 		$_x = 0;
		private 		$_y = 0;
		private 		$_z = 0;
		private 		$_w = 1;
		private			$_color;

		function __construct($ar) {
			$this->_x = $ar['x'];
			$this->_y = $ar['y'];
			$this->_z = $ar['z'];
			if (array_key_exists('w', $ar))
				$this->_w = $ar['w'];
			if (array_key_exists('color', $ar))
				$this->_color = $ar['color'];
			else
			{
				$this->_color = new Color(array(
					'red'   => 255,
					'green' => 255,
					'blue'  => 255,
				));
			}
			if (Vertex::$verbose)
				printf("%s constructed\n", $this);
		}

		function setX($x) 			{	$this->_x = $x;			}
		function setY($y) 			{	$this->_y = $y;			}
		function setZ($z) 			{	$this->_z = $z;			}
		function setW($w)			{	$this->_w = $w;			}
		function setColor($color)	{	$this->_color = $color;	}

		function getX() 			{	return $this->_x;		}
		function getY() 			{	return $this->_y;		}
		function getZ() 			{	return $this->_z;		}
		function getW() 			{	return $this->_w;		}
		function getColor() 		{	return $this->_color;	}

		function __toString() {
			if (Vertex::$verbose)
			{
				$str = "Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3.3s, green: %3.3s, blue: %3.3s ) )";
				return (sprintf($str, $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue));
			}
			else
			{
				$str = "Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )";
				return (sprintf($str, $this->_x, $this->_y, $this->_z, $this->_w));
			}
		}

		static function doc() {
			printf("%s", file_get_contents(dirname(__FILE__).'/Vertex.doc.txt'));
		}

		function __destruct() {
			if (Vertex::$verbose)
                printf("%s destructed\n", $this);
		}
	}
?>