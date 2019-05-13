<?php $this->load->view('pengembangs/parts/header') ?>

	<div class="content-wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Data Perumahan</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Data Perumahan</li>
						</ol>
					</div>
				</div>
			</div>
		</div>

 		<section class="content">
			<div class="row">
				<div class="col-md-12">				
					<div class="card">
						<div class="card-header">
							<?php if ($this->session->flashdata('simpan') == true): ?>
								<div class="alert alert-primary" role="alert">
								 	<?= $this->session->flashdata('simpan'); ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							<?php endif ?>
							<?php if ($this->session->flashdata('gagal') == true): ?>
								<div class="alert alert-danger" role="alert">
								 	<?= $this->session->flashdata('gagal'); ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							<?php endif ?>
							<a href="<?= site_url('pengembangs/estate_create') ?>" class="btn button-insert" id="btn-usulan-insert">
								Tambah Data
							</a>
						</div>
						<div class="card-body table-responsive">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama Perumahan</th>
										<th>Lokasi</th>
										<th>Jumlah Properti</th>
										<th>Foto Perumahan</th>
										<th>Sarana & Prasarana</th>
										<th>Fasilitas</th>
										<th>Aktif/Tidak Aktif</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($data as $key => $value): ?>
										<tr>
											<td><?= $key+1; ?></td>
											<td>
												<a href="<?= site_url('pengembangs/properti_data/'.$value['id_perumahan']) ?>"><?= $value['nama_perumahan'] ?></a>
											</td>
											<td><?= $value['lokasi'] ?></td>
											<td>
												<?php 
													$id_perumahan = $value['id_perumahan'];
													$query = $this->db->query("SELECT COUNT(*) AS jumlah FROM bangunan WHERE id_perumahan=$id_perumahan")->row();
													echo $query->jumlah;
												 ?>
											</td>
											<td>
												<a href="<?= site_url('pengembangs/estate_foto/'.$value['id_perumahan']) ?>">
													<div class="status status-pink cursor-pointer color-black">	
														Detail/Ubah
													</div>
												</a>
											</td>
											<td>
												<a href="<?= site_url('pengembangs/estate_sarana/'.$value['id_perumahan']) ?>">
													<div class="status status-yellow cursor-pointer color-black">	
														Detail/Ubah
													</div>
												</a>
											</td>
											<td>
												<a href="<?= site_url('pengembangs/estate_fasilitas/'.$value['id_perumahan']) ?>">
													<div class="status bg-dark-purple color-white cursor-pointer">	
														Detail/Ubah
													</div>
												</a>
											</td>
											<td>
												<?php if ($value['status_perumahan']=="1"): ?>
													<a href="<?= site_url('pengembangs/perumahan_unpublish/'.$value['id_perumahan']) ?>">
														<div class="status status-green">Aktif</div>
													</a>
												<?php elseif ($value['status_perumahan']=="0"): ?>
													<div class="status status-red">belum disetujui</div>
												<?php elseif ($value['status_perumahan']=="2"): ?>
													<a href="<?= site_url('pengembangs/perumahan_publish/'.$value['id_perumahan']) ?>">
														<div class="status status-blue">tidak aktif</div>
													</a>
												<?php else: ?>
													<div class="status status-black">error data</div>
												<?php endif ?>
											</td>
											<td class="text-center">
												<a class="ms5 btn button-detail" href="<?php echo site_url('pengembangs/estate_detail/'.$value['id_perumahan']) ?>">
													<i class="fa fa-info"></i>
												</a>
												<a class="ms5 btn button-edit" href="<?php echo site_url('pengembangs/estate_edit/'.$value['id_perumahan']) ?>">
													<i class="fa fa-pencil"></i>
												</a>
												<!-- <a class="ms5 btn button-delete" href="<?php echo site_url('pengembangs/estate_delete/'.$value['id_perumahan']) ?>" onclick="return confirm('Ingin menghapus data ?');">
													<i class="fa fa-trash"></i>
												</a> -->
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>

	</div>

<?php $this->load->view('pengembangs/parts/footer') ?>