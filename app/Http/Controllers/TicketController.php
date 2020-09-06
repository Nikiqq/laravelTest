<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Message;
use App\Models\File;


class TicketController extends Controller
{
    public function getList()
    {
        $tickets = new Ticket();
        return view('list', 
                    [
                        'items' => $tickets
                            ->with('user')
                            ->orderBy('created_at', 'asc')
                            ->get()
                    ]);
    }
    
    public function getDetail(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        $messages = new Message();
        
        return view('detail', 
                    [
                        'ticket' => $ticket,
                        'messages' => $messages
                            ->with('files', 'user')
                            ->where('ticket_id', '=', $id)
                            ->orderBy('created_at', 'asc')  
                            ->get()
                    ]);
    }
    
}
