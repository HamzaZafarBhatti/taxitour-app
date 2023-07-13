<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Web\BaseController;
use App\Models\AdminBankAccounts;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Base\Filters\Master\CommonMasterFilter;
use Illuminate\Http\Request;

class AdminBankAccountsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $page = trans('pages_names.wallet_bank_accounts');

        $main_menu = 'wallet_bank_accounts';
        $sub_menu = null;

        return view('admin.wallet_accounts.index', compact('page', 'main_menu', 'sub_menu'));
    }

    public function getAllAccounts(QueryFilterContract $queryFilter)
    {
        $url = request()->fullUrl(); //get full url

        $query = AdminBankAccounts::query();

        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();

        return view('admin.wallet_accounts._partial', compact('results'));
    }
}
