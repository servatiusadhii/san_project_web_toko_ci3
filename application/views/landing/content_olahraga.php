<!-- ======= Hero Section ======= -->
 <section id="hero">
     <div class="hero-container">
         <h1>Welcome to Toko Online</h1>
         <h2>This Project Website still under construction. Feel Free to Use and Develop it</h2>
         <a href="#team" class="btn-get-started scrollto">Start Shopping Now</a>
     </div>
 </section><!-- #hero -->

 <main id="main">
     <!-- ======= Our Product Section ======= -->

     <section id="team" class="team">
         <div class="container">

             <div class="section-title">

             <div class="subtitle">
                <i class="icofont-prestashop" style="font-size: 35px;">&nbsp;Our Product</i>
                 </div>
                 <br>
                 
                 <p>Tokonline ini merupakan salah satu website jual beli online di Indonesia yang perkembangannya cepat dan memiliki tujuan untuk menyelesaikan tugas Praktikum LAB-TI Universitas Gunadarma dan memudahkan setiap pelanggan di Indonesia, agar dapat melakukan aneka transaksi jual beli secara online. 
                     Selain itu kamu dapat menikmati proses pembelian produk lebih mudah dan efisien.<span><b>Yuk cek katalog produk dibawah ini:</b></span></p>
             </div>
            
             <h6 class="pb-2">Kategori : <?=$category?></h6>
             <div class="row">
                 <?php foreach ($olahraga as $brg) : ?>
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