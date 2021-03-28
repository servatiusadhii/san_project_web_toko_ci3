<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php
            $grand_total = 0;
            if ($keranjang = $this->cart->contents()) {
                foreach ($keranjang as $item) {
                    $grand_total = $grand_total + $item['subtotal'];
                }

            ?>


                <h3>Input Alamat Pengiriman dan Pembayaran</h3>

                <form action="<?php echo base_url('carting/proses_pesanan'); ?>" method="post">

                    <div class="form-group">
                        <label>Consignee from</label>
                        <input type="text" name="nama" class="form-control" readonly value="<?= $user['name']; ?>">
                        <?php echo form_error('nama', '<div class="text-danger small ml-2">', '</div>'); ?>
                    </div>

                    <div class="form-group">
                        <label>Shipping to</label>
                        <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
                        <?php echo form_error('alamat', '<div class="text-danger small ml-2">', '</div>'); ?>
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="no_telp" placeholder="Nomor Telepon Lengkap Anda" class="form-control">
                        <?php echo form_error('no_telp', '<div class="text-danger small ml-2">', '</div>'); ?>
                    </div>

                    <div class="form-group">
                        <label>Total Pembayaran</label>
                        <input type="text" name="no_telp" placeholder="Nomor Telepon Lengkap Anda" class="form-control" readonly value="Rp. <?= number_format($grand_total, 0, ',', '.') ?>">
                        <?php echo form_error('no_telp', '<div class="text-danger small ml-2">', '</div>'); ?>
                    </div>

                    <div class="form-group">
                        <label>Jasa Pengiriman</label>
                        <select name="kurir" class="form-control">
                            <option>-Pilih Jasa Pengiriman-</option>
                            <option>JNE</option>
                            <option>TIKI</option>
                            <option>POS Indonesia</option>
                            <option>GOJEK</option>
                            <option>GRAB</option>
                        </select>
                        <?php echo form_error('kurir', '<div class="text-danger small ml-2">', '</div>'); ?>
                    </div>

                    <div class="form-group">
                        <label>Pilih BANK</label>
                        <select name="bank" class="form-control">
                            <option>-Bank Payment-</option>
                            <option>BCA - XXXXXXXX</option>
                            <option>BNI - XXXXXXXX</option>
                            <option>BRI - XXXXXXXX</option>
                            <option>MANDIRI - XXXXXXXX</option>
                        </select>
                        <?php echo form_error('bank', '<div class="text-danger small ml-2">', '</div>'); ?>
                    </div>

                    <button type="submit" class="btn btn-md btn-success my-2 float-right">Pesan Sekarang</button>

                </form>

            <?php
            } else {
                echo "<h4>Keranjang Belanja Anda Masih Kosong";
            }
            ?>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>