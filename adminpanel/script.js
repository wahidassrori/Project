
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

	document.querySelector('.tambah-produk').style.display = 'none';
	document.querySelector('.kategori').style.display = 'block';
	document.querySelector('.satuan').style.display = 'none';

	let xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			alert(xhr.responseText);
		}	
	}
	let formdata = 'tampildata=1';
	xhr.open('POST', 'proses-produk.php', true);
	xhr.send(formdata);

});

satuan.addEventListener('click', function(e){
	e.preventDefault();

	document.querySelector('.tambah-produk').style.display = 'none';
	document.querySelector('.kategori').style.display = 'none';
	document.querySelector('.satuan').style.display = 'block';

});


let formtambahproduk = document.querySelector('#form-i-produk');

formtambahproduk.addEventListener('submit', function(e) {
	e.preventDefault();

	let ajax = new XMLHttpRequest();

	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			//let result = JSON.parse(ajax.responseText);
			alert(ajax.responseText);
			/*
			if (ajax.responseText == 'sukses') {
				document.querySelector('.pesan').innerHTML = "Tambah data berhasil...";
				document.querySelector('#form-i-produk').reset();
				setTimeout(function() {
					document.querySelector('.pesan').innerHTML = '';
				}, 2000);
			} else {
				document.querySelector('.pesan').innerHTML = ajax.responseText;
			}*/
		}
	};
	/*
	let kodeproduk = document.querySelector('#kodeproduk').value;
	let produk = document.querySelector('#produk').value;
	let kategori = document.querySelector('#kategori-produk').value;
	let satuan = document.querySelector('#satuan-produk').value;
	let berat = document.querySelector('#berat').value;
	let harga = document.querySelector('#harga').value;
	let supplier = document.querySelector('#supplier').value;
	let qty = document.querySelector('#qty').value;
	let gudang = document.querySelector('#gudang').value;
	
	let data = 'kodeproduk='+kodeproduk+'&produk='+produk+
				'&kategori='+kategori+'&satuan='+satuan+'&berat='+berat+'&harga='+harga+
				'&supplier='+supplier+'&qty='+qty+'&gudang='+gudang;

				*/
				let formtp = document.querySelector('#form-i-produk');
				let form = new FormData(formtp);

				form.append('aksi', 'tambahproduk');

				ajax.open('POST', 'proses-produk.php', true);
	//ajax.setRequestHeader('Content-Type', "multipart/form-data");
	ajax.send(form);

});

let kapital = document.querySelector('#kapital');

kapital.addEventListener('keyup', function() {
	let x = document.getElementById("kapital");
	x.value = x.value.toUpperCase();
});

let formkategoriproduk = document.querySelector('#form-kategori-produk');
formkategoriproduk.addEventListener('submit', function(event) {
	event.preventDefault();

	let xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			alert(xhr.responseText);
		}	
	}
	let formkategoriproduk = document.querySelector('#form-kategori-produk');
	let formdata = new FormData(formkategoriproduk);
	formdata.append('aksi', 'tambahkategori');
	xhr.open('POST', 'proses-produk.php', true);
	xhr.send(formdata);
});

/*--------------- Tampil Data ------------------- */

//window.addEventListener('load', function() {

//});