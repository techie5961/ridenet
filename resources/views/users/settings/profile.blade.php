@extends('layout.users.app')
@section('title')
    Profile Settings
@endsection
@section('css')
    <style class="css">
        .cont{
            height:40px !important;
        }
        .cont.readonly .inp{
            /* color:var(--rgt-05) */
        }
        .cont.readonly{
            opacity:0.5;
            pointer-events:none;
        }
        button.post{
            height:40px;
            border-radius:10px;
        }
    </style>
@endsection
@section('main')
    <section x-data="{ 
        Page : '{{ request('page','profile') }}',
        BankOverlay : false,
        Bank : {
            Name : '',
            ID : '',
            Selected : false,
            Verifying : false,
            Response : {
                Message : '',
                Status : '',
                Active : false
            }
        },
        AccountNumber : '',
        AccountName : ''
     }" x-init="$watch('Bank.ID', (value) => {
        if(value && AccountNumber.length == 10){
            Bank.Verifying = true;
            AccountName = '';
             Bank.Response.Status ='';
             Bank.Response.Message = '';
             Bank.Response.Active = false;
            SendPostRequest('{{ url('users/post/verify/korapay/bank/process') }}',{
                '_token' : '{{ @csrf_token() }}',
                'account_number' : AccountNumber,
                'bank_code' : Bank.ID
            },function(response){
                let data=JSON.parse(response);
                Bank.Verifying = false;
                if(data.status == 'error'){
                Bank.Response.Status = data.status;
                Bank.Response.Message = data.message;
                Bank.Response.Active = true;
                }else{
                    AccountName = data.message;
                }
               
            })
        }
     });
     $watch('AccountNumber', (value) => {
        if(Bank.ID && value.length == 10){
            Bank.Verifying = true;
            AccountName = '';
             Bank.Response.Status ='';
             Bank.Response.Message = '';
             Bank.Response.Active = false;
            SendPostRequest('{{ url('users/post/verify/korapay/bank/process') }}',{
                '_token' : '{{ @csrf_token() }}',
                'account_number' : AccountNumber,
                'bank_code' : Bank.ID
            },function(response){
                let data=JSON.parse(response);
                Bank.Verifying = false;
                if(data.status == 'error'){
                Bank.Response.Status = data.status;
                Bank.Response.Message = data.message;
                Bank.Response.Active = true;
                }else{
                    AccountName = data.message;
                }
               
            })
        }
     })
     " class="w-full column g-10px">
        <div class="column w-full">
            <strong class="font-size-1rem font-weight-900">
                Settings
            </strong>
            <span class="font-size-07rem font-weight-300">Your Profile, Security and Bank settings</span>
        </div>
        <div class="w-full br-10px column overflow-auto bg-light p-15px border-width-1px border-style-solid border-color-rgt-01 box-shadow">
            <div class="row border-bottom-width-1px border-bottom-style-solid border-bottom-color-rgt-02 align-center w-full">
                {{-- new --}}
                <div x-on:click="Page = 'profile'" x-bind:class="Page == 'profile' ? 'border-bottom-width-2px border-bottom-color-primary border-bottom-style-solid' : ''" class="row p-20px align-center g-10px w-fit">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M8.25 9C8.25 6.92893 9.92893 5.25 12 5.25C14.0711 5.25 15.75 6.92893 15.75 9C15.75 11.0711 14.0711 12.75 12 12.75C9.92893 12.75 8.25 11.0711 8.25 9ZM12 6.75C10.7574 6.75 9.75 7.75736 9.75 9C9.75 10.2426 10.7574 11.25 12 11.25C13.2426 11.25 14.25 10.2426 14.25 9C14.25 7.75736 13.2426 6.75 12 6.75Z" fill="CurrentColor" "=""></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M1.25 12C1.25 6.06294 6.06294 1.25 12 1.25C17.9371 1.25 22.75 6.06294 22.75 12C22.75 17.9371 17.9371 22.75 12 22.75C6.06294 22.75 1.25 17.9371 1.25 12ZM12 2.75C6.89137 2.75 2.75 6.89137 2.75 12C2.75 14.5456 3.77827 16.851 5.4421 18.5235C5.6225 17.5504 5.97694 16.6329 6.68837 15.8951C7.75252 14.7915 9.45416 14.25 12 14.25C14.5457 14.25 16.2474 14.7915 17.3115 15.8951C18.023 16.6329 18.3774 17.5505 18.5578 18.5236C20.2217 16.8511 21.25 14.5456 21.25 12C21.25 6.89137 17.1086 2.75 12 2.75ZM17.1937 19.6554C17.0918 18.4435 16.8286 17.5553 16.2318 16.9363C15.5823 16.2628 14.3789 15.75 12 15.75C9.62099 15.75 8.41761 16.2628 7.76815 16.9363C7.17127 17.5553 6.90811 18.4434 6.80622 19.6553C8.28684 20.6618 10.0747 21.25 12 21.25C13.9252 21.25 15.7131 20.6618 17.1937 19.6554Z" fill="CurrentColor" "=""></path>
