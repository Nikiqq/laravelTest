<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Status;
use App\Models\Message;
use App\Models\File;
use App\Http\Requests\AddTicketRequest;


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
    
    public function updateStatus(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        
        $ticket->status_id = $request->status;
        $ticket->save();
        
        return redirect()->route('list');
        
    }
    
    public function create(AddTicketRequest $request)
    {
        $defaultStatus = 'Анализ/оцssенка';
        $status = new Status();
        $status = $status->select('id')->where('name', $defaultStatus)->first();
        
        $ticket = new Ticket([
            'title' => $request->title,
            'user_id' => 1, //пока нет user
            'status_id' => $status->id ?? 1 
        ]);
        
        $ticket->save();
        
        return redirect()->route('list');
    }
    
}
