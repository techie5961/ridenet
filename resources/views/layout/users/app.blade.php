<!DOCTYPE html>
<html lang="en">
<head>
    {{-- include meta tags --}}
   @include('components.utilities',[
    'meta_tags' => true
   ])
{{-- include favicon --}}
@include('components.utilities',[
    'favicon' => true
])
{{-- include vite css --}}
@include('components.utilities',[
    'vite_css' => true
])



    <title>{{ config('app.name') }} · Users · @yield('title') </title>
     <link rel="stylesheet" href="{{ asset('vitecss/css/swiper-bundle.min.css') }}">
    <script src="{{ asset('vitecss/js/swiper-bundle.min.js') }}"></script>
     @include('components.utilities',[
    'vite_js' => true
  ])
  
    <script>
   
    function StyleUp(){
        
      try{
       
       
          document.body.style.marginBottom=document.querySelector('footer').getBoundingClientRect().height + 'px';
   
       
      }catch(error){
        alert(error)
      }
    }
    window.addEventListener('load',()=>{
        StyleUp();
    });
    // document.addEventListener('vitecss:navigating',()=>{
    //     alert('navigating')
    // });
   document.addEventListener('vitecss:navigated',()=>{
       
     StyleUp();
    });
    
    document.addEventListener('vitecss:navigated',()=>{
        try{
            if(window.allAudio){
                 if(window.allAudio && window.allAudio.length){
            allAudio.forEach((aud)=>{
                aud.pause();
                aud.src='';
                aud.load();
            });
            allAudio.length=0;
        }
            }
            
        }catch(error){
            alert(error)
        }
       
    });
   
   
    function Redirect(url){
        // window.location.href=url;
        // Vitecss.navigate(url)
        Vitecss.navigate(url)
    }
   
  </script>
    <style>
       
      body{
        overflow-x: hidden;
       
      }
      .vite-loader .child{
        background:var(--primary);
      }
      
        /* menu icon */
        .menu-icon{
            height:40px;
            width:40px;
            border-radius:50%;
            background:var(--primary);
            color:var(--primary-text);
            display:flex;
            flex-direction: column;
            align-items:center;
            justify-content:center;
            border-radius:5px;
            
           
           
        }
        nav{
            position:fixed;
            top:0;
            left:0;
            right:0;
            bottom:0;
            z-index:1000;
            background:rgb(0,0,0,0.4);
            display:flex;
            flex-direction:row;
            gap:10px;
            user-select: none;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            z-index:1500;
        }
      
        main{
            padding-bottom:0;
        }
       
      
        main{
            overflow-x: hidden;
        }
         .populate{
            position:fixed;
            inset: 0;
            background:rgba(0,0,0,0.5);
            z-index:4000;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter:blur(10px);
            display:flex;
            flex-direction:column;
            gap:10px;
            padding:20px;
            align-items:center;
            justify-content:center;
            visibility: hidden;
        
        }
        .populate .child{
            background:black;
            border:1px solid var(--primary);
            padding:20px;
            width:80%;
            color:white;
            border-radius:5px;
            display:flex;
            flex-direction:column;
            gap:10px;
            text-align:center;
            color:var(--primary-light);
            transform:translateY(30px);
            opacity:0;
            transition:all 1s ease;
            max-width:500px;

            

        }
        .populate.active{
            visibility: visible;
        }
        .populate.active .child{
            opacity:1;
            transform:translateY(0);
        }
        body:has(.populate.active){
            overflow:hidden;
        }
       
        form{
            display:flex;
            flex-direction: column;
            align-items:center;
        }
        form .page-title,.title{
            text-align:center;
        }
      .form-icon{
        height:70px;
        width:70px;
        border-radius:50%;
        background:var(--primary-01);
        color:var(--primary);
        display:flex;
        flex-direction: column;
        align-items:center;
        justify-content:center;
      }
      .form-icon svg{
        height:40px;
        width:40px;
      }
        /* media query for mobile devices */
        @media(max-width:800px){
           nav{

          transition:all 0.5s ease;
          
           }
         
          
           
            body:has(nav.active){
                overflow:hidden;
            }
        }

     
           
                  footer > div  > div{
                       opacity:0.7;
                       user-select:none;
                       -webkit-user-select:none;
                       cursor:pointer;
                  }
                        footer > div  > div.active{
                            opacity:1;
                            /* animation:rubberBand 1s linear; */
                        }
            .refresh.rotate{
                animation:rotate 1s linear infinite;
            }

            @keyframes rotate{
                0%{
                    transform:rotate(0deg);
                }
                100%{
                    transform:rotate(360deg);
                }
            }
            button.post{
                background:var(--primary);
                color:var(--primary-text);
            }
        
        /* media query for pc */
        @media(min-width:800px){
            nav{
                width:30%;
            }
            nav > div{
                width:100% !important;
                
            }
            main,footer{
                width:70%;
                margin-left:30%;
                max-width:70%;
            }
           
        }
    </style>

