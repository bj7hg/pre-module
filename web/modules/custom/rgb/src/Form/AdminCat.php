<?php

namespace Drupal\rgb\Form;

use Drupal\Core\Form\ConfirmFormBase;
use Drupal\Core\Url;
use Drupal\file\Entity\File;
use Drupal\Core\Form\FormStateInterface;

/**
 *
 */
class AdminCat extends ConfirmFormBase {
  protected $catid;

  /**
   *
   */
  public function getCancelUrl() {
    return new Url('admin_menu');
  }

  /**
   *
   */
  public function getQuestion() {
    return 'Are you sure?';
  }

  /**
   *
   */
  public function getFormId() {
    return 'cat_form';
  }

  /**
   *
   */
  public function buildForm($form, $form_state, $catid = NULL) {
    $this->id = $catid;
    $query = \Drupal::database();
    $result = $query->select('rgb', 'r')
      ->fields('r', ['name', 'email', 'image', 'date', 'id'])
      ->orderBy('id', 'DESC')
      ->execute();
    $cats = [];
    foreach ($result as $row) {
      $file = File::load($row->image);
      $uri = $file->getFileUri();
      $image = [
        '#theme' => 'image',
        '#uri' => $uri,
        '#alt' => 'Cat Image',
        '#width' => 150,
      ];
      $deleteUrl = Url::fromRoute('delete_admin', ['id' => $row->id]);
      $editUrl = Url::fromRoute('edit_form', ['id' => $row->id]);
      $delete = [
        '#title' => 'Delete',
        '#type' => 'link',
        '#url' => $deleteUrl,
        '#attributes' => [
          'class' => ['use-ajax'],
          'data-dialog-type' => 'modal',
        ],
        '#attached' => [
          'library' => ['core/drupal.dialog.ajax'],
        ],
      ];
      $edit = [
        '#title' => 'Edit',
        '#type' => 'link',
        '#url' => $editUrl,
        '#attributes' => [
          'class' => ['use-ajax'],
          'data-dialog-type' => 'modal',
        ],
        '#attached' => [
          'library' => ['core/drupal.dialog.ajax'],
        ],
      ];
      $cats[$row->id] = [
        ['data' => $image],
        $row->id,
        $row->name,
        $row->email,
        $row->date,
        [
          'data' => $delete,
        ],
        [
          'data' => $edit,
        ],
      ];
    }
    $header = ['Image', 'id', 'Name', 'Email', 'Date', 'Delete', 'Edit'];
    $form['table'] = [
      '#type' => 'tableselect',
      '#options' => $cats,
      '#header' => $header,
      '#empty' => $this->t('Empty'),
    ];
    $form['delete'] = [
      '#type' => 'submit',
      '#value' => $this->t('Delete'),
      '#button_type' => 'submit',
      '#attributes' => ['onclick' => 'if(!confirm("Do you want to delete cat?")){return false;}'],
    ];
    return $form;
  }

  /**
   *
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValue('table');
    $delete = array_filter($values);
    if (empty($delete)) {
      $this->messenger()->addError($this->t("You choose nothing"));
    } else {
      $query = \Drupal::database()->delete('rgb')
        ->condition('id', $delete, 'IN')
        ->execute();
      $this->messenger()->addStatus($this->t("Done"));
    }
  }

}
