<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use Illuminate\Http\Request;
use App\Base\Filters\Master\CommonMasterFilter;
use App\Http\Controllers\Web\BaseController;
use App\Models\WalletTopupRequest;

class WalletTopupRequestController extends BaseController
{
    //
    public function index()
    {
        //
        $page = trans('pages_names.wallet_topup_requests');

        $main_menu = 'wallet_topup_requests';
        $sub_menu = null;

        return view('admin.wallet_topup_requests.index', compact('page', 'main_menu', 'sub_menu'));
    }

    public function getAllRecords(QueryFilterContract $queryFilter)
    {
        $url = request()->fullUrl(); //get full url

        $query = WalletTopupRequest::query()->with('user');

        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();

        return view('admin.wallet_topup_requests._partial', compact('results'));
    }
}
