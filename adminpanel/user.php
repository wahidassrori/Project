<?php require "header.php" ?>

<div class="content">
	<h2>Menu User</h2>
	<div class="line"></div>
	<div class="menu-content">
		<ul>
			<li id="data-user">Data User</li>
			<li id="tambah-user">Tambah User</li>
			<li id="tambah-usergrup">Tambah Usergrup</li>
			<li id="akses">Akses</li>
		</ul>
	</div>

	<div class="halaman-user">
		<!--<button class="button button1 tambah-user">Tambah User</button>-->
		<div class="data-user">
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
		<div class="tambah-user">
			<form id="form-tambah-user">
				<div class="pesan pesan-tambah-user"></div>
				<label>Username
					<input type="text" name="username" required>
				</label>
				<label>Password
					<input type="text" name="password" required>
				</label>
				<label>Usergrup
					<select name="idusergrup" required>
						<option value="">Pilih Usergrup</option>
						<?php

						$query = mysqli_query($mysqli, "SELECT idusergrup, usergrup FROM usergrup");
						while ($rows = mysqli_fetch_assoc($query)) {
							echo '<option value="' . $rows['idusergrup'] . '">' . $rows['usergrup'] . '</option>';
						}

						?>
					</select>
				</label>
				<input type="submit" value="Tambah User">
				
			</form>
		</div>
		<div class="edit-user">
			<form id="form-edit-user">
				<div class="pesan pesan-tambah-user"></div>
				<label>Username
					<input type="text" name="username" required>
				</label>
				<label>Password
					<input type="text" name="password" required>
				</label>
				<label>Usergrup
					<select name="idusergrup" required>
						<option value="">Pilih Usergrup</option>
						<?php

						$query = mysqli_query($mysqli, "SELECT idusergrup, usergrup FROM usergrup");
						while ($rows = mysqli_fetch_assoc($query)) {
							echo '<option value="' . $rows['idusergrup'] . '">' . $rows['usergrup'] . '</option>';
						}

						?>
					</select>
				</label>
				<input type="submit" value="Tambah User">
			</form>
		</div>
		<div class="tambah-usergrup">
			tambah usergrup
		</div>
		<div class="edit-usergrup">
			tambah usergrup
		</div>
		<div class="akses">
			akses
		</div>
	</div>
</div>

<script type="text/javascript">
	const datauser = document.querySelector('#data-user');
	const tambahuser = document.querySelector('#tambah-user');
	const tambahusergrup = document.querySelector('#tambah-usergrup');
	const akses = document.querySelector('#akses');

	datauser.addEventListener('click', function(e) {
		e.preventDefault();
		document.querySelector('.data-user').style.display = 'block';
		document.querySelector('.tambah-user').style.display = 'none';
		document.querySelector('.tambah-usergrup').style.display = 'none';
		document.querySelector('.akses').style.display = 'none';
	})

	tambahuser.addEventListener('click', function(e) {
		e.preventDefault();
		document.querySelector('.data-user').style.display = 'none';
		document.querySelector('.tambah-user').style.display = 'block';
		document.querySelector('.tambah-usergrup').style.display = 'none';
		document.querySelector('.akses').style.display = 'none';
	})

	tambahusergrup.addEventListener('click', function(e) {
		e.preventDefault();
		document.querySelector('.data-user').style.display = 'none';
		document.querySelector('.tambah-user').style.display = 'none';
		document.querySelector('.tambah-usergrup').style.display = 'block';
		document.querySelector('.akses').style.display = 'none';
	})

	akses.addEventListener('click', function(e) {
		e.preventDefault();
		document.querySelector('.data-user').style.display = 'none';
		document.querySelector('.tambah-user').style.display = 'none';
		document.querySelector('.tambah-usergrup').style.display = 'none';
		document.querySelector('.akses').style.display = 'block';
	})
</script>

<?php require "footer.php" ?>