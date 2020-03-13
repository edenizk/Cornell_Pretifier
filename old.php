<?php 
function change_media($css){
  $newCss = preg_replace_callback('/(?:@media \(--)([a-z]+)(?:\))/', function($matches)
  {
    switch ($matches[1]) {
      case 'xs':
        return '@include rwd(\'phone\')';
        break;
      case 's':
        return '@include rwd(\'large-phone\')';
        break;
      case 'm':
        return '@include rwd(\'tablet\')';
        break;
      case 'ml':
        return '@include rwd(\'large-tablet\')';
        break;
      case 'l':
        return '@include rwd(\'laptop\')';
        break;
      case 'xl':
        return '@include rwd(\'large-laptop\')';
        break;
      case 'xxl':
        return '@include rwd(\'ultra\')';
        break;
      }
    return $matches[0];
  }, $css);
  
  echo '<h2>Media changed to:</h2><pre>';
    print_r($newCss);
  echo '</pre>';
  // return $newCss;
}


// $css = '.jip-container {
//   max-width: 1440px;
//   margin: 0 auto;
//   padding: 0 var(--jip-container-edge);
//   @media (--m) {
//     padding: 0 var(--jip-container-edge-m);
//   }
//   @media (--l) {
//     padding: 0 var(--jip-container-edge-l);
//   }
//   @media (--xl) {
//     padding: 0 var(--jip-container-edge-xl);
//   }
// }';


// .gravity-form--newsletter {
//   .gform_wrapper .gfield input[type=text] {
//     color: var(--c-border);
//     border-color: var(--c-white);

//     &::placeholder {
//       color: var(--c-border);
//     }
//   }
// }
// echo '<pre>';
//   print_r(prettify($css));
// echo '</pre>';


function change_colors($css){

  //(?:var\((--)(.*)\)) for colors
  $newCss = preg_replace_callback('/(?:var\((--)(.*)\))/', function($matches)
  {
    switch ($matches[2]) {
      case 'c-black':
        return 'changed';
        break;
      case 'c-light-black':
        return 'changed'; 
        break;
      case 'c-white':
        return 'changed';
        break;
      case 'c-blue':
        return 'changed';
        break;
      case 'c-blue2':
        return 'changed';
        break;
      case 'c-blue3':
        return 'changed'; 
        break;
      case 'c-blue4':
        return 'changed';
        break;
      case 'c-green':
        return 'changed';
        break;
      case 'c-green2':
        return 'changed';
        break;
      case 'c-grey':
        return 'changed'; 
        break;
      case 'c-grey2':
        return 'changed';
        break;
      case 'c-grey3':
        return 'changed';
        break;
      case 'c-grey4':
        return 'changed';
        break;
      case 'c-grey5':
        return 'changed'; 
        break;
      case 'c-grey6':
        return 'changed';
        break;
      case 'c-grey7':
        return 'changed';
        break;
      case 'c-grey8':
        return 'changed';
        break;
      case 'c-grey--overlay':
        return 'changed'; 
        break;
      case 'c-grey--overlay2':
        return 'changed';
        break;
      case 'c-navy':
        return 'changed';
        break;
      case 'c-brown':
        return 'changed';
        break;
      case 'c-brown2':
        return 'changed'; 
        break;
      case 'c-blue4':
        return 'changed';
        break;
      case 'c-blue-gray':
        return 'changed';
        break;
      case 'c-dark-gray':
        return 'changed';
        break;
      case 'c-dark-gray1':
        return 'changed'; 
        break;
      case 'c-light-green':
        return 'changed';
        break;
      case 'c-light-grey':
        return 'changed';
        break;
      case 'c-light-grey2':
        return 'changed';
        break;
      case 'c-border':
        return 'changed'; 
        break;
      case 'c-border2':
        return 'changed';
        break;
      case 'c-red':
        return 'changed';
        break;
      case 'c-red2':
        return 'changed';
        break;
      case 'c-dark-red':
        return 'changed'; 
        break;
      case 'c-dark-blue':
        return 'changed';
        break;
      case 'c-dark-blue2':
        return 'changed';
        break;
      case 'c-dark-blue-overlay':
        return 'changed';
        break;
      case 'c-dark-blue-30':
        return 'changed'; 
        break;
      case 'c-flickity-dot':
        return 'changed';
        break;
      case 'c-breadcrumb-link':
        return 'changed';
        break;
      case 'c-nav-sub-links':
        return 'changed';
        break;
      case 'c-sunglow':
        return 'changed'; 
        break;
      case 'c-black-01':
        return 'changed';
        break;
      case 'c-jip-blue':
        return 'changed';
        break;
      case 'c-jip-pink':
        return 'changed';
        break;
      case 'c-jip-light-gray':
        return 'changed'; 
        break;
      case 'c-jip-green':
        return 'changed';
        break;
      case 'c-jip-blue-sky':
        return 'changed';
        break;
      case 'c-jip-red':
        return 'changed';
        break;
      case 'c-jip-dark-blue':
        return 'changed'; 
        break;
    }
    return $matches[0];
  }, $css);
  
  echo '<h2>Color changed to:</h2><pre>';
    print_r($newCss);
  echo '</pre>';
}