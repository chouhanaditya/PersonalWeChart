@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="padding-top: 0;margin: 0">
        <h3 id="lblAdminHeader" style="text-align: center;padding-top: 0;margin: 0"><img src="logos\LogoAdmin.png" width="4%"> Admin Dashboard <img src="logos\LogoAdmin.png" width="4%"></h3>
    </div>

    <div class="row">
            <div class="col-md-2 col-md-offset-1">
                <a href="{{url('/ManageEmails')}}" class="btn btn-success">
                <i class="fa fa-envelope-o" aria-hidden="true"></i> Manage Emails</a>
            </div>
            <div class="col-md-8">
                <a class="btn btn-success" style="float: right">
                <i class="fa fa-cog" aria-hidden="true"></i> Configure Modules</a>
            </div>
    </div>
    <br>
    <!-- Students -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: grey; padding-bottom: 0">
                    <h4 style="margin-top: 0">Students</h4>
                </div>

                <div class="panel-body" style="height: 220px; overflow-y: scroll">
                <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr class="bg-info">
                            <th>Name</th>
                            <th><i class="fa fa-envelope-o" aria-hidden="true"></i> Email Address</th>
                            <th><i class="fa fa-phone" aria-hidden="true"></i> Contact Number</th>
                            <th colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td>
                                        <p><?php echo ($student->firstname); ?>  &nbsp;<?php echo ($student->lastname); ?></p></td>
                                    <td><p><?php echo ($student->email); ?></p></td>
                                    <td> <p><?php echo ($student->contactno); ?></p></td>
                                    <td style="text-align: right">
                                        <div class="modal fade" id="confirm_delete_student" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-header" style="text-align:center">
                                                        <button type="button" id="student_delete_button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                                                    </div>

                                                    <div class="modal-body" style="text-align:center">
                                                        <p>You are about to delete this student, this procedure is irreversible.</p>
                                                        <p>Are you certain that you wish to proceed?</p>
                                                        <p class="debug-url"></p>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" id="student_delete_cancel_button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        <button type="button"  id="student_delete_confirm_button" class="btn btn-danger btn-ok">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="button" id="student_minus_delete" style="margin:auto;  text-align:center; display:block; width:100%;" class="btn btn-danger btn-sm" data-href="/delete.php?id=54" data-toggle="modal" data-target="#confirm_delete_student">
                                            <i class="fa fa-minus-circle" aria-hidden="true"> Delete</i></button>

                                        <script>
                                            $('#confirm_delete_student').on('show.bs.modal', function(e) {
                                                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

                                                $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
                                            });
                                        </script>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                <a id="addStudentEmails" href="{{url('/AddStudentEmails')}}" class="btn btn-primary" style="float: right">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    Add Student Email Address</a>
            </div>
        </div>
    </div>
<br>
      <!-- Instructors -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: grey; padding-bottom: 0">
                    <h4 style="margin-top: 0">Instructors</h4>
                </div>

                <div class="panel-body" style="height: 220px; overflow-y: scroll">
                <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr class="bg-info">
                            <th>Name</th>
                            <th><i class="fa fa-envelope-o" aria-hidden="true"></i> Email Address</th>
                            <th><i class="fa fa-phone" aria-hidden="true"></i> Contact Number</th>
                            <th><i class="fa fa-newspaper-o" aria-hidden="true"></i> Department Name</th>
                            <th colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                                @foreach ($instructors as $instructor)
                                <tr>
                                    <td>
                                        <p><?php echo ($instructor->firstname); ?>  &nbsp;<?php echo ($instructor->lastname); ?></p></td>
                                    <td><p><?php echo ($instructor->email); ?></p></td>
                                    <td> <p><?php echo ($instructor->contactno); ?></p></td>
                                    <td> <p><?php echo ($instructor->departmentName ); ?></p></td>
                                    <td style="text-align: right">
                                        <div class="modal fade" id="confirm_delete_instructor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-header" style="text-align:center">
                                                        <button type="button" id="instructor_delete_button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                                                    </div>

                                                    <div class="modal-body" style="text-align:center">
                                                        <p>You are about to delete this instructor, this procedure is irreversible.</p>
                                                        <p>Are you certain that you wish to proceed?</p>
                                                        <p class="debug-url"></p>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" id="instructor_delete_cancel_button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        <button type="button" id="instructor_delete_confirm_button" class="btn btn-danger btn-ok">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="button" id="instructor_minus_delete" style="margin:auto;  text-align:center; display:block; width:100%;" class="btn btn-danger btn-sm" data-href="/delete.php?id=54" data-toggle="modal" data-target="#confirm_delete_instructor">
                                            <i class="fa fa-minus-circle" aria-hidden="true"> Delete</i></button>

                                        <script>
                                            $('#confirm_delete_instructor').on('show.bs.modal', function(e) {
                                                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

                                                $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
                                            });
                                        </script>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                <a id="addInstructorEmails" href="{{url('/AddInstructorEmails')}}" class="btn btn-primary" style="float: right">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    Add Instructor Email Address</a>

            </div>
        </div>
    </div>

</div>
@endsection
