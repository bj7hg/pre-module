<?php
/**
* @return
* Contains \Drupal\rgb\Controller\CatsController.
*/

namespace Drupal\rgb\Controller;

/**
* Provides route responses for the rgb module.
*/
class CatsController {

/**
* Returns a simple page.
*
* @return array
*   A simple renderable array.
*/
    public function content ()
      {
      $element = [
        '#theme' => 'cats-theme'
        ];
        return $element;
  }

}
