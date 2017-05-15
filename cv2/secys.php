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
<div class="container">
    <div class="jumbotron">
    <h1>Secys!</h1>
<table class="table">
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
        $b="<button onclick=\"editSecy('$i','$d[2]','$d[3]')\" type=\"button\" class=\"btn btn-info\"><span id='span$i' class=\"glyphicon glyphicon-pencil\"></span></button>";
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
<script>
    function editSecy(i,d2,d3) {
        row=document.getElementById('secy'+i);
        if(!row.children[1].firstChild.value){
            var input1 = document.createElement("input");
            var input2 = document.createElement("input");
            input1.type = "text";
            input1.value=row.children[1].innerHTML;
            row.children[1].innerHTML="";
            row.children[1].appendChild(input1);
            input2.type = "text";
            input2.value=row.children[2].innerHTML;
            row.children[2].innerHTML="";
            row.children[2].appendChild(input2);
            button=document.getElementById('span'+i);
            button.classList.add("glyphicon-ok");
            button.classList.remove("glyphicon-pencil");
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

            newForm.submit();
        }
    }
</script>