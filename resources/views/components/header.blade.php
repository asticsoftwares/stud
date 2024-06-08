@php
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\UserDataController;

$ValidationController = new ValidationController;
$StatisticsController = new StatisticsController;
$UserDataController = new UserDataController;

$navbar = [
  'Play' => 'play',
  'Shop' => 'shop',
  'Clans' => 'clans',
  'Users' => 'search',
  'Forum' => 'forum',
  'Membership' => 'membership'
];

if($ValidationController->isUserLoggedIn() == 1) {
  $secondaryNavbar = [
    'Home' => 'dashboard',
    'Settings' => 'settings',
    'Avatar' => 'customize',
    'Profile' => 'user/'.$UserDataController->getSelfID(),
    'Download' => 'client',
    'Trades' => 'trades',
    'Sets' => 'sets',
    'Currency' => 'currency',
    'Blog' => 'blog'
  ];

  $isAdmin = $UserDataController->isAdmin($UserDataController->getSelfID());
}
@endphp
<html>
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @stack('meta')
  <meta name="theme-color" content="#00A9FE">
  <meta name="og:image" content="{{ asset('favicon.ico') }}">
  <meta name="og:site_name" content="Stud">
  <meta name="og:description" content="An open-source platform built on its community where you can customise your avatar, create and play games, or just socialise with others!">
  @if($ValidationController->isUserLoggedIn() == 0)
  <meta name="user-data" data-authenticated="false">
  @else
  <meta name="user-data" data-authenticated="true" data-id="{{ $UserDataController->getSelfID() }}" data-username="{{ $UserDataController->getUsername($UserDataController->getSelfID()) }}" data-membership data-bucks="{{ $UserDataController->getBucks($UserDataController->getSelfID()) }}" data-bits="{{ $UserDataController->getBits($UserDataController->getSelfID()) }}" data-tax-rate="0.8" data-admin="{{ $isAdmin }}">
  @endif
  <title>Stud</title>
  <meta name="og:title" content="Stud">
  <link rel="stylesheet" href="{{ asset('theme.css') }}" />
  <link rel="stylesheet" href="{{ asset('theme2.css') }}" />
 </head>
 <body>
 <nav>
 <div class="primary">
 <div class="grid">
 <div class="push-left">
 <ul>
 @foreach($navbar as $item => $url)
  <li>
  <a href="/{{ $url }}">
  {{ $item }}
  </a>
  </li>
  @endforeach
  </ul>
  </div>
  @if($ValidationController->isUserLoggedIn() == 0)

  <div class="username login-buttons">
  <a href="/login" class="login-button">Login</a>
  <a href="/register" class="register-button">Register</a>
  </div>
  @else
      <div class="nav-user push-right" id="info">
      <div class="info">
      <a href="/currency" class="header-data" title="{{ $UserDataController->getBucks($UserDataController->getSelfID()) }}">
      <span class="bucks-icon img-white"></span>
{{ $UserDataController->getBucks($UserDataController->getSelfID()) }}
      </a>
      <a href="/currency" class="header-data" title="{{ $UserDataController->getBits($UserDataController->getSelfID()) }}">
       <span class="bits-icon img-white"></span>
{{ $UserDataController->getBits($UserDataController->getSelfID()) }}
        </a>
        <a href="/messages" class="header-data">
        <span class="messages-icon img-white"></span>
0
</a>
<a href="/friends" class="header-data">
<span class="friends-icon img-white"></span>
0
</a>
</div>
  <div class="username ellipsis">
  <div id="username-bar" onclick="window.location = '/logout'">
  <div class="username-holder ellipsis inline unselectable">{{ $UserDataController->getUsername($UserDataController->getSelfID()) }}</div>
  <i class="arrow-down img-white"></i>
  </div>
  </div>
</div>
  @endif
 </div>
</div>
@if($ValidationController->isUserLoggedIn() == 1)
<div class="secondary">
<div class="grid">
<div class="bottom-bar">
<ul>
@foreach($secondaryNavbar as $item => $url)
<li>
<a href="/{{ $url }}">
{{ $item }}
</a>
</li>
@endforeach
</ul>
</div>
</div>
</div>
@endif
</nav>
@if($_SERVER['REQUEST_URI'] !== '/')
<div class="main-holder grid">
@endif
@if($StatisticsController->shouldAlertShow())
<div class="col-10-12 push-1-12 new-theme">
    <div class="alert {{ $StatisticsController->getAlertType() }}">
        {{ $StatisticsController->getAlertMessage() }}
    </div>
</div>
@endif
