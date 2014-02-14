<!DOCTYPE html>
<html ng-app="cp-homework" lang="en">
<head>
	<title>cp-homework</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" />
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" />

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js" type="text/javascript"></script>
	<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.12/angular.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>

<div ng-controller="MyController" class="container">
	<div class="page-header"><h1><a href="http://cphw.frostymugsoftware.com">cp-homework</a></h1></div>
	<div class="row" ng-hide="true" ng-cloak>
		<p class="btn-group">
			<a class="btn btn-default" role="button" href="/">New</a>
			<a ng-repeat="p in persons" class="btn btn-default" role="button" href="/{{p.id}}" title="{{p.firstname}} {{p.lastname}}">{{p.id}}</a>
		</p>
	</div>
	<div class="row" ng-cloak>
		<div class="col-md-6">
			<div class="row"><h2>{{formHeader}}</h2></div>
			<div class="row alert alert-danger col-md-11" ng-hide="response.errors == null">
				<span><strong>Errors:</strong></span>
				<ul>
					<li ng-repeat="e in response.errors">{{e}}</li>
				</ul>
			</div>
			<div class="row alert alert-success alert-dismissable col-md-11" ng-hide="successMessage == null">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				{{successMessage}}
			</div>

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
					<label class="col-md-2 control-label">Hobbies:</label>
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
				<div class="form-group">
					<div class="col-md-offset-2 col-md-8">
						<button class="btn btn-primary" ng-click="submit()">{{submitButtonName}}</button>
						<a class="btn btn-default" href="/">New Person</a>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-6">
			<div class="row">
				<h4>Persons</h4>
				<ol>
					<li ng-repeat="p in persons"><a href="/{{p.id}}">{{p.firstname}} {{p.lastname}}</a></li>
				</ol>
			</div>
			<div class="row" ng-hide="response == null">
				<h4>Response</h4>
				<pre class="pre-scrollable">{{response | json}}</pre>
			</div>
		</div>
	</div>
</div>

<script>
	var app = angular.module('cp-homework', []);
	
	app.controller('MyController', function($scope, $http) {
		
		$scope.person = <?php echo $person ?>;
		$scope.persons = <?php echo $persons ?>;

		$scope.setupForm = function() {
			if ($scope.person.id != null) {
				$scope.formHeader = "Editing: " + $scope.person.firstname + " " + $scope.person.lastname;
				$scope.submitButtonName = "Edit";
			} else {
				$scope.formHeader = "Create new person";
				$scope.submitButtonName = "Create";
			}
		};
		$scope.setupForm();

		$scope.submit = function() {
			console.log($scope.person);
			$http({
				method: 'POST',
				url: '/upsert',
				data: $.param($scope.person),
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			})
			.success(function(data) {
				$scope.response = data;

				if (data.errors == null) {
					// no errors!
					$scope.setupForm();
					if ($scope.person.id != null && data.person != null) {
						$scope.person = data.person;
						$scope.successMessage = "You successfully edited " + $scope.person.firstname + " " + $scope.person.lastname;
					} else {
						// clear the form so we can insert another
						$scope.person = {};
						$scope.successMessage = "You successfully inserted a new person.";
					}
				} else {
					// Show error message(s). Leave the form untouched.
					$scope.successMessage = null;
				}

				$scope.persons = data.persons;
			})
			.error(function(data) {
				console.log("error", data);
			});
		};
	});
</script>
</body>
</html>