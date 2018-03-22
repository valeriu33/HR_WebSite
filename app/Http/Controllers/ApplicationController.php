<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Apply;
use App\Language;
use App\PersonalInfo;
use App\Recommendation;
use App\WorkExperience;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Skill;
use App\Study;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

//TODO 5) Admin: Register,Update Applications (in progress...)
//TODO 6) view error handling


//in appView we write as default text : 'for(inc(i)) Auth::user()->apply->...->get(i)->...'; (verify)
//in submit we delete all tables
//and then we create new ones
//$req('name') --> user->apply->Tname->name
// 'for(inc(i)) $...Arr = array(array('..'=>$req('..[i]'), array('..'=>$req('..[i]'));
// Auth::user()->apply->...->get(i)->update($...Arr[i]);'

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function submit(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'cellPhoneNumber' => 'required|numeric',
            'CV_file' => 'nullable|max:1999',
        ]);



        //Get authenticated User
        $user = Auth::user();

        //Update Apply of authorised user
        $applyArr = array(
            'vacancyName'=>$request->input('vacancyName'),
        );
        $user->apply->update($applyArr);

        $apply = $user->apply;

        //Create an array to update Personal Info
        $persInfoArr = array(
            'firstname'=>$request->input('firstname'),
            'middlename'=>$request->input('middlename'),
            'lastname'=>$request->input('lastname'),
            'cellPhoneNumber'=>$request->input('cellPhoneNumber'),
            'phoneNumber'=>$request->input('phoneNumber'),
            'address'=>$request->input('userAddress'),
            'nationality'=>$request->input('nationality'),
            'countryOfBirth'=>$request->input('countryOfBirth'),
        );

        //Handle file upload
        if($request->hasFile('CV_file'))
        {
            $fileNameWithExt = $request->file('CV_file')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('CV_file')->getClientOriginalExtension();
            $fileNameToStore = $fileName."_".time().".".$extension;
            $path = $request->file('CV_file')->storeAs('public/CV_Files',$fileNameToStore);
            $persInfoArr['filename'] = (string)$fileNameToStore;
        }

        //Update Personal Info
        $apply->personal_info->update($persInfoArr);

        //DELETE ALL DATA FROM TABLES
        foreach ($apply->skills as $skill)
        {
            $skill->delete();
        }

        foreach ($apply->languages as $language)
        {
            $language->delete();
        }

        foreach ($apply->studies as $study)
        {
            $study->delete();
        }

        foreach ($apply->activities as $activity)
        {
            $activity->delete();
        }

        foreach ($apply->work_experience as $work_experience)
        {
            $work_experience->delete();
        }

        foreach ($apply->recommendations as $recommendation)
        {
            $recommendation->delete();
        }

        //RECREATE AND COMPLETE ALL TABLES
        for ($i = 0;$i < count($request->input('languageSkill')); $i++)
        {
            if ($request->input('languageSkill')[$i] != null) {
                $language = new Language();
                $language->language = $request->input('languageSkill')[$i];
                $language->level = $request->input('languageLevel')[$i];
                $language->applies_id = $apply->id;
                $language->save();
            }
        }

      //Check if there are skills in DataBase
        for ($i = 0;$i < count($request->input('skill'));$i++)
        {
            if ($request->input('skill')[$i] != null) {
                $skill = new Skill;
                $skill->skill = $request->input('skill')[$i];
                $skill->level = isset($request->input('level')[$i]) ? $request->input('level')[$i] : '';
                $skill->applies_id = $apply->id;
                $skill->save();
            }
        }

        for ($i = 0;$i < count($request->input('institution'));$i++)
        {
            if ($request->input('institution')[$i] != null) {
                $studies = new Study();
                $studies->institution = $request->input('institution')[$i];
                $studies->country = $request->input('country')[$i];
                $studies->degree = $request->input('degree')[$i];
                $studies->beginDate = $request->input('studiesBeginDate')[$i];
                $studies->endDate = $request->input('studiesEndDate')[$i];
                $studies->applies_id = $apply->id;
                $studies->save();
            }
        }

        for ($i = 0;$i < count($request->input('nameOfOrganizer'));$i++)
        {
            if ($request->input('nameOfOrganizer')[$i] != null) {
                $activity = new Activity();
                $activity->nameOfOrganizer = $request->input('nameOfOrganizer')[$i];
                $activity->location = $request->input('location')[$i];
                $activity->trainingSubject = $request->input('trainingSubject')[$i];
                $activity->beginDate = $request->input('activityBeginDate')[$i];
                $activity->endDate = $request->input('activityEndDate')[$i];
                $activity->certificate = $request->input('activityCertificate')[$i];
                $activity->applies_id = $apply->id;
                $activity->save();
            }
        }

        for ($i = 0;$i < count($request->input('position'));$i++)
        {
            if ($request->input('position')[$i] != null) {
                $workExperience = new WorkExperience();
                $workExperience->position = $request->input('position')[$i];
                $workExperience->employer = $request->input('employer')[$i];
                $workExperience->startSalary = $request->input('startSalary')[$i];
                $workExperience->otherBenefits = $request->input('otherBenefits')[$i];
                $workExperience->tasks = $request->input('tasks')[$i];
                $workExperience->beginDate = $request->input('workBeginDate')[$i];
                $workExperience->endDate = $request->input('workEndDate')[$i];
                $workExperience->country = $request->input('country')[$i];
                $workExperience->reasonOfResignation = $request->input('reasonOfResignation')[$i];
                $workExperience->applies_id = $apply->id;
                $workExperience->save();
            }
        }

        for ($i = 0;$i < count($request->input('recName'));$i++)
        {
            if ($request->input('recName')[$i] != null) {
                $recommendation = new Recommendation();
                $recommendation->name = $request->input('recName')[$i];
                $recommendation->address = $request->input('recAddress')[$i];
                $recommendation->position = $request->input('recPosition')[$i];
                $recommendation->contact = $request->input('contact')[$i];
                $recommendation->applies_id = $apply->id;
                $recommendation->save();
            }
        }

        return redirect('/home')->with('status', 'success');
    }

    public function index()
    {
        return view('application');
    }
}