</svg>

                    <span>Profile</span>
                </div>
                 {{-- new --}}
                <div x-on:click="Page = 'bank'" x-bind:class="Page == 'bank' ? 'border-bottom-width-2px border-bottom-color-primary border-bottom-style-solid' : ''" class="row p-20px align-center g-10px w-fit">
                  <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M2 20H22V22H2V20ZM4 12H6V19H4V12ZM9 12H11V19H9V12ZM13 12H15V19H13V12ZM18 12H20V19H18V12ZM2 7L12 2L22 7V11H2V7ZM4 8.23607V9H20V8.23607L12 4.23607L4 8.23607ZM12 8C11.4477 8 11 7.55228 11 7C11 6.44772 11.4477 6 12 6C12.5523 6 13 6.44772 13 7C13 7.55228 12.5523 8 12 8Z"></path></svg>


                    <span>Bank</span>
                </div>
                 {{-- new --}}
                <div x-on:click="Page = 'security'" x-bind:class="Page == 'security' ? 'border-bottom-width-2px border-bottom-color-primary border-bottom-style-solid' : ''" class="row p-20px align-center g-10px w-fit">
                   <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M9 16C9 16.5523 8.55229 17 8 17C7.44772 17 7 16.5523 7 16C7 15.4477 7.44772 15 8 15C8.55229 15 9 15.4477 9 16Z" fill="CurrentColor" "=""></path>
