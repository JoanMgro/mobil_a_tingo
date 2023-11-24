<?php

const EXTENCIONES = array('image/jpg', 'image/png', 'image/jpeg');
const MAX_SIZE = 1024.00;
const LONGITUD_NOMBRES_ARCHIVOS = 15;

function random_string($length) {
    $str = random_bytes($length);
    $str = base64_encode($str);
    $str = str_replace(["+", "/", "="], "", $str);
    $str = substr($str, 0, $length);
    return $str;
}



function prepararLogo()
{    
    //comprobar la extension correcta
    if(!in_array($_FILES['logo']['type'], EXTENCIONES))
    {
        return null;
    }
    if(round($_FILES['logo']['size']/1024) > MAX_SIZE)
    {
        return null;
    }
    
    $ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
    $newName = random_string(LONGITUD_NOMBRES_ARCHIVOS);
    $basedir = __DIR__ . '/' . '../';
    $target_path = "logos/". $newName . "." . $ext;
    $sysfilepath = $basedir . $target_path;

    if(!move_uploaded_file($_FILES['logo']['tmp_name'], $sysfilepath))
    {
      
      return null;
    }
    
    return $target_path;
}

?>
