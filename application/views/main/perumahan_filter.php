<?php $this->load->view('parts/header-sect') ?>

<!-- close header section -->


<main class="flex direction-column width100">
	

	<section class="except-properts pads">
		<div class="properties-title">
			<h1>PILIH RUMAH IMPIANMU</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="row">
						<div class="filter-properties">
							<h4>Filter Pencarian</h4>
							<form class="filters-items" method="POST" enctype="multipart/form-data" action="<?= site_url('perumahan/perumahan_filter') ?>">
								<div class="filter-prop-items">
									<label>Harga</label>
									     <input type="hidden" id="min_harga" name="min_harga" value="0" />
						                    <input type="hidden" id="max_harga" name="max_harga" value="65000" />
							                    <p id="price_show">0 - 1000000000</p>
								                    <div id="price_range"></div>
								</div>
								<div class="filter-prop-items">
									<label>Luas Bangunan</label>
										<div>
											<select class="select-filterp" name="luas_bangunan">
												<option value="all">Semua</option>
												<option value="50">0 - 50 m2</option>
												<option value="100">0 - 100 m2</option>
												<option value="200">0 - 200 m2</option>
												<option value="300">0 - 300 m2</option>
												<option value="400">0 - 400 m2</option>
												<option value="500">0 - 500 m2</option>
												<option value="750">0 - 750 m2</option>
												<option value="1000">0 - 1000 m2</option>
											</select> 
										</div>
								</div>
								<div class="filter-prop-items">
									<label>Luas Tanah</label>
										<div>
											<select class="select-filterp" name="luas_tanah">
												<option value="all">Semua</option>
												<option value="50">0 - 50 m2</option>
												<option value="100">0 - 100 m2</option>
												<option value="200">0 - 200 m2</option>
												<option value="300">0 - 300 m2</option>
												<option value="400">0 - 400 m2</option>
												<option value="500">0 - 500 m2</option>
												<option value="750">0 - 750 m2</option>
												<option value="1000">0 - 1000 m2</option>
											</select> 
										</div>
								</div>
								<div class="filter-prop-items">
									<button type="submit">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="row" id="post-data">
						<?php $this->load->view('main/perum_scroll', $posts); ?>
					</div>
					<!-- <div class="ajax-load text-center">

					</div> -->
				</div>
			</div>
		</div>
	</section>
</main>


<?php $this->load->view('parts/footer') ?>

<script type="text/javascript">



</script>