<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-white">
    <div class="container text-center mb-5" id="title-subtitle">
        <h1 class="text-primary">Strong Password Generator</h1>
    <h3 class="text-success">Genera una password sicura</h3>
    </div>

    <?php
    if (isset($_GET['submitted'])) {
    $passwordLenght = $_GET['lenghtNumber'];

    $lettereMaiusc = "ABCDEFGHIJKLMNOPQRSTUVZWX";
    $lettereMinusc = "abcdefghijklmnopqrstuvzwx";
    $numeri = "0123456789";
    $caratteriSpeciali = "*#-_?!$&%@+=";

    $allCharacters = "";
    if (isset($_GET['lettersCheckbox'])) {
        $allCharacters .= $lettereMaiusc . $lettereMinusc;
        //var_dump($allCharacters);
    } 
    if (isset($_GET['numbersCheckbox'])) {
        $allCharacters .= $numeri;
        //var_dump($allCharacters);
    }
    if (isset($_GET['specialCheckbox'])) {
        $allCharacters .= $caratteriSpeciali;
        //var_dump($allCharacters);
    };

    $newPassword = "";
    $i = "";
    for ($i = 0; $i < $passwordLenght; $i++) {
        $randomumber = rand(0, strlen($allCharacters) - 1);
        $newCharacter = $allCharacters[$randomumber];
        
        if (isset($_GET['repetition']) && $_GET['repetition'] === "1") {
             $newPassword .= $newCharacter;
        } else if (isset($_GET['repetition']) && $_GET['repetition'] === "2" && strpos($newPassword, $newCharacter) !== false) {
               $i--;
               continue; 
            } else {
               $newPassword .= $newCharacter; 
            }
    };
    //var_dump($newPassword);
    };


    ?>
    
    <form method="GET" action="">
        <div id="form-password-generator" class="container p-3 w-75 border border-3 rounded-3 border-success bg-success-subtle">
        <div class="form-group row justify-content-center mb-4 ">
            <div class="col-7 text-center py-1 text-primary border border-primary border-3 rounded-5 bg-primary-subtle mb-0">
                <h3>Seleziona tutti i campi sottostanti!</h3>
            </div> 
        </div>
        <div class="form-group row align-items-center mb-3">
            <label for="inputNumber" class="col-6 col-form-label">Lunghezza password:</label>
            <div class="col-4">
               <input type="number" class="form-control" id="inputNumber" name="lenghtNumber"> 
            </div> 
        </div>
        <div class="form-group row align-items-center mb-3">
            <label for="inputRadio" class="col-6 col-form-label">Consenti ripetizioni di uno o più caratteri:</label>
            <div class="col-2">
               <div class="col form-check">
                    <input class="form-check-input" type="radio" 
                    name="repetition" id="repetitionRadio1" value="1"> 
                    <label for="repetitionRadio1" class="form-check-label">Sì</label><br>
                    <input class="form-check-input" type="radio" 
                    name="repetition" id="repetitionRadio2" value="2"> 
                    <label for="repetitionRadio2" class="form-check-label">No</label>
                </div>
            </div>   
        </div>
        <div class="form-group row align-items-center mb-5">
            <label for="inputCheckbox" class="col-6 col-form-label">Consenti le seguenti tipologie di caratteri:</label>
            <div class="col-4">
                <div class="col-4 form-check">
               <input class="form-check-input" type="checkbox" name="lettersCheckbox" id="checkbox1" value="lettersOption"> 
               <label for="lettersCheckbox" class="form-check-label">Lettere</label>
            </div> 
            <div class="col-4 form-check">
               <input class="form-check-input" type="checkbox" 
               name="numbersCheckbox" id="checkbox2" 
               value="numbersOption"> 
               <label for="numbersCheckbox" class="form-check-label">Numeri</label>
            </div> 
            <div class="col form-check">
               <input class="form-check-input" type="checkbox" 
               name="specialCheckbox" id="checkbox3" 
               value="specialOption"> 
               <label for="specialCheckbox" class="form-check-label">Caratteri speciali</label>
            </div> 
            </div>
        </div>
        <div class="form-group row justify-content-center gap-3 mb-4">
            <button type="submit" class="btn btn-primary col-2">Invia</button>
            <input type="hidden" name="submitted" value="1"><br>
            <button type="delete" class="btn btn-primary col-2"><a href="index.php" class="text-decoration-none text-white">Ricomincia</a></button>
        </div>
        <?php 
        if(isset($_GET['submitted'])): ?>
            <div class="alert alert-success border border-2 border-success" role="alert">
                <h4 class="alert-heading">Password generata!</h4><br>
                <div class="form-group row">
                    <label for="inputPassword" class="col-6 col-form-label">La tua password è:</label>
                    <div class="col-4">
                        <input type="text" readonly class="form-control fw-bold fs-4 text-center" id="inputPassword" value="<?php echo $newPassword ?>">
                    </div>
                
            </div>
        <?php endif; ?>
        </div>
    </form>


    <!--
     <div class="modal" tabindex="-1" role="dialog" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">La password è stata generata correttamente!</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><?php echo $newPassword ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Copia password</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                </div>
            </div> 
        </div>
    </div>
-->
    

   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>    
</body>
</html>