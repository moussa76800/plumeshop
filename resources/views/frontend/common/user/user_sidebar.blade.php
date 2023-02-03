{{-- @php
    $id = Auth::user()->id;
    $user = App\Models\User::find($id);
@endphp --}}


<div class="col-md-3"><br> 
    <img class="card-img-top" style="border-radius: 50%" src="{{ (!empty(Auth::user()->profile_photo_path)) ?  url('upload/user_images/'.Auth::user()->profile_photo_path):url('upload/no_image.png') }}" height="80%" width="100%"><br><br>
				
				<ul class="list-group list-group-flush">
<a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">@if (session()->get('language') == 'french')Accueil @else Home @endif</a>

<a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">@if (session()->get('language') == 'french')Mise à jour du profil

@else    Profile Update @endif</a>

<a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">@if (session()->get('language') == 'french')Modification du Mot de Passe @else Change Password @endif</a>

<a href="{{ route('my_Order') }}" class="btn btn-primary btn-sm btn-block">@if (session()->get('language') == 'french')Mes Achats @else My Orders @endif</a>

{{-- <a href="{{ route('return.order.list') }}" class="btn btn-primary btn-sm btn-block">Return Orders</a>

<a href="{{ route('cancel.orders') }}" class="btn btn-primary btn-sm btn-block">Cancel Orders</a> --}}

<a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">@if (session()->get('language') == 'french')Déconnexion @else Logout @endif</a>
					
				</ul>
				
			</div> <!-- // end col md 2 -->