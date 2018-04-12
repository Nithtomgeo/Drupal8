<?php

namespace Drupal\anagram_simple_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;


/**
*  Our simple Form class.
 */

class SimpleForm extends FormBase {
 /**
 * {@inheritdoc}
 */

  public function getFormId() {
    return 'anagram_simple_form';
  }

  /**
  * {@inheritdoc}
  */
  public function buildForm(array $form, FormStateInterface $form_state){

    $form['number_1'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Word1'),
      '#required' => TRUE,
    ];

    $form['number_2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Word2'),
      '#required' => TRUE,
    ];

    $form['submit']=[
      '#type' => 'submit',
      '#value' => $this->t('Check'),
    ];

    return $form;
  }

  /**
  * {@inheritdoc}
  */
public function submitForm(array &$form, FormStateInterface $form_state){

  if (count_chars($form_state->getValue('number_1'), 1) == count_chars($form_state->getValue('number_2'), 1))
  {
      drupal_set_message("True");
  }
  else
  {
      drupal_set_message("False");
  }
}
}
