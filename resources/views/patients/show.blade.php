                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Patient Information</h5>
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                                <tr>
                                                    <th>ID</th>
                                                    <td>{{ $patient->id }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Type</th>
                                                    <td>{{ $patient->type }}</td>
                                                </tr>
                                                @if($patient->fc_number)
                                                <tr>
                                                    <th>FC Number</th>
                                                    <td>{{ $patient->fc_number }}</td>
                                                </tr>
                                                @endif
                                                @if($patient->file_number)
                                                <tr>
                                                    <th>File Number</th>
                                                    <td>{{ $patient->file_number }}</td>
                                                </tr>
                                                @endif
                                                <tr>
                                                    <th>Name</th>
                                                    <td>{{ $patient->patient_name }}</td>
                                                </tr> 