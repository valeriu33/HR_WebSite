<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 25.02.2018
 * Time: 16:37
 */?>
<div class="col-4">
    <div class="form-group">
        {{Form::label('institution[]', 'Institution')}}
        {{Form::text('institution[]', isset($apply->studies[0])?$apply->studies[0]->institution:'',['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('country[]', 'Country')}}
        {{Form::text('country[]', isset($apply->studies[0])?$apply->studies[0]->country:'',['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('degree[]', 'Degree')}}
        {{Form::text('degree[]', isset($apply->studies[0])?$apply->studies[0]->degree:'',['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('studiesBeginDate[]', 'Begin Date')}}
        {{Form::date('studiesBeginDate[]', isset($apply->studies[0])?$apply->studies[0]->beginDate:Carbon\Carbon::now(), ['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('studiesEndDate[]', 'End Date')}}
        {{Form::date('studiesEndDate[]', isset($apply->studies[0])?$apply->studies[0]->endDate:Carbon\Carbon::now(), ['class'=>'form-control'])}}
    </div>
    <button type="button" name="add" id="addStudies" class="btn btn-success" data-toggle = "tooltip" title ="Add up to 3 skills" style="float: right">Add More</button>
</div>
<?php
    for($i = 1;$i <= 2;$i++)
    {
        if(isset($apply->studies[$i]))
        {
            echo '<div id = "divStudies'.$i.'" class="dynamicStudiesAdded col-4">';
             echo '<div class="form-group">';
             echo         Form::label('institution[]', 'Institution');
             echo         Form::text('institution[]', isset($apply->studies[$i])?$apply->studies[$i]->institution:'',['class'=>'form-control']);
             echo '</div>';

             echo '<div class="form-group">';
             echo         Form::label('country[]', 'Country');
             echo         Form::text('country[]', isset($apply->studies[$i])?$apply->studies[$i]->country:'',['class'=>'form-control']);
             echo '</div>';

             echo '<div class="form-group">';
             echo         Form::label('degree[]', 'Degree');
             echo         Form::text('degree[]', isset($apply->studies[$i])?$apply->studies[$i]->degree:'',['class'=>'form-control']);
             echo '</div>';

             echo '<div class="form-group">';
             echo         Form::label('studiesBeginDate[]', 'Begin Date');
             echo         Form::date('studiesBeginDate[]', isset($apply->studies[$i])?$apply->studies[$i]->beginDate:Carbon\Carbon::now(), ['class'=>'form-control']);
             echo '</div>';

             echo '<div class="form-group">';
             echo         Form::label('studiesEndDate[]', 'End Date');
             echo         Form::date('studiesEndDate[]', isset($apply->studies[$i])?$apply->studies[$i]->endDate:Carbon\Carbon::now(), ['class'=>'form-control']);
             echo '</div>';
             echo '<button type="button" id="'.$i.'" class="btn btn-danger btnRemoveStudies" style="float: right">x</button>';
             echo '</div>';
        }
    }
?>



<script type="text/javascript">
    $(document).ready(function ()
    {
        var i = 1;
        var studiesLen = " <?php echo count($apply->studies) ?> ";
        i = (studiesLen != 0)? studiesLen : 1;

        $('#addStudies').click(function ()
        {
            if(i < 3)
            {
                i++;
                $('#dynamicStudies').append('<div id = "divStudies' + i + '" class="dynamicStudiesAdded col-4">' +
                    '                <div class="form-group">'+
                    '                   {{Form::label('institution[]', 'Institution')}}'+
                    '                   {{Form::text('institution[]','',['class'=>'form-control'])}}'+
                    '               </div>'+
                    ''+
                    '                <div class="form-group">'+
                    '                    {{Form::label('country[]', 'Country')}}'+
                    '                   {{Form::text('country[]','',['class'=>'form-control'])}}'+
                    '               </div>'+
                    ''+
                    '                <div class="form-group">'+
                    '                    {{Form::label('degree[]', 'Degree')}}'+
                    '                   {{Form::text('degree[]','',['class'=>'form-control'])}}'+
                    '                </div>'+
                    ''+
                    '                <div class="form-group">'+
                    '                   {{Form::label('studiesBeginDate[]', 'Begin Date')}}'+
                    '                   {{Form::date('studiesBeginDate[]','', ['class'=>'form-control'])}}'+
                    '                </div>'+
                    ''+
                    '                <div class="form-group">'+
                    '                   {{Form::label('studiesEndDate[]', 'End Date')}}'+
                    '                   {{Form::date('studiesEndDate[]','', ['class'=>'form-control'])}}'+
                    '                </div>'+
                    '<button type="button" id="' + i + '" class="btn btn-danger btnRemoveStudies" style="float: right">x</button>'+
                    '            </div>'
                );
            }
        });

        $(document).on('click', '.btnRemoveStudies', function(){
            i--;
            var button_id_div = $(this).attr("id");
            $('#divStudies'+button_id_div+'').remove();
        });
    })
</script>
