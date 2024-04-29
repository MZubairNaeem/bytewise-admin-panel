<?php

namespace App\Http\Controllers\GroupLinkManagement;

use App\Http\Controllers\Controller;
use App\Models\GroupLink;
use Illuminate\Http\Request;

class GroupLinkController extends Controller
{

    public function index()
    {
        $grouplinks = GroupLink::all();
        return view('menu.group_links.group-link', compact('grouplinks'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        dd($request->all());
        //run a loop to get all the links and store them in the database
        foreach ($request->link as $link) {
            $grouplink = new GroupLink();
            $grouplink->link = $link;
            $grouplink->save();
        }

        return redirect()->route('group-link.index')->with('success', 'Group Link Added Successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