{{-- yield css --}}
     @yield('css')
     {{-- stack css --}}
     @stack('css')
</head>
<body x-on:vitecss:navigate.document="
if(!IsLarge){
ShowNav = false;

}
HeaderHeight = 0;
"  x-data="{ 
    ShowNav : false,
    HeaderHeight : 0,
    IsLarge : window.matchMedia('(min-width: 800px)').matches

 }">
 
    {{-- include general codes --}}
    @include('components.utilities',[
        'general_codes' => true
    ])
     {{-- include users only codes --}}
    @include('components.utilities',[
        'users_codes' => true
    ])
     {{-- include action loader for post requests,get requests and spa loading --}}
    @include('components.utilities',[
        'action_loader' => true
    ])
    <header x-data="{ 
        HeaderLinks : false,
     }"  x-init="
 if(IsLarge){
    ShowNav=true;
    $nextTick(() => {
        HeaderHeight = $refs.NavHeader.offsetHeight
    });
   
 }
 " class="bg-light w-full space-between pos-sticky top-0 left-0 right-0 row align-center g-10px p-15px z-index-4000">

     {{-- logo and menu icon --}}
        {{-- menu icon --}}
           <div x-on:click="
           ShowNav = !ShowNav;
           $nextTick(() => {
            HeaderHeight = $refs.NavHeader.offsetHeight;
           });
           " class="h-40px menu-icon w-40px circle bg-primary primary-text column align-center justify-center">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
  <g fill="currentColor">
    <rect x="1" y="11" width="22" height="2" fill="currentColor" stroke-width="0"></rect>
    <rect x="11" y="4" width="12" height="2" stroke-width="0" fill="currentColor"></rect>
    <rect x="1" y="18" width="12" height="2" stroke-width="0" fill="currentColor"></rect>
  </g>
</svg>           </div>
        {{-- logo --}}
        <img onclick="window.location.href='{{ url('/') }}'" src="{{ asset(config('settings.logo')) }}" alt="Site Logo" class="h-40 m-right-auto">
   
     
<div class="row align-center g-10px">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
  <g fill="currentColor"><path d="M9 18V19C9 20.6569 10.3431 22 12 22C13.6569 22 15 20.6569 15 19V18" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M9 18V19C9 20.6569 10.3431 22 12 22C13.6569 22 15 20.6569 15 19V18" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M9 18V19C9 20.6569 10.3431 22 12 22C13.6569 22 15 20.6569 15 19V18" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M9 18V19C9 20.6569 10.3431 22 12 22C13.6569 22 15 20.6569 15 19V18" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M6 12V8C6 4.68629 8.68629 2 12 2C15.3137 2 18 4.68629 18 8V12C19.6569 12 21 13.3431 21 15V18H3V15C3 13.3431 4.34315 12 6 12Z" stroke="currentColor" stroke-width="2" fill="none"></path> <path d="M6 12V8C6 4.68629 8.68629 2 12 2C15.3137 2 18 4.68629 18 8V12C19.6569 12 21 13.3431 21 15V18H3V15C3 13.3431 4.34315 12 6 12Z" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" fill="none"></path> <path d="M6 12V8C6 4.68629 8.68629 2 12 2C15.3137 2 18 4.68629 18 8V12C19.6569 12 21 13.3431 21 15V18H3V15C3 13.3431 4.34315 12 6 12Z" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" fill="none"></path> <path d="M6 12V8C6 4.68629 8.68629 2 12 2C15.3137 2 18 4.68629 18 8V12C19.6569 12 21 13.3431 21 15V18H3V15C3 13.3431 4.34315 12 6 12Z" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" fill="none"></path></g>
</svg>
       
     {{-- user icon --}}
   <div x-on:click="Vitecss.navigate('{{ url('users/settings') }}')" class="profile-icon pc-pointer">
     @isset(Auth::guard('users')->user()->photo)
           <img src="{{ asset('photos/users/'.Auth::guard('users')->user()->photo.'') }}" alt="" class="w-30 no-pointer h-30 no-shrink circle">
               @else
                <div class="w-30 h-30 no-shrink circle bg-primary column align-center justify-center primary-text">
    {{ $initials }}
            </div>
     @endisset
   </div>
</div>

   
    </header>
    {{-- nav --}}
    <nav class="z-index-4000" x-if="ShowNav && !IsLarge ? document.body.classList.add('overflow-hidden') : document.body.classList.remove('overflow-hidden')" x-transition:enter-start="fade-enter" x-transition:enter-end="fade-enter-end" x-transition:leave-start="fade-leave" x-transition:leave-end="fade-leave-end" x-on:click="ShowNav = false" x-show="ShowNav">
        {{-- nav child --}}
