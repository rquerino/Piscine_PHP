<?php
	/* Matrices: always 4x4
	 *
	 *     vtcX  vtcY  vtcZ  vtxO
	 *  x  1.0   0.0   0.0   0.0
	 *  y  0.0   1.0   0.0   0.0
	 *  z  0.0   0.0   1.0   0.0
	 *  w  0.0   0.0   0.0   1.0
	*/
	class Matrix {
	/*The identity matrix
	The translation matrices ("translate")
	The scale change matrices ("scale")
	The rotation matrices ("rotate")
	the projection matrices ("project")*/
		public static	$verbose = false;

		const IDENTITY = 1;
		const SCALE = 1;
		const RX = 1;
		const RY = 1;
		const RZ = 1;
		const TRANSLATION = 1;
		const PROJECTION = 1;

		private	$_type; //Identity, Scale, Translation or Projection
		private $_matr;
		// if preset is SCALE
		private	$_scale;
		// if preset is TRANSLATION
		private	$_vtc; //translation vector
		// if preset is PROJECTION
		private	$_fov; //field of view
		private	$_ratio;
		private	$_near;
		private	$_far;
		// if preset is RX, RY or RZ
		private	$_angle;

		// Only getters, Read-only class
		function getType()	{	return $this->_type;	}
		function getMatr()	{	return $this->_matr;	}
		function getScale()	{	return $this->_scale;	}
		function getVtc()	{	return $this->_vtc;		}
		function getFov()	{	return $this->_fov;		}
		function getRatio()	{	return $this->_ratio;	}
		function getNear()	{	return $this->_near;	}
		function getFar()	{	return $this->_far;		}
		function getAngle()	{	return $this->_angle;	}

		function __construct($ar) {
			// Get the type
			if (isset($ar['preset']))
				$this->_type = $ar['preset'];
			else
				$this->_type = 0;
			// Fill matrix	
			for ($i = 0; $i < 4; $i++)
				for ($j = 0; $j < 4; $j++)
					$this->_matr[$i][$j] = 0;
			// Initialize other attributes
			$this->_scale = 0;
			$this->_vtc = 0;
			$this->_fov = 0;
			$this->_ratio = 0;
			$this->_near = 0;
			$this->_far = 0;
			$this->_angle = 0;
			if ($ar['preset'] == 'SCALE')
			{
				$this->_scale = $ar['scale']; //??
			} else if ($ar['preset'] == 'TRANSLATION') {




			} else if ($ar['preset'] == 'PROJECTION') {



			}
			if (Matrix::$verbose)
                printf("%s constructed\n", $this);
		}

		//CHANGE!!
		function __toString() {
			$str = "Matrix( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )";
			return (sprintf($str, $this->_x, $this->_y, $this->_z, $this->_w));
		}

		// returns the multiplication of both matrices.
		function mult($mtx) {
			
		}

		//returns a new vertex resulting from the transformation of the vertex by the matrix.
		function transformVertex($vtx) {
			
		}

		static function doc() {

		}

		function __destruct() {
			if (Matrix::$verbose)
                printf("%s destructed\n", $this);
		}









	}
?>