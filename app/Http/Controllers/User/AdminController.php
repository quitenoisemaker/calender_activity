<?php

namespace App\Http\Controllers\User;

use App\Models\Role;
use App\Models\User;
use App\Models\Activity;
use App\Models\ActivityUser;
use Illuminate\Http\Request;
use App\Models\Models\ActivityDate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Http\Requests\StoreUserActivityRequest;
use App\Http\Requests\UpdateUserActivityRequest;
use App\Http\Resources\AllActivityResource;

class AdminController extends Controller
{
    //

    public function index()
    {

        $events = array();
        $getActivities = Activity::select('id', 'title', 'start_date', 'end_date')->get();
        $events =  AllActivityResource::collection($getActivities);
        $events = $events->toJson();
        return view('admin.activity.index', compact('events'));
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

    public function dashboardIndex()
    {
        return view('admin.index');
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

    public function updateUserActivity(UpdateUserActivityRequest $request, $activity_id, $user_id, Activity $storeActivity, ActivityUser $activityUser)
    {
        //alert when maximum activity
        $getMaximumCount = $storeActivity->getActivityCount($request->start_date, $request->end_date);
        if ($getMaximumCount) {
            return "<script>alert('$getMaximumCount')
            window.location = '/admin/user/activity/edit/'+$activity_id+'/'+$user_id</script>";
        }
        //end

        $validatedData = $request->validated();
        if (is_null($request->file('image'))) {
            $getActivityImage = Activity::find($activity_id);
            $validatedData['image'] = $getActivityImage->image;
        } else {
            $validatedData['image'] = $request->file('image')->store('activityImage', 'public');
        }
        //create activity
        $activity = $storeActivity->createActivity($validatedData);

        //get users and attach activity
        $activityUser->modifyUserActivity($user_id, $activity_id, $activity->id);

        return redirect('admin/user/activities/' . $user_id);
    }

    public function createUserActivity($user_id)
    {
        return view('admin.user.activity_create', compact('user_id'));
    }

    public function storeUserActivity(StoreUserActivityRequest $request, Activity $storeActivity, $user_id)
    {
        //alert when maximum activity
        $getMaximumCount = $storeActivity->getActivityCount($request->start_date, $request->end_date);
        if ($getMaximumCount) {
            return "<script>alert('$getMaximumCount')
            window.location = '/admin/user/activity/create'+ $user_id</script>";
        }
        //end

        $validatedData = $request->validated();
        $image = $request->file('image')->store('activityImage', 'public');
        $validatedData['image'] = $image;

        //create activity
        $activity = $storeActivity->createActivity($validatedData);

        //get users and attach activity 
        $activity->user()->attach($user_id);

        return redirect('admin/user/activities/' . $user_id);
    }


    public function getAllActivity()
    {
        $queries = [];
        $getActivities = Activity::select('id', 'title', 'start_date', 'end_date')->get();

        foreach ($getActivities as $getActivity) {
            $queries[] = array(
                'title' => $getActivity->title,
                'start' => "2022-12-22 09:08:25",
                'end' => "2022-12-22 09:08:25",
            );
        }
        return response()->json([
            'data' => $queries
        ]);
    }
}
