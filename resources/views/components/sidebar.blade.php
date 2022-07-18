@php
$links = [
[
"href" => "dashboard",
"text" => "Dashboard",
"is_multi" => false,
],
[
"href" => [
[
"section_text" => "User",
"section_list" => [
["href" => "user", "text" => "Data User"],
["href" => "user.new", "text" => "Add User"],
["href" => "roles.index", "text" => "Role"],
["href" => "permissions.index", "text" => "Permission"]
]
]
],
"text" => "User",
"is_multi" => true,
],
[
"href" => [
[
"section_text" => "Advisor",
"section_list" => [
["href" => "advisors.index", "text" => "Data Advisors"],
["href" => "advisorsTree.index", "text" => "Data Advisors Tree"]
]
]
],
"text" => "",
"is_multi" => true,
],
[
"href" => [
[
"section_text" => "Order",
"section_list" => [
["href" => "order.index", "text" => "Data Order"],

]
]
],
"text" => "mlm",
"is_multi" => true,
],
[
"href" => [
[
"section_text" => "Config",
"section_list" => [
["href" => "configRankLevellings.index", "text" => "Config Rank Levellings"],
["href" => "configReferralBonuse.index", "text" => "Config Referral Bonuse"],
["href" => "configTeamBonuse.index", "text" => "config Team Bonuse"]
]
]
],
"text" => "",
"is_multi" => true,
],
[
"href" => [
[
"section_text" => "Score",
"section_list" => [
["href" => "personalScore.index", "text" => "Personal Score"],
["href" => "teamScore.index", "text" => "Team Score"],
]
]
],
"text" => "",
"is_multi" => true,
],
[
"href" => [
[
"section_text" => "Bonuse",
"section_list" => [
["href" => "teamBonuse.index", "text" => "Team Bonuse"],
["href" => "referralBonuse.index", "text" => "Referral Bonuse"],
]
]
],
"text" => "",
"is_multi" => true,
],
[
"href" => "rankRevision.index",
"text" => "Rank Revision",
"is_multi" => false,
],
];
$Advisorlinks =  [
[
"href" => "dashboard",
"text" => "Dashboard",
"is_multi" => false,
],
[
"href" => [
[
"section_text" => "Advisor",
"section_list" => [
["href" => "advisors.index", "text" => "Data Advisors"],
["href" => "advisorsTree.index", "text" => "Data Advisors Tree"]
]
]
],
"text" => "",
"is_multi" => true,
],
[
"href" => [
[
"section_text" => "Order",
"section_list" => [
["href" => "order.index", "text" => "Data Order"],

]
]
],
"text" => "mlm",
"is_multi" => true,
],
[
"href" => [
[
"section_text" => "Score",
"section_list" => [
["href" => "personalScore.index", "text" => "Personal Score"],
["href" => "teamScore.index", "text" => "Team Score"],
]
]
],
"text" => "",
"is_multi" => true,
],
[
"href" => [
[
"section_text" => "Bonuse",
"section_list" => [
["href" => "teamBonuse.index", "text" => "Team Bonuse"],
["href" => "referralBonuse.index", "text" => "Referral Bonuse"],
]
]
],
"text" => "",
"is_multi" => true,
],
[
"href" => "rankRevision.index",
"text" => "Rank Revision",
"is_multi" => false,
],
];

if(Auth::user()->isAdvisor()){
    $navigation_links = array_to_object($Advisorlinks);
}else  {
    $navigation_links = array_to_object($links);
}


@endphp

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="" alt="">
            </a>
        </div>
        @foreach ($navigation_links as $link)
        <ul class="sidebar-menu">
            <li class="menu-header">{{ $link->text }}</li>
            @if (!$link->is_multi)
            @switch($link->text)
            @case("")
            <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route($link->href) }}"><i class="fas fa-fire"></i><span>{{ $link->text }}</span></a>
            </li>
            @break
            @case("Rank Revision")
            <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route($link->href) }}"><i class="fas fa-star"></i><span>{{ $link->text }}</span></a>
            </li>
            @break
            @default
            <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route($link->href) }}"><i class="fas fa-fire"></i><span>{{ $link->text }}</span></a>
            </li>
            @endswitch

            @else
            @foreach ($link->href as $section)
            @php
            $routes = collect($section->section_list)->map(function ($child) {
            return Request::routeIs($child->href);
            })->toArray();

            $is_active = in_array(true, $routes);
            @endphp

            <li class="dropdown {{ ($is_active) ? 'active' : '' }}">
                @switch($section->section_text)
                @case("Config")
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cog"></i> <span>{{ $section->section_text }}</span></a>
                @break

                @case("User")
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>{{ $section->section_text }}</span></a>
                @break
                @case("Order")
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-shopping-cart"></i> <span>{{ $section->section_text }}</span></a>
                @break
                @case("Score")
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-chart-line"></i> <span>{{ $section->section_text }}</span></a>
                @break
                @case("Bonuse")
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-award"></i> <span>{{ $section->section_text }}</span></a>
                @break
                @case("Rank")
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-level-up"></i> <span>{{ $section->section_text }}</span></a>
                @break

                @default
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-chart-bar"></i> <span>{{ $section->section_text }}</span></a>

                @endswitch


                <ul class="dropdown-menu">
                    @foreach ($section->section_list as $child)
                    <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}"><a class="nav-link" href="{{ route($child->href) }}">{{ $child->text }}</a></li>
                    @endforeach
                </ul>
            </li>
            @endforeach
            @endif
        </ul>
        @endforeach
    </aside>
</div>
