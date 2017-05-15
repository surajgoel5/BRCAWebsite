<?php
include_once "navbar.php";
if (is_null($post)||!$gsec)
{
    header('Location: home.php');
    exit;
}
if(isset($_POST['name'])&&isset($_POST['entryno'])&&isset($_POST['assoc'])){
    $assoc=$_POST['assoc'];
    $name=$_POST['name'];
    $entryno=$_POST['entryno'];
    $q="UPDATE cv_admins SET name='$name',entryno='$entryno' WHERE assoc='$assoc' AND position='Secretary'";
    $r=$con->query($q);
}
$q="SELECT entryno,name,assoc,position FROM cv_admins WHERE position='Secretary'";
$r=$con->query($q);
?>
<div class="uk-container">
    <div class="uk-card uk-card-default uk-card-hover">
    <div class="uk-card-header uk-h1"> Secys!
        </div>
        <div class="uk-card-body">
            <table class="uk-table">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Entry Number</th>
        <th>Position</th>
        <th>Edit</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $i=1;
    $d=$r->fetch_row();
    echo "<tr id='secy$i' class='bg-danger'>
                <td>$i</td>
                <td>$d[1]</td>
                <td>$d[0]</td>
                <td>$d[2] $d[3]</td>
                <td>".$b."</td>
            </tr>";
    while(($d=$r->fetch_row())&&$i<11)
    {
        $i++;
        $b="<button onclick=\"editSecy('$i','$d[2]','$d[3]')\" type=\"button\" class=\"uk-button uk-button-secondary\" id='but$i'><span id='span$i'>Edit</span></button>";
        echo "<tr id='secy$i'>
                <td>$i</td>
                <td>$d[1]</td>
                <td>$d[0]</td>
                <td>$d[2] $d[3]</td>
                <td>".$b."</td>
            </tr>";
    }
    ?>
    </tbody>
</table>
        </div>
    </div>
    </div>
<script>
    function editSecy(i,d2,d3) {
        row=document.getElementById('secy'+i);
        if(!row.children[1].firstChild.value){
            var input1 = document.createElement("input");
            var input2 = document.createElement("input");
            input1.type = "text";
            input1.className = "uk-input";
            input1.value=row.children[1].innerHTML;
            row.children[1].innerHTML="";
            row.children[1].appendChild(input1);
            input2.type = "text";
            input2.className = "uk-input";
            input2.value=row.children[2].innerHTML;
            row.children[2].innerHTML="";
            row.children[2].appendChild(input2);
            $(('#but'+i)).addClass("uk-button-primary");
            $(('#but'+i)).removeClass("uk-button-secondary");
            $(('#span'+i)).html("Done");
        }
        else{
            p=row.children[3].innerHTML;
            if(p.length>10) p=p.substr(0,p.length-10);
            var newForm = jQuery('<form>', {
                'action': '',
                'method': 'post',
                'target': '_top'
            }).append(jQuery('<input>', {
                'name': 'name',
                'value': row.children[1].firstChild.value,
                'type': 'hidden'
            })).append(jQuery('<input>', {
                'name': 'entryno',
                'value': row.children[2].firstChild.value,
                'type': 'hidden'
            })).append(jQuery('<input>', {
                'name': 'assoc',
                'value': p,
                'type': 'hidden'
            }));
            newForm.appendTo("body").submit();
        }
    }
</script>