<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cornell Pretifier</title>
  <link rel="stylesheet" href="main.css">
</head>
<body>
  <form class="css_form" method="post">
    <textarea class="css_form__area" name="css_area" cols="30" rows="10">
      <?php if(isset($_POST['css_area'])) { 
          echo htmlentities ($_POST['css_area']); }?>
    </textarea>
    <input  type="submit" name="btn_create_variables" value="Create Variables">
    <input  type="submit" name="btn_prettify" value="Prettify">
    <input  type="submit" name="btn_nest" value="Nest It">
    <input  type="submit" name="btn_to_sass" value="To Sass">
  </form>

<?php
  if(isset($_POST['btn_create_variables']))
  {
    create_variables($_POST['css_area']);
  }

  if(isset($_POST['btn_prettify']))
  {
    $newCss = prettify($_POST['css_area']);
    echo '<h2>Prettified:</h2><pre>';
    print_r($newCss);
    echo '</pre>';
  }

  if(isset($_POST['btn_nest']))
  {
    nest_it($_POST['css_area']);
  }

  if(isset($_POST['btn_to_sass']))
  {
    print_r('<h2>Converting:</h2>');
    to_sass('./base/*/*.css');
    to_sass('./base/*/*/*.css');
  }

  function to_sass($path){
    $files = glob($path);
    $hashmap = get_hash_map('variables.txt');

    foreach($files as $file){
      print_r('converting -> ' . $file . '<br>');
      $css = read_css($file);
      $scssFile = str_replace('css', 'scss', $file);

      $newCss = prettify($css);
      file_put_contents($scssFile, $newCss);
    }
  }

  function read_css($file){
    return file_get_contents($file);
  }

  function get_hash_map($file){
    $handle = fopen($file, "r");
    $hashmap = array();
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
          $str = explode(":", $line);
          $hashmap[$str[0]] = $str[1];
        }

        fclose($handle);
    }
    return $hashmap;
  }

  function create_variables($variables){
    $file = 'created_variables.txt';
    $str = '';
    $check_hash = preg_match_all("/(?:(--.*:))/", $variables, $str);
    foreach($str[0] as &$item){
      $item .= str_replace('--', '$', $item);
      $item = substr_replace($item ,"",-1);
      $item .= PHP_EOL;
    }
    file_put_contents($file, $str[0]);
    echo '<h2>Variables Created</h2>';
  }

  function prettify($css){
    $hashmap = get_hash_map('variables.txt');

    $newCss = preg_replace_callback('/(?:@media \(--)([a-z]+)(?:\))/', function($matches) use($hashmap)
    {
      return $hashmap[$matches[1]];
    }, $css);
    
    $newCss = preg_replace_callback('/(?:var\(([^)]+)\))/', function($matches) use($hashmap)
    {
      return $hashmap[$matches[1]];
    }, $newCss);

    $newCss = preg_replace_callback('/((?<=@type )((--)[a-zA-Z]+))/', function($matches) use($hashmap)
    {
      return $hashmap[$matches[1]];
    }, $newCss);

    //Also removes @webkit-keyframe
    // $newCss = preg_replace_callback('/(-webkit?.*)/', function($matches)
    // {
    //   return '';
    // }, $newCss);

    return $newCss;
  }

  //!TODO nest the css
  function nest_it(){
    $list    = [];
    preg_match('/(?:(.)\.*([a-zA-z]+)(?!__))/', $css, $matches);
    print_r($matches);
    exit();
    if($matches){

    }
  }
?>

</body>
</html>

