<?php
	class Targaryen {      
		public function resistsFire() {
			return False;
		}

		public function getBurned() {
			$bool = $this->resistsFire();
			if ($bool == true)
				return "emerges naked but unharmed";
			else
				return "burns alive";
		}
	}
?>