@extends('admin.layouts.app')
@section('title', 'Main page')

@section('content')

    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">
            @if ($errors)
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            @endif
            <div class="row">
                <div class="col-sm-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <a href="{{ url('wallet_bank_accounts') }}">
                                <button class="btn btn-danger btn-sm pull-right" type="submit">
                                    <i class="mdi mdi-keyboard-backspace mr-2"></i>
                                    @lang('view_pages.back')
                                </button>
                            </a>
                        </div>
                        <div class="col-sm-12">
                            <form method="post" class="form-horizontal"
                                action="{{ url('wallet_bank_accounts/update, $item->id') }}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="account_for">@lang('view_pages.account_for')
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="account_for" id="account_for" class="form-control" required>
                                                <option value="" selected disabled>@lang('view_pages.select_account_for')</option>
                                                @foreach ($account_fors as $account_for)
                                                    <option value="{{ $account_for->value }}"
                                                        {{ old('account_for', $item->account_for->value) == $account_for->value ? 'selected' : '' }}>
                                                        {{ $account_for->getLabel() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">@lang('view_pages.account_name') <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="name" name="name"
                                                value="{{ old('name', $item->name) }}" required=""
                                                placeholder="@lang('view_pages.enter_account_name')">
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="id_number">@lang('view_pages.id_number') <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="id_number" name="id_number"
                                                value="{{ old('id_number', $item->id_number) }}" required=""
                                                placeholder="@lang('view_pages.enter_id_number')">
                                            <span class="text-danger">{{ $errors->first('id_number') }}</span>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="bank_name">@lang('view_pages.bank_name') <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="bank_name" name="bank_name"
                                                value="{{ old('bank_name', $item->bank_name) }}" required=""
                                                placeholder="@lang('view_pages.enter_bank_name')">
                                            <span class="text-danger">{{ $errors->first('bank_name') }}</span>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="account_number">@lang('view_pages.account_number') <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="account_number"
                                                name="account_number"
                                                value="{{ old('account_number', $item->account_number) }}" required=""
                                                placeholder="@lang('view_pages.enter_account_number')">
                                            <span class="text-danger">{{ $errors->first('account_number') }}</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-sm pull-right m-5" type="submit">
                                            @lang('view_pages.update')
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container -->
    </div>
    <!-- content -->

@endsection

<script></script>
