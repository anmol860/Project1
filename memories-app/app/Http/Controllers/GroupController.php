<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
use App\Models\User;

class GroupController extends Controller
{
    public function index(){
        $groups = Auth::user()->groups;
        return view('groups.index', compact('groups'));

    }

    public function createGroup(Request $request){
        $request->validate([
            'name' => 'required|string|min:3|max:20'
        ]);

        $group = Group::create([
            'name' => $request->name,
        ]);

        Auth::user()->groups()->attach($group->id);

        return redirect()->route('groups.index')->with('success', 'Group created successfully');
    }

    public function showGroup(Group $group){

     $memoryDates = $group->media()->select('memory_date')->distinct()->pluck('memory_date');


        return view('groups.groupMemories', compact('group', 'memoryDates'));
    }

    public function showGroupMemories(Group $group, $date){

        $groupMemories = $group->media()->where('memory_date', $date)->get();
        return view('groups.extendGroupMemories', compact('group', 'groupMemories', 'date'));
    }

    public function storeGroupMemories(Request $request, Group $group, $date){
        $request->validate([
            'media_url' => 'required|url',
            'media_type' => 'required|string',
            'public_id' => 'required|string',
        ]);

        $group->media()->create([
            'user_id' => Auth::id(),
            'group_id' => $group->id,
            'memory_date' => $date,
            'media_url' => $request->media_url,
            'media_type' => $request->media_type,
            'public_id' => $request->public_id,
        ]);

        return back()->with('success', 'Memory saved! 🏝️');

    }

    public function inviteGroupMember(Request $request, Group $group){
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ],[
            'email.exists' => 'User does not exists!',
        ]);

        $invitedUser = User::where('email', $request->email)->first();
        $group->users()->attach($invitedUser->id);

        return back()->with('success', 'User added to the group');
    }
}
