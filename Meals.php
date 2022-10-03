<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <head>
    <title>Meals</title>
    <link rel="stylesheet" href="css/meals.css">
    <?php echo include "inc/head.php"; ?>
</head>
<body>

<?php include 'connection.php';?>

<!-- Header-->

<header>
    
    <div class="header-area">

    <?php include "inc/navbar.php"; ?>  

</div>

</header>
   
   

<body>
  <div class="tm-container">
    <div class="tm-row">
      <!-- Site Header -->
      <div class="tm-left">
        <div class="tm-left-inner">
          <div class="tm-site-header">
            <i class="fas fa-coffee fa-3x tm-site-logo"></i>
            <h1 class="tm-site-name">Meals collection</h1>
          </div>
          <nav class="tm-site-nav">
            <ul class="tm-site-nav-ul">
              <li class="tm-page-nav-item">
                <a href="#drink" class="tm-page-link active">
                  <i class="fas fa-mug-hot tm-page-link-icon"></i>
                  <span>Food Menu</span>
                </a>
              </li>
               <li class="tm-page-nav-item">
                <a href="#special" class="tm-page-link">
                  <i class="fas fa-glass-martini tm-page-link-icon"></i>
                  <span>Beverages</span>
                </a>
              </li>
              
            </ul>
          </nav>
        </div>        
      </div>
      <div class="tm-right">
        <main class="tm-main">
          <div id="drink" class="tm-page-content">
           
            <nav class="tm-black-bg tm-drinks-nav">
              <ul>
                <li>
                  <a href="#" class="tm-tab-link active" data-id="cold">Breakfast</a>
                </li>
                <li>
                  <a href="#" class="tm-tab-link" data-id="hot">Lunch</a>
                </li>
                <li>
                  <a href="#" class="tm-tab-link" data-id="juice">Dinner</a>
                </li>
              </ul>
            </nav> 

            <div id="cold" class="tm-tab-content">
              <div class="tm-list">
                <div class="tm-list-item">          
                  <img src="img/bred.jpg" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Bread<span class="tm-list-item-price">$2.50</span></h3>
                    <p class="tm-list-item-description"><ul><li>with egg</li><li>with butter</li><li> with curry</li></ul></p>
                  </div>
                </div>
                <div class="tm-list-item">          
                  <img src="img/milkrice.jpg" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Milk Rice<span class="tm-list-item-price">$2.50</span></h3>
                    <p class="tm-list-item-description">with lunumiris and thalapath fish curry</p>
                  </div>
                </div>
                <div class="tm-list-item">          
                  <img src="img/rotty.jpg" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Coconut rotty<span class="tm-list-item-price">$2.50</span></h3>
                    <p class="tm-list-item-description">with sambol and chicken curry.</p>
                  </div>
                </div>
                <div class="tm-list-item">          
                  <img src="img/strin.jpg" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">String Hoppers<span class="tm-list-item-price">$2.50</span></h3>
                    <p class="tm-list-item-description">with kirimalu curry and Sambol. </p>
                  </div>
                </div> 
                   <div class="tm-list-item">          
                  <img src="img/french.jpg" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">French toast<span class="tm-list-item-price">$2.50</span></h3>
                    <p class="tm-list-item-description"> With cheese</p>
                  </div>
                </div>
                 <div class="tm-list-item">          
                  <img src="img/abcd.jpg" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">sanwitch<span class="tm-list-item-price">$2.50</span></h3>
                    <p class="tm-list-item-description"> <ul><li>Vegitable </li><li>Fish</li><li> Chicken</li></ul></p>
                  </div>
                </div>                     
              </div>
            </div> 

            <div id="hot" class="tm-tab-content">
              <div class="tm-list">
              
                <div class="tm-list-item">          
                  <img src="img/9c.jpg" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Rice and curry<span class="tm-list-item-price">$3.0</span></h3>
                    <p class="tm-list-item-description"> with village curries.</p>              
                  </div>
                </div>
                <div class="tm-list-item">          
                  <img src="img/friedrice.jpeg" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Fried rice<span class="tm-list-item-price">$3.0</span></h3>
                    <p class="tm-list-item-description"><ul><li>egg friderice</li> <li>chicken friderice </li> <li>Vegitable friderice </li> </ul> </p>                    
                  </div>
                </div>
                <div class="tm-list-item">          
                  <img src="img/biriyani.jpg" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">biriyani<span class="tm-list-item-price">$3.0</span></h3>
                    <p class="tm-list-item-description"><ul><li>Egg biriyani</li> <li>chicken biriyani  </li></ul></p>              
                  </div>
                </div>
                <div class="tm-list-item">          
                  <img src="img/nasi.jpg" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Nasigoren<span class="tm-list-item-price">$3.0</span></h3>
                    <p class="tm-list-item-description"> <ul><li>Egg Nasigoren</li> <li>chicken Nasigoren </li> </ul> </p>              
                  </div>
                </div>
                         
              </div>
            </div>

            <div id="juice" class="tm-tab-content">
              <div class="tm-list">
                <div class="tm-list-item">          
                  <img src="img/kottu.jpg" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Kottu<span class="tm-list-item-price">$3.50</span></h3>
                    <p class="tm-list-item-description"><ul><li>cheese kottu</li><li> Egg kottu</li></ul>
                    </p>              
                  </div>
                </div>
                <div class="tm-list-item">          
                  <img src="img/nuddles.jpg" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">noodles<span class="tm-list-item-price">$3.50</span></h3>
                    <p class="tm-list-item-description"><ul><li>Egg Noodless</li> <li> chicken Noodles </li> <li>Vegitable noodles</li>  </ul></p>                    
                  </div>
                </div>
                <div class="tm-list-item">          
                  <img src="img/pasta.jpg" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">pasta<span class="tm-list-item-price">$3.50</span></h3>
                    <p class="tm-list-item-description"> <li>Egg Pasta</li> <li> chicken pasta</li> <li>Vegitable pasta</li>  </ul></p>              
                  </div>
                </div>
                <div class="tm-list-item">          
                  <img src="img/parata.jpg" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">parata<span class="tm-list-item-price">$3.50</span></h3>
                    <p class="tm-list-item-description">with chicken curry</p>              
                  </div>
                </div>              
              </div>
            </div>
           
          </div>
           <div id="special" class="tm-page-content">
            <div class="tm-special-items">
              <div class="tm-black-bg tm-special-item">
                <img src="img/tea.png" alt="Image">
                <div class="tm-special-item-description">
                  <h2 class="tm-text-primary tm-special-item-title"> Morning Drink</h2>
                  <p class="tm-special-item-text">  You can choose Tea or Coffee</p>  
                </div>
              </div>

    </div>      
           <div class="tm-black-bg tm-special-item">
                <img src="img/special-01.jpg" alt="Image">
                <div class="tm-special-item-description">
                  <h2 class="tm-text-primary tm-special-item-title"> Morning Cool Drink</h2>
                  <p class="tm-special-item-text"> You can choose any drink.</p>  
                </div>
              </div>

              <div class="tm-black-bg tm-special-item">
                <img src="img/special-02.jpg" alt="Image">
                <div class="tm-special-item-description">
                  <h2 class="tm-text-primary tm-special-item-title"> Bun</h2>
                  <p class="tm-special-item-text"> Before the lunch there is some snack for you.</p>  
                </div>
              </div>
              
              <div class="tm-black-bg tm-special-item">
                <img src="img/special-04.jpg" alt="Image">
                <div class="tm-special-item-description">
                  <h2 class="tm-text-primary tm-special-item-title">Evening Special </h2>
                  <p class="tm-special-item-text"> There is some special thing for you with Evening tea</p>  
                </div>
              </div>      
              <div class="tm-black-bg tm-special-item">
                <img src="img/ev.png" alt="Image">
                <div class="tm-special-item-description">
                  <h2 class="tm-text-primary tm-special-item-title"> Evening Tea</h2>
                  <p class="tm-special-item-text"> There is a special fresh tea for you</p>  
                </div>
              </div>
                                 
            </div>            
          </div>
   </div>      
    
    
  <!video>
  <div class="tm-video-wrapper">
      <i id="tm-video-control-button" class="fas fa-pause"></i>
      <video autoplay muted loop id="tm-video">
          <source src="video/wave-cafe-video-bg.mp4" type="video/mp4">
      </video>
  </div>

  <script src="js/jquery-3.4.1.min.js"></script>    
  <script>

    function setVideoSize() {
      const vidWidth = 1920;
      const vidHeight = 1080;
      const windowWidth = window.innerWidth;
      const windowHeight = window.innerHeight;
      const tempVidWidth = windowHeight * vidWidth / vidHeight;
      const tempVidHeight = windowWidth * vidHeight / vidWidth;
      const newVidWidth = tempVidWidth > windowWidth ? tempVidWidth : windowWidth;
      const newVidHeight = tempVidHeight > windowHeight ? tempVidHeight : windowHeight;
      const tmVideo = $('#tm-video');

      tmVideo.css('width', newVidWidth);
      tmVideo.css('height', newVidHeight);
    }

    function openTab(evt, id) {
      $('.tm-tab-content').hide();
      $('#' + id).show();
      $('.tm-tab-link').removeClass('active');
      $(evt.currentTarget).addClass('active');
    }    

    function initPage() {
      let pageId = location.hash;

      if(pageId) {
        highlightMenu($(`.tm-page-link[href^="${pageId}"]`)); 
        showPage($(pageId));
      }
      else {
        pageId = $('.tm-page-link.active').attr('href');
        showPage($(pageId));
      }
    }

    function highlightMenu(menuItem) {
      $('.tm-page-link').removeClass('active');
      menuItem.addClass('active');
    }

    function showPage(page) {
      $('.tm-page-content').hide();
      page.show();
    }

    $(document).ready(function(){

      
      initPage();

      $('.tm-page-link').click(function(event) {
        
        if(window.innerWidth > 991) {
          event.preventDefault();
        }

        highlightMenu($(event.currentTarget));
        showPage($(event.currentTarget.hash));
      });

      
      

      $('.tm-tab-link').on('click', e => {
        e.preventDefault(); 
        openTab(e, $(e.target).data('id'));
      });

      $('.tm-tab-link.active').click(); // Open default tab


      
      setVideoSize();

      // Set video background size based on window size
      let timeout;
      window.onresize = function(){
        clearTimeout(timeout);
        timeout = setTimeout(setVideoSize, 100);
      };

           
      const btn = $("#tm-video-control-button");

      btn.on("click", function(e) {
        const video = document.getElementById("tm-video");
        $(this).removeClass();

        if (video.paused) {
          video.play();
          $(this).addClass("fas fa-pause");
        } else {
          video.pause();
          $(this).addClass("fas fa-play");
        }
      });
    });
      
  </script>
</body>
</html>