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

        $item = AdminBankAccounts::findOrFail($id);

        $page = trans('pages_names.edit_wallet_bank_accounts');

        $main_menu = 'admins';
        $sub_menu = null;

        return view('admin.wallet_accounts.update', compact('item', 'page', 'main_menu', 'sub_menu'));
    }

    public function update($id, Request $request)
    {
        $data = $request->validate([
            'account_for' => 'required',
            'name' => 'required',
            'id_number' => 'required',
            'bank_name' => 'required',
            'account_number' => 'required',
        ]);

        return $data;

        if (env('APP_FOR') == 'demo') {
            $message = trans('succes_messages.you_are_not_authorised');

            return redirect('admins')->with('warning', $message);
        }

        $updatedParams = $request->only(['service_location_id', 'first_name', 'mobile', 'email', 'address', 'state', 'city', 'country']);
        $updatedParams['pincode'] = $request->postal_code;


        $updated_user_params = [
            'name' => $request->input('first_name') . ' ' . $request->input('last_name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'password' => bcrypt($request->input('password'))
        ];

        if ($uploadedFile = $this->getValidatedUpload('profile_picture', $request)) {
            $updated_user_params['profile_picture'] = $this->imageUploader->file($uploadedFile)
                ->saveProfilePicture();
        }

        $admin->user->update($updated_user_params);

        $admin->user->roles()->detach();

        $admin->user->attachRole($request->role);

        $admin->update($updatedParams);

        $message = trans('succes_messages.admin_updated_succesfully');
        return redirect('admins')->with('success', $message);
    }
    public function delete(User $user)
    {
        if (env('APP_FOR') == 'demo') {

            $message = 'you cannot perform this action due to demo version';

            return $message;
        }
        $user->delete();

        $message = trans('succes_messages.admin_deleted_succesfully');

        return $message;
        // return redirect('admins')->with('success', $message);
    }
}
