  <!--
   Developer - Varun Parihar
   Date - 09/23/2017
   Description - View for Edit Profile functionality.
   10/27/2017 - Added code to handle change password fuctionality
  -->
@extends('layouts.app')
@section('content')

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

  <div class="container">
  <div class="col-md-8 col-md-offset-2">
    @if($user['role'] == 'Admin')
    <div class="row">
      <a href="{{url('/home')}}" class="btn btn-success" style="float: left">
        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
        Back to Dashboard</a>
    </div>
      @elseif($user['role'] == 'Instructor')
        <div class="row">
          <a href="{{url('/InstructorHome')}}" class="btn btn-success" style="float: left">
            <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
            Back to Dashboard</a>
        </div>
        @else($user['role'] == 'Student')
          <div class="row">
            <a href="{{url('/StudentHome')}}" class="btn btn-success" style="float: left">
              <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
              Back to Dashboard</a>
          </div>
    @endif
    <br>
      <div class="panel panel-default">

        <div class="panel-heading" style="padding-bottom: 0;padding-top: 0">
          <h3 >Edit Profile</h3>
        </div>

        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="{{ url('EditProfile') }}">
            {{ csrf_field() }}
              <input id="user_id" name="user_id" type="hidden" value="{{ $user->id }}">
            <div class="form-group">
              <label for="email" class="col-md-4 control-label">E-Mail Address</label>
              <div class="col-md-6">

                <input id="email" type="email" class="form-control" name="email" value="<?php echo ($user['email']); ?>" readonly="true">
              </div>
            </div>

            <div class="form-group">
              <label for="departmentName" class="col-md-4 control-label">Department</label>
              <div class="col-md-6">

                <input id="departmentName" type="text" class="form-control" name="departmentName" value="<?php echo ($user['departmentName']); ?>" >
              </div>
            </div>
            <div class="form-group">
              <label for="firstname" class="col-md-4 control-label">First Name</label>
              <div class="col-md-6">

                <input id="firstname" type="text" class="form-control" name="firstname" value="<?php echo ($user['firstname']); ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="lastname" class="col-md-4 control-label">Last Name</label>
              <div class="col-md-6">

                <input id="lastname" type="text" class="form-control" name="lastname" value="<?php echo ($user['lastname']); ?>">
              </div>
            </div>

            <div class="form-group{{ $errors->has('contactno') ? ' has-error' : '' }}">
              <label for="contactno" class="col-md-4 control-label">Contact No.</label>
              <div class="col-md-6">

                <input id="contactno" type="text" class="form-control" name="contactno" value="<?php echo ($user['contactno']); ?>">
                @if ($errors->has('contactno'))
                  <span class="help-block">
                    <strong>{{ $errors->first('contactno') }}</strong>
                  </span>
                @endif
              </div>
            </div>
              @if($erroredForm == 'Contact Number invalid')
                  <div class="row">
                      <div class="col-md-6 col-md-offset-4">
                          <div class="alert alert-danger">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>Please provide valid 10 digit contact number.</strong>
                          </div>
                      </div>
                  </div>
              @endIf
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <p> <strong>Note:</strong> 10-digit US number</p>
              </div>
            </div>
            <div class="form-group{{ $errors->has('old') ? ' has-error' : '' }}">
              <label for="password" class="col-md-4 control-label">Old Password</label>

              <div class="col-md-6">
                <input id="password_old" type="password" class="form-control" name="old">

                @if ($errors->has('old'))
                  <span class="help-block">
                    <strong>{{ $errors->first('old') }}</strong>
                  </span>
                @endif
              </div>
            </div>
              @if($erroredForm == 'Old & Current password do not match')
                  <div class="row">
                      <div class="col-md-6 col-md-offset-4">
                          <div class="alert alert-danger">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>Old password does not match with current password.</strong>
                          </div>
                      </div>
                  </div>
              @endIf
              @if($erroredForm == 'Old password blank')
                  <div class="row">
                      <div class="col-md-6 col-md-offset-4">
                          <div class="alert alert-danger">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>Old password cannot be blank.</strong>
                          </div>
                      </div>
                  </div>
              @endIf

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="col-md-4 control-label">New Password</label>
              <div class="col-md-6">
                <input id="password_new" type="password" class="form-control" name="password">
                @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
            </div>
              @if($erroredForm == 'New password empty')
                  <div class="row">
                      <div class="col-md-6 col-md-offset-4">
                          <div class="alert alert-danger">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>New password cannot be empty.</strong>
                          </div>
                      </div>
                  </div>
              @endIf
              @if($erroredForm == 'Password short')
                  <div class="row">
                      <div class="col-md-6 col-md-offset-4">
                          <div class="alert alert-danger">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>New password should be more than 6 characters.</strong>
                          </div>
                      </div>
                  </div>
              @endIf
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
              <label for="password-confirm" class="col-md-4 control-label">Confirm New Password</label>
              <div class="col-md-6">
                <input id="password_new_confirm" type="password" class="form-control" name="password_confirmation">
                @if ($errors->has('password_confirmation'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                  </span>
                @endif
              </div>
            </div>
              @if($erroredForm == 'New & Confirm password do not match.')
                  <div class="row">
                      <div class="col-md-6 col-md-offset-4">
                          <div class="alert alert-danger">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>Confirm password does not match with New password.</strong>
                          </div>
                      </div>
                  </div>
              @endIf
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                          Save Changes
                </button>
              </div>
            </div>
          </form>
        </div>

      </div>
        <!-- After user submits request -->
        @if($Profilesubmitted == 'Yes')
            <div class="row">
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Profile updated successfully.
                </div>
            </div>
        @endif
    </div>
  </div>
  @endsection
