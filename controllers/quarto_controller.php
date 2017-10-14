<?php

    class ControllerQuarto
    {

        public function Inserir(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $nome = $_POST['txtNomeQuarto'];
                $vlrDiario = $_POST['txtDiaria'];
                $maxHosp = $_POST['txtMaxHosp'];
                $qtdQuartos = $_POST['txtQtdQuartos'];
                $descricao = $_POST['txtDescricaoQuarto'];
                $idParceiro = $_GET['idParceiro'];
                $idHotel = $_POST['idHotel'];

                require_once('models/quarto_class.php');

                $quarto_class = new Quarto();

                $quarto_class->nome = $nome;
                $quarto_class->vlrDiario = $vlrDiario;
                $quarto_class->maxHosp = $maxHosp;
                $quarto_class->qtdQuartos = $qtdQuartos;
                $quarto_class->idHotel = $idHotel;
                $quarto_class->descricao = $descricao;

                if (isset( $_FILES[ 'fileImg' ][ 'name' ] ) && $_FILES[ 'fileImg' ][ 'error' ] == 0 ) {
                  $arquivo_tmp = $_FILES[ 'fileImg' ][ 'tmp_name' ];
                  $nome = $_FILES[ 'fileImg' ][ 'name' ];

                  $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

                  $extensao = strtolower ( $extensao );

                  if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {

                      $destino = 'imagens/quarto/' . $nome;

                      // tenta mover o arquivo para o destino
                      if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                         $quarto_class->caminhoImg = $destino;
                         $idQuarto = $quarto_class->InsertQuarto();


                         if(isset($_POST['comodidadeQuarto'])){

                             foreach ($_POST['comodidadeQuarto'] as $comodidade) {

                                 $quarto_comodidade = new Quarto();
                                 $quarto_comodidade->comodidade = $comodidade;
                                 $quarto_comodidade->idQuarto = $idQuarto;
                                 $quarto_comodidade->InsertComodidade();

                                 header('location:perfilParceiro.php?idParceiro='.$idParceiro);
                             }

                         }


                      }
                  }
                }
            }

        }


    }
?>