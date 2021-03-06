
<!-- app/views/create.blade.php -->

@extends('layout')

@section('title', 'Yönetici Oluştur')

@section('content')    

<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="page-header">
            <h1><span class="glyphicon glyphicon-flash"></span> Yönetici oluştur !</h1>
        </div>  

        @if ($errors->has())
            <div class="alert alert-dismissable alert-danger">
                 <i class="fa fa-arrow-right fa-fw"></i>  Lütfen hataları düzeltiniz!! 
                <!--
                <ul>
                    @foreach ($errors->all() as $error)
                           <li class=" alert-error" > <i class="fa fa-arrow-right fa-fw" ></i>  {{ $error }} </li>
                    @endforeach
                </ul>
                -->       
            </div>
        @endif

        {{ Form::open(array('action' => 'AdminController@store')) }}
        
            <div class="form-group @if ($errors->has('username')) has-error @endif">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info fa-fw"></i></span> 
                    <input type="text" value="{{ Input::old('username') }}" id="username" class="form-control" name="username" placeholder="Kullanıcı Adı" >
                </div>
                @if ($errors->has('username')) <p class="help-block">{{ $errors->first('username') }}</p> @endif      
            </div>

            <div class="form-group @if ($errors->has('email')) has-error @endif">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span> 
                    <input type="text" value="{{ Input::old('email') }}" id="email" class="form-control" name="email"  placeholder="E-Posta adresi" >
                </div>
                 @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif   
            </div>

            <div class="form-group @if ($errors->has('password')) has-error @endif">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span> 
                    <input type="password" value="{{ Input::old('password') }}"  id="password" class="form-control" name="password" placeholder="Şifre">
                </div>
                @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif    
            </div>

            <div class="form-group @if ($errors->has('password_confirm')) has-error @endif">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span> 
                    <input type="password" value="{{ Input::old('password_confirm') }}"  id="password_confirm" class="form-control" name="password_confirm" placeholder="Şifre Tekrar">
                </div>
                @if ($errors->has('password_confirm')) <p class="help-block">{{ $errors->first('password_confirm') }}</p> @endif
            </div>
            
            <div class="form-group @if ($errors->has('name')) has-error @endif">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info fa-fw"></i></span> 
                    <input type="text" value="{{ Input::old('name') }}"  id="name" class="form-control capitalize" name="name"  placeholder="İsim">
                </div>
                @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
            </div>

            <div class="form-group @if ($errors->has('surname')) has-error @endif">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info fa-fw"></i></span> 
                    <input type="text" value="{{ Input::old('surname') }}"  id="surname" class="form-control capitalize" name="surname" placeholder="Soyisim"  >
                </div>
                @if ($errors->has('surname')) <p class="help-block">{{ $errors->first('surname') }}</p> @endif     
            </div>
            
            <button type="submit" class="btn btn-primary wd-20">
               Kaydet <span class='img-loader hide'></span> 
            </button>
        
        {{ Form::close() }}
    </div>
</div>    
 

 
        <!-- if there are creation errors, they will show here -->
        <!-- {{ HTML::ul($errors->all()) }} -->

        <!--
           {{ Form::open(array('url' => 'admin/store')) }}
        -->
        <!--
        {{ Form::open(array('action' => 'AdminController@store')) }}

            {{ Form::label('email', 'E-Mail Adresi :'); }}
            {{ Form::text('email',  $value = null, $attributes = array() ); }} 
            <br>
            {{ Form::label('username', 'Kullanici adi :', array('class' => 'awesome')); }}
            {{ Form::text('username'); }}
            <br>
            {{ Form::label('password', 'Sifre :', array('class' => 'awesome')); }}
            {{ Form::password('password'); }} 
            <br>
            {{ Form::label('name', 'İsim :', array('class' => 'awesome')); }}
            {{ Form::text('name'); }}
            <br>
            {{ Form::label('surname', 'Soyisim :', array('class' => 'awesome')); }}
            {{ Form::text('surname'); }}
            <br>
            {{ Form::submit('Kaydet'); }}
            
        {{ Form::close() }}
        -->
 
 @stop   
     