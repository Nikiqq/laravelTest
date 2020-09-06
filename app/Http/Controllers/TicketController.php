<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Status;
use App\Models\Message;
use App\Models\File;


class TicketController extends Controller
{
    public function getList()
    {
        $ticket = new Ticket();
        $status = new Status();
        
        return view('list', 
                    [
                        'tickets' => $ticket
                            ->with('user', 'status')
                            ->orderBy('created_at', 'asc')
                            ->get(),
                        'statuses' => $status->all()
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
    
    public function updateStatusTicket(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        
        $ticket->status_id = $request->status;
        $ticket->save();
        
        return redirect()->route('list');
        
    }
    
}
