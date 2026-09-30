<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>RideNet · Coupon Checker.</title>
       {{-- include meta tags --}}
   @include('components.utilities',[
    'meta_tags' => true
   ])
{{-- include favicon --}}
@include('components.utilities',[
    'favicon' => true
])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css">
    <link href="{{ asset('vitecss/fonts/fonts/fonts.css?v=20.4') }}" rel="stylesheet">
    <link href="{{ asset('vitecss/css/app.min.css?v=20.4') }}" rel="stylesheet">
<script src="{{ asset('vitecss/js/app.min.js?v=10.4') }}"></script>
    <style>
        /* ============================================================
           ROOT VARIABLES - RIDENET
           ============================================================ */
        :root {
            --primary: #317318;
            --primary-light: #4eac2c;
            --primary-lighter: #82ff55;
            --primary-dark: #245313;
            --primary-darker: #14300b;

            --primary-colour: var(--primary-dark);
            --secondary-colour: var(--primary);
            --accent: var(--primary-lighter);
            --primary-background: var(--primary-dark);
            --secondary-background: var(--primary-darker);

            --primary-text: #ffffff;
            --secondary-text: rgba(255,255,255,0.7);
            --border: rgba(255,255,255,0.08);
            --white: #ffffff;

            --font-primary: 'Vite Sans Display','Inter', -apple-system, sans-serif;
            --font-secondary: 'Vite Sans Display','Inter', -apple-system, sans-serif;

            --color-primary-green: var(--primary);
            --color-primary-green-glow: var(--primary-lighter);
            --color-deep-green: var(--primary-darker);
            --color-light-green: var(--primary-light);
        }

        /* ============================================================
           RESET & BASE
           ============================================================ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: var(--primary-darker);
            color: var(--primary-text);
            font-family: var(--font-secondary);
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
        }
        input::placeholder{
            /* color:var(--primary) !important; */
        }
        form,.house{
             background:
                linear-gradient(
                    145deg,
                    rgba(16,41,11,.98),
                    rgba(13,33,9,.92)
                ) !important;
                border:1px solid rgba(130,255,85,.12) !important;
        }
  .vendor-avatar {
            width: 52px;
            height: 52px;
            flex: 0 0 52px;
            display: grid;
            place-items: center;
            border-radius: 16px;
            background:
                linear-gradient(
                    135deg,
                    var(--primary-light),
                    var(--primary-dark)
                );
            border: 1px solid rgba(130,255,85,.18);
            font-size: 16px;
            font-weight: 900;
        }
            /* =========================
           MVW
        ========================= */

        .mvw {
            margin-top: 70px;
            padding:20px;
            border-radius: 30px;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(130,255,85,.2);
            background:
                radial-gradient(
                    circle at 90% 10%,
                    rgba(130,255,85,.15),
                    transparent 30%
                ),
                linear-gradient(
                    135deg,
                    var(--primary-darker),
                    var(--primary-dark)
                );
                text-align:start;
        }

        .mvw::after {
            content: "";
            position: absolute;
            width: 260px;
            height: 260px;
            right: -100px;
            bottom: -130px;
            border-radius: 50%;
            border: 1px solid rgba(130,255,85,.1);
        }

        .mvw-content {
            position: relative;
            z-index: 2;
            max-width: 650px;
        }

        .mvw-label {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: var(--primary-lighter);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 13px;
        }

        .mvw h2 {
            font-size: clamp(30px, 5vw, 48px);
            letter-spacing: -1.5px;
            margin-bottom: 13px;
        }

        .mvw p {
            color: var(--muted);
            line-height: 1.7;
            font-size: 14px;
            max-width: 560px;
        }

        .mvw-reward {
            margin-top: 22px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 25px;
            font-weight: 900;
            color: var(--white);
        }

        .mvw-reward i {
            color: var(--primary-lighter);
        }
    </style>
</head>

<body class="home-canvas antialiased">
<header class="pos-sticky bg-black-transparent backdrop-blur-50px border-bottom-width-1px z-index-3000 border-bottom-style-solid border-bottom-color-primary top-0 p-10px w-full row align-center space-between">
    <img src="{{ asset(config('settings.logo')) }}" alt="" class="h-50px no-select no-pointer">
    <i x-data="{  }" x-on:click="window.location.href='{{ url('/') }}'">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
  <g fill="currentColor">
    <line x1="17" y1="10" x2="3" y2="10" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
    <polyline points="8 5 3 10 8 15" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline>
  </g>
</svg>
    </i>
