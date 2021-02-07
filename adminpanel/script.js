window.addEventListener('load', function(){

	ajax('POST', 'test.php');

});

function ajax(method, url, send=null) {
	let xhr = new XMLHttpRequest();
	
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			let listmenu = JSON.parse(xhr.responseText);
			listmenu.forEach(function(item) {
				document.querySelector('#menu-'+item).style.display = 'block';
			});
			//document.querySelector('.content').innerHTML = xhr.responseText;
		}
	}
	xhr.open(method, url, true);
	xhr.send(send);
}

let tambahproduk = document.querySelector('#tambah-produk');
let kategori = document.querySelector('#kategori');
let satuan = document.querySelector('#satuan');

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

//-------------- TAMBAH PRODUK -----------------------
let formproduk = document.querySelector('#form-produk');

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

//-------------- KAPITAL -----------------------
let kapital = document.querySelector('#kapital');
if (kapital) {
	kapital.addEventListener('keyup', function() {
		let x = document.getElementById("kapital");
		x.value = x.value.toUpperCase();
	});	
}

//-------------- FORM KATEGORI PRODUK -----------------------
let formkategoriproduk = document.querySelector('#form-kategori-produk');
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

/*--------------- Tampil Data ------------------- */
function tampildatakategori() {
	let xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			document.querySelector('.datakategori').innerHTML = xhr.responseText;
		}
	}
	let kirim = 'tampildata=1';
	xhr.open('POST', 'proses-produk.php', true);
	xhr.setRequestHeader('Content-Type', "application/x-www-form-urlencoded");
	xhr.send(kirim);
}

