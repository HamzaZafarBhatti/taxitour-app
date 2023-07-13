<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\AdminBankAccounts;
use Illuminate\Http\Request;

class AdminBankAccountsController extends Controller
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
        $accounts = AdminBankAccounts::all();

        return view('admin.wallet_accounts.index', compact('page', 'main_menu', 'sub_menu', 'accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminBankAccounts  $adminBankAccounts
     * @return \Illuminate\Http\Response
     */
    public function show(AdminBankAccounts $adminBankAccounts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminBankAccounts  $adminBankAccounts
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminBankAccounts $adminBankAccounts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminBankAccounts  $adminBankAccounts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminBankAccounts $adminBankAccounts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminBankAccounts  $adminBankAccounts
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminBankAccounts $adminBankAccounts)
    {
        //
    }
}
