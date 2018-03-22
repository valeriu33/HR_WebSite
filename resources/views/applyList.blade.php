<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 27.02.2018
 * Time: 16:30
 */?>

@extends('layouts.app')

@section('content')
    <?php
    //        foreach ($users as $user){
    //            $users[$i]->apply[] = $user;
    //        }
    ?>
    <h1>Current applications :</h1>
    <form id="startEvaluation" method="POST" action="{{route('admin.startEvaluating')}}"  style="display: none">
        @csrf
    </form>

    @for($i = 0;$i <  count($users);$i++)
        <table class="table">
            <tr>
                <td>

                </td>
                <td>
                    <b>First Name</b>
                </td>
                <td>
                    <b>Middle Name</b>
                </td>
                <td>
                    <b>Last Name</b>
                </td>
                <td>
                    <b>Download CV</b>
                </td>
                <td>
                    <b>Cell Phone Number</b>
                </td>
                <td>
                    <b>Phone Number</b>
                </td>
                <td>
                    <b>Address</b>
                </td>
                <td>
                    <b>Nationality</b>
                </td>
                <td>
                    <b>Country Of Birth</b>
                </td>
                <td>
                    <b>Created At</b>
                </td>
                <td>
                    <b>Last Update</b>
                </td>

                <td id="start{{$i}}">
                    <button class="btn btn-primary" form="startEvaluation" type="submit" name="{{$i}}" value="start" onclick="
                            $('#decide{{$i}}').show();
                            $('#start{{$i}}').hide();
                            // $('#startEvaluation').submit();
                            "> Start evaluating </button>

                </td>
                <td id="decide{{$i}}">
                    <button class="btn btn-success" form="startEvaluation" type="submit" name="{{$i}}" value="accept">accept</button>
                    <button class="btn btn-danger" form="startEvaluation" type="submit" name="{{$i}}" value="decline">decline</button>
                </td>

            </tr>

            <tr>
                <td>
                    <b>{{$i+1}} applicant's info: </b>
                </td>
                <td>
                    <p>{{$users[$i]->apply->personal_info->firstname}}</p>
                </td>
                <td>
                    <p>{{$users[$i]->apply->personal_info->middlename}}</p>
                </td>
                <td>
                    <p>{{$users[$i]->apply->personal_info->lastname}}</p>
                </td>
                <td>
                    <a download="{{$users[$i]->apply->personal_info->filename}}" href="storage/CV_Files/{{$users[$i]->apply->personal_info->filename}}">{{$users[$i]->apply->personal_info->filename}}</a>
                </td>
                <td>
                    <p>{{$users[$i]->apply->personal_info->cellPhoneNumber}}</p>
                </td>
                <td>
                    <p>{{$users[$i]->apply->personal_info->phoneNumber}}</p>
                </td>
                <td>
                    <p>{{$users[$i]->apply->personal_info->address}}</p>
                </td>
                <td>
                    <p>{{$users[$i]->apply->personal_info->nationality}}</p>
                </td>
                <td>
                    <p>{{$users[$i]->apply->personal_info->countryOfBirth}}</p>
                </td>
                <td>
                    <p>{{$users[$i]->created_at}}</p>
                </td>
                <td>
                    <p>{{$users[$i]->apply->personal_info->updated_at}}</p>
                </td>
                <td>
                    <button  class="btn btn-default"  onclick="

                            if($('#minimizedUser{{$i}}').is(':hidden')){
                            $('#minimizedUser{{$i}}').show(500);
                            }
                            else {
                            $('#minimizedUser{{$i}}').hide(500);
                            }
                            ">+</button>
                </td>
            </tr>
        </table>


        <div id="minimizedUser{{$i}}" >
            <div class="row">
            @if(isset($users[$i]->apply->skills[0]->skill))
                    <div class="col-4">
                        <table class="table">
                            <tr>
                                <td>

                                </td>
                                <td>
                                    <b>Skill</b>
                                </td>
                                <td>
                                    <b>Level</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Skills :</b>
                                </td>
                                <td>
                                    <p>{{isset($users[$i]->apply->skills[0]->skill) ? $users[$i]->apply->skills[0]->skill : ''}}</p>
                                </td>
                                <td>
                                    <p>{{isset($users[$i]->apply->skills[0]->level) ? $users[$i]->apply->skills[0]->level : ''}}</p>
                                </td>
                            </tr>
                            @for($j = 1;$j < count($users[$i]->apply->skills);$j++)
                                <tr>
                                    <td>

                                    </td>
                                    <td>
                                        <p>{{$users[$i]->apply->skills[$j]->skill}}</p>
                                    </td>
                                    <td>
                                        <p>{{$users[$i]->apply->skills[$j]->level}}</p>
                                    </td>
                                </tr>
                            @endfor
                        </table>
                    </div>

                    <div class="col-2">

                    </div>

                    @endif

            @if(isset($users[$i]->apply->languages[0]->language))
                        <div class="col-4">
                            <table class="table">
                                <tr>
                                    <td>

                                    </td>
                                    <td>
                                        <b>Language</b>
                                    </td>
                                    <td>
                                        <b>Level</b>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Languages:</b>
                                    </td>
                                    <td>
                                        <p>{{isset($users[$i]->apply->languages[0]->language) ? $users[$i]->apply->languages[0]->language : ''}}</p>
                                    </td>
                                    <td>
                                        <p>{{isset($users[$i]->apply->languages[0]->level) ? $users[$i]->apply->languages[0]->level : ''}}</p>
                                    </td>
                                </tr>
                                @for($j = 1;$j < count($users[$i]->apply->languages);$j++)
                                    <tr>
                                        <td>

                                        </td>
                                        <td>
                                            <p>{{$users[$i]->apply->languages[$j]->language}}</p>
                                        </td>
                                        <td>
                                            <p>{{$users[$i]->apply->languages[$j]->level}}</p>
                                        </td>
                                    </tr>
                                @endfor
                            </table>
                        </div>

            @endif
            </div>
            @if(isset($users[$i]->apply->studies[0]->institution))
                <table class="table">
                    {{--Studies--}}
                    <tr>
                        <td>

                        </td>
                        <td>
                            <b>Institution</b>
                        </td>
                        <td>
                            <b>Country</b>
                        </td>
                        <td>
                            <b>Degree</b>
                        </td>
                        <td>
                            <b>Begin Date</b>
                        </td>
                        <td>
                            <b>End Date</b>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <b>Studies:</b>
                        </td>
                        <td>
                            <p>{{isset($users[$i]->apply->studies[0]->institution) ? $users[$i]->apply->studies[0]->institution : ''}}</p>
                        </td>
                        <td>
                            <p>{{isset($users[$i]->apply->studies[0]->country) ? $users[$i]->apply->studies[0]->country : ''}}</p>
                        </td>
                        <td>
                            <p>{{isset($users[$i]->apply->studies[0]->degree) ? $users[$i]->apply->studies[0]->degree : ''}}</p>
                        </td>
                        <td>
                            <p>{{isset($users[$i]->apply->studies[0]->beginDate) ? $users[$i]->apply->studies[0]->beginDate : ''}}</p>
                        </td>
                        <td>
                            <p>{{isset($users[$i]->apply->studies[0]->endDate) ? $users[$i]->apply->studies[0]->endDate : ''}}</p>
                        </td>
                    </tr>
                    @for($j = 1;$j < count($users[$i]->apply->studies);$j++)
                        <tr>
                            <td>

                            </td>
                            <td>
                                <p>{{$users[$i]->apply->studies[$j]->institution}}</p>
                            </td>
                            <td>
                                <p>{{$users[$i]->apply->studies[$j]->country}}</p>
                            </td>
                            <td>
                                <p>{{$users[$i]->apply->studies[$j]->degree}}</p>
                            </td>
                            <td>
                                <p>{{$users[$i]->apply->studies[$j]->beginDate}}</p>
                            </td>
                            <td>
                                <p>{{$users[$i]->apply->studies[$j]->endDate}}</p>
                            </td>
                        </tr>
                    @endfor
                </table>

                <table class="table">
                    <tr>
                        @for($j = 0;$j < 12;$j++)
                            <td>

                            </td>
                        @endfor
                    </tr>
                </table>

            @endif

            @if(isset($users[$i]->apply->activities[0]->nameOfOrganizer))

                <table class="table">
                    {{--Activities--}}
                    <tr>
                        <td>

                        </td>
                        <td>
                            <b>Name Of Organiser</b>
                        </td>
                        <td>
                            <b>Location</b>
                        </td>
                        <td>
                            <b>Training Subject</b>
                        </td>
                        <td>
                            <b>Begin Date</b>
                        </td>
                        <td>
                            <b>End Date</b>
                        </td>
                        <td>
                            <b>Certificate</b>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <b>Activities:</b>
                        </td>
                        <td>
                            <p>{{isset($users[$i]->apply->activities[0]->nameOfOrganizer) ? $users[$i]->apply->activities[0]->nameOfOrganizer : ''}}</p>
                        </td>
                        <td>
                            <p>{{isset($users[$i]->apply->activities[0]->location) ? $users[$i]->apply->activities[0]->location : ''}}</p>
                        </td>
                        <td>
                            <p>{{isset($users[$i]->apply->activities[0]->trainingSubject) ? $users[$i]->apply->activities[0]->trainingSubject : ''}}</p>
                        </td>
                        <td>
                            <p>{{isset($users[$i]->apply->activities[0]->beginDate) ? $users[$i]->apply->activities[0]->beginDate : ''}}</p>
                        </td>
                        <td>
                            <p>{{isset($users[$i]->apply->activities[0]->endDate) ? $users[$i]->apply->activities[0]->endDate : ''}}</p>
                        </td>
                        <td>
                            <p>{{isset($users[$i]->apply->activities[0]->certificate) ? $users[$i]->apply->activities[0]->certificate : ''}}</p>
                        </td>
                    </tr>
                    @for($j = 1;$j < count($users[$i]->apply->activities);$j++)
                        <tr>
                            <td>

                            </td>
                            <td>
                                <p>{{$users[$i]->apply->activities[$j]->nameOfOrganizer}}</p>
                            </td>
                            <td>
                                <p>{{$users[$i]->apply->activities[$j]->location}}</p>
                            </td>
                            <td>
                                <p>{{$users[$i]->apply->activities[$j]->trainingSubject}}</p>
                            </td>
                            <td>
                                <p>{{$users[$i]->apply->activities[$j]->beginDate}}</p>
                            </td>
                            <td>
                                <p>{{$users[$i]->apply->activities[$j]->endDate}}</p>
                            </td>
                            <td>
                                <p>{{$users[$i]->apply->activities[$j]->certificate}}</p>
                            </td>
                        </tr>
                    @endfor
                </table>

                <table class="table">
                    <tr>
                        @for($j = 0;$j < 12;$j++)
                            <td>

                            </td>
                        @endfor
                    </tr>
                </table>
            @endif

            @if(isset($users[$i]->apply->work_experience[0]->position))
                <table class="table">
                    {{--Work Experience--}}
                    <tr>
                        <td>

                        </td>
                        <td>
                            <b>Position</b>
                        </td>
                        <td>
                            <b>Employer</b>
                        </td>
                        <td>
                            <b>Start Salary</b>
                        </td>
                        <td>
                            <b>Other Benefits</b>
                        </td>
                        <td>
                            <b>Tasks</b>
                        </td>
                        <td>
                            <b>Begin Date</b>
                        </td>
                        <td>
                            <b>End Date</b>
                        </td>
                        <td>
                            <b>Country</b>
                        </td>
                        <td>
                            <b>Reason Of Resignation</b>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <b>Work Experience:</b>
                        </td>
                        <td>
                            <p>{{isset($users[$i]->apply->work_experience[0]->position) ? $users[$i]->apply->work_experience[0]->position : ''}}</p>
                        </td>
                        <td>
                            <p>{{isset($users[$i]->apply->work_experience[0]->employer) ? $users[$i]->apply->work_experience[0]->employer : ''}}</p>
                        </td>
                        <td>
                            <p>{{isset($users[$i]->apply->work_experience[0]->startSalary) ? $users[$i]->apply->work_experience[0]->startSalary : ''}}</p>
                        </td>
                        <td>
                            <p>{{isset($users[$i]->apply->work_experience[0]->otherBenefits) ? $users[$i]->apply->work_experience[0]->otherBenefits : ''}}</p>
                        </td>
                        <td>
                            <p>{{isset($users[$i]->apply->work_experience[0]->tasks) ? $users[$i]->apply->work_experience[0]->tasks : ''}}</p>
                        </td>
                        <td>
                            <p>{{isset($users[$i]->apply->work_experience[0]->beginDate) ? $users[$i]->apply->work_experience[0]->beginDate : ''}}</p>
                        </td>
                        <td>
                            <p>{{isset($users[$i]->apply->work_experience[0]->endDate) ? $users[$i]->apply->work_experience[0]->endDate : ''}}</p>
                        </td>
                        <td>
                            <p>{{isset($users[$i]->apply->work_experience[0]->country) ? $users[$i]->apply->work_experience[0]->country : ''}}</p>
                        </td>
                        <td>
                            <p>{{isset($users[$i]->apply->work_experience[0]->reasonOfResignation) ? $users[$i]->apply->work_experience[0]->reasonOfResignation : ''}}</p>
                        </td>
                    </tr>
                    @for($j = 1;$j < count($users[$i]->apply->work_experience);$j++)
                        <tr>
                            <td>

                            </td>
                            <td>
                                <p>{{$users[$i]->apply->work_experience[$j]->position}}</p>
                            </td>
                            <td>
                                <p>{{$users[$i]->apply->work_experience[$j]->employer}}</p>
                            </td>
                            <td>
                                <p>{{$users[$i]->apply->work_experience[$j]->startSalary}}</p>
                            </td>
                            <td>
                                <p>{{$users[$i]->apply->work_experience[$j]->otherBenefits}}</p>
                            </td>
                            <td>
                                <p>{{$users[$i]->apply->work_experience[$j]->tasks}}</p>
                            </td>
                            <td>
                                <p>{{$users[$i]->apply->work_experience[$j]->beginDate}}</p>
                            </td>
                            <td>
                                <p>{{$users[$i]->apply->work_experience[$j]->endDate}}</p>
                            </td>
                            <td>
                                <p>{{$users[$i]->apply->work_experience[$j]->country}}</p>
                            </td>
                            <td>
                                <p>{{$users[$i]->apply->work_experience[$j]->reasonOfResignation}}</p>
                            </td>
                        </tr>
                    @endfor
                </table>

                <table class="table">
                    <tr>
                        @for($j = 0;$j < 12;$j++)
                            <td>

                            </td>
                        @endfor
                    </tr>
                </table>
            @endif

            @if(isset($users[$i]->apply->recommendations[0]->name))
                <div class="col-8">
                    <table class="table">
                        {{--Recommendations--}}
                        <tr>
                            <td>

                            </td>
                            <td>
                                <b>Name</b>
                            </td>
                            <td>
                                <b>Address</b>
                            </td>
                            <td>
                                <b>Position</b>
                            </td>
                            <td>
                                <b>Contact</b>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <b>Recommendations:</b>
                            </td>
                            <td>
                                <p>{{isset($users[$i]->apply->recommendations[0]->name) ? $users[$i]->apply->recommendations[0]->name : ''}}</p>
                            </td>
                            <td>
                                <p>{{isset($users[$i]->apply->recommendations[0]->address) ? $users[$i]->apply->recommendations[0]->address : ''}}</p>
                            </td>
                            <td>
                                <p>{{isset($users[$i]->apply->recommendations[0]->position) ? $users[$i]->apply->recommendations[0]->position : ''}}</p>
                            </td>
                            <td>
                                <p>{{isset($users[$i]->apply->recommendations[0]->contact) ? $users[$i]->apply->recommendations[0]->contact : ''}}</p>
                            </td>
                        </tr>
                        @for($j = 1;$j < count($users[$i]->apply->recommendations);$j++)
                            <tr>
                                <td>

                                </td>
                                <td>
                                    <p>{{$users[$i]->apply->recommendations[$j]->name}}</p>
                                </td>
                                <td>
                                    <p>{{$users[$i]->apply->recommendations[$j]->address}}</p>
                                </td>
                                <td>
                                    <p>{{$users[$i]->apply->recommendations[$j]->position}}</p>
                                </td>
                                <td>
                                    <p>{{$users[$i]->apply->recommendations[$j]->contact}}</p>
                                </td>
                            </tr>
                        @endfor
                    </table>
                </div>
            @endif
        </div>
    @endfor
    {{--Number({{count($users)}}--}}
    {{--TODO output--}}
    <script>
        $(function () {
            for(var i = 0;i < Number({{count($users)}});i++)
            {
                $('#minimizedUser'+i+'').hide();

            }
            @for($i = 0;$i < count($users);$i++)
                @if($users[$i]->status === 'applying')
                    $('#decide{{$i}}').hide();
                    $('#start{{$i}}').show();
                @else
                    $('#decide{{$i}}').show();
                    $('#start{{$i}}').hide();
                @endif
            @endfor
        })
    </script>
@endsection