<path d="M13 16C13 16.5523 12.5523 17 12 17C11.4477 17 11 16.5523 11 16C11 15.4477 11.4477 15 12 15C12.5523 15 13 15.4477 13 16Z" fill="CurrentColor" "=""></path>
<path d="M16 17C16.5523 17 17 16.5523 17 16C17 15.4477 16.5523 15 16 15C15.4477 15 15 15.4477 15 16C15 16.5523 15.4477 17 16 17Z" fill="CurrentColor" "=""></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.25 8V9.30277C5.02317 9.31872 4.80938 9.33948 4.60825 9.36652C3.70814 9.48754 2.95027 9.74643 2.34835 10.3483C1.74643 10.9503 1.48754 11.7081 1.36652 12.6082C1.24996 13.4752 1.24998 14.5775 1.25 15.9451V16.0549C1.24998 17.4225 1.24996 18.5248 1.36652 19.3918C1.48754 20.2919 1.74643 21.0497 2.34835 21.6516C2.95027 22.2536 3.70814 22.5125 4.60825 22.6335C5.47522 22.75 6.57754 22.75 7.94513 22.75H16.0549C17.4225 22.75 18.5248 22.75 19.3918 22.6335C20.2919 22.5125 21.0497 22.2536 21.6517 21.6516C22.2536 21.0497 22.5125 20.2919 22.6335 19.3918C22.75 18.5248 22.75 17.4225 22.75 16.0549V15.9451C22.75 14.5775 22.75 13.4752 22.6335 12.6082C22.5125 11.7081 22.2536 10.9503 21.6517 10.3483C21.0497 9.74643 20.2919 9.48754 19.3918 9.36652C19.1906 9.33948 18.9768 9.31872 18.75 9.30277V8C18.75 4.27208 15.7279 1.25 12 1.25C8.27208 1.25 5.25 4.27208 5.25 8ZM12 2.75C9.10051 2.75 6.75 5.10051 6.75 8V9.25344C7.12349 9.24999 7.52152 9.24999 7.94499 9.25H16.0549C16.4783 9.24999 16.8765 9.24999 17.25 9.25344V8C17.25 5.10051 14.8995 2.75 12 2.75ZM4.80812 10.8531C4.07435 10.9518 3.68577 11.1322 3.40901 11.409C3.13225 11.6858 2.9518 12.0743 2.85315 12.8081C2.75159 13.5635 2.75 14.5646 2.75 16C2.75 17.4354 2.75159 18.4365 2.85315 19.1919C2.9518 19.9257 3.13225 20.3142 3.40901 20.591C3.68577 20.8678 4.07435 21.0482 4.80812 21.1469C5.56347 21.2484 6.56459 21.25 8 21.25H16C17.4354 21.25 18.4365 21.2484 19.1919 21.1469C19.9257 21.0482 20.3142 20.8678 20.591 20.591C20.8678 20.3142 21.0482 19.9257 21.1469 19.1919C21.2484 18.4365 21.25 17.4354 21.25 16C21.25 14.5646 21.2484 13.5635 21.1469 12.8081C21.0482 12.0743 20.8678 11.6858 20.591 11.409C20.3142 11.1322 19.9257 10.9518 19.1919 10.8531C18.4365 10.7516 17.4354 10.75 16 10.75H8C6.56459 10.75 5.56347 10.7516 4.80812 10.8531Z" fill="CurrentColor" "=""></path>
</svg>


                    <span>Security</span>
                </div>
                
            </div>
        </div>
        {{-- profile --}}
        <form x-show="Page == 'profile'" x-data="{  }" action="{{ url('users/post/profile/settings/process') }}" method="POST" x-on:submit="PostRequest($event,$el,function(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                Vitecss.navigate('{{ url()->current().'?'.http_build_query(request()->query()) }}');
            }
        },null,'Saving...')" class="w-full column g-10px br-10px box-shadow border-width-1px border-style-solid border-color-rgt-01 bg-light p-20px">
           <input type="hidden" value="{{ @csrf_token() }}" name="_token" class="inp input required">
            <strong class="font-size-1rem m-right-auto font-weight-900">Your Profile</strong>
            {{-- input --}}
            <div class="w-full g-5px column">
                <label>Profile Photo</label>
                <div class="cont">
                <input name="profile_photo" type="file" accept="image/*" class="inp input">
            </div>
            </div>
            {{-- input --}}
            <div class="w-full g-5px column">
                <label>Full Name</label>
                <div class="cont">
                <input name="full_name" value="{{ Auth::guard('users')->user()->name }}" placeholder="Full Name" type="text" class="inp input required">
            </div>
            </div>
             {{-- input --}}
            <div class="w-full g-5px column">
                <label>Phone Number</label>
                <div class="cont">
                <input name="phone_number" value="{{ Auth::guard('users')->user()->phone }}" placeholder="Phone Number" type="number" inputmode="numeric" class="inp input required">
            </div>
            </div>
             {{-- input --}}
            <div class="w-full g-5px column">
                <label>Location</label>
                <div class="cont readonly">
                <input value="{{ ucwords(Auth::guard('users')->user()->country) }}" placeholder="Country" type="text" class="inp input required">
            </div>
            </div>
           
             {{-- input --}}
            <div class="w-full g-5px column">
                <label>Email Address</label>
                <div class="cont readonly">
                <input value="{{ Auth::guard('users')->user()->email }}" placeholder="Email" type="email" class="inp input required">
            </div>
            </div>
            
            <button class="post">Save</button>
        </form>
          {{-- security --}}
        <form x-show="Page == 'security'" x-data="{  }" action="{{ url('users/post/security/settings/process') }}" method="POST" x-on:submit="PostRequest($event,$el,function(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                Vitecss.navigate('{{ url()->current().'?'.http_build_query(request()->query()) }}');
            }
        },null,'Changing...')" class="w-full column g-10px br-10px box-shadow border-width-1px border-style-solid border-color-rgt-01 bg-light p-20px">
           <input type="hidden" value="{{ @csrf_token() }}" name="_token" class="inp input required">
            <strong class="font-size-1rem m-right-auto font-weight-900">Change Password</strong>
            <div class="column g-4px w-full">
                <span>Current Password</span>
                <div class="cont bg-rgt-01">
                    <input name="current_password" type="password" placeholder="Current password" class="inp input required">
                </div>
            </div>
             {{-- new input --}}
            <div class="column g-4px w-full">
                <span>New Password</span>
                <div class="cont bg-rgt-01">
                    <input name="new_password" type="password" placeholder="New password" class="inp input required">
                </div>
            </div>
             {{-- new input --}}
            <div class="column g-4px w-full">
                <span>Confirm New Password</span>
                <div class="cont bg-rgt-01">
                    <input name="confirm_password" type="password" placeholder="Confirm New password" class="inp input required">
                </div>
            </div>
            
            <button class="post">Change password</button>
        </form>

          {{-- security --}}
        <form x-bind:class="Bank.Verifying ? 'no-pointer' : ''" x-show="Page == 'bank'" x-data="{  }" action="{{ url('users/post/bank/settings/process') }}" method="POST" x-on:submit="PostRequest($event,$el,function(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                Vitecss.navigate('{{ url()->current().'?'.http_build_query(request()->query()) }}');
            }
        },null,'Changing...')" class="w-full column g-10px br-10px box-shadow border-width-1px border-style-solid border-color-rgt-01 bg-light p-20px">
           <input type="hidden" value="{{ @csrf_token() }}" name="_token" class="inp input required">
            <strong class="font-size-1rem m-right-auto font-weight-900">Bank Settings</strong>
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
            {{-- new input --}}
                <div class="column g-5px w-full">
                    <label>Account Number</label>
                    <div class="cont">
                        <input x-model="AccountNumber" placeholder="Enter account number" type="number" name="account_number" inputmode="numeric" class="inp input required">
                    </div>
                </div>
                 {{-- new input --}}
                <div class="column g-5px w-full">
                    <label>Bank</label>
                  <div class="w-full pos-relative">
                      <div x-on:click="BankOverlay = true" class="cont">
                        <input name="bank" type="hidden" x-bind:value="Bank.Name" class="inp input required">
                        {{-- new row --}}
                        <div x-show="Bank.Selected" class="row p-10px w-full align-center g-10px space-between">
                            <span x-text="Bank.Name"></span>
                           
                        </div>
                        {{-- new row --}}
                        <div x-show="!Bank.Selected" class="row p-10px w-full align-center g-10px space-between">
                            <span>Select bank</span>
                            <i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 12 12">
  <g fill="currentColor">
    <path d="m4.25,11c-.192,0-.384-.073-.53-.22-.293-.293-.293-.768,0-1.061l3.72-3.72-3.72-3.72c-.293-.293-.293-.768,0-1.061s.768-.293,1.061,0l4.25,4.25c.293.293.293.768,0,1.061l-4.25,4.25c-.146.146-.338.22-.53.22Z" stroke-width="0" fill="currentColor"></path>
  </g>
