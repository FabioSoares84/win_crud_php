<?php
class PacienteDao{
    private static $instance;
    function __construct() {
    }
    static public function getInstance(){
        if(!isset(self::$instance))
            self::$instance = new PacienteDao();
        return self::$instance;
    }

     //CRUD ---------------------------------------------------------------------
    public function m_gravar_paciente(PacienteBean $paciente) {
        try {
            $sql = "insert into pacientes (emp_nome,emp_nomeFantasia,emp_cnpj,emp_ie,emp_site,emp_email,emp_celular,emp_cep,emp_logradouro,emp_numeroEnd,emp_bairro,emp_municipio,emp_uf) values (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->bindvalue(1, $paciente->getEmp_nome());
            $statement_sql->bindvalue(2, $paciente->getEmp_nomeFantasia());
            $statement_sql->bindvalue(3, $paciente->getEmp_cnpj());
            $statement_sql->bindvalue(4, $paciente->getEmp_ie());
            $statement_sql->bindvalue(5, $paciente->getEmp_site());
            $statement_sql->bindvalue(6, $paciente->getEmp_email());
            $statement_sql->bindvalue(7, $paciente->getEmp_celular());
            $statement_sql->bindvalue(8, $paciente->getEmp_cep());
            $statement_sql->bindvalue(9, $paciente->getEmp_logradouro());
            $statement_sql->bindvalue(10, $paciente->getEmp_numeroEnd());
            $statement_sql->bindvalue(11, $paciente->getEmp_bairro());
            $statement_sql->bindvalue(12, $paciente->getEmp_municipio());
            $statement_sql->bindvalue(13, $paciente->getEmp_uf());
            $statement_sql->execute();
            return ConexaoPDO::getInstance()->lastInsertId();
        } catch (PDOException $e) {
            print " Erro em m_gravar_paciente" . $e->getMessage();
        }
    }
    public function m_alterar_paciente(PacienteBean $paciente) {
        try {
            $sql = "update pacientes set emp_nome=:emp_nome, "
                                    . "emp_nomeFantasia=:emp_nomeFantasia, "
                                    . "emp_cnpj=:emp_cnpj,"
                                    . "emp_ie=:emp_ie,"
                                    . "emp_site=:emp_site,"
                                    . "emp_email=:emp_email,"
                                    . "emp_celular=:emp_celular,"
                                    . "emp_cep=:emp_cep,"
                                    . "emp_logradouro=:emp_logradouro, "
                                    . "emp_numeroEnd=:emp_numeroEnd,"
                                    . "emp_bairro=:emp_bairro,"
                                    . "emp_municipio=:emp_municipio,"
                                    . "emp_uf=:emp_uf "
                                    . "where emp_id=:emp_id";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->bindvalue(":emp_nome",        $paciente->getEmp_nome());
            $statement_sql->bindvalue(":emp_nomeFantasia",$paciente->getEmp_nomeFantasia()); 
            $statement_sql->bindvalue(":emp_cnpj",        $paciente->getEmp_cnpj());
            $statement_sql->bindvalue(":emp_ie",          $paciente->getEmp_ie());
            $statement_sql->bindvalue(":emp_site",        $paciente->getEmp_site());
            $statement_sql->bindvalue(":emp_email",       $paciente->getEmp_email());
            $statement_sql->bindvalue(":emp_celular",     $paciente->getEmp_celular());
            $statement_sql->bindvalue(":emp_cep",         $paciente->getEmp_cep());
            $statement_sql->bindvalue(":emp_logradouro",  $paciente->getEmp_logradouro());
            $statement_sql->bindvalue(":emp_numeroEnd",   $paciente->getEmp_numeroEnd());
            $statement_sql->bindvalue(":emp_bairro",      $paciente->getEmp_bairro());
            $statement_sql->bindvalue(":emp_municipio",   $paciente->getEmp_municipio());
            $statement_sql->bindvalue(":emp_uf",          $paciente->getEmp_uf());
            $statement_sql->bindvalue(":emp_id",          $paciente->getEmp_id());
            return $statement_sql->execute();
            $statement_sql->debugDumpParams();
        } catch (PDOException $e) {
            print " Erro em m_alterar_paciente" . $e->getMessage();
        }
    }
    public function m_excluir_paciente($id){
        try {
            $sql = "delete from pacientes where emp_id =:id";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->bindValue(":id", $id);
            return $statement_sql->execute();
        } catch (PDOException $e) {
            print "Erro em m_excluir_paciente:".$e->getMessage();
        }
    }
    
    //BUSCA --------------------------------------------------------------------
    public function m_buscar_paciente_por_codigo($codigo){
        try {
            $sql = "select * from pacientes where pac_id =:pac_id";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->bindvalue(":pac_id", $codigo);
            $statement_sql->execute();
            return $this->m_popula_objeto_paciente($statement_sql->fetch(PDO::FETCH_ASSOC));
        } catch (PDOException $e) {
            print " Erro em m_buscar_paciente_por_codigo " . $e->getMessage();
        }
    }
    public function m_burcar_todos_pacientes() {
        try {
            $sql = "select * from pacientes";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->execute();
            return $this->fecht_array($statement_sql);
        } catch (PDOException $e) {
            print " Erro em m_burcar_todas_pacientes " . $e->getMessage();
        }
    }
    //--------------------------------------------------------------------------
    public function m_paginacao_paciente($inicio, $registros) {
        try {
            $sql = "select * from pacientes LIMIT $inicio, $registros";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->execute();
            return $this->fecht_array($statement_sql);
        } catch (PDOException $e) {
            print " Erro em m_paginacao_pacientes " . $e->getMessage();
        }
    }
    
    private function m_popula_objeto_paciente($linha) {
       $paciente = new PacienteBean();
       $paciente->setPac_id($linha["pac_id"]);
       $paciente->setPac_nome($linha["pac_nome"]);
       $paciente->setPac_cpf($linha["pac_cpf"]);
       $paciente->setPac_rg($linha["pac_rg"]);
       $paciente->setPac_telefone($linha["pac_telefone"]);
       $paciente->setPac_email($linha["pac_email"]);
       $paciente->setPac_data_nasc($linha["pac_data_nasc"]);
       $paciente->setPac_idade($linha["pac_idade"]);
       $paciente->setPac_civil($linha["pac_civil"]);
       $paciente->setPac_sexo($linha["pac_sexo"]);
       $paciente->setPac_endereco($linha["pac_endereco"]);
       $paciente->setPac_obs($linha["pac_obs"]);
       return $paciente;
    }
    
    private function fecht_array($statement_sql) {
        $resultado = array();
        if ($statement_sql) {
            while ($linha = $statement_sql->fetch(PDO::FETCH_OBJ)) {
                $paciente = new PacienteBean();
                $paciente->setPac_id($linha->pac_id);
                $paciente->setPac_nome($linha->pac_nome);
                $paciente->setPac_cpf($linha->pac_cpf);  
                $paciente->setPac_rg($linha->pac_rg); 
                $paciente->setPac_telefone($linha->pac_telefone);
                $paciente->setPac_email($linha->pac_email);
                $paciente->setPac_data_nasc($linha->pac_data_nasc);
                $paciente->setPac_idade($linha->pac_idade); 
                $paciente->setPac_civil($linha->pac_civil);
                $paciente->setPac_sexo($linha->pac_sexo);
                $paciente->setPac_endereco($linha->pac_endereco);
                $paciente->setPac_obs($linha->pac_obs); 
                $resultado[] = $paciente;
            }
        }
        return $resultado;
    }
}

?>