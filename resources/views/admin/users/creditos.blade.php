@extends('admin.default')

@section('page-header')
  Agregar créditos a <big>{{ trans('Usuario') }}</big>
@stop

@section('content')
<style>
.btn{
   padding:10px 0px;
}
.p1 {
    background: none;
    border: 1px solid rgba(0,0,0,0.1);
    border-radius: 5px;
    padding:15px;
}
.p1 img {
    width: 40px;
    float: left;
    margin-left: 15px;
}
.p1 a {
    background: #5ba01f;
    border: 2px solid #5ba01f;
}
.p1 a {
    float: right;
    color: #fff;
    display: inline-block;
    padding: 10px 20px;
    text-transform: uppercase;
    font-weight: 600;
    font-size: 16px;
    
    margin-top: 10px;
}
.micuenta .cuenta .p1 > div > div {
    float: left;
}
</style>
<section class="wow fadeIn planes">

    <div class="container">
            <div class="card" style="width: 18rem;">
                    <h5 class="card-header">Plan 1</h5>
                        <div class="card-body">
                            <h5 class="card-title">1 Credito</h5>
                            <p class="card-text">Ahorra un 0%</p>
                            <p class="card-text"><b>USD 3,00</b></p>
                            <a href="{{url("admin/users/creditos/insertCredit/1/{$id}")}}" class="btn"><i class="fa fa-shopping-cart"></i> Comprar</a> 
                        </div>
            </div>
            <br/>
            <div class="card" style="width: 18rem;">
                    <h5 class="card-header">Plan 2</h5>
                    <div class="card-body">
                        <h5 class="card-title">10 Creditos</h5>
                        <p class="card-text">Ahorra un 15%</p>
                        <p class="card-text"><b>USD 25,50</b></p>
                        <a href="{{url("admin/users/creditos/insertCredit/2/{$id}")}}" class="btn"><i class="fa fa-shopping-cart"></i> Comprar</a> 
                    </div>
            </div>
            <br/>
            <div class="card" style="width: 18rem;">
                <h5 class="card-header">Plan 3</h5>
                    <div class="card-body">
                        <h5 class="card-title">50 Creditos</h5>
                        <p class="card-text">Ahorra un 25%</p>
                        <p class="card-text"><b>USD 112,50</b></p>
                        <a href="{{url("admin/users/creditos/insertCredit/3/{$id}")}}" class="btn"><i class="fa fa-shopping-cart"></i> Comprar</a> 
                    </div>
            </div>
            <br/>
            <div class="card" style="width: 18rem;">
                <h5 class="card-header">Plan 4</h5>
                    <div class="card-body">
                        <h5 class="card-title">100 Creditos</h5>
                        <p class="card-text">Ahorra un 35%</p>
                        <p class="card-text"><b>USD 412,50</b></p>
                        <a href="{{url("admin/users/creditos/insertCredit/4/{$id}")}}" class="btn"><i class="fa fa-shopping-cart"></i> Comprar</a> 
                    </div>
            </div>
            <br/>
            <div class="card" style="width: 18rem;">
                <h5 class="card-header">Plan 5</h5>
                    <div class="card-body">
                        <h5 class="card-title">500 Creditos</h5>
                        <p class="card-text">Ahorra un 60%</p>
                        <p class="card-text"><b>USD 600,00</b></p>
                        <a href="{{url("admin/users/creditos/insertCredit/5/{$id}")}}" class="btn"><i class="fa fa-shopping-cart"></i> Comprar</a> 
                    </div>
           </div>

    </div>

            
</section>


@stop

