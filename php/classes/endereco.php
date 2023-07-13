<?php

class endereco
{
    private $logradouro;
    private $numero;
    private $complemento;
    private $cidade;
    private $estado;
    private $cep;


	/**
	 * @return mixed
	 */
	public function getLogradouro() {
		return $this->logradouro;
	}
	
	/**
	 * @param mixed $logradouro 
	 * @return self
	 */
	public function setLogradouro($logradouro): self {
		$this->logradouro = $logradouro;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getNumero() {
		return $this->numero;
	}
	
	/**
	 * @param mixed $numero 
	 * @return self
	 */
	public function setNumero($numero): self {
		$this->numero = $numero;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getComplemento() {
		return $this->complemento;
	}
	
	/**
	 * @param mixed $complemento 
	 * @return self
	 */
	public function setComplemento($complemento): self {
		$this->complemento = $complemento;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getCidade() {
		return $this->cidade;
	}
	
	/**
	 * @param mixed $cidade 
	 * @return self
	 */
	public function setCidade($cidade): self {
		$this->cidade = $cidade;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getEstado() {
		return $this->estado;
	}
	
	/**
	 * @param mixed $estado 
	 * @return self
	 */
	public function setEstado($estado): self {
		$this->estado = $estado;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getCep() {
		return $this->cep;
	}
	
	/**
	 * @param mixed $cep 
	 * @return self
	 */
	public function setCep($cep): self {
		$this->cep = $cep;
		return $this;
	}

	public function __construct($logradouro, $numero, $complemento,$cidade,$estado,$cep)
    {
        $this->logradouro = $logradouro;
		$this->numero = $numero;
		$this->complemento = $complemento;
		$this->cidade = $cidade;
    	$this->estado = $estado;
		$this->cep = $cep;
    }
}



?>