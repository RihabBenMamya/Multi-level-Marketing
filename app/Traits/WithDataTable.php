<?php

namespace App\Traits;

use App\Models\Advisors;
use Illuminate\Support\Facades\Auth;


trait WithDataTable
{

    public function get_pagination_data()
    {
        switch ($this->name) {
            case 'user':
                $users = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.user',
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('user.new'),
                            'create_new_text' => 'Add User',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
            case 'advisor':
                if (Auth::user()->isAdvisor()) {
                $advisors = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->where('id', Advisors::where('login', Auth::user()->name)->value('id'))
                    ->paginate($this->perPage);
                }
                else{
                    $advisors = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                }
                return [
                    "view" => 'livewire.table.advisor',
                    "advisors" => $advisors,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => '#',
                            'create_new_text' => 'Add Advisors',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
            case 'advisorsTree':
                if (Auth::user()->isAdvisor()) {
                    $advisorsTree = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->where('advisor_id', Advisors::where('login', Auth::user()->name)->value('id'))
                    ->paginate($this->perPage);
                } else {
                    $advisorsTree = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                }



                return [
                    "view" => 'livewire.table.advisorsTree',
                    "advisorsTree" => $advisorsTree,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => '#',
                            'create_new_text' => 'Add AdvisorsTree',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
            case 'configRankLevellings':
                $configRankLevellings = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.configRankLevellings',
                    "configRankLevellings" => $configRankLevellings,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => '#',
                            'create_new_text' => 'Add Config Rank Levellings',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
            case 'configReferralBonuse':
                $configReferralBonuse = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.configReferralBonuse',
                    "configReferralBonuse" => $configReferralBonuse,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => '#',
                            'create_new_text' => 'Add Config Referral Bonuse',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
            case 'configTeamBonuse':
                $configTeamBonuse = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.configTeamBonuse',
                    "configTeamBonuse" => $configTeamBonuse,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => '#',
                            'create_new_text' => 'Add Config Team Bonuse',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
            case 'order':
                if (Auth::user()->isAdvisor()) {
                    $order = $this->model::search($this->search)
                        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                        ->where('advisor_id', Advisors::where('login', Auth::user()->name)->value('id'))
                        ->paginate($this->perPage);
                } else {
                    $order = $this->model::search($this->search)
                        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                        ->paginate($this->perPage);
                }
                return [
                    "view" => 'livewire.table.order',
                    "order" => $order,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => '#',
                            'create_new_text' => 'Add Order',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
            case 'personalScore':
                if (Auth::user()->isAdvisor()) {
                    $personalScore = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->where('advisor_id', Advisors::where('login', Auth::user()->name)->value('id'))
                    ->paginate($this->perPage);

                } else {
                    $personalScore = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                }

                return [
                    "view" => 'livewire.table.personalScore',
                    "personalScore" => $personalScore,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('personalScore.create'),
                            'create_new_text' => 'Calculate Personal Scoree',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
            case 'rankRevision':
                if (Auth::user()->isAdvisor()) {
                    $rankRevision = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->where('advisor_id', Advisors::where('login', Auth::user()->name)->value('id'))
                    ->paginate($this->perPage);

                } else {
                    $rankRevision = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                }


                return [
                    "view" => 'livewire.table.rankRevision',
                    "rankRevision" => $rankRevision,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('rankRevision.create'),
                            'create_new_text' => 'Upgrade Rank Revision',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
            case 'referralBonuse':
                if (Auth::user()->isAdvisor()) {
                    $referralBonuse = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->where('advisor_id', Advisors::where('login', Auth::user()->name)->value('id'))
                    ->paginate($this->perPage);
                } else {
                    $referralBonuse = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                }



                return [
                    "view" => 'livewire.table.referralBonuse',
                    "referralBonuse" => $referralBonuse,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('referralBonuse.create'),
                            'create_new_text' => 'Calculate Referral Bonuse',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
            case 'teamBonuse':
                if (Auth::user()->isAdvisor()) {
                    $teamBonuse = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->where('advisor_id', Advisors::where('login', Auth::user()->name)->value('id'))
                    ->paginate($this->perPage);
                } else {
                    $teamBonuse = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                }



                return [
                    "view" => 'livewire.table.teamBonuse',
                    "teamBonuse" => $teamBonuse,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('teamBonuse.create'),
                            'create_new_text' => 'Calculate Team Bonuse',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
            case 'teamScore':
                if (Auth::user()->isAdvisor()) {
                    $teamScore = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->where('advisor_id', Advisors::where('login', Auth::user()->name)->value('id'))
                    ->paginate($this->perPage);

                } else {
                    $teamScore = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                }


                return [
                    "view" => 'livewire.table.teamScore',
                    "teamScore" => $teamScore,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('teamScore.create'),
                            'create_new_text' => 'Calculate Team Score',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
            default:
                # code...
                break;
        }
    }
}