</header>
          
    <section class="body p-20px text-align-center align-center w-full column g-10">
        <div class="w-fit p-5px uppercase p-x-20px bg-primary-01 row align-center c-primary-lighter font-weight-800 g-5px br-1000px border-width-1px border-style-solid border-color-primary-light">
        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="13" width="13"><path d="M13.0049 16.9409V19.0027H18.0049V21.0027H6.00488V19.0027H11.0049V16.9409C7.05857 16.4488 4.00488 13.0824 4.00488 9.00275V3.00275H20.0049V9.00275C20.0049 13.0824 16.9512 16.4488 13.0049 16.9409ZM6.00488 5.00275V9.00275C6.00488 12.3165 8.69117 15.0027 12.0049 15.0027C15.3186 15.0027 18.0049 12.3165 18.0049 9.00275V5.00275H6.00488ZM1.00488 5.00275H3.00488V9.00275H1.00488V5.00275ZM21.0049 5.00275H23.0049V9.00275H21.0049V5.00275Z"></path></svg>

           Ridenet Leaderboard
           </div>
            <strong class="font-weight-900 font-size-2rem">
              Top <span class="c-primary-lighter">earners</span>
            </strong>
           
          <span class="opacity-07">
          Meet some of the most active members in the RideNet community.
                Connect more rides, complete more activities and keep climbing.
            </span>
       
          <div style="margin-top:50px;" class="w-full text-align-start row space-between earners-loop flex-wrap align-center g-10">
           @if (!$top_earners->isEmpty())
        @foreach ($top_earners as $data)
         {{-- top earner --}}
        @if ($loop->first)
            <div style="border:1px solid var(--rgt-01);order:{{ $loop->iteration }};" class="{{ $loop->iteration == 4 ? 'm-top-20' : '' }} w-full house row g-10px p-15px br-15px">
                  <div style="height:50px;width:50px;border-radius:50%;margin-bottom:0;" class="no-pointer no-select gold-border">
                        @isset($data->user->photo)
                        <img src="{{ asset('photos/users/'.$data->user->photo.'') }}" alt="" class="w-full perfect-square w-full br-16">
                    @else
                   <div class="vendor-avatar uppercase">
        {{ substr($data->user->username,0,1) }}
      </div>
                    @endisset
                   
                    </div>
                    {{-- new column --}}
                    <div class="column g-10">
                        <strong class="font-size-09">{{ ucwords($data->user->username) }}</strong>
                       <div class="column">
                        <strong class="font-size-09 font-weight-900">{{ $data->user->currency.$data->total_earnings }}</strong>
                         <span class="opacity-07 font-size-06rem">Total Earnings</span>

                       </div>
                    </div>
                    {{-- iteration --}}
                    <div class="w-40 h-40 circle no-select bg-gold c-black font-weight-900 font-size-1 m-left-auto column align-center justify-center">
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.0049 16.9409V19.0027H18.0049V21.0027H6.00488V19.0027H11.0049V16.9409C7.05857 16.4488 4.00488 13.0824 4.00488 9.00275V3.00275H20.0049V9.00275C20.0049 13.0824 16.9512 16.4488 13.0049 16.9409ZM6.00488 5.00275V9.00275C6.00488 12.3165 8.69117 15.0027 12.0049 15.0027C15.3186 15.0027 18.0049 12.3165 18.0049 9.00275V5.00275H6.00488ZM1.00488 5.00275H3.00488V9.00275H1.00488V5.00275ZM21.0049 5.00275H23.0049V9.00275H21.0049V5.00275Z"></path></svg>

                    </div>
            </div>
            @endif
            {{-- second top earner --}}
             @if ($loop->iteration == 2)
                <div style="border:1px solid var(--rgt-01);order:{{ $loop->iteration }};" class="{{ $loop->iteration == 4 ? 'm-top-20' : '' }} w-full house row g-10px p-15px br-15px">
                  <div style="height:50px;width:50px;border-radius:50%;margin-bottom:0;" class="no-pointer no-select gold-border">
                        @isset($data->user->photo)
                        <img src="{{ asset('photos/users/'.$data->user->photo.'') }}" alt="" class="w-full perfect-square w-full br-16">
                    @else
                    <div class="vendor-avatar uppercase">
        {{ substr($data->user->username,0,1) }}
      </div>
                    @endisset
                   
                    </div>
                    {{-- new column --}}
                    <div class="column g-10">
                        <strong class="font-size-09">{{ ucwords($data->user->username) }}</strong>
                       <div class="column">
                        <strong class="font-size-09 font-weight-900">{{ $data->user->currency.$data->total_earnings }}</strong>
                         <span class="opacity-07 font-size-06rem">Total Earnings</span>

                       </div>
                    </div>
                    {{-- iteration --}}
                    <div style="background:rgb(255, 115, 0);color:white !important;" class="w-40 h-40 circle no-select bg-gold c-black font-weight-900 font-size-1 m-left-auto column align-center justify-center">
