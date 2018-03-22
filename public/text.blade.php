<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24.02.2018
 * Time: 23:26
 */?>

<html>
<body>

<div >
    <form id="lol">
        <input type="text">
        <button onclick="addForm()">add</button>
    </form>
</div>
<script type="text/javascript">
    function addForm() {
        var form = document.getElementById("lol");
        form.append("<input type='text'>\n" +
            "<button onclick='addForm()/'>add</button>");
    };
</script>
</body>
</html>
