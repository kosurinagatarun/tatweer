<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CounterController extends Controller
{
    /**
     * Display a listing of the counters.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $counters = Counter::all();
        return view('admin.counters.index', compact('counters'));
    }

    /**
     * Show the form for creating a new counter.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('admin.counters.create');
    }

    /**
     * Store a newly created counter in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'count' => 'required|integer|min:0',
        ]);

        Counter::create($request->all());

        return redirect()->route('admin.counters.index')
            ->with('success', 'Counter created successfully.');
    }

    /**
     * Show the form for editing the specified counter.
     *
     * @param  \App\Models\Counter  $counter
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Counter $counter)
    {
        return view('admin.counters.edit', compact('counter'));
    }

    /**
     * Update the specified counter in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Counter  $counter
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Counter $counter): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'count' => 'required|integer|min:0',
        ]);

        $counter->update($request->all());

        return redirect()->route('admin.counters.index')
            ->with('success', 'Counter updated successfully.');
    }

    /**
     * Remove the specified counter from storage.
     *
     * @param  \App\Models\Counter  $counter
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Counter $counter): \Illuminate\Http\RedirectResponse
    {
        $counter->delete();

        return redirect()->route('admin.counters.index')
            ->with('success', 'Counter deleted successfully.');
    }
}
