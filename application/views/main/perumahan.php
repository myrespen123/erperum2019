<?php $this->load->view('parts/header-sect') ?>

<!-- close header section -->


<main class="flex direction-column width100">
	

	<section class="except-properts pads">
		<div class="perumahan-hero setting-bg" style="background-image: url('<?= base_url('assets/img/bg-hero-perum.png') ?>');">
			<img src="<?= base_url('assets/img/eperum-white.png') ?>">
				<div class="properties-title color-white">
					<h1>PILIH RUMAH IMPIANMU</h1>
						<span>Lorem ipsum dolor sit amet</span>
				</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="row">
						<div class="filter-properties">
							<h4>Filter Pencarian</h4>
							<form class="filters-items" method="POST" enctype="multipart/form-data" action="<?= site_url('perumahan/perumahan_filter') ?>">
								<div class="filter-prop-items">
									<label>Kecamatan</label>
										<div class="col-sm-12">
											<select class="form-control" name="id_kecamatan" id="kecamatan" required="">
												<option selected="" disabled="">-- Filter Kecamatan ---</option>	
												<?php foreach ($kecamatan as $keykec => $valkec): ?>
													<option value="<?= $valkec['id_kecamatan'] ?>"><?= $valkec['nama_kecamatan'] ?></option>
												<?php endforeach ?>
											</select>
										</div>
								</div>
								<div class="filter-prop-items">
									<label>Kelurahan</label>
										<div class="col-sm-12">
											<select class="form-control" name="id_kelurahan" id="kelurahan" required="">
												<option selected="" disabled="">-- Filter Kelurahan ---</option>	
											</select>
										</div>
								</div>
								<div class="filter-prop-items">
									<label>Harga</label>
									     <input type="hidden" id="min_harga" name="min_harga" value="0" />
						                    <input type="hidden" id="max_harga" name="max_harga" value="1000000000" />
							                    <p id="price_show">0 - 1000000000</p>
								                    <div class="slider-range" id="price_range"></div>
								</div>
								<div class="filter-prop-items">
									<label>Luas Bangunan</label>
									     <input type="hidden" id="min_bangunan" name="min_bangunan" value="0" />
						                    <input type="hidden" id="max_bangunan" name="max_bangunan" value="5000" />
							                    <p id="bangunan_show">0 - 5000 m<sup>2</sup></p>
								                    <div id="bangunan_range"></div>
								</div>
								<div class="filter-prop-items">
									<label>Luas Tanah</label>
									     <input type="hidden" id="min_tanah" name="min_tanah" value="0" />
						                    <input type="hidden" id="max_tanah" name="max_tanah" value="5000" />
							                    <p id="tanah_show">0 - 5000 m<sup>2</sup></p>
								                    <div id="tanah_range"></div>
								</div>
						
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<?php $this->load->view('main/perum_scroll', $posts); ?>
					<div id="perum_filter">
						<div class="loading-properts text-center load-filter" style="margin-top: 40px;">
							<p class="img-filter" style="display: none;"><img src="<?php echo base_url('assets/img/gifload.gif'); ?>"></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>


<?php $this->load->view('parts/footer') ?>

