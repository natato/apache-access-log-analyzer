<html Doctype html>
	<head>
		<?php include_once("header.php");?>
		<style>
			.container{
				width:90%;
				margin:0 auto;
			}
			.col-md-3,.col-sm-7,.col-md-4,.col-md-7,.col-md-5{
				padding:5px;
			}
			select[name="incident-type"]{
				width:18rem;
			}
			#incident-details{
				overflow: scroll;
				height:12rem;
			}
		</style>
	</head>
	<body>
		<div class="container">
			 <?php include_once("menu.php");?>
			<div class="row">
				<h5>Incidents</h5>
				<div class="col-md-3 col-sm-7">
					<div class="card" style="width:99%;min-height:6rem;">
					  	<div class="card-body">
					    	<h5 class="card-title">Recent</h5>
					    	<h6 class="card-subtitle mb-2 text-muted">Updated every 5 minutes</h6>
					    	<p class="card-text">
					    		<b>(403)</b>Forbidden
					    	</p>
					  	</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-7">
					<div class="card" style="width: 99%;min-height:6rem;">
					  	<div class="card-body">
					    	<h5 class="card-title">Weekly</h5>
					    	<h6 class="card-subtitle mb-2 text-muted">Past Week - Updated Daily</h6>
					    	<p class="card-text">
						    	<b>20</b> Incidents
					    	</p>
					  	</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-7">
					<div class="card" style="width: 99%;min-height:6rem;">
					  	<div class="card-body">
					    	<h5 class="card-title">Monthly</h5>
					    	<h6 class="card-subtitle mb-2 text-muted">Past Month - Updated Weekly</h6>
					    	<p class="card-text">
						    	<b>300</b> Incidents
					    	</p>

					  	</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-7">
					<div class="card" style="width: 99%;min-height:6rem;">
					  	<div class="card-body">
					    	<h5 class="card-title">Yearly</h5>
					    	<h6 class="card-subtitle mb-2 text-muted">Past Year -Updated Monthly</h6>
					    	<p class="card-text">
						    	<b>1500</b> Incidents
					    	</p>

					  	</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-7 col-sm-12">
					<div class="card" style="width: 100%;min-height:8rem;">
					  	<div class="card-body">
					    	<h5 class="card-title">Incident Details</h5>
					    	<div class="card-subtitle mb-2 text-muted">
					    		<div class="row">
						    		<h6 class="col-md-3 col-sm-5">Select Type:</h6>
						    		<select name="incident-type" class="form-control col-md-5 col-sm-7">
						    				<option>Recent</option>
						    				<option>Weekly</option>
						    				<option>Monthly</option>
						    				<option>Yearly</option>

						    		</select>
					    		</div>
					    	</div>
					    	<p class="card-text" id="incident-details">
					    		<table class="table table-hover">
					    			<thead><tr><th>Remote Host</th><th>Incident</th><th>Happened At</th></tr></thead>
					    			<tbody>
					    				<tr><td>126.186.2.5</td><td><b>(403)</b>Forbidden</td><td>2024-11-04 12:12:50</td></tr>
					    				<tr><td>126.186.2.5</td><td><b>(403)</b>Forbidden</td><td>2024-11-04 12:12:50</td></tr>
					    				<tr><td>126.186.2.5</td><td><b>(403)</b>Forbidden</td><td>2024-11-04 12:12:50</td></tr>
					    				<tr><td>126.186.2.5</td><td><b>(403)</b>Forbidden</td><td>2024-11-04 12:12:50</td></tr>
					    				<tr><td>126.186.2.5</td><td><b>(403)</b>Forbidden</td><td>2024-11-04 12:12:50</td></tr>
									</tbody>
								</table>
					    	</p>
					    	<!--
					    	<a href="#" class="card-link">Card link</a>
					    	<a href="#" class="card-link">Another link</a>
					    -->
					  	</div>
					</div>
				</div>
				<div class="col-md-5 col-sm-12">
					<div class="card" style="width:90%;min-height:10rem;">
						<div class="card-body">
						   	<h5 class="card-title">Simple Linear Regression Model</h5>
						    <div class="card-subtitle mb-2 text-muted">
						    	<div class="row">
						    		<h6 class="col-md-3 col-sm-5">Duration:</h6>
						    		<select name="incident-type" class="form-control col-md-5 col-sm-7">
						    				<option>Current Day</option>
						    				<option>Past Week</option>
						    				<option>Past Month</option>
						    				<option>Past Year</option>

						    		</select>
					    		</div>
						    </div>
						    <p class="card-text">
						    	<b>x-axis(x): </b> Number of Request<br>
						    	<b>y-axis(y):</b>	Total size of response object<br>
						    	<b>Gradient: </b> 4.5<br>
						    	<b>y-intercept:</b> 300.5<br>
						    	<b>y=4.4x+300.5</b><br>
						    </p>

						</div>
					</div>
				</div>
			</div>
		</div>
	</body>	
</html>