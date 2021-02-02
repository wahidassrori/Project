<?php require "header.php"; ?>

<div class="content">

    <h2>Menu Produk</h2>

    <div class="content-produk">
        <form action="" method="POST">
            <div class="left">
                <label for="kodeproduk" id="label-atas">Kode
                    <input type="text" name="kodeproduk" placeholder="Kode Produk">
                </label>
                <label for="nama produk">Nama Produk
                    <input type="text" name="namaproduk" placeholder="Nama Produk">
                </label>
                <label for="kategoriproduk">Kategori Produk
                    <select name="kategoriproduk" id="kategoriproduk">
                        <option value="">Kategori Produk</option>
                        <option value="kategori 1">Kategori 1</option>
                        <option value="kategori 2">Kategori 2</option>
                        <option value="kategori 3">Kategori 3</option>
                        <option value="tambahkategori">Tambah Kategori</option>
                    </select>
                </label>
                <label for="berat">Berat
                    <input type="number" name="berat" placeholder="Berat satuan gram">
                </label>
            </div>
            <div class="right">
                <label for="harga">Harga
                    <input type="text" name="harga" placeholder="Harga">
                </label>
                <label for="supplier">Supplier
                    <select name="supplier" id="supplier">
                        <option value="">Supplier</option>
                        <option value="supplier 1">Supplier 1</option>
                        <option value="supplier 2">Supplier 2</option>
                        <option value="supplier 3">Supplier 3</option>
                        <option value="tambahsupplier">Tambah Supplier</option>
                    </select>
                </label>
                <label for="jumlahproduk">Jumlah
                    <input type="number" name="jumlah" placeholder="Jumlah Produk">
                </label>
                <input type="submit" value="Simpan">
            </div>
            
        </form>
    </div>
</div>

<?php require "footer.php"; ?>