<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
  <g fill="currentColor"><path d="M9.64299 12.133L10.42 11.481C10.6 11.33 10.828 11.247 11.063 11.247H12.077C12.562 11.247 12.978 10.899 13.062 10.421L13.238 9.422C13.279 9.19 13.4 8.981 13.58 8.83L14.357 8.178C14.729 7.866 14.823 7.332 14.58 6.912L14.073 6.033C13.955 5.829 13.913 5.591 13.954 5.359L14.13 4.36C14.214 3.882 13.943 3.413 13.487 3.247L12.534 2.9C12.313 2.82 12.128 2.664 12.01 2.46L11.503 1.581C11.26 1.161 10.751 0.975002 10.295 1.141L9.342 1.488C9.121 1.568 8.87899 1.568 8.65799 1.488L7.705 1.141C7.249 0.975002 6.74 1.16 6.497 1.581L5.98999 2.46C5.87199 2.664 5.687 2.819 5.466 2.9L4.513 3.247C4.057 3.413 3.786 3.882 3.87 4.36L4.04599 5.359C4.08699 5.591 4.045 5.829 3.927 6.033L3.41999 6.912C3.17699 7.332 3.27099 7.866 3.64299 8.178L4.41999 8.83C4.59999 8.981 4.721 9.191 4.762 9.422L4.938 10.421C5.022 10.899 5.43799 11.247 5.92299 11.247H6.93699C7.17199 11.247 7.4 11.33 7.58 11.481L8.357 12.133C8.729 12.445 9.27099 12.445 9.64299 12.133Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M12.25 14.2431V17.25L9 14.75L5.75 17.25V14.2431" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M9 8.724C10.105 8.724 11 7.8286 11 6.724C11 5.6194 10.105 4.724 9 4.724C7.895 4.724 7 5.6194 7 6.724C7 7.8286 7.895 8.724 9 8.724Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path></g>
</svg>
                    </div>
            </div>
            @endif
             {{-- third top earner --}}
             @if ($loop->iteration == 3)
               <div style="border:1px solid var(--rgt-01);order:{{ $loop->iteration }};" class="{{ $loop->iteration == 4 ? 'm-top-20' : '' }} w-full house row g-10px p-15px br-15px">
                  <div style="height:50px;width:50px;border-radius:50%;margin-bottom:0;" class="no-pointer no-select gold-border">
                        @isset($data->user->photo)
                        <img src="{{ asset('photos/users/'.$data->user->photo.'') }}" alt="" class="w-full perfect-square w-full br-16">
                    @else
                   <div class="vendor-avatar uppercase">
        {{ substr($data->user->username,0,1) }}
      </div>
                    @endisset
                   
                    </div>
                    {{-- new column --}}
                    <div class="column g-10">
                        <strong class="font-size-09">{{ ucwords($data->user->username) }}</strong>
                       <div class="column">
                        <strong class="font-size-09 font-weight-900">{{ $data->user->currency.$data->total_earnings }}</strong>
                         <span class="opacity-07 font-size-06rem">Total Earnings</span>

                       </div>
                    </div>
                    {{-- iteration --}}
                    <div style="background:rgb(108,92,230);color:white !important;" class="w-40 h-40 circle no-select bg-gold c-black font-weight-900 font-size-1 m-left-auto column align-center justify-center">
<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
  <g fill="currentColor">
    <path d="m6,7.75c-1.281,0-2.39-.696-3-1.723v5.472c0,.399.445.638.777.416l2.223-1.482,2.223,1.482c.332.221.777-.017.777-.416v-5.472c-.61,1.027-1.719,1.723-3,1.723Z" fill="currentColor" stroke-width="0"></path>
    <circle cx="6" cy="4.25" r="3.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle>
  </g>
