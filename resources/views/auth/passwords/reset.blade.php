@extends('layouts.principal')
    @section('content')
    @include('alerts.success')

    <!-- tuve que agregar los links aqui por que perdian las rutas en principal blade    -->
<link href="../../css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="../../css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<script src="../../js/jquery.min.js"></script>
<!-- fin de los script agregados por mi -->

        <div class="contact-content">
            <div class="top-header span_top">
                <div class="logo">
                    <a href="index.html"><img src="images/logo.png" alt="" /></a>
                    <p>Movie Theater</p>
                </div>
            <div class="clearfix"></div>
            </div>


            <div class="main-contact">
                @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                 <h3 class="head">CONTACT</h3>
                 <p>WE'RE ALWAYS HERE TO HELP YOU</p>
                 <div class="contact-form">
                     {!!Form::open(['url' => '/password/reset'])!!}
                        <div class="col-md-6 contact-left">
                            {!!Form::hidden('token',$token,null)!!}

                            {!!Form::text('email',null,['value' => "{{old('email')}}"])!!}

                            {!!Form::password('password')!!}
                            {!!Form::password('password_confirmation')!!}
                        </div>
                        
                        {!!Form::submit('Restablecer contraseña')!!}
                     {!!Form::close()!!}
                </div>
            </div>
        </div>
    @endsection