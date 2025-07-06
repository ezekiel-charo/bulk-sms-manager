<?php

namespace App\Http\Controllers;

use App\Services\MessagingService;
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

    function store(Request $request, MessagingService $messagingService): RedirectResponse
    {
        $validated = $request->validate([
            'content' => 'required|string',
            'recipient_ids' => 'nullable|array|min:1',
            'recipient_ids.*' => 'integer|exists:contacts,id'
        ]);

        $recipientIds = $validated['recipient_ids'];
        $message = $validated['content'];

        DB::transaction(function () use ($request, $validated, $recipientIds, $message) {
            $pivotData = [];

            foreach ($recipientIds as $id) {
                // Set delivery status for each recipient
                $pivotData[$id] = ['delivered' => false];
            }

            $message = [
                'content' => $message,
                'num_recipients' => count($recipientIds),
                'num_delivered' => 0,
            ];

            $message = $request->user()->messages()->create($message);

            $message->recipients()->attach($pivotData);
        });

        $credentials = $request->user()->africasTalkingCredentials;

        $messagingService->sendMessages($credentials, $recipientIds, $message);


        return redirect('messages');
    }

    // TODO: Create a web hook for updating delivery status
}
