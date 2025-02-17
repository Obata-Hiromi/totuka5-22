<?php

namespace App\Http\Controllers\Group;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Group\Group;
use App\Models\Group\GroupRole;
use App\User;

use Illuminate\Support\Facades\Auth;

class GroupUserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @param int $group_id
     * @return \Illuminate\Http\Response
     */
    public function index($group_id)
    {
        //
        $group=Group::find($group_id);
        return view('group.user.index.'.$group->type)->with([
            'group'=>$group,
            'users'=>$group->users()->get(),
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param int $group_id
     * @return \Illuminate\Http\Response
     */
    public function create($group_id)
    {
        //
        $group=Group::find($group_id);
        return view('group.user.create.'.$group->type)->with([
            'group'=>$group,
            'roles'=>$group->roles()->get(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $group_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$group_id)
    {
        //validation
        $validator = Validator::make($request->all(),[
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        //
        //checkRolePassword($role_id,$password);
        $member=GroupMember::create([
            'group_id'=>$group_id,
            'user_id'=>$request['user_id'],
            'role_id'=>$request['role_id'],
        ]);
        return redirect()->route('group.member.index',$group_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $member_id
     * @return \Illuminate\Http\Response
     */
    public function show($member_id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $member_id
     * @return \Illuminate\Http\Response
     */
    public function edit($member_id)
    {
        //
        return view('group.member.edit')->with([
            'member'=>GroupMember::find($member_id),
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $member_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $member_id)
    {
        //validation
        $validator = Validator::make($request->all(),[
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        //
        //checkRolePassword($role_id,$password);
        $member=GroupMember::find($member_id)->fill([
            'role_id'=>$request['role_id'],
        ])->save();
        return redirect()->route('group.member.index',$member->group()->first()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $member_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($member_id)
    {
        //
        $member=GroupMember::find($member_id);
        $group_id=$member->group()->id;
        $member->delete();
        return redirect()->route('group.member.index',$group_id);
    }



    //
    public function like($group_id,$user_id){
        $group=Group::find($group_id);
        $user=User::find($user_id);
        $group->attachRole($user,255);
        return redirect()->back();
    }
    //
    public function unlike($group_id,$user_id){
        $group=Group::find($group_id);
        $user=User::find($user_id);
        $group->detachRole($user,255);
        return redirect()->back();
    }
}
