<?php
/**
 * @package UserFilter
 * @author TechVillage <support@techvill.org>
 * @contributor AH Millat <[millat.techvill@gmail.com]>
 * @created 24-03-2022
 */

namespace App\Filters;

use App\Filters\Filter;

class ThreadFilter extends Filter
{
    /**
     * set the rules of query string
     *
     * @var array
     */
    protected $filterRules = [
        'status' => 'int',
        'assignee' => 'int',
        'start_date' => 'required',
        'end_date' => 'required',
    ];

    /**
     * filter status  query string
     *
     * @param string $status
     * @return query builder
     */
    public function status($status)
    {
        return $this->query->where('thread_status_id', $status);
    }

    /**
     * filter by assignee query string
     *
     * @param int $id
     * @return void
     */
    public function assignee($assignee)
    {
        return $this->query->where('assigned_member_id', $assignee);
    }

     /**
     * @param $startDate
     * @return void
     */
    public function startDate($startDate)
    {
        if ($startDate != 'null') {
            return $this->query->whereDate('date', '>=', DbDateFormat($startDate));
        }
    }

    /**
     * @param $endDate
     * @return void
     */
    public function endDate($endDate)
    {
        if ($endDate != 'null') {
            return $this->query->whereDate('date', '<=', DbDateFormat($endDate));
        }
    }
    /**
     * filter by search query string
     *
     * @param string $value
     * @return query builder
     */
    public function search($value)
    {
        $value = xss_clean($value['value']);

        return $this->query->where(function ($query) use ($value) {
            $query->whereLike('subject', $value)
                ->orWhereHas('assignedMember', function($q) use ($value) {
                    $q->whereLike('name', $value);
                })->orWhereHas('customer', function($q) use ($value) {
                    $q->whereLike('name', $value);
                });
        });
    }
}
