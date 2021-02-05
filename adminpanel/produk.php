<?php require "header.php"; ?>

<div class="content">

    <h2>Menu Produk</h2>

    <div class="line"></div>

    <div class="menu-content">
        <ul>
            <li><a href="" id="tambah-produk">Tambah Produk</a></li>
            <li><a href="" id="kategori">Kategori</a></li>
            <li><a href="" id="satuan">Satuan</a></li>
        </ul>
    </div>

    
    <div class="kategori">
        <form id="form-kategori-produk">
            <label>Kode Kategori
                <input type="text" name="kodekategori" id="kapital" placeholder="Kode Kategori" required>
            </label>
            <label>Kategori
                <input type="text" name="kategori" placeholder="Kategori" required>
            </label>
            <input type="submit" value="Tambah Kategori">
        </form>

        <table>
            <tr>
                <th>No</th>
                <th>Kode Kategori</th>
                <th>Kategori</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Opsi</th>
            </tr>

            <tr>
                <?php 
                
                $result = mysqli_query($mysqli, "SELECT * FROM kategori");
                $no = 0;
                while ($rows = mysqli_fetch_assoc($result)) {
                    $no++;
                    echo '<td>'.$no.'</td>';
                    echo '<td>'.$rows['kodekategori'].'</td>';
                    echo '<td>'.$rows['kategori'].'</td>';
                    echo '<td>'.$rows['tanggal'].'</td>';
                    echo '<td>'.$rows['statuskategori'].'</td>';
                    echo '<td>update/delete</td>';
                    echo '</tr>';
                }

                ?>

            </table>

        </div>


        <div class="satuan">ini satuan</div>


        <div class="tambah-produk">
            <div class="content-produk">

                <h3>~ Tambah Produk ~</h3>

                <div class="pesan"></div>

                <form id="form-i-produk">
                    <div class="left">
                        <label for="kodeproduk" id="label-atas">Kode
                            <input type="text" name="kodeproduk" id="kodeproduk" placeholder="Kode Produk" required>
                        </label>
                        <label for="produk">Nama Produk
                            <input type="text" name="produk" id="produk" placeholder="Nama Produk" required>
                        </label>
                        <label for="kategori">Kategori
                            <select name="kategori" id="kategori-produk" required>
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
                            <select name="satuan" id="satuan-produk">
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
                            <input type="number" name="berat" id="berat" placeholder="Berat satuan gram">
                        </label>
                    </div>
                    <div class="right">
                        <label for="harga">Harga
                            <input type="text" name="harga" id="harga" placeholder="Harga">
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
                        <label for="qty">Qty
                            <input type="number" name="qty" id="qty" placeholder="Qty">
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

    </div>

    <?php require "footer.php"; ?>