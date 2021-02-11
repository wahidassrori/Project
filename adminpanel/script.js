const containerIndex = document.querySelector('.container-index');

if (containerIndex) {
	window.addEventListener('load', function(){
		userValidation('POST', 'proses-login.php', 'index=1');
	});
}

const halamanUser = document.querySelector('.halaman-user');

if (halamanUser) {
	tampilDataUser();
	//let buttonEdit = document.querySelectorAll('.user-edit');
	//for (let i = 0; i < buttonEdit.length; i++) {
	//	console.log('oke');
	//}
}
//const dataUser = document.querySelector('.datauser');
//if (dataUser) {
	function tampilDataUser() {
		let xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				let json = JSON.parse(xhr.responseText);
				json.username.forEach(function(value) {
					document.querySelector('.datauser').innerHTML = value;	
				});
				//document.querySelector('.datauser').innerHTML = json.username;
				//console.log('oke');
			}
		}
		const kirim = 'proses=datauser';
		//const kirim = {
	//		proses : 'datauser'
	//	};
		xhr.open('POST', 'proses.php', true);
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//x-www-form-urlencoded
		xhr.send(kirim);
	}
//}


const buttonTambahUser = document.querySelector('.tambah-user');
const formLogin = document.querySelector('#form-login');
const tambahproduk = document.querySelector('#tambah-produk');
const kategori = document.querySelector('#kategori');
const satuan = document.querySelector('#satuan');
const formproduk = document.querySelector('#form-produk');
const kapital = document.querySelector('#kapital');
const formkategoriproduk = document.querySelector('#form-kategori-produk');
const formtambahuser = document.querySelector('#form-tambah-user');
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

if (formtambahuser)
{
	formtambahuser.addEventListener('submit', function(event) {
		event.preventDefault();
		
		let xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				if (xhr.responseText == 'sukses')
				{
					let pesan = document.querySelector('.pesan-tambah-user');
					pesan.innerHTML = 'Data berhasil ditambahkan';
					pesan.style.color = 'green';
				}
				else
				{
					let pesan = document.querySelector('.pesan-tambah-user');
					pesan.innerHTML = "Tambah data error!";
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
