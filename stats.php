<?php
/* ----- OPEN DATA ----- */
$debug=false;
if(isset($_GET["debug"])){
    $debug=true;
}

$myFolder='data/';

$myFileName='children_killed';

$fileExt='.csv';

$filename=$myFolder.$myFileName.$fileExt;

if($debug)print'<p>filename is '.$filename;

$file=fopen($filename,"r");

if($debug){
    if($file){
        print'<p>File Opened Successful.</p>';
    }else{
        print'<p>File Open Failed.</p>';
    }
}
/* --- END OPEN DATA --- */

/* ----- READ DATA ----- */
if($file){
    if($debug) print'<p>Begin reading data into an array.</p>';
    
    $headers[]=fgetcsv($file);
    
    if($debug){
        print'<p>Finished reading headers.</p>';
        print'<p>My header array</p><pre>';
        print_r($headers);
        print'</pre>';
    }
    
    while(!feof($file)){
        $gunStats[]=fgetcsv($file);
    }
    
    if($debug){
        print'<p>Finished reading data. File closed.</p>';
        print'<p>My data array<p><pre>';
        print_r($childrenStats);
        print'</pre></p>';
    }
}
/* --- END READ WEATHER DATA --- */

fclose($file);

include 'top.php';
?>

<ul>
    <?php
    print '<li>';
    print '<a href="gun_details.php?stat=children_killed">Children Killed</a>';
    print '</li>';
    print '<li>';
    print '<a href="gun_details.php?stat=teens_killed">Teenagers Killed</a>';
    print '</li>';
    print '<li>Mass Shootings</li><ul>';
    print '<li>';
    print '<a href="gun_details.php?stat=mass_shootings_2017">2017</a>';
    print '</li>';
    print '<li>';
    print '<a href="gun_details.php?stat=mass_shootings_2016">2016</a>';
    print '</li>';
    print '<li>';
    print '<a href="gun_details.php?stat=mass_shootings_2015">2015</a>';
    print '</li>';
    print '<li>';
    print '<a href="gun_details.php?stat=mass_shootings_2014">2014</a>';
    print '</li>';
    ?>
</ul>

<?php
include 'footer.php';
?>
