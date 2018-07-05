
<h2>{{ $template->name }}</h2>
{{--
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
</table>--}}

 <table id="table-mis-respuestas" class="display">
          @foreach($answersGrouped as $answer)
              <tr>
                @if($answer['user']->username == null)
                     <th> Usuario:  Anonimo  </th>
                @else   
                     <th> Usuario:   {{ $answer['user']->username }} </th>
                @endif 
              </tr>
              <tr></tr> 

              @foreach($answer['questions'] as $questions)
                <tr>
                   <th>  {{ $questions['question']->label }} </th>
                    <td> {{$questions['answer']['value'] }}</td>
                </tr>
              {{--  <tr>
                    
                </tr> --}}
              @endforeach
                 <tr></tr> 
            @endforeach
</table>





