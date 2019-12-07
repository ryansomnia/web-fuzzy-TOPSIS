<ul class="sidebar navbar-nav">
	<li class="nav-item active">
		<a class="nav-link" href="index.php"><i class="fas fa-fw fa-tachometer-alt"></i><span>Home</span></a>
    </li>
		
    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i><span>Main Menu</span>
          </a>
		  
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
				<h6 class="dropdown-header">Menu <?php echo $_SESSION["cstatus"];?>:</h6>
				
      <?php
if($_SESSION["cstatus"]=="Admin"){	
      echo"
	  <div class='dropdown-divider'></div>
	  <a class='dropdown-item' href='?mnu=user'>User</a>
	  <a class='dropdown-item' href='?mnu=kriteria'>Kriteria</a>
	  <a class='dropdown-item' href='?mnu=ruko'>Ruko</a>
	  <div class='dropdown-divider'></div>
	  <a class='dropdown-item' href='?mnu=pengujian'>Pengujian</a>
	  <a class='dropdown-item' href='?mnu=arsip'>Arsip</a>
	  ";	 
	}
else if($_SESSION["cstatus"]=="User"){	
      echo"
	  <div class='dropdown-divider'></div>
	  <a class='dropdown-item' href='?mnu=profil'>Profil</a>
	  <a class='dropdown-item' href='?mnu=pruko'>Ruko</a>
	  <div class='dropdown-divider'></div>
	  <a class='dropdown-item' href='?mnu=ppengujian'>Pengujian</a>
	  <a class='dropdown-item' href='?mnu=parsip'>Arsip</a>
	  ";	 
	}	
	
	
	/*
	<li class="nav-item">
       <a class="nav-link" href="?mnu=mytable"><i class="fas fa-fw fa-table"></i><span>Report</span></a>
    </li>
	<li class="nav-item">
       <a class="nav-link" href="?mnu=mychart"><i class="fas fa-fw fa-chart-area"></i><span>Charts</span></a>
    </li>
	*/
      ?>

         </div>
    </li>
    
	
	
	
	<?php
	if(isset($_SESSION["cid"])){
		echo"<li class='nav-item'><a class='nav-link' href='#' data-toggle='modal' data-target='#logoutModal'><i class='fas fa-fw fa-chart-area'></i><span>LogOut</span></a></li>";
	}
	else{
	echo"<li class='nav-item'>
       <a class='nav-link' href='hlogin.php'><i class='fas fa-fw fa-chart-area'></i><span>Login</span></a>
    </li>	";
	}
	?>
	
	
	
</ul>