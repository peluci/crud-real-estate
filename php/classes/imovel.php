<?php
include 'atributos.php';
include 'endereco.php';
include 'contas.php';
class imovel
{
    private $id;
    private $endereco;
    private $atributos;
    private $situacao;
    private $imagem;
    private $contas;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id 
     * @return self
     */
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco 
     * @return self
     */
    public function setEndereco($endereco): self
    {
        $this->endereco = $endereco;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAtributos()
    {
        return $this->atributos;
    }

    /**
     * @param mixed $atributos 
     * @return self
     */
    public function setAtributos($atributos): self
    {
        $this->atributos = $atributos;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSituacao()
    {
        return $this->situacao;
    }

    /**
     * @param mixed $situacao 
     * @return self
     */
    public function setSituacao($situacao): self
    {
        $this->situacao = $situacao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * @param mixed $imagem 
     * @return self
     */
    public function setImagem($imagem): self
    {
        $this->imagem = $imagem;
        return $this;
    }

    public function __construct($id, $img, $situacao, $quartos, $banheiros, $logradouro, $numero, $complemento, $cidade, $estado, $cep, $luz, $agua, $iptu, $aluguel)
    {
        $this->id = $id;
        $this->imagem = $img;
        $this->situacao = $situacao;
        $this->atributos = new atributos($quartos, $banheiros);
        $this->endereco = new endereco($logradouro, $numero, $complemento, $cidade, $estado, $cep);
        $this->contas = new contas($luz, $agua, $iptu, $aluguel);
    }

    function insert_property($conn)
    {
        // Check the connection
        if ($conn === false) {
            die("Error connecting to MySQL: " . mysqli_connect_error());
        }

        $id = $this->id;
        $imagem = $this->imagem;
        $situacao = $this->situacao;
        $quartos = $this->atributos->getQuartos();
        $banheiros = $this->atributos->getBanheiros();
        $logradouro = $this->endereco->getLogradouro();
        $numero = $this->endereco->getNumero();
        $complemento = $this->endereco->getComplemento();
        $cidade = $this->endereco->getCidade();
        $estado = $this->endereco->getEstado();
        $cep = $this->endereco->getCep();
        $aluguel = $this->contas->getAluguel();
        $iptu = $this->contas->getIptu();
        $agua = $this->contas->getAgua();
        $luz = $this->contas->getLuz();

        // Prepare the SQL statement
        $sql = "INSERT INTO IMOVEIS (id, logradouro, numero, complemento, cidade, estado, cep, quartos, banheiros, aluguel, iptu, agua, luz, situacao, imagem) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        // Bind the parameters
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "isissssiiiiiiss", $id, $logradouro, $numero, $complemento, $cidade, $estado, $cep, $quartos, $banheiros, $aluguel, $iptu, $agua, $luz, $situacao, $imagem);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            return true;
        } else {
            return false;
        }
    }

}

?>