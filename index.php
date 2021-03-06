    <?php
    require("vendor/autoload.php");
    require_once("./Api.php");
    require_once("./UsageLogger.php");
    require_once ("./Unicorn.php");

    $api = new Api();
    $usageLogger = new UsageLogger('log');

    $param = $_GET["id"];

    $data = $api -> getData($param);

    $usageLogger -> log(empty($param) ? 'All' : $param);

    ?>
        <!DOCTYPE html>
        <html lang="en">
          <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
            <title>DA288A-VT18 Assignment 1</title>
            <!-- Bootstrap core CSS -->
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <!-- Custom styles for this template -->
            <link href="css/style.css" rel="stylesheet">
          </head>

          <body>
            <!-- Navigation -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
              <div class="container">
                <a class="navbar-brand" href="/">Assignment 1 - Unicorn Wiki</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
            <div class="container">
            <hr>
                <div class="row text-center">
               <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <form action = '/'class="form-inline" method="GET">
                        <input class="form-control mr-sm-2" type="text" name="id" id="id" placeholder="Sök" aria-label="Search"
                               value=
                               "<?php
                               echo !empty($_GET['id']) ? $_GET['id'] : '';
                               ?>">
                        <button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit">Sök</button>
                        <a href="/" class="btn aqua-gradient btn-rounded btn-sm my-0">
                            Visa Alla
                        </a>
                    </form>
                </div>
                <div class="col-lg-4"></div>
                </div>
                <hr>
              <div class="row text-center">
                  <?php

                  if(count($data)>1 && !is_string($data)){
                      foreach($data as $item){
                          echo $item -> printUnicornSimple();
                      }
                  }

                  if(count($data)===1 && !is_string($data)){
                      foreach ($data as $item){
                          echo $item -> printUnicornDetailed();
                      }
                  }

                  if(is_string($data)){
                    echo $data;
                  }

                  ?>
              </div>
            </div>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
          </body>
        </html>
