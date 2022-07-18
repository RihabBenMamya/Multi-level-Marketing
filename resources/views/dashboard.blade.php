<x-app-layout>
    <x-slot name="header_content">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item">Default Layout</div>
        </div>
    </x-slot>
    @if(Auth::check() and (Auth::user()->isAdvisor() == true))
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">


            <div >
                <i style="font-size: 100px;" class="fas fa-trophy">{{ $rankRevision }}</i>
            </div>

        </div>


        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
            <div class="p-6">
                <div class="flex items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400">
                        <i style="font-size: 30px;" class="fas fa-chart-line"></i> </svg>
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('personalScore.index') }}">Personal Score</a></div>
                </div>



                <div class="ml-24">
                    <div class="mt-4 text-sm text-gray-500">
                        {{ $personalScore }} dt
                    </div>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                <div class="flex items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400">
                        <i style="font-size: 30px;" class="fas fa-chart-bar"></i>
                    </svg>
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('teamScore.index') }}">Team Score</a></div>
                </div>
                <div class="ml-24">
                    <div class="mt-2 text-sm text-gray-500">
                        {{ $teamScore }} dt
                    </div>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200">
                <div class="flex items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400">
                        <i style="font-size: 30px;" class="fas fa-award"></i>
                    </svg>
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('teamBonuse.index') }}">Team Bonuse</a></div>
                </div>

                <div class="ml-24">
                    <div class="mt-2 text-sm text-gray-500">
                        {{ $teamBonuse }} dt
                    </div>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 md:border-l">
                <div class="flex items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400">
                        <i style="font-size: 30px;" class="fas fa-star"></i> </svg>
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('referralBonuse.index') }}">Referral Bonuse</a></div>
                </div>
                <div class="ml-24">
                    <div class="mt-2 text-sm text-gray-500">
                        {{ $referralBonuse }} dt
                    </div>
                </div>

            </div>
        </div>

    </div>
    @endif
</x-app-layout>
