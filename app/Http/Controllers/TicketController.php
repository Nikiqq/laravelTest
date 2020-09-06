<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function getList()
    {
        $tickets = new Ticket();
        return view('ticketList', 
                    ['items' => $tickets
                        ->with('user')
                        ->orderBy('created_at', 'asc')
                        ->get()
                    ]);
    }
}