<div x-ref="Nav" x-show="ShowNav" x-transition:enter-start="left-enter" x-transition:enter-end="left-enter-end" x-transition:leave-start="left-leave" x-transition:leave-end="left-leave-end" x-on:click.stop="" class="column w-semi-full bg-primary-darker primary-text no-select column g-10px transition-all">
   
{{-- nav child body --}}
<div class="column w-full overflow-auto">
    <div class="w-full p-15px row align-center g-10px">
        <img src="{{ asset(isset(Auth::guard('users')->user()->photo) ? 'photos/users/'.Auth::guard('users')->user()->photo.'' : config('settings.logo')) }}" alt="" class="h-40px w-40px no-shrink no-select circle border-width-1px border-style-solid border-color-rgb-01">
    <div class="w-full column">
        <strong class="font-weight-800 font-size-1rem">Hi, {{ ucwords(Auth::guard('users')->user()->username) }}</strong>
    <span class="font-weight-300 opacity-07">Welcome Back</span>
    </div>
    </div>
    {{-- new group --}}
    <div class="column border-bottom-width-1px border-bottom-color-rgb-02 border-bottom-style-solid p-15px w-full">
        <small class="uppercase m-bottom-10px opacity-07">HOME</small>
        {{-- new link --}}
        @php
            $current_url=url()->current();
            $url=url('users/dashboard');
        @endphp
<div x-on:click="
Vitecss.navigate('{{ $url }}');
" style="padding-left:0;" class="row {{ $url == $current_url ? 'bg-rgb-01' : '' }} p-10px br-10px w-full align-center g-10">
   <div class="h-full w-3px br-top-right-10px br-bottom-right-10px {{ $current_url == $url ? 'bg-primary-light' : '' }}">

   </div>
<span>
<svg class="{{ $current_url == $url ? 'c-primary-lighter' : '' }}" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor">
    <path d="M7.94127 1.36281C8.56694 0.887445 9.4333 0.886569 10.0591 1.36312L15.3088 5.35287C15.7448 5.68398 16 6.20008 16 6.746V14.25C16 15.7692 14.7692 17 13.25 17H9.75V13.75C9.75 13.3358 9.41421 13 9 13C8.58579 13 8.25 13.3358 8.25 13.75V17H4.75C3.23079 17 2 15.7692 2 14.25V6.746C2 6.19867 2.2559 5.68346 2.69155 5.3526L7.94127 1.36281Z" fill="currentColor"></path>
  </g>
</svg>
    </span>
    <span>Dashboard</span>
</div>
@if (Auth::guard('users')->user()->type == 'vendor')

  {{-- new link --}}
        @php
            $current_url=url()->current();
            $url=url('users/vendors/dashboard');
        @endphp
<div x-on:click="
Vitecss.navigate('{{ $url }}');
" style="padding-left:0;" class="row {{ $url == $current_url ? 'bg-rgb-01' : '' }} p-10px br-10px w-full align-center g-10">
   <div class="h-full w-3px br-top-right-10px br-bottom-right-10px {{ $current_url == $url ? 'bg-primary-light' : '' }}">

   </div>
<span>
<svg class="{{ $current_url == $url ? 'c-primary-lighter' : '' }}" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor"><path d="M13.75 6.019C13.336 6.019 13 5.683 13 5.269V2.75C13 2.336 13.336 2 13.75 2C14.164 2 14.5 2.336 14.5 2.75V5.269C14.5 5.683 14.164 6.019 13.75 6.019Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M15.792 5.848L9.446 1.147C9.181 0.951 8.818 0.951 8.553 1.147L2.208 5.848C1.764 6.177 1.5 6.702 1.5 7.254V13.75C1.5 15.267 2.733 16.5 4.25 16.5H5.5V12.75C5.5 11.7835 6.2835 11 7.25 11C8.2165 11 9 11.7835 9 12.75V16.5H13.75C15.267 16.5 16.5 15.267 16.5 13.75V7.254C16.5 6.702 16.235 6.176 15.792 5.848ZM11.25 10.5H12.75C13.164 10.5 13.5 10.164 13.5 9.75C13.5 9.336 13.164 9 12.75 9H11.25C10.836 9 10.5 9.336 10.5 9.75C10.5 10.164 10.836 10.5 11.25 10.5Z" fill="currentColor"></path></g>
</svg>
    </span>
    <span>Vendor Dashboard</span>
</div>
@endif
    </div>
     {{-- new group --}}
    <div class="column border-bottom-width-1px border-bottom-color-rgb-02 border-bottom-style-solid p-15px w-full">
        <small class="uppercase m-bottom-10px opacity-07">GETTING PAID</small>
 {{-- new link --}}
        @php
            $current_url=url()->current();
            $url=url('users/withdraw');
        @endphp
<div x-on:click="
Vitecss.navigate('{{ $url }}');
" style="padding-left:0;" class="row {{ $url == $current_url ? 'bg-rgb-01' : '' }} p-10px br-10px w-full align-center g-10">
   <div class="h-full w-3px br-top-right-10px br-bottom-right-10px {{ $current_url == $url ? 'bg-primary-light' : '' }}">

   </div>
