<!DOCTYPE html>
<html lang="en">


<!-- index22:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>COUDY'S CLINIC</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?= WEB_ROUTE.'assets/css/font-awesome.min.css'?>">
    <link rel="stylesheet" href="<?= WEB_ROUTE.'assets/css/bootstrap.min.css'?>">
    <link rel="stylesheet" href="<?= WEB_ROUTE.'assets/css/style.css'?>">
    <style>
        .navbar-expand-md {
    -ms-flex-flow: row nowrap;
    flex-flow: row nowrap;
    -ms-flex-pack: start;
    justify-content: flex-start;
    margin-left: -17px;
    margin-top: 91px;
}
    </style>

    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
<div class="row">
<div  class="col-md-1 mt-2">
<?php require_once(ROUTE_DIR.'views/inc/menu.html.php')?>

</div>
<div  class="col-md-11">
    <div class="main-wrapper">
        <div class="page-wrapper">
            
            <div class="content">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                        <span class="dash-widget-bg1"><i class="fa fa-user-md" aria-hidden="true"></i></span>
							<div class="dash-widget-info text-right">
								<h3><?=$now_medecin[0]['user']?></h3>
								<span class="widget-title">Doctors <i class="fa fa-check" aria-hidden="true"></i></span>
                                
							</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fas fa-hospital-user"></i></span>
                            <div class="dash-widget-info text-right">
                                <?php $nbre_patients=nbre_patient('patient')?>
                                <h3><?=$nbre_patients[0]['patient']?></h3>
                                <span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fas fa-stethoscope"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?=$consultation_now[0]['consultation']?></h3>
                                <span class="widget-title3">Consultations <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?=$prestation_now[0]['consultation']?></h3>
                                <span class="widget-title4">Prestation <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="row">
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card">
							<div class="card-body">
								<div class="chart-title">
									<h4>Patient Total</h4>
									<span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% Higher than Last Month</span>
								</div>	
								<canvas id="linegraph"></canvas>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card">
							<div class="card-body">
								<div class="chart-title">
									<h4>Patients In</h4>
									<div class="float-right">
										<ul class="chat-user-total">
											<li><i class="fa fa-circle current-users" aria-hidden="true"></i>ICU</li>
											<li><i class="fa fa-circle old-users" aria-hidden="true"></i> OPD</li>
										</ul>
									</div>
								</div>	
								<canvas id="bargraph"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-6 col-md-6 col-lg-6 col-xl-6 ">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block">Liste des consultations de la journee</h4>                              <button type="submit" class="btn text-light ml-4" style="margin-top: 1%; "><i class="bi bi-search image"></i>Rechercher</button>
							</div>
							<div class="card-body p-0">
								<div class="table-responsive">
									<table class="table mb-0">
										<thead class="d-none">
											<tr>
												<th>Patient Name</th>
												<th>Doctor Name</th>
												<th>Timing</th>
												<th class="text-right">Status</th>
											</tr>
										</thead>
										<tbody>
											<tr>  
												<td>

													<h5 class="time-title p-0">Etat Consultation</h5>
                                                    <?php foreach($liste_consultation_now as $liste):?>              
													<p><?= ucfirst($liste['etat_consultation'])?></p>
                                                    <?php endforeach?>

												</td>
												<td>
													<h5 class="time-title p-0">Constante Consultation</h5>
													<?php foreach($liste_consultation_now as $liste):?>              
													<p><?= ucfirst($liste['constantes_consultation'])?></p>
                                                    <?php endforeach?>
												</td>
												<td class="text-right">
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-6 col-md-6 col-lg-6 col-xl-6 ">
                        <div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block">Liste des prestations de la journee</h4>                              <button type="submit" class="btn text-light ml-4" style="margin-top: 1%; "><i class="bi bi-search image"></i>Rechercher</button>
							</div>
							<div class="card-body p-0">
								<div class="table-responsive">
									<table class="table mb-0">
										<thead class="d-none">
											<tr>
												<th>Patient Name</th>
												<th>Doctor Name</th>
												<th>Timing</th>
												<th class="text-right">Status</th>
											</tr>
										</thead>
										<tbody>
											<tr>                
												<td>
													<h5 class="time-title p-0">Nom Prestation</h5>
                                                    
													<?php foreach($liste_prestation_now as $listes):?>              
													<p><?= ucfirst($listes['nom_prestation'])?></p>
                                                    <?php endforeach?>
                                                   
												</td>
												<td>
													<h5 class="time-title p-0">Etat Prestation</h5>
													<?php foreach($liste_prestation_now as $listes):?>              
													<p><?= ucfirst($listes['etat_prestation'])?></p>
                                                    <?php endforeach?>
												</td>
												<td class="text-right">
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
                    </div>
				</div>

            </div>
            
        </div>
    </div>
</div>
</div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/app.js"></script>

</body>


<!-- index22:59-->
</html>