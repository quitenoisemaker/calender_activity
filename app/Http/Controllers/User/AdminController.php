<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Models\Activity;
use App\Models\Models\ActivityDate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;

class AdminController extends Controller
{
    //

    public function index()
    {
        return view('admin.index');
    }

    public function create()
    {
        # code...
        $getActivities = Activity::select('id', 'title', 'description', 'image', 'start_date', 'end_date')->orderBy('id', 'DESC')->get();
        return view('admin.activity.create', compact('getActivities'));
    }

    public function store(StoreActivityRequest $request, Activity $storeActivity)
    {
        $validatedData = $request->validated();
        $image = $request->file('image')->store('activityImage', 'public');
        $validatedData['image'] = $image;
        $storeActivity->createActivity($validatedData);

        return back();
        // return response()->json([
        //     'success' => 'submitted'
        // ]);
    }

    public function activityIndex()
    {
        # code...
        // $queries = [];
        // $getActivities = Activity::select('id', 'title', 'start_date', 'end_date')->get();

        // foreach ($getActivities as $getActivity) {
        //     # code...
        //     $queries[] = array(
        //         'title' => $getActivity->title,
        //         'start_date' => $getActivity->start_date,
        //         'end_date' => $getActivity->end_date,
        //     );
        // }

        // //return $queries;

        return view('admin.activity.index');
        // return response()->json([
        //     'data' => $queries,
        //     'success' => true,
        // ]);
    }


    public function edit($id)
    {
        $getActivity = Activity::find($id);
        return view('admin.activity.edit', compact('getActivity'));
    }

    public function update(UpdateActivityRequest $request, $id)
    {

        $updateValidatedData = $request->validated();

        $activity = Activity::find($id);
        if (is_null($request->file('image'))) {
            # code...
            $updateValidatedData['image'] = $activity->image;
        } else {
            Storage::disk('public')->delete($activity->image);
            $updateValidatedData['image'] = $request->file('image')->store('activityImage', 'public');
        }
        $activity->update($updateValidatedData);
        return redirect('/admin/activity/create');
    }


    public function destroy($id)
    {

        $activity = Activity::find($id);
        Storage::disk('public')->delete($activity->image);
        $activity->delete();

        return redirect('/admin/activity/create');
    }
}
