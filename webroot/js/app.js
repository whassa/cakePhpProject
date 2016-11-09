var TodoApp = {};
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
    $("#add-Events").submit(function (event) {
        $('#events-error').remove();
        $('.form-group').removeClass('has-error');
		
        var $form = $(this),
                name = $form.find("input[name='name']").val();
                url = $form.attr('action');
        var posting = $.post(url,{ name:name});
        posting.done(function (response) {	
            if (response.response.result == 'success') {
                $('#incomplete-events').empty();
                $('#inputLarge').val('');
                TodoApp.getEvenements();
            } else if (response.response.result == 'fail') {
                $('.form-group').addClass('has-error');
                $('#task-input').append('<div class="error" id="evenements-error">' + response.response.error.todo + '</div>');
            }
        });
	
        event.preventDefault();
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
})(jQuery);



