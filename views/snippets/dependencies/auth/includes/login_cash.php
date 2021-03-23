
 <section id="wrapper" class="company-register">
    <div class="login-company">

        <div class="white-box">

            <center><img src="<?php echo URL; ?>views/plugins/images/logo-2.png" width="140"></center>

            <form class="form-horizontal form-material" method="POST" id="formulario">

                <div class="form-group ">

                    <div class="col-xs-12">
                        <select id="optionvalue" name="caja" id="idInventary" class="form-control m-input m-input--air m-input--pill"">
                            <?php while($datos1 = mysqli_fetch_array($arrayInventory)) { ?>
                            <option id="">
                                <?php echo strtoupper($datos1['nameCash']) . "<br>"; ?>    
                            </option>
                            <?php } ?>
                        </select>
                        <br><input class="form-control" type="text" required="" placeholder="Usuario" name="usuario" autofocus=>
            <input type="hidden" value="<?php echo DIRAPP ?>" id="dir_app">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" required="" placeholder="Clave usuario" name="pass">
                    </div>
                </div>

                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-block btn-success" id="boton" type="button">Ingresar</button>
                    </div>
                </div>

                <div id="respuesta" class="hiddenDIV">
                    <div class="m-alert m-alert--icon m-alert--air alert alert-warning alert-dismissible fade show" role="alert" id="alertJS">
                        <div class="m-alert__icon">
                            <i class="la la-warning"></i>
                        </div>
                        <div class="m-alert__text">
                            <strong>
                                Lo sentimos,
                            </strong>
                            <span id="answerJS"></span>
                        </div>
                        <div class="m-alert__close">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</section>
