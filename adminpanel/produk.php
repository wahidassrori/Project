<?php require "header.php"; ?>

<div class="content-menu-produk">

    <h2>Menu Produk</h2>

    <div class="line"></div>

    <div class="menu-produk">
        <ul>
            <li><a href="" id="tambah-produk">Tambah Produk</a></li>
            <li><a href="" id="kategori">Kategori</a></li>
            <li><a href="" id="satuan">Satuan</a></li>
        </ul>
    </div>

    <div class="kategori">ini kategori</div>
    <div class="satuan">ini satuan</div>
    <div class="tambah-produk">
        <div class="content-produk">
            <h3>~ Tambah Produk ~</h3>
            <form id="#form-tambah-produk">
                <div class="left">
                    <label for="kodeproduk" id="label-atas">Kode
                        <input type="text" name="kodeproduk" id="kodeproduk" placeholder="Kode Produk">
                    </label>
                    <label for="produk">Nama Produk
                        <input type="text" name="produk" id="produk" placeholder="Nama Produk">
                    </label>
                    <label for="kategori">Kategori
                        <select name="kategori" id="kategori">
                            <option value="">Pilih Kategori</option>
                            <?php 
                                $result = mysqli_query($mysqli, "SELECT * FROM kategori");
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    echo '<option value="'.$rows['kodekategori'].'">'.$rows['kategori'].'</option>';
                                }
                            ?>
                        </select>
                    </label>
                    <label for="satuan">Satuan
                        <select name="satuan" id="satuan">
                            <option value="">Satuan</option>
                            <?php 
                                $result = mysqli_query($mysqli, "SELECT * FROM satuan");
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    echo '<option value="'.$rows['kodesatuan'].'">'.$rows['satuan'].'</option>';
                                }
                            ?>
                        </select>
                    </label>
                    <label for="berat">Berat
                        <input type="number" name="berat" placeholder="Berat satuan gram">
                    </label>
                </div>
                <div class="right">
                    <label for="hargabeli">Harga Beli
                        <input type="text" name="hargabeli" placeholder="Harga Beli">
                    </label>
                    <label for="hargajual">Harga Jual
                        <input type="text" name="hargajual" placeholder="Harga Jual">
                    </label>
                    <label for="supplier">Supplier
                        <select name="supplier" id="supplier">
                            <option value="">Supplier</option>
                            <?php 
                                $result = mysqli_query($mysqli, "SELECT * FROM supplier");
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    echo '<option value="'.$rows['kodesupplier'].'">'.$rows['supplier'].'</option>';
                                }
                            ?>
                        </select>
                    </label>
                    <label for="jumlahproduk">Jumlah
                        <input type="number" name="jumlah" placeholder="Jumlah Produk">
                    </label>
                    <label for="gudang">Gudang
                        <select name="gudang" id="gudang">
                            <option value="">Gudang</option>
                            <?php 
                                $result = mysqli_query($mysqli, "SELECT * FROM gudang");
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    echo '<option value="'.$rows['kodegudang'].'">'.$rows['gudang'].'</option>';
                                }
                            ?>
                        </select>
                    </label>
                    <input type="submit" value="Simpan">
                </div>
                
            </form>
        </div>
    </div>

    <div class="data-produk">
        <div class="pesan"></div>

    </div>

</div>

<?php require "footer.php"; ?>