</svg>
                            </i>
                        </div>
                    </div>
                    <div x-on:click.outside="BankOverlay = false;" x-show="BankOverlay" style="max-height:50vh;top:calc(100% + 10px)" x-transition:enter.duration.500ms x-transition:leave.duration.500ms class="pos-absolute overflow-auto border-width-1px border-style-solid border-color-rgt-01 z-index-200 top-full w-full br-10px box-shadow bg-light">
                      @foreach (json_decode(file_get_contents(database_path('data/KorapayBanks.json'))) as $data)
                          <div x-on:click="
                          Bank.Name = '{{ $data->name }}';
                          Bank.ID = '{{ $data->code }}';
                          Bank.Selected = true;
                          BankOverlay = false;
                            "  class="w-full p-10px">
                            {{ $data->name }}
                          </div>
                      @endforeach
                    </div>
                  </div>
                </div>
                 {{-- new input --}}
                <div x-show="AccountName != ''" class="column g-5px w-full">
                    <label>Account Name</label>
                    <div class="cont">
                        <input name="account_name" x-bind:value="AccountName" readonly placeholder="Enter account name" type="text" class="inp input required">
                    </div>
                </div>
                <div x-show="Bank.Verifying" class="p-5px m-left-auto uppercase p-x-10px br-5px bg-green-transparent no-select c-green row align-center g-5px">
                    <?xml version="1.0" encoding="utf-8"?><svg height="17" width="17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2400 2400" xml:space="preserve"><g stroke-width="200" stroke-linecap="round" stroke="currentColor" fill="none" id="spinner"><line x1="1200" y1="600" x2="1200" y2="100"/><line opacity="0.5" x1="1200" y1="2300" x2="1200" y2="1800"/><line opacity="0.917" x1="900" y1="680.4" x2="650" y2="247.4"/><line opacity="0.417" x1="1750" y1="2152.6" x2="1500" y2="1719.6"/><line opacity="0.833" x1="680.4" y1="900" x2="247.4" y2="650"/><line opacity="0.333" x1="2152.6" y1="1750" x2="1719.6" y2="1500"/><line opacity="0.75" x1="600" y1="1200" x2="100" y2="1200"/><line opacity="0.25" x1="2300" y1="1200" x2="1800" y2="1200"/><line opacity="0.667" x1="680.4" y1="1500" x2="247.4" y2="1750"/><line opacity="0.167" x1="2152.6" y1="650" x2="1719.6" y2="900"/><line opacity="0.583" x1="900" y1="1719.6" x2="650" y2="2152.6"/><line opacity="0.083" x1="1750" y1="247.4" x2="1500" y2="680.4"/><animateTransform attributeName="transform" attributeType="XML" type="rotate" keyTimes="0;0.08333;0.16667;0.25;0.33333;0.41667;0.5;0.58333;0.66667;0.75;0.83333;0.91667" values="0 1199 1199;30 1199 1199;60 1199 1199;90 1199 1199;120 1199 1199;150 1199 1199;180 1199 1199;210 1199 1199;240 1199 1199;270 1199 1199;300 1199 1199;330 1199 1199" dur="0.83333s" begin="0s" repeatCount="indefinite" calcMode="discrete"/></g></svg>

                    Verifying...
                </div>
                <div x-text="Bank.Response.Message" x-show="Bank.Response.Active" x-bind:class="Bank.Response.Status == 'error' ? 'bg-red-transparent c-red' : 'bg-green-transparent c-green'" class="w-full br-10px p-15px no-select">
                </div>
            
            <button x-bind:class="(AccountName != '' && AccountNumber.length == 10 && Bank.Name != '') ? '' : 'disabled'" class="post">Save</button>
        </form>
    </section>
@endsection