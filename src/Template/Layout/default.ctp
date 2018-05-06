<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Nomina 2018';
?>
<!DOCTYPE html>
<html>
    <head>
    <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
        <?= $cakeDescription ?>

        </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('mdb.min.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('parsley.css') ?>
    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('parsley.min.js') ?>
    <?= $this->Html->script('es.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    </head>
    <body>
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark primary-color">

            <!-- Navbar brand -->
            <a class="navbar-brand" href="/nomina"><?= $this->fetch('title') ?></a>

            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="basicExampleNav">

                <!-- Links -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active ">
                <?= $this->Html->link('Registrar Empleado','/empleados/add',['class'=>'nav-link']) ?>
                        <span class="sr-only">(current)</span>

                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('Mostrar Nomina','/',['class'=>'nav-link']) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('Contacto','/empleados/contacto',['class'=>'nav-link']) ?>
                    </li>



                </ul>
                <!-- Links -->


            </div>
            <!-- Collapsible content -->

        </nav>


        <h1 class="text-center text-success"> <?= $this->Flash->render() ?></h1>  
        <div class="container">
        <?= $this->fetch('content') ?>
        </div>
        <footer>
        </footer>

<?= $this->Html->script('popper.min.js') ?>
        <script>
            $(document).ready(function () {
                $('form').parsley();
            });
        </script>
    </body>
</html>
