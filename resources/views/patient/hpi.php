@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading" style="backgroundd-color: lightblue">
                    <h4 id="hpi">History of Present Illness (HPI)</h4>
                </div>

                <div class="panel-body">
                    <h4>You may use the search box for disease name: </h4>
                    <form action="search.php" method="GET">
                        <input id="search_text_box" type="text" name="query"/>
                        <input id="search_submit_button" type="submit" value="Search"/>
                    </form>
                    <h4></h4>
                    <form class="form-horizontal" method="POST" action="{{ url('add_patient') }}">
                        <textarea id="hpi_text_box" rows="5" cols="100"
                                  name="usertext"> Enter the HPI record here. </textarea>

                        <div class="panel-heading" style="backgroundd-color: lightblue">
                            <h4>Comment</h4>
                        </div>

                        <textarea id="comment_text_box" rows="5" cols="100"
                                  name="usertext"> Enter your comment here. </textarea>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button id="save_button" type="save" class="btn btn-primary">
                                    <i class="fa fa-floppy-o" aria-hidden="true"></i> &nbsp;Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- After user submits request -->
            </div>
        </div>
    </div>
</div>
@endsection