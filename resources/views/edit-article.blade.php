@extends('layouts.admin-dash-layout')

@section('content')

    <div class="container" style="margin-top:40px">

        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Artikel bearbeiten</h3>
                </div>
                <!-- /.card-header -->

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- form start -->


                <form action="{{ route('update-article') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" value="{{ @$articleData->status }}" name="queryParam" />
                            <label for="exampleInputEmail1"> Title</label>
                            <input type="hidden" class="form-control" value="{{ @$articleData->id }}"
                                id="exampleInputEmail1" name="id" placeholder="Enter Title" />
                            <input type="text" class="form-control" value="{{ @$articleData->title }}" id=""
                                name="title" placeholder="Enter Title" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea class="form-control" id="exampleInputPassword1" name="description">{{ @$articleData->description }}</textarea>
                        </div>


                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>URL</label>
                                    <input type="text" name="url" value="{{ @$articleData->url }}"
                                        class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" name="location" value="{{ @$articleData->location }}"
                                        class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ @$articleData->name }}"
                                        class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{ @$articleData->email }}"
                                        class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telefon</label>
                                    <input type="text" name="telefon" value="{{ @$articleData->telefon }}"
                                        class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Webseite</label>
                                    <input type="text" name="webseite" value="{{ @$articleData->webseite }}"
                                        class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Ansprechpartner</label>
                                    <input type="text" name="ansprechpartner"
                                        value="{{ @$articleData->ansprechpartner }}" class="form-control"
                                        placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nr</label>
                                    <input type="text" name="nr" value="{{ @$articleData->nr }}"
                                        class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Plz</label>
                                    <input type="text" name="plz" value="{{ @$articleData->plz }}"
                                        class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Ort</label>
                                    <input type="text" name="ort" value="{{ @$articleData->ort }}"
                                        class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Hr./Fr</label>
                                    <select class="form-control" name="hrfr">
                                        <option value="0" selected disabled></option>
                                        <option value="herr" @if ($articleData->hrfr == 'herr') selected @endif>
                                            Herr
                                        </option>
                                        <option value="frau" @if ($articleData->hrfr == 'frau') selected @endif>
                                            Frau
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Datum(m-d-y)</label>
                                        <input type="date" name="datum" value="{{ @$articleData->datum }}"
                                            class="form-control datepicker" placeholder="Enter ...">
                                    </div>
                                </div>

                                <div class=" row ">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>File 1</label>
                                            <input type="file" name="file1" value="" class="form-control"
                                                placeholder="Enter ...">
                                            <image class="h-50 w-50" src="{{ asset($articleData->file1) }}"></image>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>File 2</label>
                                            <input type="file" name="file2" value="" class="form-control"
                                                placeholder="Enter ...">
                                            <image class="h-50 w-50" src="{{ asset(@$articleData->file2) }}"
                                                alt="no image"></image>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>File 3</label>
                                            <input type="file" name="file3" value="" class="form-control"
                                                placeholder="Enter ...">
                                            <image class="h-50 w-50" src="{{ asset(@$articleData->file3) }}"
                                                alt="no image"></image>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                </form>
            </div>
            <!-- /.card -->
        </div>

    </div>





@endsection
