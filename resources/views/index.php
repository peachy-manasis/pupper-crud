<!DOCTYPE html>
<html lang="en-US" ng-app="pupperRecords">
<head>
    <title>Laravel 5 AngularJS CRUD Example</title>

    <!-- Load Bootstrap CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
<h2>Puppers Database</h2>
<div  ng-controller="puppersController">

    <!-- Table-to-load-the-data Part -->
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Add New Pupper</button></th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="pupper in puppers">
            <td>{{  pupper.id }}</td>
            <td>{{ pupper.name }}</td>
            <td>
                <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', pupper.id)">Edit</button>
                <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(pupper.id)">Delete</button>
            </td>
        </tr>
        </tbody>
    </table>
    <!-- End of Table-to-load-the-data Part -->
    <!-- Modal (Pop up when detail button clicked) -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{form_title}}</h4>
                </div>
                <div class="modal-body">
                    <form name="frmPuppers" class="form-horizontal" novalidate="">

                        <div class="form-group error">
                            <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control has-error" id="name" name="name" placeholder="Fullname" value="{{name}}"
                                       ng-model="pupper.name" ng-required="true">
                                <span class="help-inline"
                                      ng-show="frmPuppers.name.$invalid && frmPuppers.name.$touched">Name field is required</span>
                            </div>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmPuppers.$invalid">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
<script src="<?= asset('https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js') ?>"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- AngularJS Application Scripts -->
<script src="<?= asset('app/app.js') ?>"></script>
<script src="<?= asset('app/controllers/puppers.js') ?>"></script>
</body>
</html>