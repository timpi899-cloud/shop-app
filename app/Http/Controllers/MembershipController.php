<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;
use Carbon\Carbon;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::all();
        return view('membership.index', compact('memberships'));
    }

    public function join($id)
    {
        $membership = Membership::findOrFail($id);

        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        /** @var \App\Models\User $user */

        $start = Carbon::now();
        $end = $start->copy()->addDays($membership->duration_days);

        $user->memberships()->attach($membership->id, [
            'start_at' => $start,
            'end_at' => $end,
        ]);

        $user->update([
            'is_member' => true,
            'member_until' => $end,
        ]);

        return back()->with('success', 'Membership aktif');
    }
}
