<?php
include 'conn.php';

$profile = mysqli_query($conn, "SELECT * FROM profile LIMIT 1");
$data = mysqli_fetch_assoc($profile);

$skills = mysqli_query($conn, "SELECT * FROM skills");
$certificates = mysqli_query($conn, "SELECT * FROM certificates");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Portfolio</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top custom-navbar">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#home"><?php echo $data['name']; ?></a>

    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="nav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#certificates">Certificates</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- HERO -->
<section id="home" class="hero-section full-page">
  <div class="container">
    <div class="row align-items-center">

      <div class="col-md-4 text-center mb-4">
        <img src="assets/<?php echo $data['image']; ?>" 
            class="img-fluid rounded shadow-lg profile-img">   
      </div>

      <div class="col-md-8">
        <h1 class="hero-title">
          Hi, I'm <span class="accent"><?php echo $data['name']; ?></span>
        </h1>

        <p class="hero-text"><?php echo $data['description']; ?></p>

        <a href="#about" class="btn btn-accent me-2">About Me</a>
        <a href="#certificates" class="btn btn-outline-light">Certificates</a>
      </div>

    </div>
  </div>
</section>

<!-- ABOUT -->
<section id="about" class="full-page">
  <div class="container">
    <div class="row">

      <div class="col-md-6">
        <h2>About Me</h2>
        <p><?php echo $data['about']; ?></p>
      </div>

      <div class="col-md-6">
        <h2>Technical Skills</h2>

        <?php while($skill = mysqli_fetch_assoc($skills)) { ?>
          <div class="mb-3">
            <label><?php echo $skill['name']; ?> (<?php echo $skill['level']; ?>%)</label>
            <div class="progress custom-progress">
              <div class="progress-bar" style="width: <?php echo $skill['level']; ?>%"></div>
            </div>
          </div>
        <?php } ?>

      </div>

    </div>
  </div>
</section>

<!-- CERTIFICATES -->
<section id="certificates" class="full-page bg-dark-alt">
  <div class="container">
    <h2 class="text-center mb-5">Certificates</h2>

    <div class="row g-4">

      <?php while($cert = mysqli_fetch_assoc($certificates)) { ?>
        <div class="col-lg-4 col-md-6">
          <div class="card custom-card h-100">

            <img src="assets/<?php echo $cert['image']; ?>" 
                class="card-img-top cert-img">

            <div class="card-body text-center">
              <h5><?php echo $cert['title']; ?></h5>
              <p><?php echo $cert['issuer']; ?></p>
            </div>

          </div>
        </div>
      <?php } ?>

      </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="text-center py-4">
  <small>© <?php echo $data['name']; ?> - Portfolio</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html> 