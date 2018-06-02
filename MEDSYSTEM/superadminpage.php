<?php
session_start();
require("authsuperadmin.php");
if(Authsuperadmin::isLogged()){

}else{
  header('Location:medsystemloginpage.php');
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <title>MEDSYSTEM | DASHBOARD</title>
    <script src="calendrier/js/jquery.min.js"></script> 
    <link href="calendrier/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="./assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
      		});
    </script>
    <link href="./assets/css/dashboard.css" rel="stylesheet" />
    <link href="css/stylemenu.css" rel="stylesheet" />	
    <link rel="stylesheet" type="text/css" href="css/style.css">	
    <script src="./assets/js/dashboard.js"></script>
    <link href="./assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="./assets/plugins/charts-c3/plugin.js"></script>
    <script src="./assets/plugins/input-mask/plugin.js"></script>
    <script src="js/jquery-latest.min.js" type="text/javascript"></script>
    <script src="js/script.js"></script>	
  </head>
  <body class="">
    <div class="page">
      <div class="page-main">
        <div class="header">
          <div class="container">
            <div class="d-flex">
              <a class="navbar-brand" href="./index.html">
                <img src="images/LOGO2.png" style="width:150px; height:23px;" class="navbar-brand-img" alt="tabler.io">
              </a>
              <div class="ml-auto d-flex order-lg-2">
                <div class="dropdown d-none d-md-flex">
						<script>
						function date_heure(id)
						{
								date = new Date;
								h = date.getHours();
								if(h<10)
								{
										h = "0"+h;
								}
								m = date.getMinutes();
								if(m<10)
								{
										m = "0"+m;
								}
								s = date.getSeconds();
								if(s<10)
								{
										s = "0"+s;
								}
								resultathres = ''+h+':'+m+':'+s;
								document.getElementById(id).innerHTML = resultathres;
								setTimeout('date_heure("'+id+'");','1000');
								return true;
						}
						</script>
						 <span id="date_heure"></span>
                         <script type="text/javascript">window.onload = date_heure('date_heure');</script>
                </div>
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0" data-toggle="dropdown">
                    <span class="avatar"> <img src="photo/<?php echo $_SESSION['var1'] ?>"/> </span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default"><?php echo $_SESSION['var4'] ?>  </span>
                      <span class="text-default"><?php echo $_SESSION['var2'] ?>  </span>
                      <small class="text-muted d-block mt-1"> <?php echo $_SESSION['var3'] ?> </small>

                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="medsystemlogoutpage.php">Deconnecter</a>
                  </div>
                </div>
              </div>
            </div>
          </div>		  
        </div>
		<div class="backmenu">
		   <div class="container">
		      <div id='cssmenu'>
		         <ul>
				   <li><a href=''> <i class="fe fe-users"> </i> Utilisateurs</a>
					  <ul>
						 <li><a href='superadminajouterutilisateurs.php'>Ajouter Utilisateur</a></li>
						 <li><a href='superadminvoirutilisateurs.php'>Lister Utilisateurs</a></li>
					  </ul> 
				   </li>
				   <li><a href=''> <i class="fe fe-user-plus"> </i> Patients</a>
					  <ul>
						 <li><a href='supadmcreationdossiers.php'>Creer Dossier</a></li>
						 <li><a href='supadmrechercherdossier.php'>Rechercher Dossier</a></li>
					  </ul>
				   </li>
				   <li><a href='#'> <i class="fe fe-folder-plus"> </i> Rendez-vous</a>
					   <ul>
						 <li><a href='supadmprendrerendezvous.php'>Demande Rendez-vous</a></li>
						 <li><a href='supadmlisterrendezvous.php'>Lister Rendez-vous</a></li>
					  </ul>  
				   </li>
				   <li><a href=''> <i class="fe fe-layers"> </i> Pages Web</a>
					  <ul>
						 <li><a href=''>Ajouter Contenu</a></li>
						 <li><a href=''>Modifier Contenu</a></li>
					  </ul>    
				   </li>
		       </ul>
		     </div>
		  </div>
       </div>	   
        <div class="page-content">
          <div class="container">
            <div class="positionadm">
              <p> <i class="fe fe-home"> </i> Acceuil  <i class="fe fe-chevron-right"> </i> Tableau De Bord </p>
            </div>
            <div class="row row-cards">

          <?php
		  include("bd/connect.php");
          $totaleutilisateurs = $conbd->query("SELECT * FROM logintable");
                    $totale = $totaleutilisateurs->rowcount();
          ?>

              <div class="col-sm-6 col-lg-3">
                <div class="card p-3">
                  <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-blue mr-3">
                      <i class="fe fe-users"></i>
                    </span>
                    <div>
                      <h4 class="m-0"><a><?php echo $totale; ?></a></h4>
                      <small class="text-muted">Utilisateurs</small>
                    </div>
                  </div>
                </div>
              </div>
          <?php
          include("bd/connect.php");
          $totaleDossier = $conbd->query('SELECT * FROM dossiers');
              $totaleDossierCreer = $totaleDossier->rowcount();
          ?>              
              <div class="col-sm-6 col-lg-3">
                <div class="card p-3">
                  <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-green mr-3">
                      <i class="fe fe-folder"></i>
                    </span>
                    <div>
                      <h4 class="m-0"><a><?php echo $totaleDossierCreer; ?></a></h4>
                      <small class="text-muted">Dossiers</small>
                    </div>
                  </div>
                </div>
              </div>
				  <?php
				  include("bd/connect.php");
				  $totaleucb = $conbd->query('SELECT * FROM logintable WHERE statut="Bloquer"');
							$totalecomptebloquer = $totaleucb->rowcount();
				  ?>			  
              <div class="col-sm-6 col-lg-3">
                <div class="card p-3">
                  <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-red mr-3">
                      <i class="fe fe-alert-triangle"></i>
                    </span>
                    <div>
                      <h4 class="m-0"><a><?php echo $totalecomptebloquer; ?></a></h4>
                      <small class="text-muted">Compte Bloquer</small>
                    </div>
                  </div>
                </div>
              </div>
          <?php    
          include("bd/connect.php");
          $totalerdv = $conbd->query('SELECT * FROM rendezvous');
              $totalerendezvous = $totalerdv->rowcount();
          ?>              
              <div class="col-sm-6 col-lg-3">
                <div class="card p-3">
                  <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-yellow mr-3">
                      <i class="fe fe-folder-plus"></i>
                    </span>
                    <div>
                      <h4 class="m-0"><a><?php echo $totalerendezvous; ?></a></h4>
                      <small class="text-muted">Rendez-vous</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
	     	</div>

  <div class="container">
    <div class="row">    
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-8">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Statistiques Dossiers | Rendez-Vous | Patients </h3>
                  </div>
                  <div class="card-body">
                    <div id="chart-employment" style="height: 16rem"></div>
                  </div>
                </div>
                <script>
                  require(['c3', 'jquery'], function(c3, $) {
                  	$(document).ready(function(){
                  		var chart = c3.generate({
                  			bindto: '#chart-employment', // id of chart wrapper
                  			data: {
                  				columns: [
                  				    // each columns data
                  					['data1', 2, 8, 6, 7, 14, 11, 2, 8, 6, 7, 14, 11],
                  					['data2', 5, 15, 11, 15, 21, 25, 5, 15, 11, 15, 21, 25],
                  					['data3', 17, 18, 21, 20, 30, 29, 18, 21, 20, 30, 29, 2]
                  				],
                  				type: 'line', // default type of chart
                  				colors: {
                  					'data1': tabler.colors["orange"],
                  					'data2': tabler.colors["blue"],
                  					'data3': tabler.colors["green"]
                  				},
                  				names: {
                  				    // name of each serie
                  					'data1': 'Centre',
                  					'data2': 'Artibonite',
                  					'data3': 'Ouest'
                  				}
                  			},
                  			axis: {
                  				x: {
                  					type: 'category',
                  					// name of each category
                  					categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun' , 'Jui', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec']
                  				},
                  			},
                  			legend: {
                                  show: false, //hide legend
                  			},
                  			padding: {
                  				bottom: 0,
                  				top: 0
                  			},
                  		});
                  	});
                  });
                </script>       
          </div>
        <div class="col-md-4 span_7"> 
          <div class="cal1 cal_2"><div class="clndr"><div class="clndr-controls"><div class="clndr-control-button"><p class="clndr-previous-button">previous</p></div><div class="month">July 2015</div><div class="clndr-control-button rightalign"><p class="clndr-next-button">next</p></div></div><table class="clndr-table" border="0" cellspacing="0" cellpadding="0"><thead><tr class="header-days"><td class="header-day">S</td><td class="header-day">M</td><td class="header-day">T</td><td class="header-day">W</td><td class="header-day">T</td><td class="header-day">F</td><td class="header-day">S</td></tr></thead><tbody><tr><td class="day adjacent-month last-month calendar-day-2015-06-28"><div class="day-contents">28</div></td><td class="day adjacent-month last-month calendar-day-2015-06-29"><div class="day-contents">29</div></td><td class="day adjacent-month last-month calendar-day-2015-06-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-01"><div class="day-contents">1</div></td><td class="day calendar-day-2015-07-02"><div class="day-contents">2</div></td><td class="day calendar-day-2015-07-03"><div class="day-contents">3</div></td><td class="day calendar-day-2015-07-04"><div class="day-contents">4</div></td></tr><tr><td class="day calendar-day-2015-07-05"><div class="day-contents">5</div></td><td class="day calendar-day-2015-07-06"><div class="day-contents">6</div></td><td class="day calendar-day-2015-07-07"><div class="day-contents">7</div></td><td class="day calendar-day-2015-07-08"><div class="day-contents">8</div></td><td class="day calendar-day-2015-07-09"><div class="day-contents">9</div></td><td class="day calendar-day-2015-07-10"><div class="day-contents">10</div></td><td class="day calendar-day-2015-07-11"><div class="day-contents">11</div></td></tr><tr><td class="day calendar-day-2015-07-12"><div class="day-contents">12</div></td><td class="day calendar-day-2015-07-13"><div class="day-contents">13</div></td><td class="day calendar-day-2015-07-14"><div class="day-contents">14</div></td><td class="day calendar-day-2015-07-15"><div class="day-contents">15</div></td><td class="day calendar-day-2015-07-16"><div class="day-contents">16</div></td><td class="day calendar-day-2015-07-17"><div class="day-contents">17</div></td><td class="day calendar-day-2015-07-18"><div class="day-contents">18</div></td></tr><tr><td class="day calendar-day-2015-07-19"><div class="day-contents">19</div></td><td class="day calendar-day-2015-07-20"><div class="day-contents">20</div></td><td class="day calendar-day-2015-07-21"><div class="day-contents">21</div></td><td class="day calendar-day-2015-07-22"><div class="day-contents">22</div></td><td class="day calendar-day-2015-07-23"><div class="day-contents">23</div></td><td class="day calendar-day-2015-07-24"><div class="day-contents">24</div></td><td class="day calendar-day-2015-07-25"><div class="day-contents">25</div></td></tr><tr><td class="day calendar-day-2015-07-26"><div class="day-contents">26</div></td><td class="day calendar-day-2015-07-27"><div class="day-contents">27</div></td><td class="day calendar-day-2015-07-28"><div class="day-contents">28</div></td><td class="day calendar-day-2015-07-29"><div class="day-contents">29</div></td><td class="day calendar-day-2015-07-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-31"><div class="day-contents">31</div></td><td class="day adjacent-month next-month calendar-day-2015-08-01"><div class="day-contents">1</div></td></tr></tbody></table></div></div>
        </div>
    </div>
   </div>
 </div>
  </div>
    <div class="col-md-6 col_4">
      <!----Calender -------->
      <link rel="stylesheet" href="calendrier/css/clndr.css" type="text/css" />
      <script src="calendrier/js/underscore-min.js" type="text/javascript"></script>
      <script src= "calendrier/js/moment-2.2.1.js" type="text/javascript"></script>
      <script src="calendrier/js/clndr.js" type="text/javascript"></script>
      <script src="calendrier/js/site.js" type="text/javascript"></script>
      <!----End Calender -------->
    </div>
          </div>
        </div>
      </div>


    </div>
  </body>
</html>