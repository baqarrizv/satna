@extends('layouts.master')

@section('title') Activity Logs @endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Activity Logs</h4>
                    <div class="infinite-scroll">
                        <ul class="verti-timeline list-unstyled" id="activity-logs">
                            @include('activity_logs.partials.logs', ['activities' => $activities])
                        </ul>

                        <div class="text-center my-3" id="loading-spinner" style="display: none;">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    var page = 1;
    $(window).scroll(function() {
        // Check if we're near the bottom of the page and fetch new logs
        if($(window).scrollTop() + $(window).height() >= $(document).height() - 200) {
            page++;
            loadMoreData(page);
        }
    });

    function loadMoreData(page) {
        $.ajax({
            url: '?page=' + page,
            type: "get",
            beforeSend: function() {
                $('#loading-spinner').show();
            }
        })
        .done(function(data) {
            if (data.trim().length == 0) {
                $('#loading-spinner').html("No more logs to load.");
                return;
            }
            $('#loading-spinner').hide();
            $('#activity-logs').append(data);
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log('Something went wrong while loading logs.');
        });
    }
</script>
@endsection
