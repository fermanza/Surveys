
<h2>{{ $template->name }}</h2>

 <table id="table-mis-respuestas" class="display">
        <thead>
          @foreach($answersGrouped as $answer)
              <tr>
                <th style="background-color: #979aff;">
                @if($answer['user']->username == null)
                     <b> Usuario: </b> Anonimo    
                @else   
                   <b> Usuario: </b>  {{ $answer['user']->username }}    
                @endif 
                </th>
              </tr>
              @foreach($answer['questions'] as $questions)          
		            <tr>	
		                  <td> <b> Pregunta: </b> {{ $questions['question']->label }} </td>
		            </tr>  
		              
		             <tr> 
		                 <td><b> Respuesta: </b>  {{$questions['answer']['value'] }}  </td>
		             </tr>  
              @endforeach
            @endforeach
        </thead>
        <tbody>
        </tbody>
</table>




