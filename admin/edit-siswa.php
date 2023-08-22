<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
?>
<!DOCTYPE html>
<html lang="en">
  <?php include "head.php"; ?>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <?php include "header.php"; ?>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="<?php echo $_SESSION['gambar']; ?>" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">
              <?php
              echo $_SESSION['fullname'];
               ?></h5>
              	  	<?php
$timeout = 10; // Set timeout minutes
$logout_redirect_url = "../index.php"; // Set logout URL

$timeout = $timeout * 60; // Converts minutes to seconds
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
    }
}
$_SESSION['start_time'] = time();
?>
<?php } ?>
              	  	
                  <?php include 'menu.php'; ?>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Mahasiswa &raquo; Edit Mahasiswa</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
            <?php
            $query = mysql_query("SELECT * FROM siswa WHERE kode_siswa='$_GET[kd]'");
            $data  = mysql_fetch_array($query);
            ?>
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Mahasiswa</h4>
                      <form class="form-horizontal style-form" action="update-siswa.php" method="post" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kode Siswa</label>
                              <div class="col-sm-10">
                                  <input name="kode_siswa" type="text" id="kode_siswa" class="form-control" value="<?php echo $data['kode_siswa'];?>" autofocus="on" readonly/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">NPM</label>
                              <div class="col-sm-10">
                                  <input name="npm" type="text" id="npm" class="form-control" value="<?php echo $data['npm'];?>" required />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Siswa</label>
                              <div class="col-sm-10">
                                  <input name="nama_siswa" type="text" id="nama_siswa" class="form-control" value="<?php echo $data['nama_siswa'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kelamin</label>
                              <div class="col-sm-10">
                                  <select name="kelamin" id="kelamin"  class="form-control" required />
                                    <option> <?php echo $data['kelamin'];?> </option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                  </select>

                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Agama</label>
                              <div class="col-sm-10">
                                  <select name="agama" id="agama"  class="form-control" required />
                                    <option> <?php echo $data['agama'];?> </option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Protestan">Protestan</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jurusan</label>
                              <div class="col-sm-10">
                                  <select name="jurusan" id="jurusan"  class="form-control" required />
                                    <option> <?php echo $data['jurusan'];?> </option>
                                    <option value="TIK">TIK<option>
                                    <option value="RMIK">RMIK</option>
                                    <option value="KAT">KAT</option>
                                    <option value="AKE">AKE</option>
                                    <option value="BDI">BDI</option>
                                    <option value="MIF">MIF</option>
                                    <option value="BDI">PME</option>
                                    <option value="AKS">AKS</option>
                                    <option value="FARMASI">FARMASI</option>
                                    <option value="FISIOTERAPI">FISIOTERAPI</option>
                                    <option value="MRS">MRS</option>
                                    <option value="MIK">MIK</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir</label>
                              <div class="col-sm-10">
                                  <input name="tanggal_lahir" class="form-control" id="tanggal_lahir" type="date" value="<?php echo $data['tanggal_lahir'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No Telepon</label>
                              <div class="col-sm-10">
                                  <input name="no_telepon" class="form-control" id="no_telepon" type="text" value="<?php echo $data['no_telepon'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tahun Angkatan</label>
                              <div class="col-sm-10">
                                  <select name="tahun_angkatan" id="tahun_angkatan"  class="form-control" required />
                                    <option> <?php echo $data['tahun_angkatan'];?> </option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                  </select>
                              </div>
                          </div>
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email</label>
                              <div class="col-sm-10">
                                  <input name="email" class="form-control" id="email" type="text" value="<?php echo $data['email'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama KSK</label>
                              <div class="col-sm-10">
                                  <select name="nama_ksk" id="nama_ksk"  class="form-control" required />
                                    <option> <?php echo $data['nama_ksk'];?>  </option>
                                    <option value="IOT">IOT</option>
                                    <option value="AN">AN</option>
                                    <option value="FOH">FOH</option>
                                    <option value="DESK">DESK</option>
                                    <option value="MOB">MOB</option>
                                    <option value="WEB">WEB</option>
                                    <option value="WELL">WELL</option>
                                    <option value="UKRM">UKRM</option>
                                    <option value="PRM">PRM</option>
                                    <option value="PKIO">PKIO</option>
                                    <option value="MUS">MUS</option>
                                    <option value="MRM">MRM</option>
                                    <option value="LRM">LRM</option>
                                    <option value="KK">KK</option>
                                    <option value="H">H</option>
                                    <option value="ARS">ARS</option>
                                    <option value="COD">COD</option>
                                    <option value="IBM">IBM</option>
                                    <option value="MYOB">MYOB</option>
                                    <option value="AP">AP</option>
                                    <option value="AM">AM</option>
                                    <option value="AK">AK</option>
                                    <option value="EC">EC</option>
                                    <option value="FOK">FOK</option>
                                    <option value="SARS">SARS</option>
                                    <option value="RKE">RKE</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Level KSK</label>
                              <div class="col-sm-10">
                                  <select name="level_ksk" id="level_ksk"  class="form-control" value="<?php echo $data['level_ksk'];?>" required />
                                    <option> ---- Pilih Salah Satu ---- </option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                  </select>
                              </div>
                          </div>
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Username</label>
                              <div class="col-sm-10">
                                  <input name="username" class="form-control" id="username" type="text" value="<?php echo $data['username'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Password</label>
                              <div class="col-sm-10">
                                  <input name="password" class="form-control" id="password" type="text" value="<?php echo $data['password'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Gambar</label>
                              <div class="col-sm-10">
                                  <img src="<?php echo $data['gambar'];?>" height="300" width="200" style="border: 2px solid #666666;" class="img-rounded"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="siswa.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          	
          	
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <?php include "footer.php"; ?>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
