<table id="" class="table table-responsive table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Firma</th>
            <th>Hr./Fr</th>
            <th>Kontakt</th>
            <th>Telephone</th>
            <th>Email</th>
            <th>Straße</th>
            <th>Nr.</th>
            <th>Plz</th>
            <th>Ort</th>
            <th>URL</th>
            <th>Status</th>
            <th>Datum(m-d-y)</th>
            <th style="width: 500px">Beschreibung</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="pending">
        @foreach ($articleData as $article)
            <tr id="row_{{ $article->id }}">
                <td class="block">{{ $article->id }}</td>
                <td class="block">
                    <div style="width: 100px">
                        <p>{{ $article->title }}</p>
                    </div>
                </td>
                <td class="block">{{ $article->name }}</td>
                <td class="block">

                    <div style="width: 100px">
                        <select class="form-control" name="hrfr" onchange='changeHrFr(this ,"{{ $article->id }}")'>
                            <option value="0" selected disabled></option>
                            <option value="herr" @if ($article->hrfr == 'herr') selected @endif>
                                Herr
                            </option>
                            <option value="frau" @if ($article->hrfr == 'frau') selected @endif>
                                Frau
                            </option>
                        </select>
                    </div>
                </td>
                <td>{{ $article->ansprechpartner }}</td>
                <td>{{ $article->telefon }}</td>
                <td>{{ $article->email }}</td>
                <td>{{ $article->location }}</td>
                <td>
                    <div style="width: 100px">
                        {{ $article->nr }}
                    </div>
                </td>
                <td>
                    <div style="width: 100px">
                        {{ $article->plz }}
                    </div>
                </td>
                <td>
                    <div style="width: 100px">
                        {{ $article->ort }}
                    </div>
                </td>
                <td>
                    {{-- <a href="{{ $article->url }}" target="_blank">{{ $article->url }}</a> --}}
                    <p style="cursor:pointer;color:blue" onclick='redirectURl("{{ $article->url }}")'>
                        {{ $article->url }}</a>
                </td>



                @php
                    
                    $color = '';
                    $bg = '';
                    if ($article->type_status == 'wartet') {
                        $bg = '#FDE7E5';
                        $color = 'red';
                    } elseif ($article->type_status == 'webseite_angebot') {
                        $bg = '#E7ECE6';
                        $color = 'green';
                    } elseif ($article->type_status == 'shop_angebot') {
                        $bg = '#E7ECE6';
                        $color = 'green';
                    } elseif ($article->type_status == 'sonstiges_angebot') {
                        $bg = '#E7ECE6';
                        $color = 'green';
                    } elseif ($article->type_status == 'telefontermin') {
                        $bg = '#E4E7FD';
                        $color = 'blue';
                    } elseif ($article->type_status == 'kein_interesse') {
                        $bg = '#8080807a';
                        $color = 'grey';
                    }
                @endphp
                <td style="@if ($color) background-color:{{ $bg }} @endif"
                    id="type_status_row_{{ $article->id }}">

                    <select class="form-control" name="type_status" id="type_status_{{ $article->id }}"
                        style="@if ($color) background-color:{{ $color }}; color: white; @endif  width: 180px "
                        onchange='changeTypeStatus(this,"{{ $article->id }}")'>
                        <option value="0" selected disabled class="text-white"></option>
                        <option class="@if ($color) text-white @endif" value="wartet"
                            @if ($article->type_status == 'wartet') selected @endif>
                            Wartet
                        </option>
                        <option class="@if ($color) text-white @endif" value="webseite_angebot"
                            @if ($article->type_status == 'webseite_angebot') selected @endif>
                            Webseite Angebot
                        </option>
                        <option class="@if ($color) text-white @endif" value="shop_angebot"
                            @if ($article->type_status == 'shop_angebot') selected @endif>
                            Shop Angebot
                        </option>
                        <option class="@if ($color) text-white @endif" value="sonstiges_angebot"
                            @if ($article->type_status == 'sonstiges_angebot') selected @endif>
                            Sonstiges Angebot
                        </option>
                        <option class="@if ($color) text-white @endif" value="telefontermin"
                            @if ($article->type_status == 'telefontermin') selected @endif>
                            Telefontermin
                        </option>
                        <option class="@if ($color) text-white @endif" value="kein_interesse"
                            @if ($article->type_status == 'kein_interesse') selected @endif>
                            Kein Interesse
                        </option>
                    </select>
                </td>
                <td><input type="date" name="datum" value="{{ @$article->datum }}" class="form-control"
                        onchange="changeDate(this,  '{{ $article->id }}')"></td>
                <td class="block">
                    <div style="width: 250px">
                        <p id="copy_{{ $article->id }}">
                            {{ Str::words($article->description, 38) }}
                        </p>
                    </div>
                    @if ($article->description !== null)
                        <div class="mt-1 row" id="buttons_{{ $article->id }}">
                            <div class="col-4">
                                <button type="button" title="View" class="btn btn-primary" data-toggle="modal"
                                    data-target="#descriptionModal{{ $article->id }}">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                            <div class="col-4">
                                <button title="Copy Text" class="btn btn-info"
                                    onclick='copyToClipboard(  "{{ $article->description }}" )'>
                                    <i class="far fa-copy"></i>
                                </button>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-danger" title="Delete text"
                                    onclick='deleteDescription(  "{{ $article->id }}")'>
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>

                        </div>
                    @endif
                    <!-- Modal -->
                    <div class="modal fade" id="descriptionModal{{ $article->id }}" tabindex="-1"
                        aria-labelledby="descriptionModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="descriptionModalLabel">
                                        Description</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{ $article->description }}
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div style="width: 200px">
                        <div class="d-flex justify-content-between">
                            @php($changedStatus = 'pending')

                            @if ($article->status == 'pending')
                                @php($changedStatus = 'confirmed')
                            @elseif($article->status == 'confirmed')
                                @php($changedStatus = 'interest')
                            @endif

                            @if ($article->status == 'pending' || $article->status == 'confirmed')
                                <button class="btn btn-success"
                                    onclick="statusChange( '{{ $article->id }}' , '{{ $changedStatus }}')">
                                    <i class="fas fa-check"></i></button>
                            @endif
                            @php($editUrl = 'edit-article-data')
                            @if (request()->route()->uri == 'freelancer')
                                @php($editUrl = 'edit-freelancer-data')
                            @elseif(request()->route()->uri == 'indeed')
                                @php($editUrl = 'edit-indeed-data')
                            @endif
                            <a class="btn btn-warning" href="{{ route($editUrl, $article->id) }}"><i
                                    class="far fa-edit"></i></a>
                            <button class="btn btn-danger" onclick="statusChange( '{{ $article->id }}' ,'deleted')">
                                <i class="fas fa-trash-alt"></i></button>
                        </div>
                        <div class="mt-2">
                            @if (auth()->user()->role == 0)
                                <select class="form-control" name="users"
                                    onchange='assignArticle(this,"{{ $article->id }}")'>
                                    <option value="0" selected disabled>Assign Manager</option>
                                    @foreach (@$users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach

    </tbody>

</table>
<div class="row">
    <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
        {{ @$articleData->links('pagination::bootstrap-4') }}
    </div>
</div>
