<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\Models\ActivityDate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Http\Requests\UpdateUserActivityRequest;
use App\Models\ActivityUser;
use App\Models\Role;

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
        $getActivities = Activity::select('id', 'title', 'description', 'image', 'start_date', 'end_date')
            ->where('global_status', 1)
            ->orderBy('id', 'DESC')->get();
        return view('admin.activity.create', compact('getActivities'));
    }

    public function store(StoreActivityRequest $request, Activity $storeActivity)
    {
        $getMaximumCount = $storeActivity->getActivityCount($request->start_date, $request->end_date);

        //alert when maximum activity
        if ($getMaximumCount) {
            return "<script>alert('$getMaximumCount')
            window.location = '/admin/activity/create'</script>";
        }
        //end

        $validatedData = $request->validated();
        $image = $request->file('image')->store('activityImage', 'public');
        $validatedData['image'] = $image;
        $activity = $storeActivity->createActivity($validatedData);

        //get users and attach activity 
        $users = User::select('id')->pluck('id');
        $activity->user()->attach($users);

        return back();
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
        $activity->user()->detach();

        return redirect('/admin/activity/create');
    }

    public function getUsers()
    {
        $getUserRole = Role::where('name', User::USER)->first();
        $users = User::select('id', 'name', 'created_at')->orderBy('id', 'DESC')
            ->where('role_id', $getUserRole->id)->get();
        return view('admin.user.index', compact('users'));
    }

    public function getUserActivities($id)
    {
        $userActivities = User::find($id)->activity()->get();
        return view('admin.user.activity_show', compact('userActivities', 'id'));
    }

    public function editUserActivity($activity_id, $user_id)
    {
        # code...
        $getActivity = Activity::find($activity_id);
        return view('admin.user.activity_edit', compact('getActivity', 'user_id'));
    }

    public function updateUserActivity(UpdateUserActivityRequest $request, $activity_id, $user_id, Activity $storeActivity)
    {
        $getMaximumCount = $storeActivity->getActivityCount($request->start_date, $request->end_date);

        //alert when maximum activity
        if ($getMaximumCount) {
            return "<script>alert('$getMaximumCount')
            window.location = '/admin/activity/create'</script>";
        }
        //end

        $validatedData = $request->validated();
        if (is_null($request->file('image'))) {
            $getActivityImage = Activity::find($activity_id);
            $validatedData['image'] = $getActivityImage->image;
        } else {
            $validatedData['image'] = $request->file('image')->store('activityImage', 'public');
        }
        $activity = $storeActivity->createActivity($validatedData);

        //get users and attach activity
        $getUserActivity = ActivityUser::where('user_id', $user_id)->where('activity_id', $activity_id)->first();
        $getUserActivity->activity_id = $activity->id;
        $getUserActivity->save();

        return redirect('admin/user/activities/' . $user_id);
    }
}
