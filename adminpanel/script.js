const containerIndex = document.querySelector('.container-index');

if (containerIndex) {
	window.addEventListener('load', function(){
		userValidation('POST', 'proses-login.php', 'index=1');
	});
}
// HALAMAN USER
/* ----------------------------------------------------------------*/

const HALAMAN_USER = document.querySelector('.halaman-user');
if (HALAMAN_USER) {
	
	makeAJAXCall('proses=data_user', "POST", "proses.php", (response) => {
		document.querySelector('.datauser').innerHTML = response;	
		let buttonEdit = document.querySelectorAll('.user-edit');
		for (let index = 0; index < buttonEdit.length; index++) {
			let buttonEdit = document.querySelectorAll('.user-edit');
			buttonEdit[index].addEventListener('click', () => {
				const id = buttonEdit[index].getAttribute('value');
				makeAJAXCall("proses=edit_user&iduser="+id, 'POST', 'proses.php', (response) => {
					document.querySelector('.data-user').style.display = 'none';
					document.querySelector('.edit-user').style.display = 'block';
					const result = JSON.parse(response);
					console.log(result);			
					let data = `<form id="form-edit-user">
						<div class="pesan pesan-tambah-user"></div>
						<label>Username
							<input type="text" name="username" value="${result.username}" required>
							<input id="iduser" type="hidden" name="iduser" value="${result.iduser}" required>
						</label>
						<label>Password
							<input type="text" name="password" value="${result.password}" required>
						</label>
						<label>Usergrup
							<select name="idusergrup" required>
								<option value="">Pilih Usergrup</option>`;
								let select;
								for (let index = 0; index < result.usergrup.length; index++) {
									if (result.idusergrup == result.usergrup[index].idusergrup) {
										select = 'selected';
									}
									else {
										select = '';
									}
									data += '<option value='+result.usergrup[index].idusergrup+' '+select+' required>'+result.usergrup[index].usergrup+'</option>';
								}

							data +=`</select>
						</label>
						<input type="submit" value="Tambah User">
					</form>`;
					document.querySelector('.edit-user').innerHTML = data;
					submitFormEdit(response => {
						console.log(response);
						makeAJAXCall('proses=data_user', "POST", "proses.php", (response) => {
							document.querySelector('.datauser').innerHTML = response;
						});
					});
				});
			});
		}
		
	});

	function makeAJAXCall(sendData, methodType, url, callback) {
		let xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				callback(xhr.response);
			}
		}
		xhr.open(methodType, url);
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.send(sendData);
	}

	function submitFormEdit(callback) {
		const SubmitFormEditUser = document.querySelector('#form-edit-user');
		SubmitFormEditUser.addEventListener('submit', (e) => {
			e.preventDefault();
			let formData = document.querySelector('#form-edit-user');
			let xhr = new XMLHttpRequest();
			let form = new FormData(formData);
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && xhr.status == 200) {
					callback(xhr.response);
				}
			}
			const iduser = document.querySelector('#iduser').value;
			form.append('proses', 'simpan_edit_user');
			form.append('iduser', iduser);
			xhr.open('POST', 'proses.php');
			xhr.send(form);
		});
	}

	const formTambahUser = document.querySelector('#form-tambah-user');
	formTambahUser.addEventListener('submit', function(event) {
		event.preventDefault();
		
		let xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				if (xhr.responseText == 'error') {
					let pesan = document.querySelector('.pesan-tambah-user');
					pesan.innerHTML = 'Gagal, harap mengubah username dan password!';
					pesan.style.color = 'yellow';
				}
				else if (xhr.responseText === 'sukses') {
					let pesan = document.querySelector('.pesan-tambah-user');
					pesan.innerHTML = 'Data berhasil ditambahkan';
					pesan.style.color = 'green';
					tampilDataUser();
				}
				else
				{
					let pesan = document.querySelector('.pesan-tambah-user');
					pesan.innerHTML = xhr.response;
					pesan.style.color = 'red';
				}
			}
		}
		let formdata = document.querySelector('#form-tambah-user');
		let form = new FormData(formdata);
		form.append('proses', 'tambahuser');
		xhr.open('POST', 'proses.php', true);
		xhr.send(form);

	});
}

