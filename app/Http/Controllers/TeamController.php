<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function teams()
    {
        $teams = Team::all()->sortByDesc('id');
        return view('admin.teams', [
            'teams' => $teams
        ]);
    }

    public function createTeam(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'linkedin' => 'required',
            'pinterest' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('custom/teams'), $filename);
            $filePath = 'custom/teams/' . $filename;
        }

        $team = new Team();
        $team->name = $request->name;
        $team->position = $request->position;
        $team->image = isset($filePath) ? $filePath : null; // Add this line to the code (1/2
        $team->facebook = $request->facebook;
        $team->twitter = $request->twitter;
        $team->instagram = $request->instagram;
        $team->linkedin = $request->linkedin;
        $team->pinterest = $request->pinterest;
        $team->save();

        return redirect()->back()->with('success', 'Team member created successfully');
    }

    public function deleteTeam($id)
    {
        try {

            $team = Team::find($id);
            $file = public_path($team->image);
            if (file_exists($file)) {
                unlink($file);
            }
            $team->delete();
            return redirect()->back()->with('success', 'Team member deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
