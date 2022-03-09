<?php
// ----
// ViewBookMarks_Filter
Add_Filter_Plugin('Filter_Plugin_Index_Begin', 'diySth_ViewBookMarks_Begin');

// ----
// ViewBookMarks_Function
function diySth_ViewBookMarks_Begin()
{
  global $zbp;
  if (GetVars("vbm", "GET") === null) {
    return;
  }

  $uDir = diySth_Path("usr/ViewBookMarks/");
  $fHtml = $uDir . "vbm_usr/bm.html";
  $uHost = diySth_Path("usr/ViewBookMarks/", "host");
  $fScript = $uHost . "vbm_var/script.js";

  if (!file_exists($fHtml) || !file_exists($fScript)) {
    return;
  }

  $strContent = file_get_contents($fHtml);
  echo $strContent;
  echo "<script src='{$fScript}'></script>";
  die();
}
