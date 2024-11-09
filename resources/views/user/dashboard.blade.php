<h1>Welcome User!</h1>
<p>Ini adalah halaman dashboard untuk user biasa.</p>

<form action="{{ route('logout') }}" method="POST"> @csrf <button type="submit">Logout</button> </form>