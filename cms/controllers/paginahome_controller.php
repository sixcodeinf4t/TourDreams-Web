<?php

    class ControllerHome
    {

        public function ListarHome(){
            require_once('models/paginahome_class.php');
            $lsthome = new Home();
            return $lsthome->SelectHome();


        }

        public function EditarHome(){

        }

    }

?>
