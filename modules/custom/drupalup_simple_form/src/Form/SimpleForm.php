<?php

namespace Drupal\drupalup_simple_form\Form;

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
    return 'drupalup_simple_form';
  }

  /**
  * {@inheritdoc}
  */
  public function buildForm(array $form, FormStateInterface $form_state){

    $form['number_1'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Amount'),
      '#required' => TRUE,
    ];

    $form['number_2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Tax'),
      '#required' => TRUE,
    ];

    $form['submit']=[
      '#type' => 'submit',
      '#value' => $this->t('Calculate'),
    ];

    return $form;
  }

  /**
  * {@inheritdoc}
  */
public function submitForm(array &$form, FormStateInterface $form_state){
  if((!is_numeric($form_state->getValue('number_1')))||(!is_numeric($form_state->getValue('number_2'))))
  {
    drupal_set_message(t('Should enter a number'),'error');
    return false;
  }
  $item = array();
  $taxamount = ($form_state->getValue('number_2') * $form_state->getValue('number_1'))/100;
  $item[0] = floor( $taxamount );
  $item[1] = round((($taxamount - $item[0])),2)*100;

  drupal_set_message("The result is ".$item[0]." dollars ".$item[1]." cents");
}

}
