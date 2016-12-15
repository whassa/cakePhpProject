<?php $this->Html->script('app', ['block' => 'lastScript']); ?>
<br>
<br>
<br>
<!-- page content and controls will be here -->
<div class="container" ng-app="myApp" ng-controller="evenementsCtrl">
    <div class="row">
        <div class="col s12">
            <h4>Evenements</h4>
            <!-- used for searching the current list -->

            <!-- table that shows evenement record list -->
            <table class="hoverable bordered">

                <thead>
                    <tr>
                        <th class="width-30-pct">Name</th>
                    </tr>
                </thead>

                <tbody ng-init="getAll()">
                    <tr ng-repeat="d in names">
                        <td>{{d.name}}</td>
                        <td>
                            <a ng-click="readOne(d.id)" class="waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">edit</i>Edit</a>
                            <a ng-click="deleteevenement(d.id)" class="waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">delete</i>Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- modal for for creating new evenement -->
            <div id="modal-evenement-form" class="modal">
                <div class="modal-content">
                    <h4 id="modal-evenement-title">Create New evenement</h4>
                    <div class="row">
                        <div class="input-field col s12">
                            <input ng-model="name" type="text" class="validate" id="form-name" placeholder="Type name here..." />
                            <label for="name">Name</label>
                        </div>
                        <div class="input-field col s12">
                            <a id="btn-create-evenement" class="waves-effect waves-light btn margin-bottom-1em" ng-click="createevenement()"><i class="material-icons left">add</i>Create</a>
                             <a id="btn-update-evenement" class="waves-effect waves-light btn margin-bottom-1em" ng-click="updateevenement()"><i class="material-icons left">edit</i>Save Changes</a>
							<a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">close</i>Close</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col s12 -->
    </div> <!-- end row -->
	<div class="row">
        <div class="col s12">
            <h4>Evenements Finis</h4>
            <!-- used for searching the current list -->

            <!-- table that shows evenement record list -->
            <table class="hoverable bordered">

                <thead>
                    <tr>
                        <th class="width-30-pct">Name</th>
                    </tr>
                </thead>

                <tbody ng-init="getAllFinish()">
                    <tr ng-repeat="g in swags">
                        <td>{{g.name}}</td>
                    </tr>
            </tbody>
     </table>
<!-- end container -->
<!-- floating button for creating evenement -->
<div class="fixed-action-btn" style="bottom:45px; right:24px;">
    <a class="waves-effect waves-light btn modal-trigger btn-floating btn-large red" href="#modal-evenement-form" ng-click="showCreateForm()"><i class="large material-icons">add</i></a>
</div>
</div> 
