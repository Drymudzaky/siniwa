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

$query_itksk = mysql_query("SELECT * FROM itksk order by kode_ksk desc")or die(mysql_error());
$row_itksk = mysql_fetch_array($query_itksk);
$totalrow_itksk = mysql_num_rows($query_itksk);

if ($totalrow_itksk > 0) {
  $kodeksk_terakhir = substr($row_itksk['kode_ksk'], -2);
  $nourut = $kodeksk_terakhir+1;
  $isikodeitksk ="I"."00".$nourut;
  }else if ($totalrow_itksk ==0){
  $nourut = 1;
  $isikodeksk ="I"."00".$nourut;
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
          	<h3><i class="fa fa-angle-right"></i> Nama KSK &raquo; Nama KSK IT</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Input KSK IT</h4>
                      <form class="form-horizontal style-form" action="insert-it.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kode KSK</label>
                              <div class="col-sm-10">
                                  <input name="kode_ksk" type="text" id="kode_ksk" class="form-control" placeholder="Isi dengan ex : I001 dst." autofocus="on" value="<?php echo $isikodeksk;?> " readonly/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama KSK</label>
                              <div class="col-sm-10">
                                   <select name="nama_ksk" id="nama_ksk"  class="form-control" required />
                                    <option> ---- Pilih Salah Satu ---- </option>
                                    <option value="KOMPETENSI-ANIMASI (KSK-AN)">KOMPETENSI-ANIMASI (KSK-AN)</option>
                                    <option value="KOMPETENSI-WEB PROGRAMMING (KSK-WEB)">KOMPETENSI-WEB PROGRAMMING (KSK-WEB)</option>
                                    <option value="KOMPETENSI INOVASI TEKNOLOGI IoT (KSKS-IoT)">KOMPETENSI INOVASI TEKNOLOGI IoT (KSKS-IoT)</option>
                                    <option value="KOMPETENSI DEKSTOP PROGRAMMING (KSK-DESK)">KOMPETENSI DEKSTOP PROGRAMMING (KSK-DESK)</option>
                                    <option value="KOMPETENSI MOBILE PROGRAMING (KSK-MOB)">KOMPETENSI MOBILE PROGRAMING (KSK-MOB)</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jurusan</label>
                              <div class="col-sm-10">
                                   <select name="jurusan" id="jurusan"  class="form-control" required />
                                    <option> ---- Pilih Salah Satu ---- </option>
                                    <option value="KMA">KMA</option>
                                    <option value="MIF D III">MIF D III</option>
                                    <option value="TIK">TIK</option>
                                    <option value="MIF DIV">MIF DIV</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Level KSK</label>
                              <div class="col-sm-10">
                                  <select name="level_ksk" id="level_ksk"  class="form-control" required />
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
                              <label class="col-sm-2 col-sm-2 control-label">KSK IT</label>
                              <div class="col-sm-10">
                                  <select name="ksk_it" id="ksk_it"  class="form-control" required />
                                    <option> ---- Pilih Salah Satu ---- </option>
                                    <option value="Kompetensi  Animasi (KSK-AN)">Kompetensi  Animasi (KSK-AN)</option>
                                    <option value="Kompetensi  Web Programming (KSK-WEB)">Kompetensi  Web Programming (KSK-WEB)</option>
                                    <option value="KOMPETENSI INOVASI TEKNOLOGI IoT (KSKS-IoT)">KOMPETENSI INOVASI TEKNOLOGI IoT (KSKS-IoT)</option>
                                    <option value="KOMPETENSI DEKSTOP PROGRAMMING (KSK-DESK)">KOMPETENSI DEKSTOP PROGRAMMING (KSK-DESK)</option>
                                    <option value="KOMPETENSI MOBILE PROGRAMING (KSK-MOB)">KOMPETENSI MOBILE PROGRAMING (KSK-MOB)</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="it.php" class="btn btn-sm btn-danger">Batal </a>
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
