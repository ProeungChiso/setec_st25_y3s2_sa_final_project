<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class FeedbackController extends Controller
{
    public function newFeedback(Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'feedback' => 'required',
        ]);

        $feedback = new Feedback();
        $feedback->name = $validated['name'];
        $feedback->email = $validated['email'];
        $feedback->feedback_content = $validated['feedback'];
        $feedback->is_published = true;
        $feedback->created_date = now();
        $feedback->save();

        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }
}
