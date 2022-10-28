<?php
require_once './inc/init.php';
require_once './inc/head_inc.php';
?>
<title>Apple | Authentication</title>
</head>

<body>
  <!--TRAITEMENT -->
  <?php


  if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_destroy();
    header('location:index.php');
  }

  $error = '';



  if ($_POST) {
    $formPseudo = $_POST['pseudo'];
    $formPassword = $_POST['password'];

    if (!empty($formPseudo)) { // Si le pseudo n'est pas vide

      // Je fais une rteq pour récupérer les infos du pseudo saisi
      $req = $connect->query("SELECT * FROM member WHERE pseudo = '$formPseudo'");


      // si le rowCount() >= 1 alors le pseudo saisi existe bien
      if ($req->rowCount() >= 1) {

        $member = $req->fetch(PDO::FETCH_ASSOC); // Je fetch pour récupérer les infos dans un tableau

        var_dump($member['status']);
        if ($member['status'] === '2') {
          $error .= '<div class="alert lert-dismissible fade show alert-danger" role="alert">
          Your account has been deactivated! Please contact the administrator.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

          // header('location:authentication.php');
        } else {

        // Je vérifie si le mdp envoyé correspond au mdp contenu dans le tableau que j'ai généré
        if (password_verify($formPassword, $member['password'])) {

          // Je créé une session que j'appelle 'member' pour stocker les infos de l'utilisateur

          $_SESSION['member']['member_id'] = $member['member_id'];
          $_SESSION['member']['pseudo'] = $member['pseudo'];
          $_SESSION['member']['lastname'] = $member['lastname'];
          $_SESSION['member']['firstname'] = $member['firstname'];
          $_SESSION['member']['email'] = $member['email'];
          $_SESSION['member']['gender'] = $member['gender'];
          $_SESSION['member']['city'] = $member['city'];
          $_SESSION['member']['area_code'] = $member['area_code'];
          $_SESSION['member']['address'] = $member['address'];
          $_SESSION['member']['status'] = $member['status'];

          header('location:profile.php');
        } else {

          $error .= '<div class="alert alert-danger" role="alert">
        There is an error in the password !
      </div>';
        }
      }
      } else {

        $error .= '<div class="alert alert-danger" role="alert">
      There is an error in the pseudo !
    </div>';
      }
    }

    $alert .= $error;
  }

  ?>

  <?php
  require_once './inc/header_inc.php';
  ?>
  <h1 class="text-center mt-3 mb-3 text-muted pt-5">Authentication</h1>
  <hr>
  <div class="container mt-3 mb-3">
    <p class="text-center text-danger">
      <strong>Hey!</strong> You are trying to access content that requires you to be logged in.
    </p>
    </div>
  </div>
  <div class="container center">
    <div class="row d-flex justify-content-center mb-4">
      <div class="col-6 mb-4">
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
          <div class="auth-btn d-flex justify-content-center">
            <button type="submit" name="submit" class="btn btn-outline-dark btn-lg col-4">Submit</button>
          </div>
        </form>
      </div>
      <h4 class="text-center">You don't have a pseudo on Shop Project?</h4>
      <p class="text-center">It's fast, free, and will allow you to reserve your nickname on the store</p>
      <div class="d-flex justify-content-center">
        <a href="<?= URL ?>registration.php" class="btn btn-outline-dark">Create an account</a>
      </div>
    </div>
  </div>

  <?php
  require_once './inc/footer_inc.php';
  ?>