<?php
class PacienteBean{
    private $pac_id;
    private $pac_nome;
    private $pac_cpf;
    private $pac_rg;
    private $pac_telefone;
    private $pac_email;
    private $pac_data_nasc;
    private $pac_idade;
    private $pac_civil;
    private $pac_sexo;
    private $pac_endereco;
    private $pac_obs;
   
    public function getPac_id() {
        return $this->pac_id;
    }

    public function getPac_nome() {
        return $this->pac_nome;
    }

    public function getPac_cpf() {
        return $this->pac_cpf;
    }

    public function getPac_rg() {
        return $this->pac_rg;
    }

    public function getPac_telefone() {
        return $this->pac_telefone;
    }

    public function getPac_email() {
        return $this->pac_email;
    }

    public function getPac_data_nasc() {
        return $this->pac_data_nasc;
    }

    public function getPac_idade() {
        return $this->pac_idade;
    }

    public function getPac_civil() {
        return $this->pac_civil;
    }

    public function getPac_sexo() {
        return $this->pac_sexo;
    }

    public function getPac_endereco() {
        return $this->pac_endereco;
    }

    public function getPac_obs() {
        return $this->pac_obs;
    }

    public function setPac_id($pac_id) {
        $this->pac_id = $pac_id;
    }

    public function setPac_nome($pac_nome): void {
        $this->pac_nome = $pac_nome;
    }

    public function setPac_cpf($pac_cpf): void {
        $this->pac_cpf = $pac_cpf;
    }

    public function setPac_rg($pac_rg): void {
        $this->pac_rg = $pac_rg;
    }

    public function setPac_telefone($pac_telefone): void {
        $this->pac_telefone = $pac_telefone;
    }

    public function setPac_email($pac_email): void {
        $this->pac_email = $pac_email;
    }

    public function setPac_data_nasc($pac_data_nasc): void {
        $this->pac_data_nasc = $pac_data_nasc;
    }

    public function setPac_idade($pac_idade): void {
        $this->pac_idade = $pac_idade;
    }

    public function setPac_civil($pac_civil): void {
        $this->pac_civil = $pac_civil;
    }

    public function setPac_sexo($pac_sexo): void {
        $this->pac_sexo = $pac_sexo;
    }

    public function setPac_endereco($pac_endereco): void {
        $this->pac_endereco = $pac_endereco;
    }

    public function setPac_obs($pac_obs): void {
        $this->pac_obs = $pac_obs;
    }
}
?>