<span>
<svg class="{{ $current_url == $url ? 'c-primary-lighter' : '' }}" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.8952 2.61429C12.0034 2.59589 12.1118 2.65071 12.1612 2.74939L11.8952 2.61429ZM11.8952 2.61429L5.33339 3.73425C5.33332 3.73426 5.33345 3.73424 5.33339 3.73425C3.98557 3.96477 3 5.13263 3 6.49998C3 6.91419 2.66421 7.24998 2.25 7.24998C1.83579 7.24998 1.5 6.91419 1.5 6.49998C1.5 4.40139 3.01253 2.60926 5.08061 2.2557L11.6428 1.13567C12.4025 1.00613 13.1582 1.38928 13.5028 2.07857C13.6881 2.44905 13.5379 2.89956 13.1674 3.0848C12.7969 3.27004 12.3464 3.11987 12.1612 2.74939" fill="currentColor"></path> <path d="M16.5 11.5H14C13.172 11.5 12.5 10.828 12.5 10C12.5 9.172 13.172 8.5 14 8.5H16.5C17.052 8.5 17.5 8.948 17.5 9.5V10.5C17.5 11.052 17.052 11.5 16.5 11.5Z" fill="currentColor"></path> <path d="M16.5 13H14C12.3436 13 11 11.6564 11 10C11 8.34357 12.3436 7 14 7H16.5V6.75C16.5 5.233 15.267 4 13.75 4H4.25C2.733 4 1.5 5.233 1.5 6.75V13.25C1.5 14.767 2.733 16 4.25 16H13.75C15.267 16 16.5 14.767 16.5 13.25V13Z" fill="currentColor"></path></g>
</svg>
    </span>
    <span>Withdraw</span>
</div>
{{-- new link --}}
        @php
            $current_url=url()->current();
            $url=url('users/transactions');
        @endphp
<div x-on:click="
Vitecss.navigate('{{ $url }}');
" style="padding-left:0;" class="row {{ $url == $current_url ? 'bg-rgb-01' : '' }} p-10px br-10px w-full align-center g-10">
   <div class="h-full w-3px br-top-right-10px br-bottom-right-10px {{ $current_url == $url ? 'bg-primary-light' : '' }}">

   </div>
<span>
<svg class="{{ $current_url == $url ? 'c-primary-lighter' : '' }}" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
  <g fill="currentColor">
    <polyline points="3 6 4.5 7.5 8 3.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline>
    <rect x="3" y="12" width="4" height="4" rx="1" ry="1" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" fill="currentColor"></rect>
    <line x1="11" y1="6" x2="17" y2="6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
    <line x1="11" y1="14" x2="17" y2="14" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
  </g>
</svg>
    </span>
    <span>Transactions</span>
</div>

{{-- new link --}}
        @php
            $current_url=url()->current().'?'.http_build_query(request()->query());
            $url=url('users/settings?page=bank');
        @endphp
<div x-on:click="
Vitecss.navigate('{{ $url }}');
" style="padding-left:0;" class="row {{ $url == $current_url ? 'bg-rgb-01' : '' }} p-10px br-10px w-full align-center g-10">
   <div class="h-full w-3px br-top-right-10px br-bottom-right-10px {{ $current_url == $url ? 'bg-primary-light' : '' }}">

   </div>
<span>
<svg class="{{ $current_url == $url ? 'c-primary-lighter' : '' }}" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
  <g fill="currentColor">
    <path d="m12,1C5.935,1,1,5.935,1,12s4.935,11,11,11,11-4.935,11-11S18.065,1,12,1Zm5,12h-4v4h-2v-4h-4v-2h4v-4h2v4h4v2Z" stroke-width="0" fill="currentColor"></path>
  </g>
</svg>    </span>
    <span>Bank Settings</span>
</div>
    </div>

  {{-- new group --}}
    <div class="column border-bottom-width-1px border-bottom-color-rgb-02 border-bottom-style-solid p-15px w-full">
        <small class="uppercase m-bottom-10px opacity-07">ACTIVITIES</small>
        {{-- new link --}}
        @php
            $current_url=url()->current();
            $url=url('users/marketplace');
        @endphp
<div style="padding-left:0;" class="row {{ $url == $current_url ? 'bg-rgb-01' : '' }} p-10px br-10px w-full align-center g-10">
   <div class="h-full w-3px br-top-right-10px br-bottom-right-10px {{ $current_url == $url ? 'bg-primary-light' : '' }}">

   </div>
<span>


