<!DOCTYPE html>
<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <script src="js/jquery-3.7.0.min.js" type="text/javascript"></script>
        <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
        <meta charset="UTF-8">
        <title>Login</title>
        <style>
            .row{
                border:1px solid #000;
                margin-top: 25%;
                vertical-align: middle;
            }
            .col-md-4{
                border: 1px solid red;
            }
        </style>
    </head> 
    <body class="container">
        <header>

        </header>
        <section>
            <form method="POST" action="controller/loginController.php">
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <h3>E-mail:</h3>
                        <input type="email" name="email" id="email">
                        <h3>Senha:</h3>
                        <input type="password" name="senha" id="senha">
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </form> 
        </section>
        <?php
        ?>
    </body>
</html>
