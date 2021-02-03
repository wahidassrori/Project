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

});

satuan.addEventListener('click', function(e){
	e.preventDefault();

	document.querySelector('.tambah-produk').style.display = 'none';
	document.querySelector('.kategori').style.display = 'none';
	document.querySelector('.satuan').style.display = 'block';

});


let formtambahproduk = document.querySelector('#form-tambah-produk');

formtambahproduk.addEventListener('submit', function(e) {
	e.preventDefault();

	let ajax = new XMLHttpRequest();

	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			document.querySelector('.pesan').innerHTML = ajax.responseText;
		}
	};

	let kodeproduk = document.querySelector();

	
	ajax.open('POST', 'proses-produk.php', true);
	ajax.setRequestHeader('Content-Type', "application/x-www-form-urlencoded");
	ajax.send();

});
