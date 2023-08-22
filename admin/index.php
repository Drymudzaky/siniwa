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
              
              	  <p class="centered"><a href="#"><img src="<?php echo $_SESSION['gambar']; ?>" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php
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

              <div class="row">
                  <div class="col-lg-9 main-chart">
                   
                  	<div class="row mtbox">
                    
                    <?php $tampil=mysql_query("select * from guru order by kode_dosen desc");
                        $total=mysql_num_rows($tampil);
                    ?>
                  		<div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                  			<div class="box1">
                                <h3><a href="guru.php" class="btn btn-lg btn-danger">Dosen</a></h3>
					  			<span class="glyphicon glyphicon-list-alt"></span>
					  			<h3><?php echo "$total"; ?></h3>
                  			</div>
					  			<p>SIM KSK memiliki<?php echo "$total"; ?> Orang Dosen </p>
                  		</div>
                        
                        <?php $tampil=mysql_query("select * from siswa order by kode_siswa desc");
                        $total_siswa=mysql_num_rows($tampil);
                    ?>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
                                <h3><a href="siswa.php" class="btn btn-lg btn-primary">Mahasiswa</a></h3>
					  			<span class="glyphicon glyphicon-user"></span>
					  			<h3><?php echo "$total_siswa"; ?></h3>
                  			</div>
					  			<p>SIM KSK memiliki  <?php echo "$total_siswa"; ?> Orang Mahasiswa</p>
                  		</div>
                        <?php $tampil=mysql_query("select * from ekbisksk order by kode_ksk desc");
                        $total_ekbisksk=mysql_num_rows($tampil);
                    ?>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
                                <h3><a href="pelajaran.php" class="btn btn-lg btn-info">Nama KSK</a></h3>
					  			<span class="glyphicon glyphicon-book"></span>
					  			<h3><?php echo "$total_ekbisksk"; ?></h3>
                  			</div>
					  			<p>SIM KSK memiliki <?php echo "$total_ekbisksk"; ?> Nama KSK</p>
                  		</div>
                        <?php $tampil=mysql_query("select * from kelas order by kode_ksk desc");
                        $total_kelas=mysql_num_rows($tampil);
                    ?>
                   <!--  <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                                <h3><a href="kesehatan.php" class="btn btn-lg btn-info">Nama KSK Kesehatan</a></h3>
                  <span class="glyphicon glyphicon-book"></span>
                  <h3><?php echo "$total_kesehatanksk"; ?></h3>
                        </div>
                  <p>SIM KSK memiliki <?php echo "$total_kesehatanksk"; ?> Nama KSK KESEHATAN</p>
                      </div>
                        <?php $tampil=mysql_query("select * from kesehatanksk order by kode_ksk desc");
                        $total_kesehatanksk=mysql_num_rows($tampil);
                    ?>
                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                                <h3><a href="it.php" class="btn btn-lg btn-info">Nama KSK IT</a></h3>
                  <span class="glyphicon glyphicon-book"></span>
                  <h3><?php echo "$total_itksk"; ?></h3>
                        </div>
                  <p>SIM KSK memiliki <?php echo "$total_itksk"; ?> Nama KSK IT</p>
                      </div>
                        <?php $tampil=mysql_query("select * from itksk order by kode_ksk desc");
                        $total_itksk=mysql_num_rows($tampil);
                    ?> -->
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
                                <h3><a href="kelas.php" class="btn btn-lg btn-warning">Kelas</a></h3>
					  			<span class="glyphicon glyphicon-home"></span>
					  			<h3><?php echo "$total_kelas"; ?></h3>
                  			</div>
					  			<p>SIM KSK memiliki <?php echo "$total_kelas"; ?> Kelas</p>
                  		</div>
                        <?php $tampil=mysql_query("select * from user order by user_id desc");
                        $total_admin=mysql_num_rows($tampil);
                    ?>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
                                <h3><a href="admin.php" class="btn btn-lg btn-success">Admin</a></h3>
					  			<span class="glyphicon glyphicon-lock"></span>
					  			<h3><?php echo "$total_admin"; ?></h3>
                  			</div>
					  			<p>SIM KSK memiliki <?php echo "$total_admin"; ?> Orang Admin</p>
                  		</div>
                  	
                  	</div><!-- /row mt -->	
                    				
                    <div class="row">
						<!-- Info Data siswa Terbaru -->
					<!-- <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Data Mahasiswa Baru</h3> 
                        </div>
                        <div class="panel-body">
                        <div class="table-responsive">
                    <?php
                    $tampil=mysql_query("select * from siswa order by kode_siswa desc limit 1");
                    ?>
                  <table class="table table-bordered table-hover table-striped tablesorter">
                  
                      <tr>
                        <th>Nama Siswa <i class="fa fa-sort"></i></th>
                        <th>Jenis Kelamin <i class="fa fa-sort"></i></th>
                        <th>Nama KSK <i class="fa fa-sort"></i></th>
                        <th>Telepon <i class="fa fa-sort"></i></th>
                      </tr>
                     <?php while($data=mysql_fetch_array($tampil))
                    { ?>
                    <tr>
                    <td><i class="fa fa-user"></i> <?php echo $data['nama_siswa']; ?></td>
                    <td><?php echo $data['kelamin'];?></td>
                    <td><?php echo $data['nama_ksk']; ?></td>
                    <td><?php echo $data['no_telepon'];?></td>
                    <?php   
              }
              ?> -->
                   </tbody>
                   
                   </table>
                   </div>
              </div> 
              </div>
            </div><!-- col-lg-12-->
                                        		
					</div><!-- /row -->
					
					<div class="row mt">
                      <!--CUSTOM CHART START -->
                      <div class="border-head">
                          
                      </div>
                      
					</div><!-- /row -->	
					
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                  <div class="col-lg-3 ds">
						<h3>DATA DOSEN</h3>
                                        
                        <?php
                        $tampil=mysql_query("select * from guru order by kode_dosen desc limit 5");
                        while($data=mysql_fetch_array($tampil))
                    {
                        ?>
                      <!-- First Action -->
                      <div class="desc">
                      	<div class="thumb">
                      		<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                      	</div>
                      	<div class="details">
                      		<p><muted>Nip :<?php echo $data['nip']; ?></muted><br/>
                      		   <a href="#">Nama Dosen : <?php echo $data['nama_dosen']; ?>  </a> <br/> Jenis Kelamin : <?php echo $data['kelamin']; ?><br/>
                      		</p>
                      	</div>
                      </div>
                      <?php } ?>

                        
                      
                  </div><!-- /col-lg-3 -->
              </div><!--/row -->
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <?php include "footer.php"; ?>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
	<script src="assets/js/zabuto_calendar.js"></script>	
	
		
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  

  </body>
</html>
