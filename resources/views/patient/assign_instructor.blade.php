{{--@extends('layouts.app')--}}
{{--@extends('patient.vital_signs_header')--}}
@extends('patient.active_record')

@section('documentation_panel')
    {{--Assign Instructor--}}
    <div class="container-fluid">
        <div class="panel panel-default">
            {{--@if (Session::has('no_instructor_selected'))--}}
                {{--<div id="no_instructor_selected" class="alert alert-danger" style="">{!! Session::get('no_instructor_selected') !!}</div>--}}
            {{--@endif--}}
            <div class="panel-heading" style="background-color: lightblue;padding-bottom: 0">
                <h4 style="margin-top: 0">Assign Instructors</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ url('InstructorAssigned') }}" id="assignInstructors_form">
                    {{ csrf_field() }}
                     <input id="module_id" name="module_id" type="hidden" value="{{ $patient->module_id }}">
                     <input id="patient_id" name="patient_id" type="hidden" value="{{ $patient->patient_id }}">
                     <input type=hidden id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="row">
                        <div class="col-md-4 ">
                            <label for="SelectInstructor" id="select_instructor"> Select Instructor/s:</label>
                        </div>
                        <div class="col-md-6">
                            <select id="search_instructors" class="js-example-basic-multiple js-states form-control" name="search_instructors[]" multiple></select>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <!-- Buttons -->
                    <div class="row">
                        {{--<div class="col-md-4 col-md-offset-2">--}}
                            {{--<button type="reset" id="btn_clear_medication_comment" class="btn btn-success" style="float: left">--}}
                            {{--Clear Comment--}}
                            {{--</button>--}}
                        {{--</div>--}}
                        <div class="col-md-10 col-md-offset-2">
                            <button type="submit" id="btn_send_to_instructor" class="btn btn-primary" style="float: right">
                                Send to Instructor
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
        $('#search_instructors').select2({
            placeholder: "Choose Instructors...",
            minimumInputLength: 2,
            ajax: {
                url: '{{route('instructors_find')}}',
                dataType: 'json',
                data: function (params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
        $(document).ready(function(){
            var inputsChanged = false;
            $('#assignInstructors_form').change(function() {
                inputsChanged = true;
            });

            function unloadPage(){
                if(inputsChanged){
                    return "Do you want to leave this page?. Changes you made may not be saved.";
                }
            }

            $("#btn_send_to_instructor").click(function(){
                inputsChanged = false;
            });

//            $('#search_instructors').change(function(){
//                $("#btn_send_to_instructor").attr("disabled",false);
//            }
//            {
//                if( !$(this).val() ) {
//                    $("#btn_send_to_instructor").attr("disabled",true);
//                }
//                else {
//                    $("#btn_send_to_instructor").attr("disabled",false);
//                }
//            });
            window.onbeforeunload = unloadPage;
        });
    </script>

@endsection