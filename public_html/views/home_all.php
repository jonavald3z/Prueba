<head>
    <?php echo $header;?>
</head>

<body>
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand"> <img id="logo-bbelt" src="../../assets_2/img/time_line_1.png" alt="logo"> </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <section class="login_part">
        <div class="container">
            <div class="row ">
                <div class="col-lg-4 col-md-4">
                    <div class="hide-elem login_part_text text-center">
                        <div class="login_part_text_iner">

                            <a class="btn_3" href="/Productos/"> Productos</a>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <h3>Actividades Comunicacion PHP con la Base de Datos</h3>

                    <ul>
                        <li> <a href="/BaseConexion/"> Escript que añade 10 registros a las tabla productos, categorias </a> </li>
                    </ul>

                    <ul>
                        <li> <a href="/ProductosAleatorios/"> Escript que genera productos aleatorios (Se ejecutara cuando usted de clic) </a> </li>
                    </ul>

                    <ul>
                        <li> <a href="/ComentariosAleatorios/"> Lorem Ipsum para inicializar comentarios </a> </li>
                    </ul>

                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->

    
</body>
<footer class="footer_part">
    <div id="footer-fix" class="copyright_part">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="copyright_text">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> ejemplo <i class="ti-heart" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php echo $footer;?>

</html>
