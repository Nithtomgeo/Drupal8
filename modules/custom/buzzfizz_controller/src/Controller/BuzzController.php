<?php

namespace Drupal\buzzfizz_controller\Controller;

class BuzzController{
  public function page(){

    $items = array();
    for($i=1;$i<=100;$i++)
    {
      if( ($i % 3 == 0) && ($i % 5 == 0) )
      {
        $items[] = 'FizzBuzz';
      }
      else if( $i % 3 == 0 )
      {
        $items[] = 'Fizz';
      }
      else if( $i % 5 == 0 )
      {
        $items[] = 'Buzz';
      }
      else
      {
        $items[] = $i;
      }
    }

    return array(
      '#theme' => 'buzz_list',
      '#items' => $items,
      '#title' => 'FizzBuzz for numbers 1 to 100'
    );
  }
}
