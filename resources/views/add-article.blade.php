@extends('layouts.admin-dash-layout')

@section('content')

<div class="container" style="margin-top:40px">

<div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Artikel erstellen</h3>
              </div>
              <!-- /.card-header -->

               @if ($errors->any())
        <div class="alert alert-danger">
          <strong>Huch!</strong> Es gab einige Probleme mit Ihrer Eingabe<br><br>
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

          @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif
              <!-- form start -->
             <form action="{{url('article-form')}}" method="POST" enctype="multipart/form-data">
          @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1"> Überschrift</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Enter Title">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Beschreibung</label>
                    <textarea class="form-control" id="exampleInputPassword1" name="description"></textarea>
                  </div>


                  <div class="row">
                    <div class="col-sm-6 d-none">
                      <!-- text input -->
                      <div class="form-group">
                        <label>ID</label>
                       <input type="text" name="ids" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Artikelnummer</label>
                        <input type="text" name="artikelnummer" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>

                     <div class="col-sm-12">
                      <div class="form-group">
                        <label>Barcode</label>
                        <input type="text" name="barcode" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                  
                     
                  </div>




                  <div class="row">
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Farbe</label><br>
                      <select class="select2 js-example-basic-single form-control state" name="farbe" type="text" style="width:90%">
                           @foreach($color as $col)
                            @if($col->type == "farbe")
                          <option class="color{{$col->id}}">{{$col->name}}</option>
                          @endif
                          @endforeach
                      </select>
                       <a data-toggle="modal" data-target="#colorModal"><i class="fas fa-edit"></i></a>
                    </div>
                  </div>

                      <div class="col-sm-3">
                      <div class="form-group">
                        <label>Gebraucht</label>
                        <select name="gebraucht" class="form-control">
                          <option>Ja</option>
                          <option>Nein</option>
                          
                        </select>
                      </div>
                    </div>

                   <div class="col-sm-2"></div>
                    <div class="col-sm-3"></div>

                     <div class="col-sm-3">
                      <div class="form-group">
                        <label>Höhe cm</label>
                        <input type="text" name="hohe" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>

                     <div class="col-sm-3">
                      <div class="form-group">
                        <label>Breite cm</label>
                        <input type="text" name="size" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>

                     <div class="col-sm-3">
                      <div class="form-group">
                        <label>Länge cm</label>
                        <input type="text" name="tiefe" class="form-control" placeholder="Enter Länge">
                      </div>
                    </div>
                    

                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Gewicht kg</label>
                        <input type="text" name="gewicht" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                     

                  </div>

                    <div class="row">
                  

                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Einzel-Versandart</label>
                        <select name="einzel_versandart" class="select2 js-example-basic-single form-control state">
                          @foreach($color as $col)
                            @if($col->type == "einzel_versandart")
                          <option class="color{{$col->id}}">{{$col->name}}</option>
                          @endif
                          @endforeach
                        </select>
                         <a data-toggle="modal" data-target="#einzelModal"><i class="fas fa-edit"></i></a>
                      </div>
                    </div>

                      <div class="col-sm-3">
                      <div class="form-group">
                        <label>Menge</label>
                        <input type="text" name="menge" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>


                         <div class="col-sm-3">
                      <div class="form-group">
                        <label>Regal </label><br>
                        <select name="regal" class="select2 js-example-basic-single form-control state">
                           @foreach($color as $col)
                            @if($col->type == "regal")
                          <option class="color{{$col->id}}">{{$col->name}}</option>
                          @endif
                          @endforeach
                        </select>
                         <a data-toggle="modal" data-target="#regalModal"><i class="fas fa-edit"></i></a>
                      </div>
                    </div>


                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Fach</label>
                        <input name="fach" type="text" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                  
                  
                  
                  </div>

                   <div class="row">

                


                   
                  
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Lieferant</label>
                       <select name="lieferant" class="select2 js-example-basic-single form-control state">
                           @foreach($color as $col)
                            @if($col->type == "lieferant")
                          <option class="color{{$col->id}}">{{$col->name}}</option>
                          @endif
                          @endforeach
                        </select>
                         <a data-toggle="modal" data-target="#lieferantModal"><i class="fas fa-edit"></i></a>
                      </div>
                    </div>

                      <div class="col-sm-3">
                      <div class="form-group">
                        <label>VK-Preis</label>
                        <input type="text" name="VK_preis" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-sm-3 d-none">
                      <div class="form-group">
                        <label>Datum</label>
                        <input name="datum" type="datetime-local" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>

                     <div class="col-sm-3 d-none">
                      <div class="form-group">
                        <label>Uhrzeit</label>
                        <input name="uhrzeit" type="datetime-local" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>


                  </div>

                   <div class="row append">

                <div class="col-sm-8">
                  <div class="form-group">
                    <label for="image1">Foto 1</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="image[]" type="file" class="form-control" id="image1">
                      </div>
                    
                    </div>
                  </div>
                </div>
                <div class="col-sm-3" style="margin-top:33px">
                  <a class="add btn btn-warning">weiteres Foto</a>
                </div>

               
              </div>
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Erstellen</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


