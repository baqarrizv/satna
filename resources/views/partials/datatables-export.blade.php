{{-- DataTables Export CSS --}}
<link href="{{ URL::asset('/assets/libs/datatables/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
<style>
    /* Custom styles for DataTables export buttons */
    .dt-buttons {
        margin-bottom: 15px;
    }
    .dt-buttons .btn {
        margin-right: 5px;
    }
</style>

{{-- DataTables Export JS --}}
<script src="{{ URL::asset('/assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/datatables/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/datatables/jszip.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/datatables/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/datatables/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>

{{-- Instructions for use --}}
{{-- 
    To enable export functionality on any DataTable:
    
    1. Add the 'datatable-export' class to your table:
       <table class="table datatable-export" id="my-table">
    
    2. Or for existing DataTables, they will automatically get export buttons
       when this partial is included

    3. If you don't want a column to be exported, add the 'no-export' class to the <th> element:
       <th class="no-export">Actions</th>
--}} 