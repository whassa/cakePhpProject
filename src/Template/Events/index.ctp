<?php $this->Html->script('app', ['block' => 'lastScript']); ?>

<!-- page content and controls will be here -->
<div class="container" ng-app="myApp" ng-controller="eventsCtrl">
    <div class="row">
        <div class="col s12">
            <h4>events</h4>
            <!-- used for searching the current list -->
            <input type="text" ng-model="search" class="form-control" placeholder="Search event..." />

            <!-- table that shows event record list -->
            <table class="hoverable bordered">

                <thead>
                    <tr>
                        <th class="text-align-center">ID</th>
                        <th class="width-30-pct">Name</th>
                        <th class="width-30-pct">Description</th>
                        <th class="text-align-center">Price</th>
                        <th class="text-align-center">Action</th>
                    </tr>
                </thead>

                <tbody ng-init="getAll()">
                    <tr ng-repeat="d in names| filter:search">
                        <td class="text-align-center">{{ d.id}}</td>
                        <td>{{ d.name}}</td>
                        <td>{{ d.description}}</td>
                        <td class="text-align-center">{{ d.price}}</td>
                        <td>
                            <a ng-click="readOne(d.id)" class="waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">edit</i>Edit</a>
                            <a ng-click="deleteevent(d.id)" class="waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">delete</i>Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- modal for for creating new event -->
            <div id="modal-event-form" class="modal">
                <div class="modal-content">
                    <h4 id="modal-event-title">Create New event</h4>
                    <div class="row">
                        <div class="input-field col s12">
                            <input ng-model="name" type="text" class="validate" id="form-name" placeholder="Type name here..." />
                            <label for="name">Name</label>
                        </div>

                        <div class="input-field col s12">
                            <textarea ng-model="description" type="text" class="validate materialize-textarea" placeholder="Type description here..."></textarea>
                            <label for="description">Description</label>
                        </div>


                        <div class="input-field col s12">
                            <input ng-model="price" type="text" class="validate" id="form-price" placeholder="Type price here..." />
                            <label for="price">Price</label>
                        </div>


                        <div class="input-field col s12">
                            <a id="btn-create-event" class="waves-effect waves-light btn margin-bottom-1em" ng-click="createevent()"><i class="material-icons left">add</i>Create</a>

                            <a id="btn-update-event" class="waves-effect waves-light btn margin-bottom-1em" ng-click="updateevent()"><i class="material-icons left">edit</i>Save Changes</a>

                            <a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">close</i>Close</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col s12 -->
    </div> <!-- end row -->
</div> <!-- end container -->
<!-- floating button for creating event -->
<div class="fixed-action-btn" style="bottom:45px; right:24px;">
    <a class="waves-effect waves-light btn modal-trigger btn-floating btn-large red" href="#modal-event-form" ng-click="showCreateForm()"><i class="large material-icons">add</i></a>
</div>

