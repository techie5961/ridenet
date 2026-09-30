@extends('layout.users.app')
@section('title')
    Vendorss Dashboard
@endsection
@section('css')
    <style class="css">
        .analysis:hover{
            border-color:var(--primary);
            transform:scale(1.01);
            box-shadow: 0 0 20px var(--primary-05)
            
        }
        .analysis:hover svg{
            fill:var(--secondary);
        }
        .filter .child{
          transform:scale(0);
          transform-origin: top center;
            color:var(--text);
            transition: all 0.5s ease;
            top:calc(100% + 5px);
            pointer-events: none;
        }
        .filter.active .child{
            transform:scale(1);
            pointer-events:auto;

        }
        .filter .child > div{
            transition: all 0.5s ease;
            cursor: pointer;
        }
        .filter .child > div:hover{
            background:var(--rgt-01);
        }
    </style>
@endsection
@section('main')
    <section class="w-full column g-10">
        {{-- new analytics --}}
        <div onclick="return;" class="w-full p-20px box-shadow br-10px bg-light column g-10px">
            {{-- new row --}}
            <div class="w-full row align-center g-10 space-between">
                <span>Total Codes</span>
                <i class="c-primary opacity-05">
<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 18 18">
  <g fill="currentColor"><path d="M14.25 3.75H8.25C8.25 4.578 7.578 5.25 6.75 5.25C5.922 5.25 5.25 4.578 5.25 3.75H3.75C2.645 3.75 1.75 4.646 1.75 5.75V12.25C1.75 13.354 2.645 14.25 3.75 14.25H5.25C5.25 13.422 5.922 12.75 6.75 12.75C7.578 12.75 8.25 13.422 8.25 14.25H14.25C15.355 14.25 16.25 13.354 16.25 12.25V5.75C16.25 4.646 15.355 3.75 14.25 3.75Z" fill="currentColor" fill-opacity="0.3" data-stroke="none" stroke="none"></path> <path d="M6.75 8.313C7.16421 8.313 7.5 7.97722 7.5 7.563C7.5 7.14879 7.16421 6.813 6.75 6.813C6.33579 6.813 6 7.14879 6 7.563C6 7.97722 6.33579 8.313 6.75 8.313Z" fill="currentColor" data-stroke="none" stroke="none"></path> <path d="M6.75 11.187C7.16421 11.187 7.5 10.8512 7.5 10.437C7.5 10.0228 7.16421 9.687 6.75 9.687C6.33579 9.687 6 10.0228 6 10.437C6 10.8512 6.33579 11.187 6.75 11.187Z" fill="currentColor" data-stroke="none" stroke="none"></path> <path d="M14.25 3.75H8.25C8.25 4.578 7.578 5.25 6.75 5.25C5.922 5.25 5.25 4.578 5.25 3.75H3.75C2.645 3.75 1.75 4.646 1.75 5.75V12.25C1.75 13.354 2.645 14.25 3.75 14.25H5.25C5.25 13.422 5.922 12.75 6.75 12.75C7.578 12.75 8.25 13.422 8.25 14.25H14.25C15.355 14.25 16.25 13.354 16.25 12.25V5.75C16.25 4.646 15.355 3.75 14.25 3.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path></g>
</svg>
                </i>
            </div>
            <strong class="font-weight-900 font-size-1-3rem">{{ $total }}</strong>
        </div>
        {{-- new analytics --}}
         <div onclick="return;" class="w-full p-20px box-shadow br-10px bg-light column g-10px">
            {{-- new row --}}
            <div class="w-full row align-center g-10 space-between">
                <span>Total Active Codes</span>
                <i class="c-primary opacity-05">
<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 18 18">
  <g fill="currentColor"><path d="M3.49402 5.25C4.46002 5.25 5.24402 4.466 5.24402 3.5C5.24402 2.534 4.46002 1.75 3.49402 1.75C2.52702 1.75 1.74402 2.534 1.74402 3.5C1.74402 4.466 2.52702 5.25 3.49402 5.25Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M2.70099 5.06L10.5 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M3.49402 11.25C4.46002 11.25 5.24402 10.466 5.24402 9.5C5.24402 8.534 4.46002 7.75 3.49402 7.75C2.52702 7.75 1.74402 8.534 1.74402 9.5C1.74402 10.466 2.52702 11.25 3.49402 11.25Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M2.70099 7.94L10.5 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M4.00488 14.209C4.34508 14.8267 4.99448 15.25 5.74998 15.25H14.25C15.355 15.25 16.25 14.355 16.25 13.25V8.25C16.25 7.145 15.355 6.25 14.25 6.25H12.4467" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path></g>
