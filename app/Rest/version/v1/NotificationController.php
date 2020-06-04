<?php

namespace App\Rest\version\v1;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

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
}
