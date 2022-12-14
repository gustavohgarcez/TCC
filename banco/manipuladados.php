<?php
include_once("conexao.php");

class manipulaDados extends conexao{

    protected $sql, $qr, $table, $fields, $dados, $status, $fieldId, $valueId;

    public function setTable($t){
        $this->table = $t;
    }

    public function setFields($f){
        $this->fields = $f;
    }

    public function setDados($d){
        $this->dados = $d;
    }

    public function setFieldId($fid){
        $this->fieldId = $fid;
    }

    public function setValueId($vid)
    {
        $this->valueId = $vid;
    }

    public function getStatus(){
        return $this->status;
    }

    public function insert(){
        $this->sql = "INSERT INTO $this->table($this->fields) VALUES ($this->dados)";
        if(self::execSQL($this->sql)){
            $this->status = "Cadastro com Sucesso!!!";
        }
        else{
            $this->status = "Erro ao cadastrar".mysqli_error();
        }
    }

    public function update(){
        $this->sql = "UPDATE $this->table SET $this->fields WHERE $this->fieldId = '$this->valueId'";
        if(self::execSQL($this->sql)){
            $this->status = "Alterado com Sucesso!!!";
        }
        else{
            $this->status = "Erro ao alterar na tabela".$this->table." ".mysqli_error();
        }
    }

    public function delete(){
        $this->sql = "DELETE FROM $this->table WHERE $this->fieldId = '$this->valueId'";
        if(self::execSQL($this->sql)){
            $this->status = "Excluído com Sucesso!!!";
        }
        else{
            $this->status = "Erro ao excluir na tabela".$this->table." ".mysqli_error();
        }
    }

    public function getAllDataTable(){
        $this->sql = "SELECT * FROM $this->table";
        $this->qr = self::execSQL($this->sql);
        return $this->qr;
    }

    public function pesquisaPedido($pesquisar){
        $this->sql = "SELECT *  FROM $this->table WHERE $this->fieldId LIKE '%$pesquisar%'";
        $this->qr = self::execSQL($this->sql);
        return $this->qr;
    }

    public function exibirCadastrado($pesquisar){
        $this->sql = "SELECT *  FROM tb_pedido WHERE numero = $pesquisar";
        //echo '<script>alert("'.$this->sql.'");</script>';
        $this->qr = self::execSQL($this->sql);
        return $this->qr;
    }
    
    public function validarLogin($login, $password){
        $this->sql = "SELECT * FROM tb_usuario WHERE nome = '$login' and senha = '$password'";
        $this->qr = self::execSQL($this->sql);    
        $linhas = @mysqli_num_rows($this->qr);
        return $linhas;
    }

    public function getIdUsuarioByNome($nome){
        $this->sql = "SELECT id FROM $this->table WHERE nome = '$nome'";
        $this->qr = self::execSQL($this->sql);
        return $this->qr;
    }

    public function getNomeUsuarioById($id){
        $this->sql = "SELECT nome FROM $this->table WHERE id = '$id'";
        $this->qr = self::execSQL($this->sql);
        return $this->qr;
    }
    
    public function getIdEtapaByNome($nome){
        $this->sql = "SELECT id FROM $this->table WHERE nome = '$nome'";
        $this->qr = self::execSQL($this->sql);
        return $this->qr;
    }

    public function getNomeEtapaById($id){
        $this->sql = "SELECT nome FROM $this->table WHERE id = '$id'";
        $this->qr = self::execSQL($this->sql);
        return $this->qr;
    }

    //exibir etapas realizadas
    public function exibirEtapasRealizadas($id){
        $this->sql = "SELECT *  FROM tb_etapas_realizadas WHERE id_pedido = $id";
        $this->qr = self::execSQL($this->sql);
        return $this->qr;
    }

    //formatar cpf e cnpj//
    function formatar_cpf_cnpj($doc) {
 
        $doc = preg_replace("/[^0-9]/", "", $doc);
        $qtd = strlen($doc);
 
        if($qtd >= 11) {
 
            if($qtd === 11 ) {
 
                $docFormatado = substr($doc, 0, 3) . '.' .
                                substr($doc, 3, 3) . '.' .
                                substr($doc, 6, 3) . '-' .
                                substr($doc, 9, 2);
            } else {
                $docFormatado = substr($doc, 0, 2) . '.' .
                                substr($doc, 2, 3) . '.' .
                                substr($doc, 5, 3) . '/' .
                                substr($doc, 8, 4) . '-' .
                                substr($doc, -2);
            }
 
            return $docFormatado;
 
        } else {
            return 'Documento invalido';
        }
    }
}
?>