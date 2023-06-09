<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Web\BaseController;
use App\Models\AdminBankAccounts;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Base\Filters\Master\CommonMasterFilter;
use App\Enum\AdminBankAccountsAccountForEnum;
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
    /**
     * Create Admins View
     *
     */
    public function create()
    {
        $page = trans('pages_names.add_wallet_bank_accounts');

        $account_fors = AdminBankAccountsAccountForEnum::cases();

        $main_menu = 'admin';
        $sub_menu = null;

        return view('admin.wallet_accounts.create', compact('page', 'main_menu', 'sub_menu', 'account_fors'));
    }

    /**
     * Store admin.
     *
     * @param \App\Http\Requests\Admin\Driver\CreateDriverRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'account_for' => 'required',
            'name' => 'required',
            'id_number' => 'required',
            'bank_name' => 'required',
            'account_number' => 'required',
        ]);
        if (env('APP_FOR') == 'demo') {
            $message = trans('succes_messages.you_are_not_authorised');

            return redirect('wallet_bank_accounts')->with('warning', $message);
        }

        AdminBankAccounts::create($data);

        $message = trans('succes_messages.wallet_added_succesfully');
        return redirect('wallet_bank_accounts')->with('success', $message);
    }
    public function getById($id)
    {
        $account_fors = AdminBankAccountsAccountForEnum::cases();

        $item = AdminBankAccounts::findOrFail($id);

        $page = trans('pages_names.edit_wallet_bank_accounts');

        $main_menu = 'admins';
        $sub_menu = null;

        return view('admin.wallet_accounts.update', compact('item', 'page', 'main_menu', 'sub_menu', 'account_fors'));
    }

    public function update($id, Request $request)
    {
        $item = AdminBankAccounts::findOrFail($id);
        $data = $request->validate([
            'account_for' => 'required',
            'name' => 'required',
            'id_number' => 'required',
            'bank_name' => 'required',
            'account_number' => 'required',
        ]);

        if (env('APP_FOR') == 'demo') {
            $message = trans('succes_messages.you_are_not_authorised');
            return redirect('wallet_bank_accounts')->with('warning', $message);
        }


        $item->update($data);

        $message = trans('succes_messages.wallet_updated_succesfully');
        return redirect('wallet_bank_accounts')->with('success', $message);
    }
    public function delete($id)
    {
        $item = AdminBankAccounts::findOrFail($id);
        if (env('APP_FOR') == 'demo') {
            $message = trans('succes_messages.you_are_not_authorised');
            return $message;
        }

        $item->delete();

        $message = trans('succes_messages.wallet_deleted_succesfully');
        return $message;
        // return redirect('admins')->with('success', $message);
    }
}
