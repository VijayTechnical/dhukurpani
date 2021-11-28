<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use Acaronlex\LaravelCalendar\Calendar;

class CalendarComponent extends Component
{
    public function render()
    {
        $events = [];
        $data = Event::all();
        if ($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date . '+1 day'),
                    null,
                    // Add color
                    [
                        'color' => $value->color,
                        'textColor' => $value->textColor,
                        'weekNumbers' => true,
                        'dayMaxEvents' => true,
                        'timeZone' => 'UTC',
                        'themeSystem' => 'bootstrap',
                        'headerToolbar' => [
                            'left' => 'prev,next today',
                            'center' => 'title',
                            'right' => 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                        ],
                    ]
                );
            }
        }
        $calendar = \Calendar::addEvents($events);
        return view('livewire.calendar-component',['calendar'=>$calendar,'events'=>$events])->layout('layouts.base');
    }
}
