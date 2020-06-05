<?php

namespace App\Http\Controllers\Api;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Http\Resources\ContactUsResource;

class NotificationController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function contactUs(Request $request)
    {
        $contact = ContactUs::create($request->all());
        return response()->json(['data'=>$contact],Response::HTTP_OK);
    }

    public function getContacts (Request $request)
    {
        if(auth()->user()->isSuperAdmin())
            return ContactUsResource::collection(ContactUs::paginate(25));
        return ContactUsResource::collection(ContactUs::where('user_id',21)->paginate(25));
    }
}
