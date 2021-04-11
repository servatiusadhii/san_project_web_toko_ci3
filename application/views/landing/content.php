<!-- ======= Hero Section ======= -->
 <section id="hero">
     <div class="hero-container">
         <h1>Welcome to Toko Online</h1>
         <h2>This Project Website still under construction. Feel Free to Use and Develop it</h2>
         <a href="#about" class="btn-get-started scrollto">Get Started</a>
     </div>
 </section><!-- #hero -->

 <main id="main">
     <!-- ======= Our Product Section ======= -->

     <section id="team" class="team">
         <div class="container">

             <div class="section-title">
                 <h2>Our Product</h2>
                 <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
             </div>

             <div class="row">
                 <?php foreach ($barang as $brg) : ?>
                     <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                         <div class="member">
                             <img src="<?= base_url('/assets/uploads/') . $brg->gambar ?>" alt="">
                             <h4><?php echo $brg->nama_brg ?></h4>
                             <span><?= $brg->kategori ?></span>
                             <p>
                                 <?= $brg->keterangan ?>
                             </p>
                             <span class="badge badge-success py-2 mx-4">Rp. <?php echo number_format($brg->harga), '' ?></span>

                             <hr>
                             <div class="social">
                                 <a href=""></a>
                                 <a href="<?=base_url('carting/tambah_ke_keranjang/').  $brg->id_brg?>" alt="">
                                 <i class="icofont-shopping-cart pr-3"></i></a>

                                 <a href="<?=base_url('carting/detail/').  $brg->id_brg?>"><i class="icofont-listine-dots"></i></a>
                             </div>
                         </div>
                     </div>
                 <?php endforeach; ?>

                 

             </div>

         </div>
     </section><!-- End Our Product Section -->