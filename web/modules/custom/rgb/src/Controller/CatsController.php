<?php

namespace Drupal\rgb\Controller;

use Drupal\file\Entity\File;
use Drupal\Core\Url;

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
  public function content() {
    $form = \Drupal::formBuilder()->getForm('\Drupal\rgb\Form\CatForm');
    return [
      '#theme' => 'cats-theme',
      '#form' => $form,
      '#list' => $this->catList(),
    ];
  }

  /**
   *
   */
  public function catList(): array {
    $current_user = \Drupal::currentUser();
    $roles = $current_user->getRoles();
    $admin = "administrator";
    $query = \Drupal::database();
    $result = $query->select('rgb', 'r')
      ->fields('r', ['name', 'email', 'image', 'date', 'id'])
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
      $variable = [
        'name' => $row->name,
        'email' => $row->email,
        'image' => [
          'data' => $catImage,
        ],
        'date' => $row->date,
      ];
      if (in_array($admin, $roles)) {
        $url = Url::fromRoute('delete_form', ['id' => $row->id]);
        $url_edit = Url::fromRoute('edit_form', ['id' => $row->id]);
        $project_link = [
          '#title' => 'Delete',
          '#type' => 'link',
          '#url' => $url,
          '#attributes' => [
            'class' => ['use-ajax'],
            'data-dialog-type' => 'modal',
          ],
          '#attached' => [
            'library' => ['core/drupal.dialog.ajax'],
          ],
        ];
        $link_edit = [
          '#title' => 'Edit',
          '#type' => 'link',
          '#url' => $url_edit,
          '#attributes' => [
            'class' => ['use-ajax'],
            'data-dialog-type' => 'modal',
          ],
          '#attached' => [
            'library' => ['core/drupal.dialog.ajax'],
          ],
        ];
        $variable['link'] = [
          'data' => [
            "#theme" => 'operations',
            'delete' => $project_link,
            'edit' => $link_edit,
          ],
        ];
      }
      $data[] = $variable;
    }
    $build['table'] = [
      '#type' => 'table',
      '#rows' => $data,
    ];
    return $build;
  }

}
