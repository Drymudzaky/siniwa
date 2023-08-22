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
          	<h3><i class="fa fa-angle-right"></i> Informasi Akademik &raquo; Jadwal KSK</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
            <?php
            $query = mysql_query("SELECT * FROM tbl_jadwal WHERE kd_jadwal='$_GET[kd]'");
            $data  = mysql_fetch_array($query);
            ?>
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Jadwal KSK</h4>
                      <form class="form-horizontal style-form" action="update-jadwal.php" method="post" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> Kode Jadwal</label>
                              <div class="col-sm-10">
                                  <input name="kd_jadwal" type="text" id="kd_jadwal" class="form-control" value="<?php echo $data['kd_jadwal'];?>" autofocus="on" required="required" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> Tahun Akademik </label>
                              <div class="col-sm-10">
                                  <select name="thn_akademik" id="thn_akademik" class="form-control" required />
                                  <option><?php echo $data['thn_akademik'];?> </option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> Nama Dosen </label>
                              <div class="col-sm-10">
                                 <select name="nama_dosen" id="nama_dosen" class="form-control" required />
                                  <option><?php echo $data['nama_dosen'];?> </option>
                                    <option value="Asep">Asep<option>
                                    <option value="Dodo">Dodo</option>
                                    <option value="Wati">Wati</option>
                                    <option value="Siti">Siti</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> Jurusan </label>
                              <div class="col-sm-10">
                                  <select name="kd_jurusan" id="kd_jurusan" class="form-control" required />
                                  <option><?php echo $data['kd_jurusan'];?> </option>
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
                              <label class="col-sm-2 col-sm-2 control-label">Nama KSK</label>
                              <div class="col-sm-10">
                                 <select name="nama_ksk" id="nama_ksk" class="form-control" required />
                                  <option><?php echo $data['nama_ksk'];?> </option>
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
                              <label class="col-sm-2 col-sm-2 control-label">Hari</label>
                              <div class="col-sm-10">
                                  <select name="hari" id="hari" class="form-control" required />
                                  <option><?php echo $data['hari'];?> </option>
                                    <option value="Senin">Senin<option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="jumat">jumat</option>
                                    <option value="sabtu">sabtu</option>
                                  </select>
                              </div>
                              </div>
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Ruang</label>
                              <div class="col-sm-10">
                                  <select name="ruang" id="ruang" class="form-control" required />
                                  <option><?php echo $data['ruang'];?> </option>
                                    <option value="A21M">A21M<option>
                                    <option value="C31">C31</option>
                                    <option value="B22">B22</option>
                                    <option value="A28M">A28M</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Semester</label>
                              <div class="col-sm-10">
                                  <select name="smt" id="smt" class="form-control" required />
                                  <option><?php echo $data['smt'];?> </option>
                                    <option value="1">1<option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kelas</label>
                              <div class="col-sm-10">
                                  <input name="kelas" type="text" id="kelas" class="form-control" value="<?php echo $data['kelas'];?>" autofocus="on" required="required" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jam Mulai</label>
                              <div class="col-sm-10">
                                  <select name="jam_mulai" id="jam_mulai" class="form-control" required />
                                  <option><?php echo $data['jam_mulai'];?> </option>
                                    <option value="08.00">08.00<option>
                                    <option value="10.00">10.00</option>
                                    <option value="13.00">13.00</option>
                                    <option value="15.00">15.00</option>
                                    <option value="17.00">17.00</option>
                                    <option value="19.00">19.00</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jam Keluar</label>
                              <div class="col-sm-10">
                                  <select name="jam_selesai" id="jam_selesai" class="form-control" required />
                                  <option><?php echo $data['jam_selesai'];?> </option>
                                    <option value="10.00">10.00<option>
                                    <option value="12.00">12.00</option>
                                    <option value="15.00">15.00</option>
                                    <option value="17.00">17.00</option>
                                    <option value="19.00">19.00</option>
                                    <option value="21.00">21.00</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="Jadwal.php" class="btn btn-sm btn-danger">Batal </a>
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
