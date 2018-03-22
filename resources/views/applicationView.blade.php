@extends('layouts.app')

@section('content')
    <?php $apply = Auth::user()->apply;?>
    <div class="col-5">
        <h1>Your Current Application:</h1>
    </div>
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
        <tr>
            <td>
                <b>Personal Info: </b>
            </td>
            <td>
                <p>{{$apply->personal_info->firstname}}</p>
            </td>
            <td>
                <p>{{isset($apply->personal_info->middlename)?$apply->personal_info->middlename:''}}</p>
            </td>
            <td>
                <p>{{$apply->personal_info->lastname}}</p>
            </td>
            <td>
                <a download="{{$apply->personal_info->filename}}" href="storage/CV_Files/{{$apply->personal_info->filename}}">{{isset($apply->personal_info->filename)?$apply->personal_info->filename:''}}</a>
            </td>
            <td>
                <p>{{$apply->personal_info->cellPhoneNumber}}</p>
            </td>
            <td>
                <p>{{isset($apply->personal_info->phoneNumber)?$apply->personal_info->phoneNumber:''}}</p>
            </td>
            <td>
                <p>{{isset($apply->personal_info->address)?$apply->personal_info->address:''}}</p>
            </td>
            <td>
                <p>{{isset($apply->personal_info->nationality)?$apply->personal_info->nationality:''}}</p>
            </td>
            <td>
                <p>{{isset($apply->personal_info->countryOfBirth)?$apply->personal_info->countryOfBirth:''}}</p>
            </td>
        </tr>
    </table>
    <table class="table">
            <tr>
                @for($i = 0;$i < 12;$i++)
                    <td>

                    </td>
                @endfor
            </tr>
        </table>
    <div class="row">
        @if(isset($apply->skills[0]->skill))

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
                                <p>{{isset($apply->skills[0]->skill) ? $apply->skills[0]->skill : ''}}</p>
                            </td>
                            <td>
                                <p>{{isset($apply->skills[0]->level) ? $apply->skills[0]->level : ''}}</p>
                            </td>
                        </tr>
                        @for($i = 1;$i < count($apply->skills);$i++)
                            <tr>
                                <td>

                                </td>
                                <td>
                                    <p>{{$apply->skills[$i]->skill}}</p>
                                </td>
                                <td>
                                    <p>{{$apply->skills[$i]->level}}</p>
                                </td>
                            </tr>
                        @endfor
                    </table>
                </div>

                <div class="col-2">

                </div>

                @endif

        @if(isset($apply->languages[0]->language))
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
                                    <p>{{isset($apply->languages[0]->language) ? $apply->languages[0]->language : ''}}</p>
                                </td>
                                <td>
                                    <p>{{isset($apply->languages[0]->level) ? $apply->languages[0]->level : ''}}</p>
                                </td>
                            </tr>
                            @for($i = 1;$i < count($apply->languages);$i++)
                                <tr>
                                    <td>

                                    </td>
                                    <td>
                                        <p>{{$apply->languages[$i]->language}}</p>
                                    </td>
                                    <td>
                                        <p>{{$apply->languages[$i]->level}}</p>
                                    </td>
                                </tr>
                            @endfor
                        </table>
                    </div>

        @endif
    </div>
        @if(isset($apply->studies[0]->institution))
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
                        <p>{{isset($apply->studies[0]->institution) ? $apply->studies[0]->institution : ''}}</p>
                    </td>
                    <td>
                        <p>{{isset($apply->studies[0]->country) ? $apply->studies[0]->country : ''}}</p>
                    </td>
                    <td>
                        <p>{{isset($apply->studies[0]->degree) ? $apply->studies[0]->degree : ''}}</p>
                    </td>
                    <td>
                        <p>{{isset($apply->studies[0]->beginDate) ? $apply->studies[0]->beginDate : ''}}</p>
                    </td>
                    <td>
                        <p>{{isset($apply->studies[0]->endDate) ? $apply->studies[0]->endDate : ''}}</p>
                    </td>
                </tr>
                @for($i = 1;$i < count($apply->studies);$i++)
                    <tr>
                        <td>

                        </td>
                        <td>
                            <p>{{$apply->studies[$i]->institution}}</p>
                        </td>
                        <td>
                            <p>{{$apply->studies[$i]->country}}</p>
                        </td>
                        <td>
                            <p>{{$apply->studies[$i]->degree}}</p>
                        </td>
                        <td>
                            <p>{{$apply->studies[$i]->beginDate}}</p>
                        </td>
                        <td>
                            <p>{{$apply->studies[$i]->endDate}}</p>
                        </td>
                    </tr>
                @endfor
            </table>

            <table class="table">
                <tr>
                    @for($i = 0;$i < 12;$i++)
                        <td>

                        </td>
                    @endfor
                </tr>
            </table>

        @endif

        @if(isset($apply->activities[0]->nameOfOrganizer))

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
                        <b>Studies:</b>
                    </td>
                    <td>
                        <p>{{isset($apply->activities[0]->nameOfOrganizer) ? $apply->activities[0]->nameOfOrganizer : ''}}</p>
                    </td>
                    <td>
                        <p>{{isset($apply->activities[0]->location) ? $apply->activities[0]->location : ''}}</p>
                    </td>
                    <td>
                        <p>{{isset($apply->activities[0]->trainingSubject) ? $apply->activities[0]->trainingSubject : ''}}</p>
                    </td>
                    <td>
                        <p>{{isset($apply->activities[0]->beginDate) ? $apply->activities[0]->beginDate : ''}}</p>
                    </td>
                    <td>
                        <p>{{isset($apply->activities[0]->endDate) ? $apply->activities[0]->endDate : ''}}</p>
                    </td>
                    <td>
                        <p>{{isset($apply->activities[0]->certificate) ? $apply->activities[0]->certificate : ''}}</p>
                    </td>
                </tr>
                @for($i = 1;$i < count($apply->activities);$i++)
                    <tr>
                        <td>

                        </td>
                        <td>
                            <p>{{$apply->activities[$i]->nameOfOrganizer}}</p>
                        </td>
                        <td>
                            <p>{{$apply->activities[$i]->location}}</p>
                        </td>
                        <td>
                            <p>{{$apply->activities[$i]->trainingSubject}}</p>
                        </td>
                        <td>
                            <p>{{$apply->activities[$i]->beginDate}}</p>
                        </td>
                        <td>
                            <p>{{$apply->activities[$i]->endDate}}</p>
                        </td>
                        <td>
                            <p>{{$apply->activities[$i]->certificate}}</p>
                        </td>
                    </tr>
                @endfor
            </table>

            <table class="table">
                <tr>
                    @for($i = 0;$i < 12;$i++)
                        <td>

                        </td>
                    @endfor
                </tr>
            </table>
        @endif

        @if(isset($apply->work_experience[0]->position))
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
                        <b>Studies:</b>
                    </td>
                    <td>
                        <p>{{isset($apply->work_experience[0]->position) ? $apply->work_experience[0]->position : ''}}</p>
                    </td>
                    <td>
                        <p>{{isset($apply->work_experience[0]->employer) ? $apply->work_experience[0]->employer : ''}}</p>
                    </td>
                    <td>
                        <p>{{isset($apply->work_experience[0]->startSalary) ? $apply->work_experience[0]->startSalary : ''}}</p>
                    </td>
                    <td>
                        <p>{{isset($apply->work_experience[0]->otherBenefits) ? $apply->work_experience[0]->otherBenefits : ''}}</p>
                    </td>
                    <td>
                        <p>{{isset($apply->work_experience[0]->tasks) ? $apply->work_experience[0]->tasks : ''}}</p>
                    </td>
                    <td>
                        <p>{{isset($apply->work_experience[0]->beginDate) ? $apply->work_experience[0]->beginDate : ''}}</p>
                    </td>
                    <td>
                        <p>{{isset($apply->work_experience[0]->endDate) ? $apply->work_experience[0]->endDate : ''}}</p>
                    </td>
                    <td>
                        <p>{{isset($apply->work_experience[0]->country) ? $apply->work_experience[0]->country : ''}}</p>
                    </td>
                    <td>
                        <p>{{isset($apply->work_experience[0]->reasonOfResignation) ? $apply->work_experience[0]->reasonOfResignation : ''}}</p>
                    </td>
                </tr>
                @for($i = 1;$i < count($apply->work_experience);$i++)
                    <tr>
                        <td>

                        </td>
                        <td>
                            <p>{{$apply->work_experience[$i]->position}}</p>
                        </td>
                        <td>
                            <p>{{$apply->work_experience[$i]->employer}}</p>
                        </td>
                        <td>
                            <p>{{$apply->work_experience[$i]->startSalary}}</p>
                        </td>
                        <td>
                            <p>{{$apply->work_experience[$i]->otherBenefits}}</p>
                        </td>
                        <td>
                            <p>{{$apply->work_experience[$i]->tasks}}</p>
                        </td>
                        <td>
                            <p>{{$apply->work_experience[$i]->beginDate}}</p>
                        </td>
                        <td>
                            <p>{{$apply->work_experience[$i]->endDate}}</p>
                        </td>
                        <td>
                            <p>{{$apply->work_experience[$i]->country}}</p>
                        </td>
                        <td>
                            <p>{{$apply->work_experience[$i]->reasonOfResignation}}</p>
                        </td>
                    </tr>
                @endfor
            </table>

            <table class="table">
                <tr>
                    @for($i = 0;$i < 12;$i++)
                        <td>

                        </td>
                    @endfor
                </tr>
            </table>
        @endif

        @if(isset($apply->recommendations[0]->name))
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
                            <p>{{isset($apply->recommendations[0]->name) ? $apply->recommendations[0]->name : ''}}</p>
                        </td>
                        <td>
                            <p>{{isset($apply->recommendations[0]->address) ? $apply->recommendations[0]->address : ''}}</p>
                        </td>
                        <td>
                            <p>{{isset($apply->recommendations[0]->position) ? $apply->recommendations[0]->position : ''}}</p>
                        </td>
                        <td>
                            <p>{{isset($apply->recommendations[0]->contact) ? $apply->recommendations[0]->contact : ''}}</p>
                        </td>
                    </tr>
                    @for($i = 1;$i < count($apply->recommendations);$i++)
                        <tr>
                            <td>

                            </td>
                            <td>
                                <p>{{$apply->recommendations[$i]->name}}</p>
                            </td>
                            <td>
                                <p>{{$apply->recommendations[$i]->address}}</p>
                            </td>
                            <td>
                                <p>{{$apply->recommendations[$i]->position}}</p>
                            </td>
                            <td>
                                <p>{{$apply->recommendations[$i]->contact}}</p>
                            </td>
                        </tr>
                    @endfor
                </table>
            </div>
    @endif
@endsection