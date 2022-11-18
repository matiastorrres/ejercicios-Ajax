<?php
//echo "respuesta deste el servidor";
// crea un arreglo asociativo, donde guarda toda la informacion que se sube
//var_dump($_FILES);
// "es el nombre que le puse en la linea 45 "
if(isset($_FILES["file"])){
 //creamos variables de php para guardar los datos de files 
 $name=$_FILES["file"]["name"];
 $file=$_FILES["file"]["tmp_name"];
 $error=$_FILES["file"]["error"];
$destination="./files/$name";
$upload= move_uploaded_file($file,$destination);

if($upload){
  $res= array(
  "err"=>false,
  "status"=>http_response_code(200),
  "statusText"=>"Archivo $name subido con exito",
  "files"=>$_FILES["file"]
  );
} else {
    $res= array(
  "err"=>true,
  "status"=>http_response_code(400),
  "statusText"=>"Error al subir el archivo $name",
  "files"=>$_FILES["file"]
);
}
 echo json_encode($res);
}