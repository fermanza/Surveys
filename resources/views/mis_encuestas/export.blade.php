
<table id="table-mis-respuestas" class="display">
  <tbody>
    <tr>
      <td><h2>{{ $template->name }}</h2></td>
    @php
      $uqid = [];
      // dd(($questions));
      $lenQuestions = count(json_decode($questions[0]->content));
      // echo $lenQuestions;die;
      for($i = 0; $i < count($printQuestions); $i++) {
      @endphp
      @php
        for($j = 0; $j < count($printQuestions[$i]->title); $j++) {
      @endphp
          <td><strong>{{ $printQuestions[$i]->title[$j] }}</strong></td>
      @php
          }
      @endphp
      @php
        if(($i+1) == $lenQuestions){
      @endphp
          <td><strong>Usuario</strong></td>
      @php
          break;
        }
      }
      @endphp
    </tr>
    <tr>
      <td></td>
    @php
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
            <td>{{ $printQuestions[$i]->answer[$j] }}</td>
      @php
          }
        }
        if( ($i != 0 && (($i + 1) % $lenQuestions) == 0) || $lenQuestions == 1 ) {
      @endphp
          <td>
            {{ $printQuestions[$i]->user_name }}
          </td>
        </tr>
        <tr>
          <td></td>
      @php
        }
      }
      @endphp

  </tbody>
  </table>

