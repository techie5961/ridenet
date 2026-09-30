@extends('layout.users.app')
@section('title')
    Withdraw
@endsection
@section('css')
    <style class="css">
        input[name=amount]::placeholder{
            font-weight:900 !important;
        }
    </style>
@endsection

@section('main')
   <section x-data="{ 
    Amount : '',
    Wallet : '',
    Page : 'amount',
    WalletName : '',
    Balance : '',
    SuccessModal : false,
    Receipt : ''
    }" x-init="$watch('SuccessModal', (value) => {
      if(value){
        document.body.classList.add('overflow-hidden');
      }else{
        document.body.classList.remove('overflow-hidden')

      }  
    })" class="w-full column g-10px">
    <div class="row w-full align-center g-10px">
        <div class="column g-5px w-full">
            <div x-bind:class="Page == 'amount' ? 'bg-primary' : 'bg-rgt-01'" class="h-3px w-full br-1000px no-shrink"></div>
            <small>Amount</small>
        </div>
         <div class="column g-5px w-full">
            <div x-bind:class="Page == 'review' ? 'bg-primary' : 'bg-rgt-01'" class="h-3px w-full br-1000px no-shrink"></div>
            <small>Review</small>
        </div>
    </div>
     @isset(Auth::guard('users')->user()->bank)
                <div class="w-full g-10px border-width-1px border-style-solid border-color-rgt-01 bg-primary-01 br-1000px p-15px row align-center space-between">
                    <div class="bg-primary no-shrink h-50px w-50px circle primary-text column align-center justify-center">
                        @foreach (explode(' ',json_decode(Auth::guard('users')->user()->bank)->account_name,2) as $data)
                        {{ substr($data,0,1) }}    
                        @endforeach
                    </div>
                    {{-- new --}}
                    <div class="column g-5px m-right-auto">
                        <span class="uppercase ws-nowrap text-overflow-ellipsis">{{ json_decode(Auth::guard('users')->user()->bank)->account_name }}</span>
                 <div class="row g-5px align-center">
                       <span class="ws-nowrap text-overflow-ellipsis">{{ json_decode(Auth::guard('users')->user()->bank)->bank_name }}</span>
                  <span class="c-primary"> &bull;</span>
                       <span class="ws-nowrap text-overflow-ellipsis">{{ json_decode(Auth::guard('users')->user()->bank)->account_number }}</span>
                 
                 </div>
                    </div>
                     
                </div>
            @endisset
            {{-- amount --}}
           <div x-data="{ 
            Notify : false
            }" x-show="Page == 'amount'" class="w-full column g-10px">
             <div class="w-full column box-shadow p-15px g-20px br-10px bg-light border-width-1px border-style-solid border-color-rgt-01">
                {{-- new input --}}
                <div class="column g-5px w-full">
                    <label>Amount</label>
                    <div style="height:60px;" class="cont">
                        <div style="font-size:30px;" class="h-full perfect-square column align-center justify-center font-weight-900">
                            &#8358;
                        </div>
                        <input x-model="Amount" style="font-size:25px;font-weight:900;" name="amount" placeholder="0" type="number" inputmode="numeric" class="inp input required">
                    </div>
                    <small x-show="Amount == '' && Notify" class="c-red">Please enter withdrawal amount</small>
                </div>
                {{-- new --}}
                <div class="column g-5px">
                    <label>Select Wallet</label>
                    <div class="cont">
                        <select x-on:change="
                       WalletName=$el.options[$el.selectedIndex].dataset.name;
                       Balance=$el.options[$el.selectedIndex].dataset.balance;
                        " x-model="Wallet" name="" class="inp input required">
                            <option value="" selected disabled>Select Wallet...</option>
                           @foreach (json_decode(file_get_contents(database_path('data/wallets.json'))) as $wallet)
                               <option data-balance="{{ Auth::guard('users')->user()->{$wallet->key} }}" data-name="{{ $wallet->name }}" value="{{ $wallet->key }}">{{ $wallet->name }} - {{ Auth::guard('users')->user()->currency.number_format(Auth::guard('users')->user()->{$wallet->key}) }}</option> 
                           @endforeach
                        </select>
                    </div>
                    <small x-show="Wallet == '' && Notify" class="c-red">Please select withdrawal wallet</small>

                </div>
            </div>
            <div class="row w-full align-center space-between">
                  <button class="p-10px no-pointer opacity-05 filter-grayscale-100 p-x-20px br-1000px bg-primary primary-text">
                    Back
                </button>
                <button x-on:click="
                if(Amount == '' ||  Wallet == ''){
               Notify = true;

                }else{
                    Notify = false;
                    Page = 'review'
                }
                " class="p-10px p-x-20px br-1000px bg-primary primary-text">
                    Review
                </button>
            </div>
           </div>
           {{-- review --}}
             <div x-data="{ 
            Notify : false
            }" x-show="Page == 'review'" class="w-full column g-10px">
             <div class="w-full column box-shadow p-15px g-20px br-10px bg-light border-width-1px border-style-solid border-color-rgt-01">
                <div class="column w-full align-center g-5px">
                    <small>You are withdrawing</small>
                    <strong class="font-weight-900 desc" x-text="'{{ Auth::guard('users')->user()->currency }}' + FormatNumber(Amount,2)"></strong>
                </div>
            <div class="hr" vitecss-type="solid"></div>
               <div class="w-full column g-5px">
                 {{-- new row --}}
                <div class="row w-full align-center g-10px space-between">
                    <small>Transfer fee</small>
                    <span>&#8358;0.0</span>
                </div>
                 {{-- new row --}}
                <div class="row w-full align-center g-10px space-between">
                    <small>Total Debited</small>
                    <span x-text="'{{ Auth::guard('users')->user()->currency }}' + FormatNumber(Amount,2)"></span>
                </div>
                 {{-- new row --}}
                <div class="row w-full align-center g-10px space-between">
                    <small>Wallet From</small>
                    <span x-text="WalletName"></span>
                </div>
                 {{-- new row --}}
                <div class="row w-full align-center g-10px space-between">
                    <small>Available Balance</small>
                    <span x-text="'{{ Auth::guard('users')->user()->currency }}' + FormatNumber(Balance,2)"></span>
                </div>
                 {{-- new row --}}
                <div class="row w-full align-center g-10px space-between">
                    <small>Balance Afterwards</small>
                    <span x-text="'{{ Auth::guard('users')->user()->currency }}' + FormatNumber(Balance - Amount,2)"></span>
                </div>
               </div>
               <div class="hr" vitecss-type="solid"></div>
               <div class="w-full column g-5px">
                <div class="row align-center g-5px">
                    <i class="c-green h-fit row">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 32 32">
  <g fill="currentColor">
    <path d="m16,1C7.729,1,1,7.729,1,16s6.729,15,15,15,15-6.729,15-15S24.271,1,16,1Zm-2.43,21.985l-5.984-5.985,1.414-1.414,4.43,4.429,9.437-11.423,1.542,1.273-10.838,13.119Z" stroke-width="0" fill="currentColor"></path>
  </g>
