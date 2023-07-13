<?php

class atributos{
    private $quartos;
    private $banheiros;


	/**
	 * @return mixed
	 */
	public function getQuartos() {
		return $this->quartos;
	}
	
	/**
	 * @param mixed $quartos 
	 * @return self
	 */
	public function setQuartos($quartos): self {
		$this->quartos = $quartos;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getBanheiros() {
		return $this->banheiros;
	}
	
	/**
	 * @param mixed $banheiros 
	 * @return self
	 */
	public function setBanheiros($banheiros): self {
		$this->banheiros = $banheiros;
		return $this;
	}
	public function __construct($quartos, $banheiros)
    {
        $this->quartos = $quartos;
		$this->banheiros = $banheiros;
    }
}

?>