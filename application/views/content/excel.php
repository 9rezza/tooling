<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

<thead>

<tr>
<?php 
    $row = count($header);
    foreach ($header as $h){
        echo "<td>".$h."</td>";
    } 
?>
 </tr>

</thead>

<tbody>

<?php 
    //print_r($header);
    $row2 = count($body);
    for ($a = 0; $a == $row2; $a++){
        //echo "<th>".$header[$i]."</th>";
?>

<tr>

 <td><?php //echo $user->nama ?></td>

 <td><?php //echo $user->username ?></td>

 <td><?php //echo $user->password ?></td>

 </tr>

<?php } ?>

</tbody>

</table>