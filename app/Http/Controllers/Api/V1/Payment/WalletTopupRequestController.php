<?php

namespace App\Http\Controllers\Api\V1\Payment;

use App\Enum\WalletTopupStatusEnum;
use App\Models\WalletTopupRequest;
use App\Http\Controllers\Api\V1\BaseController;
use Illuminate\Http\Request;

class WalletTopupRequestController extends BaseController
{
    public function index()
    {
        //
        $records = WalletTopupRequest::where('user_id', auth()->user()->id)->latest()->get();

        return response()->json($records, 200);
    }

    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'amount' => 'required',
            'ref_number' => 'required',
            'account_number' => 'required',
            'id_number' => 'required',
            'bank_name' => 'required',
            'account_name' => 'required',
        ]);

        $data['status'] = WalletTopupStatusEnum::PENDING;
        $data['user_id'] = auth()->user()->id;

        $result = WalletTopupRequest::create($data);

        return $this->respondSuccess($result, 'topup_request_added_successfully');
    }
}
