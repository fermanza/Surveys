@extends('layouts.master')
@section('title', 'Mis encuestas')

@extends('includes.header')
@section('content')

        <!-- start page title section -->
        <section class="bread wow fadeIn padding-25px-tb margin-bread">
            <div class="container">
                <div class="row equalize xs-equalize-auto">
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="no-margin-bottom">Mis encuestas</h1>
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
                                <li class="text-dark-gray">Mis encuestas</li>
                            </ul>
                            <!-- end breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->

        <section class="tabla">
            <div class="container">
                <div class="col-md-12">
                    <div class="select-style big-select">
                        <select name="budget" id="budget" class="bg-transparent no-margin-bottom">
                             <option value="">Todas las encuestas</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <a class="btn" a href="{{ URL('encuestas') }}">Crear encuesta</a>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default">

                     {{--  <!-- Table -->
                      <table class="table">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Respuestas</th>
                                <th>Reportes</th>
                                <th>Cerrar encuesta</th>
                                <th>Editar encuesta</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($templates as $template)
                            <tr>
                                <th><span>{{ $template->name}} </span>
                                Creada: {{ $template->created_at->diffForHumans()}}<h>
                                <td>10</td>
                                <td>
                                    <a href="#">
                                        <svg viewBox="0 0 41.7 41.7">
                                            <g>
                                            <rect x="11.6" y="19.2" width="8.3" height="19.5"/>
                                            <rect x="0.9" y="28" width="8.3" height="10.7"/>
                                            <rect x="22.4" y="23.4" width="8.3" height="15.3"/>
                                            <rect x="33.2" y="16.7" width="8.3" height="22"/>
                                            <polygon points="26.3,16 15.5,7.1 -0.2,22.2 1.8,24.2 15.7,10.9 26.5,19.8 41.8,5.1 39.8,3    "/>
                                            </g>
                                        </svg>
                                    </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <svg viewBox="0 0 107.8 102.7">
                                            <path d="M104.3,28.2v2.3V96c0,3.7-3,6.6-6.7,6.6H29.8c-3.5,0-6.4-2.8-6.6-6.3v-9.2h7.6V91v4.1h65.9V30.5H81.1
                                            c-3.1,0-5.7-2.6-5.7-5.7V7.6H30.8v7.9h-7.6V6.6c0-3.7,3-6.6,6.6-6.6h45.5h0.7C77,0,77.9,0.1,79,0.4c2.9,0.7,5.8,2.2,7.5,3.9
                                            L100,17.8c2.1,2.1,3.8,5.9,4.2,9.2v0l0,0C104.3,27.4,104.3,27.8,104.3,28.2z M57.7,28.9c-12.4-12.4-32.5-12.4-44.9,0
                                            c-12.4,12.4-12.4,32.5,0,44.9c12.4,12.4,32.5,12.4,44.9,0C70.1,61.4,70.1,41.3,57.7,28.9z M56.3,56.9l-15.4,0v0H29.6H25H14.2h-1.8
                                            l0-1.8l0-7.7l0-1.8h1.8h15.4l0,0h11.2h15.4H58l0,1.8l0,7.7l0,1.8H56.3z"/>
                                        </svg>
                                    </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <svg viewBox="0 0 125.7 125.7">
                                            <path d="M124.7,20.5L105.2,1c-1.3-1.3-3.3-1.3-4.6,0L13.3,88.2l24.1,24.1l87.3-87.3C126,23.8,126,21.7,124.7,20.5z"/>
                                            <polygon points="8.8,92.7 0,125.7 32.9,116.8 "/>
                                        </svg>
                                    </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <svg viewBox="0 0 67.9 67.9">
                                            <path d="M14.2,65c0.2,1.6,1.6,2.9,3.2,2.9h33c1.6,0,3.1-1.3,3.2-2.9l5.7-52.1H8.5L14.2,65z M42.2,59.6L47,20.7
                                            c0.2-1.3,1.4-2.3,2.7-2.1c1.3,0.2,2.3,1.4,2.1,2.7l-4.7,38.9c-0.2,1.2-1.2,2.1-2.4,2.1c-0.1,0-0.2,0-0.3,0
                                            C43,62.2,42.1,61,42.2,59.6z M31.6,20.7c0-1.3,1.1-2.4,2.4-2.4s2.4,1.1,2.4,2.4v39.2c0,1.3-1.1,2.4-2.4,2.4s-2.4-1.1-2.4-2.4V20.7z
                                             M18.4,18.6c1.3-0.2,2.5,0.8,2.7,2.1l4.7,38.9c0.2,1.3-0.8,2.5-2.1,2.7c-0.1,0-0.2,0-0.3,0c-1.2,0-2.3-0.9-2.4-2.1l-4.7-38.9
                                            C16.1,19.9,17.1,18.7,18.4,18.6z M61,10H6.9c0-2.9,1.8-5.2,3.9-5.2h16.5V3V0.7c0-0.4,0.4-0.7,1-0.7h11.4c0.5,0,1,0.3,1,0.7V3v1.8
                                            h16.5C59.2,4.8,61,7.2,61,10z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <th><span>Lorem ipsum dolor sit amet</span>
                                Creada 08/11/2017</th>
                                <td>10</td>
                                <td>
                                    <a href="#">
                                        <svg viewBox="0 0 41.7 41.7">
                                            <g>
                                            <rect x="11.6" y="19.2" width="8.3" height="19.5"/>
                                            <rect x="0.9" y="28" width="8.3" height="10.7"/>
                                            <rect x="22.4" y="23.4" width="8.3" height="15.3"/>
                                            <rect x="33.2" y="16.7" width="8.3" height="22"/>
                                            <polygon points="26.3,16 15.5,7.1 -0.2,22.2 1.8,24.2 15.7,10.9 26.5,19.8 41.8,5.1 39.8,3    "/>
                                            </g>
                                        </svg>
                                    </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <svg viewBox="0 0 107.8 102.7">
                                            <path d="M104.3,28.2v2.3V96c0,3.7-3,6.6-6.7,6.6H29.8c-3.5,0-6.4-2.8-6.6-6.3v-9.2h7.6V91v4.1h65.9V30.5H81.1
                                            c-3.1,0-5.7-2.6-5.7-5.7V7.6H30.8v7.9h-7.6V6.6c0-3.7,3-6.6,6.6-6.6h45.5h0.7C77,0,77.9,0.1,79,0.4c2.9,0.7,5.8,2.2,7.5,3.9
                                            L100,17.8c2.1,2.1,3.8,5.9,4.2,9.2v0l0,0C104.3,27.4,104.3,27.8,104.3,28.2z M57.7,28.9c-12.4-12.4-32.5-12.4-44.9,0
                                            c-12.4,12.4-12.4,32.5,0,44.9c12.4,12.4,32.5,12.4,44.9,0C70.1,61.4,70.1,41.3,57.7,28.9z M56.3,56.9l-15.4,0v0H29.6H25H14.2h-1.8
                                            l0-1.8l0-7.7l0-1.8h1.8h15.4l0,0h11.2h15.4H58l0,1.8l0,7.7l0,1.8H56.3z"/>
                                        </svg>
                                    </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <svg viewBox="0 0 125.7 125.7">
                                            <path d="M124.7,20.5L105.2,1c-1.3-1.3-3.3-1.3-4.6,0L13.3,88.2l24.1,24.1l87.3-87.3C126,23.8,126,21.7,124.7,20.5z"/>
                                            <polygon points="8.8,92.7 0,125.7 32.9,116.8 "/>
                                        </svg>
                                    </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <svg viewBox="0 0 67.9 67.9">
                                            <path d="M14.2,65c0.2,1.6,1.6,2.9,3.2,2.9h33c1.6,0,3.1-1.3,3.2-2.9l5.7-52.1H8.5L14.2,65z M42.2,59.6L47,20.7
                                            c0.2-1.3,1.4-2.3,2.7-2.1c1.3,0.2,2.3,1.4,2.1,2.7l-4.7,38.9c-0.2,1.2-1.2,2.1-2.4,2.1c-0.1,0-0.2,0-0.3,0
                                            C43,62.2,42.1,61,42.2,59.6z M31.6,20.7c0-1.3,1.1-2.4,2.4-2.4s2.4,1.1,2.4,2.4v39.2c0,1.3-1.1,2.4-2.4,2.4s-2.4-1.1-2.4-2.4V20.7z
                                             M18.4,18.6c1.3-0.2,2.5,0.8,2.7,2.1l4.7,38.9c0.2,1.3-0.8,2.5-2.1,2.7c-0.1,0-0.2,0-0.3,0c-1.2,0-2.3-0.9-2.4-2.1l-4.7-38.9
                                            C16.1,19.9,17.1,18.7,18.4,18.6z M61,10H6.9c0-2.9,1.8-5.2,3.9-5.2h16.5V3V0.7c0-0.4,0.4-0.7,1-0.7h11.4c0.5,0,1,0.3,1,0.7V3v1.8
                                            h16.5C59.2,4.8,61,7.2,61,10z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <th><span>Lorem ipsum dolor sit amet</span>
                                Creada 08/11/2017</th>
                                <td>10</td>
                                <td>
                                    <a href="#">
                                        <svg viewBox="0 0 41.7 41.7">
                                            <g>
                                            <rect x="11.6" y="19.2" width="8.3" height="19.5"/>
                                            <rect x="0.9" y="28" width="8.3" height="10.7"/>
                                            <rect x="22.4" y="23.4" width="8.3" height="15.3"/>
                                            <rect x="33.2" y="16.7" width="8.3" height="22"/>
                                            <polygon points="26.3,16 15.5,7.1 -0.2,22.2 1.8,24.2 15.7,10.9 26.5,19.8 41.8,5.1 39.8,3    "/>
                                            </g>
                                        </svg>
                                    </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <svg viewBox="0 0 107.8 102.7">
                                            <path d="M104.3,28.2v2.3V96c0,3.7-3,6.6-6.7,6.6H29.8c-3.5,0-6.4-2.8-6.6-6.3v-9.2h7.6V91v4.1h65.9V30.5H81.1
                                            c-3.1,0-5.7-2.6-5.7-5.7V7.6H30.8v7.9h-7.6V6.6c0-3.7,3-6.6,6.6-6.6h45.5h0.7C77,0,77.9,0.1,79,0.4c2.9,0.7,5.8,2.2,7.5,3.9
                                            L100,17.8c2.1,2.1,3.8,5.9,4.2,9.2v0l0,0C104.3,27.4,104.3,27.8,104.3,28.2z M57.7,28.9c-12.4-12.4-32.5-12.4-44.9,0
                                            c-12.4,12.4-12.4,32.5,0,44.9c12.4,12.4,32.5,12.4,44.9,0C70.1,61.4,70.1,41.3,57.7,28.9z M56.3,56.9l-15.4,0v0H29.6H25H14.2h-1.8
                                            l0-1.8l0-7.7l0-1.8h1.8h15.4l0,0h11.2h15.4H58l0,1.8l0,7.7l0,1.8H56.3z"/>
                                        </svg>
                                    </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <svg viewBox="0 0 125.7 125.7">
                                            <path d="M124.7,20.5L105.2,1c-1.3-1.3-3.3-1.3-4.6,0L13.3,88.2l24.1,24.1l87.3-87.3C126,23.8,126,21.7,124.7,20.5z"/>
                                            <polygon points="8.8,92.7 0,125.7 32.9,116.8 "/>
                                        </svg>
                                    </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <svg viewBox="0 0 67.9 67.9">
                                            <path d="M14.2,65c0.2,1.6,1.6,2.9,3.2,2.9h33c1.6,0,3.1-1.3,3.2-2.9l5.7-52.1H8.5L14.2,65z M42.2,59.6L47,20.7
                                            c0.2-1.3,1.4-2.3,2.7-2.1c1.3,0.2,2.3,1.4,2.1,2.7l-4.7,38.9c-0.2,1.2-1.2,2.1-2.4,2.1c-0.1,0-0.2,0-0.3,0
                                            C43,62.2,42.1,61,42.2,59.6z M31.6,20.7c0-1.3,1.1-2.4,2.4-2.4s2.4,1.1,2.4,2.4v39.2c0,1.3-1.1,2.4-2.4,2.4s-2.4-1.1-2.4-2.4V20.7z
                                             M18.4,18.6c1.3-0.2,2.5,0.8,2.7,2.1l4.7,38.9c0.2,1.3-0.8,2.5-2.1,2.7c-0.1,0-0.2,0-0.3,0c-1.2,0-2.3-0.9-2.4-2.1l-4.7-38.9
                                            C16.1,19.9,17.1,18.7,18.4,18.6z M61,10H6.9c0-2.9,1.8-5.2,3.9-5.2h16.5V3V0.7c0-0.4,0.4-0.7,1-0.7h11.4c0.5,0,1,0.3,1,0.7V3v1.8
                                            h16.5C59.2,4.8,61,7.2,61,10z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <th><span>Lorem ipsum dolor sit amet</span>
                                Creada 08/11/2017</th>
                                <td>10</td>
                                <td>
                                    <a href="#">
                                        <svg viewBox="0 0 41.7 41.7">
                                            <g>
                                            <rect x="11.6" y="19.2" width="8.3" height="19.5"/>
                                            <rect x="0.9" y="28" width="8.3" height="10.7"/>
                                            <rect x="22.4" y="23.4" width="8.3" height="15.3"/>
                                            <rect x="33.2" y="16.7" width="8.3" height="22"/>
                                            <polygon points="26.3,16 15.5,7.1 -0.2,22.2 1.8,24.2 15.7,10.9 26.5,19.8 41.8,5.1 39.8,3    "/>
                                            </g>
                                        </svg>
                                    </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <svg viewBox="0 0 107.8 102.7">
                                            <path d="M104.3,28.2v2.3V96c0,3.7-3,6.6-6.7,6.6H29.8c-3.5,0-6.4-2.8-6.6-6.3v-9.2h7.6V91v4.1h65.9V30.5H81.1
                                            c-3.1,0-5.7-2.6-5.7-5.7V7.6H30.8v7.9h-7.6V6.6c0-3.7,3-6.6,6.6-6.6h45.5h0.7C77,0,77.9,0.1,79,0.4c2.9,0.7,5.8,2.2,7.5,3.9
                                            L100,17.8c2.1,2.1,3.8,5.9,4.2,9.2v0l0,0C104.3,27.4,104.3,27.8,104.3,28.2z M57.7,28.9c-12.4-12.4-32.5-12.4-44.9,0
                                            c-12.4,12.4-12.4,32.5,0,44.9c12.4,12.4,32.5,12.4,44.9,0C70.1,61.4,70.1,41.3,57.7,28.9z M56.3,56.9l-15.4,0v0H29.6H25H14.2h-1.8
                                            l0-1.8l0-7.7l0-1.8h1.8h15.4l0,0h11.2h15.4H58l0,1.8l0,7.7l0,1.8H56.3z"/>
                                        </svg>
                                    </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <svg viewBox="0 0 125.7 125.7">
                                            <path d="M124.7,20.5L105.2,1c-1.3-1.3-3.3-1.3-4.6,0L13.3,88.2l24.1,24.1l87.3-87.3C126,23.8,126,21.7,124.7,20.5z"/>
                                            <polygon points="8.8,92.7 0,125.7 32.9,116.8 "/>
                                        </svg>
                                    </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <svg viewBox="0 0 67.9 67.9">
                                            <path d="M14.2,65c0.2,1.6,1.6,2.9,3.2,2.9h33c1.6,0,3.1-1.3,3.2-2.9l5.7-52.1H8.5L14.2,65z M42.2,59.6L47,20.7
                                            c0.2-1.3,1.4-2.3,2.7-2.1c1.3,0.2,2.3,1.4,2.1,2.7l-4.7,38.9c-0.2,1.2-1.2,2.1-2.4,2.1c-0.1,0-0.2,0-0.3,0
                                            C43,62.2,42.1,61,42.2,59.6z M31.6,20.7c0-1.3,1.1-2.4,2.4-2.4s2.4,1.1,2.4,2.4v39.2c0,1.3-1.1,2.4-2.4,2.4s-2.4-1.1-2.4-2.4V20.7z
                                             M18.4,18.6c1.3-0.2,2.5,0.8,2.7,2.1l4.7,38.9c0.2,1.3-0.8,2.5-2.1,2.7c-0.1,0-0.2,0-0.3,0c-1.2,0-2.3-0.9-2.4-2.1l-4.7-38.9
                                            C16.1,19.9,17.1,18.7,18.4,18.6z M61,10H6.9c0-2.9,1.8-5.2,3.9-5.2h16.5V3V0.7c0-0.4,0.4-0.7,1-0.7h11.4c0.5,0,1,0.3,1,0.7V3v1.8
                                            h16.5C59.2,4.8,61,7.2,61,10z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <th><span>Lorem ipsum dolor sit amet</span>
                                Creada 08/11/2017</th>
                                <td>10</td>
                                <td>
                                    <a href="#">
                                        <svg viewBox="0 0 41.7 41.7">
                                            <g>
                                            <rect x="11.6" y="19.2" width="8.3" height="19.5"/>
                                            <rect x="0.9" y="28" width="8.3" height="10.7"/>
                                            <rect x="22.4" y="23.4" width="8.3" height="15.3"/>
                                            <rect x="33.2" y="16.7" width="8.3" height="22"/>
                                            <polygon points="26.3,16 15.5,7.1 -0.2,22.2 1.8,24.2 15.7,10.9 26.5,19.8 41.8,5.1 39.8,3    "/>
                                            </g>
                                        </svg>
                                    </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <svg viewBox="0 0 107.8 102.7">
                                            <path d="M104.3,28.2v2.3V96c0,3.7-3,6.6-6.7,6.6H29.8c-3.5,0-6.4-2.8-6.6-6.3v-9.2h7.6V91v4.1h65.9V30.5H81.1
                                            c-3.1,0-5.7-2.6-5.7-5.7V7.6H30.8v7.9h-7.6V6.6c0-3.7,3-6.6,6.6-6.6h45.5h0.7C77,0,77.9,0.1,79,0.4c2.9,0.7,5.8,2.2,7.5,3.9
                                            L100,17.8c2.1,2.1,3.8,5.9,4.2,9.2v0l0,0C104.3,27.4,104.3,27.8,104.3,28.2z M57.7,28.9c-12.4-12.4-32.5-12.4-44.9,0
                                            c-12.4,12.4-12.4,32.5,0,44.9c12.4,12.4,32.5,12.4,44.9,0C70.1,61.4,70.1,41.3,57.7,28.9z M56.3,56.9l-15.4,0v0H29.6H25H14.2h-1.8
                                            l0-1.8l0-7.7l0-1.8h1.8h15.4l0,0h11.2h15.4H58l0,1.8l0,7.7l0,1.8H56.3z"/>
                                        </svg>
                                    </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <svg viewBox="0 0 125.7 125.7">
                                            <path d="M124.7,20.5L105.2,1c-1.3-1.3-3.3-1.3-4.6,0L13.3,88.2l24.1,24.1l87.3-87.3C126,23.8,126,21.7,124.7,20.5z"/>
                                            <polygon points="8.8,92.7 0,125.7 32.9,116.8 "/>
                                        </svg>
                                    </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <svg viewBox="0 0 67.9 67.9">
                                            <path d="M14.2,65c0.2,1.6,1.6,2.9,3.2,2.9h33c1.6,0,3.1-1.3,3.2-2.9l5.7-52.1H8.5L14.2,65z M42.2,59.6L47,20.7
                                            c0.2-1.3,1.4-2.3,2.7-2.1c1.3,0.2,2.3,1.4,2.1,2.7l-4.7,38.9c-0.2,1.2-1.2,2.1-2.4,2.1c-0.1,0-0.2,0-0.3,0
                                            C43,62.2,42.1,61,42.2,59.6z M31.6,20.7c0-1.3,1.1-2.4,2.4-2.4s2.4,1.1,2.4,2.4v39.2c0,1.3-1.1,2.4-2.4,2.4s-2.4-1.1-2.4-2.4V20.7z
                                             M18.4,18.6c1.3-0.2,2.5,0.8,2.7,2.1l4.7,38.9c0.2,1.3-0.8,2.5-2.1,2.7c-0.1,0-0.2,0-0.3,0c-1.2,0-2.3-0.9-2.4-2.1l-4.7-38.9
                                            C16.1,19.9,17.1,18.7,18.4,18.6z M61,10H6.9c0-2.9,1.8-5.2,3.9-5.2h16.5V3V0.7c0-0.4,0.4-0.7,1-0.7h11.4c0.5,0,1,0.3,1,0.7V3v1.8
                                            h16.5C59.2,4.8,61,7.2,61,10z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <th><span>Lorem ipsum dolor sit amet</span>
                                Creada 08/11/2017</th>
                                <td>10</td>
                                <td>
                                    <a href="#">
                                        <svg viewBox="0 0 41.7 41.7">
                                            <g>
                                            <rect x="11.6" y="19.2" width="8.3" height="19.5"/>
                                            <rect x="0.9" y="28" width="8.3" height="10.7"/>
                                            <rect x="22.4" y="23.4" width="8.3" height="15.3"/>
                                            <rect x="33.2" y="16.7" width="8.3" height="22"/>
                                            <polygon points="26.3,16 15.5,7.1 -0.2,22.2 1.8,24.2 15.7,10.9 26.5,19.8 41.8,5.1 39.8,3    "/>
                                            </g>
                                        </svg>
                                    </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <svg viewBox="0 0 107.8 102.7">
                                            <path d="M104.3,28.2v2.3V96c0,3.7-3,6.6-6.7,6.6H29.8c-3.5,0-6.4-2.8-6.6-6.3v-9.2h7.6V91v4.1h65.9V30.5H81.1
                                            c-3.1,0-5.7-2.6-5.7-5.7V7.6H30.8v7.9h-7.6V6.6c0-3.7,3-6.6,6.6-6.6h45.5h0.7C77,0,77.9,0.1,79,0.4c2.9,0.7,5.8,2.2,7.5,3.9
                                            L100,17.8c2.1,2.1,3.8,5.9,4.2,9.2v0l0,0C104.3,27.4,104.3,27.8,104.3,28.2z M57.7,28.9c-12.4-12.4-32.5-12.4-44.9,0
                                            c-12.4,12.4-12.4,32.5,0,44.9c12.4,12.4,32.5,12.4,44.9,0C70.1,61.4,70.1,41.3,57.7,28.9z M56.3,56.9l-15.4,0v0H29.6H25H14.2h-1.8
                                            l0-1.8l0-7.7l0-1.8h1.8h15.4l0,0h11.2h15.4H58l0,1.8l0,7.7l0,1.8H56.3z"/>
                                        </svg>
                                    </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <svg viewBox="0 0 125.7 125.7">
                                            <path d="M124.7,20.5L105.2,1c-1.3-1.3-3.3-1.3-4.6,0L13.3,88.2l24.1,24.1l87.3-87.3C126,23.8,126,21.7,124.7,20.5z"/>
                                            <polygon points="8.8,92.7 0,125.7 32.9,116.8 "/>
                                        </svg>
                                    </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <svg viewBox="0 0 67.9 67.9">
                                            <path d="M14.2,65c0.2,1.6,1.6,2.9,3.2,2.9h33c1.6,0,3.1-1.3,3.2-2.9l5.7-52.1H8.5L14.2,65z M42.2,59.6L47,20.7
                                            c0.2-1.3,1.4-2.3,2.7-2.1c1.3,0.2,2.3,1.4,2.1,2.7l-4.7,38.9c-0.2,1.2-1.2,2.1-2.4,2.1c-0.1,0-0.2,0-0.3,0
                                            C43,62.2,42.1,61,42.2,59.6z M31.6,20.7c0-1.3,1.1-2.4,2.4-2.4s2.4,1.1,2.4,2.4v39.2c0,1.3-1.1,2.4-2.4,2.4s-2.4-1.1-2.4-2.4V20.7z
                                             M18.4,18.6c1.3-0.2,2.5,0.8,2.7,2.1l4.7,38.9c0.2,1.3-0.8,2.5-2.1,2.7c-0.1,0-0.2,0-0.3,0c-1.2,0-2.3-0.9-2.4-2.1l-4.7-38.9
                                            C16.1,19.9,17.1,18.7,18.4,18.6z M61,10H6.9c0-2.9,1.8-5.2,3.9-5.2h16.5V3V0.7c0-0.4,0.4-0.7,1-0.7h11.4c0.5,0,1,0.3,1,0.7V3v1.8
                                            h16.5C59.2,4.8,61,7.2,61,10z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table> --}}

                        <table id="table-mis-encuestas">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Fecha de Creación</th>
                                    <th>Respuestas</th>
                                    <th>Reportes</th>
                                    <th>Cerrar Encuesta</th>
                                    <th>Editar Encuesta</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($templates as $template)
                                <tr>
                                    <td> <a href="{{ URL('encuestas/contestar') }}/{{ $template->id }} ">{{ $template->name }} </a></td>
                                    <td>{{ $template->created_at->diffForHumans() }}</td>
                                    <td> {{ $template->answersnumber }} </td>
                                    <td><a href="{{url('mis_encuestas/respuestas')}}/{{$template->id}}"><i class="fa fa-file"></i></a></td>
                                    <td><a href=""><i class="fa fa-times"></i></a></td>
                                    <td><a href="{{ route('mis_encuestas.edit', [$template]) }}">
                                    <i class="fa fa-edit"></i>
                                    </a></td>
                                    <td> {!! Form::open([
                                            'class'=>'delete',
                                            'url'  => route('mis_encuestas.destroy', $template), 
                                            'method' => 'DELETE',
                                            ]) 
                                        !!}
                                            <br>
                                            <button title="Eliminar" id="deleteTemp"><i class="fa fa-trash"></i></button>
                                            
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </section>
@stop