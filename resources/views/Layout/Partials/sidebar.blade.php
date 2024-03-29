<section id="menu">
    <div class="logo">
        <img src="{{ asset('Images/Bonevian.png') }}">
        <h2>Book App</h2>
    </div>

    <div class="items">
        <li class="{{ ($title == "Dashboard") ? 'active' : '' }}"><i class="fas fa-tachometer-alt"></i><a href="/dashboard">Dashboard</a></li>
        <li class="{{ ($title == "Harga") ? 'active' : '' }}"><i class="fas fa-tags"></i><a href="/harga">Harga</a></li>
        <li class="{{ ($title == "Buku") ? 'active' : '' }}"><i class="fas fa-book"></i><a href="/buku">Buku</a></li>
        <li class="{{ ($title == "Penulis") ? 'active' : '' }}"><i class="fas fa-pen"></i><a href="/penulis">Penulis</a></li>
        <li class="{{ ($title == "Genre") ? 'active' : '' }}"><i class="fas fa-user-md"></i><a href="/genre">Genre</a></li>
        <li class="{{ ($title == "Pembelian") ? 'active' : '' }}"><i class="fas fa-money-bill-wave-alt"></i><a href="/pembelian">Pembelian</a></li>
    </div>

</section>