</div>

</div>


<div class="modal fade" id="colorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title " id="exampleModalLabel">Edit colors</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped">
          <thead>
            <th></th>
            <th></th>
          </thead>
          <tbody>
            @foreach($color as $col)
             @if($col->type == "farbe")
            <tr class="color{{$col->id}}">
            <td>{{$col->name}}</td>
            <td >
              <a class="delete"  data-color="{{$col->name}}" data-id="{{$col->id}}"><i class="fa fa-trash"></i></a>
              <a ><i class="fa fa-edit"></i></a>
            </td>
          </tr>
          @endif
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="colorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title " id="exampleModalLabel">Edit colors</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped">
          <thead>
            <th></th>
            <th></th>
          </thead>
          <tbody>
            @foreach($color as $col)
             @if($col->type == "farbe")
            <tr class="color{{$col->id}}">
            <td>{{$col->name}}</td>
            <td >
              <a class="delete"  data-color="{{$col->name}}" data-id="{{$col->id}}"><i class="fa fa-trash"></i></a>
              <a ><i class="fa fa-edit"></i></a>
            </td>
          </tr>
          @endif
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="einzelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title " id="exampleModalLabel">Edit colors</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped">
          <thead>
            <th></th>
            <th></th>
          </thead>
          <tbody>
            @foreach($color as $col)
             @if($col->type == "einzel_versandart")
            <tr class="color{{$col->id}}">
            <td>{{$col->name}}</td>
            <td >
              <a class="delete"  data-color="{{$col->name}}" data-id="{{$col->id}}"><i class="fa fa-trash"></i></a>
              <a ><i class="fa fa-edit"></i></a>
            </td>
          </tr>
          @endif
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="regalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title " id="exampleModalLabel">Edit colors</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped">
          <thead>
            <th></th>
            <th></th>
          </thead>
          <tbody>
            @foreach($color as $col)
             @if($col->type == "regal")
            <tr class="color{{$col->id}}">
            <td>{{$col->name}}</td>
            <td >
              <a class="delete"  data-color="{{$col->name}}" data-id="{{$col->id}}"><i class="fa fa-trash"></i></a>
              <a ><i class="fa fa-edit"></i></a>
            </td>
          </tr>
          @endif
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="lieferantModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title " id="exampleModalLabel">Edit colors</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped">
          <thead>
            <th></th>
            <th></th>
          </thead>
          <tbody>
            @foreach($color as $col)
             @if($col->type == "lieferant")
            <tr class="color{{$col->id}}">
            <td>{{$col->name}}</td>
            <td >
              <a class="delete"  data-color="{{$col->name}}" data-id="{{$col->id}}"><i class="fa fa-trash"></i></a>
              <a ><i class="fa fa-edit"></i></a>
            </td>
          </tr>
          @endif
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


@endsection
