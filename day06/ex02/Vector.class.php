<?php

	class Vector {
		public static	$verbose = false;
		// Magnitude: x, y, z. Coordinate: w
		private			$_x;
		private			$_y;
		private			$_z;
		private			$_w = 0;


		// 'dest' mandatory, 'orig' optional
		function __construct($ar) {

			// 
			$this->_x = $ar['x'];
			$this->_y = $ar['y'];
			$this->_z = $ar['z'];
			if (array_key_exists('w', $ar))

			if (Vector::$verbose)
				printf("%s constructed.\n", $this);
		}

		// Read-only
		function getX() {	return $this->_x;	}
		function getY() {	return $this->_y;	}
		function getZ() {	return $this->_z;	}
		function getW() {	return $this->_w;	}

		function __toString() {
			$str = "Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )";
			return (sprintf($str, $this->_x, $this->_y, $this->_z, $this->_w));
		}

		static function doc() {
			printf("%s", file_get_contents(dirname(__FILE__).'/Vector.doc.txt'));
		}

		function __destruct() {
			if (Vector::$verbose)
                printf("%s destructed.\n", $this);
		}
	}
?>