<svg class="{{ $current_url == $url ? 'c-primary-lighter' : '' }}" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
  <g fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M19 30H29V43H27.5H20.5H19V30Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0873 4H37.9124L46.0065 16.7182L45.9996 17.0217C45.9108 20.9163 42.8178 24.0806 38.9914 23.9985C37.0984 24.0084 35.3101 23.2307 33.9958 21.8849C31.5584 24.362 27.6808 24.7499 24.8056 22.5856C24.5202 22.3708 24.2512 22.135 24.0005 21.8803C21.5634 24.3616 17.6828 24.7512 14.8058 22.5856C14.5219 22.372 14.2542 22.1374 14.0045 21.8842C12.6902 23.2304 10.9016 24.0084 9.00822 23.9985C5.18183 24.0806 2.08887 20.9163 2.00008 17.0217L1.99316 16.7182L10.0873 4Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M10 27V38C10 39.6569 11.3431 41 13 41H35C36.6569 41 38 39.6569 38 38V27H41V38C41 41.3137 38.3137 44 35 44H13C9.68629 44 7 41.3137 7 38V27H10Z" fill="currentColor"></path></g>
</svg>
    </span>
    <span>Marketplace</span>
    <div class="p-x-5px bg-green c-white m-left-auto font-size-06rem br-1000px no-select">Coming soon</div>
</div>
  {{-- new link --}}
        @php
            $current_url=url()->current();
            $url=url('users/ridehunt');
        @endphp
<div style="padding-left:0;" class="row {{ $url == $current_url ? 'bg-rgb-01' : '' }} p-10px br-10px w-full align-center g-10">
   <div class="h-full w-3px br-top-right-10px br-bottom-right-10px {{ $current_url == $url ? 'bg-primary-light' : '' }}">

   </div>
<span>


<svg class="{{ $current_url == $url ? 'c-primary-lighter' : '' }}" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor">
    <path d="M15.414,8.665c.233,.117,.509,.104,.73-.032,.221-.137,.356-.378,.356-.638v-1.744c0-1.517-1.233-2.75-2.75-2.75h-1.775c.01-.083,.025-.164,.025-.25,0-1.103-.897-2-2-2s-2,.897-2,2c0,.086,.015,.167,.025,.25h-1.775c-1.517,0-2.75,1.233-2.75,2.75v1.775c-.083-.011-.164-.025-.25-.025-1.103,0-2,.897-2,2s.897,2,2,2c.086,0,.167-.015,.25-.025v1.775c0,1.517,1.233,2.75,2.75,2.75h1.744c.26,0,.501-.135,.638-.355,.136-.221,.149-.498,.033-.73-.109-.219-.165-.442-.165-.665,0-.827,.673-1.5,1.5-1.5s1.5,.673,1.5,1.5c0,.221-.056,.445-.166,.666-.116,.232-.103,.508,.034,.729,.137,.221,.378,.355,.638,.355h1.744c1.517,0,2.75-1.233,2.75-2.75v-1.744c0-.26-.135-.501-.356-.638s-.498-.15-.73-.032c-1.027,.515-2.164-.285-2.164-1.335,0-1.05,1.134-1.85,2.164-1.335Z" fill="currentColor"></path>
  </g>
</svg>
    </span>
    <span>Ridehunt</span>
    <div class="p-x-5px bg-green c-white m-left-auto font-size-06rem br-1000px no-select">Coming soon</div>
</div>
{{-- new link --}}
        @php
            $current_url=url()->current();
            $url=url('users/tasks');
        @endphp
<div x-on:click="
Vitecss.navigate('{{ $url }}');
" style="padding-left:0;" class="row {{ $url == $current_url ? 'bg-rgb-01' : '' }} p-10px br-10px w-full align-center g-10">
   <div class="h-full w-3px br-top-right-10px br-bottom-right-10px {{ $current_url == $url ? 'bg-primary-light' : '' }}">

   </div>
<span>
<svg class="{{ $current_url == $url ? 'c-primary-lighter' : '' }}" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor"><path d="M13.75 4.5H7.25C5.7334 4.5 4.5 5.7334 4.5 7.25V13.75C4.5 15.2666 5.7334 16.5 7.25 16.5H13.75C15.2666 16.5 16.5 15.2666 16.5 13.75V7.25C16.5 5.7334 15.2666 4.5 13.75 4.5ZM13.6016 8.70166L10.2051 13.2017C10.0772 13.3716 9.88281 13.4786 9.67191 13.4971C9.64941 13.4991 9.62801 13.5 9.60651 13.5C9.41701 13.5 9.23439 13.4287 9.09479 13.2988L7.48541 11.7988C7.18271 11.5161 7.1661 11.0414 7.4483 10.7386C7.7305 10.4339 8.20609 10.4198 8.50879 10.701L9.50879 11.6337L12.4043 7.79834C12.6533 7.46724 13.1221 7.40075 13.4551 7.65125C13.7852 7.90075 13.8516 8.37106 13.6016 8.70166Z" fill="currentColor"></path> <path d="M3.5664 3.5439L10.4902 2.5146C10.998 2.4399 11.4931 2.6786 11.7529 3.1263C11.9609 3.4847 12.4218 3.60638 12.7773 3.39888C13.1357 3.19088 13.2578 2.73189 13.0498 2.37349C12.4805 1.39109 11.3896 0.863703 10.2695 1.0312L3.3466 2.0605C2.62 2.1679 1.97839 2.55212 1.54089 3.14192C1.10439 3.73222 0.922694 4.4573 1.03019 5.1844L2.0077 11.7651C2.0634 12.1372 2.3837 12.4046 2.7489 12.4046C2.786 12.4046 2.8231 12.4022 2.8602 12.3963C3.2694 12.3358 3.5526 11.954 3.492 11.5443L2.51449 4.96419C2.46469 4.63309 2.5477 4.30358 2.7469 4.03548C2.9451 3.76738 3.2364 3.5927 3.5664 3.5439Z" fill="currentColor"></path></g>
</svg>    </span>
    <span>Daily Tasks</span>
