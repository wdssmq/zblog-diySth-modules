<?php
// ----
// telForCmt_Filter
Add_Filter_Plugin('Filter_Plugin_PostComment_Core', 'telForCmt_add');
Add_Filter_Plugin('Filter_Plugin_Admin_CommentMng_Table', 'telForCmt_read');

// ----
// telForCmt_Function
function telForCmt_add(&$cmt)
{
  // <p><input type="text" name="inpTel" id="inpTel" class="text" value="" size="28" tabindex="3" /> <label for="inpTel">手机号</label></p>
  // onclick="return zbp.comment.post({inpTel:$('#inpTel').val()})"
  $tel = GetVars("inpTel", "POST");
  if (preg_match("/^1[34578]\d{9}$/", $tel)) {
    $cmt->Metas->tel = $tel;
    return;
  }
  if (GetVars('format', 'POST') == 'json') {
    JsonError(78, "请正确输入手机号",  $_POST);
  } else {
    ScriptError("请正确输入手机号");
  }
}
function telForCmt_read($cmt, &$tabletds, &$tableths, $article)
{
  array_insert($tabletds, 5, ["<td>{$cmt->Metas->tel}</td>"]);
  // array_insert($tabletds,6,["<td></td>"]);
  if (count($tableths) < 11)
    array_insert($tableths, 5, ["<th>电话</th>"]);
  // if(count($tableths)<12)
  //   array_insert($tableths,6,["<th>地址</th>"]);
}

function array_insert(&$array, $position, $insert_array)
{
  $first_array = array_splice($array, 0, $position);
  $array = array_merge($first_array, $insert_array, $array);
}
