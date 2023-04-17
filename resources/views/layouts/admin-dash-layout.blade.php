<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ url('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ url('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('plugins/summernote/summernote-bs4.min.css') }}">

    <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel=" stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ url('plugins/ekko-lightbox/ekko-lightbox.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/select2/css/select2.min.css') }}">

    <style>
        .image-upload {
            position: relative;
            max-width: 360px;
            margin: 0 auto;
            overflow: hidden;
        }

        .image-upload input {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            opacity: 0;
        }

        .upload-field {
            display: block;
            background: #F4FAFE;
            padding: 12px;
            border-radius: 11px;

        }

        .upload-field .file-thumbnail {
            cursor: pointer;
            border: 1px dashed #BBD9EC;
            border-radius: 11px;
            text-align: center;
            padding: 20px;
        }

        .upload-field .file-thumbnail img {
            width: 100px;
        }

        .upload-field .file-thumbnail h3 {
            font-size: 12px;
            color: #000000;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .upload-field .file-thumbnail p {
            font-size: 12px;
            color: #9ABCD1;
            margin-bottom: 0;
        }

        .select2-selection--single {
            height: 36px !important;
        }


        table.dataTable span.highlight {
            background-color: #FFFF88;
        }

        .showAll {
            cursor: pointer;
        }

        .select2-container {
            width: 197px !important;
        }
    </style>


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ url('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
                height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();"
                        style="margin-top:3px">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ auth()->user()->role == 0 ? url('/home?status=pending') : url('/home?status=confirmed') }}"
                class="brand-link">
                <img src="{{ url('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Dashboard</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ url('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ auth()->user()->role == 0 ? url('/ebay?status=pending') : url('/ebay?status=confirmed') }}"
                                class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Angebote
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ auth()->user()->role == 0 ? url('/freelancer?status=pending') : url('/freelancer?status=confirmed') }}"
                                class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Kunden
                                </p>
                            </a>
                        </li>
                        @if (auth()->user()->role == 0)
                            <li class="nav-item">
                                <a href="{{ url('/indeed?status=pending') }}" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Kleinanzeigen
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/indeed?status=pending') }}" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Indeed
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('/add-user') }}" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Add User
                                    </p>
                                </a>
                            </li>
                        @endif


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>


    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2023 <a
                href="{{ auth()->user()->role == 0 ? url('/home?status=pending') : url('/home?status=confirmed') }}">Dashboard</a>.</strong>
        All rights reserved.

    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- ./wrapper -->


    <!-- jQuery -->
    <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ url('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ url('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ url('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ url('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ url('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ url('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ url('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ url('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ url('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    {{-- <script src="{{ url('dist/js/adminlte.js"></script> --}}
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ url('dist/js/demo.js"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ url('dist/js/pages/dashboard.js') }}"></script>

    <script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ url('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ url('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('dist/js/adminlte.min.js') }}"></script>
    <script src="{{ url('plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
    <script src="{{ url('plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.11/features/searchHighlight/dataTables.searchHighlight.min.js">
    </script>

    <script>
        $(document).ready(function() {
            $("#example1").DataTable({
                "autoWidth": false,
                "order": [],
                "language": {
                    "decimal": ",",

                },
                "searchHighlight": true,
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            })

            $('#example2').DataTable({
                "autoWidth": false,
                "order": [],
                "language": {
                    "decimal": ",",

                },
                "searchHighlight": true,
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            });
            $('#example3').DataTable({
                "autoWidth": false,
                "order": [],
                "language": {
                    "decimal": ",",

                },
                "searchHighlight": true,
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            });
            $('#example4').DataTable({
                "autoWidth": false,
                "order": [],
                "language": {
                    "decimal": ",",

                },
                "searchHighlight": true,
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            });
        })
        $("#state").select2({
            tags: true,
            searchInputPlaceholder: 'Farbe hinzufügen'
        });
        $(document).on('click', ".select2-container--default", function() {

            $(".select2-search__field[aria-controls='select2-state-results']").attr("placeholder",
                "Farbe hinzufügen");
        })

        $(".state").select2({
            tags: true
        });


        $("#btn-add-state").on("click", function() {
            var newStateVal = $("#new-state").val();
            // Set the value, creating a new option if necessary
            if ($("#state").find("option[value=" + newStateVal + "]").length) {
                $("#state").val(newStateVal).trigger("change");
                alert(newStateVal)
            } else {
                // Create the DOM option that is pre-selected by default
                var newState = new Option(newStateVal, newStateVal, true, true);
                // Append it to the select
                alert(newState)
                $("#state").append(newState).trigger('change');
            }
        });

        // $("#state").change(function(){
        //   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        //     $.ajax({
        //                 /* the route pointing to the post function */
        //                 url: 'adddropdown',
        //                 type: 'POST',
        //                 /* send the csrf-token and the input to the controller */
        //                 data: {_token: CSRF_TOKEN, message:$(this).val()},
        //                 dataType: 'JSON',
        //                 /* remind that 'data' is the response of the AjaxController */
        //                 success: function (data) {
        //                     console.log(data)
        //                 }
        //             });
        // })
        $(".add").click(function() {
            $(".append").append(
                '<div class="row col-md-12 rows"><div class="col-md-8"><div class="form-group"> <label for="image1">Foto 1</label><div class="input-group"><div class="custom-file"><input name="image[]" type="file" class="form-control" id="image1"></div></div></div></div><div class="col-sm-3" style="margin-top:33px"><a class="remove btn btn-danger"><i class="fa fa-trash"></i></a></div></div>'
            );
        });


        $(".showAll").click(function() {
            var gallery = "";
            var images = $(this).data("value");

            $("." + images).children(".galleryImages").each(function() {
                var image = $(this).attr("href");
                gallery += `<div class="card col col-md-4">
                            <img src="` + image + `" class="card-img-top">
                          </div>`;
            });
            $(".modal-title").html($(this).data("title") + " all Images")
            $(".gallery").html(gallery)
        })
        $(document).on("click", ".remove", function() {
            $(this).parents('.rows').remove();
        })


        function fileValue(value) {
            var path = value.value;
            console.log(value.files[0]);
            cl = value.getAttribute('data-img');
            name = value.getAttribute('data-name');
            var extenstion = path.split('.').pop();
            if (extenstion == "jpg" || extenstion == "svg" || extenstion == "jpeg" || extenstion == "png" || extenstion ==
                "gif") {


                document.getElementById(cl).src = window.URL.createObjectURL(value.files[0]);
                var filename = path.replace(/^.*[\\\/]/, '').split('.').slice(0, -1).join('.');
                document.getElementById(name).innerHTML = filename;
            } else {
                alert("File not supported. Kindly Upload the Image of below given extension ")
            }
        }

        $(".deleteImage").click(function() {

            $("." + $(this).data("old")).val("")
            $(".image" + $(this).data("value")).attr("src", "")
            $(".imageInput" + $(this).data("value")).val("src", "")

        })


        jQuery.extend({
            highlight: function(node, re, nodeName, className) {
                if (node.nodeType === 3) {
                    var match = node.data.match(re);
                    if (match) {
                        var highlight = document.createElement(nodeName || 'span');
                        highlight.className = className || 'highlight';
                        var wordNode = node.splitText(match.index);
                        wordNode.splitText(match[0].length);
                        var wordClone = wordNode.cloneNode(true);
                        highlight.appendChild(wordClone);
                        wordNode.parentNode.replaceChild(highlight, wordNode);
                        return 1; //skip added node in parent
                    }
                } else if ((node.nodeType === 1 && node.childNodes) && // only element nodes that have children
                    !/(script|style)/i.test(node.tagName) && // ignore script and style nodes
                    !(node.tagName === nodeName.toUpperCase() && node.className === className)
                ) { // skip if already highlighted
                    for (var i = 0; i < node.childNodes.length; i++) {
                        i += jQuery.highlight(node.childNodes[i], re, nodeName, className);
                    }
                }
                return 0;
            }
        });

        jQuery.fn.unhighlight = function(options) {
            var settings = {
                className: 'highlight',
                element: 'span'
            };
            jQuery.extend(settings, options);

            return this.find(settings.element + "." + settings.className).each(function() {
                var parent = this.parentNode;
                parent.replaceChild(this.firstChild, this);
                parent.normalize();
            }).end();
        };

        jQuery.fn.highlight = function(words, options) {
            var settings = {
                className: 'highlight',
                element: 'span',
                caseSensitive: false,
                wordsOnly: false
            };
            jQuery.extend(settings, options);

            if (words.constructor === String) {
                words = [words];
            }
            words = jQuery.grep(words, function(word, i) {
                return word != '';
            });
            words = jQuery.map(words, function(word, i) {
                return word.replace(/[-[\]{}()*+?.,\\^$|#\s]/g, "\\$&");
            });
            if (words.length == 0) {
                return this;
            };

            var flag = settings.caseSensitive ? "" : "i";
            var pattern = "(" + words.join("|") + ")";
            if (settings.wordsOnly) {
                pattern = "\\b" + pattern + "\\b";
            }
            var re = new RegExp(pattern, flag);

            return this.each(function() {
                jQuery.highlight(this, re, settings.element, settings.className);
            });
        };


        $(function() {

            $(".sorting").click(function() {
                var order = $(this).attr('aria-sort');
                var column = $(this).attr('aria-label').split(':');
                column = column[0];

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    /* the route pointing to the post function */
                    url: 'usersort',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {
                        _token: CSRF_TOKEN,
                        order: order,
                        column: column
                    },
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function(data) {
                        console.log(data)
                    }
                });

            })

            $(".select2").change(function() {

                var color = $(".select2-search__field").val();
                var type = $(".select2-search__field").attr('aria-controls').split("-");
                type = type[1];

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    /* the route pointing to the post function */
                    url: 'add-color',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {
                        _token: CSRF_TOKEN,
                        name: color,
                        type: type
                    },
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function(data) {
                        console.log(data)
                    }
                });

            })

            $(".delete").click(function() {
                var id = $(this).data("id");
                var color = $(this).data("color");

                if (confirm('Are you sure you want to delete this color?')) {
                    $.get("/lagerverwaltung/delete-color/" + id, {
                        id: id
                    }, function(data) {
                        $(".color" + id).css("display", "none");
                        $("#select2-state-result-shtn-" + color).css("display", "none");
                        $('li:contains("' + color + '")').css('display', 'none');
                    })
                } else {}
            })
        });

        $(function() {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.filter-container').filterizr({
                gutterPixels: 3
            });
            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        })
    </script>
</body>

</html>
