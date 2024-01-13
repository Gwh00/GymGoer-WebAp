@extends('layout')
<style>
    body {
        background: url('{{ asset('C.jpg') }}');
        background-size: 100%;
    }

    h1 {
        color: black;
    }

    .middle-space {
        margin-left: 10px;
        /* Adjust the value as needed /
        margin-right: 10px;
        / Adjust the value as needed */
        margin-bottom: 10px;
    }
</style>
@section('content')
    <br>
    <div class="ABC">
        <div class="row" style="width:100%;">
            <div class="col-md-3"></div>
            <div class="col-md-4"
                style="background-color:white; padding:10px 50px; border-radius:30px;
                font-family:Georgia; width:800px;">
                <h1 style=" color:black;">
                    <center>Add Class Form
                    </center>
                </h1>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3"></div>
            <div class="col-md-6" style="background-color:grey;">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('addClass2') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <br>
                                <label for="class_name" class="col-sm-3 col-form-label text-right">Class Name:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="class_name" name="class_name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="class_code" class="col-sm-3 col-form-label text-right">Class Code:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="class_code" name="class_code" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="class_description" class="col-sm-3 col-form-label text-right">Class
                                    Description:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="class_description" name="class_description" rows="4" required></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="coachname" class="col-sm-3 col-form-label text-right">Trainer:</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="coachname" name="coachname" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3"></div>
                                <div class="col-sm-9 offset-sm-3">
                                    <button type="submit" class="btn btn-primary btn-block">Add Class</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
