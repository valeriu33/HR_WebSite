<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 25.02.2018
 * Time: 22:03
 */?>
<div class="col-4">
    <div class="form-group">
        {{Form::label('recName[]', 'Name')}}
        {{Form::text('recName[]', isset($apply->recommendations[0])?$apply->recommendations[0]->name:'',['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('recAddress[]', 'Address')}}
        {{Form::text('recAddress[]', isset($apply->recommendations[0])?$apply->recommendations[0]->address:'',['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('recPosition[]', 'Position')}}
        {{Form::text('recPosition[]', isset($apply->recommendations[0])?$apply->recommendations[0]->position:'',['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('contact[]', 'Contact')}}
        {{Form::text('contact[]', isset($apply->recommendations[0])?$apply->recommendations[0]->contact:'',['class'=>'form-control'])}}
    </div>

    <button type="button" name="add" id="addRecommendations" class="btn btn-success" data-toggle = "tooltip" title ="Add up to 3 skills" style="float: right">Add More</button>
</div>

<?php
for($i = 1;$i <= 2;$i++)
{
    if(isset($apply->recommendations[$i]))
    {
        echo '<div id = "divRecommendations'.$i.'" class="dynamicRecommendationsAdded col-4">';
        echo '<div class="form-group">';
        echo      Form::label('recName[]', 'Name');
        echo      Form::text('recName[]', isset($apply->recommendations[$i])?$apply->recommendations[$i]->name:'',['class'=>'form-control']);
        echo '</div>';

        echo '<div class="form-group">';
        echo     Form::label('recAddress[]', 'Address');
        echo     Form::text('recAddress[]', isset($apply->recommendations[$i])?$apply->recommendations[$i]->address:'',['class'=>'form-control']);
        echo '</div>';

        echo '<div class="form-group">';
        echo     Form::label('recPosition[]', 'Position');
        echo     Form::text('recPosition[]', isset($apply->recommendations[$i])?$apply->recommendations[$i]->position:'',['class'=>'form-control']);
        echo '</div>';

        echo '<div class="form-group">';
        echo     Form::label('contact[]', 'Contact');
        echo     Form::text('contact[]', isset($apply->recommendations[$i])?$apply->recommendations[$i]->contact:'',['class'=>'form-control']);
        echo '</div>';
        echo '<button type="button" id="'.$i.'" class="btn btn-danger btnRemoveRecommendations" style="float: right">x</button>';
        echo '</div>';
    }
}
?>

<script type="text/javascript">
    $(document).ready(function ()
    {
        var i = 1;
        var recommendationsLen = " <?php echo count($apply->recommendations) ?> ";
        i = (recommendationsLen != 0)? recommendationsLen : 1;

        $('#addRecommendations').click(function ()
        {
            if(i < 3)
            {
                i++;
                $('#dynamicRecommendations').append('<div id = "divRecommendations' + i + '" class="dynamicRecommendationsAdded col-4">' +
                '<div class="form-group">'+
                    '{{Form::label('recName[]', 'Name')}}'+
                    '{{Form::text('recName[]', '',['class'=>'form-control'])}}'+
                '</div>'+

                '<div class="form-group">'+
                    '{{Form::label('recAddress[]', 'Address')}}'+
                    '{{Form::text('recAddress[]', '',['class'=>'form-control'])}}'+
                '</div>'+

                '<div class="form-group">'+
                    '{{Form::label('recPosition[]', 'Position')}}'+
                    '{{Form::text('recPosition[]', '',['class'=>'form-control'])}}'+
                '</div>'+

                '<div class="form-group">'+
                    '{{Form::label('contact[]', 'Contact')}}'+
                    '{{Form::text('contact[]', '',['class'=>'form-control'])}}'+
                '</div>'+
                    '<button type="button" id="' + i + '" class="btn btn-danger btnRemoveRecommendations" style="float: right">x</button>'+
                    '            </div>'
                );
            }
        });

        $(document).on('click', '.btnRemoveRecommendations', function(){
            i--;
            var button_id_div = $(this).attr("id");
            $('#divRecommendations'+button_id_div+'').remove();
        });
    })
</script>
