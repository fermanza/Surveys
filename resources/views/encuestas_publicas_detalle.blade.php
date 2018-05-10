@extends('layouts.master')
@section('title', 'Encuestas Publicas Detalle')

@extends('includes.header')
@section('content')

        <!-- start page title section -->
        <section class="bread wow fadeIn padding-25px-tb margin-bread">
            <div class="container">
                <div class="row equalize xs-equalize-auto">
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="no-margin-bottom">Encuestas públicas</h1>
                            <!-- end page title -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bread-bottom wow fadeIn no-padding page-title-small">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 display-table xs-text-left xs-margin-10px-top">
                        <div class="display-table-cell vertical-align-middle breadcrumb text-small">
                            <!-- start breadcrumb -->
                            <ul class="xs-text-center">
                                <li><a href="index.php" class="text-dark-gray"><i class="fa fa-home"></i></a></li>
                                <li><a href="encuestas-publicas.php" class="text-dark-gray">Encuestas públicas</a></li>
                                <li class="text-dark-gray">Encuesta XX</li>
                            </ul>
                            <!-- end breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->
        
        <!-- start form section -->
        <section class="wow fadeIn registro-form login-form" id="start-your-project">
            <div class="container">
                <div class="row">


            <div class="container tab-style2">

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!-- start tab navigation -->
                        <ul class="nav nav-tabs display-inherit">
                            <li class="active"><a href="#tab_sec1" data-toggle="tab"><i class="fa fa-bar-chart"></i> Reporte simple</a></li>
                            <li><a href="#tab_sec2" data-toggle="tab"><i class="fa fa-pie-chart"></i> Reporte avanzado</a></li>
                            <li><a href="#tab_sec3" data-toggle="tab"><i class="fa fa-file-o"></i> Exportar reporte</a></li>
                        </ul>
                        <!-- end tab navigation -->
                    </div>
                </div>                                
                <div class="tab-content">
                    <!-- start tab content -->
                    <div class="tab-pane med-text fade in active" id="tab_sec1">
                        <div class="row equalize">
                            <div class="col-md-12 col-sm-12 col-xs-12 display-table">
                                <div class="display-table-cell vertical-align-middle">

                                    <form id="project-contact-form" action="javascript:void(0)" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="select-style big-select">
                                                    <select name="budget" id="budget" class="bg-transparent no-margin-bottom">
                                                         <option value="">Seleccionar encuesta</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 buscar">
                                                <input type="text" name="name" id="name" placeholder="Buscar" class="big-input">
                                                <i class="fa fa-search"></i>
                                            </div>
                                        </div>
                                    </form>

                                    <h6>Nombre de la encuesta</h6>

                                    <div class="pregunta">
                                        <p>Pregunta 1</p>

                                        <div class="todo">
                                          
                                          <div class="titulo">
                                              <h6>Lorem ipsum dolor sit amet consectetur adipiscing elit</h6>
                                              <p>Respondidas: 2 Omitidas: 0</p>
                                              <a href="#">Exportar <i class="fa fa-chevron-right"></i></a>
                                          </div>

                                          <div class="tabla">
                                              <table class="table">
                                                <tbody>
                                                  <tr>
                                                    <th>1 Año</th>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                  </tr>
                                                  <tr>
                                                    <th>2 Años</th>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                                                  <tr>
                                                    <th>3 Años</th>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                                                  <tr>
                                                    <th>Más de 5 Años</th>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                                                  <tr>
                                                    <th>0%</th>
                                                    <td>10%</td>
                                                    <td>20%</td>
                                                    <td>30%</td>
                                                    <td>40%</td>
                                                    <td>50%</td>
                                                    <td>60%</td>
                                                    <td>70%</td>
                                                    <td>80%</td>
                                                    <td>90%</td>
                                                    <td>100%</td>
                                                  </tr>
                                                  </tbody>
                                              </table>
                                          </div>



                                          <div class="tabla-inf">
                                              <table class="table">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">Opciones de respuesta</th>
                                                    <th scope="col">Respuestas</th>
                                                    <th scope="col"></th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>1 Año</td>
                                                    <td>100,00%</td>
                                                    <td>2</td>
                                                  </tr>
                                                  <tr>
                                                    <td>2 Años</td>
                                                    <td>0,00%</td>
                                                    <td>0</td>
                                                  </tr>
                                                  <tr>
                                                    <td>3 Años</td>
                                                    <td>0,00%</td>
                                                    <td>0</td>
                                                  </tr>
                                                  <tr>
                                                    <td>Más de 5 años</td>
                                                    <td>0,00%</td>
                                                    <td>0</td>
                                                  </tr>
                                                  <tr>
                                                    <td>Total</td>
                                                    <td></td>
                                                    <td>2</td>
                                                  </tr>
                                                  
                                                </tbody>
                                              </table>
                                          </div>


                                        </div>


                                    </div>

                                    <div class="pregunta">
                                        <p>Pregunta 2</p>

                                        <div class="todo">
                                          
                                          <div class="titulo">
                                              <h6>Lorem ipsum dolor sit amet consectetur adipiscing elit</h6>
                                              <p>Respondidas: 2 Omitidas: 0</p>
                                              <a href="#">Exportar <i class="fa fa-chevron-right"></i></a>
                                          </div>

                                          <div class="tabla">
                                              <table class="table">
                                                <tbody>
                                                  <tr>
                                                    <th>1 Año</th>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                  </tr>
                                                  <tr>
                                                    <th>2 Años</th>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                                                  <tr>
                                                    <th>3 Años</th>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                                                  <tr>
                                                    <th>Más de 5 Años</th>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                                                  <tr>
                                                    <th>0%</th>
                                                    <td>10%</td>
                                                    <td>20%</td>
                                                    <td>30%</td>
                                                    <td>40%</td>
                                                    <td>50%</td>
                                                    <td>60%</td>
                                                    <td>70%</td>
                                                    <td>80%</td>
                                                    <td>90%</td>
                                                    <td>100%</td>
                                                  </tr>
                                                  </tbody>
                                              </table>
                                          </div>



                                          <div class="tabla-inf">
                                              <table class="table">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">Opciones de respuesta</th>
                                                    <th scope="col">Respuestas</th>
                                                    <th scope="col"></th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>1 Año</td>
                                                    <td>100,00%</td>
                                                    <td>2</td>
                                                  </tr>
                                                  <tr>
                                                    <td>2 Años</td>
                                                    <td>0,00%</td>
                                                    <td>0</td>
                                                  </tr>
                                                  <tr>
                                                    <td>3 Años</td>
                                                    <td>0,00%</td>
                                                    <td>0</td>
                                                  </tr>
                                                  <tr>
                                                    <td>Más de 5 años</td>
                                                    <td>0,00%</td>
                                                    <td>0</td>
                                                  </tr>
                                                  <tr>
                                                    <td>Total</td>
                                                    <td></td>
                                                    <td>2</td>
                                                  </tr>
                                                  
                                                </tbody>
                                              </table>
                                          </div>


                                        </div>


                                    </div>

                                    <div class="pregunta">
                                        <p>Pregunta 3</p>

                                        <div class="todo">
                                          
                                          <div class="titulo">
                                              <h6>Lorem ipsum dolor sit amet consectetur adipiscing elit</h6>
                                              <p>Respondidas: 2 Omitidas: 0</p>
                                              <a href="#">Exportar <i class="fa fa-chevron-right"></i></a>
                                          </div>

                                          <div class="tabla">
                                              <table class="table">
                                                <tbody>
                                                  <tr>
                                                    <th>1 Año</th>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                  </tr>
                                                  <tr>
                                                    <th>2 Años</th>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                                                  <tr>
                                                    <th>3 Años</th>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td><div class="si"></div></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                                                  <tr>
                                                    <th>Más de 5 Años</th>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                                                  <tr>
                                                    <th>0%</th>
                                                    <td>10%</td>
                                                    <td>20%</td>
                                                    <td>30%</td>
                                                    <td>40%</td>
                                                    <td>50%</td>
                                                    <td>60%</td>
                                                    <td>70%</td>
                                                    <td>80%</td>
                                                    <td>90%</td>
                                                    <td>100%</td>
                                                  </tr>
                                                  </tbody>
                                              </table>
                                          </div>



                                          <div class="tabla-inf">
                                              <table class="table">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">Opciones de respuesta</th>
                                                    <th scope="col">Respuestas</th>
                                                    <th scope="col"></th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>1 Año</td>
                                                    <td>100,00%</td>
                                                    <td>2</td>
                                                  </tr>
                                                  <tr>
                                                    <td>2 Años</td>
                                                    <td>0,00%</td>
                                                    <td>0</td>
                                                  </tr>
                                                  <tr>
                                                    <td>3 Años</td>
                                                    <td>0,00%</td>
                                                    <td>0</td>
                                                  </tr>
                                                  <tr>
                                                    <td>Más de 5 años</td>
                                                    <td>0,00%</td>
                                                    <td>0</td>
                                                  </tr>
                                                  <tr>
                                                    <td>Total</td>
                                                    <td></td>
                                                    <td>2</td>
                                                  </tr>
                                                  
                                                </tbody>
                                              </table>
                                          </div>


                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end tab content -->
                    <!-- start tab content -->
                    <div class="tab-pane fade in" id="tab_sec2">
                        <div class="row equalize">
                            <div class="col-md-12 col-sm-12 col-xs-12 display-table">
                                <div class="display-table-cell vertical-align-middle">
                                    <h6 class="text-extra-dark-gray margin-20px-bottom">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h6>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end tab content -->
                    <!-- start tab content -->
                    <div class="tab-pane fade in" id="tab_sec3">
                        <div class="row equalize">
                            <div class="col-md-12 col-sm-12 col-xs-12 display-table">
                                <div class="display-table-cell vertical-align-middle">
                                    <h6 class="text-extra-dark-gray margin-20px-bottom">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h6>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end tab content -->
                </div>       
            </div>





                </div>
            </div>
        </section>
@stop