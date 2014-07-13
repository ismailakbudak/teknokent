@extends('layout')

@section('title', 'Yöneticiler Listesi')

@section('content')
  <div class="row" >
    <a class="btn btn-small btn-primary" href="{{ URL::action('AdminController@create') }}">
       Yeni Admin Oluştur <span class='img-loader hide'></span> 
    </a>
    <br>
    <br> 
    {{ $admins->links() }}
    <div class="bs-example table-responsive">
      <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr> 
                <th>#</th>
                <th>Kullanıcı Adı</th>
                <th>İsim</th>
                <th>Soyisim</th>
                <th>Email</th>
                <th>İşlem</th> 
            </tr>
        </thead>
        <tbody>
        @foreach($admins as $admin)
            <!--  
               $url = action('HomeController@getIndex', $params); 
               echo link_to('foo/bar', $title, $attributes = array(), $secure = null);
               echo link_to_route('route.name', $title, $parameters = array(), $attributes = array());
               echo link_to_action('HomeController@getIndex', $title, $parameters = array(), $attributes = array());
               echo secure_url('foo/bar', $parameters = array());
               echo url('foo/bar', $parameters = array(), $secure = null);
            -->
            <tr>
                <td> {{ $admin->id }} </td>
                <td> {{ $admin->username}} </td>
                <td> {{ $admin->name}} </td>
                <td> {{ $admin->surname}} </td>
                <td> {{ $admin->email}} </td>
                <td>
                   
                    <!-- delete the admin (uses the destroy method DESTROY /admin/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->
                    <a class="btn btn-small btn-danger wd-15" data-toggle="modal" href="#deleteAdmin-{{$admin->id}}">Yöneticiyi Sil <i class='fa fa-trash-o' ></i> 
                    </a>

                    <!-- show the nerd (uses the show method found at GET /admin/{id} -->
                    <a class="btn btn-small btn-success wd-15" href="{{ URL::action('AdminController@show' , $admin->id) }}">Göster <i class='fa fa-info' ></i> 
                      <span class='img-loader hide'></span> 
                    </a>

                    <!-- edit this nerd (uses the edit method found at GET /admin/{id}/edit -->
                    <a class="btn btn-small btn-info wd-15" href="{{ URL::action('AdminController@edit' , $admin->id ) }}">Düzenle <i class='fa fa-pencil' ></i> 
                      <span class='img-loader hide'></span>  
                    </a>


                    <!-- Modal -->
                    <div class="modal fade" id="deleteAdmin-{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                          <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h4 class="modal-title" id="myModalLabel">
                              <span style="color:red;" class="glyphicon glyphicon-warning-sign"></span> Silme Onayı    
                           </h4>
                            </div>
                            <div class="modal-body"> 
                              <strong>{{ $admin->username }}</strong>  isimli yöneticiyi silmek istediğinize emin misiniz?
                            </div>
                            <div class="modal-footer">
                              <div id="delmodelcontainer" style="float:right">

                                    <div id="yes" style="float:left; padding-right:10px">
                                            {{ Form::open(array('action' => array('AdminController@destroy', $admin->id), 'method' => 'DELETE')) }}
                                                {{Form::submit('Evet', array('class' => 'btn btn-primary'))}}
                                            {{ Form::close() }}
                                    </div> <!-- end yes -->  

                                    <div id="no" style="float:left;"> 
                                                <button type="button" class="btn btn-defualt" data-dismiss="modal">Hayır</button>    
                                    </div><!-- end no --> 
                                </div> <!-- end delmodelcontainer --> 
                            </div>
                          </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                
                </td>

   

            </tr>
        @endforeach
       </tbody> 
      </table> 
    </div>
    {{ $admins->links() }}
  </div>

 
@stop