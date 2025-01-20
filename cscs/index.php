<?php require_once('config.php'); ?>
<?php require('./home/master/header.php')?>

<!-- banner section start --> 
<div class="banner_section layout_padding">
   <div class="container">
      <div id="banner_slider" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <?php 
               $qry = $conn->query("SELECT * FROM `slideshow_list` WHERE `status` = 1 ORDER BY `name` ASC");
               $isFirst = true; // Flag to set the first slide as active
               while ($row = $qry->fetch_assoc()):
                  $imagePath = base_url . "uploads/slideshow/" . $row['image'];
                  if (!empty($row['image']) && file_exists($_SERVER['DOCUMENT_ROOT'] . "/cscs/uploads/slideshow/" . $row['image'])):
               ?>
               <div class="carousel-item <?= $isFirst ? 'active' : '' ?>">
                  <div class="row">
                     <div class="col-md-6">
                           <div class="banner_img">
                              <img src="<?= htmlspecialchars($imagePath, ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') ?>">
                           </div>
                     </div>
                     <div class="col-md-6">
                           <div class="banner_taital_main">
                              <h1 class="banner_taital"><?= htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') ?></h1>
                              <h5 class="tasty_text">Tasty Of DayCafe</h5>
                              <p class="banner_text"><?= htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8') ?></p>
                              <div class="btn_main">
                              </div>
                           </div>
                     </div>
                  </div>
               </div>
               <?php 
                  $isFirst = false; // Set flag to false after the first iteration
                  endif;
               endwhile;
            ?>
         </div>
         <a class="carousel-control-prev" href="#banner_slider" role="button" data-slide="prev">
         <i class="fa fa-arrow-left"></i>
         </a>
         <a class="carousel-control-next" href="#banner_slider" role="button" data-slide="next">
         <i class="fa fa-arrow-right"></i>
         </a>
      </div>
   </div>
</div>
<!-- banner section end -->

<!-- coffee section start -->
<div class="coffee_section layout_padding">
   <div class="container">
            <div class="row">
               <h1 class="coffee_taital">OUR Coffee OFFER</h1>
               <div class="bulit_icon"><img src="./home/assets/images/bulit-icon.png"></div>
            </div>
   </div>
   <div class="coffee_section_2">
      <div id="main_slider" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <?php 
               $qry = $conn->query("SELECT * FROM `slideshow_list` WHERE `status` = 1 ORDER BY `name` ASC");
               $slides = [];
               $currentSlide = [];
               // Group items into sets of 4
               while ($row = $qry->fetch_assoc()) {
                  $imagePath = base_url . "uploads/slideshow/" . $row['image'];
                  if (!empty($row['image']) && file_exists($_SERVER['DOCUMENT_ROOT'] . "/cscs/uploads/slideshow/" . $row['image'])) {
                     $row['imagePath'] = $imagePath;
                     $currentSlide[] = $row;
                     if (count($currentSlide) == 4) {
                           $slides[] = $currentSlide;
                           $currentSlide = [];
                     }
                  }
               }
               // Add the remaining items to a slide
               if (!empty($currentSlide)) {
                  $slides[] = $currentSlide;
               }
            ?>
            <div id="carouselExample" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <?php foreach ($slides as $index => $slideItems): ?>
                  <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                        <div class="container-fluid">
                           <div class="row">
                              <?php foreach ($slideItems as $item): ?>
                              <div class="col-lg-3 col-md-6">
                                    <div class="coffee_img">
                                       <img src="<?= htmlspecialchars($item['imagePath'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') ?>">
                                    </div>
                                    <h3 class="types_text"><?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                                    <p class="looking_text"><?= htmlspecialchars($item['description'], ENT_QUOTES, 'UTF-8') ?></p>
                                    <div class="read_bt"><a href="#">Read More</a></div>
                              </div>
                              <?php endforeach; ?>
                           </div>
                        </div>
                  </div>
                  <?php endforeach; ?>
               </div>
               <!-- Carousel Controls -->
               <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
               </a>
            </div>
         </div>
         <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
         <i class="fa fa-arrow-left"></i>
         </a>
         <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
         <i class="fa fa-arrow-right"></i>
         </a>
      </div>
   </div>
</div>
<!-- coffee section end -->


<!-- client section start -->
<div class="client_section layout_padding">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1 class="about_taital">What syas customers</h1>
            <div class="bulit_icon"><img src="./home/assets/images/bulit-icon.png"></div>
         </div>
      </div>
      <div class="client_section_2">
         <div class="client_taital_main">
            <div class="client_left">
               <div class="client_img"><img src="./home/assets/images/client-img1.png"></div>
            </div>
            <div class="client_right">
               <h3 class="moark_text">Joy Moark</h3>
               <p class="client_text">now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancynow use Lorem Ipsum as their default model text, </p>
            </div>
         </div>
         <div class="client_taital_main">
            <div class="client_left">
               <div class="client_img"><img src="./home/assets/images/client-img2.png"></div>
            </div>
            <div class="client_right">
               <h3 class="moark_text">Mihacal</h3>
               <p class="client_text">now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancynow use Lorem Ipsum as their default model text, </p>
            </div>
         </div>
         <div class="client_taital_main">
            <div class="client_left">
               <div class="client_img"><img src="./home/assets/images/client-img3.png"></div>
            </div>
            <div class="client_right">
               <h3 class="moark_text">Uliya den</h3>
               <p class="client_text">now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancynow use Lorem Ipsum as their default model text, </p>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- client section end -->

<?php require('./home/master/footer.php')?>