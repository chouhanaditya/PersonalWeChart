{{--
Developer - Varun Parihar
 Date - 10/16/2017
 Description - View for Family History.
 --}}
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: lightblue">
            <b>Family History</b>
        </div>
        <div class="panel-body">
            <br>
            <div class="container-fluid">
                <!-- Add button -->
                <div class="row" style="padding-left: 2%">
                    <div class="col-md-offset-1">
                        <a id="addFamilyMember" href="" class="btn btn-primary" style="float: left">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            Add Family Member</a>
                    </div>
                </div>
                <br>
                {{--Family Member Panel--}}
                <div class="row">
                    <div class="col-md-offset-1 col-md-11" style="border: solid" id="family_member_id">
                        <div class="row" style="padding-top: 2%;padding-left: 1%;padding-right: 1%">
                            <div class="col-md-6">
                                <label id="familyMember" for="SearchForDiagnosis">Family Member</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input id="SearchForDiagnosis_family_history" type="text" name="SearchForDiagnosis">
                            </div>
                            <div class="col-md-6">
                                <label for="SearchForDiagnosis" >Search For Diagnosis</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input id="SearchForDiagnosis_family_history" type="text" name="SearchForDiagnosis">
                            </div>
                        </div>
                        <br>
                        <div class="row" style="padding-right: 1%;padding-left: 1%">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr class="bg-info">
                                        <th>Diagnosis</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><p>Father</p></td>
                                        <td style="text-align: left">
                                            <a class="btn btn-danger" id="Delete_family_history" style="float: right"> Delete</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <!-- Comment box -->
                <div class="row">
                    <div class="col-md-3 col-md-offset-1">
                        <label for="Comment"> Comments:</label>
                    </div>
                    <div class="col-md-6">
                        <textarea rows="4" id="family_history_comment" style="width: 400px">
                        </textarea>
                    </div>
                </div>
                <br>
                {{--Save button--}}
                <div class="row">
                    <div class="col-md-8" style="float: right">
                        <button type="submit" id="btn_save_family_history" class="btn btn-primary">
                            Save Family History
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr style="border: solid">