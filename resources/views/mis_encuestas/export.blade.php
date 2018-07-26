
<h2>{{ $template->name }}</h2>

<table id="table-mis-respuestas" class="display">
  <tbody>
    @php
      $flag = true;
      $matrix = array('matrix', 'matrix-scale');
      for($i = 0; $i < count($printQuestions); $i++) {
    @endphp
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
        @php
        if (in_array($printQuestions[$i]->type, $matrix)) {
          for($j = 0; $j < count($printQuestions[$i]->answer); $j++) {
          @endphp
            <tr> 
              <td>
                <br />
                <b> Pregunta: </b>{{ $printQuestions[$i]->title[0] }}
              </td>
              </tr> 
            <tr> 
              <td>
                <b> Respuesta: </b>{{ $printQuestions[$i]->answer[$j] }}
              </td>
            </tr> 
        @php
          }
        }
        else {
        @endphp 

         <tr>
         @php  
          for($j = 0; $j < count($printQuestions[$i]->title); $j++) {         
          @endphp
              <td>
                      <b> Pregunta: </b>{{ $printQuestions[$i]->title[$j] }}
              </td>
    @php 
          }
    @endphp 
           </tr>

           <tr>
     @php 
          for($j = 0; $j < count($printQuestions[$i]->title); $j++) {
      @endphp       
               <td>
                       <b> Respuesta: </b>{{ $printQuestions[$i]->answer[$j] }}
              </td>         
    @php
        }
    @endphp     
          </tr>
    @php     
      }
    }  
    @endphp
  </tbody>
  </table>








