<?php

class diabetesDTO{

    private $id_usuario;
    private $tipo_diabetes;
    private $terapia;
    private $data_diagnostico;
    private $meta_min;
    private $meta_max;

    public function __construct($id_usuario){
        $this->id_usuario = $id_usuario;
    }

    //GETTERS
    public function getId_usuario(){
        return $this->id_usuario;
    }

    public function getTipo_diabetes(){
        return $this->tipo_diabetes;
    }

    public function getTerapia(){
        return $this->terapia;
    }

    public function getData_diagnostico(){
        return $this->data_diagnostico;
    }

    public function getMeta_min(){
        return $this->meta_min;
    }

    public function getMeta_max(){
        return $this->meta_max;
    }

    //SETTERS
    public function setId_usuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }

    public function setTipo_diabetes($tipo_diabetes){
        $this->tipo_diabetes = $tipo_diabetes;
    }

    public function setTerapia($terapia){
        $this->terapia = $terapia;
    }

    public function setData_diagnostico($data_diagnostico){
        $this->data_diagnostico = $data_diagnostico;
    }

    public function setMeta_min($meta_min){
        $this->meta_min = $meta_min;
    }

    public function setMeta_max($meta_max){
        $this->meta_max = $meta_max;
    }

}

?>