</div>
{{-- new link --}}
        @php
            $current_url=url()->current();
            $url=url('users/referrals');
        @endphp
<div x-on:click="
Vitecss.navigate('{{ $url }}');
" style="padding-left:0;" class="row {{ $url == $current_url ? 'bg-rgb-01' : '' }} p-10px br-10px w-full align-center g-10">
   <div class="h-full w-3px br-top-right-10px br-bottom-right-10px {{ $current_url == $url ? 'bg-primary-light' : '' }}">

   </div>
<span>
<svg class="{{ $current_url == $url ? 'c-primary-lighter' : '' }}" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.554137 13.5756C1.34525 11.476 3.36866 9.97803 5.74997 9.97803C8.13128 9.97803 10.1547 11.476 10.9458 13.5756C11.3059 14.5316 10.7272 15.5154 9.84596 15.8103C8.82613 16.1509 7.42657 16.477 5.75097 16.477C4.0754 16.477 2.67527 16.1511 1.65458 15.8105C0.771586 15.5163 0.194851 14.5312 0.554137 13.5756Z" fill="currentColor"></path> <path d="M12.5523 13.9774C13.9847 13.9162 15.1901 13.6251 16.096 13.3225C16.9772 13.0276 17.5559 12.0438 17.1958 11.0878C16.4047 8.98817 14.3813 7.49023 12 7.49023C10.5581 7.49023 9.24737 8.03945 8.26202 8.9389C10.147 9.65833 11.6398 11.1634 12.3495 13.0469C12.4675 13.3603 12.5329 13.6726 12.5523 13.9774Z" fill="currentColor"></path> <path d="M5.75 8.50049C6.99267 8.50049 8 7.49361 8 6.25049C8 5.00736 6.99267 4.00049 5.75 4.00049C4.50733 4.00049 3.5 5.00736 3.5 6.25049C3.5 7.49361 4.50733 8.50049 5.75 8.50049Z" fill="currentColor"></path> <path d="M12 6.00049C13.2427 6.00049 14.25 4.99361 14.25 3.75049C14.25 2.50736 13.2427 1.50049 12 1.50049C10.7573 1.50049 9.75 2.50736 9.75 3.75049C9.75 4.99361 10.7573 6.00049 12 6.00049Z" fill="currentColor"></path></g>
</svg>
    </span>
    <span>My Team</span>
</div>


    </div>

     {{-- new group --}}
    <div class="column border-bottom-width-1px border-bottom-color-rgb-02 border-bottom-style-solid p-15px w-full">
        <small class="uppercase m-bottom-10px opacity-07">SETTINGS</small>
{{-- new link --}}
        @php
            $current_url=url()->current().'?'.http_build_query(request()->query());
            $url=url('users/settings');
        @endphp
<div x-on:click="
Vitecss.navigate('{{ $url }}');
" style="padding-left:0;" class="row {{ $url == $current_url ? 'bg-rgb-01' : '' }} p-10px br-10px w-full align-center g-10">
   <div class="h-full w-3px br-top-right-10px br-bottom-right-10px {{ $current_url == $url ? 'bg-primary-light' : '' }}">

   </div>
<span>
<svg class="{{ $current_url == $url ? 'c-primary-lighter' : '' }}" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 12 12">
  <g fill="currentColor">
    <circle cx="6" cy="2.491" r="2.5" fill="currentColor" stroke-width="0"></circle>
    <path d="m10.533,8.639c-.932-1.628-2.669-2.639-4.533-2.639s-3.602,1.011-4.533,2.639c-.249.434-.305.954-.154,1.428.15.472.496.863.947,1.072,1.241.574,2.49.861,3.74.861s2.499-.287,3.74-.861h0c.451-.209.796-.6.947-1.072.151-.474.095-.994-.154-1.427Z" stroke-width="0" fill="currentColor"></path>
  </g>
</svg>    </span>
    <span>Profile Settings</span>
</div>