</svg>
                    </i>
                    <span class="opacity-07">Account confirmed with your bank</span>
                </div>
                 <div class="row align-center g-5px">
                    <i class="c-green h-fit row">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 32 32">
  <g fill="currentColor">
    <path d="m16,1C7.729,1,1,7.729,1,16s6.729,15,15,15,15-6.729,15-15S24.271,1,16,1Zm-2.43,21.985l-5.984-5.985,1.414-1.414,4.43,4.429,9.437-11.423,1.542,1.273-10.838,13.119Z" stroke-width="0" fill="currentColor"></path>
  </g>
</svg>
                    </i>
                    <span class="opacity-07">Bank Network up</span>
                </div>
                <div class="row align-center g-5px">
                    <i class="c-green h-fit row">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 32 32">
  <g fill="currentColor">
    <path d="m16,1C7.729,1,1,7.729,1,16s6.729,15,15,15,15-6.729,15-15S24.271,1,16,1Zm-2.43,21.985l-5.984-5.985,1.414-1.414,4.43,4.429,9.437-11.423,1.542,1.273-10.838,13.119Z" stroke-width="0" fill="currentColor"></path>
  </g>
</svg>
                    </i>
                    <span class="opacity-07">Zero withdrawal fee</span>
                </div>
               </div>
               <div class="w-full p-15px br-1000px bg-primary-01 c-primary row font-weight-300 g-10px">
                <svg class="no-shrink" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
  <g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt">
    <circle cx="12" cy="12" r="10" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></circle>
    <path d="m12,17v-5.5c0-.276-.224-.5-.5-.5h-1.5" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
    <circle cx="12" cy="7.25" r="1.25" fill="currentColor" stroke-width="0"></circle>
  </g>
</svg>
<span>
    Please ensure the bank linked to your account is your actual accout to avoild loss of funds.
