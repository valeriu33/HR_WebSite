<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 25.02.2018
 * Time: 16:39
 */?>
<div class="col-4">
    <div class="form-group">
        {{Form::label('nameOfOrganizer[]', 'Name of organizer')}}
        {{Form::text('nameOfOrganizer[]', isset($apply->activities[0])?$apply->activities[0]->nameOfOrganizer:'', ['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('location[]', 'Location')}}
        {{Form::text('location[]', isset($apply->activities[0])?$apply->activities[0]->location:'', ['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('trainingSubject[]', 'Training Subject')}}
        {{Form::text('trainingSubject[]', isset($apply->activities[0])?$apply->activities[0]->trainingSubject:'', ['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('activityBeginDate[]', 'Begin Date')}}
        {{Form::date('activityBeginDate[]', isset($apply->activities[0])?$apply->activities[0]->beginDate:Carbon\Carbon::now(), ['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('activityEndDate[]', 'End Date')}}
        {{Form::date('activityEndDate[]', isset($apply->activities[0])?$apply->activities[0]->endDate:Carbon\Carbon::now(), ['class'=>'form-control'])}}
    </div>

    <div class="form-group">
            {{Form::label('activityCertificate[]', 'Certificate')}}
            {{Form::text('activityCertificate[]', isset($apply->activities[0])?$apply->activities[0]->certificate:'', ['class'=>'form-control'])}}
        </div>
        <button type="button" name="add" id="addActivities" class="btn btn-success" data-toggle = "tooltip" title ="Add up to 3 skills" style="float: right">Add More</button>
</div>
<?php
for($i = 1;$i <= 2;$i++)
{
    if(isset($apply->activities[$i]))
    {
        echo '<div id = "divActivities'.$i.'" class="dynamicActivityAdded col-4">';
        echo '<div class="form-group">';
        echo    Form::label('nameOfOrganizer[]', 'Name of organizer');
        echo    Form::text('nameOfOrganizer[]', isset($apply->activities[$i])?$apply->activities[$i]->nameOfOrganizer:'', ['class'=>'form-control']);
        echo '</div>';

        echo '<div class="form-group">';
        echo     Form::label('location[]', 'Location');
        echo     Form::text('location[]', isset($apply->activities[$i])?$apply->activities[$i]->location:'', ['class'=>'form-control']);
        echo '</div>';

        echo '<div class="form-group">';
        echo     Form::label('trainingSubject[]', 'Training Subject');
        echo     Form::text('trainingSubject[]', isset($apply->activities[$i])?$apply->activities[$i]->trainingSubject:'', ['class'=>'form-control']);
        echo '</div>';

        echo '<div class="form-group">';
        echo     Form::label('activityBeginDate[]', 'Begin Date');
        echo     Form::date('activityBeginDate[]', isset($apply->activities[$i])?$apply->activities[$i]->beginDate:Carbon\Carbon::now(), ['class'=>'form-control']);
        echo '</div>';

        echo '<div class="form-group">';
        echo     Form::label('activityEndDate[]', 'End Date');
        echo     Form::date('activityEndDate[]', isset($apply->activities[$i])?$apply->activities[$i]->endDate:Carbon\Carbon::now(), ['class'=>'form-control']);
        echo '</div>';

        echo '<div class="form-group">';
        echo     Form::label('activityCertificate[]', 'Certificate');
        echo     Form::text('activityCertificate[]', isset($apply->activities[$i])?$apply->activities[$i]->certificate:'', ['class'=>'form-control']);
        echo '</div>';
        echo '<button type="button" id="'.$i.'" class="btn btn-danger btnRemoveActivities" style="float: right">x</button>';
        echo '</div>';

    }
}
?>

<script type="text/javascript">
    $(document).ready(function ()
    {
        var i = 1;
        var actvitiesLen = " <?php echo count($apply->activities) ?> ";
        i = (actvitiesLen != 0)? actvitiesLen : 1;

        $('#addActivities').click(function ()
        {
            if(i < 3)
            {
                i++;
                $('#dynamicActivities').append('<div id = "divActivities' + i + '" class="dynamicActivityAdded col-4">' +
                    '                <div class="form-group">'+
                    '                    {{Form::label('nameOfOrganizer[]', 'Name of organizer')}}'+
                    '                    {{Form::text('nameOfOrganizer[]', '', ['class'=>'form-control'])}}'+
                    '                </div>'+
                    ''+
                    '                <div class="form-group">'+
                    '                    {{Form::label('location[]', 'Location')}}'+
                    '                    {{Form::text('location[]', '', ['class'=>'form-control'])}}'+
                    '                </div>'+
                    ''+
                    '                <div class="form-group">'+
                    '                    {{Form::label('trainingSubject[]', 'Training Subject')}}'+
                    '                    {{Form::text('trainingSubject[]', '', ['class'=>'form-control'])}}'+
                    '                </div>'+
                    ''+
                    '                <div class="form-group">'+
                    '                    {{Form::label('activityBeginDate[]', 'Begin Date')}}'+
                    '                    {{Form::date('activityBeginDate[]','', ['class'=>'form-control'])}}'+
                    '                </div>'+
                    ''+
                    '                <div class="form-group">'+
                    '                    {{Form::label('activityEndDate[]', 'End Date')}}'+
                    '                    {{Form::date('activityEndDate[]','', ['class'=>'form-control'])}}'+
                    '                </div>'+
                    ''+
                    '                <div class="form-group">'+
                    '                    {{Form::label('activityCertificate[]', 'Certificate')}}'+
                    '                    {{Form::text('activityCertificate[]', '', ['class'=>'form-control'])}}'+
                    '                </div>'+
                    '<button type="button" id="' + i + '" class="btn btn-danger btnRemoveActivities" style="float: right">x</button>'+
                    '            </div>'
                );
            }
        });

        $(document).on('click', '.btnRemoveActivities', function(){
            i--;
            var button_id_div = $(this).attr("id");
            $('#divActivities'+button_id_div+'').remove();
        });
    })
</script>
