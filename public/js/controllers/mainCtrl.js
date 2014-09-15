(function(){

	angular.module('mainCtrl', [])

	// inject the Match service into our controller
	.controller('mainController', function($scope, $http, Match) {
		// object to hold all the data for the new match form
		$scope.matchData = {};

		// loading variable to show the spinning loading icon
		$scope.loading = true;

		// get all the matches first and bind it to the $scope.matches object
		// use the function we created in our service
		// GET ALL MATCHES ====================================================
		Match.get()
			.success(function(data) {
				$scope.matches = data;
				$scope.loading = false;
			});

		// function to handle submitting the form
		// SAVE A MATCH ======================================================
		$scope.submitMatch = function() {
			$scope.loading = true;

			// save the match. pass in match data from the form
			// use the function we created in our service
			Match.save($scope.matchData)
				.success(function(data) {

					// if successful, we'll need to refresh the match list
					Match.get()
						.success(function(getData) {
							$scope.matches = getData;
							$scope.loading = false;
						});

				})
				.error(function(data) {
					console.log(data);
				});
		};

		// get a single match and bind it to the $scope.matches object
		// use the function we created in our service
		// SHOW A MATCH ======================================================
		Match.show(id)
			.success(function(data) {
				$scope.matches = data;
				$scope.loading = false;
			});

		// function to handle deleting a match
		// DELETE A MATCH ====================================================
		$scope.deleteMatch = function(id) {
			$scope.loading = true; 

			// use the function we created in our service
			Match.destroy(id)
				.success(function(data) {

					// if successful, we'll need to refresh the match list
					Match.get()
						.success(function(getData) {
							$scope.matches = getData;
							$scope.loading = false;
						});

				});
		};

	});


})();