{{-- new link --}}
        @php
            $current_url=url()->current().'?'.http_build_query(request()->query());
            $url=url('users/settings?page=security');
        @endphp
<div x-on:click="
Vitecss.navigate('{{ $url }}');
" style="padding-left:0;" class="row {{ $url == $current_url ? 'bg-rgb-01' : '' }} p-10px br-10px w-full align-center g-10">
   <div class="h-full w-3px br-top-right-10px br-bottom-right-10px {{ $current_url == $url ? 'bg-primary-light' : '' }}">

   </div>
<span>
<svg class="{{ $current_url == $url ? 'c-primary-lighter' : '' }}" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 12 12">
  <g fill="currentColor">
    <path d="m8.25,6c-.414,0-.75-.336-.75-.75v-2.25c0-.827-.673-1.5-1.5-1.5s-1.5.673-1.5,1.5v2.25c0,.414-.336.75-.75.75s-.75-.336-.75-.75v-2.25c0-1.654,1.346-3,3-3s3,1.346,3,3v2.25c0,.414-.336.75-.75.75Z" fill="currentColor" stroke-width="0"></path>
    <path d="m9.25,4.5H2.75c-1.241,0-2.25,1.009-2.25,2.25v3c0,1.241,1.009,2.25,2.25,2.25h6.5c1.241,0,2.25-1.009,2.25-2.25v-3c0-1.241-1.009-2.25-2.25-2.25Zm-2.5,4.25c0,.414-.336.75-.75.75s-.75-.336-.75-.75v-1c0-.414.336-.75.75-.75s.75.336.75.75v1Z" stroke-width="0" fill="currentColor"></path>
  </g>
</svg>
 </span>
    <span>Security Settings</span>
</div>



    </div>
     
 {{-- new group --}}
    <div class="column pos-sticky top-0 m-top-auto bg-inherit p-15px w-full g-10px">
        <small class="uppercase opacity-07">AUTH</small>
{{-- new link --}}
<div x-data="{  }" x-on:click="window.location.href='{{ url('users/logout') }}'" class="row link w-full align-center g-10">
    <span>
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
  <g fill="currentColor">
    <path d="m17,6c0-1.195-.703-2.217-1.714-2.7l-2.993,2.993c-.188.188-.293.442-.293.707v6c0,.265.105.52.293.707l2.993,2.993c1.011-.483,1.714-1.505,1.714-2.7V6Z" stroke-width="0" fill="currentColor"></path>
    <line x1="3" y1="10" x2="9" y2="10" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
    <path d="m7.44,15.544c.526.869,1.47,1.456,2.56,1.456h4c1.657,0,3-1.343,3-3V6c0-1.657-1.343-3-3-3h-4c-1.089,0-2.033.585-2.558,1.453" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
    <polyline points="5.75 7.5 3 10 5.75 12.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline>
  </g>
</svg>
       </span>
    <span>Logout</span>
</div>



    </div>
















</div>

</div>
    </nav>
    <main>
        {{-- yield main --}}
        @yield('main')
    </main>
   
 {{-- footer --}}
 <footer class="pos-fixed z-index-3000 bottom-0 left-0 right-0 bg-primary-darker primary-text row w-full">
   {{-- new link --}}
   <div x-on:click="Vitecss.navigate('{{ url('users/dashboard') }}')" class="w-full column g-5px align-center p-y-10px">
    <i>
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 12 12">
  <g fill="currentColor">
    <path d="m10.738,2.881L6.988.315c-.6-.41-1.376-.41-1.976,0L1.262,2.881s0,0,0,0c-.477.326-.762.866-.762,1.444v4.425c0,1.516,1.233,2.75,2.75,2.75h2v-2.75c0-.414.336-.75.75-.75s.75.336.75.75v2.75h2c1.517,0,2.75-1.234,2.75-2.75v-4.425c0-.578-.285-1.118-.762-1.444Z" stroke-width="0" fill="currentColor"></path>
  </g>
