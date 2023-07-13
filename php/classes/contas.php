<?php
class contas
{
    private $aluguel;
    private $iptu;
    private $agua;
    private $luz;

	/**
	 * @return mixed
	 */
	public function getAluguel() {
		return $this->aluguel;
	}
	
	/**
	 * @param mixed $aluguel 
	 * @return self
	 */
	public function setAluguel($aluguel): self {
		$this->aluguel = $aluguel;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getIptu() {
		return $this->iptu;
	}
	
	/**
	 * @param mixed $iptu 
	 * @return self
	 */
	public function setIptu($iptu): self {
		$this->iptu = $iptu;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getAgua() {
		return $this->agua;
	}
	
	/**
	 * @param mixed $agua 
	 * @return self
	 */
	public function setAgua($agua): self {
		$this->agua = $agua;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getLuz() {
		return $this->luz;
	}
	
	/**
	 * @param mixed $luz 
	 * @return self
	 */
	public function setLuz($luz): self {
		$this->luz = $luz;
		return $this;
	}
	public function __construct($luz, $agua, $iptu, $aluguel)
    {
        $this->luz = $luz;
		$this->agua = $agua;
		$this->iptu = $iptu;
		$this->aluguel = $aluguel;
    }
}
?>