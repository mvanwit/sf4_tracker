(function(){

	angular.module('matchService', [])

	.factory('Match', function($http) {

		return {
			// get all the matches
			get : function() {
				return $http.get('/api/matches');
			},

			// save a match (pass in match data)
			save : function(matchData) {
				return $http({
					method: 'POST',
					url: '/api/matches',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param(matchData)
				});
			},

			//get a match
			show : function(id) {
				return $http.get('/api/matches' + id);
			},
			
			// destroy a match
			destroy : function(id) {
				return $http.delete('/api/matches/' + id);
			}
		}

	});

})();