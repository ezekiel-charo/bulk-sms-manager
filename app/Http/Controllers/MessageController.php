<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class MessageController extends Controller
{

    function show(Request  $request): Response
    {
        $messages = $request->user()->messages()->orderBy('created_at', 'desc')->get();
        return Inertia::render('MessageList', ['messages' => $messages]);
    }

    function create(Request  $request): Response
    {
        $contacts = $request->user()->contacts()->get();
        return Inertia::render('Compose', ['contacts' => $contacts]);
    }

    function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'content' => 'required|string',
            'recipient_ids' => 'nullable|array|min:1',
            'recipient_ids.*' => 'integer|exists:contacts,id'
        ]);

        // TODO: Send Messages and then get delivery reports from response
        // TODO: Create a web hook for updating delivery status

        DB::transaction(function () use ($request, $validated) {
            $numDelivered = 2; // TODO: Set from AT response
            $recipients = $validated['recipient_ids'];

            // Build delivery status data for each recipient
            $pivotData = [];
            foreach ($recipients as $id) {
                $pivotData[$id] = ['delivered' => false]; // TODO: Set status from AT response
            }

            $message = [
                'content' => $validated['content'],
                'num_recipients' => count($validated['recipient_ids']),
                'num_delivered' => $numDelivered,
            ];

            $message = $request->user()->messages()->create($message);

            $message->recipients()->attach($pivotData);
        });

        return redirect('messages');
    }
}