</svg>

                    </div>
            </div>
            @endif
          @if ($loop->iteration > 3)
                {{-- regular --}}
            <div style="border:1px solid var(--rgt-01);order:{{ $loop->iteration }};" class="{{ $loop->iteration == 4 ? 'm-top-20' : '' }} w-full house row g-10px p-15px br-15px">
                  <div style="height:50px;width:50px;border-radius:50%;margin-bottom:0;" class="no-pointer no-select gold-border">
                        @isset($data->user->photo)
                        <img src="{{ asset('photos/users/'.$data->user->photo.'') }}" alt="" class="w-full perfect-square w-full br-16">
                    @else
                   <div class="vendor-avatar uppercase">
                   {{ substr($data->user->username,0,1) }}
                     </div>
                    @endisset
                   
                    </div>
                    {{-- new column --}}
                    <div class="column g-10">
                        <strong class="font-size-09 font-weight-900">{{ ucwords($data->user->username) }}</strong>
                       <div class="column">
                        <strong class="font-size-09 font-weight-900">{{ $data->user->currency.$data->total_earnings }}</strong>
                         <span class="opacity-07 font-size-06rem">Total Earnings</span>

                       </div>
                    </div>
                    {{-- iteration --}}
                    <div class="w-40 h-40 circle no-select bg-primary-lighter c-primary-darker border-width-1px border-style-solid border-color-primary font-weight-900 font-size-1 m-left-auto column align-center justify-center">{{ $loop->iteration }}</div>
            </div>
          @endif
        @endforeach
               
           @endif
        </div>
       
        <!-- MVW -->
        <section class="mvw">

            <div class="mvw-content column g-10px">

                <div class="mvw-label font-weight-800">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M3.49709 8.06464L4.78355 18.9996H19.2266L20.513 8.06464L16.5032 10.7379L12.0051 4.44051L7.50694 10.7379L3.49709 8.06464ZM2.80577 5.20006L7.00505 7.99958L11.1913 2.13881C11.5123 1.6894 12.1369 1.58531 12.5863 1.90631C12.6761 1.97045 12.7546 2.04901 12.8188 2.13881L17.0051 7.99958L21.2043 5.20006C21.6639 4.89371 22.2847 5.01788 22.5911 5.47741C22.7228 5.67503 22.7799 5.91308 22.7522 6.14895L21.109 20.1164C21.0497 20.62 20.6229 20.9996 20.1158 20.9996H3.8943C3.38722 20.9996 2.9604 20.62 2.90115 20.1164L1.25792 6.14895C1.19339 5.60045 1.58573 5.10349 2.13423 5.03896C2.37011 5.01121 2.60816 5.06832 2.80577 5.20006ZM12.0051 14.9996C10.9005 14.9996 10.0051 14.1042 10.0051 12.9996C10.0051 11.895 10.9005 10.9996 12.0051 10.9996C13.1096 10.9996 14.0051 11.895 14.0051 12.9996C14.0051 14.1042 13.1096 14.9996 12.0051 14.9996Z"></path></svg>

                    RideNet MVW
                </div>

                <strong class="font-weight-900 font-size-1-5rem">
                    Most Valuable Worker
                </strong>

                <p>
                    Stay active, complete more rides and tasks, maintain quality
                    performance and climb the leaderboard. The most active and
                    productive user each month can receive the RideNet MVW reward.
                </p>

                <div class="mvw-reward">
                    <svg class="c-primary-lighter" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="50" width="50"><path d="M15.0049 2.00281C17.214 2.00281 19.0049 3.79367 19.0049 6.00281C19.0049 6.73184 18.8098 7.41532 18.4691 8.00392L23.0049 8.00281V10.0028H21.0049V20.0028C21.0049 20.5551 20.5572 21.0028 20.0049 21.0028H4.00488C3.4526 21.0028 3.00488 20.5551 3.00488 20.0028V10.0028H1.00488V8.00281L5.54065 8.00392C5.19992 7.41532 5.00488 6.73184 5.00488 6.00281C5.00488 3.79367 6.79574 2.00281 9.00488 2.00281C10.2001 2.00281 11.2729 2.52702 12.0058 3.35807C12.7369 2.52702 13.8097 2.00281 15.0049 2.00281ZM11.0049 10.0028H5.00488V19.0028H11.0049V10.0028ZM19.0049 10.0028H13.0049V19.0028H19.0049V10.0028ZM9.00488 4.00281C7.90031 4.00281 7.00488 4.89824 7.00488 6.00281C7.00488 7.05717 7.82076 7.92097 8.85562 7.99732L9.00488 8.00281H11.0049V6.00281C11.0049 5.00116 10.2686 4.1715 9.30766 4.02558L9.15415 4.00829L9.00488 4.00281ZM15.0049 4.00281C13.9505 4.00281 13.0867 4.81869 13.0104 5.85355L13.0049 6.00281V8.00281H15.0049C16.0592 8.00281 16.923 7.18693 16.9994 6.15207L17.0049 6.00281C17.0049 4.89824 16.1095 4.00281 15.0049 4.00281Z"></path></svg>

                    WIN ₦300,000 EVERY MONTH
                </div>

            </div>

        </section>
    </section>
 <div style="color:rgb(255,255,255,0.5);border-top:1px solid rgba(255,255,255,0.5);margin:auto 10px 0 10px;width:calc(100% - 20px)" class="column align-center text-align-center m-top-auto font-size-06rem p-15px border-top-width-1px border-top-style-solid border-top-color-rgt-01 c-rgt-05">
© 2026 RideNet. Connecting Rides. Creating Wealth.
        </div>
</body>
</html>

