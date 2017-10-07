<!--
 Developer - Varun Parihar, Siddharth Karlekar & Harsha Verma
 Date - 10/06/2017
 Description - View for Student Dashboard.
-->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h3 style="text-align: center"><img src="logos\LogoStudent.png" width="4%"> Student Dashboard <img src="logos\LogoStudent.png" width="4%"></h3>
    </div>
<!-- This button will take the user to a new page where new patient's demographic will be entered -->    
<div class="row">
        <div class="col-md-10 col-md-offset-1">
    <a id="addPatient" href="{{url('/add_patient')}}" class="btn btn-primary" style="float: right">
        <i class="fa fa-plus-circle" aria-hidden="true"></i>
        Add new Patient</a>
        </div>
    </div>
    <br>
    <br>
    <!-- Students -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: grey; padding-bottom: 0">
                    <h4 style="margin-top: 0">Saved</h4>
                </div>
                <div class="panel-body" style="height: 220px; overflow-y: scroll">
                    @if($modules)
                        @foreach($modules as $module)
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color: grey; padding-bottom: 0">
                                    <h4 id="savedModuleName" style="margin-top: 0">{{$module}}</h4>
                                </div>

                                <div class="panel-body" style="height: 220px; overflow-y: scroll">
                                @if($patients)
                                    @foreach($patients as $patient)
                                        <!-- To check the patient records with "Saved" status -->
                                            @if($patient->module)
                                                @if($patient->status === 1 && $patient->module->module_name === $module && $patient->archived === 0)
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
                                                            <tr>
                                                                <td><a href="{{ route( 'patient.view', ['patient_id' => $patient->patient_id ] ) }}" id="patientName"><?php echo $patient->first_name.' '.$patient->last_name; ?></a></td>
                                                                <td><p id="patientAge">{{$patient->age}}</p></td>
                                                                <td><p id="patientSex">{{$patient->gender}}</p></td>
                                                                <td><p id="patientHeight">{{$patient->height}}</p></td>
                                                                <td><p id="patientWeight">{{$patient->weight}}</p></td>
                                                                <td><p id="visitDate">{{$patient->visit_date}}</p></td>
                                                                <td style="text-align: left">
                                                                    <a id="edit" href="{{  route('patient.edit', ['id' => $patient->patient_id]) }}"> Edit</a>
                                                                    <a id="delete" href="{{ route('patient.destroy', ['patient_id' => $patient->patient_id ]) }}"> Delete</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                @endif
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @else
                        {{$message}}
                    @endif
                </div>
                <br>
            </div>
        </div>
    </div>
    <br>
    <!-- Instructors -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: grey; padding-bottom: 0">
                    <h4 style="margin-top: 0">Submitted</h4>
                </div>
                {{--<div class="panel-body" style="height: 220px; overflow-y: scroll">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: grey; padding-bottom: 0">
                            <h4 id="submittedModuleName" style="margin-top: 0">Module 1</h4>
                        </div>
                        <div class="panel-body" style="height: 220px; overflow-y: scroll">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr class="bg-info">
                                    <th>Patient Name</th>
                                    <th>Age</th>
                                    <th>Sex</th>
                                    <th>Height</th>
                                    <th>Weight</th>
                                    <th colspan="2">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><p id="patientName">Name</p></td>
                                    <td><p id="patientAge">27</p></td>
                                    <td><p id="patientSex">Male</p></td>
                                    <td><p id="patientHeight">6'10</p></td>
                                    <td><p id="patientWeight">150</p></td>
                                    <td style="text-align: left">
                                        <a id="edit" href=""> Edit</a>
                                        <a id="delete" href=""> Delete</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>--}}
                </div>

                <br>
            </div>
        </div>
    </div>

</div>
@endsection
