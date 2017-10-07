@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
<<<<<<< HEAD
        <h3 align="center">Remove Emails</h3>
=======
        <h3 align="center">Manage Emails</h3>
>>>>>>> origin/Sprint2Development
    </div>
    <div class="row">
        <div class="col-md-2 col-md-offset-1">
                <a href="{{url('/home')}}" class="btn btn-success" style="float: left">
                <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                Back to Dashboard</a>
        </div>
    </div>
    <br>

    <!-- Display all Student Email Ids -->
    <div class="row">
            <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="background-color: grey; padding-bottom: 0">
                                <h4 style="margin-top: 0">All Student Emails</h4>                
                            </div>

                            <div class="panel-body" style="height: 210px; overflow-y: scroll">
                            <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr class="bg-info">
                                        <th >Email Address</th>
                                        <th >Role</th>
                                        <th >Creation Date</th>
                                        <th >Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($studentEmails as $email)
                                            <tr>
                                                <td><p><?php echo ($email->email); ?></p></td>
                                                <td><p><?php echo ($email->role); ?></p></td>
                                                <td><p><?php echo (date('m-d-Y',strtotime($email->created_at))); ?></p></td>
                                                <td style="text-align: right">
                                                    <div class="modal fade" id="confirm_delete_student" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <div class="modal-header" style="text-align:center">
                                                                    <button type="button" id="student_delete_button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                    <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                                                                </div>

                                                                <div class="modal-body" style="text-align:center">
                                                                    <p>You are about to delete this student email address, this procedure is irreversible.</p>
                                                                    <p>Are you certain that you wish to proceed?</p>
                                                                    <p class="debug-url"></p>
                                                                </div>

<<<<<<< HEAD
                                            <div class="modal-footer">
                                                <p><button type="button" id="student_delete_cancel_button" style="margin:auto;  text-align:center; display:block; width:100%;" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true">  Cancel</i></button></p>

                                                                    <form method="post" action="ManageEmails/{{ $email->id }}">
                                                                        {{ method_field('DELETE') }}

                                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                                                <div class="form-group">
                                                                                    <button type="submit" id="student_delete_confirm_button" style="margin:auto;  text-align:center; display:block; width:100%;" class="btn btn-danger btn-ok"><i class="fa fa-minus-circle" aria-hidden="true"> Delete</i></button>
                                                                            </div>

                                                                    </form>

                                                                </div>

=======
                                                                <div class="modal-footer">
                                                                    <button type="button" id="student_delete_cancel_button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                    <button type="button" id="student_delete_confirm_button" class="btn btn-danger btn-ok">Delete</button>
                                                                </div>
>>>>>>> origin/Sprint2Development
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
                                                {{--<td>--}}
                                                   {{--{{Form::open([ 'method'  => 'delete', 'route' => [ 'AdminController.destroy', $email->id ] ])}}--}}
                                                    {{--{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}--}}
                                                    {{--{!! Form::close() !!}--}}
                                                {{--</td>--}}
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>                              
                            </div>
                        </div>
            </div>
        </div>

    <!-- Display all Instructors Email Ids -->
    <div class="row">
             <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="background-color: grey; padding-bottom: 0">
                                <h4 style="margin-top: 0">All Instructor Emails</h4>                
                            </div>

                            <div class="panel-body" style="height: 210px; overflow-y: scroll">
                            <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr class="bg-info">
                                        <th >Email Address</th>
                                        <th >Role</th>
                                        <th >Creation Date</th>
                                        <th >Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($instructorEmails as $email)
                                            <tr>
                                                <td><p><?php echo ($email->email); ?></p></td>
                                                <td><p><?php echo ($email->role); ?></p></td>
                                                <td><p><?php echo (date('m-d-Y',strtotime($email->created_at))); ?></p></td>
                                                <td style="text-align: right">
                                                    <div class="modal fade" id="confirm_delete_instructor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <div class="modal-header" style="text-align:center">
                                                                    <button type="button" id="confirm_delete_instructor" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                    <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                                                                </div>

                                                                <div class="modal-body" style="text-align:center">
                                                                    <p>You are about to delete this instructor email address, this procedure is irreversible.</p>
                                                                    <p>Are you certain that you wish to proceed?</p>
                                                                    <p class="debug-url"></p>
                                                                </div>

                                                                <div class="modal-footer">
<<<<<<< HEAD
                                                                    <p><button type="button" id="instructor_delete_cancel_button" style="margin:auto;  text-align:center; display:block; width:100%;" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true">  Cancel</i></button></p>
                                                                    <form method="post" action="ManageEmails/{{ $email->id }}">
                                                                        {{ method_field('DELETE') }}

                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                        <div class="form-group">
                                                                            <button type="submit" id="instructor_delete_confirm_button" style="margin:auto;  text-align:center; display:block; width:100%;" class="btn btn-danger btn-ok"><i class="fa fa-minus-circle" aria-hidden="true"> Delete</i></button>
                                                                        </div>

                                                                    </form>

=======
                                                                    <button type="button" id="instructor_delete_cancel_button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                    <button type="button" id="instructor_delete_confirm_button" class="btn btn-danger btn-ok">Delete</button>
>>>>>>> origin/Sprint2Development
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
                        </div>
             </div>
         </div>
</div>

@endsection
