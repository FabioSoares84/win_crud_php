<?php
class PacienteInstance{
    function __construct() {
    }
    //CRUD----------------------------------------------------------------------
    public function c_gravar_paciente() {
        $paciente = new PacienteBean();
        $paciente->setFor_nome($_POST["for_nome"]); 
        $paciente->setFor_nomeFantasia($_POST["for_nomeFantasia"]);
        $paciente->setFor_cnpj($_POST["for_cnpj"]);
        $paciente->setFor_ie($_POST["for_ie"]);
        $paciente->setFor_site($_POST["for_site"]);
        $paciente->setFor_email($_POST["for_email"]);
        $paciente->setFor_celular($_POST["for_celular"]);
        $paciente->setFor_cep($_POST["for_cep"]);
        $paciente->setFor_logradouro($_POST["for_logradouro"]);
        $paciente->setFor_numeroEnd($_POST["for_numeroEnd"]);
        $paciente->setFor_bairro($_POST["for_bairro"]);
        $paciente->setFor_municipio($_POST["for_municipio"]);
        $paciente->setFor_uf($_POST["for_uf"]);
        return PacienteDao::getInstance()->m_gravar_paciente($paciente);
    }
    public function c_alterar_paciente() {
        $paciente = new PacienteBean();
        $paciente->setFor_id($_POST["for_id"]);
        $paciente->setFor_nome($_POST["for_nome"]);
        $paciente->setFor_nomeFantasia($_POST["for_nomeFantasia"]);
        $paciente->setFor_cnpj($_POST["for_cnpj"]);
        $paciente->setFor_ie($_POST["for_ie"]);
        $paciente->setFor_site($_POST["for_site"]);
        $paciente->setFor_email($_POST["for_email"]);
        $paciente->setFor_celular($_POST["for_celular"]);
        $paciente->setFor_cep($_POST["for_cep"]); 
        $paciente->setFor_logradouro($_POST["for_logradouro"]);
        $paciente->setFor_numeroEnd($_POST["for_numeroEnd"]);
        $paciente->setFor_bairro($_POST["for_bairro"]);
        $paciente->setFor_municipio($_POST["for_municipio"]);
        $paciente->setFor_uf($_POST["for_uf"]);
        return PacienteDao::getInstance()->m_alterar_paciente($paciente);
    }
    public function c_excluir_paciente() {
        return PacienteDao::getInstance()->m_excluir_paciente($_GET["id"]);
    }
    
    //BUSCA---------------------------------------------------------------------
    public function c_buscar_todos_pacientes() {
        return PacienteDao::getInstance()->m_burcar_todos_pacientes();
    }
    public function c_buscar_paciente_por_codigo($codigo) {
        return PacienteDao::getInstance()->m_buscar_paciente_por_codigo($codigo);
    }
    public function c_paginacao_paciente($inicio, $registros) {
        return PacienteDao::getInstance()->m_paginacao_paciente($inicio, $registros);
    }

}

?>
