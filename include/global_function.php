<?php

if (ereg("global_function.php",$_SERVER["PHP_SELF"])){ 
  header("Location:index.php");
  die;
}

function render_combo($arrData, $name, $selected="", $onevents = "", $options="", $id="", $class="", $label=""){   	
   $html = "<select id='".$id."' class='".$class."' name='".$name."' ".$onevents.">";
   if($options == "") $html .= "<option value=''>-- Pilih ".$label." --</option>";
   for($i=0; $i<count($arrData); $i++):
      $option_selected = ($arrData[$i]['id'] == $selected) ? 'selected' : '';
      $html .= "<option value='".$arrData[$i]['id']."' ".$option_selected.">".$arrData[$i]['NAME']."</option>";      
   endfor;
   $html .= "</select>";
   return $html;
}

function render_tanggal($name, $selected=""){   
   $html = "<select name='".$name."'>";
   for($i=1; $i<=31; $i++):
      $option_selected = ($i == $selected) ? 'selected' : '';
      $html .= "<option value='".$i."' ".$option_selected.">".$i."</option>";   
   endfor;
   $html .= "</select>";
   return $html;
}

function render_bulan($name, $selected=""){
   $arrBulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", 
                     "September", "Oktober", "November", "Desember");
   $html = "<select name='".$name."'>";
   for($i=0; $i<count($arrBulan); $i++):
      $option_selected = ($i == $selected) ? "selected" : "";
      $html .= "<option value='".($i+1)."' ".$option_selected.">".$arrBulan[$i]."</option>";   
   endfor;
   $html .= "</select>";
   return $html;
}

function render_tahun($name, $selected=""){
   $html = "<select name='".$name."'>";
   for($i=2005; $i<2030; $i++):
      $option_selected = ($i == $selected) ? "selected" : "";
      $html .= "<option value='".$i."' ".$option_selected.">".$i."</option>";   
   endfor;
   $html .= "</select>";
   return $html;
}




?>