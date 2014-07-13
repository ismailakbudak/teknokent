@extends('layout')
 
@section('title', 'Giriş')

@section('content')
<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="page-header">
            <h1><span class="glyphicon glyphicon-flash"></span> Yönetici Girişi !</h1>
        </div>  

        @if ($errors->has())
            <div class="alert alert-dismissable alert-danger">
                 <!---		
                 <i class="fa fa-arrow-right fa-fw"></i>  Lütfen hataları düzeltiniz!! 
                 -->
                <ul>
                    @foreach ($errors->all() as $error)
                           <li class=" alert-error" > <i class="fa fa-arrow-right fa-fw" ></i>  {{ $error }} </li>
                    @endforeach
                </ul>
                  
            </div>
        @endif
        
        @if ( Session::has('message') )
                <div class="alert alert-dismissable alert-danger">
                    <i class="fa fa-exclamation-triangle fs-25" style="padding: 0px 5px;"></i>
                    <strong> {{ Session::get('message') }} </strong> 
                </div> 
        @endif

		{{ Form::open(array('action' => 'HomeController@doLogin')) }}
			    <div class="form-group @if ($errors->has()) has-error @endif">
	                <div class="input-group">
	                    <span class="input-group-addon"><i class="fa fa-info fa-fw"></i></span> 
	                    <input type="text" value="{{ Input::old('username') }}" id="username" class="form-control" name="username" placeholder="Kullanıcı Adı" >
	                </div> 
	             </div>

	            <div class="form-group @if ($errors->has()) has-error @endif">
	                <div class="input-group">
	                    <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span> 
	                    <input type="password" value="{{ Input::old('password') }}"  id="password" class="form-control" name="password" placeholder="Şifre">
	                </div> 
	            </div>

		        <button type="submit" class="btn btn-primary wd-20">
	               Giriş Yap <span class='img-loader hide'></span> 
	            </button>
		{{ Form::close() }}
    </div>
</div>

@stop 