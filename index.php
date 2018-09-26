<html lang="pt">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
</head>
<body>
    
    <div class="container bg-light">
        
        <h2>Samples Tabulator</h2>
        <hr>
        
        <div class="card">
            <div class="card-body">
                Realiza a seleção dos dados de % Peso de Óxidos (coluna Ox mass%) do arquivo txt para CSV.<br>
                Microssonda JEOL JXA-FE-8530
            </div>
        </div>
        <hr>

        <form enctype="multipart/form-data" method="POST" action="tabbing.php" >
            <div class="form-row">
            <div class="form-group">
                <label for="arquivo">Selecione o arquivo para obter os dados em CSV</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
                <input type="file" class="form-control-file " id="file" name="file">
            </div></div>
            <div class="form-row">
                <button id="envio" name="envio" type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
        
        <footer class="page-footer font-small pt-4"><hr>
            <div class="footer-copyright text-center py-3">Instituto de Geociências USP © 2018-<?php echo date('Y'); ?> <a target="_blank" href="https://github.com/ezanon/samplestabulator">github.com/ezanon/samplestabulator</a>
            </div>
        </footer>        
    
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>
</html>
    