@extends('layout.users.app')
@section('title')
    Transactions
@endsection
@section('main')
    <section class="w-full column g-10">
      
        @if ($trx->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'No Transactions found'
            ])
        @else
                <strong class="desc font-weight-900">Transaction History</strong>
             <div class="grid w-full g-10 pc-grid-2">
                   @foreach ($trx as $data)
                        <div style="box-shadow: 0 0 10px rgba(0,0,0,0.1)" class="w-full g-10 column g-10 br-10 p-20 bg-light">
                            {{-- new row --}}
                            <div style="border-bottom:1px solid var(--rgt-01);padding-bottom:10px;" class="row w-full g-10 align-center space-between">
                               {{-- new column --}}
                                <div class="column g-5">
                                    <small class="opacity-07">Transaction ID</small>
                                    <div class="row g-5px">
                                        <span class=" font-size-09">{{ $data->uniqid }}</span>
                                        <i x-data="{ 
                                            Copied : false
                                         }" x-on:click="
                                        copy('{{ $data->uniqid }}');
                                        Copied = true;
                                        setTimeout(()=>{
                                            Copied = false;
                                        },2000)
                                        " class="h-fit row m-top-auto">
                                            <svg x-show="!Copied" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M180,64H40A12,12,0,0,0,28,76V216a12,12,0,0,0,12,12H180a12,12,0,0,0,12-12V76A12,12,0,0,0,180,64ZM168,204H52V88H168ZM228,40V180a12,12,0,0,1-24,0V52H76a12,12,0,0,1,0-24H216A12,12,0,0,1,228,40Z"></path></svg>
                                         <svg x-show="Copied" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="c-green" fill="CurrentColor" height="15" width="15"><path d="M176.49,95.51a12,12,0,0,1,0,17l-56,56a12,12,0,0,1-17,0l-24-24a12,12,0,1,1,17-17L112,143l47.51-47.52A12,12,0,0,1,176.49,95.51ZM236,128A108,108,0,1,1,128,20,108.12,108.12,0,0,1,236,128Zm-24,0a84,84,0,1,0-84,84A84.09,84.09,0,0,0,212,128Z"></path></svg>

                                        </i>
                                    </div>
                                </div>
                                 {{-- new column --}}
                                <div class="column text-end g-5">
                                    <small class="opacity-07">Amount</small>
                                    <span class="font-weight-900 font-size-1 {{ $data->class == 'credit' ? 'c-green': 'c-red' }}">{{ $data->class == 'credit' ? '+' : '-' }}{{ Auth::guard('users')->user()->currency.number_format($data->amount) }}</span>
                                </div>
                            </div>
                             {{-- new row --}}
                            <div style="border-bottom:1px solid var(--rgt-01);padding-bottom:10px;" class="row w-full g-10 align-center space-between">
                               {{-- new column --}}
                                <div class="row opacity-07 align-center g-5">
                                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM13 12H17V14H11V7H13V12Z"></path></svg>

                                    <span>{{ $data->frame }}</span>
                                </div>
                                 {{-- new column --}}
                                <div class="column g-5">
                                    <div class="status {{ $data->status == 'success' ? 'green' : ($data->status == 'pending' ? 'gold' : ($data->status == 'rejected' || $data->status == 'failed' ? 'red' : 'status-info')) }}">{{ $data->status }}</div>
                                </div>
                            </div>
                             {{-- new row --}}
                            <div class="row font-weight-700 w-full g-10 align-center space-between">
                               {{ $data->title }}
                            </div>
                        </div>
                    @endforeach
             </div>
              @if ($trx->lastPage() > 1)
                  @include('components.utilities',[
                    'paginate' => true,
                    'data' => $trx
                  ])
              @endif
        @endif
    </section>
@endsection