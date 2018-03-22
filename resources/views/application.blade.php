@extends('layouts.app')



@section('content')


    <?php
    $apply = Auth::user()->apply;
    ?>
    <h1 class="text-center">Application Form</h1>
    <?php
    if(Auth::user()->status !== 'applying')
    {
        if(Auth::user()->status === 'started')
        {
            echo '<div class="alert alert-dark">Your application is being evaluated</div>';
        }
        if(Auth::user()->status === 'accepted')
        {
            echo '<div class="alert alert-success"> Congratulations, you are hired!</div>';
        }
        if(Auth::user()->status === 'declined')
        {
            echo '<div class="alert alert-danger">Sorry, but your application has been denied :(</div>';
        }
    }
    ?>
    {!! Form::open(['action' => 'ApplicationController@submit',  'files' => true ]) !!}
    <hr>
    <div class="row col">
        <div class="col-4">
            <h2>Free Vacancies : </h2>
            {{Form::select('vacancyName',[
                'Teaching' => ['IT' => 'IT', 'Math' => 'Math', 'English' => 'English'],
                'Accounting' => 'Accounting',
                'Guardian' => 'Guardian',
                'Management' => 'Management',
                ],
                $apply->vacancyName ,
                ['class'=>'custom-select form-control']) }}

            <hr>
            <h2>Personal Information:</h2>
            <div class="form-group">
                {{Form::label('CV_file', 'Upload Your CV')}}
                {{Form::file('CV_file',['data-toggle' => 'tooltip', 'title' => 'Chose an .doc .docx or .pdf file (max 2MB!)','class'=>'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('firsname', 'First Name')}}<span style="color: red; ">*</span>
                {{Form::text('firstname', $apply->personal_info->firstname, ['class'=>'form-control','required','autofocus','id'=>'dlol'])}}
            </div>

            <div class="form-group">
                {{Form::label('middlename', 'Middle Name')}}
                {{Form::text('middlename', $apply->personal_info->middlename,['class' =>'form-control'])}}
            </div>

            <div class="form-group">
                {{Form::label('lastname', 'Last Name')}}<span style="color: red; ">*</span>
                {{Form::text('lastname', $apply->personal_info->lastname,['class' =>'form-control','required'])}}
            </div>

            <div class="form-group">
                {{Form::label('username', 'Nickname')}}<span style="color: red; ">*</span>
                {{Form::text('username', Auth::user()->name,['class'=>'form-control','required','disabled'])}}
            </div>

            <div class="form-group">
                {{Form::label('email', 'Email')}}<span style="color: red; ">*</span>
                {{Form::text('email', Auth::user()->email,['class'=>'form-control','required','disabled'])}}
                @foreach ($errors->get('email') as $message)
                    <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @endforeach
            </div>
        </div>

        <div class="col-4">
            <br class="h1"><br class="h1"><br class="h1"><br class="h2"><br class="h1">
            <div class="form-group">
                {{Form::label('cellPhoneNumber', 'Cell Phone Number')}}<span style="color: red; ">*</span>
                {{Form::text('cellPhoneNumber', $apply->personal_info->cellPhoneNumber,['class' =>'form-control','required'])}}
            </div>

            <div class="form-group">
                {{Form::label('phoneNumber', 'Phone Number')}}
                {{Form::text('phoneNumber', $apply->personal_info->phoneNumber,['class' =>'form-control'])}}
            </div>

            <div class="form-group">
                {{Form::label('userAddress', 'Adress')}}
                {{Form::text('userAddress', $apply->personal_info->address,['class' =>'form-control'])}}
            </div>

            <div class="form-group">
                {{Form::label('nationality', 'Nationality')}}
                {{Form::text('nationality', $apply->personal_info->nationality,['class' =>'form-control'])}}
            </div>

            <div class="form-group">
                {{Form::label('countryOfBirth', 'Country of birth')}}
                {{Form::text('countryOfBirth', $apply->personal_info->countryOfBirth,['class' =>'form-control'])}}
            </div>
        </div>
    </div>

    <hr>
    <div class="row col">
        <div class="col-4">
            <h2>Skills:</h2>
            @include('forms.skills')
        </div>

        <div class="col-4">
            <br class="h1">
            @include('forms.languages')
        </div>
    </div>
    <hr>
    <h2 class="col">Studies:</h2><br>
    <div class="row col" id="dynamicStudies">
        @include('forms.studies')
    </div>
    <hr>
    <h2 class="col">Participation in Seminars,Courses ,Conferences and Other</h2><br>
    <div class="row col" id="dynamicActivities">
        @include('forms.activities')
    </div>
    <hr>
    <h2 class="col">Work Experience:</h2><br>
    <div class="row col" id="dynamicWorkExp">
        @include('forms.workExperience')
    </div>
    <hr>
    <h2 class="col">Recommendations:</h2><br>
    <div class="row col" id="dynamicRecommendations">
        @include('forms.recommendations')
    </div>
    <div class="col-4">
        <br>
        <p class="awsome" data-toggle = "tooltip" title ="please check the terms and conditions before continue">
            I have read and agree to <a href="http://www.ase.md/ro/"> ASEM Admission´s</a>  terms of Use and Privacy Policy{{Form::checkbox('terms', 'terms',['class'=>'form-check-input'])}}</p>
    </div>
    <hr>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <div class="col-4">
        {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
    </div>
    {!! Form::close() !!}

    <script>
        // $('#dlol').prop('disabled',true);
        @if(Auth::user()->status !== 'applying')
        $('.form-control').prop('disabled',true);
        $('.btn-success').prop('disabled',true);
        $('.btn-danger').prop('disabled',true);
        // var arr = $('.form-control');
        // for(i = 0;i < arr.count();i++)
        //     {
        //         arr[i].prop('disable',true);
        //     }
        @else
        $('.form-control').prop('disabled',false);
        $('.btn-success').prop('disabled',false);
        $('.btn-danger').prop('disabled',false);
        @endif
    </script>
@endsection