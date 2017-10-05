<section id="sectionConteudo">
    <div id="conteudo">
        <div id="tituloPagina">
            Cadastro de hotel
        </div>
        <form name="frmHotel" action="router.php?controller=hotel&modo=inserir" method="post" enctype="multipart/form-data">
            <div id="containerEsquerda">
                <table id="tableEsquerda" border="0">
                    <tr>
                        <td><input type="hidden" name="txtQtdImg" value="1" id="txtQtdImg"></td>
                    </tr>
                    <tr>
                        <td><label>Nome do Hotel</label></td>
                    </tr>

                    <tr>
                        <td><input type="text" name="txtNomeHotel" placeholder="Digite o nome do hotel"></td>
                    </tr>

                    <tr>
                        <td><label>Horário de check-in</label></td>
                    </tr>

                    <tr>
                        <td><input type="text" name="txtCheckin" placeholder="Ex.: 12:00"></td>
                    </tr>

                    <tr>
                        <td><label>Horário de Check-out</label></td>
                    </tr>

                    <tr>
                        <td><input type="text" name="txtCheckout" placeholder="Ex.: 08:00"></td>
                    </tr>

                    <tr>
                        <td><label>Tipo de Estadia</label></td>
                    </tr>

                    <tr>
                        <td>
                            <select name="sltEstadia" >

                                <?php

                                    require_once('controllers/hotel_controller.php');

                                    $controller_hotel = new ControllerHotel();
                                    $rs = $controller_hotel-> Estadia();

                                    $cont = 0;
                                    while($cont < count($rs)){


                                ?>

                                <option value="<?php echo($rs[$cont]->idEstadia); ?>"><?php echo($rs[$cont]->estadia); ?></option>

                                <?php
                                        $cont++;
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td><label>Quantidade de Estrelas</label></td>
                    </tr>

                    <tr>
                        <td>
                            <select name="sltEstrela" >
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td><label>Imagens do Hotel (Máx. 10)</label><img title="Adicionar imagem" alt="" src="imagens/cadastrohotel/plusgreen.svg"></td>
                    </tr>

                    <tr>
                        <td>
                            <input id="inputFile" type="file" name="fileFoto0">
                        </td>
                    </tr>

                    <tr>
                        <td><label>Comodidades</label></td>
                    </tr>

                    <tr>
                        <td>
                            <ul>

                                <?php

                                    require_once('controllers/hotel_controller.php');

                                    $controller_hotel = new ControllerHotel();
                                    $rows = $controller_hotel->Comodidades();

                                    $cont = 0;

                                    while ($cont < count($rows)) {

                                 ?>

                                <li><input type="checkbox" name="chkAcademia" value="1"><label for="chkAcademia"><?php echo($rows[$cont]->nomeComodidade); ?></label></li>


                                <?php
                                        $cont++;
                                    }
                                 ?>
                            </ul>
                        </td>
                    </tr>

                </table>
            </div>
            <div id="containerDireita">
                <table id="tableEsquerda">
                    <tr>
                        <td><label>Descrição do Hotel (Máx. 300 caracteres)</label></td>
                    </tr>

                    <tr>
                        <td>
                            <textarea maxlength="300" placeholder="Digite a descrição do hotel"></textarea>
                        </td>
                    </tr>
                </table>

                <div id="btnSalvar">
                    <input type="submit" name="btnSalvar" value="CADASTRAR">
                </div>
            </div>

        </form>
    </div>
</section>
