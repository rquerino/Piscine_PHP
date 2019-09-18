<?php
	/* Matrix: always 4x4
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

		const IDENTITY;
		const SCALE;
		const RX;
		const RY;
		const RZ;
		const TRANSLATION;
		const PROJECTION;

		private	$_type; //Identity, Scale, Translation or Projection
		private $_matr;
		// preset is SCALE
		private	$_scale;
		// preset is TRANSLATION
		private	$_vtc; //translation vector
		// preset is PROJECTION
		private	$_fov; //field of view
		private	$_ratio;
		private	$_near;
		private	$_far;
		// preset is RX, RY or RZ
		private	$_angle;

		function __construct($ar) {
			$this->_type = $ar['preset'];
			for ($i = 0; $i < 4; $i++)
				for ($j = 0; $j < 4; $j++)
					$this->_matr[$i][$j] = 0;
			if ($ar['preset'] == 'SCALE')
			{
				$this->_scale = $ar['scale'];
			} else if ($ar['preset'] == 'TRANSLATION') {




			} else if ($ar['preset'] == 'PROJECTION') {



			}
		}











	}
?>