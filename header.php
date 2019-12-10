<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Informasi Harga Eceran</title>
        <link rel="stylesheet" href="bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="custom.css" />
    </head>
    <body>
        <!-- jQuery & Bootstrap 4 JavaScript libraries -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="index.php">Informasi Harga Eceran</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="weeklyPrice.php" id='weeklyprice'>Harga Mingguan</a>
                    <a class="nav-item nav-link" href="monthlyPrice.php" id='monthlyprice'>Harga Bulanan</a>
                    <a class="nav-item nav-link" href="mom.php" id='mom'>Pertumbuhan Harga Bulanan</a>
                    <a class="nav-item nav-link" href="yoy.php" id='yoy'>Pertumbuhan Harga Tahunan</a>
                </div>
            </div>
        </nav>
        
        <!-- container -->
        <main role="main" class="container starter-template">

            <div class="row">
                <div class="col">

                    <!-- where prompt / messages will appear -->
                    <div id="response"></div>

                    <!-- where main content will appear -->
                    <div id="content"></div>
                </div>
            </div>

        </main>
        
    </body>
</html>
