<?php

function theme_activate($id, $version, &$errors)
{
  global $prefixeTable, $conf;

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
  }
}

function theme_deactivate()
{
  global $prefixeTable;

  $query = 'DELETE FROM ' . CONFIG_TABLE . ' WHERE param="hr_glass_xl" LIMIT 1;';
  pwg_query($query);
}

?>