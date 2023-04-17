@extends('layouts.admin-dash-layout')

@section('content')
    <div class="container" style="margin-top:40px;max-width: 100%;">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex py-2">
            <div class="w-50">
                <form method="get" class="d-flex"
                    href="{{ route(Route::current()->getName(), ['status' => request()->query('status')]) }}">
                    {{-- <div class="position-relative me-5 mb-5"> --}}
                    <input type="text" data-kt-table-widget-4="search" class="form-control w-100 fs-7 ps-12"
                        placeholder="Search" name="keyword" id="keyword" value="{{ app('request')->input('keyword') }}">

                    <input type="hidden" class="form-control" name="order_by" id="hidden_order_by"
                        value="{{ $order_by == 'ASC' ? 'DESC' : 'ASC' }}">
                    <input type="hidden" class="form-control" name="status" value="{{ request()->query('status') }}">

                    {{-- </div> --}}
                    <button type="submit" class="btn btn-sm btn-primary ml-2" data-kt-menu-dismiss="true">Apply</button>
                </form>
            </div>
            <div class="w-50">
                <form method="get"
                    href="{{ route(Route::current()->getName(), ['status' => request()->query('status')]) }}">

                    <input type="hidden" class="form-control" name="order_by" id="order_by"
                        value="{{ $order_by == 'ASC' ? 'DESC' : 'ASC' }}">

                    <input type="hidden" class="form-control" name="status" value="{{ request()->query('status') }}">
                    <input type="hidden" name="keyword" id="hidden_keyword" value="{{ app('request')->input('keyword') }}">

                    <button type="submit" class="btn btn-sm btn-primary ml-2 py-2"
                        data-kt-menu-dismiss="true">{{ $order_by }}</button>
                </form>
            </div>
        </div>
        <div class="bs-example">
            <ul class="nav nav-tabs">
                @if (Auth::user()->role == 0)
                    <li class="nav-item">
                        <a href="{{ route(Route::current()->getName(), ['status' => 'pending']) }}"
                            class="nav-link  @if (request()->query('status') == 'pending' || request()->query('status') == null) active @endif">NEU</a>
                    </li>
                @endif
                @if (Auth::user()->role == 0 || Auth::user()->role == 1)
                    <li class="nav-item ">
                        <a href="{{ route(Route::current()->getName(), ['status' => 'confirmed']) }}"
                            class="nav-link @if (Auth::user()->role == 1 || request()->query('status') == 'confirmed') active @endif">WARTEND</a>
                    </li>
                @endif
                @if (Auth::user()->role == 0)
                    <li class="nav-item">
                        <a href="{{ route(Route::current()->getName(), ['status' => 'interest']) }}"
                            class="nav-link {{ request()->query('status') == 'interest' ? 'active' : '' }}">ERLEDIGT</a>
                    </li>
                @endif
                @if (Auth::user()->role == 0)
                    <li class="nav-item">
                        <a href="{{ route(Route::current()->getName(), ['status' => 'deleted']) }}"
                            class="nav-link {{ request()->query('status') == 'deleted' ? 'active' : '' }}">DELETED</a>
                    </li>
                @endif
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="pendingList">
                    <div class="card">
                        <div class="card-header">
                            <br>

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                        <!-- <a class="btn btn-info" style="width:150px;margin-left:10px;margin-top:10px;" href="/lagerverwaltung/add-article">Artikel erstellen</a> -->

                        <!-- /.card-header -->
                        <div class="card-body table-responsive" id="table_data">
                            @include('pagination_index')
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row gallery" id="descriptionContainer">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();

            var page = $(this).attr('href').split('page=')[1];

            fetch_data(page);

        });
        $(document).on('input', '#keyword', function() {

            document.querySelector('#hidden_keyword').value = this.value;
        });
        $(document).on('input', '#order_by', function() {

            document.querySelector('#hidden_order_by').value = this.value;
        });
    });

    function fetch_data(page) {
        let param = '{{ request()->get('status') }}'
        let url = '{{ route('indeed-pagination-index') }}?status=' + param + '&page=' + page;
        console.log(url);
        $.ajax({
            url: url,
            success: function(satwork) {
                $('#table_data').html(satwork);
            }
        });
    }


    const statusChange = (id, status) => {
        if (id) {
            var myformData = new FormData();
            myformData.append('status', status);
            myformData.append('id', id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "{{ route('edit-indeed-status') }}",
                data: myformData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    if (response) {
                        let row_id = `#row_${id}`;
                        let note = document.querySelector(row_id);
                        note.innerHTML = "";
                    }
                },
                error: function() {

                    alert("Error!");
                },
            });
        } else {}
    }


    function copyToClipboard(text) {
        navigator.clipboard.writeText(text);
        return;
    }


    const deleteDescription = (id) => {
        if (id) {
            var myformData = new FormData();
            myformData.append('description', '');
            myformData.append('id', id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "{{ route('delete-indeed-description') }}",
                data: myformData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    if (response) {
                        let row_id = `#copy_${id}`;
                        let note = document.querySelector(row_id);
                        note.innerHTML = "";

                        let row_buttons = `#buttons_${id}`;
                        let note1 = document.querySelector(row_buttons);
                        note1.innerHTML = ""
                    }
                },
                error: function(error) {
                    alert("Error!");
                },
            });
        } else {}
    }


    function showDescriptionModal(descriptionData) {

        // Show the modal and populate the description container with the description data
        const modal = document.getElementById("descriptionModal");
        const descriptionContainer = document.getElementById("descriptionContainer");
        descriptionContainer.innerHTML = descriptionData;
        modal.style.display = "block";

        // Close the modal when the user clicks the "x" button
        const closeButton = document.querySelector(".close");
        closeButton.onclick = function() {
            modal.style.display = "none";
        };

        // Close the modal when the user clicks anywhere outside of it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };
    }

    const changeHrFr = (e, id) => {
        if (e) {
            var myformData = new FormData();
            myformData.append('hrfr', e.value);
            myformData.append('table', 'indeed');
            myformData.append('id', id);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "{{ route('edit-hrfr-status') }}",
                data: myformData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {

                    if (response) {

                    }
                },
                error: function() {

                    alert("Error!");
                },
            });
        } else {}
    }

    const assignArticle = (e, id) => {
        if (e) {
            var myformData = new FormData();
            myformData.append('user_id', e.value);
            myformData.append('table', 'indeed');
            myformData.append('article_id', id);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "{{ route('assign-article') }}",
                data: myformData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {

                    if (response) {

                    }
                },
                error: function() {

                    alert("Error!");
                },
            });
        } else {}
    }

    const changeTypeStatus = (e, id) => {


        if (e) {
            var myformData = new FormData();
            myformData.append('type_status', e.value);
            myformData.append('table', 'indeed');
            myformData.append('id', id);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "{{ route('edit-type-status') }}",
                data: myformData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {

                    if (response) {
                        let color = '';
                        let bg = '';
                        if (e.value === 'wartet') {
                            bg = '#FDE7E5';
                            color = 'red';
                        } else if (e.value === 'webseite_angebot') {
                            bg = '#E7ECE6';
                            color = 'green';
                        } else if (e.value === 'shop_angebot') {
                            bg = '#E7ECE6';
                            color = 'green';
                        } else if (e.value === 'sonstiges_angebot') {
                            bg = '#E7ECE6';
                            color = 'green';
                        } else if (e.value === 'telefontermin') {
                            bg = '#E4E7FD';
                            color = 'blue';
                        } else if (e.value === 'kein_interesse') {
                            bg = '#8080807a';
                            color = 'grey';
                        }
                        let row_id = `#type_status_row_${id}`;
                        let note = document.querySelector(row_id);
                        note.style.backgroundColor = bg;
                        let option_id = `#type_status_${id}`;
                        let option = document.querySelector(option_id);
                        option.style.backgroundColor = color

                    }

                },
                error: function() {

                    alert("Error!");
                },
            });
        } else {}
    }

    const changeDate = (e, id) => {

        if (e) {
            var myformData = new FormData();
            myformData.append('datum', e.value);
            myformData.append('table', 'indeed');
            myformData.append('id', id);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "{{ route('edit-date') }}",
                data: myformData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {

                    if (response) {}
                },
                error: function() {

                    alert("Error!");
                },
            });
        } else {}
    }
</script>
