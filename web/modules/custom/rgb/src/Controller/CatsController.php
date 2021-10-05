<?php
/**
* @return
* Contains \Drupal\rgb\Controller\CatsController.
*/

namespace Drupal\rgb\Controller;

use Drupal\file\Entity\File;

/**
* Provides route responses for the rgb module.
*/
class CatsController
{

/**
* Returns a simple page.
*
* @return array
*   A simple renderable array.
*/
    public function content()
    {
        $form = \Drupal::formBuilder()->getForm('\Drupal\rgb\Form\CatForm');
        return [
          '#theme' => 'cats-theme',
          '#form'=> $form,
          '#list'=>$this->catList(),
        ];
    }
    public function catList(): array
    {
        $query= \Drupal::database();
        $result = $query->select('rgb', 'r')
          ->fields('r', ['name', 'email', 'image', 'date'])
          ->orderBy('date', 'DESC')
          ->execute()->fetchAll();
        $data = [];
        foreach ($result as $row) {
            $file = File::load($row->image);
            $uri = $file->getFileUri();
            $catImage = [
            '#theme' => 'image',
            '#uri' => $uri,
            '#alt' => 'Cat',
            '#title' => 'Cat',
            '#width' => 255,
            ];
            $data[] = [
            'name' => $row->name,
            'email' => $row->email,
              'image' => [
                'data' => $catImage,
                ],
            'date' => $row->date,
            ];
        }
        $build['table'] = [
          '#type' => 'table',
          '#rows' => $data,
        ];
        return $build;
    }
}
