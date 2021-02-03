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

