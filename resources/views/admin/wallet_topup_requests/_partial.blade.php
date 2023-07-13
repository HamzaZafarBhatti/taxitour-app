<div class="box-body no-padding">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th> @lang('view_pages.s_no')
                        <span style="float: right;">

                        </span>
                    </th>
                    <th> @lang('view_pages.user_name')/@lang('view_pages.driver_name')
                        <span style="float: right;">
                        </span>
                    </th>
                    <th> @lang('view_pages.amount')
                        <span style="float: right;">
                        </span>
                    </th>
                    <th> @lang('view_pages.ref_number')
                        <span style="float: right;">
                        </span>
                    </th>
                    <th> @lang('view_pages.account_name')
                        <span style="float: right;">
                        </span>
                    </th>
                    <th> @lang('view_pages.id_number')
                        <span style="float: right;">
                        </span>
                    </th>
                    <th> @lang('view_pages.bank_name')
                        <span style="float: right;">
                        </span>
                    </th>
                    <th> @lang('view_pages.account_number')
                        <span style="float: right;">
                        </span>
                    </th>
                    <th> @lang('view_pages.status')
                        <span style="float: right;">
                        </span>
                    </th>
                    <th> @lang('view_pages.action')
                        <span style="float: right;">
                        </span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (count($results) < 1)
                    <tr>
                        <td colspan="11">
                            <p id="no_data" class="lead no-data text-center">
                                <img src="{{ asset('assets/img/dark-data.svg') }}"
                                    style="width:150px;margin-top:25px;margin-bottom:25px;" alt="">
                            <h4 class="text-center" style="color:#333;font-size:25px;">@lang('view_pages.no_data_found')</h4>
                            </p>
                    </tr>
                @else
                    @php  $i= $results->firstItem(); @endphp

                    @foreach ($results as $key => $result)
                        <tr>
                            <td>{{ $i++ }} </td>
                            <td> {{ $result->user->name }}</td>
                            <td> {{ $result->amount }}</td>
                            <td> {{ $result->ref_number }}</td>
                            <td> {{ $result->account_name }}</td>
                            <td>{{ $result->id_number }}</td>
                            <td>{{ $result->bank_name }}</td>
                            <td>{{ $result->account_number }}</td>
                            <td>{{ $result->status->getLabel() }}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
                                </button>
                                <div class="dropdown-menu">
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="text-right">
            <span style="float:right">
                {{ $results->links() }}
            </span>
        </div>
    </div>
</div>
