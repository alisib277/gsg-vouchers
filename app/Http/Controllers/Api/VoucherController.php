<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVoucherRequest;
use App\Http\Requests\UpdateVoucherRequest;
use App\Http\Resources\VoucherResource;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class VoucherController extends Controller
{
    protected const PAGE_LIMIT = 15;    /**
     * @return JsonResponse
     */
    public function index()
    {
        $query = Voucher::query();

        //todo: add some filtration

        $vouchers = $query->get();

        $data = [
            'vouchers' => VoucherResource::collection($vouchers),
        ];

        return response()->json($data, Response::HTTP_OK);

    }

    /**
     * @return JsonResponse
     */
    public function onlyActive()
    {
        $today= Carbon::now()->format('Y-m-d');
        $vouchers = Voucher::whereDate('valid_from','<=',$today)->whereDate('valid_to','>=',$today)->paginate(5);

        $data = [
            'vouchers' => VoucherResource::collection($vouchers),
            'pagination' => [
                "current_page" => $vouchers->currentPage(),
                "prev_page_url" =>  $vouchers->previousPageUrl(),
                "next_page_url" =>  $vouchers->nextPageUrl(),
                "last_page" =>  $vouchers->lastPage(),
                "per_page" =>  $vouchers->perPage(),
                "total" =>  $vouchers->total(),
            ],

        ];
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * @param  StoreVoucherRequest  $request
     * @return JsonResponse
     */
    public function store( StoreVoucherRequest $request)
    {
        $voucher = Voucher::create($request->validated());

        $data = [
            'voucher' => new VoucherResource($voucher),
        ];

        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  Voucher  $voucher
     * @return JsonResponse
     */
    public function show(Voucher $voucher)
    {
        $data = [
            'voucher' => new VoucherResource($voucher),
        ];

        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * @param  UpdateVoucherRequest  $request
     * @param  Voucher  $voucher
     * @return JsonResponse
     */
    public function update( UpdateVoucherRequest $request, Voucher $voucher)
    {
        $voucher->update($request->validated());

        $data = [
            'voucher' => new VoucherResource($voucher),
        ];

        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * @param  Voucher  $voucher
     * @return JsonResponse
     */
    public function destroy(Voucher $voucher)
    {
        $voucher->delete();

        return response()->json([], Response::HTTP_OK);
    }
}
