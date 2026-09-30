@extends('layout.admins.app')
@section('title')
    Gaming History
@endsection
@section('main')
    <section class="w-full column g-10px">
        {{-- analytic --}}
        <div class="w-full row g-10px br-10px bg-light box-shadow p-20px">
            <div class="bg-green w-50px perfect-square column align-center justify-center br-10px c-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 18 18">
  <title>gamepad</title>
  <g fill="currentColor">
    <path d="M17.632,11.77l-1.99-6.793c-.342-1.164-1.427-1.977-2.64-1.977H4.998c-1.213,0-2.298,.812-2.64,1.977L.37,11.764c-.081,.259-.12,.5-.12,.736,0,1.378,1.121,2.5,2.5,2.5,.797,0,1.553-.388,2.024-1.041l1.048-1.459h6.355l1.049,1.461c.471,.651,1.227,1.039,2.023,1.039,1.379,0,2.5-1.122,2.5-2.5,0-.234-.038-.473-.118-.73Zm-10.132-3.27h-.5v.5c0,.414-.336,.75-.75,.75s-.75-.336-.75-.75v-.5h-.5c-.414,0-.75-.336-.75-.75s.336-.75,.75-.75h.5v-.5c0-.414,.336-.75,.75-.75s.75,.336,.75,.75v.5h.5c.414,0,.75,.336,.75,.75s-.336,.75-.75,.75Zm3.25,1c-.414,0-.75-.336-.75-.75s.336-.75,.75-.75,.75,.336,.75,.75-.336,.75-.75,.75Zm1.5-2c-.414,0-.75-.336-.75-.75s.336-.75,.75-.75,.75,.336,.75,.75-.336,.75-.75,.75Z" fill="currentColor"></path>
  </g>
</svg>

            </div>
            {{-- new column --}}
            <div class="column g-5px">
                <span>Total games won</span>
                <strong class="desc font-weight-900">{{ number_format($total) }}</strong>
            </div>
        </div>
          {{-- analytic --}}
        <div class="w-full row g-10px br-10px bg-light box-shadow p-20px">
            <div class="bg-green w-50px perfect-square column align-center justify-center br-10px c-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 18 18">
  <title>gamepad</title>
  <g fill="currentColor">
    <circle cx="10.75" cy="8.75" r=".75" fill="currentColor" data-stroke="none" stroke="none"></circle>
    <circle cx="12.25" cy="6.75" r=".75" fill="currentColor" data-stroke="none" stroke="none"></circle>
    <line x1="6.25" y1="6.5" x2="6.25" y2="9" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></line>
    <line x1="7.5" y1="7.75" x2="5" y2="7.75" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></line>
    <path d="M16.914,11.986l-1.993-6.799c-.25-.852-1.031-1.438-1.919-1.438H4.998c-.888,0-1.669,.585-1.919,1.438l-1.993,6.799c-.051,.163-.086,.333-.086,.514,0,.967,.784,1.75,1.75,1.75,.584,0,1.098-.289,1.415-.728l1.272-1.772h7.124l1.272,1.772c.318,.439,.832,.728,1.415,.728,.966,0,1.75-.783,1.75-1.75,0-.18-.035-.35-.086-.514Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
  </g>
</svg>

            </div>
            {{-- new column --}}
            <div class="column g-5px">
                <span>Total games played</span>
                <strong class="desc font-weight-900">{{ number_format($won) }}</strong>
            </div>
        </div>
          {{-- analytic --}}
        <div class="w-full row g-10px br-10px bg-light box-shadow p-20px">
            <div class="bg-green w-50px perfect-square column align-center justify-center br-10px c-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 18 18">
  <title>gamepad</title>
  <g fill="currentColor">
    <circle cx="10.75" cy="8.75" r=".75" fill="currentColor" data-stroke="none" stroke="none"></circle>
    <circle cx="12.25" cy="6.75" r=".75" fill="currentColor" data-stroke="none" stroke="none"></circle>
    <line x1="6.25" y1="6.5" x2="6.25" y2="9" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></line>
    <line x1="7.5" y1="7.75" x2="5" y2="7.75" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></line>
    <path d="M16.914,11.986l-1.993-6.799c-.25-.852-1.031-1.438-1.919-1.438H4.998c-.888,0-1.669,.585-1.919,1.438l-1.993,6.799c-.051,.163-.086,.333-.086,.514,0,.967,.784,1.75,1.75,1.75,.584,0,1.098-.289,1.415-.728l1.272-1.772h7.124l1.272,1.772c.318,.439,.832,.728,1.415,.728,.966,0,1.75-.783,1.75-1.75,0-.18-.035-.35-.086-.514Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
  </g>
</svg>


            </div>
            {{-- new column --}}
            <div class="column g-5px">
                <span>Total games lost</span>
                <strong class="desc font-weight-900">{{ number_format($lost) }}</strong>
            </div>
        </div>
        <div class="m-top-10px"></div>
        @if ($gamings->isEmpty())
            @include('components.utilities',[
                'text' => 'No games played yet',
                'empty' => true
            ])
        @else
        <strong class="font-weight-900 font-size-1-3">Gaming History</strong>
            @foreach ($gamings as $data)
                <div class="w-full column p-20px g-10px br-10px bg-light box-shadow">
                    {{-- new row --}}
                    <div class="row align-center flex-wrap g-10px space-between">
                        <strong class="font-size-1 font-weight-900">{{ $data->game }}</strong>
                        <div class="status {{ $data->status == 'lost' ? 'red' : 'green' }}">{{ $data->status }}</div>
                    </div>
                    <div class="hr" vitecss-type="dashed"></div>
                    {{-- new row --}}
                    <div class="row align-center g-10px">
                        <span class="opacity-07">User:</span>
                        <span x-data="{  }" x-on:click="window.location.href='{{ url('admins/user?id='.$data->user_id.'') }}'" class="uppercase pointer c-primary no-select u">{{ $data->user->username }}</span>
                    </div>
                    {{-- new row --}}
                    <div class="row align-center g-10px">
                        <span class="opacity-07">Session ID:</span>
                        <span>{{ $data->session_id }}</span>
                    </div>
                     {{-- new row --}}
                    <div class="row align-center g-10px">
                        <span class="opacity-07">Stake:</span>
                        <span class="font-weight-800">&#8358;{{ number_format($data->stake,2) }}</span>
                    </div>
                     {{-- new row --}}
                    <div class="row align-center g-10px">
                        <span class="opacity-07">Won:</span>
                        <span class="font-weight-800">&#8358;{{ number_format($data->win,2) }}</span>
                    </div>
                     {{-- new row --}}
                    <div class="row align-center g-10px">
                        <span class="opacity-07">Played:</span>
                        <span>{{ $data->updated }}</span>
                    </div>
                </div>
            @endforeach
            @if ($gamings->lastPage() > 1)
                @include('components.utilities',[
                    'paginate' => true,
                    'data' => $gamings
                ])
            @endif
        @endif
    </section>
@endsection