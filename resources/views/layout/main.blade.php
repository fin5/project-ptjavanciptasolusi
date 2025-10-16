<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FinCompany</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <div class="logo">Finn Company</div>
            <ul class="nav-links">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="dropdown">
                    <a href="#">Data Master ▾</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('data.user') }}">Data Pengguna</a></li>
                        <li><a href="{{ route('data.supplier') }}">Data Supplier</a></li>
                        <li><a href="{{ route('data.barang') }}">Data Barang</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('transaksi') }}">Transaksi</a></li>
                <li><a href="{{ route('laporan') }}">Laporan</a></li>
            </ul>

            <div class="user-info" id="userInfo">
                <img src="" alt="User Photo" id="userPhoto">
                <span id="userName"></span>
            </div>

            <div class="menu-toggle">&#9776;</div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-logo">
                <h2>Finn Company</h2>
            </div>

            <div class="footer-links">
                <h4>Navigasi</h4>
                <ul>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('data.user') }}">Data Pengguna</a></li>
                    <li><a href="{{ route('data.supplier') }}">Data Supplier</a></li>
                    <li><a href="{{ route('data.barang') }}">Data Barang</a></li>
                </ul>
            </div>

            <div class="footer-contact">
                <h4>Kontak</h4>
                <p>Email: info@finncompany.com</p>
                <p>Telepon: +62 812-3456-7890</p>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Finn Company. All rights reserved.</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', async () => {
            try {
                const response = await fetch('https://randomuser.me/api/?results=1&seed=users');
                const data = await response.json();
                const user = data.results[0];

                document.getElementById('userPhoto').src = user.picture.thumbnail;
                document.getElementById('userName').textContent = user.name.first + ' ' + user.name.last;
            } catch (error) {
                console.error('Gagal memuat data user:', error);
            }
        });
    </script>

    <script>
        const toggle = document.querySelector('.menu-toggle');
        const navLinks = document.querySelector('.nav-links');
        toggle.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    </script>

    <script>
        function openModal(id) {
            document.getElementById('modal-' + id).style.display = 'flex';
        }

        function closeModal(id) {
            document.getElementById('modal-' + id).style.display = 'none';
        }

        window.onclick = function(event) {
            document.querySelectorAll('.modal').forEach(modal => {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            });
        }
    </script>
</body>

</html>
