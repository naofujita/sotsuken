<?php
function sanitize($input)
{
  foreach($input as $key=>$value)
  {
    $output[$key]=htmlspecialchars($value);
  }
  return $output;
}
?>