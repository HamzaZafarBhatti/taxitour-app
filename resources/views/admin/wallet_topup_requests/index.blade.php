@extends('admin.layouts.app')

@section('title', 'Admin')

@section('content')
    <style>
        .demo-radio-button label {
            min-width: 100px;
            margin: 0 0 5px 50px;
        }
    </style>
    <!-- Start Page content -->
    <section class="content">
        {{-- <div class="container-fluid"> --}}

        <div class="row">
            <div class="col-12">
                <div class="box">

                    <div class="box-header with-border">
                        <div class="row text-right">

                            <div class="col-8 col-md-3">
                                <div class="form-group">
                                    <input type="text" id="search_keyword" name="search" class="form-control"
                                        placeholder="@lang('view_pages.enter_keyword')">
                                </div>
                            </div>

                            <div class="col-4 col-md-2 text-left">
                                <button id="search" class="btn btn-success btn-outline btn-sm py-2" type="submit">
                                    @lang('view_pages.search')
                                </button>
                            </div>

                            @if (auth()->user()->can('add-admin'))
                                <div class="col-md-7 text-center text-md-right">
                                    <a href="{{ url('wallet_topup_requests/create') }}" class="btn btn-primary btn-sm">
                                        <i class="mdi mdi-plus-circle mr-2"></i>@lang('view_pages.add_admin')</a>
                                    <!--  <a class="btn btn-danger">
                                        Export</a> -->
                                </div>
                            @endif

                        </div>


                    </div>

                    <div id="js-admin-partial-target">
                        <include-fragment src="wallet_topup_requests/fetch">
                            <span style="text-align: center;font-weight: bold;">@lang('view_pages.loading')</span>
                        </include-fragment>
                    </div>

                </div>
            </div>
        </div>

        <script src="{{ asset('assets/js/fetchdata.min.js') }}"></script>
        <script>
            var search_keyword = '';
            $(function() {
                $('body').on('click', '.pagination a', function(e) {
                    e.preventDefault();
                    var url = $(this).attr('href');
                    $.get(url, $('#search').serialize(), function(data) {
                        $('#js-admin-partial-target').html(data);
                    });
                });
                $('#search').on('click', function(e) {
                    e.preventDefault();
                    search_keyword = $('#search_keyword').val();
                    console.log(search_keyword);
                    fetch('wallet_topup_requests/fetch?search=' + search_keyword)
                        .then(response => response.text())
                        .then(html => {
                            document.querySelector('#js-admin-partial-target').innerHTML = html
                        });
                });
            });
        </script>

    @endsection