const buttonTambahUser = document.querySelector('.tambah-user');
const formLogin = document.querySelector('#form-login');
const tambahproduk = document.querySelector('#tambah-produk');
const kategori = document.querySelector('#kategori');
const satuan = document.querySelector('#satuan');
const formproduk = document.querySelector('#form-produk');
const kapital = document.querySelector('#kapital');
const formkategoriproduk = document.querySelector('#form-kategori-produk');

const useredit = document.querySelector('#user-edit');

if (useredit) {
	useredit.addEventListener('click', function()
	{
		console.log('oke');
		/*
		let xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function(){
			if (xhr.readyState == 4 && xhr.status == 200)
			{
				console.log(xhr.responseText);
			};	
		}
		const iduser = document.querySelesctor('#user-edit').value;
		const send = "proses=dataupdateuser&id="+iduser;
		xhr.open('POST', 'proses.php', true);
		xhr.send(send);
		*/
	});
}

function userValidation(method, url, send=null) {
	let xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			let listmenu = JSON.parse(xhr.responseText);
			listmenu.forEach(function(item) {
				document.querySelector('#menu-'+item).style.display = 'block';
			});
			
		}
	}
	xhr.open(method, url, true);
	xhr.send(send);
}
/*
if (buttonTambahUser) {
	buttonTambahUser.addEventListener('click', function () {
		document.querySelector('#form-tambah-user').style.display = 'block';
	});
}
*/
if (formLogin)
{
	formLogin.addEventListener('submit', function(event) {
		event.preventDefault();
		
		let xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				if (xhr.responseText == 'sukses') {
					window.location.href = 'index.php';
				}
				else {
					document.querySelector('#result').innerHTML = xhr.responseText;
					document.querySelector('#form-login').reset();
				}
			}
		}
		let Login = document.querySelector('#form-login');
		let form = new FormData(Login);
		form.append('proses', 'login');
		xhr.open('POST', 'proses.php', true);
		xhr.send(form);

	});
}

if (tambahproduk) {
	tambahproduk.addEventListener('click', function(e){
		e.preventDefault();

		document.querySelector('.tambah-produk').style.display = 'block';
		document.querySelector('.kategori').style.display = 'none';
		document.querySelector('.satuan').style.display = 'none';

	});	
}

if (kategori) {
	kategori.addEventListener('click', function(e){
		e.preventDefault();

		document.querySelector('.datakategori').innerHTML = tampildatakategori();

		document.querySelector('.tambah-produk').style.display = 'none';
		document.querySelector('.kategori').style.display = 'block';
		document.querySelector('.satuan').style.display = 'none';

	});	
}

if (satuan) {
	satuan.addEventListener('click', function(e){
		e.preventDefault();

		document.querySelector('.tambah-produk').style.display = 'none';
		document.querySelector('.kategori').style.display = 'none';
		document.querySelector('.satuan').style.display = 'block';

	});	
}

if (formproduk) {
	formproduk.addEventListener('submit', function(e) {
		e.preventDefault();

		let ajax = new XMLHttpRequest();
		ajax.onreadystatechange = function() {
			if (ajax.readyState == 4 && ajax.status == 200) {
				alert(ajax.responseText);
			};
		}

		let formproduk = document.querySelector('#form-produk');
		let form = new FormData(formproduk);
		form.append('aksi', 'tambahproduk');

		ajax.open('POST', 'proses-produk.php', true);
		ajax.send(form);
	});	
}

if (kapital) {
	kapital.addEventListener('keyup', function() {
		let x = document.getElementById("kapital");
		x.value = x.value.toUpperCase();
	});	
}

if (formkategoriproduk) {
	formkategoriproduk.addEventListener('submit', function(event) {
		event.preventDefault();

		let xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				alert(xhr.responseText);
				tampildatakategori();
			}	
		}
		let formkategoriproduk = document.querySelector('#form-kategori-produk');
		let formdata = new FormData(formkategoriproduk);
		formdata.append('aksi', 'tambahkategori');
		xhr.open('POST', 'proses-produk.php', true);
		xhr.send(formdata);
		
	});	
}

const datakategori = document.querySelector('.datakategori');
if (datakategori) {
	function tampildatakategori() {
		let xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				const datakategori = document.querySelector('.datakategori');
				datakategori.innerHTML = xhr.responseText;
			}
		}
		let kirim = 'tampildata=1';
		xhr.open('POST', 'proses-produk.php', true);
		xhr.send(kirim);
	}	
}
