<?php $this->load->view('pengembangs/parts/header') ?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="row">
        <div class="col-md-12">       
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-3 col-6">
                  <div class="small-box status-blue">
                    <div class="inner">
                    <h3><?= $jumlah_perumahan; ?></h3>
                      <p>Perumahan anda</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-institution"></i>
                    </div>
                    <a href="#" class="small-box-footer" style="visibility: hidden;">Info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-3 col-6">
                  <div class="small-box status-green">
                    <div class="inner">
                      <h3><?= $perumahan_active ?></h3>
                      <p>Perumahan Ditayangkan</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-institution"></i>
                    </div>
                    <a href="#" class="small-box-footer" style="visibility: hidden;">Info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-3 col-6">
                  <div class="small-box status-red">
                    <div class="inner">
                      <h3><?= $perumahan_nonactive ?></h3>
                      <p>Perumahan Tidak Ditayangkan</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-institution"></i>
                    </div>
                    <a href="#" class="small-box-footer" style="visibility: hidden;">Info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-3 col-6">
                  <div class="small-box status-yellow">
                    <div class="inner">
                      <h3><?= $perumahan_nonconfirm ?></h3>
                      <p>Perumahan Menunggu Konfirmasi</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-institution"></i>
                    </div>
                    <a href="#" class="small-box-footer" style="visibility: hidden;">Info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-3 col-6">
                  <div class="small-box status-blue2">
                    <div class="inner">
                      <h3><?= $jumlah_properti ?></h3>
                      <p>Properti</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-home"></i>
                    </div>
                    <a href="#" class="small-box-footer" style="visibility: hidden;">Info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-3 col-6">
                  <div class="small-box status-green2">
                    <div class="inner">
                      <h3><?= $properti_active ?></h3>
                      <p>Properti Ditayangkan</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-home"></i>
                    </div>
                    <a href="#" class="small-box-footer" style="visibility: hidden;">Info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-3 col-6">
                  <div class="small-box status-light-red">
                    <div class="inner">
                      <h3><?= $properti_nonactive ?></h3>
                      <p>Properti Tidak Ditayangkan</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-home"></i>
                    </div>
                    <a href="#" class="small-box-footer" style="visibility: hidden;">Info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-3 col-6">
                  <div class="small-box status-light-yellow">
                    <div class="inner">
                      <h3><?= $properti_nonconfirm ?></h3>
                      <p>Properti Menunggu Konfirmasi</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-home"></i>
                    </div>
                    <a href="#" class="small-box-footer" style="visibility: hidden;">Info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

<?php $this->load->view('pengembangs/parts/footer') ?>