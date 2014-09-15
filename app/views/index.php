<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel and Angular Tracker System for SF4</title>

	<!-- CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->
	<style>
		body 		{ padding-top:30px; }
		form 		{ padding-bottom:20px; }
		.comment 	{ padding-bottom:20px; }
	</style>

</head>
<!-- declare our angular app and controller -->
<body class="container" ng-app="sf4TrackerApp" ng-controller="mainController">
<div class="col-md-8 col-md-offset-2">

	<!-- PAGE TITLE =============================================== -->
	<div class="page-header">
		<h2>Laravel and Angular Single Page Application</h2>
		<h4>Match History</h4>
	</div>

	<!-- LOADING ICON =============================================== -->
	<!-- show loading icon if the loading variable is set to true -->
	<p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

	<!-- THE MATCHES =============================================== -->
	<!-- hide these matches if the loading variable is true -->
	<div class="match" ng-repeat="match in matches">
		<h3>Match #{{ match.id }}</h3>
		<p>{{ match.myChar }} VS {{ match.opponentChar }} - <strong>{{ match.result }}</strong></p>
		
		<p><a href="#" ng-click="deleteMatch(match.id)" class="text-muted">Delete</a></p>
	</div>
	
	<!-- NEW MATCH FORM =============================================== -->
	<form name="newMatchForm" ng-submit="newMatchForm.$valid && submitMatch()"> <!-- ng-submit will disable the default form action and, use our function if the form is valid -->
		
		<!-- MY CHARACTER -->
		<fieldset class="form-group">
		    <label for="myChar">My Character</label>
		    <select name="myChar" ng-model="matchData.myChar" required>
		    	<option value="Akuma">Akuma</option>
		    	<option value="Juri">Juri</option>
		    	<option value="Zangief">Zangief</option>
		    </select>
		</fieldset>

		<!-- OPPONENT CHARACTER -->
		<fieldset class="form-group">
		    <label for="opponentChar">Opponent Character</label>
		    <select name="opponentChar" ng-model="matchData.opponentChar" required>
		    	<option value="Akuma">Akuma</option>
		    	<option value="Juri">Juri</option>
		    	<option value="Zangief">Zangief</option>
		    </select>
		</fieldset>
		
		<!-- RESULT -->
		<fieldset class="form-group">
		    <label for="result">Result</label>
		    <select name="result" ng-model="matchData.result" required>
		        <option value="Win">Win</option>
		        <option value="Loss">Loss</option>
		        <option value="Draw">Draw</option>
		    </select>
		</fieldset>
		
		<!-- SUBMIT BUTTON -->
		<fieldset class="form-group">	
			<button type="submit" class="btn btn-primary btn-lg">Submit</button>
		</fieldset>

	</form>




</div>

	<!-- JS -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script> <!-- load angular -->

	<!-- ANGULAR -->
	<!-- all angular resources will be loaded from the /public folder -->
		<script src="js/controllers/mainCtrl.js"></script> <!-- load our controller -->
		<script src="js/services/matchService.js"></script> <!-- load our service -->
		<script src="js/app.js"></script> <!-- load our application -->
</body>
</html>