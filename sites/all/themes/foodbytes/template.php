<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * foodbytes theme.
 */


/**
* theme_menu_link() code to add unique ID / class to menu items
*/
function foodbytes_menu_link(array $variables) {
//add class for li
   $variables['element']['#attributes']['class'][] = 'menu-' . $variables['element']['#original_link']['mlid'];
//add class for a
   $variables['element']['#localized_options']['attributes']['class'][] = 'menu-' . $variables['element']['#original_link']['mlid'];
//dvm($variables['element']);
  return theme_menu_link($variables);
}

function foodbytes_print_pdf_tcpdf_content($vars) {
  $pdf = $vars['pdf'];
  // set content font
  $pdf->setFont($vars['font'][0], $vars['font'][1], $vars['font'][2]);

  // Remove the logo, published, breadcrumb and footer from the main content
  preg_match('!<body.*?>(.*)</body>!sim', $vars['html'], $matches);
  $pattern = '!(?:<div class="print-(?:logo|site_name|breadcrumb|footer)">.*?</div>|<hr class="print-hr" />)!si';
  $matches[1] = preg_replace($pattern, '', $matches[1]);

  // Make CCK fields look better
  $matches[1] = preg_replace('!(<div class="field.*?>)\s*!sm', '$1', $matches[1]);
  $matches[1] = preg_replace('!(<div class="field.*?>.*?</div>)\s*!sm', '$1', $matches[1]);
  $matches[1] = preg_replace('!<div( class="field-label.*?>.*?)</div>!sm', '<strong$1</strong>', $matches[1]);

  // Since TCPDF's writeHTML is so bad with <p>, do everything possible to make it look nice
  $matches[1] = preg_replace('!<(?:p(|\s+.*?)/?|/p)>!i', '<br$1 />', $matches[1]);
  $matches[1] = str_replace(array('<div', 'div>'), array('<span', 'span><br />'), $matches[1]);
  do {
    $prev = $matches[1];
    $matches[1] = preg_replace('!(</span>)<br />(\s*?</span><br />)!s', '$1$2', $matches[1]);
  } while ($prev != $matches[1]);

  @$pdf->writeHTML('
  
	
  ' . $matches[1]);

  return $pdf;
}