</svg>
    </i>
    <small>Home</small>
   </div>

    {{-- new link --}}
   <div x-on:click="Vitecss.navigate('{{ url('users/tasks') }}')" class="w-full column g-5px align-center p-y-10px">
    <i>
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor"><path d="M13.75 4.5H7.25C5.7334 4.5 4.5 5.7334 4.5 7.25V13.75C4.5 15.2666 5.7334 16.5 7.25 16.5H13.75C15.2666 16.5 16.5 15.2666 16.5 13.75V7.25C16.5 5.7334 15.2666 4.5 13.75 4.5ZM13.6016 8.70166L10.2051 13.2017C10.0772 13.3716 9.88281 13.4786 9.67191 13.4971C9.64941 13.4991 9.62801 13.5 9.60651 13.5C9.41701 13.5 9.23439 13.4287 9.09479 13.2988L7.48541 11.7988C7.18271 11.5161 7.1661 11.0414 7.4483 10.7386C7.7305 10.4339 8.20609 10.4198 8.50879 10.701L9.50879 11.6337L12.4043 7.79834C12.6533 7.46724 13.1221 7.40075 13.4551 7.65125C13.7852 7.90075 13.8516 8.37106 13.6016 8.70166Z" fill="currentColor"></path> <path d="M3.5664 3.5439L10.4902 2.5146C10.998 2.4399 11.4931 2.6786 11.7529 3.1263C11.9609 3.4847 12.4218 3.60638 12.7773 3.39888C13.1357 3.19088 13.2578 2.73189 13.0498 2.37349C12.4805 1.39109 11.3896 0.863703 10.2695 1.0312L3.3466 2.0605C2.62 2.1679 1.97839 2.55212 1.54089 3.14192C1.10439 3.73222 0.922694 4.4573 1.03019 5.1844L2.0077 11.7651C2.0634 12.1372 2.3837 12.4046 2.7489 12.4046C2.786 12.4046 2.8231 12.4022 2.8602 12.3963C3.2694 12.3358 3.5526 11.954 3.492 11.5443L2.51449 4.96419C2.46469 4.63309 2.5477 4.30358 2.7469 4.03548C2.9451 3.76738 3.2364 3.5927 3.5664 3.5439Z" fill="currentColor"></path></g>
</svg>
   </i>
    <small>Tasks</small>
   </div>
     {{-- new link --}}
   <div x-on:click="Vitecss.navigate('{{ url('users/settings?type=bank') }}')" class="w-full column g-5px align-center p-y-10px">
    <i>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M2 20H22V22H2V20ZM4 12H6V19H4V12ZM9 12H11V19H9V12ZM13 12H15V19H13V12ZM18 12H20V19H18V12ZM2 7L12 2L22 7V11H2V7ZM4 8.23607V9H20V8.23607L12 4.23607L4 8.23607ZM12 8C11.4477 8 11 7.55228 11 7C11 6.44772 11.4477 6 12 6C12.5523 6 13 6.44772 13 7C13 7.55228 12.5523 8 12 8Z"></path></svg>

    </i>
    <small>Bank</small>
   </div>
    {{-- new link --}}
   <div x-on:click="Vitecss.navigate('{{ url('users/withdraw') }}')" class="w-full column g-5px align-center p-y-10px">
    <i>
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.8952 2.61429C12.0034 2.59589 12.1118 2.65071 12.1612 2.74939L11.8952 2.61429ZM11.8952 2.61429L5.33339 3.73425C5.33332 3.73426 5.33345 3.73424 5.33339 3.73425C3.98557 3.96477 3 5.13263 3 6.49998C3 6.91419 2.66421 7.24998 2.25 7.24998C1.83579 7.24998 1.5 6.91419 1.5 6.49998C1.5 4.40139 3.01253 2.60926 5.08061 2.2557L11.6428 1.13567C12.4025 1.00613 13.1582 1.38928 13.5028 2.07857C13.6881 2.44905 13.5379 2.89956 13.1674 3.0848C12.7969 3.27004 12.3464 3.11987 12.1612 2.74939" fill="currentColor"></path> <path d="M16.5 11.5H14C13.172 11.5 12.5 10.828 12.5 10C12.5 9.172 13.172 8.5 14 8.5H16.5C17.052 8.5 17.5 8.948 17.5 9.5V10.5C17.5 11.052 17.052 11.5 16.5 11.5Z" fill="currentColor"></path> <path d="M16.5 13H14C12.3436 13 11 11.6564 11 10C11 8.34357 12.3436 7 14 7H16.5V6.75C16.5 5.233 15.267 4 13.75 4H4.25C2.733 4 1.5 5.233 1.5 6.75V13.25C1.5 14.767 2.733 16 4.25 16H13.75C15.267 16 16.5 14.767 16.5 13.25V13Z" fill="currentColor"></path></g>
</svg>

    </i>
    <small>Withdraw</small>
   </div>
   
    {{-- new link --}}
   <div x-on:click="Vitecss.navigate('{{ url('users/settings') }}')" class="w-full column g-5px align-center p-y-10px">
    <i>
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 12 12">
  <g fill="currentColor">
    <circle cx="6" cy="2.491" r="2.5" fill="currentColor" stroke-width="0"></circle>
    <path d="m10.533,8.639c-.932-1.628-2.669-2.639-4.533-2.639s-3.602,1.011-4.533,2.639c-.249.434-.305.954-.154,1.428.15.472.496.863.947,1.072,1.241.574,2.49.861,3.74.861s2.499-.287,3.74-.861h0c.451-.209.796-.6.947-1.072.151-.474.095-.994-.154-1.427Z" stroke-width="0" fill="currentColor"></path>
  </g>
</svg>    </i>
    <small>Profile</small>
   </div>
</footer>
  {{-- yield js --}}
    @yield('js')
    {{-- stack js --}}
    @stack('js')
</body>
</html>