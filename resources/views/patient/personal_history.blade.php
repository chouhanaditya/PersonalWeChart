{{--Personal History--}}
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: lightblue">
            <b>Personal History</b>
        </div>
        <div class="panel-body">
            <div class="container-fluid">
                <!-- Search For Diagnosis -->
                <div class="row">
                    <div class="col-md-3 col-md-offset-1">
                        <label for="SearchForDiagnosis" > Search For Diagnosis:</label>
                    </div>
                    <div class="col-md-6">
                        <input id="search_for_diagnosis_personal_history" type="text" class="form-control" name="SearchForDiagnosis">
                    </div>
                </div>
                <br>
                <!-- List of Surgeries -->
                <div class="row">
                    <div class="col-md-9 col-md-offset-1">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr style="background-color: lightgrey">
                                    <th>List of surgeries</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                        <td><p>Dengu</p></td>
                                        <td style="text-align: right">
                                            <a class="btn btn-danger" id="delete_personal_history"> Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
                <br>
                <!-- Comment box -->
                <div class="row">
                    <div class="col-md-3 col-md-offset-1">
                        <label for="Comment"> Comments:</label>
                    </div>
                    <div class="col-md-6">
                        <textarea rows="4" id="personal_history_comment" style="width: 400px">
                    </textarea>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-8" style="float: right">
                    <button type="submit" id="btn_save_personal_history" class="btn btn-primary">
                        Save Personal History
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>