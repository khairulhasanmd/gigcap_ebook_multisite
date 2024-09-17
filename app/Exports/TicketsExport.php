<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\{
    FromQuery,
    WithHeadings,
    WithMapping
};
use Modules\Ticket\Http\Models\Thread;

class TicketsExport implements FromQuery, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function query()
    {
        return (new Thread())->getAllData(request('from'), request('to'), request('status'), request('assignee'))->orderBy('last_reply', 'desc');
    }

    /**
     * [Here we are putting Headings of The CSV]
     *
     * @return [array] [Excel Headings]
     */
    public function headings(): array
    {
        return [
            'Subject',
            'Assignee',
            'Customer',
            'Status',
            'Priority',
            'Last Reply',
            'Created At'
        ];
    }

    /**
     * [By adding WithMapping you map the data that needs to be added as row. This way you have control over the actual source for each column. In case of using the Eloquent query builder]
     * 
     * @param [object] $userList [It has users table info and roles table info]
     * @return [array]            [comma separated value will be produced]
     */
    public function map($ticket): array
    {
        return [
            $ticket->subject,
            optional($ticket->assignedMember)->name,
            optional($ticket->cutomer)->name,
            optional($ticket->threadStatus)->name,
            optional($ticket->priority)->name,
            $ticket->last_reply && $ticket->last_reply != $ticket->date ?  timeZoneFormatDate($ticket->last_reply) .' '. timeZoneGetTime($ticket->last_reply)  :  __('Not Reply Yet'),
            timeZoneFormatDate($ticket->date) .' '. timeZoneGetTime($ticket->date)
        ];
    }
}
