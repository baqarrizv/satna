/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	
/**
 * DataTables Basic & Export Functionality
 */
$(document).ready(function() {
    // Basic DataTables initialization
    if ($('.datatable').length > 0) {
        $('.datatable').each(function() {
            if (!$.fn.DataTable.isDataTable(this)) {
                $(this).DataTable();
            }
        });
    }
    
    // DataTables with Export Buttons
    if ($('.datatable-export').length > 0) {
        $('.datatable-export').each(function() {
            if (!$.fn.DataTable.isDataTable(this)) {
                $(this).DataTable({
                    dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"row"<"col-sm-12 col-md-6"B>><"row"<"col-sm-12"tr>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
                    buttons: [
                        {
                            extend: 'excel',
                            text: 'Export to Excel',
                            className: 'btn btn-success my-2',
                            exportOptions: {
                                columns: ':visible:not(.no-export)'
                            },
                            title: function() {
                                return $('title').text() + '_Export_' + new Date().toISOString().slice(0, 10);
                            }
                        },
                        {
                            extend: 'pdf',
                            text: 'Export to PDF',
                            className: 'btn btn-danger my-2 mx-2',
                            exportOptions: {
                                columns: ':visible:not(.no-export)'
                            },
                            title: function() {
                                return $('title').text() + '_Export_' + new Date().toISOString().slice(0, 10);
                            }
                        }
                    ]
                });
            } else {
                // If the table is already initialized, add export buttons to it
                addExportButtonsToTable($(this).attr('id'));
            }
        });
    }
    
    // Function to add export buttons to a specific table
    function addExportButtonsToTable(tableId) {
        if (tableId && $.fn.DataTable.isDataTable('#' + tableId)) {
            var dt = $('#' + tableId).DataTable();
            
            // Only proceed if the buttons aren't already added
            if (dt.buttons && dt.buttons().container().length === 0) {
                // Create a button container above the table
                var buttonContainer = $('<div class="dt-buttons btn-group flex-wrap mb-3"></div>');
                $('#' + tableId + '_wrapper').prepend(buttonContainer);
                
                // Add the buttons
                dt.buttons([
                    {
                        extend: 'excel',
                        text: 'Export to Excel',
                        className: 'btn btn-success my-2',
                        exportOptions: {
                            columns: ':visible:not(.no-export)'
                        },
                        title: function() {
                            return $('title').text() + '_Export_' + new Date().toISOString().slice(0, 10);
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'Export to PDF',
                        className: 'btn btn-danger my-2 mx-2',
                        exportOptions: {
                            columns: ':visible:not(.no-export)'
                        },
                        title: function() {
                            return $('title').text() + '_Export_' + new Date().toISOString().slice(0, 10);
                        }
                    }
                ]).container().appendTo(buttonContainer);
                
                // Mark as having export buttons
                $('#' + tableId).addClass('has-export-buttons');
            }
        }
    }
    
    // Add export buttons to any existing DataTable
    function addExportButtonsToDataTables() {
        // Skip tables that already have export buttons
        $('table.dataTable:not(.has-export-buttons)').each(function() {
            var tableId = $(this).attr('id');
            addExportButtonsToTable(tableId);
        });
    }
    
    // Run on page load with a short delay to ensure all tables are initialized
    setTimeout(addExportButtonsToDataTables, 500);
});
/******/ })()
;