<?php

namespace App\Http\Controllers;

use App\Http\Repositories\MessageRepository;
use App\Http\Repositories\UserRepository;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    private MessageRepository $messageRepository;
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->messageRepository = new MessageRepository(new Message());
        $this->userRepository = new UserRepository(new User());
    }
    public function index(Request $request)
    {
        // get the chat screen based on entry
        $participant = $request->input('email');
        $participant = $this->userRepository->find_by_email($participant);

        //those are for the sidebar
        $last_messages = $this->messageRepository->last_messages();
        $last_saved_message = $this->messageRepository->last_saved_message();

        // get the main chat messages
        $messages = $this->messageRepository->get_direct_messages($participant->id);
        
        return view('pages.messages', compact('last_messages', 'last_saved_message', 'messages', 'participant'));
    }
}