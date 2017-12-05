       <?php
       require_once("simplehtmldom_1_5/simple_html_dom.php");

      function Parse($name)
      {
       $html = file_get_html($name);
       $j=-1;
       $k=-1;
       foreach($html->find('tr') as $tr) 
       {
        $i=0;
        
        $temp='';
        foreach($tr->find('a') as $t)
        {
          switch ($i) 
          {
            case 3:
            $temp=$t->plaintext.' ';
            break;
            case 4:
            echo ('<a class="audio" id="'.$k.'top" href="">').($j.'. ').($t->plaintext.' - ').$temp;
            break;
            case 6:
            echo '</a><br>';
            break;
          }
          $i++;
          
        }
        $j++;
        $k++;
      }
      }
      ?> 