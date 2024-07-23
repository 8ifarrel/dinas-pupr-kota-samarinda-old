<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\AgendaKegiatan;
use Illuminate\Support\Facades\Storage;

class Calendar extends Component
{
    public $events;
    public $eventsJson;
    public $eventsJsonPath; 

    public function mount()
    {
        $this->loadEvents();
    }


    public function loadEvents()
    {
        $agendaItems = AgendaKegiatan::all();
    
        $this->events = $agendaItems->map(function ($item) {
            return [
                'title' => $item->nama,
                'start' => $item->tanggal . ' ' . $item->waktu,
            ];
        })->toArray();
    
        $this->eventsJsonPath = Storage::path('calendar.json');
        file_put_contents($this->eventsJsonPath, json_encode($this->events, JSON_PRETTY_PRINT));
    }
    

    public function onLoad()
    {
        $this->loadEvents();
        $this->emit('calendarEventsUpdated', $this->eventsJson);
    }    


    public function render()
    {
        return view('livewire.calendar');
    }

    public function updatedEvents()
    {
        $this->loadEvents();
        $this->onLoad();
    }
}