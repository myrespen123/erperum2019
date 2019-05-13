$(document).ready(function() {
	$('#close-alert').click(function () {
		$(".alert").alert('dispose');
	});
});

function readURL(input) {
	if (input.files && input.files[0]) {
	    var reader = new FileReader();
		    reader.onload = function (e) {
		        $('#img-priview').attr('src', e.target.result);
		    };
	    reader.readAsDataURL(input.files[0]);
	}
}

$('#hapus_sarana').hide();
$('#tambah_sarana').click(function(){
	$('#hapus_sarana').show();
	$('.mom-append-sarana').each(function(){
		$('#child-sarana').clone().appendTo('.mom-append-sarana');
	});
});

$('#hapus_sarana').click(function(){
	$('#child-sarana').remove().eq(1);
	if ($('.mom-append-sarana').children().length == 1) {
		$('#hapus_sarana').hide();
	}
});

$('#hapus_fasilities').hide();
$('#tambah_fasilities').click(function(){
	$('#hapus_fasilities').show();
	$('.mom-append-fasilities').each(function(){
		$('#child-fasilities').clone().appendTo('.mom-append-fasilities');
	});
});

$('#hapus_fasilities').click(function(){
	$('#child-fasilities').remove().eq(1);
	if ($('.mom-append-fasilities').children().length == 1) {
		$('#hapus_fasilities').hide();
	}
});


$('#hapus_fotop').hide();
$('#tambah_fotop').click(function(){
	$('#hapus_fotop').show();
	$('.mom-append-fotop').each(function(){
		$('#child-fotop').clone().appendTo('.mom-append-fotop');
	});
});

$('#hapus_fotop').click(function(){
	$('#child-fotop').remove().eq(1);
	if ($('.mom-append-fotop').children().length == 1) {
		$('#hapus_fotop').hide();
	}
});

$('#hapus_saranap').hide();
$('#tambah_saranap').click(function(){
	$('#hapus_saranap').show();
	$('.mom-append-saranap').each(function(){
		$('#child-saranap').clone().appendTo('.mom-append-saranap');
	});
});

$('#hapus_saranap').click(function(){
	$('#child-saranap').remove().eq(1);
	if ($('.mom-append-saranap').children().length == 1) {
		$('#hapus_saranap').hide();
	}
});

$('#hapus_fasilitasp').hide();
$('#tambah_fasilitasp').click(function(){
	$('#hapus_fasilitasp').show();
	$('.mom-append-fasilitasp').each(function(){
		$('#child-fasilitasp').clone().appendTo('.mom-append-fasilitasp');
	});
});

$('#hapus_fasilitasp').click(function(){
	$('#child-fasilitasp').remove().eq(1);
	if ($('.mom-append-fasilitasp').children().length == 1) {
		$('#hapus_fasilitasp').hide();
	}
});

$('#hapus_spekp').hide();
$('#tambah_spekp').click(function(){
	$('#hapus_spekp').show();
	$('.mom-append-spekp').each(function(){
		$('#child-spekp').clone().appendTo('.mom-append-spekp');
	});
});

$('#hapus_spekp').click(function(){
	$('#child-spekp').remove().eq(1);
	if ($('.mom-append-spekp').children().length == 1) {
		$('#hapus_spekp').hide();
	}
});

$(document).ready(function() {
	var rupiah = document.getElementById("rupiah");
	var rupiah2 = document.getElementById("rupiah2");
	rupiah.addEventListener("keyup", function(e) {
	  // tambahkan 'Rp.' pada saat form di ketik
	  // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
	  rupiah.value = formatnumber(this.value, "");
	  rupiah2.value = formatRupiah(this.value, "Rp. ");
	});

	/* Fungsi formatRupiah */
	function formatRupiah(angka, prefix) {
	  var number_string = angka.replace(/[^,\d]/g, "").toString(),
	    split = number_string.split(","),
	    sisa = split[0].length % 3,
	    rupiah = split[0].substr(0, sisa),
	    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

	  // tambahkan titik jika yang di input sudah menjadi angka ribuan
	  if (ribuan) {
	    separator = sisa ? "." : "";
	    rupiah += separator + ribuan.join(".");
	  }

	  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
	  return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
	}

	function formatnumber(angka, prefix) {
	  var number_string = angka.replace(/[^,\d]/g, "").toString(),
	    split = number_string.split(","),
	    sisa = split[0].length % 3,
	    rupiah = split[0].substr(0, sisa),
	    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

	  // tambahkan titik jika yang di input sudah menjadi angka ribuan
	  if (ribuan) {
	    separator = sisa ? "" : "";
	    rupiah += separator + ribuan.join("");
	  }

	  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
	  return prefix == undefined ? rupiah : rupiah ? "" + rupiah : "";
	}
});