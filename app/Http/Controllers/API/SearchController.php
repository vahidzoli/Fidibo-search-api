<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\Search\SearchServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class SearchController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api');
    }

    public function search(Request $request, SearchServiceInterface $searchServiceInterface)
    {
        $keyword = $request->get('keyword');

        try {

            $books = $searchServiceInterface->search($keyword);

            return response()->json([
                'status_code' => Response::HTTP_OK,
                'data' => $books,
            ]);

        } catch (\Throwable $th) {

            return response()->json([
                'message' => $th->getMessage(),
                'code'    => Response::HTTP_NOT_IMPLEMENTED
            ]);

        }

    }

}