<script type="text/javascript">
	$(document).ready(function() {
        // $('.img-load').hide();

        $(document).on('click','.load-primer',function(){
	        
	        var ID = $(this).attr('id');
	        
	       	$.ajax({
	            type:'POST',
	            url:'<?php echo site_url('perumahan/perum_load_ajax');?>',
	            data:'id='+ID,
	           beforeSend: function() {
			        $('.load-primer').hide();
	        		$('.img-load').show();
			    },
	            success:function(html){
	                $('#show_more_main'+ID).remove();
	                $('#test').append(html);
	            }
	        });
	    });

		$(document).on('click','.load-filter',function(){
	        
	        var ID = $(this).attr('id');
	        var action = 'fetch_data';
	        var min_harga = $('#min_harga').val();
	        var max_harga = $('#max_harga').val();
	        var max_bangunan = $('#max_bangunan').val();
	        var min_bangunan = $('#min_bangunan').val();
	        var min_tanah = $('#min_tanah').val();
	        var max_tanah = $('#max_tanah').val();
	       	var kec = $('#kecamatan').val();
            var kel = $('#kelurahan').val();

	       	$.ajax({
	            type:'POST',
	            url:'<?php echo site_url('perumahan/perum_filter_gan');?>',
	            data:{action:action, min_harga:min_harga, max_harga:max_harga, max_bangunan:max_bangunan, min_bangunan:min_bangunan, min_tanah:min_tanah, max_tanah:max_tanah, kecamatan:kec, kelurahan:kel, id:ID},
	           beforeSend: function() {
			        $('.load-filter').hide();
	        		$('.img-load-filter').show();
			    },
	            success:function(html){
	                $('#show_more_main_filter'+ID).remove();
	                $('#perum_filter').append(html);
	            }
	        });
	    });	    

		$('#kecamatan').change(function() {
			var val_kec = $(this).val();
			// var val_kel = $('#kelurahan').val();
			filter_data(val_kec);

		});

		$('#kelurahan').change(function() {
			var val_kel = $(this).val();
			var val_kec = $('#kecamatan').val();
			filter_data(val_kec, val_kel);
		});

	    function filter_data(val_kec, val_kel)
	    {

	        var action = 'fetch_data';
	        var min_harga = $('#min_harga').val();
	        var max_harga = $('#max_harga').val();
	        var max_bangunan = $('#max_bangunan').val();
	        var min_bangunan = $('#min_bangunan').val();
	        var min_tanah = $('#min_tanah').val();
	        var max_tanah = $('#max_tanah').val();
	        var kelurahan = $('#kelurahan').val();
			$.ajax({
	            url:"<?php echo site_url('perumahan/perum_filt') ?>",
	            method:"POST",
	            data:{action:action, min_harga:min_harga, max_harga:max_harga, max_bangunan:max_bangunan, min_bangunan:min_bangunan, min_tanah:min_tanah, max_tanah:max_tanah, kecamatan:val_kec, kelurahan:val_kel},
	            beforeSend: function()
	            {
	                // $('.loading-properts').show();
	        		// $('.img-load').show();
	       			 $('.load-filter').show();
	       			 $('.img-filter').show();
	            },
	            success:function(data){
	          //   	console.log(val_kec);
	          //   	console.log(val_kel);
	                $('#test').remove();
	                $('#perum_filter').html(data);
	            }
	        });
	    }
	    

    $('#price_range').slider({
        range:true,
        min:0,
        max:1000000000,
        values:[0, 1000000000],
        step:50000000,
        stop:function(event, ui)
        {
            $('#price_show').html("Rp " + ui.values[0] + ' - ' + "Rp " + ui.values[1]);
            $('#min_harga').val(ui.values[0]);
            $('#max_harga').val(ui.values[1]);
            var kec = $('#kecamatan').val();
            var kel = $('#kelurahan').val();
            filter_data(kec, kel);
        }
    });

    $('#bangunan_range').slider({
        range:true,
        min:0,
        max:5000,
        values:[0, 5000],
        step:50,
        stop:function(event, ui)
        {
            $('#bangunan_show').html(ui.values[0] + " m2" + ' - ' + ui.values[1] + " m2");
            $('#min_bangunan').val(ui.values[0]);
            $('#max_bangunan').val(ui.values[1]);
            var kec = $('#kecamatan').val();
            var kel = $('#kelurahan').val();
            filter_data(kec, kel);
		}
	});

    $('#tanah_range').slider({
        range:true,
        min:0,
        max:5000,
        values:[0, 5000],
        step:50,
        stop:function(event, ui)
        {
            $('#tanah_show').html(ui.values[0] + " m2" + ' - ' + ui.values[1] + " m2");
            $('#min_tanah').val(ui.values[0]);
            $('#max_tanah').val(ui.values[1]);
            var kec = $('#kecamatan').val();
            var kel = $('#kelurahan').val();
            filter_data(kec, kel);
		}
	});


     $('#min_harga').change(function () {
        var low = $('#min_harga').val(),
        high = $('#max_harga').val();
        low = Math.min(low, high);
        $('#min_harga').val(low);
        $('#slider-price').slider('values', 0, low);
    });

    $('#max_harga').change(function () {
        var low = $('#min_harga').val(),
        high = $('#max_harga').val();
        high = Math.max(low, high);
        $('#max_harga').val(high);
        if(high > 1000000000) {
            $('#max_harga').val('1000000000');
        }
    });

	});

      



</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#kecamatan').change(function(){
			var id_kecamatan = $(this).val();			
			$.ajax({
				url:"<?php echo site_url('perumahan/get_select') ?>",
				method:"POST",
				data:{'id_kecamatan':id_kecamatan},
				success:function(data)
				{
					$('#kelurahan').html(data);
				}
			});
		});
	});
</script>
