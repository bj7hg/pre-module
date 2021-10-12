<?php

namespace Drupal\rgb\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\MessageCommand;
use Drupal\Core\Ajax\RedirectCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\file\Entity\File;

/**
 *
 */
class CatForm extends FormBase {

  /**
   *
   */
  public function getFormId() {
    return 'cat_form';
  }

  /**
   *
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your cat’s name:'),
      '#placeholder' => $this->t('Your name have to contain from 2 to 32 symbols'),
      '#required' => TRUE,
    ];
    $form['email'] = [
      '#title' => 'Your email:',
      '#type' => 'email',
      '#required' => TRUE,
      '#placeholder' => $this->t('Acceptably: latin, " _ ", " - "'),
      '#ajax' => [
        'callback' => '::emailMessage',
        'event' => 'keyup',
      ],
    ];
    $form['image'] = [
      '#title' => 'Image',
      '#type' => 'managed_file',
      '#multiple' => FALSE,
      '#description' => t('Allowed extensions: jpeg, jpg, png'),
      '#required' => TRUE,
      '#upload_location' => 'public://images/',
      '#upload_validators'    => [
        'file_validate_extensions'    => ['png jpg jpeg'],
        'file_validate_size'          => [2097152],
      ],
    ];
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Add cat'),
      '#button_type' => 'primary',
      '#ajax' => [
        'callback' => '::setMessage',
      ],
    ];
    return $form;
  }

  /**
   *
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $email = $form_state->getValue('email');
    if (strlen($form_state->getValue('name')) < 2) {
      $form_state->setErrorByName('name', $this->t('Name is too short.'));
    }
    elseif (strlen($form_state->getValue('name')) > 32) {
      $form_state->setErrorByName('name', $this->t('Name is too long.'));
    }
    if ((!filter_var($email, FILTER_VALIDATE_EMAIL))
        || (strpbrk($email, '1234567890+*/!#$^&*()='))) {
      $form_state->setErrorByName('name', $this->t('Invalid Email'));
    }
  }

  /**
   * @throws \Drupal\Core\Entity\EntityStorageException
   * @throws \Exception
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $picture = $form_state->getValue('image');
    $file = File::load($picture[0]);
    $file->setPermanent();
    $file->save();
    \Drupal::database()->insert('rgb')
      ->fields(['name', 'email', 'date', 'image'])
      ->values([
        'name' => $form_state->getValue('name'),
        'email' => $form_state->getValue('email'),
        'date' => date('d-m-Y H:i:s', strtotime('+3 hour')),
        'image' => $picture[0],
      ])
      ->execute();
  }

  /**
   *
   */
  public function setMessage(array $form, FormStateInterface $form_state): AjaxResponse {
    $response = new AjaxResponse();
    if ($form_state->hasAnyErrors()) {
      foreach ($form_state->getErrors() as $errors_array) {
        $response->addCommand(new MessageCommand($errors_array));
      }
    }
    else {
      $url = Url::fromRoute('cats');
      $command = new RedirectCommand($url->toString());
      $response->addCommand($command);
      $response->addCommand(new MessageCommand('You adedd a cat!'));
    }
    \Drupal::messenger()->deleteAll();
    return $response;
  }

  /**
   *
   */
  public function emailMessage(array &$form, FormStateInterface $form_state): AjaxResponse {
    $response = new AjaxResponse();
    $email = $form_state->getValue('email');
    if (strpbrk($email, '1234567890+*/!#$^&*()=')) {
      $response->addCommand(new MessageCommand('Invalid Email'));
    }
    else {
      $response->addCommand(new MessageCommand('Valid Email'));
    }
    return $response;
  }

}
