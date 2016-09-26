<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show all of the message threads to the user.
     *
     * @return mixed
     */
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->get();

        $currentUserId = Auth::user()->id;

        $threads = Thread::forUser($currentUserId)->latest('updated_at')->get();

        return view('messenger.index', compact('threads', 'currentUserId', 'users'));
    }

    /**
     * Shows a message thread.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect('profile/messages')->with('error', trans('startup.notifications.profile.message_error', ['id' => $id]));
        }

        if (! $thread->hasParticipant(\Auth::id())) {
            return redirect('profile/messages')->with('error', trans('startup.notifications.profile.message_error2'));
        }

        $userId = Auth::user()->id;
        $users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();

        $thread->markAsRead($userId);

        return view('messenger.show', compact('thread', 'users'));
    }

    /**
     * Creates a new message thread.
     *
     * @return mixed
     */
    public function create()
    {
        $users = User::where('id', '!=', Auth::id())->get();

        return view('messenger.create', compact('users'));
    }

    /**
     * Stores a new message thread.
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required',
            'message' => 'required',
            'recipients' => 'required', ]);

        $thread = Thread::create(
            [
                'subject' => $request->subject,
            ]
        );

        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'body'      => $request->message,
            ]
        );

        Participant::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'last_read' => new Carbon,
            ]
        );

        if (Input::has('recipients')) {
            $thread->addParticipant($request->recipients);
        }

        return redirect('profile/messages')->with('info', trans('startup.notifications.profile.new_message'));
    }

    /**
     * Adds a new message to a current thread.
     *
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect('profile/messages')->with('error', trans('startup.notifications.profile.message_error', ['id' => $id]));
        }

        $thread->activateAllParticipants();

        $this->validate($request, [
            'message' => 'required', ]);

        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::id(),
                'body'      => $request->message,
            ]
        );

        $participant = Participant::firstOrCreate(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
            ]
        );
        $participant->last_read = new Carbon;
        $participant->save();

        return redirect('profile/messages/'.$id)->with('info', trans('startup.notifications.profile.post_message'));
    }

    public function destroy($id)
    {
        $thread = Thread::find($id);

        $thread->delete();

        return redirect('profile/messages')->with('success', trans('startup.notifications.profile.delete_message'));
    }
}
