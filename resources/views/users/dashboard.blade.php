@extends('layout.users.app')
@section('title')
    Dashboard
@endsection
@section('head')
   
@endsection
@section('css')
   <style class="css">
    @font-face {
    font-family: 'Bricolage';
    src: url('{{ asset('vitecss/fonts/BricolageGrotesque-VariableFont_opsz,wdth,wght.ttf') }}');
    font-style: normal;
    font-display: swap;
}
    header{
        background:transparent !important;
        backdrop-filter:blur(50px);
        -webkit-backdrop-filter:blur(50px);
    }
    body{
        background:var(--primary-darker);
        color:var(--primary-text);
        
    }
    main{
        padding:0;
    }
    .swiper-pagination-bullet{
        background:white;
        height:5px;
        width:10px;
        border-radius:1000px;
        opacity:0.5;
        transition: all 0.5s ease;
        
    

    }
     .swiper-pagination-bullet-active{
        background:white;
        width:30px;
        border-radius:1000px;
        height:5px;
        opacity:1;
    }
   .image-swiper-pagination .swiper-pagination-bullet{
    background:var(--primary)
    }
    
    .swiper{
        padding-bottom:50px !important;
    }
    .profile-icon{
        display:none;
    }
    .menu-icon{
        background:var(--primary-text);
        color:var(--primary);
    }
   
   </style>
@endsection
@section('main')
   <section class="w-full flex-auto column g-10px">

    <div
        x-init="
            new Swiper('.balance-slider', {
                slidesPerView: 1,
                spaceBetween: 0,
                speed: 400,
                allowTouchMove: true,
                followFinger: true,
                pagination : {
                    el : '.balance-swiper-pagination',
                    clickable : true
                }
            });
        "
        class="w-full swiper balance-slider"
    >

        <div class="swiper-wrapper">
 {{-- slide --}}
            <div class="swiper-slide">
                <div class="w-full primary-text column p-20px align-center g-10px">

                    <div
                        style="background:rgba(0,0,0,0.2)"
                        class="w-fit row align-center g-5px text-shadow br-1000px p-5px p-x-20px bg-black-light"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
  <g fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M12.5 3.75C12.5 2.78349 13.2835 2 14.25 2H14.75C15.7165 2 16.5 2.78349 16.5 3.75V14.25C16.5 15.2165 15.7165 16 14.75 16H14.25C13.2835 16 12.5 15.2165 12.5 14.25V3.75Z" fill="currentColor" fill-opacity="0.4"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M7 8.75C7 7.78349 7.78349 7 8.75 7H9.25C10.2165 7 11 7.78349 11 8.75V14.25C11 15.2165 10.2165 16 9.25 16H8.75C7.78349 16 7 15.2165 7 14.25V8.75Z" fill="currentColor" fill-opacity="0.4"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M1.5 12.75C1.5 11.7835 2.28349 11 3.25 11H3.75C4.71651 11 5.5 11.7835 5.5 12.75V14.25C5.5 15.2165 4.71651 16 3.75 16H3.25C2.28349 16 1.5 15.2165 1.5 14.25V12.75Z" fill="currentColor" fill-opacity="0.4"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M6.25 2C5.83579 2 5.5 2.33579 5.5 2.75C5.5 3.16421 5.83579 3.5 6.25 3.5H6.93934L2.21967 8.21967C1.92678 8.51256 1.92678 8.98744 2.21967 9.28033C2.51256 9.57322 2.98744 9.57322 3.28033 9.28033L8 4.56066V5.25C8 5.66421 8.33579 6 8.75 6C9.16421 6 9.5 5.66421 9.5 5.25V2.75C9.5 2.33579 9.16421 2 8.75 2H6.25Z" fill="currentColor"></path></g>
