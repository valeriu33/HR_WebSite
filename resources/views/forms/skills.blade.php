<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 25.02.2018
 * Time: 15:51
 */?>
{{--TODO on hold indications--}}
<div id="dynamicSkill">
    <div class="form-group">
        {{Form::label('skill[]', 'Skill')}}
        {{Form::text('skill[]', isset($apply->skills[0])?$apply->skills[0]->skill:'',['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('level[]', 'Level')}}
        {{Form::text('level[]', isset($apply->skills[0])?$apply->skills[0]->level:'',['class'=>'form-control','data-toggle' => 'tooltip', 'title' => 'Write a level of knowlege like : beginner, middle, expert'])}}
    </div>
    <button type="button" name="add" id="addSkill" class="btn btn-success" data-toggle = "tooltip" title ="Add up to 4 skills" style="float: right">Add More</button>
    <br><br>
    <hr>
    <?php
    for($i = 1;$i <= 3;$i++)
    {
        if(isset($apply->skills[$i]))
        {
            echo '<div id = "divSkill'.$i.'" class="dynamicSkillAdded">';
            echo '<div class="form-group">';
            echo Form::label('skill[]', 'Skill');
            echo Form::text('skill[]', isset($apply->skills[$i])?$apply->skills[$i]->skill:'' ,['class'=>'form-control']);
            echo '</div>';
            echo '<div class="form-group">';
            echo Form::label('level[]', 'Level');
            echo Form::text('level[]', isset($apply->skills[$i])?$apply->skills[$i]->level:'' ,['class'=>'form-control']);
            echo '</div>';
            echo '<button type="button" id="'.$i.'" class="btn btn-danger btnRemoveSkill" style="float: right">x</button>';
            echo '<br><br><hr></div>';
        }
    }
    ?>
</div>
<script type="text/javascript">


    $(document).ready(function ()
    {
        var i = 1;
        var skillLen = " <?php echo count($apply->skills) ?> ";
        i = (skillLen != 0)? skillLen : 1;

        $('#addSkill').click(function ()
        {
            if(i < 4)
            {
                i++;
                $('#dynamicSkill').append('<div id = "divSkill' + i + '" class="dynamicSkillAdded">' +
                    '            <div class="form-group">' +
                    '                {{Form::label('skill[]', 'Skill')}}' +
                    '                {{Form::text('skill[]', '',['class'=>'form-control'])}}' +
                    '            </div>' +
                    '' +
                    '            <div class="form-group">' +
                    '                {{Form::label('level[]', 'Level')}}' +
                    '                {{Form::text('level[]', '',['class'=>'form-control'])}}' +
                    '            </div>' +
                    '<button type="button" id="' + i + '" class="btn btn-danger btnRemoveSkill" style="float: right">x</button>'+
                    '                <br><br><hr>' +
                    '            </div>'
                );
            }
        });

        $(document).on('click', '.btnRemoveSkill', function(){
            i--;
            var button_id_div = $(this).attr("id");
            $('#divSkill'+button_id_div+'').remove();
        });
    })
</script>
