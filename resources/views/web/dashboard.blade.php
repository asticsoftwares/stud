{{ view('components.header') }}
@php
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\StatisticsController;

$UserDataController = new UserDataController;
$StatisticsController = new StatisticsController;
@endphp
<div class="new-theme dashboard">
<div class="col-3-10">
<div class="card border-bottom no-rounded no-shadow">
<div class="rounded center-text">
<img class="avatar-thumbnail" src="{{ $StatisticsController->getFullURL() }}/v1/thumbnails/single?type=1&id={{ $UserDataController->getSelfID() }}" style="width:100%;">
<span style="margin: 5px;" class="bold medium-text">{{ $UserDataController->getUsername($UserDataController->getSelfID()) }}</span>
<div class="dashboard-info flex flex-column flex-items-center">
<div class="flex dash-info vmargin-6">
<div class="flex streak-info dash-info ml-20 mr-10 flex-items-center">
<svg-sprite id="svgsprite-v" svg="user/trade/value/value" square="23" class="svgsprite svg-black mr-10"></svg-sprite>
<p class="smedium-text mr-20">0</p>
</div>
</div>
</div>
</div>
</div>
<div>
<div class="flex flex-items-center flex-horiz-center">
<p class="very-bold smedium-text mr-10">0</p>
<p class="bold small-text gray-text">FRIENDS</p>
</div>
</div>
<div class="card no-rounded no-shadow">
</div>
</div>
<div class="col-8-12">
<blog-card id="blogcard-v" class="blogcard"></blog-card>
<div class="card border-bottom no-shadow no-rounded">
<div class="smedium-text mb-16 bold">
What's New?
</div>
<div>
<form style="width:100%;" class="pb3" method="POST" action="https://www.brick-hill.com/status">
<input type="hidden" name="_token" value="CzXKDQVYt2f0RQ0iUEfRVBoRBFPrI0KTtDjNYc8s"> <div class="flex flex-column">
<textarea class="post-input border mb-16" name="status" placeholder="Right now I'm..." type="text"></textarea>
<button class="post-button button small smaller-text blue">Submit</button>
</div>
</form>
</div>
</div>
<div class="card no-shadow">
<div class="smedium-text mb-16 bold">
Your Feed
</div>
<div>
<!--<p class="gray-text">Your feed is empty! Follow some users to fill this area.</p>-->
<p class="gray-text">This feature is not done, yet.</p>
</div>
</div>
</div>
</div>
<div class="col-10-12 push-1-12">
<div style="text-align:center;margin-top:20px;padding-bottom:25px;">
</div>
</div>
</div>
{{ view('components.footer') }}
