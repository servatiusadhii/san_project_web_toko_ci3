     <!-- ======= Contact Us Section ======= -->
     <section id="contact" class="contact section-bg">
         <div class="container">

             <div class="section-title">
                 <h2>Contact Us</h2>
                 <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
             </div>

             <div class="row">

                 <div class="col-lg-4 col-md-6">
                     <div class="contact-about">
                         <h3>Toko Online</h3>
                         <p>Cras fermentum odio eu feugiat. Justo eget magna fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
                         <div class="social-links">
                             <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                             <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                             <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
                             <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
                         </div>
                     </div>
                 </div>

                 <div class="col-lg-3 col-md-6">
                     <div class="info">
                         <div>
                             <i class="icofont-google-map"></i>
                             <p>A108 Adam Street<br>New York, NY 535022</p>
                         </div>

                         <div>
                             <i class="icofont-envelope"></i>
                             <p>info@example.com</p>
                         </div>

                         <div>
                             <i class="icofont-phone"></i>
                             <p>+1 5589 55488 55s</p>
                         </div>

                     </div>
                 </div>

                 <div class="col-lg-5 col-md-12">
                     <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                         <div class="form-group">
                             <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                             <div class="validate"></div>
                         </div>
                         <div class="form-group">
                             <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                             <div class="validate"></div>
                         </div>
                         <div class="form-group">
                             <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                             <div class="validate"></div>
                         </div>
                         <div class="form-group">
                             <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                             <div class="validate"></div>
                         </div>
                         <div class="mb-3">
                             <div class="loading">Loading</div>
                             <div class="error-message"></div>
                             <div class="sent-message">Your message has been sent. Thank you!</div>
                         </div>
                         <div class="text-center"><button type="submit">Send Message</button></div>
                     </form>
                 </div>

             </div>

         </div>
     </section><!-- End Contact Us Section -->

     <!-- ======= Map Section ======= -->
     <section class="map">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3024.2219901290355!2d-74.00369368400567!3d40.71312937933185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a23e28c1191%3A0x49f75d3281df052a!2s150%20Park%20Row%2C%20New%20York%2C%20NY%2010007%2C%20USA!5e0!3m2!1sen!2sbg!4v1579767901424!5m2!1sen!2sbg" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
     </section><!-- End Map Section -->

     </main><!-- End #main -->

     <!-- ======= Footer ======= -->
     <footer id="footer">
         <div class="container">
             <div class="copyright">
                 Copyright © SAN Website CodeIgniter 3 <?= date('Y') ?>
             </div>

         </div>
     </footer><!-- End #footer -->

     <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

     <!-- Vendor JS Files -->
     <script src="<?= base_url('vendor/sblanding/') ?>assets/vendor/jquery/jquery.min.js"></script>
     <script src="<?= base_url('vendor/sblanding/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
     <script src="<?= base_url('vendor/sblanding/') ?>assets/vendor/jquery.easing/jquery.easing.min.js"></script>
     <script src="<?= base_url('vendor/sblanding/') ?>assets/vendor/php-email-form/validate.js"></script>
     <script src="<?= base_url('vendor/sblanding/') ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
     <script src="<?= base_url('vendor/sblanding/') ?>assets/vendor/venobox/venobox.min.js"></script>
     <script src="<?= base_url('vendor/sblanding/') ?>assets/vendor/owl.carousel/owl.carousel.min.js"></script>

     <!-- Template Main JS File -->
     <script src="<?= base_url('vendor/sblanding/') ?>assets/js/main.js"></script>

     </body>

     </html>