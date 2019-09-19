<?php
    class UnholyFactory {
        private $mas = array();
        private $manufactured = array();
        private $absorb;
        private $type_formatted;

        public function absorb($type)
        {
            if ($type instanceof Fighter)
            {
                if (in_array($type, $this->mas)) // If it's already inside
                    printf("(Factory already absorbed a fighter of type ");
                else
                {
                    printf("(Factory absorbed a fighter of type ");
                    $this->mas[] = $type;
                }
                printf($type->getType() . ")\n");
            }
            else
                printf("(Factory can't absorb this, it's not a fighter)\n");
        }

        private function format($tmp)
        {
            if ($tmp === "foot soldier")
                return "Footsoldier";
            else if ($tmp === "llama")
                return "Llama";
            else if ($tmp === "archer")
                return "Archer";
            else if ($tmp === "assassin")
                return "Assassin";
        }

        public function fabricate($tmp)
        {
            $this->type_formatted = $this->format($tmp);
            foreach ($this->mas as $key => $value) {
                if (get_class($value) === $this->type_formatted)
                {
                    $new = clone $this->mas[$key];
                    printf("(Factory fabricates a fighter of type " . $tmp . ")". PHP_EOL);
                    return ($new);
                }
            }
            printf("(Factory hasn't absorbed any fighter of type ". $tmp . ")". PHP_EOL);
        }
        
        public function fight($j)
        {
            echo "OK";
            print_r($this->manufactured);
        }
    }
?>