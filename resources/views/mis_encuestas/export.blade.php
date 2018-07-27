
<table id="table-mis-respuestas" class="display">
  <tbody>
    <tr>
      <td><h2>{{ $template->name }}</h2></td>
    @php
      for($i = 0; $i < count($printQuestions); $i++) {
      @endphp
      @php
        for($j = 0; $j < count($printQuestions[$i]->title); $j++) {
      @endphp
          <td>
            <strong>{{ $printQuestions[$i]->title[$j] }}</strong>
          </td>
      @php
        }
      @endphp
      @php
      }
      @endphp
    </tr>
    <tr>
      <td></td>
    @php
      $len = count($printQuestions);
      $matrix = array('matrix', 'matrix-scale');
      for($i = 0; $i < count($printQuestions); $i++) {
        $len_current_answer = count($printQuestions[$i]->answer);
        for($j = 0; $j < count($printQuestions[$i]->answer); $j++) {
          if (in_array($printQuestions[$i]->type, $matrix)){
            if($j == 0){ echo "<td>"; }
            echo $printQuestions[$i]->answer[$j]."<br />";
            if(($j+1) == $len_current_answer){ echo "</td>"; }
          }
          else{
      @endphp
            <td>
              {{ $printQuestions[$i]->answer[$j] }}
            </td>
      @php
          }
        }
        if(($i+1) == $len){
      @endphp
          <td>
            <strong>Usuario: {{ $printQuestions[$i]->user_name }}</strong>
          </td>
      @php
        }
      }
      @endphp
    </tr>

  </tbody>
  </table>

{{-- 
        <tr>
          <td>
            @php
              if( $flag || 
                  ($printQuestions[$i]->answer_id != $printQuestions[$i-1]->answer_id) ) {
                   //  echo '<hr /><b>Usuario: '.$printQuestions[$i]->user_name."</b>";
                     $flag = false;
              }
            @endphp
          </td>
        </tr>






 --}}