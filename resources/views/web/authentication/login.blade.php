{{ view('components.header') }}
<div class="col-1-3 push-1-3">
@foreach ($errors->all() as $error)
<div class="col-10-12 push-1-12 new-theme">
    <div class="alert error">                       {{ $error }}                            </div>                                  </div>                                      @break
@endforeach
<div class="card">
<div class="top green">
Login
</div>
<div class="content">
<form method="POST">
@csrf
<div style="height: 5px;"></div>
<input id="username" type="username" name="username" value placeholder="Username" required autofocus>
<div style="height: 5px;"></div>
<input style="display:block;" id="password" type="password" name="password" autocomplete="password" placeholder="Password" required>
<a href="/password/forgot" style="font-size:15px;">Forgot password?</a>
<div style="padding-top:5px;"></div>
<div style="padding-top:5px;"></div>
<button type="submit" class="green">
Login
</button>
</form>
</div>
</div>
</div>
</div>
{{ view('components.footer') }}
