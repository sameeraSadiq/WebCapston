<?php require_once('./config.php'); ?>
<?php require('./home/master/header.php')?>

<!-- contact section start -->
<div class="contact_section layout_padding">
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <h1 class="contact_taital">Get In Touch</h1>
            <div class="bulit_icon"><img src="./home/assets/images/bulit-icon.png"></div>
         </div>
      </div>
   </div>
   <div class="container-fluid">
      <div class="contact_section_2">
         <div class="row">
            <div class="col-md-12">
               <div class="mail_section_1">
                  <input type="text" class="mail_text" placeholder="Your Name" name="Your Name">
                  <input type="text" class="mail_text" placeholder="Your Email" name="Your Email">
                  <input type="text" class="mail_text" placeholder="Your Phone" name="Your Phone">
                  <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
                  <div class="send_bt"><a href="#">SEND</a></div>
               </div>
            </div>
            <div class="map_main">
               <div class="map-responsive">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d184551.9112932503!2d-79.54321079020029!3d43.71837046438041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d4cb90d7c63ba5%3A0x323555502ab4c477!2sToronto%2C%20ON%2C%20Canada!5e0!3m2!1sen!2s!4v1737319166439!5m2!1sen!2s" width="1600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- contact section end -->

<?php require('./home/master/footer.php')?>