<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
?>
<!DOCTYPE html>
<html lang="en">
  
  <?php include "head.php";

  $query_tbl_jadwal = mysql_query("SELECT * FROM tbl_jadwal order by kd_jadwal desc")or die(mysql_error()); 
  $row_tbl_jadwal = mysql_fetch_array($query_tbl_jadwal);
  $totalrow_tbl_jadwal = mysql_num_rows($query_tbl_jadwal);

if ($totalrow_tbl_jadwal > 0) {
  $kd_jadwal_terakhir = substr($row_tbl_jadwal['kd_jadwal'], -3);
  $nourut = $kd_jadwal_terakhir+1;
  $isikd_jadwal ="K"."00".$nourut;
  }else if ($totalrow_kelas ==0){
  $nourut = 1;
  $isikd_jadwal ="K"."00".$nourut;
  
  }


  ?>
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
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Input Jadwal</h4>
                      <form class="form-horizontal style-form" action="insert-jadwal.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kode Jadwal</label>
                              <div class="col-sm-10">
                                  <input name="kd_jadwal" type="text" id="kd_jadwal" class="form-control" placeholder="Isi dengan ex : K001 dst." autofocus="on" required="required" value="<?php echo $isikd_jadwal;?> " readonly/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tahun Ajaran</label>
                              <div class="col-sm-10">
                                  <select name="thn_akademik" id="thn_akademik"  class="form-control" required />
                                    <option> ---- Pilih Salah Satu ---- </option>
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
                                  <select name="nama_dosen" id="nama_dosen"  class="form-control" required />
                                    <option> ---- Pilih Salah Satu ---- </option>
                                    <option value="Asep">Asep</option>
                                    <option value="Dodo">Dodo</option>
                                    <option value="Wati">Wati</option>
                                    <option value="Siti">Siti</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> Jurusan </label>
                              <div class="col-sm-10">
                                  <select name="kd_jurusan" id="kd_jurusan"  class="form-control" required />
                                    <option> ---- Pilih Salah Satu ---- </option>
                                    <option value="TIK">TIK</option>
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
                              <label class="col-sm-2 col-sm-2 control-label"> Nama KSK</label>
                              <div class="col-sm-10">
                                  <select name="nama_ksk" id="nama_ksk"  class="form-control" required />
                                    <option> ---- Pilih Salah Satu ---- </option>
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
                              <label class="col-sm-2 col-sm-2 control-label"> Hari </label>
                              <div class="col-sm-10">
                                  <select name="hari" id="hari"  class="form-control" required />
                                    <option> ---- Pilih Salah Satu ---- </option>
                                    <option value="senin">Senin</option>
                                    <option value="selasa">Selasa</option>
                                    <option value="rabu">Rabu</option>
                                    <option value="kamis">Kamis</option>
                                    <option value="jumat">Jumat</option>
                                    <option value="sabtu">Sabtu</option>
                                  </select>
                              </div>
                              </div>
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> Ruang </label>
                              <div class="col-sm-10">
                                  <select name="ruang" id="ruang"  class="form-control" required />
                                    <option> ---- Pilih Salah Satu ---- </option>
                                    <option value="A21M">A21M</option>
                                    <option value="C31">C31</option>
                                    <option value="B21">B21</option>
                                  </select>
                              </div>
                              </div>
                               <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> semester </label>
                              <div class="col-sm-10">
                                  <select name="smt" id="smt"  class="form-control" required />
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
                              <label class="col-sm-2 col-sm-2 control-label"> kelas </label>
                              <div class="col-sm-10">
                                  <select name="kelas" id="kelas"  class="form-control" required />
                                    <option> ---- Pilih Salah Satu ---- </option>
                                    <option value="reguler">reguler</option>
                                    <option value="DDT">DDT</option>
                                    <option value="Karyawan">Karyawan</option>
                                  </select>
                              </div>
                              </div>
                               <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> Jam Masuk </label>
                              <div class="col-sm-10">
                                  <select name="jam_mulai" id="jam_mulai"  class="form-control" required />
                                    <option> ---- Pilih Salah Satu ---- </option>
                                    <option value="10.00">10.00</option>
                                    <option value="13.00">13.00</option>
                                    <option value="15.00">15.00</option>
                                  </select>
                              </div>
                              </div>
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> Jam Masuk </label>
                              <div class="col-sm-10">
                                  <select name="jam_mulai" id="jam_mulai"  class="form-control" required />
                                    <option> ---- Pilih Salah Satu ---- </option>
                                    <option value="12.00">12.00</option>
                                    <option value="15.00">15.00</option>
                                    <option value="17.00">17.00</option>
                                  </select>
                              </div>  
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="jadwal.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          	
          	
		</section><!--/wrapper -->
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
  <script type="text/javascript">
  $(document).ready(function($) {
   alert('Jquery Working');
});
  </script>
  <script type="text/javascript" src="assets/tiny_mce/tiny_mce.js"></script>
	<script type="text/javascript">
	tinyMCE.init({
	mode : "exact",
	elements : "elm2",
	theme : "advanced",
	skin : "o2k7",
	skin_variant : "silver",
	plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups",
	
	theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
	theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,|,insertdate,inserttime,preview,|,forecolor,backcolor",
	theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
	theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : true,
	
	template_external_list_url : "lists/template_list.js",
	external_link_list_url : "lists/link_list.js",
	external_image_list_url : "lists/image_list.js",
	media_external_list_url : "lists/media_list.js",
	
	template_replace_values : {
		username : "Some User",
		staffid : "991234"
	}
	});
	</script>

  </body>
</html>
