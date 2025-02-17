<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::all();

        return response()->json([
            'status' => 200,
            'message' => 'Categories retrieved succesfully',
            'data' => $loans
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required',
            'user_id' => 'required',
            'loan_date' => 'required',
            'return_date' => 'required',
            'status' => 'required'
        ]);

        $loans = loan::create($request->all());

        return response()->json([
            'status' => 201,
            'message' => 'loans created succesfully',
            'data' => $loans
        ], 201);
    }

    public function show($id)
    {
        $loans = loan::find($id);

        if (!$loans) {
            return response()->json([
                'status' => 404,
                'message' => 'loans not found',
                'data' => null
            ],404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'loans retrieved succesfully',
            'data' => $loans
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $loans = loan::find($id);

        if(!$loans) {
            return response()->json([
                'status' => 404,
                'message' => 'loans not found',
                'data' => null
            ], 404);
        }

        $request->validate([
            'name' => 'string|max:255'
        ]);
        $loans->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'loans updated succesfully',
            'data' => $loans
        ], 200);
    }

    public function destroy($id)
    {
        $loans = loan::find($id);

        if(!$loans) {
            return response()->json([
                'status' => 404,
                'message' => 'loans not found',
                'data' => null
            ], 404);
        }

        $loans->delete();

        return response()->json([
            'status' => 200,
            'message' => 'loans deleted succesfully',
            'data' => null
        ], 200);
    }
}