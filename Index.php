<?php
session_start();
$status = '';
// checking if the form is submit
if (isset($_POST['submit'])) {
    $fullname   = $_POST['fullname'];
    $email      = $_POST['email'];
    $subject    = $_POST['subject'];
    $message    = $_POST['message'];

    $to           = 'olympiaadventurecamp@gmail.com';
    $mail_subject = 'Message from Website';
    $email_body   = "Message from Contact Us Page of the Website: <br>";
    $email_body   .= "<b>From:</b> {$fullname} <br>";
    $email_body   .= "<b>Subject:</b> {$subject} <br>";
    $email_body   .= "<b>Message:</b><br>" . nl2br(strip_tags($message));

    $header       = "From: {$email}\r\nContent-Type: text/html;";

    $send_mail_result = mail($to, $mail_subject, $email_body, $header);

    if ($send_mail_result) {
        $status = '<p class="success">Message Sent Successfully.</p>';
    } else {
        $status = '<p class="error">Error: Message Was Not Sent.</p>';
    }
}
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <title>Welcome to Olympia Adventure</title>
    <?php include 'inc/head.php'; ?>
</head>

<body>

    <?php include 'connection.php'; ?>
    <?php include 'inc/navbar.php'; ?>



    <main>

        <div class="slider-area">
            <div class="slider-active">
                <div id="carousel" class="carousel slide hero-slides" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li class="active" data-target="#carousel" data-slide-to="0"></li>
                        <li data-target="#carousel" data-slide-to="1"></li>
                        <li data-target="#carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active boat">
                            <div class="container h-100 d-none d-md-block">
                                <div class="row align-items-center h-100">
                                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                                        <div class="caption animated fadeIn">
                                            <h2 class="animated fadeInLeft">Olympia Adventure Camp</h2>
                                            <p class="animated fadeInRight">Plan your adventure <br> Here at Adventure World Camps we promote physical activity and a healthy lifestyle through play and adventure</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item fly">
                            <div class="container h-100 d-none d-md-block">
                                <div class="row align-items-center h-100">
                                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                                        <div class="caption animated fadeIn">
                                            <h2 class="animated fadeInLeft">Olympia Adventure Camp</h2>
                                            <p class="animated fadeInRight">At Adventure World, our staff are selected on their ability, qualifications and enthusiasm to work with young people.We pride ourselves on our staff who are professionally trained by our experienced managers, who have been working with Adventure World for a number of years. This is evident in the consistently outstanding feedback we receive from many of the people we deal with.</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item mou">
                            <div class="container h-100 d-none d-md-block">
                                <div class="row align-items-center h-100">
                                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                                        <div class="caption animated fadeIn">
                                            <h2 class="animated fadeInLeft">Olympia Adventure Camp</h2>
                                            <p class="animated fadeInRight"> Whether you are an experienced outdoor enthusiast, or new to camp life, Adventure Camp will be the highlight of your days!</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
        </div>
        <br>
    </main>
    <div class="About">
        <div class="container">

            <div class="col-12 wow slideInRight" style="text-align:justify;">
                <div class>
                    <h2 style="text-align:center;">About Us</h2>
                    <P style="font-size:20px" class="p-3"> <b>Olympia is the famous adventure camping, is located from Kandy to Matale. It is located in hill of the country. Inside the jungles of Matale there are plenty of camping opportunities which can be coupled with White Water Rafting, Bird Watching, Jungle Walks, River bathing and many adventure activities. If you are looking at an adventure and leisure base close to Central Province, Olympia is THE PLACE. Being so close to Matale if you stay for one night you would be able to do many adventure and leisure activities such as White Water Rafting, Bird Watching, Walking in the Jungle, Bathing in the river, Trekking to Waterfalls, Adventure Jumps and slides in natural ponds, River Expeditions, Rain Forest Walks and Trails, Flat Water Rafting, Waterfall Abseiling, Mountain cycling etc. </b></p>

                    <h2 style="text-align:center;">Location</h2>
                    <P style="font-size:20px" class="p-3"> <b>Our Olympia Adventure Camping main branch is Set in Matale, 30 km from Riverston and situated within Riverstone gap,Sera Waterfall,Sembuwaththa lake,Knuckles mounting,Riverston, Babarakiri Alla,Hunnasful waterfall is situated. If you are a Wildlife lover, you can go on a safari to two of most popular National Parks in Sri Lanka, Pitawala Pathana, The Wasgamuwa National Park, Knuckles Forest Reserve are few places you can explore while enjoying your holiday with Adventure at Olympia Adventure Camping . </b></p>


                    <h2 style="text-align:center;">Contact Us</h2>


                    <?php echo $status; ?>
                    <form action="Index.php" method="post">
                        <p>
                            <label for="fullname"><b>Full Name *:</b></label>
                            <input type="text" name="fullname" id="fullname" required>
                        </p>

                        <p>
                            <label for="email"><b>Email *:</b></label>
                            <input type="email" name="email" id="email" required>
                        </p>

                        <p>
                            <label for="subject"><b>Subject *:</b></label>
                            <input type="text" name="subject" id="subject" required>
                        </p>

                        <p>
                            <label for="message"><b>Message *:</b> </label>
                            <textarea name="message" id="message" cols="30" rows="10" required></textarea>
                        </p>
                        <p>
                            <button type="submit" name="submit">Send Message</button>
                        </p>


                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>

    </form>

    </div>
    </div>
    </div>
    </div>

    <br>
    <br>

    <section class="contact-sections">
       <div class="container-fluid bg">
        <div class="row">
            <div class="col-12">
            <div class="mapouter"><div class="gmap_canvas">
           <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1LaDOLwUH2DRL6F0k7u96ilodGTwpFtCz" width="100%" height="480"></iframe>
            </div>
            </div>
        </div>
    </div>
    </div>
    </section>
   
   <br>
   <br>


    <footer id="dk-footer" class="dk-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <div class="dk-footer-box-info">
                        <a href="index.html" class="footer-logo">
                            <img src="img/logo.png" alt="footer_logo" class="img-fluid">
                        </a>
                        <p class="footer-info-text">
                            Olympia Adventure Camp
                        </p>
                        <div class="footer-social-link">
                            <h3>Follow us</h3>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <div class="footer-awarad">
                        <img src="images/icon/best.png" alt="">

                    </div>
                </div>
                <!-- End Col -->
                <div class="col-md-12 col-lg-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-us">
                                <div class="contact-icon">
                                    <i class="fa fa-map-o" aria-hidden="true"></i>
                                </div>

                                <div class="contact-info">
                                    <h3>Our Address</h3>
                                    <p>123, Kandy Road<br>
                                        Matale<br>
                                        Sri Lanka<br></p>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="contact-us contact-us-last">
                                <div class="contact-icon">
                                    <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                                </div>

                                <div class="contact-info">
                                    <h3>+94 1234 5673</h3>
                                    <p>Give us a call</p>
                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="col-md-12 col-lg-6">
                        <div class="footer-widget">
                            <div class="section-heading">
                                <h3 class="fj">Join with us</h3>
                                <span class="animate-border border-white"></span>
                            </div>
                            <p class="fp">We have been working with Adventure World for a number of years. This is evident in the consistently outstanding feedback we receive from many of the people we deal with.<br>Plan your adventure and enjoy eith us.</p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        </div>

        <div id="part2">
            <p id="txt6"><i class="material-icons tiny"> copyright</i>@ 2021 Olympia Adventure Camp - All right reserved</p>
        </div>


        </div>

        <div id="back-to-top" class="back-to-top">
            <p>Best Adventure Camp Company 2021</p>
        </div>



    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animateCSS/1.2.2/jquery.animatecss.min.js" integrity="sha512-kwz4O9ZHi+MTJEvhjK8qC88n0+J1Hfh3o85NYJAuaZbLffDsrZxMhwi3Htzn3MVrttScMCIFz/O2KEyF9Ho/eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>