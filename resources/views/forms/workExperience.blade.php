<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 25.02.2018
 * Time: 22:02
 */?>
<div class="col-4">
    <div class="form-group">
        {{Form::label('position[]', 'Position')}}
        {{Form::text('position[]', isset($apply->work_experience[0])?$apply->work_experience[0]->position:'',['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('employer[]', 'Employer')}}
        {{Form::text('employer[]', isset($apply->work_experience[0])?$apply->work_experience[0]->employer:'',['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('startSalary[]', 'Start Salary')}}
        {{Form::text('startSalary[]', isset($apply->work_experience[0])?$apply->work_experience[0]->startSalary:'',['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('otherBenefits[]', 'Other Benefits')}}
        {{Form::text('otherBenefits[]', isset($apply->work_experience[0])?$apply->work_experience[0]->otherBenefits:'',['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('tasks[]', 'Tasks')}}
        {{Form::text('tasks[]', isset($apply->work_experience[0])?$apply->work_experience[0]->tasks:'',['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('workBeginDate[]', 'Begin Date')}}
        {{Form::date('workBeginDate[]', isset($apply->work_experience[0])?$apply->work_experience[0]->beginDate:'',['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('workEndDate[]', 'End Date')}}
        {{Form::date('workEndDate[]', isset($apply->work_experience[0])?$apply->work_experience[0]->endDate:Carbon\Carbon::now(),['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('country[]', 'Country')}}
        {{Form::text('country[]', isset($apply->work_experience[0])?$apply->work_experience[0]->country:'',['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('reasonOfResignation[]', 'Reason of Resignation')}}
        {{Form::text('reasonOfResignation[]', isset($apply->work_experience[0])?$apply->work_experience[0]->reasonOfResignation:'',['class'=>'form-control'])}}
    </div>
    <button type="button" name="add" id="addWorkExp" class="btn btn-success" data-toggle = "tooltip" title ="Add up to 3 skills" style="float: right">Add More</button>
</div>

<?php
    for($i = 1;$i <= 2;$i++)
    {
        if(isset($apply->studies[$i]))
        {
            echo '<div id = "divWorkExp'.$i.'" class="dynamicWorkExpAdded col-4">';
            echo '<div class="form-group">';
            echo     Form::label('position[]', 'Position');
            echo     Form::text('position[]', isset($apply->work_experience[$i])?$apply->work_experience[$i]->position:'',['class'=>'form-control']);
            echo '</div>';

            echo '<div class="form-group">';
            echo     Form::label('employer[]', 'Employer');
            echo     Form::text('employer[]', isset($apply->work_experience[$i])?$apply->work_experience[$i]->employer:'',['class'=>'form-control']);
            echo '</div>';

            echo '<div class="form-group">';
            echo     Form::label('startSalary[]', 'Start Salary');
            echo     Form::text('startSalary[]', isset($apply->work_experience[$i])?$apply->work_experience[$i]->startSalary:'',['class'=>'form-control']);
            echo '</div>';

            echo '<div class="form-group">';
            echo     Form::label('otherBenefits[]', 'Other Benefits');
            echo     Form::text('otherBenefits[]', isset($apply->work_experience[$i])?$apply->work_experience[$i]->otherBenefits:'',['class'=>'form-control']);
            echo '</div>';

            echo '<div class="form-group">';
            echo     Form::label('tasks[]', 'Tasks');
            echo     Form::text('tasks[]', isset($apply->work_experience[$i])?$apply->work_experience[$i]->tasks:'',['class'=>'form-control']);
            echo '</div>';

            echo '<div class="form-group">';
            echo     Form::label('workBeginDate[]', 'Begin Date');
            echo     Form::date('workBeginDate[]', isset($apply->work_experience[$i])?$apply->work_experience[$i]->beginDate:'',['class'=>'form-control']);
            echo '</div>';

            echo '<div class="form-group">';
            echo     Form::label('workEndDate[]', 'End Date');
            echo     Form::date('workEndDate[]', isset($apply->work_experience[$i])?$apply->work_experience[$i]->endDate:Carbon\Carbon::now(),['class'=>'form-control']);
            echo '</div>';

            echo '<div class="form-group">';
            echo     Form::label('country[]', 'Country');
            echo     Form::text('country[]', isset($apply->work_experience[$i])?$apply->work_experience[$i]->country:'',['class'=>'form-control']);
            echo '</div>';

            echo '<div class="form-group">';
            echo     Form::label('reasonOfResignation[]', 'Reason of Resignation');
            echo     Form::text('reasonOfResignation[]', isset($apply->work_experience[$i])?$apply->work_experience[$i]->reasonOfResignation:'',['class'=>'form-control']);
            echo '</div>';
            echo '<button type="button" id="'.$i.'" class="btn btn-danger btnRemoveWorkExp" style="float: right">x</button>';
            echo '</div>';
        }
    }
?>

<script type="text/javascript">
    $(document).ready(function ()
    {
        var i = 1;
        var workExpLen = " <?php echo count($apply->work_experience) ?> ";
        i = (workExpLen != 0)? workExpLen : 1;

        $('#addWorkExp').click(function ()
        {
            if(i < 3)
            {
                i++;
                $('#dynamicWorkExp').append('<div id = "divWorkExp' + i + '" class="dynamicWorkExpAdded col-4">' +
                '<div class="form-group">'+
                    '{{Form::label('position[]', 'Position')}}'+
                    '{{Form::text('position[]', '',['class'=>'form-control'])}}'+
                '</div>'+

                '<div class="form-group">'+
                    '{{Form::label('employer[]', 'Employer')}}'+
                    '{{Form::text('employer[]', '',['class'=>'form-control'])}}'+
                '</div>'+

                '<div class="form-group">'+
                    '{{Form::label('startSalary[]', 'Start Salary')}}'+
                    '{{Form::text('startSalary[]', '',['class'=>'form-control'])}}'+
                '</div>'+

                '<div class="form-group">'+
                    '{{Form::label('otherBenefits[]', 'Other Benefits')}}'+
                    '{{Form::text('otherBenefits[]', '',['class'=>'form-control'])}}'+
                '</div>'+

                '<div class="form-group">'+
                    '{{Form::label('tasks[]', 'Tasks')}}'+
                    '{{Form::text('tasks[]', '',['class'=>'form-control'])}}'+
                '</div>'+

                '<div class="form-group">'+
                    '{{Form::label('workBeginDate[]', 'Begin Date')}}'+
                    '{{Form::date('workBeginDate[]', '',['class'=>'form-control'])}}'+
                '</div>'+

                '<div class="form-group">'+
                    '{{Form::label('workEndDate[]', 'End Date')}}'+
                    '{{Form::date('workEndDate[]', Carbon\Carbon::now(),['class'=>'form-control'])}}'+
                '</div>'+

                '<div class="form-group">'+
                    '{{Form::label('country[]', 'Country')}}'+
                    '{{Form::text('country[]', '',['class'=>'form-control'])}}'+
                '</div>'+

                '<div class="form-group">'+
                    '{{Form::label('reasonOfResignation[]', 'Reason of Resignation')}}'+
                    '{{Form::text('reasonOfResignation[]', '',['class'=>'form-control'])}}'+
                '</div>'+
                    '<button type="button" id="' + i + '" class="btn btn-danger btnRemoveWorkExp" style="float: right">x</button>'+
                    '            </div>'
                );
            }
        });

        $(document).on('click', '.btnRemoveWorkExp', function(){
            i--;
            var button_id_div = $(this).attr("id");
            $('#divWorkExp'+button_id_div+'').remove();
        });
    })
</script>
