@extends('layout.users.app')
@section('title')
   My Referrals
@endsection
@section('main')
  <section class="w-full column g-10">
    {{-- new column --}}
    <div class="column g-5px">
        <strong class="font-weight-900 desc">My Referrals</strong>
        <span class="opacity-07">Invite your friends and families and earn commissions.</span>
    </div>
    <div x-data="{ 
        Copied : false,
        Link : '{{ url('register?ref='.Auth::guard('users')->user()->username.'') }}'
     }" class="w-full border-width-1px border-style-solid border-color-primary-05 p-10px br-5px row align-center g-10px">
        <div x-text="Link" class="ws-nowrap text-overflow-ellipsis"></div>
    <i>
        <svg x-on:click="
        Copied = true;
        copy(Link);
        setTimeout(() => {
            Copied = false;
        }, 2000);
        " x-show="!Copied" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
  <g fill="currentColor">
    <path d="m13,7h2c1.105,0,2,.895,2,2v6c0,1.105-.895,2-2,2h-6c-1.105,0-2-.895-2-2v-2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
    <rect x="3" y="3" width="10" height="10" rx="2" ry="2" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" fill="currentColor"></rect>
  </g>
</svg>
<svg x-show="Copied" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
  <g fill="currentColor">
    <path d="m16,1C7.729,1,1,7.729,1,16s6.729,15,15,15,15-6.729,15-15S24.271,1,16,1Zm-2.43,21.985l-5.984-5.985,1.414-1.414,4.43,4.429,9.437-11.423,1.542,1.273-10.838,13.119Z" stroke-width="0" fill="currentColor"></path>
  </g>
</svg>
    </i>
    </div>
  
        {{-- referrals --}}
        @if ($referrals->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'No referrals yet',
                'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="50" width="50"><path d="M12 11C14.7614 11 17 13.2386 17 16V22H15V16C15 14.4023 13.7511 13.0963 12.1763 13.0051L12 13C10.4023 13 9.09634 14.2489 9.00509 15.8237L9 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5.5 14C5.77885 14 6.05009 14.0326 6.3101 14.0942C6.14202 14.594 6.03873 15.122 6.00896 15.6693L6 16L6.0007 16.0856C5.88757 16.0456 5.76821 16.0187 5.64446 16.0069L5.5 16C4.7203 16 4.07955 16.5949 4.00687 17.3555L4 17.5V22H2V17.5C2 15.567 3.567 14 5.5 14ZM18.5 14C20.433 14 22 15.567 22 17.5V22H20V17.5C20 16.7203 19.4051 16.0796 18.6445 16.0069L18.5 16C18.3248 16 18.1566 16.03 18.0003 16.0852L18 16C18 15.3343 17.8916 14.694 17.6915 14.0956C17.9499 14.0326 18.2211 14 18.5 14ZM5.5 8C6.88071 8 8 9.11929 8 10.5C8 11.8807 6.88071 13 5.5 13C4.11929 13 3 11.8807 3 10.5C3 9.11929 4.11929 8 5.5 8ZM18.5 8C19.8807 8 21 9.11929 21 10.5C21 11.8807 19.8807 13 18.5 13C17.1193 13 16 11.8807 16 10.5C16 9.11929 17.1193 8 18.5 8ZM5.5 10C5.22386 10 5 10.2239 5 10.5C5 10.7761 5.22386 11 5.5 11C5.77614 11 6 10.7761 6 10.5C6 10.2239 5.77614 10 5.5 10ZM18.5 10C18.2239 10 18 10.2239 18 10.5C18 10.7761 18.2239 11 18.5 11C18.7761 11 19 10.7761 19 10.5C19 10.2239 18.7761 10 18.5 10ZM12 2C14.2091 2 16 3.79086 16 6C16 8.20914 14.2091 10 12 10C9.79086 10 8 8.20914 8 6C8 3.79086 9.79086 2 12 2ZM12 4C10.8954 4 10 4.89543 10 6C10 7.10457 10.8954 8 12 8C13.1046 8 14 7.10457 14 6C14 4.89543 13.1046 4 12 4Z"></path></svg>'
            ])
        @else
        <strong class="font-size-1rem font-weight-900">Referral History</strong>
          <div class="w-full grid g-10px pc-grid-2 place-center">
              @foreach ($referrals as $data)
                <div class="w-full bg-light p-20px br-10px column">
                    {{-- new row --}}
                    <div class="row w-full g-10 align-center space-between">
                        <div class="h-50px w-50px perfect-square circle no-shrink">
                            @isset($data->photo)
                                <img src="{{ asset('photos/users/'.$data->photo.'') }}" alt="" class="h-full w-full br-inherit no-pointer no-select">
                            @else
                                <div class="w-full uppercase h-full column br-inherit align-center g-10 justify-center bg-primary primary-text no-select no-pointer">
                                    {{ substr(explode(' ',$data->name)[0],0,1).substr(explode(' ',$data->name)[1],0,1) }}
                                </div>
                            @endisset
                        </div>
                        {{-- new column --}}
                        <div class="column m-right-auto g-2px">
                            <strong class="font-weight-800">{{ '@'.$data->username }}</strong>
                            <small class="opacity-07">{{ $data->time }}</small>
                        </div>
                        {{-- new --}}
                        <div class="status {{ $data->status == 'active' ? 'green' : 'red' }}">{{ $data->status }}</div>
                    </div>
                </div>
            @endforeach
          </div>
            @if ($referrals->lastPage() > 1)
                @include('components.utilities',[
                    'paginate' => true,
                    'data' => $referrals
                ])
            @endif
        @endif
  </section>
@endsection