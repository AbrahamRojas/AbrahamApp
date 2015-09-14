<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
 $todo=array();
 $i=0;
$directorio = opendir("./"); //ruta actual
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
    }
    else
    {
         chmod($archivo, 0755);
         $pos = strpos($archivo, "AppAbraham-1");// Prefijo
        $pos2 = strpos($archivo, ",v");
        $pos3 = strpos($archivo, ".lease");
    if($pos!==false&&$pos2===false&&$pos3===false){
             $campos=explode('%META:FORM{name="AbrahamForm"}%',file_get_contents("./".$archivo));
              $n=count($campos);
             $campo=explode('%META:FIELD{',$campos[$n-1]);

             $CampoA=explode('"',$campo[1]);
             $CampoB=explode('"',$campo[2]);
             $CampoC=explode('"',$campo[3]);             
             $CampoD=explode('"',$campo[4]);             
             $CampoE=explode('"',$campo[5]);             
          	 	$todo[]=array("CampoA"=>utf8_encode ($CampoA[7]), "CampoB"=>utf8_encode ($CampoB[7]), "CampoC"=>utf8_encode ($CampoC[7]), "CampoD"=>utf8_encode ($CampoD[7]), "CampoE"=>utf8_encode ($CampoE[7]));
               $i++;
         }
    }
}

echo json_encode($todo);
?>

