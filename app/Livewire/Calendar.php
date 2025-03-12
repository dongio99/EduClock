<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Calendar extends Component
{
    public $calendarEvents = [];
    protected $listeners = ['updateCalendar' => 'getEventsBetweenDate'];

    public function mount()
    {
        $this->getEventsBetweenDate(
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()
        );
    }

    public function getEventsBetweenDate($startDate, $endDate)
    {
        $start = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);

        $this->calendarEvents = auth()->user()->eventsBetweenDate($start, $end)
            ->get()
            ->map(function($event) {
                return [
                    'id' => $event->id,
                    'title' => $event->title,
                    'start' => Carbon::parse($event->start)->toIso8601String(),
                    'end' => $event->end ? Carbon::parse($event->end)->toIso8601String() : null,
                ];
            })->toArray();

        $this->dispatch('calendarUpdated', $this->calendarEvents);
    }


    public function render()
    {
        return view('livewire.calendar');
    }
}