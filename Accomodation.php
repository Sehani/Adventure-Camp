<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <head>
    <title>Accomodation</title>
    <link rel="stylesheet" href="css/acco.css">
    <?php echo include "inc/head.php"; ?>
</head>
<body>

  <?php include 'connection.php'; ?>

  <!-- Header-->

  <header>

    <div class="header-area">
    <?php include "inc/navbar.php" ?>
    </div>

  </header>
  <video autoplay muted loop id="bg-video">
    <source src="video/gfp-astro-timelapse.mp4" type="video/mp4">
  </video>

  <div class="container-fluid tm-content-container">
    <ul class="cd-hero-slider mb-0 py-5">
      <li class="px-3" data-page-no="1">
        <div class="page-width-1 page-left">
          <div class="d-flex position-relative tm-border-top tm-border-bottom intro-container">
            <div class="intro-left tm-bg-dark">
              <h2 class="ac" >Fascilities of Olympia Adventure Camp</h2>
              <p >
                Olympia Adventure Camp Company offers exclusive services and benefits for the comfort of its guests. Among many facilities that the hotel has to offer, guests can directly access to the resturant and the car park. A various choice of restaurants and cafés are available at the camp site. Guests can be in family-friendly and home-like accommodation concept. And the tent also include all the necessary items such as<br><br> Backpacks <br> First Aid Kids <br> Sleeping Mats <br> Power Banks <br> Camping Lights<br> </p>

                <h2 class="ac" > Meals at Olympia Adventure Camps </h2> 

         <P> We buy many non-perishable items (like rice and pasta and snacks) before each trip starts, and we restock “freshies” (fruits, meats, veggies) at grocery stores every few days. When we’re staying in established campgrounds and have access to coolers, we’ll always include fresh food. We’re slightly more limited in the backcountry, but we still add veggies, proteins, spices, and condiments and make every meal super tasty. <br> <br>

 Meals are served buffet-style, and meats are cooked separately from carbs and starches, which are cooked separately from vegetables; condiments are always served on the side. While we all sit in a circle and eat the same food, students are able to “choose their own adventure” when going through the buffet line.Open 24 hours the Coffee Shop also features an international menu with many Sri Lankan specialty dishes. <br>

            </div>
            <div class="intro-right">

              <img src="img/ii.jpg" alt="Image" class="img-fluid intro-img-2">

              <img src="img/k.jpg" alt="Image" class="img-fluid intro-img-2">

              <img src="img/camp.jpg" alt="Image" class="img-fluid intro-img-3">

              <img src="img/uyana.jpg" alt="Image" class="img-fluid intro-img-4">

               <img src="img/m1.jpg" alt="Image" class="img-fluid intro-img-2">

              <img src="img/1i.jpg" alt="Image" class="img-fluid intro-img-2">

              


            </div>
            

  </div>
  </div>

  <div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>
  <?php include "inc/script.php" ?>
</body>

</html>