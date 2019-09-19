<?php
    class NightsWatch {
        private $recruits;

        public function recruit($person)
        {
            if ($person instanceof IFighter)
                $this->recruits[] = $person;
        }

        public function fight()
        {
            foreach ($this->recruits as $key => $value)
                $value->fight();
        }
    }
?>