</svg>
                       Total Earnings
                    </div>

                    <span class="text-shadow opacity-07">
                        Your all time earnings 
                    </span>

                    <div class="row m-bottom-20px g-10px align-center justify-center w-full">

                        <strong
                            style="font-family:Bricolage;"
                            class="font-weight-900 text-shadow font-size-2-5rem"
                        >
                            {{ Auth::guard('users')->user()->currency.number_format($total_earnings) }}
                        </strong>

                        <i class="opacity-05">
                            <!-- eye icon -->
                        </i>

                    </div>

                    <div class="row justify-center align-center g-10px">

                      

                        <button x-on:click="Vitecss.navigate('{{ url('users/transactions')  }}')"
                            class="w-fit font-size-07rem font-weight-700 border-none br-1000px bg-white c-primary p-5px p-x-20px"
                        >
                            View Breakdown
                        </button>

                    </div>

                </div>
            </div>
            {{-- slide --}}
            <div class="swiper-slide">
                <div class="w-full primary-text column p-20px align-center g-10px">

                     <div
                        style="background:rgba(0,0,0,0.2)"
                        class="w-fit row align-center g-5px text-shadow br-1000px p-5px p-x-20px bg-black-light"
                    >
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
  <g fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.5 6C9.5 3.79079 11.2908 2 13.5 2C15.7092 2 17.5 3.79079 17.5 6C17.5 8.20921 15.7092 10 13.5 10C11.2908 10 9.5 8.20921 9.5 6Z" fill="currentColor" fill-opacity="0.2"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M4 11.75C4 10.7838 4.78379 10 5.75 10H9.25C10.2162 10 11 10.7838 11 11.75V15.25C11 16.2162 10.2162 17 9.25 17H5.75C4.78379 17 4 16.2162 4 15.25V11.75Z" fill="currentColor" fill-opacity="0.4"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M3.17008 1.61218C3.65248 0.784937 4.84752 0.784954 5.32988 1.61223L7.95885 6.12018C8.44348 6.95204 7.84493 8.00002 6.87897 8.00002H1.62097C0.65499 8.00002 0.056293 6.95232 0.540926 6.12046L3.17008 1.61218Z" fill="currentColor"></path></g>
