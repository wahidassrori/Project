<?php require "header.php" ?>

<div class="content">
	<h2>Menu User</h2>
	<div class="line"></div>
	<div class="menu-content">
		<ul>
			<li><a href="" id="tambah-produk">Tambah Produk</a></li>
			<li><a href="" id="kategori">Kategori</a></li>
			<li><a href="" id="satuan">Satuan</a></li>
		</ul>
	</div>

	<div class="halaman-user">
		<button class="button button1 tambah-user">Tambah User</button>
		<form id="form-tambah-user">
			<label>Username
				<input type="text" name="username">
			</label>
			<label>Password
				<input type="password" name="password">
			</label>
			<label>Usergrup
				<select name="usergrup">
					<option value="">Usergrup</option>
				</select>
			</label>
			<input type="submit" value="Tambah User">
		</form>
		<table>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Password</th>
                <th>Usergrup</th>
                <th>Opsi</th>
            </tr>
            <tbody class="datauser">       
            </tbody>
        </table>
	</div>
</div>

<?php require "footer.php" ?>