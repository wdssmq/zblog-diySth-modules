<?php
// ----
// post301_Filter
Add_Filter_Plugin('Filter_Plugin_Edit_Response5', 'diy_post301_addMeta');
Add_Filter_Plugin('Filter_Plugin_ViewPost_Template', 'diy_post301_view');

// ----
// post301_Function
function diy_post301_addMeta()
{
  global $article;
  $html = <<<xnxf
<label for="edtTag" class="editinputname">跳转到指定链接：</label>
<div class="editmod2">
<input type="text" name="meta_diyLink" value="{$article->Metas->diyLink}" style="width: 100%;" autocomplete="off">
</div>
xnxf;
  echo $html;
}
function diy_post301_view(&$template)
{
  global $zbp;
  $article = $template->GetTags('article');
  if ($article->Metas->diyLink) {
    Redirect301($article->Metas->diyLink);
  }
}
