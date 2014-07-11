<!--
   {{ Form::open(array('url' => 'admin/store')) }}

-->
{{ Form::open(array('action' => 'AdminController@store')) }}
    {{ Form::label('email', 'E-Mail Adresi :'); }}
    {{ Form::text('email'); }} 
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
 