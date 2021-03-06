<!doctype html>
<html lang="en">
    <head>
	     <meta charset="UTF-8"> 
       <title> Pamukkale Üniversitesi Teknokent ::  @yield('title') </title> 
       {{ HTML::style('css/bootstrap.min.css'); }}
       {{ HTML::style('css/bootswatch.min.css'); }}
	     {{ HTML::script('js/jquery.min.js'); }}
       {{ HTML::script('js/bootstrap.min.js'); }}
       {{ HTML::script('js/bootswatch.js'); }}
       <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	     <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    </head> 
    <body>
        
        {{ HTML::script('js/bsa.js'); }}
        <div class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
                <!--
               {{ link_to_action('HomeController@home','Anasayfa', $parameters = array(), $attributes = array('class' => "navbar-brand")) }} 
                <a class="navbar-brand" href="{{ URL::action('HomeController@home') }}"> Anasayfa </a>
                -->  
              <a class="navbar-brand" href="{{ URL::to('/') }}" title="Anasayfa" data-toggle="tooltip" data-placement="bottom" >   
                  <i class='fa fa-home fa-fw' ></i> Anasayfa 
              </a>
              <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="navbar-collapse collapse" id="navbar-main">
              <ul class="nav navbar-nav">
                 @if( Auth::admin()->check() )
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"> Yöneticiler <span class="caret"></span></a>
                      <ul class="dropdown-menu" aria-labelledby="themes">
                        <li><a tabindex="-1" href="{{ URL::action('AdminController@index') }}"> Listele </a></li>
                        <li class="divider"></li> 
                        <li><a tabindex="-1" href="{{ URL::action('AdminController@create') }}">Yönetici Ekle </a></li>
                      </ul>
                    </li>
                @endif
                <li>
                  <a href="{{ URL::action('HomeController@help') }}">Yardım</a>
                </li>  
              </ul> 
              <ul class="nav navbar-nav navbar-right">
               
                  @if( !Auth::admin()->check() )
                    <li  title="Giriş işlemi için tıklayınız" data-toggle="tooltip" data-placement="left" >
                        <a href="{{ URL::to('login') }}"   > Giriş </a></li> 
                  @else
                    <li id="fat-menu" class="dropdown">
                       <a href="#" class="dropdown-toggle user-process" data-toggle="dropdown">
                         {{ Auth::admin()->get()->username }} <b class="caret"></b>
                       </a>
                       <ul class="dropdown-menu">
                         <li> <a href="{{ URL::to('profile') }}"  > 
                                  <i class='fa fa-briefcase fa-fw'></i> Profil </a></li>
                         <li> <a href="{{ URL::to('admin/' . Auth::admin()->get()->id ) }}"  > 
                              <i class='fa fa-cog fa-fw'></i> Bilgilerim </a> </li>
                         <li> <a href="{{ URL::to('password') }}"  >
                              <i class='fa fa-lock fa-fw' ></i> Şifre Değiştir </a> </li>
                         <li class="divider"></li>
                         <li> <a href="{{ URL::to('logout') }}"  > 
                              <i class='fa fa-sign-out fa-fw' ></i> Çıkış </a> </li>
                       </ul>
                     </li>

                  @endif      
              </ul>

            </div>
          </div>
        </div>
                          
        <div class="container" > 
          <div class="row" > 
              <div class="col-lg-6 col-lg-offset-3" > 
                    <br>    
                    @if( Session::has('success') )
                        <div class="alert alert-dismissable alert-success">
                             <i class="fa fa-smile-o fs-25" style="padding: 0px 5px;"></i>
                             <strong> {{ Session::get('success') }}  </strong>
                        </div>
                    @elseif ( Session::has('danger') )
                        <div class="alert alert-dismissable alert-danger">
                            <i class="fa fa-exclamation-triangle fs-25" style="padding: 0px 5px;"></i>
                            <strong> {{ Session::get('danger') }} </strong> 
                        </div>    
                    @elseif ( Session::has('warning') )
                        <div class="alert alert-dismissable alert-warning">
                            <i class="fa fa-exclamation-triangle fs-25" style="padding: 0px 5px;"></i>
                            <strong> {{ Session::get('warning') }} </strong> 
                        </div>    
                    @elseif ( Session::has('info') )
                        <div class="alert alert-dismissable alert-info">
                            <i class="fa fa-exclamation-triangle fs-25" style="padding: 0px 5px;"></i>
                            <strong> {{ Session::get('info') }} </strong> 
                        </div>            
                    @endif 
              </div>          
          </div>
   
          @yield('content')
        
          <footer>
            <div class="row">
              <div class="col-lg-12"> 
                <ul class="list-unstyled">
                  <li class="pull-right"><a href="#top"> Başa dön </a></li> 
                  <li><a target="blank" href="https://twitter.com/isoakbudak">Twitter</a></li>
                  <li><a target="blank" href="https://github.com/ismailakbudak">GitHub</a></li>
                  <li><a target="blank" href="https://facebook.com/isoakbudak">Facebook</a></li>
                </ul>
                <p> Geliştirici <a target="blank" href="http://ismailakbudak.com">Ismail AKBUDAK</a> </p>
              </div>
            </div> 
          </footer> 
        </div>

    </body>
</html>