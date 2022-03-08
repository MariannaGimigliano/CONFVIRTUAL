<!DOCTYPE html>
<html>
    <head>
        <title>Nuova Conferenza</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
        <link rel="stylesheet" href="../css/styleHome.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- Bootstrap core CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
  <!-- icone-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
        <ul>
            <li style="float:right"><a href="../html/paginaIniziale.html"><i class="fa fa-home"></i></a></li>
            <li><a href="../html/Login.html">Login</a></li>
            <li><a class="active" href="../html/register.html">Registrazione</a></li>
          </ul>
        
          <div class="row">
        
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <h1><br><br>Creazione Nuova Conferenza</h1><br>
          
          <h4 class="mb-3">
            <form action="./creaConferenza.php" method="post" class="row g-3">
              <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Anno Edizione:</label>
                <input type="text" class="form-control" id="anno" name="anno">
              </div>

              <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Acronimo:</label>
                <input type="text" class="form-control" id="acronimo" name="acronimo">
              </div>
              

              <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome">
              </div>  

              <div class="col-md-6">    
                  <label for="formFile" class="form-label">Logo</label>
                  <input class="form-control" type="file" id="logo" name="logo">
                </div>              

              <div class="col-md-6">
                <br>
                <button type="submit" name="btnCreaConferenza" class="btn btn-primary">Crea</button>
              </div>
                                
              </div>
            </form>
        </div>

        <div class="row">
        
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <h1><br><br>Aggiungi Giornata a Conferenza</h1><br>
          
          <h4 class="mb-3">
            <form action="./creaConferenza.php" method="post" class="row g-3">
            <div class="col-md-6">
                  <label for="inputPassword4" class="form-label">Conferenza:</label>
                  <!--<input type="text" class="form-control" id="corrente" name="corrente">-->
                  <select class="form-select" name="conferenza" >
                    <option value=""></option>
                    <?php foreach($templateParams['conferenze'] as $conferenza): ?>
                    <option value="<?php echo $conferenza['Nome']; ?>"><?php echo $conferenza['Nome']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Data:</label>
                <input type="date" class="form-control" id="data" name="data">
              </div>

              <div class="col-md-6">
                <br>
                <button type="submit" name="btnAggiungiData" class="btn btn-primary">Aggiungi</button>
              </div>
                                
              </div>
            </form>
            
        <div class="row">
        
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <h1><br><br>Creazione Nuova Sessione</h1><br>
          <h4 class="mb-3">
            <form action="./creaConferenza.php" method="post" class="row g-3">
            <div class="col-md-6">
                  <label for="inputPassword4" class="form-label">Conferenza:</label>
                  <!--<input type="text" class="form-control" id="corrente" name="corrente">-->
                  <select class="form-select" name="conferenza" >
                  <option value=""></option>
                    <?php foreach($templateParams['conferenze'] as $conferenza): ?>
                    <option value="<?php echo $conferenza['Nome']; ?>"><?php echo $conferenza['Nome']; ?></option>
                    <?php endforeach; ?>
                  </select>
                
                <div class="col-md-6">
                <br>
                <button type="submit" name="btnSelezionaConferenza" class="btn btn-primary">Seleziona</button>
                </div>
                <br>
                </div>
                <?php if(isset($templateParams["conferenza"])):?>
                <h4>Conferenza: <?php echo $templateParams["conferenza"][0]["Nome"]?></h4><br><br><br>
                <?php endif;?>
              
            </form>
            <form action="./creaConferenza.php" method="post" class="row g-3">
                <div class="col-md-6">
                  <label for="inputPassword4" class="form-label">Giornata:</label>
                  <!--<input type="text" class="form-control" id="corrente" name="corrente">-->
                  <select class="form-select" name="giornata" >
                    <option value=""></option>
                    <?php foreach($templateParams['giornate'] as $giornata): ?>
                    <option value="<?php echo $giornata['Giorno']; ?>"><?php echo $giornata['Giorno']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

              <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Codice:</label>
                <input type="text" class="form-control" id="codice" name="codice">
              </div>

              <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Titolo:</label>
                <input type="text" class="form-control" id="titolo" name="titolo">
              </div>
              

              <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Orario Inizio:</label>
                <input type="time" class="form-control" id="inizio" name="inizio">
              </div>  

              <div class="col-md-6">    
                  <label for="formFile" class="form-label">Orario Fine</label>
                  <input class="form-control" type="time" id="fine" name="fine">
                </div>        
                
                <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Link:</label>
                <input type="text" class="form-control" id="link" name="link">
              </div>

              <div class="col-md-6">
                <br>
                <button type="submit" name="btnCreaSessione" class="btn btn-primary">Crea</button>
              </div>
                                
              </div>
            </form>
        </div>
    </body>
</html>