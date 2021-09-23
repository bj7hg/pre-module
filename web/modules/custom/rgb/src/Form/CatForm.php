<?php
/**
 * @file
 * Contains \Drupal\rgb\Form\catForm.
 *
 */

namespace Drupal\rgb\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\MessageCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\HtmlCommand;

class CatForm extends FormBase
{

    public function getFormId()
    {
        return 'cat_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state)
    {

        $form['name'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Your cat’s name:'),
          '#placeholder' => $this->t('Your name have to contain from 2 to 32 symbols'),
          '#required' => true,
        ];
        $form['email'] = [
          '#title' => 'Your email:',
          '#type' => 'email',
          '#required' => true,
          '#placeholder' => $this->t('Acceptably: latin, " _ ", " - "'),
          '#ajax' => [
            'callback' => '::emailMessage',
            'event' => 'keyup',
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
    public function validateForm(array &$form, FormStateInterface $form_state)
    {
      $email=$form_state->getValue('email');
        if (strlen($form_state->getValue('name')) < 2) {
            $form_state->setErrorByName('name', $this->t('Name is too short.'));
        } elseif (strlen($form_state->getValue('name')) >32) {
            $form_state->setErrorByName('name', $this->t('Name is too long.'));
        }
        if((!filter_var($email, FILTER_VALIDATE_EMAIL)) || ( strpbrk($email, '1234567890+*/!#$^&*()='))){
          $form_state->setErrorByName('name', $this->t('Invalid Email'));
        }
    }
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
    }
    public function setMessage(array $form, FormStateInterface $form_state)
    {
        $response = new AjaxResponse();
        if ($form_state->hasAnyErrors()) {
            foreach ($form_state->getErrors() as $errors_array) {
                $response->addCommand(new MessageCommand($errors_array));
            }
        } else {
              $response->addCommand(new MessageCommand('You adedd a cat!'));
        }
        \Drupal::messenger()->deleteAll();
        return $response;
    }
    public function emailMessage(array &$form, FormStateInterface $form_state)
    {
        $response = new AjaxResponse();
        $email=$form_state->getValue('email');
        if(strpbrk($email, '1234567890+*/!#$^&*()=')){
            $response->addCommand(new MessageCommand('Invalid Email'));
        } else{
            $response->addCommand(new MessageCommand('',".null",[],true));
        }
        return $response;
    }
}
