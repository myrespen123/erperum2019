<?php $this->load->view('admin/parts/header_admin'); ?>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
          <div class="col-lg-3 col-xs-6">
            <div class="small-box box-greyi">
              <div class="inner">
                <h3><?php echo $inactive_perum; ?></h3>
                  <p>Rumah Menunggu Konfirmasi</p>
              </div>
              <div class="icon">
                <i class="fa fa-institution"></i>
              </div>
              <a href="<?= site_url('admin/data_perumahan'); ?>" class="small-box-footer">
                Selengkapnya <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-xs-6">
            <div class="small-box box-greeni">
              <div class="inner">
                <h3><?php echo $active_perum; ?></h3>
                  <p>Rumah AKTIF</p>
              </div>
              <div class="icon">
                <i class="fa fa-institution"></i>
              </div>
              <a href="<?= site_url('admin/data_perumahan'); ?>" class="small-box-footer">
                Selengkapnya <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-xs-6">
            <div class="small-box box-bluei">
              <div class="inner">
                <h3><?php echo $dev_rows; ?></h3>
                  <p>Jumlah Pengembang</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="<?= site_url('admin/data_pengembang'); ?>" class="small-box-footer">
                Selengkapnya <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
      </div>
    </section>
</div>

<?php $this->load->view('admin/parts/footer_admin'); ?>