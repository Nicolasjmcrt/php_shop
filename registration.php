<?php
require_once './inc/init.php';
require_once './inc/head_inc.php';
// var_dump($connect);

?>
<title>Apple | Registration</title>
</head>


<body>


    <!-- TRAITEMENT -->

    <?php


    // Étape 1

    // En utilisant la fonction strlen(), vérifier la taille du pseudo (3 et 20 caractères)
    // En utilisant la fonction preg_match() pour vérifier si le pseudo est conforme
    // '#^[a-zA-Z0-9._-]+$#'
    // Vérifier que le pseudo est unique

    $error = '';

    foreach ($_POST as $key => $val) {
        $_POST[$key] = htmlspecialchars(addslashes($val));
    }

    if ($_POST) {
        $pseudo = ($_POST['pseudo']);
        $lastname = ($_POST['lastname']);
        $firstname = ($_POST['firstname']);
        $email = ($_POST['email']);
        $gender = ($_POST['gender']);
        $city = ($_POST['city']);
        $area_code = ($_POST['area_code']);
        $address = ($_POST['address']);
        $pattern = '#^[a-zA-Z0-9._-]+$#';


        // Vérification de la longueur du pseudo
        if (strlen($pseudo) < 3 || strlen($pseudo) > 20) {
            $error .= '<div class="alert alert-dismissible fade show alert-danger" role="alert">
            Your pseudo must contain between 3 and 20 characters.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }

        // Vérification des caractères du pseudo
        // preg_match() permet de vérifier une correpondance avec une expression régulière (regex)
        if (!preg_match($pattern, $pseudo)) {
            $error .= '<div class="alert alert-dismissible fade show alert-danger" role="alert">
            Your pseudo is invalid! Only lowercase and uppercase letters, numbers, hyphen (-) and underscore (_) are allowed.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }



        // Vérification si pseudo existant dans BDD
        // En utilisant rowCount(), afficher un message d'erreur si le pseudo existe déjà
        $req = $connect->query("SELECT * FROM member WHERE pseudo = '$pseudo'");
        $state = $req->rowCount();

        if ($state >= 1) {
            $error .= '<div class="alert alert-dismissible fade show alert-danger" role="alert">
            This pseudo is already used !
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }

        // Vérification si champ password vide
        if (empty($_POST['password'])) {
            $error .= '<div class="alert alert-dismissible fade show alert-danger" role="alert">
            You must enter a password !
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // password hashé avec password_hash()

        // Vérification si champ last name vide
        if (empty($lastname)) {
            $error .= '<div class="alert alert-dismissible fade show alert-danger" role="alert">
            You must enter a last name !
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }

        // Vérification si champ first name vide
        if (empty($firstname)) {
            $error .= '<div class="alert alert-dismissible fade show alert-danger" role="alert">
            You must enter a first name !
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }

        // Vérification si champ email valide 
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error .= '<div class="alert alert-dismissible fade show alert-danger alert-email" role="alert">
            Email address <span>' . $email . '</span> is not considered valid !
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }

        // Vérification si champ gender vide
        if (empty($gender)) {
            $error .= '<div class="alert alert-dismissible fade show alert-danger" role="alert">
            You must select your gender !
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }

        // Vérification si champ city vide
        if (empty($city)) {
            $error .= '<div class="alert alert-dismissible fade show alert-danger" role="alert">
            You must enter a city !
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }

        // Vérification de la présence et longueur du code postal
        if (empty($area_code) || strlen($area_code) != 5) {
            $error .= '<div class="alert alert-dismissible fade show alert-danger" role="alert">
            You must enter a postal code and it must contain exactly 5 numeric characters !
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }

        // Vérification si champ adresse vide
        if (empty($address)) {
            $error .= '<div class="alert alert-dismissible fade show alert-danger" role="alert">
            You must enter an address !
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }



        // Insérer user dans la base de données

        if (empty($error)) {
            $connect->query("INSERT INTO member(pseudo,password,lastname,firstname,email,gender,city,area_code,address) VALUES ('$pseudo','$password','$lastname','$firstname','$email','$gender','$city','$area_code','$address')");

            $error .= '<div class="alert alert-dismissible fade show alert-success" role="alert">
            L\'utilisateur a bien été enregistré !
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }





        $alert .= $error;
    }



    //  Étape 2

    // En utilisant la fonction password_hash(), crypter le password de l'user dans la BDD

    ?>

    <!-- AFFICHAGE -->

    <?php
    require_once './inc/header_inc.php';
    ?>
    <h1 class="text-center text-muted mt-3 pt-5 registrar-h1">Registration</h1>
    <div class="container register-container">
        <div class="row">
            <div class="col-6">
                <?= $alert; ?>
                <form class="mt-3 mb-3" action="" method="POST">
                    <div class="mb-3">
                        <label for="pseudo" class="form-label">Pseudo</label>
                        <input type="text" class="form-control" name="pseudo" id="pseudo">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last name</label>
                        <input type="text" class="form-control" name="lastname" id="lastname">
                    </div>
                    <div class="mb-3">
                        <label for="firstname" class="form-label">First name</label>
                        <input type="text" class="form-control" name="firstname" id="firstname">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
            </div>
            <div class="col-6 mt-3 mb-3">
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" name="gender" id="gender" aria-label="Gender">
                        <option selected>Select your gender</option>
                        <option value="m">Male</option>
                        <option value="f">Female</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" name="city" id="city">
                </div>
                <div class="mb-3">
                    <label for="area_code" class="form-label">Area code</label>
                    <input type="text" class="form-control" name="area_code" id="area_code">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" id="address">
                </div>
                <button type="submit" name="submit" class="btn btn-outline-dark btn-lg col-4">Submit</button>
            </div>
            </form>
        </div>
    </div>
    <?php
    require_once './inc/footer_inc.php';
    ?>