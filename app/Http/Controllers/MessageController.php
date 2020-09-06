<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Message;
use App\Models\File;
use App\Http\Requests\AddMessageRequest;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function addMessage(AddMessageRequest $request, $id)
    {
        $message = new Message([
            'body' => $request->body,
            'user_id' => Auth::user()->id
        ]);
        
        $ticket = Ticket::find($id);
        $message = $ticket->messages()->save($message);
        
        if (!empty($files = $request->file())) {
            $this->addFileMessage($files, $message);
        }
        
        return redirect()->route('detail', ['id' => $id]);
    }
    
    public function addFileMessage($files, $message)
    {
        $fileModel = new File();
        
        $fileData = [];
        $attachFileId = [];
        
        foreach ($files as $file) {
            foreach ($file as $f) {
                $fileName = $f->getClientOriginalName();
                
                $fileData[$fileName] = ['name' => $fileName];
                $f->move(storage_path('upload'), $fileName);
            }
        }   
        
        //выбираем те файлы, которые уже есть в бд
        
        foreach ($fileModel->whereIn('name', array_keys($fileData))->get() as $existFile) {
            unset($fileData[$existFile->name]);
            $attachFileId[] = $existFile->id;
        }
                        
        if(!empty($fileData)){
            $fileModel->insert($fileData);
        }
        
        //выбираем те файлы, которые добавились в бд
        
        foreach ($fileModel->whereIn('name', array_keys($fileData))->get() as $newFile) {
            $attachFileId[] = $newFile->id;
        }
                
        $message->files()->attach($attachFileId);
    }
}
