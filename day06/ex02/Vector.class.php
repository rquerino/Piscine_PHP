<?php
	require_once dirname(__FILE__) . '/../ex01/Vertex.class.php';

	class Vector {
		public static	$verbose = false;
		// Magnitude: x, y, z. Coordinate: w, always 0 in this case.
		private			$_x;
		private			$_y;
		private			$_z;
		private			$_w = 0;

		// 'dest' mandatory, 'orig' optional
		function __construct($ar) {
			if (isset($ar['orig']))
				$orig = $ar['orig'];
			else
				$orig = new Vertex(array(
					'x' => 0,
					'y' => 0,
					'z' => 0,
					'w' => 1
				));
			$dest = $ar['dest'];
			$this->_x = $dest->getX() - $orig->getX();
			$this->_y = $dest->getY() - $orig->getY();
			$this->_z = $dest->getZ() - $orig->getZ();
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

		// Vector length: euclidean norm
		function magnitude() {
			$mag = sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2));
			return ($mag);
		}

		//returns a normalized version of the vector. If it's already normalized, returns a fresh copy of the vector.
		function normalize()
		{
			$m = $this->magnitude();
			$res = new Vector(array('dest' => new Vertex(array(
				'x' => $this->_x / $m,
				'y' => $this->_y / $m,
				'z' => $this->_z / $m
			))));
			return ($res);
		}

		//returns the sum vector of both vectors.
		function add(Vector $add)
		{
			$res = new Vector(array('dest' => new Vertex(array(
				'x' => $this->_x + $add->getX(),
				'y' => $this->_y + $add->getY(),
				'z' => $this->_z + $add->getZ()
			))));
			return ($res);
		}

		//returns the difference vector of both vectors.
		function sub(Vector $sub)
		{
			$res = new Vector(array('dest' => new Vertex(array(
				'x' => $this->_x - $sub->getX(),
				'y' => $this->_y - $sub->getY(),
				'z' => $this->_z - $sub->getZ()
			))));
			return ($res);
		}

		//returns the opposite vector.
		function opposite()
		{
			$res = new Vector(array('dest' => new Vertex(array(
				'x' => -$this->_x,
				'y' => -$this->_y,
				'z' => -$this->_z
			))));
			return ($res);
		}

		//returns the multiplication of the vector with a scalar.
		function scalarProduct($scal)
		{
			$res = new Vector(array('dest' => new Vertex(array(
				'x' => $this->_x * $scal,
				'y' => $this->_y * $scal,
				'z' => $this->_z * $scal
			))));
			return ($res);
		}

		//returns the scalar multiplication of both vectors.
		function dotProduct(Vector $mult)
		{
			$res = new Vector(array('dest' => new Vertex(array(
				'x' => $this->_x * $mult->getX(),
				'y' => $this->_y * $mult->getY(),
				'z' => $this->_z * $mult->getZ()
			))));
			return ($res);
		}
		
		//returns the angle’sAppendix cosine between both vectors
		function cos(Vector $v)
		{
			return ($this->dotProduct($v) / ($this->magnitude() * $v->magnitude()));
		}

		//returns the cross multiplication of both vectors.
		function crossProduct(Vector $cross)
		{
			$res = new Vector(array('dest' => new Vertex(array(
				'x' => $this->_y * $cross->getZ() - $this->_z * $cross->getY(),
				'y' => -($this->_x * $cross->getZ() - $this->_z * $cross->getX()),
				'z' => $this->_x * $cross->getY() - $this->_y * $cross->getX()
			))));
			return ($res);
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