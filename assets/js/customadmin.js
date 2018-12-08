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