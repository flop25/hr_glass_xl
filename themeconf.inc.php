<?php
/*
Theme Name: hr_glass_xl
Version: auto
Description: A theme with an horizontal menu and a simple modern design
Theme URI: http://fr.piwigo.org/ext/extension_view.php?eid=502
Author: flop25
Author URI: http://www.planete-flop.fr
*/
$themeconf = array(
  'name'          => 'hr_glass_xl',
  'parent'        => 'default',
  'icon_dir'      => 'themes/hr_glass_xl/icon',
  'mime_icon_dir' => 'themes/hr_glass_xl/icon/mimetypes/',
  'local_head'    => 'local_head.tpl',
  'activable'     => true,
);
// Need upgrade?
  if (!isset($conf['hr_glass_xl']))
  {
    $config = array(
      'home'       => true,
      'categories' => true,
      'picture'    => false,
      'other'      => true,
      );
      
    $query = '
INSERT INTO ' . CONFIG_TABLE . ' (param,value,comment)
VALUES ("hr_glass_xl" , "'.pwg_db_real_escape_string(serialize($config)).'" , "hr_glass_xl parameters");';

    pwg_query($query);
    load_conf_from_db();
  }

// thx to P@t
add_event_handler('loc_begin_page_header', 'set_hr_glass_xl_header');

function set_hr_glass_xl_header()
{
  global $page, $conf, $template;

  $config = unserialize($conf['hr_glass_xl']);

  if (isset($page['body_id']) and $page['body_id'] == 'theCategoryPage')
  {
    $header = isset($page['category']) ? $config['categories'] : $config['home'];
  }
  elseif (isset($page['body_id']) and $page['body_id'] == 'thePicturePage')
  {
    $header = $config['picture'];
  }
  else
  {
    $header = $config['other'];
  }

  $template->assign('display_hr_glass_xl_banner', $header);
}
?>
