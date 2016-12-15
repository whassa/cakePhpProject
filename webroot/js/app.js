// angular js codes will be here
var app = angular.module('myApp', []);
app.controller('evenementsCtrl', function ($scope, $http) {
    // more angular JS codes will be here
    $scope.showCreateForm = function () {
        // clear form
        $scope.clearForm();

        // change modal title
        $('#modal-evenement-title').text("Create New evenement");

        // hide update evenement button
        $('#btn-update-evenement').hide();

        // show create evenement button
        $('#btn-create-evenement').show();

    }
    // clear variable / form values
    $scope.clearForm = function () {
        $scope.id = "";
        $scope.name = "";
    }
    // create new evenement 
    $scope.createevenement = function () {

        // fields in key-value pairs
        $http.post('evenements/add.json', {
            'name': $scope.name
        }
        ).success(function (data, status, headers, config) {
            //console.log(data.response.result);
            // tell the user new evenement was created
            Materialize.toast(data.response.result, 4000);

            // close modal
            $('#modal-evenement-form').modal('close');

            // clear modal content
            $scope.clearForm();

            // refresh the list
            $scope.getAll();
        });
    }
    // read evenements
    $scope.getAll = function () {
        $http.get("evenements/index.json").success(function (response) {
            $scope.names = response.evenements;
        });
    }
	$scope.getAllFinish = function () {
        $http.get("evenements/indexFinished.json").success(function (response) {
            $scope.swags = response.finished;
        });
    }
    // retrieve record to fill out the form
    $scope.readOne = function (id) {

        // change modal title
        $('#modal-evenement-title').text("Edit evenement");

        // show udpate evenement button
        $('#btn-update-evenement').show();

        // show create evenement button
        $('#btn-create-evenement').hide();

        // post id of evenement to be edited
        $http.post('Evenements/view.json', {
            'id': id
        })
                .success(function (data, status, headers, config) {

                    // put the values in form
                    $scope.id = data.evenement.id;
                    $scope.name = data.evenement.name;
                    // show modal
                    $('#modal-evenement-form').modal('open');
                })
                .error(function (data, status, headers, config) {
                    Materialize.toast('Unable to retrieve record.', 4000);
                });
    }
    // update evenement record / save changes
    $scope.updateevenement = function () {
        $http.post('Evenements/edit.json', {
            'id': $scope.id,
            'name': $scope.name,
        })
                .success(function (data, status, headers, config) {
                    // tell the user evenement record was updated
                    console.log(data.response.result);
                    Materialize.toast(data.response.result, 4000);

					
					
                    // close modal
                    $('#modal-evenement-form').modal('close');

                    // clear modal content
                    $scope.clearForm();

                    // refresh the evenement list
                    $scope.getAll();
                });
    }
    // delete evenement
    $scope.deleteevenement = function (id) {

        // ask the user if he is sure to delete the record
        if (confirm("Are you sure?")) {
            // post the id of evenement to be deleted
            $http.post('evenements/finish.json', {
                'id': id
            }).success(function (data, status, headers, config) {
                // tell the user evenement was deleted
                Materialize.toast(data.response.result, 4000);

                // refresh the list
                $scope.getAll();
				$scope.getAllFinish();
            });
        }
    }
});

// jquery codes will be here
$(document).ready(function () {
    // initialize modal
    $('.modal').modal();
});







/** var TodoApp = {};
(function () {
    TodoApp.getEvenements = function () {
        $.get('evenements/get.json', function (response) {
            $label = $('#incomplete-label');
            $incompleteDiv = $('#notdone');
            $incompleteDiv.empty();
            if (response.evenements.length === 0) {
                $label.hide();
                $incompleteDiv.append('<div class="incomplete-evenements">All done. Have a nice day (or add a new to-do above).</div>');
            } else {
                $label.show();
                $.each(response.evenements, function (key, value) {
                    $incompleteDiv.append('<div class="incomplete-evenements" id="incomplete-' + value.id + '">' +
                            '<input id="evenementsText_' + value.id + '" class="form-control no-border" value="' + value.name + '" type="text" readonly> ' +
                            '<button id="evenementsEdit_' + value.id + '" class="form-control btn-xs" type="button">Edit</button>' +
                            '<input id="evenements_' + value.id + '" class="evenements-checked" type="checkbox" />' +
                            '</label></div>');
                    $incompleteDiv.show('highlight');
                });
            }
        });
    };

    TodoApp.getDone = function () {
        $.get('evenements/get/1.json', function (response) {
            $doneDiv = $('#done');
            $doneDiv.empty();
            $.each(response.evenements, function (key, value) {
                $doneDiv.append('<div class="finished-task"><div class="finshed-task-text">' + value.name + '</div></div>');
            });
        });
    };

    TodoApp.finishTask = function (id) {
        $.get('evenements/finish/' + id + '.json',
                function (response) {
				
                    if (response.response.result == "success") {
                        $('#incomplete-' + id).hide('explode');
                        $('#incomplete-' + id).remove();
                        TodoApp.getEvenements();
                        TodoApp.getDone();
						
                    } else if (response.response.result == 'fail') {
                        console.log('fail');
                    }
                }
        );
    };

    TodoApp.editTask = function (id) {
        var btnLabel = $("#evenementsEdit_" + id).html();
        if (btnLabel == "Edit") {
            $("#evenementsText_" + id).attr("readOnly", false);
            $("#evenementsEdit_" + id).text("Ok");
        } else {
            $("#evenementsText_" + id).attr("readOnly", true);
            $("#evenementsEdit_" + id).text("Edit");

            evenements = $("#evenementsText_" + id).val();

            var posting = $.post('Evenements/edit.json', {
                name: evenements,
                id: id           
            });
            posting.done(function (response) {
                if (response.response.result == 'success') {
                    $('#incomplete-to-dos').empty();
                    $('#inputLarge').val('');
                    TodoApp.getEvenements();
                } else if (response.response.result == 'fail') {
                    $('.form-group').addClass('has-error');
                    $('#task-input').append('<div class="error" id="evenements-error">' + response.response.error.todo + '</div>');
                }
            });
        }

    };

})();

(function ($) {
    $("#add-evenements").submit(function (evenement) {
        $('#evenements-error').remove();
        $('.form-group').removeClass('has-error');
		
        var $form = $(this),
                name = $form.find("input[name='name']").val();
                url = $form.attr('action');
        var posting = $.post(url,{ name:name});
        posting.done(function (response) {	
            if (response.response.result == 'success') {
                $('#incomplete-evenements').empty();
                $('#inputLarge').val('');
                TodoApp.getEvenements();
            } else if (response.response.result == 'fail') {
                $('.form-group').addClass('has-error');
                $('#task-input').append('<div class="error" id="evenements-error">' + response.response.error.todo + '</div>');
            }
        });
	
        evenement.prevenementDefault();
    });

    $(document).on('click', ':checkbox', function () {
        var id = $(this).attr('id').replace('evenements_','');
        TodoApp.finishTask(id);
    });
	
    $(document).on('click', ':button', function () {
		if ( $(this).attr('id') != null ){
			var id = $(this).attr('id').replace('evenementsEdit_', '');
			TodoApp.editTask(id);
		}
		
    });
	
    TodoApp.getEvenements();
    TodoApp.getDone();
})(jQuery); **/




