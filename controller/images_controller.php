<?php
// Envoyer l'image avec enctype="multipart/form-data".
// On teste si la variable systeme $_FILES pour savoir si une image a été téléchargé.
if (isset($_FILES['image']['name']))
  {
    $saveto = "$user.jpg";// On crée une variable chaine à partir du nom de l'utilisateur.
    move_uploaded_file($_FILES['image']['tmp_name'], $saveto);
    $typeok = TRUE;

// Examen du type de l'image.
    switch($_FILES['image']['type'])
    {
      // La variable $src reçoit l'image reçue à l'aide de la fonction imagecreatefrom
      case "image/gif":   $src = imagecreatefromgif($saveto); break;
      case "image/jpeg":  // Images jpeg normal et progressif
      case "image/pjpeg": $src = imagecreatefromjpeg($saveto); break;
      case "image/png":   $src = imagecreatefrompng($saveto); break;
      default:            $typeok = FALSE; break;
    }

    if ($typeok)
    {
      // On stocke les dimensions de l'image dans les variables $w et $h
      list($w, $h) = getimagesize($saveto);
      // On calcule les nouvelles dimensions qui produisent une image de me rapport largeur hauteur. Aucune dimension supérieure à 100 pixel. Pour des vignettes plus petites ou plus grandes, modifiez la valeur de $max
      $max = 100;
      $tw  = $w;
      $th  = $h;

      if ($w > $h && $max < $w)
      {
        $th = $max / $w * $h;
        $tw = $max;
      }
      elseif ($h > $w && $max < $h)
      {
        $tw = $max / $h * $w;
        $th = $max;
      }
      elseif ($max < $w)
      {
        $tw = $th = $max;
      }
      // La fonction imagecreatetruecolr permet de créer un canvas vide de $w de large et $h de hauteur dans $tmp
      $tmp = imagecreatetruecolor($tw, $th);
      // La fonction imagecopyresampled ré-échantillone l'image se $src pour la déposer dans la nouvelle variable $tmp
      imagecopyresampled($tmp, $src, 0, 0, 0, 0, $tw, $th, $w, $h);
      // La fonction imagecovolution peut rendre l'image un peu plus nette
      imageconvolution($tmp, array(array(-1, -1, -1),
      array(-1, 16, -1), array(-1, -1, -1)), 8, 0);
      // On enregistre l'image sous forme de fichier jpeg à l'emplacement défini par la variable $saveto.
      imagejpeg($tmp, $saveto);
      // On supprime le canvas de l'image initiale et de la copie à l'aide de la fonction imagedestroy.
      imagedestroy($tmp);
      imagedestroy($src);
    }
  }
?>