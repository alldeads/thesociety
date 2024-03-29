<?php

namespace App\Exports;

use App\Exports\Export;
use App\Models\JournalEntry;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Database\Eloquent\Builder;

class JournalEntryExport extends Export implements FromView
{
    public function view(): View
    {
        $search = $this->search;
        $from = $this->from;
        $to = $this->to;

        $results = JournalEntry::where('company_id', $this->company_id)
                    ->where( function (Builder $query) use ($search) {
                        $query->whereHas('user', function($query) use ($search) {
                            return $query->whereHas('profile', function($query) use ($search) {
                                return $query->where('first_name', 'like', "%" . $search ."%")
                                ->orWhere('middle_name', 'like', "%" . $search ."%")
                                ->orWhere('last_name', 'like', "%" . $search ."%");
                            });
                        })->orWhereHas('chart_account', function($query) use ($search) {
                            return $query->where('chart_name', 'like', "%" . $search ."%")
                            ->orWhereHas('type', function($query) use ($search) {
                                return $query->where('name', 'like', "%" . $search ."%");
                            });
                        });
                    });

        if ( !empty($from) ) {
            $results = $results->whereDate('created_at', '>=', $from );
        }

        if ( !empty($to) ) {
            $results = $results->whereDate('created_at', '<=', $to );
        }
        
        return view('exports.journal-entry', [
            'journalEntries' => $results->orderBy('id', 'desc')->get()
        ]);
    }
}
