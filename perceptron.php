<?php

$features=array(
    array(-1,1,0,1,0,0,0),
    array(-1,1,0,1,1,0,0),
    array(-1,1,0,1,0,1,0),
    array(-1,1,1,0,0,1,1),
    array(-1,1,1,1,1,0,0),
    array(-1,1,0,0,0,1,1),
    array(-1,1,0,0,0,1,0),
    array(-1,0,1,1,1,0,1),
    array(-1,0,1,1,0,1,1),
    array(-1,0,0,0,1,1,0),
    array(-1,0,1,0,1,0,1),
    array(-1,0,0,0,1,0,1),
    array(-1,0,1,1,0,1,1),
    array(-1,0,1,1,1,0,0)
           
);
$labels=array(1,1,1,1,1,1,0,1,0,0,0,0,0,0);


$weights=array(0,0,0,0,0,0,0);
$totalerror=0;
do{
    for($i=0;$i<count($features);$i++){
        $output=calculateOutput($features[$i],$weights);
        $error=$labels[$i] - $output;
        $totalerror+=$error;
       // echo $totalerror;
        $weights=updateWeights($weights,$features[$i],1,$error);
    }
}while($totalerror!=0);
 for($x=0;$x<count($weights); $x++)
       echo $weights[$x].","; 
       echo "</br>";
       //predict
       echo calculateOutput($features[13],$weights);

function calculateOutput($input,$weights){
   $output=0;
   for($i=0; $i<count($input);$i++) { 
   $output+=($input[$i]*$weights[$i]);
   }
   if($output>0){
       return 1;
   }else{
       return 0;
   }
}

function updateWeights($w,$inp,$rate,$error){
    for($i=0; $i<count($w); $i++) { 
    $w[$i]+=($rate*$inp[$i]*$error);  //Wj=Wj+a*Ij*Err
   }
   return $w;
}
?>