</svg>
                        {{ collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key','main_balance')->first()->name }}
                    </div>

                    <span class="text-shadow opacity-07">
                        Your Ridenet Main Balance
                    </span>

                    <div class="row m-bottom-20px g-10px align-center justify-center w-full">

                        <strong
                            style="font-family:Bricolage;"
                            class="font-weight-900 text-shadow font-size-2-5rem"
                        >
                            {{ Auth::guard('users')->user()->currency.number_format(Auth::guard('users')->user()->main_balance) }}
                        </strong>

                        <i class="opacity-05">
                            <!-- eye icon -->
                        </i>

                    </div>

                    <div class="row justify-center align-center g-10px">

                        <button x-on:click="Vitecss.navigate('{{ url('users/withdraw')  }}')"
                            class="w-fit font-size-07rem font-weight-700 border-none br-1000px bg-gold c-black p-5px p-x-20px"
                        >
                            Withdraw
                        </button>

                        <button x-on:click="Vitecss.navigate('{{ url('users/transactions')  }}')"
                            class="w-fit font-size-07rem font-weight-700 border-none br-1000px bg-white c-primary p-5px p-x-20px"
                        >
                            View Breakdown
                        </button>

                    </div>

                </div>
            </div>


            {{-- Slide --}}
            <div class="swiper-slide">
                <div class="w-full primary-text column p-20px align-center g-10px">

                    <div
                        style="background:rgba(0,0,0,0.2)"
                        class="w-fit row align-center g-5px text-shadow br-1000px p-5px p-x-20px bg-black-light"
                    >
<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
  <g fill="currentColor"><path d="M15.25 12.5H12.6257C13.5994 11.5543 13.7616 9.97864 12.8783 8.8418L11.7133 7.34172L8.85069 9.35C8.03498 9.92162 6.92651 9.82615 6.22168 9.12132C5.42746 8.3271 5.41933 7.0413 6.20409 6.2373L8.69922 3.67918C8.74026 3.63713 8.78277 3.59685 8.82662 3.5584C9.23583 3.19962 9.76241 3 10.31 3H12.117C12.7 3 13.2588 3.2268 13.6776 3.62916L13.6786 3.63008L15.5476 5.43204C15.5649 5.4488 15.583 5.46166 15.6028 5.47195C15.8521 5.60098 16.0084 5.85839 16.008 6.13907L16 11.7511C15.9994 12.1649 15.6638 12.5 15.25 12.5Z" fill="currentColor" fill-opacity="0.2"></path> <path d="M5.88403 2.99899C5.3011 2.99899 4.74223 3.22581 4.32342 3.62817L2.45677 5.42783C2.43741 5.44623 2.41697 5.46064 2.39601 5.47162C2.14862 5.60121 1.99372 5.85752 1.99402 6.1368L2.00003 11.7508C2.00047 12.1647 2.33613 12.5 2.75003 12.5H4.01004C4.08491 12.5 4.15757 12.5345 4.20584 12.5943L5.28829 13.9427C6.10751 14.9626 7.53222 15.2651 8.69554 14.6642L11.9693 12.9713C13.4971 12.182 13.9328 10.1991 12.8782 8.8418L11.7133 7.34176L11.6807 7.36506L8.85069 9.35001C8.03498 9.92163 6.92651 9.82616 6.22168 9.12133C5.42746 8.32711 5.41933 7.04131 6.20409 6.23731L8.69922 3.67919C8.74026 3.63714 8.78277 3.59686 8.82662 3.55841C8.82662 3.55841 8.82662 3.55841 8.82662 3.55841" fill="currentColor" fill-opacity="0.4"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M0 5.25C0 4.83579 0.335786 4.5 0.75 4.5H1.75C2.71621 4.5 3.5 5.28379 3.5 6.25V12.25C3.5 13.2162 2.71621 14 1.75 14H0.75C0.335786 14 0 13.6642 0 13.25V5.25Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5 6.25C14.5 5.28379 15.2838 4.5 16.25 4.5H17.25C17.6642 4.5 18 4.83579 18 5.25V13.25C18 13.6642 17.6642 14 17.25 14H16.25C15.2838 14 14.5 13.2162 14.5 12.25V6.25Z" fill="currentColor"></path></g>
</svg>
                       {{ collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key','affiliate_balance')->first()->name }}
                    </div>

                    <span class="text-shadow opacity-07">
                        Your Ridenet Invitation/Referral walet
                    </span>

                    <div class="row m-bottom-20px g-10px align-center justify-center w-full">

                        <strong
                            style="font-family:Bricolage;"
                            class="font-weight-900 text-shadow font-size-2-5rem"
                        >
                            {{ Auth::guard('users')->user()->currency.number_format(Auth::guard('users')->user()->affiliate_balance) }}
                        </strong>

                    </div>

                    <div class="row justify-center align-center g-10px">
                    <button x-on:click="Vitecss.navigate('{{ url('users/withdraw')  }}')"
                            class="w-fit font-size-07rem font-weight-700 border-none br-1000px bg-gold c-black p-5px p-x-20px"
                        >
                            Withdraw
                        </button>
                        <button x-on:click="Vitecss.navigate('{{ url('users/referrals')  }}')"
                            class="w-fit font-size-07rem font-weight-700 border-none br-1000px bg-white c-primary p-5px p-x-20px"
                        >
                            View Downlines
                        </button>

                    </div>

                </div>
            </div>

        </div>
<div class="swiper-pagination balance-swiper-pagination"></div>
    </div>

    <div class="w-full column g-10px p-15px c-text br-top-right-30px br-top-left-30px flex-auto bg">
        <div x-init="
         new Swiper('.image-slide', {
                slidesPerView: 1,
                spaceBetween: 0,
                speed: 400,
                allowTouchMove: true,
                followFinger: true,
                pagination : {
                    el : '.image-swiper-pagination',
                    clickable : true
                },
                loop : true,
                autoplay : {
                    deley : 2000,
                    disableOnInteraction : false
                }
            });
        " style="padding-bottom:20px !important;" class="w-full swiper image-slide">
            <div class="swiper-wrapper">
                <img src="{{ asset('banners/FC6AAC7E-0E74-498F-8A47-2D417B7C84D6-compressed.jpeg') }}" alt="" class="w-full swiper-slide br-10px no-select">
                <img src="{{ asset('banners/2F37538C-E627-40B9-94E1-AC525B56248A-compressed.jpeg') }}" alt="" class="w-full swiper-slide br-10px no-select">
                <img src="{{ asset('banners/0E6F89E7-1026-4EC2-AC5F-594E96463424-compressed.jpeg') }}" alt="" class="w-full swiper-slide br-10px no-select">
                <img src="{{ asset('banners/0776CA54-6B2E-470F-A043-6B1C18BB3ABB-compressed.jpeg') }}" alt="" class="w-full swiper-slide br-10px no-select">
            </div>
            <div class="swiper-pagination image-swiper-pagination"></div>
        </div>
        <div class="w-full bg-light br-10px p-15px row align-center g-10px">
          {{-- new --}}
            <div x-on:click="Vitecss.navigate('{{ url('users/withdraw') }}')" class="column align-center w-full g-10px">
             <div class="h-40px bg-primary primary-text w-40px br-10px column align-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
  <g fill="currentColor"><path d="M11 11L11 4L5 4C3.346 4 2 5.346 2 7L2 19C2 20.654 3.346 22 5 22L17 22C18.654 22 20 20.654 20 19L20 13L13 13C11.896 13 11 12.104 11 11Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M20.2929 2.29285L21.7072 3.70705L21.4043 4.0099L20.6972 4.717L19.283 3.30283L20.2929 2.29285L12.5858 9.99995L14 11.4142L20.6972 4.717L21.4043 4.0099" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M22 2L22 11L20 11L20 4L13 4L13 2L22 2Z" fill="currentColor"></path></g>
</svg>
            </div>
            <span>Withdraw</span>
           </div>
           {{-- new --}}
            <div x-on:click="Vitecss.navigate('{{ url('users/tasks') }}')" class="column align-center w-full g-10px">
             <div class="h-40px bg-primary primary-text w-40px br-10px column align-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor"><path d="M13.75 4.5H7.25C5.7334 4.5 4.5 5.7334 4.5 7.25V13.75C4.5 15.2666 5.7334 16.5 7.25 16.5H13.75C15.2666 16.5 16.5 15.2666 16.5 13.75V7.25C16.5 5.7334 15.2666 4.5 13.75 4.5ZM13.6016 8.70166L10.2051 13.2017C10.0772 13.3716 9.88281 13.4786 9.67191 13.4971C9.64941 13.4991 9.62801 13.5 9.60651 13.5C9.41701 13.5 9.23439 13.4287 9.09479 13.2988L7.48541 11.7988C7.18271 11.5161 7.1661 11.0414 7.4483 10.7386C7.7305 10.4339 8.20609 10.4198 8.50879 10.701L9.50879 11.6337L12.4043 7.79834C12.6533 7.46724 13.1221 7.40075 13.4551 7.65125C13.7852 7.90075 13.8516 8.37106 13.6016 8.70166Z" fill="currentColor"></path> <path d="M3.5664 3.5439L10.4902 2.5146C10.998 2.4399 11.4931 2.6786 11.7529 3.1263C11.9609 3.4847 12.4218 3.60638 12.7773 3.39888C13.1357 3.19088 13.2578 2.73189 13.0498 2.37349C12.4805 1.39109 11.3896 0.863703 10.2695 1.0312L3.3466 2.0605C2.62 2.1679 1.97839 2.55212 1.54089 3.14192C1.10439 3.73222 0.922694 4.4573 1.03019 5.1844L2.0077 11.7651C2.0634 12.1372 2.3837 12.4046 2.7489 12.4046C2.786 12.4046 2.8231 12.4022 2.8602 12.3963C3.2694 12.3358 3.5526 11.954 3.492 11.5443L2.51449 4.96419C2.46469 4.63309 2.5477 4.30358 2.7469 4.03548C2.9451 3.76738 3.2364 3.5927 3.5664 3.5439Z" fill="currentColor"></path></g>
</svg>
            </div>
            <span>Tasks</span>
           </div>
           {{-- new --}}
            <div class="column align-center pos-relative w-full g-10px">
                <div style="transform: translate(0%,-100%)" class="pos-absolute p-x-5px font-size-05rem top-0 right-0 bg-green c-white br-1000px no-select">Coming soon</div>
             <div class="h-40px bg-primary primary-text w-40px br-10px column align-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
  <g fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M19 30H29V43H27.5H20.5H19V30Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0873 4H37.9124L46.0065 16.7182L45.9996 17.0217C45.9108 20.9163 42.8178 24.0806 38.9914 23.9985C37.0984 24.0084 35.3101 23.2307 33.9958 21.8849C31.5584 24.362 27.6808 24.7499 24.8056 22.5856C24.5202 22.3708 24.2512 22.135 24.0005 21.8803C21.5634 24.3616 17.6828 24.7512 14.8058 22.5856C14.5219 22.372 14.2542 22.1374 14.0045 21.8842C12.6902 23.2304 10.9016 24.0084 9.00822 23.9985C5.18183 24.0806 2.08887 20.9163 2.00008 17.0217L1.99316 16.7182L10.0873 4Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M10 27V38C10 39.6569 11.3431 41 13 41H35C36.6569 41 38 39.6569 38 38V27H41V38C41 41.3137 38.3137 44 35 44H13C9.68629 44 7 41.3137 7 38V27H10Z" fill="currentColor"></path></g>
</svg>
            </div>
            <span>Marketplace</span>
           </div>
           {{-- new --}}
            <div class="column pos-relative align-center w-full g-10px">
                <div style="transform: translate(0%,-100%)" class="pos-absolute p-x-5px font-size-05rem top-0 right-0 bg-green c-white br-1000px no-select">Coming soon</div>
             <div class="h-40px bg-primary primary-text w-40px br-10px column align-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor">
    <path d="M15.414,8.665c.233,.117,.509,.104,.73-.032,.221-.137,.356-.378,.356-.638v-1.744c0-1.517-1.233-2.75-2.75-2.75h-1.775c.01-.083,.025-.164,.025-.25,0-1.103-.897-2-2-2s-2,.897-2,2c0,.086,.015,.167,.025,.25h-1.775c-1.517,0-2.75,1.233-2.75,2.75v1.775c-.083-.011-.164-.025-.25-.025-1.103,0-2,.897-2,2s.897,2,2,2c.086,0,.167-.015,.25-.025v1.775c0,1.517,1.233,2.75,2.75,2.75h1.744c.26,0,.501-.135,.638-.355,.136-.221,.149-.498,.033-.73-.109-.219-.165-.442-.165-.665,0-.827,.673-1.5,1.5-1.5s1.5,.673,1.5,1.5c0,.221-.056,.445-.166,.666-.116,.232-.103,.508,.034,.729,.137,.221,.378,.355,.638,.355h1.744c1.517,0,2.75-1.233,2.75-2.75v-1.744c0-.26-.135-.501-.356-.638s-.498-.15-.73-.032c-1.027,.515-2.164-.285-2.164-1.335,0-1.05,1.134-1.85,2.164-1.335Z" fill="currentColor"></path>
  </g>
</svg>
            </div>
            <span>RideHunt</span>
           </div>
        </div>
        {{-- ref link --}}
        <div class="w-full bg-light p-15px br-10px box-shadow column g-5px">
            <strong class="font-size-1rem font-weight-900">Your Invitation Link</strong>
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
  
        </div>
        {{-- socials --}}
         <div class="w-full bg-light p-15px br-10px box-shadow column g-5px">
            <strong class="font-weight-900 font-size-1rem">Join our Socials</strong>
            <span>Join our socials to connect with other users and receive updates.</span>
            {{-- new row --}}
            <div class="row align-center g-10px space-between">
                <button x-on:click="window.open('{{ $social_settings->telegram_community }}')" style="background:linear-gradient(to bottom,rgb(0, 60, 128),#02b7ff);border:1px solid #02b7ff;" class="c-white h-50px br-10px w-full row align-center justify-center">
                    Join Telegram
                </button>
                 <button x-on:click="window.open('{{ $social_settings->whatsapp_community }}')" style="background:linear-gradient(to bottom,green,#4caf50);border:1px solid green;" class="c-white h-50px br-10px w-full row align-center justify-center">
                    Join Whatsapp
                </button>
            </div>
         </div>
        @if (!$trx->isEmpty())
                <strong class="desc font-weight-900">Recent Transactions</strong>
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
        @endif
    </div>

</section>
@endsection
