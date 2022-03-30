<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $loans = new Loan();

            if($request->input('loan_type') != null){
                $loan_type = $request->input('loan_type');
                $loans = $loans->where(function ($query) use ($loan_type) {
                    $query->where('loan_type', $loan_type);
                });
            }
            if($request->input('user_id') != null){
                $user_id = $request->input('user_id');
                $loans = $loans->where(function ($query) use ($user_id) {
                    $query->where('user_id', $user_id);
                });
            }

            if (Gate::allows('is_admin')) {
                $loans = $loans->where('user_id', '!=', Auth::id() );
            }else{
                $loans = $loans->where('user_id', Auth::id() );
            }
            $loans = $loans->with('user')->paginate(10);
            return view('loans.index', compact('loans'));

    }

    public function toggle_loan_status(Request $request){
        $request->validate([
            'loan_id' => 'required',
            'loan_status' => 'required'
        ]);
        if (Gate::allows('is_admin')) {
            $loan = Loan::findOrFail($request->input('loan_id'));
            $loan->loan_status = $request->input('loan_status');
            $loan->save();
        }else{
            abort(403);
        }
        return redirect()->route('loans.show', $loan->id)->with('success', 'Loan status updated');
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
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        if(Auth::id() == $loan->user_id || Auth::user()->user_type == 1){
            return view('loans.show', compact('loan'));
        }else{
            return redirect()->route('loans.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loan $loan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        //
    }
}
