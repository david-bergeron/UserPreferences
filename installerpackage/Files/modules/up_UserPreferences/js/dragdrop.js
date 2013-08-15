$(function() {
	$("#show_tabs, #hide_tabs").sortable({
		connectWith: ".connectedSortable"
	}).disableSelection();
	
	// add the dragged option to the layout_options
	$("#hide_tabs").droppable({
		drop: function(event, ui) {
			var hideModules = [];
			var droppedField = ui.draggable.html();
			var hideTabsList = $("#layout_options").attr('value');
			if (hideTabsList != '' && hideTabsList.indexOf(droppedField) == -1) {
				hideModules.push(hideTabsList);
			}
			hideModules.push(droppedField);
			$("#layout_options").attr('value', hideModules.toString());
		}
	});
	
	// clean up the layout_options by removing any option from the field.
	$("#show_tabs").droppable({
		drop: function(event, ui) {
			var showField = ui.draggable.html();
			var hideTabsList = $("#layout_options").attr('value');
			var hideModules = hideTabsList.split(",");
			var index = hideModules.indexOf(showField);
			hideModules.splice(index, 1);
			$('#layout_options').attr('value', hideModules.join());
		}
	});
});