</span>
               </div>
            </div>
            
            <div class="row w-full align-center space-between">
                  <button x-on:click="Page = 'amount'" class="p-10px p-x-20px br-1000px bg-primary primary-text">
                    Back
                </button>
                <button x-data="{ 
                   Submitting : false 
                 }" x-on:click="
                 Submitting = true;
                SendPostRequest('{{ url('users/post/withdraw/process') }}',{
                    '_token' : '{{ @csrf_token() }}',
                    'amount' : Amount,
                    'wallet' : Wallet
                },function(response,error){
                    Submitting= false;
                    let data= JSON.parse(response);
                   if(data.status == 'success'){
                    SuccessModal = true;
                    Receipt = data.url;
                   }else{
                     CreateNotify(data.status,data.message);
                   }
                })
                " x-bind:class="Submitting ? 'disabled' : ''" class="p-10px p-x-20px row align-center g-5px br-1000px bg-primary primary-text">
                <i x-show="Submitting" class="row h-fit">
                    <?xml version="1.0" encoding="utf-8"?><svg height="15" width="15" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2400 2400" xml:space="preserve"><g stroke-width="200" stroke-linecap="round" stroke="currentColor" fill="none" id="spinner"><line x1="1200" y1="600" x2="1200" y2="100"/><line opacity="0.5" x1="1200" y1="2300" x2="1200" y2="1800"/><line opacity="0.917" x1="900" y1="680.4" x2="650" y2="247.4"/><line opacity="0.417" x1="1750" y1="2152.6" x2="1500" y2="1719.6"/><line opacity="0.833" x1="680.4" y1="900" x2="247.4" y2="650"/><line opacity="0.333" x1="2152.6" y1="1750" x2="1719.6" y2="1500"/><line opacity="0.75" x1="600" y1="1200" x2="100" y2="1200"/><line opacity="0.25" x1="2300" y1="1200" x2="1800" y2="1200"/><line opacity="0.667" x1="680.4" y1="1500" x2="247.4" y2="1750"/><line opacity="0.167" x1="2152.6" y1="650" x2="1719.6" y2="900"/><line opacity="0.583" x1="900" y1="1719.6" x2="650" y2="2152.6"/><line opacity="0.083" x1="1750" y1="247.4" x2="1500" y2="680.4"/><animateTransform attributeName="transform" attributeType="XML" type="rotate" keyTimes="0;0.08333;0.16667;0.25;0.33333;0.41667;0.5;0.58333;0.66667;0.75;0.83333;0.91667" values="0 1199 1199;30 1199 1199;60 1199 1199;90 1199 1199;120 1199 1199;150 1199 1199;180 1199 1199;210 1199 1199;240 1199 1199;270 1199 1199;300 1199 1199;330 1199 1199" dur="0.83333s" begin="0s" repeatCount="indefinite" calcMode="discrete"/></g></svg>

                </i>
                <span x-show="Submitting">Placing Withdrawal...</span>
                <span x-show="!Submitting">Place Withdrawal</span>
                </button>
            </div>
           </div>
           <section x-show="SuccessModal" x-transition:enter-start="fade-enter" x-transition:enter-end="fade-enter-end" x-transition:leave-start="fade-leave" x-transition:leave-end="fade-leave-end" style="background:#22ad80;color:white;" class="pos-fixed transition-all p-50px column align-center justify-center g-10px inset-0 z-index-4000">
            <div x-text="'{{ Auth::guard('users')->user()->currency }}' + FormatNumber(Amount)" class="p-15px m-bottom-20px pos-relative font-weight-900 font-size-1-5rem br-15px bg-black-transparent">
                <div style="transform:translate(50%,50%);right:50%;" class="pos-absolute column align-center justify-center bg-white h-20px w-20px circle bottom-0 c-green">
<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
  <g fill="currentColor">
    <path d="m4.01,10.754c-.225.007-.458-.111-.6-.3l-2.25-3c-.249-.332-.181-.802.15-1.05.333-.248.802-.181,1.05.15l1.652,2.203L9.642,1.294c.25-.331.72-.396,1.05-.147.331.25.396.72.147,1.05l-6.23,8.258c-.142.188-.363.298-.599.298Z" stroke-width="0" fill="currentColor"></path>
  </g>
</svg>
                </div>
            </div>
            <strong class="desc text-align-center font-weight-800">Withdrawal Placed Successfully</strong>
            <span class="font-size-1rem">You withdrew <span class="font-weight-900" x-text="'{{ Auth::guard('users')->user()->currency }}' + FormatNumber(Amount)"></span> to <span class="uppercase">{{ json_decode(Auth::guard('users')->user()->bank)->bank_name }}</span></span>
           <div x-on:click="Vitecss.navigate('{{ url('users/transactions') }}')" class="border-bottom-width-1px border-bottom-style-solid border-bottom-color-white">
            View Transactions
           </div>
           <div class="column m-top-auto w-full g-10px">
            <div x-on:click="Vitecss.navigate(Receipt)" style="background:rgba(255,255,255,0.3)" class="p-15px h-50px font-size-1rem br-1000px bg-white-transparent row align-center justify-center">
                View Receipt
            </div>
            <div x-on:click="
            SuccessModal = false;
            setTimeout(() => {
                Vitecss.navigate('{{ url()->current() }}')
            }, 300);
            " style="background:rgba(255,255,255);color:black;" class="p-15px font-size-1rem h-50px br-1000px bg-white-transparent row align-center justify-center">
                Done
            </div>
           </div>
        </section>
   </section>
@endsection
