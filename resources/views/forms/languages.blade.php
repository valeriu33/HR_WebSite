<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 25.02.2018
 * Time: 16:03
 */?>

<div id="dynamicLanguage" >
    <div class="form-group">
        {{Form::label('languageSkill[]', 'Language')}}
        {{Form::text('languageSkill[]', isset($apply->languages[0])?$apply->languages[0]->language:'',['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('languageLevel[]', 'Level')}}
        {{Form::select('languageLevel[]',[
        'A1' => 'A1',
        'A2' => 'A2',
        'B1' => 'B1',
        'B2' => 'B2',
        'C1' => 'C1',
        'C2' => 'C2',
        ],
        isset($apply->languages[0])?$apply->languages[0]->level:'',
        ['class'=>'custom-select','data-toggle' => 'tooltip', 'title' => 'The level must be certified']) }}
    </div>
    <button type="button" name="add" id="addLanguage" class="btn btn-success" data-toggle = "tooltip" title ="Add up to 4 languages" style="float: right">Add More</button>
    <br><br>
    <hr>
    <?php
    for($i = 1;$i <= 3;$i++)
    {
        if(isset($apply->languages[$i]))
        {
            echo '<div id = "divLanguage'.$i.'" class="dynamicLanguageAdded" >';
            echo '<div class="form-group">';
            echo Form::label('languageSkill[]', 'Language');
            echo Form::text('languageSkill[]', isset($apply->languages[$i])? $apply->languages[$i]->language:'' ,['class'=>'form-control']);
            echo '</div>';
            echo '<div class="form-group">';
            echo Form::label('languageLevel[]', 'Level');
            echo Form::select('languageLevel[]',[
                'A1' => 'A1',
                'A2' => 'A2',
                'B1' => 'B1',
                'B2' => 'B2',
                'C1' => 'C1',
                'C2' => 'C2',
            ] ,isset($apply->languages[$i])?$apply->languages[$i]->level:'' ,['class'=>'form-control']);
            echo '</div>';
            echo '<button type="button" id="'.$i.'" class="btn btn-danger btnRemoveLanguage" style="float: right">x</button>';
            echo '<br><br><hr></div>';
        }
    }
    ?>
</div>


<script type="text/javascript">
    $(document).ready(function ()
    {
        var i = 1;
        var langaugesLen = " <?php echo count($apply->languages) ?> ";
        i = (langaugesLen != 0)? langaugesLen : 1;

        $('#addLanguage').click(function ()
        {
            if(i < 4)
            {
                i++;
                $('#dynamicLanguage').append('<div id = "divLanguage' + i + '" class="dynamicLanguageAdded" >' +
                    '            <div class="form-group">' +
                    '                {{Form::label('languageSkill[]', 'Language')}}' +
                    '                {{Form::text('languageSkill[]', '',['class'=>'form-control'])}}' +
                    '            </div>' +
                    '' +
                    '            <div class="form-group">' +
                    '                {{Form::label('languageLevel[]', 'Level')}}' +
                    '                {{Form::select('languageLevel[]', [
'A1' => 'A1',
'A2' => 'A2',
'B1' => 'B1',
'B2' => 'B2',
'C1' => 'C1',
'C2' => 'C2',
],'',['class'=>'custom-select'])}}' +
                    '            </div>' +
                    '<button type="button" id="' + i + '" class="btn btn-danger btnRemoveLanguage" style="float: right">x</button>'+
                    '                <br><br><hr>' +
                    '            </div>'
                );
            }
        });

        $(document).on('click', '.btnRemoveLanguage', function(){
            i--;
            var button_id_div = $(this).attr("id");
            $('#divLanguage'+button_id_div+'').remove();
        });
    })
</script>
