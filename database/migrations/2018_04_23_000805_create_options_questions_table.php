<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateOptionsQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->longText('html');
            $table->timestamps();
        });

         // Insert some stuff
        \DB::table('options_questions')->insert(
            array(
                array(
                    'name' => 'Multiple Choice',
                    'type' => 'multi',
                    'html' => '<h6>Opción Múltiple</h6>
                      <input type="text" id="" name="" value="¿Te gustan los perros?">
                      <select id="option" name="option">
                      <option value>Selecciona</option>
                      <option value="Sí">Sí</option>
                      <option value="No">No</option>
                      <option value="Tal vez">Tal vez</option>
                      </select>',
                    'created_at' => Carbon::now()
                ),
                array(
                    'name' => 'Star Rating',
                    'type' => 'star',
                    'html' => '<h6>Star Rating</h6>
                    <input type="text" id="" name="" size="35" value="¿Qué tan bueno es nuestro servicio?">
                    <h5><span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span></h5>',
                    'created_at' => Carbon::now()
                ),
                array(
                    'name' => 'Single TextBox',
                    'type' => 'single',
                    'html' => '<h6>Single TextBox</h6>
                    <input type="text" id="" name="" size="35" value="¿Cuál es tu fruta favorita?">
                    <input type="text" id="option" name="option" value="La manzana.">',
                    'created_at' => Carbon::now()
                ),
                array(
                    'name' => 'Comment Box',
                    'type' => 'comment',
                    'html' => '<h6>Escribe un comentario</h6>
                    <textarea id="" name="" rows="12" cols="70"></textarea>',
                    'created_at' => Carbon::now()
                ),
                array(
                    'name' => 'Dropdown',
                    'type' => 'dropdown',
                    'html' => '<h6>Dropdown</h6>
                      <input type="text" id="" name="" value="¿Te gusta el cielo?">
                      <select id="option" name="option">
                      <option value>Selecciona</option>
                      <option value="Sí">Sí</option>
                      <option value="No">No</option>
                      <option value="Tal vez">Tal vez</option>
                      </select>',
                    'created_at' => Carbon::now()
                ),
                array(
                    'name' => 'Matrix',
                    'type' => 'matrix',
                    'html' => '<h6>Matrix</h6>
                    <textarea id="option" name="option" width="1280" height="800"></textarea>',
                    'created_at' => Carbon::now()
                ),
                array(
                    'name' => 'Ranking',
                    'type' => 'rank',
                    'html' => '<h6>Ranking</h6>
                    <div class="row">
                      <div class="side">
                        <div>5 estrellas</div>
                      </div>
                      <div class="middle">
                        <div class="bar-container">
                          <div class="bar-5"></div>
                        </div>
                      </div>
                      <div class="side right">
                        <div>150</div>
                      </div>
                      <div class="side">
                        <div>4 star</div>
                      </div>
                      <div class="middle">
                        <div class="bar-container">
                          <div class="bar-4"></div>
                        </div>
                      </div>
                      <div class="side right">
                        <div>63</div>
                      </div>
                      <div class="side">
                        <div>3 star</div>
                      </div>
                      <div class="middle">
                        <div class="bar-container">
                          <div class="bar-3"></div>
                        </div>
                      </div>
                      <div class="side right">
                        <div>15</div>
                      </div>
                      <div class="side">
                        <div>2 star</div>
                      </div>
                      <div class="middle">
                        <div class="bar-container">
                          <div class="bar-2"></div>
                        </div>
                      </div>
                      <div class="side right">
                        <div>6</div>
                      </div>
                      <div class="side">
                        <div>1 star</div>
                      </div>
                      <div class="middle">
                        <div class="bar-container">
                          <div class="bar-1"></div>
                        </div>
                      </div>
                      <div class="side right">
                        <div>20</div>
                      </div>
                    </div>',
                    'created_at' => Carbon::now()
                ),
                array(
                    'name' => 'Slider',
                    'type' => 'slider',
                    'html' => '<div class="slidecontainer">
                    <h6>Slider</h6>
                      <input type="text" id="" name="" size="35" value="¿Qué tanto nivel de inglés tienes?">
                      <input type="range" id="option" name="option" min="1" max="100" value="50" class="slider">
                    </div><br />',
                    'created_at' => Carbon::now()
                ),
                array(
                    'name' => 'Multiple Textbooks',
                    'type' => 'textbooks',
                    'html' => '<h6>Multiple Textbooks</h6>
                    <form action="">
                    Primer libro:<br>
                    <input type="text" id="" name="">
                    <br>
                    Segundo libro:<br>
                    <input type="text" id="" name="">
                    </form>',
                    'created_at' => Carbon::now()
                ),
                array(
                    'name' => 'Contact Information',
                    'type' => 'cntform',
                    'html' => '<h6>Información de contacto</h6>
                      <form action="" id="" name="">
                        <label for="fname">Nombre</label>
                        <input type="text" id="option" name="option">

                        <label for="lname">Apellido</label>
                        <input type="text" id="option" name="option">

                        <label for="subject">Comentario</label>
                        <textarea id="option" name="option" style="height:200px"></textarea>
                      </form>',
                    'created_at' => Carbon::now()
                ),
                array(
                    'name' => 'Imagen',
                    'type' => 'imagen',
                    'html' => '<form action="{{ URL::current() }}" method="POST" enctype="multipart/form-data">
                                    <div class="col-md-2">
                                        <h6>Imagen</h6>
                                    </div>
                                    <div>
                                        <input type="file" id="" name="">
                                    </div>
                                </form>',
                    'created_at' => Carbon::now()
                ),
                array(
                    'name' => 'Texto',
                    'type' => 'texto',
                    'html' => '<h6>Cuadro de texto</h6><br><textarea rows="12" cols="70" id="" name="" "></textarea>',
                    'created_at' => Carbon::now()
                )
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options_questions');
    }
}
