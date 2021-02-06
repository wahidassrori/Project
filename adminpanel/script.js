let tambahproduk = document.querySelector('#tambah-produk');
let kategori = document.querySelector('#kategori');
let satuan = document.querySelector('#satuan');

tambahproduk.addEventListener('click', function(e){
	e.preventDefault();

	document.querySelector('.tambah-produk').style.display = 'block';
	document.querySelector('.kategori').style.display = 'none';
	document.querySelector('.satuan').style.display = 'none';

});

kategori.addEventListener('click', function(e){
	e.preventDefault();

	//tampildatakategori();

	document.querySelector('.tambah-produk').style.display = 'none';
	document.querySelector('.kategori').style.display = 'block';
	document.querySelector('.satuan').style.display = 'none';

});

satuan.addEventListener('click', function(e){
	e.preventDefault();

	document.querySelector('.tambah-produk').style.display = 'none';
	document.querySelector('.kategori').style.display = 'none';
	document.querySelector('.satuan').style.display = 'block';

});


//-------------- TAMBAH PRODUK -----------------------
let formproduk = document.querySelector('#form-produk');

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
//-------------- KAPITAL -----------------------
let kapital = document.querySelector('#kapital');
kapital.addEventListener('keyup', function() {
	let x = document.getElementById("kapital");
	x.value = x.value.toUpperCase();
});
//-------------- FORM KATEGORI PRODUK -----------------------
let formkategoriproduk = document.querySelector('#form-kategori-produk');
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

/*--------------- Tampil Data ------------------- */
function tampildatakategori() {
	let xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			document.querySelector('.hasil').innerHTML = xhr.responseText;
		}
	}
	let kirim = 'tampildata=1';
	xhr.open('POST', 'proses-produk.php', true);
	xhr.setRequestHeader('Content-Type', "application/x-www-form-urlencoded");
	xhr.send(kirim);
}

document.querySelector('.hasil').innerHTML = tampildatakategori();