</svg>
                </i>
            </div>
            <strong class="font-weight-900 font-size-1-3rem">{{ $active }}</strong>
        </div>
        @if ($total > 0)
             {{-- filter --}}
       <div x-data="{ 
        
        }" onclick="this.classList.contains('active') ? this.classList.remove('active') : this.classList.add('active')" class="pos-relative filter transition-all w-fit br-5px border-width-1px border-color-primary c-primary border-style-solid bg row align-center justify-center g-10px">
       <div class="w-full p-10px row align-center g-10px">
         <i class="row h-fit">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M2.00488 9.49966V3.99966C2.00488 3.44738 2.4526 2.99966 3.00488 2.99966H21.0049C21.5572 2.99966 22.0049 3.44738 22.0049 3.99966V9.49966C20.6242 9.49966 19.5049 10.619 19.5049 11.9997C19.5049 13.3804 20.6242 14.4997 22.0049 14.4997V19.9997C22.0049 20.5519 21.5572 20.9997 21.0049 20.9997H3.00488C2.4526 20.9997 2.00488 20.5519 2.00488 19.9997V14.4997C3.38559 14.4997 4.50488 13.3804 4.50488 11.9997C4.50488 10.619 3.38559 9.49966 2.00488 9.49966ZM9.00488 8.99966V10.9997H15.0049V8.99966H9.00488ZM9.00488 12.9997V14.9997H15.0049V12.9997H9.00488Z"></path></svg>

        </i>
       <span class="row h-fit">
         Available Codes
       </span>
        <i class="row h-fit">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg>

        </i>
       
       </div>
        {{-- dropdown --}}
        <div onclick="event.stopPropagation();" class="border-width-1px child border-style-solid border-color-primary-05 column  bg border-width-1px border-color-rgt-0 pos-absolute br-5px overflow-hidden z-index-500 min-w-full p-y-10px top-full left-0">
            {{-- new row --}}
            <div onclick="Redirect('{{ url()->current() }}')" class="row p-x-20px p-10px align-center g-10">
               Available Codes
            </div>
             {{-- new row --}}
            <div onclick="Redirect('{{ url()->current().'?status=active' }}')" class="row p-x-20px p-10px align-center g-10">
               Active Codes
            </div>
             {{-- new row --}}
            <div onclick="Redirect('{{ url()->current().'?status=used' }}')" class="row p-x-20px p-10px align-center g-10">
                Used Codes
            </div>
        </div>
       </div>
        @endif
        {{-- coupons --}}
        @if ($coupons->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'No coupon code available'
            ])
        @else
       <div class="column">
         <strong class="font-weight-900 desc">My Assigned Codes</strong>
        <span class="opacity-07">Manage and copy coupon codes assigned to your account.</span>
       </div>
      
       {{-- grid-loop --}}
       <div class="grid pc-grid-2 g-10px place-center">
         @foreach ($coupons as $data)
                <div class="w-full bg-light br-10px p-20px box-shadow column g-10px ">
                    {{-- new row --}}
                    <div class="row w-full g-10 space-between align-center flex-wrap">
                        <div class="p-5 p-x-10px bg-primary primary-text br-5px no-select row align-center g-5px">
                            <span>{{ $data->uniqid }}</span>
                            <i class="row align-center h-fit" onclick="copy('{{ $data->uniqid }}')">
                                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6Z"></path></svg>

                            </i>
                        </div>
                        {{-- status --}}
                        <div class="status {{ $data->status == 'active' ? 'green' : 'status-info' }}">{{ $data->status }}</div>
                    </div>
                    <div class="hr" vitecss-type="dashed"></div>
                    {{-- new row --}}
                    <div class="row align-center g-10">
                        <span class="opacity-07">Package: </span>
                        <span>{{ json_decode($data->package)->name->value }} ({{ ucwords(json_decode($data->package)->country->value) }})</span>
                    </div>
                      {{-- new row --}}
                    <div class="row align-center g-10">
                        <span class="opacity-07">Assigned: </span>
                        <span>{{ $data->assigned }}</span>
                    </div>
                       {{-- new row --}}
                    <div class="row align-center g-10">
                        <span class="opacity-07">Used By: </span>
                        @isset($data->user)
                        <span>{{ ucwords($data->user) }}</span>
                            @else
                        <i class="opacity-07">NOT USED</i>

                        @endisset
                    </div>
                      {{-- new row --}}
                    <div class="row align-center g-10">
                        <span class="opacity-07">User Referred by: </span>
                          @isset($data->user_ref)
                        <span>{{ ucwords($data->user_ref) }}</span>
                            @else
                        <i class="opacity-07">NULL</i>

                        @endisset
                    </div>
                    @isset($data->used_on)
                          {{-- new row --}}
                    <div class="row align-center g-10">
                        <span class="opacity-07">Used: </span>
                        <span>{{ ucwords($data->used_on) }}</span>
                    </div>
                    @endisset
                </div>
            @endforeach
       </div>
           @if ($coupons->lastPage() > 1)
               @include('components.utilities',[
                'paginate' => true,
                'data' => $coupons
               ])
           @endif
        @endif
    </section>
@endsection