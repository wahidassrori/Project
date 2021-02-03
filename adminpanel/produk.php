<?php require "header.php"; ?>

<div class="content-menu-produk">

    <h2>Menu Produk</h2>

    <div class="line"></div>

    <div class="menu-produk">
        <ul>
            <li><a href="#" id="tambah-produk">Tambah Produk</a></li>
            <li><a href="" id="kategori">Kategori</a></li>
            <li><a href="" id="satuan">Satuan</a></li>
        </ul>
    </div>

    <div class="kategori">ini kategori</div>
    <div class="satuan">ini satuan</div>
    <div class="tambah-produk">
        <div class="content-produk">
            <h3>~ Tambah Produk ~</h3>
            <form action="" method="POST">
                <div class="left">
                    <label for="kodeproduk" id="label-atas">Kode
                        <input type="text" name="kodeproduk" placeholder="Kode Produk">
                    </label>
                    <label for="nama produk">Nama Produk
                        <input type="text" name="namaproduk" placeholder="Nama Produk">
                    </label>
                    <label for="kategori">Kategori
                        <select name="kategori" id="kategori">
                            <option value="">Kategori</option>
                            <option value="kategori 1">Kategori 1</option>
                            <option value="kategori 2">Kategori 2</option>
                            <option value="kategori 3">Kategori 3</option>
                        </select>
                    </label>
                    <label for="satuan">Satuan
                        <select name="satuan" id="satuan">
                            <option value="">Satuan</option>
                            <option value="Satuan 1">Satuan 1</option>
                            <option value="Satuan 2">Satuan 2</option>
                            <option value="Satuan 3">Satuan</option>
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
                            <option value="supplier 1">Supplier 1</option>
                            <option value="supplier 2">Supplier 2</option>
                            <option value="supplier 3">Supplier 3</option>
                        </select>
                    </label>
                    <label for="jumlahproduk">Jumlah
                        <input type="number" name="jumlah" placeholder="Jumlah Produk">
                    </label>
                    <label for="gudang">Gudang
                        <select name="gudang" id="gudang">
                            <option value="">Gudang</option>
                            <option value="Gudang 1">Gudang 1</option>
                            <option value="Gudang 2">Gudang 2</option>
                            <option value="Gudang 3">Gudang 3</option>
                        </select>
                    </label>
                    <input type="submit" value="Simpan">
                </div>
                
            </form>
        </div>
    </div>
</div>

<?php require "footer.php"; ?>