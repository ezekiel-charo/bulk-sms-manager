<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DeliveryReportController extends Controller
{
    function show(Request $request, $id): Response
    {
        $message = $request->user()->messages()->findOrFail($id);
        $deliveryReports = $message->recipients;

        return Inertia::render('DeliveryReportList', ['deliveryReports' => $deliveryReports]);
    }
}
