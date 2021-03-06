<!DOCTYPE html>
<html>
  <head>
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
      <li style="float:right"><a href="../php/paginaUtente.php"><i class="fa fa-home"></i></a></li>
      <li style="float:right"><a href="../php/logout.php">Logout</a></li>
    </ul>

    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <?php if (isset($templateParams['msgAssociazioneSP'])): ?>
          <div class="alert alert-info" role="alert">
            <div class="row">
              <div class="col-8 col-md-6">
                <h4><?php echo ($templateParams['msgAssociazioneSP'])?></h4>
              </div> 
            </div>
          </div>
        <?php endif; ?>

        <?php if (isset($templateParams['errorSp'])): ?>
          <div class="alert alert-danger" role="alert">
            <div class="row">
              <div class="col-8 col-md-6">
                <h4><?php echo ($templateParams['errorSp'])?></h4>
              </div> 
            </div>
          </div>
        <?php endif; ?>

        <?php if (isset($templateParams['msgErroreSP'])): ?>
          <div class="alert alert-danger" role="alert">
            <div class="row">
              <div class="col-8 col-md-6">
                <h4><?php echo ($templateParams['msgErroreSP'])?></h4>
              </div> 
            </div>
          </div>
        <?php endif; ?>

        <h1><br><br>Associazione Speaker - Presentazione di un Tutorial</h1><br>
          
        <h4 class="mb-3">
        <form action="./associazioni.php" method="post" class="row g-3">

          <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Speaker:</label>
            <select class="form-select" name="speaker" >
              <option value=""></option>
              <?php foreach($templateParams['speaker'] as $speaker): ?>
                <option value="<?php echo $speaker['UsernameUtente']; ?>"><?php echo $speaker['UsernameUtente']?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Tutorial:</label>
            <select class="form-select" name="tutorial" >
              <option value=""></option>
              <?php foreach($templateParams['tutorial'] as $tutorial): ?>
                <option value="<?php echo $tutorial['CodicePresentazione']; ?>"><?php echo $tutorial['CodicePresentazione'] . " - " . $tutorial['Titolo']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="col-md-6"><br>
            <button type="submit" name="btnAssociazioneST" class="btn btn-primary">Associa</button>
          </div>
          
        </form>                     
      </div>
    </div>
    <br><br><hr>

    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">

        <?php if (isset($templateParams['msgAssociazionePA'])): ?>
          <div class="alert alert-info" role="alert">
            <div class="row">
              <div class="col-8 col-md-6">
                <h4><?php echo ($templateParams['msgAssociazionePA'])?></h4>
              </div> 
            </div>
          </div>
        <?php endif; ?>

        <?php if (isset($templateParams['errorPr'])): ?>
          <div class="alert alert-danger" role="alert">
            <div class="row">
              <div class="col-8 col-md-6">
                <h4><?php echo ($templateParams['errorPr'])?></h4>
              </div> 
            </div>
          </div>
        <?php endif; ?>

        <?php if (isset($templateParams['msgErrorePA'])): ?>
          <div class="alert alert-danger" role="alert">
            <div class="row">
              <div class="col-8 col-md-6">
                <h4><?php echo ($templateParams['msgErrorePA'])?></h4>
              </div> 
            </div>
          </div>
        <?php endif; ?>

        <h1><br>Associazione Presenter - Presentazione di un Articolo</h1><br>
          
        <h4 class="mb-3">
          <form action="./associazioni.php" method="post" class="row g-3">

          <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Presenter:</label>
            <select class="form-select" name="presenter" >
              <option value=""></option>
              <?php foreach($templateParams['presenter'] as $presenter): ?>
                <option value="<?php echo $presenter['UsernameUtente']; ?>"><?php echo $presenter['UsernameUtente']?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Articolo:</label>
            <select class="form-select" name="articolo" >
              <option value=""></option>
              <?php foreach($templateParams['articolo'] as $articolo): ?>
                <option value="<?php echo $articolo['CodicePresentazione']; ?>"><?php echo $articolo['CodicePresentazione'] . " - " . $articolo['Titolo']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="col-md-6"><br>
            <button type="submit" name="btnAssociazionePA" class="btn btn-primary">Associa</button>
          </div>

        </form>
      </div>
    </div>
  </body>
</html>