@extends('layout.users.app')
@section('title')
    Transaction Receipt
@endsection
@section('main')
    <section class="w-full column g-10">
     
        <div class="w-full p-15px g-10px align-center br-10px column bg-light box-shadow border-width-1px border-style-solid border-color-rgt-01">
          @if ($data->class == 'credit')
                    <div style="background: #4caf50;color:white;min-width:0;" class="h-50 w-50 circle no-shrink column align-center justify-center">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
  <g fill="currentColor">
    <line x1="10" y1="3" x2="10" y2="17" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
    <polyline points="5 12 10 17 15 12" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline>
  </g>
</svg>
                </div>
             @else
                    <div style="background: red;color:white;" class="h-50 w-50 circle no-shrink column align-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
  <g fill="currentColor">
    <line x1="10" y1="17" x2="10" y2="3" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
    <polyline points="15 8 10 3 5 8" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline>
  </g>
</svg>
                </div>
             @endif
             <strong class="font-size-1 font-weight-700">{{ $data->title }}</strong>
             <strong class="font-size-1-5 font-weight-900">
                {{ Auth::guard('users')->user()->currency.number_format($data->amount,2) }}
             </strong>
             <div class="status {{ $data->status == 'success' ? 'green' : ($data->status == 'pending' ? 'gold' : 'red') }}">{{ $data->status }}</div>
      </div>
      {{-- new --}}
      <div class="w-full p-20px g-10px align-center br-10px column bg-light box-shadow border-width-1px border-style-solid border-color-rgt-01">
        <strong class="font-size-09 font-weight-600">Transaction Details</strong>
        {{-- new row --}}
        <div class="row g-10 space-between w-full">
            <span class="opacity-07">Transaction Type</span>
            <span class="font-weight-500 break-word text-align-end">{{ $data->title }}</span>
        </div>
        {{-- new row --}}
        <div class="row g-10 space-between w-full">
            <span class="opacity-07">Transaction ID</span>
            <span class="font-weight-500 break-word text-align-end row g-5 align-center">
                {{ $data->uniqid }}
                <i class="opacity-07" onclick="copy('{{ $data->uniqid }}')">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM5.00242 8L5.00019 20H14.9998V8H5.00242ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6Z"></path></svg>

                </i>
            </span>
        </div>
         {{-- new row --}}
        <div class="row g-10 space-between w-full">
            <span class="opacity-07 ws-nowrap">Session ID</span>
            <span class="font-weight-500 break-word text-align-end row g-5 align-center">
                {{ $session_id }}
                <i class="opacity-07" onclick="copy('{{ $session_id }}')">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM5.00242 8L5.00019 20H14.9998V8H5.00242ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6Z"></path></svg>

                </i>
            </span>
        </div>
         {{-- new row --}}
        <div class="row g-10 space-between w-full">
            <span class="opacity-07">Transaction Date</span>
            <span class="font-weight-500 break-word text-align-end">{{ $data->frame.$data->meridian }}</span>
        </div>
        @isset($data->data)
            @foreach (json_decode($data->data) as $key=>$value)
                  {{-- new row --}}
        <div class="row g-10 space-between w-full">
            <span class="opacity-07">{{ $key }}</span>
            <span class="font-weight-500 break-word text-align-end">{{ $value }}</span>
        </div>
            @endforeach
        @endisset
         {{-- new row --}}
        <div class="row g-10 space-between w-full">
            <span class="opacity-07">{{ ucwords($data->class) }}ed {{ $data->class == 'debit' ? 'from' : 'to' }}</span>
            <span class="font-weight-500 break-word text-align-end">{{ json_decode($data->wallet)->name ?? 'Main Wallet' }}</span>
        </div>
      </div>
     
    </section>
   
@endsection
