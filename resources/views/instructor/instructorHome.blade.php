@extends('layouts.app')

@section('content')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <div class="container">
        <div class="row">
            <h3 style="text-align: center"><img src="logos\LogoInstructor.png" width="4%"> Instructor Dashboard <img src="logos\LogoInstructor.png" width="4%"></h3>
        </div>
        <!-- Students -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default" style="margin-bottom: 0;padding-bottom: 0">
                    <div class="panel-heading" style="background-color: #5DADE2; padding-bottom: 0">
                        <h4 style="margin-top: 0">Submitted For Review</h4>
                    </div>
                    <div class="panel-body" style="margin-bottom: 0;padding-bottom: 0">
                        @if($modules_for_review)
                            @foreach($modules_for_review as $module)
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background-color: grey; padding-bottom: 0">
                                        <h4 id="savedModuleName" style="margin-top: 0">{{$module}}</h4>
                                    </div>

                                    <div class="panel-body">
                                        @if($for_review_patients)
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                <tr class="bg-info">
                                                    <th>Patient Name</th>
                                                    <th>Age</th>
                                                    <th>Sex</th>
                                                    <th>Height</th>
                                                    <th>Weight</th>
                                                    <th>Visit Date</th>
                                                    <th colspan="2">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($for_review_patients as $for_review_patient)
                                                    <!-- To check the patient records with "Saved" status -->
                                                    @if($for_review_patient->patient->module)
                                                        @if($for_review_patient->patient_record_status_id === 2 && $for_review_patient->patient->module->module_name === $module)
                                                            <tr>
                                                                <td>
                                                                    <a href="" id="patientName">
                                                                        <?php echo $for_review_patient->patient->first_name.' '.$for_review_patient->patient->last_name; ?>
                                                                    </a>
                                                                </td>
                                                                <td><p id="patientAge">{{$for_review_patient->patient->age}}</p></td>
                                                                <td><p id="patientSex">{{$for_review_patient->patient->gender}}</p></td>
                                                                <td><p id="patientHeight">{{$for_review_patient->patient->height}}</p></td>
                                                                <td><p id="patientWeight">{{$for_review_patient->patient->weight}}</p></td>
                                                                <td><p id="visitDate">{{$for_review_patient->patient->visit_date}}</p></td>
                                                                <td style="text-align: left">
                                                                    <a href="" class="btn btn-primary" id="edit">View & Edit</a>
                                                                    <a class="btn btn-danger" id="delete"> Delete</a>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>{{$for_review_message}}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <br>
        <!-- Instructors -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #5DADE2; padding-bottom: 0">
                        <h4 style="margin-top: 0">Reviewed Patients</h4>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body" style="margin-bottom: 0;padding-bottom: 0">
                            @if(!empty($reviewed_patients))
                                {{--@if($modules)--}}
                                @foreach($modules_reviewed as $module)
                                    <div class="panel panel-default">
                                        <div class="panel-heading" style="background-color: grey; padding-bottom: 0">
                                            <h4 id="savedModuleName" style="margin-top: 0">{{$module}}</h4>
                                        </div>
                                        <div class="panel-body">
                                            @if($reviewed_patients)
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                    <tr class="bg-info">
                                                        <th>Patient Name</th>
                                                        <th>Age</th>
                                                        <th>Sex</th>
                                                        <th>Height</th>
                                                        <th>Weight</th>
                                                        <th>Visit Date</th>
                                                        <th colspan="2">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($reviewed_patients as $reviewed_patient)
                                                        <!-- To check the patient records with "Saved" status -->
                                                        @if($reviewed_patient->patient->module)
                                                            @if($reviewed_patient->patient_record_status_id === 3 && $reviewed_patient->patient->module->module_name === $module)
                                                                <tr>
                                                                    <td>
                                                                        <a href="" id="patientName">
                                                                            <?php echo $reviewed_patient->patient->first_name.' '.$reviewed_patient->patient->last_name; ?>
                                                                        </a>
                                                                    </td>
                                                                    <td><p id="patientAge">{{$reviewed_patient->patient->age}}</p></td>
                                                                    <td><p id="patientSex">{{$reviewed_patient->patient->gender}}</p></td>
                                                                    <td><p id="patientHeight">{{$reviewed_patient->patient->height}}</p></td>
                                                                    <td><p id="patientWeight">{{$reviewed_patient->patient->weight}}</p></td>
                                                                    <td><p id="visitDate">{{$reviewed_patient->patient->visit_date}}</p></td>
                                                                    <td style="text-align: left">
                                                                        <a href="" class="btn btn-primary" id="edit">View & Edit</a>
                                                                        <a class="btn btn-danger" id="delete"> Delete</a>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>{{$reviewed_message}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
@endsection
