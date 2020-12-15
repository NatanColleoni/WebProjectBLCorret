<?

class Linha {

    public function __construct() {
        if (func_num_args() > 0) {
            $this->cores = func_get_args();
        } else {
            $this->cores = array("#CCCCCC", "#FFFFFF");
        }
        $this->cont = 1;
    }

    function cor() {
        $cor = $this->cores[$this->cont];
        if ($this->cont == count($this->cores)) {
            $this->cont = 1;
        } else {
            $this->cont++;
        }
        return $this->cores[$this->cont - 1];
    }

}