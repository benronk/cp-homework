<!DOCTYPE html>
<html ng-app="cp-homework" lang="en">
<head>
	<title>cp-homework</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" />
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" />

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js" type="text/javascript"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.10/angular.min.js" type="text/javascript"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>

<div ng-controller="MyController" class="container">
	<div class="page-header"><h1><a href="http://cphw.frostymugsoftware.com">cp-homework</a></h1></div>
	<div class="row">
		<p class="btn-group">
			<a class="btn btn-default" role="button" href="">New</a>
			<a ng-repeat="p in persons" class="btn btn-default" role="button" href="/{{p.id}}" title="{{p.firstname}} {{p.lastname}}">{{p.id}}</a>
		</p>
	</div>
	<div class="row">
		<div class="col-md-6">
			<form class="form-horizontal" role="form">
				<div class="form-group">
					<label class="col-md-2 control-label" for="firstname">Firstname</label>
					<div class="col-md-8">
						<input type="text" ng-model="person.firstname" class="form-control" placeholder="Firstname" required />
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label" for="lastname">Lastname</label>
					<div class="col-md-8">
						<input type="text" ng-model="person.lastname" class="form-control" id="lastname" placeholder="Lastname" required />
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label" for="email">Email</label>
					<div class="col-md-8">
						<input type="email" ng-model="person.email" class="form-control" id="email" placeholder="Email" required />
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Sex </label>
					<div class="col-md-8">
						<label class="radio-inline">
							<input type="radio" ng-model="person.sex" ng-value="'M'" /> Male
						</label>
						<label class="radio-inline">
							<input type="radio" ng-model="person.sex" ng-value="'F'" /> Female
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label" for="city">City/State</label>
					<div class="col-md-4">
						<input type="text" ng-model="person.city" class="form-control" id="city" placeholder="City" required />
					</div>
					<div class="col-md-4">
						<select ng-model="person.state" class="form-control" required>
							<option value="AL">Alabama</option>
							<option value="AK">Alaska</option>
							<option value="AZ">Arizona</option>
							<option value="AR">Arkansas</option>
							<option value="CA">California</option>
							<option value="CO">Colorado</option>
							<option value="CT">Connecticut</option>
							<option value="DE">Delaware</option>
							<option value="DC">District Of Columbia</option>
							<option value="FL">Florida</option>
							<option value="GA">Georgia</option>
							<option value="HI">Hawaii</option>
							<option value="ID">Idaho</option>
							<option value="IL">Illinois</option>
							<option value="IN">Indiana</option>
							<option value="IA">Iowa</option>
							<option value="KS">Kansas</option>
							<option value="KY">Kentucky</option>
							<option value="LA">Louisiana</option>
							<option value="ME">Maine</option>
							<option value="MD">Maryland</option>
							<option value="MA">Massachusetts</option>
							<option value="MI">Michigan</option>
							<option value="MN">Minnesota</option>
							<option value="MS">Mississippi</option>
							<option value="MO">Missouri</option>
							<option value="MT">Montana</option>
							<option value="NE">Nebraska</option>
							<option value="NV">Nevada</option>
							<option value="NH">New Hampshire</option>
							<option value="NJ">New Jersey</option>
							<option value="NM">New Mexico</option>
							<option value="NY">New York</option>
							<option value="NC">North Carolina</option>
							<option value="ND">North Dakota</option>
							<option value="OH" selected>Ohio</option>
							<option value="OK">Oklahoma</option>
							<option value="OR">Oregon</option>
							<option value="PA">Pennsylvania</option>
							<option value="RI">Rhode Island</option>
							<option value="SC">South Carolina</option>
							<option value="SD">South Dakota</option>
							<option value="TN">Tennessee</option>
							<option value="TX">Texas</option>
							<option value="UT">Utah</option>
							<option value="VT">Vermont</option>
							<option value="VA">Virginia</option>
							<option value="WA">Washington</option>
							<option value="WV">West Virginia</option>
							<option value="WI">Wisconsin</option>
							<option value="WY">Wyoming</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label" for="comments">Comments</label>
					<div class="col-md-8">
						<textarea ng-model="person.comments" class="form-control" rows="3" placeholder="Comments" required ></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Hobbies</label>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Cycling</label>
					<div class="col-md-8">
						<label class="radio-inline">
							<input type="radio" ng-model="person.hobby_cycling" ng-value="1" /> Yes
						</label>
						<label class="radio-inline">
							<input type="radio" ng-model="person.hobby_cycling" ng-value="0" /> No
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Frisbee</label>
					<div class="col-md-8">
						<label class="radio-inline">
							<input type="radio" ng-model="person.hobby_frisbee" ng-value="1" /> Yes
						</label>
						<label class="radio-inline">
							<input type="radio" ng-model="person.hobby_frisbee" ng-value="0" /> No
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Skiing</label>
					<div class="col-md-8">
						<label class="radio-inline">
							<input type="radio" ng-model="person.hobby_skiing" ng-value="1" /> Yes
						</label>
						<label class="radio-inline">
							<input type="radio" ng-model="person.hobby_skiing" ng-value="0" /> No
						</label>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-6">
			<h4>Selected Person</h4>
			<pre>{{person | json}}</pre>
			<h4>All Persons</h4>
			<pre>{{persons | json}}</pre>
		</div>
	</div>
</div>

<script>
	var app = angular.module('cp-homework', []);
	
	app.factory("queryParams", function() {
		var qs = (function(a) {
			if (a == "") return {};
			var b = {};
			for (var i = 0; i < a.length; ++i)
			{
				var p=a[i].split('=');
				if (p.length != 2) continue;
				b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
			}
			return b;
		})(window.location.search.substr(1).split('&'));

		return qs;
	});

	app.controller('MyController', function($scope, queryParams) {
		
		$scope.person = <?php echo $person ?>;
		$scope.persons = <?php echo $persons ?>;

		$scope.load = function() {
			//console.log("inside load", queryParams.id, queryParams.id != null, angular.isNumber(queryParams.id));
			/*if (queryParams.id != null && angular.isNumber(parseInt(queryParams.id))) {
				$scope.person = $scope.persons[parseInt(queryParams.id)-1];
			}*/
		};
		//$scope.load();
	});
</script>
</body>
</html>
