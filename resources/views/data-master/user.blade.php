@extends('layout.main')

@section('title', 'Data Pengguna')

@section('content')
    <section class="section">
        <div class="container">
            <h2 class="section-title">Data Pengguna</h2>

            <form method="GET" action="{{ route('data.user') }}" class="search-form">
                <input type="text" name="search" placeholder="🔍 Cari nama atau email..." value="{{ request('search') }}"
                    class="search-input" onkeydown="if(event.key === 'Enter') this.form.submit();">
            </form>

            <div class="card-grid">
                @foreach ($users as $index => $user)
                    <div class="user-card">
                        <img src="{{ $user['picture']['large'] }}" alt="{{ $user['name']['first'] }}">
                        <h3>{{ $user['name']['first'] }} {{ $user['name']['last'] }}</h3>
                        <p>{{ $user['email'] }}</p>
                        <p>{{ $user['location']['city'] }}, {{ $user['location']['country'] }}</p>
                        <button class="btn-detail" onclick="openModal({{ $index }})">Lihat Detail</button>
                    </div>
                    <div id="modal-{{ $index }}" class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="closeModal({{ $index }})">&times;</span>

                            <img src="{{ $user['picture']['large'] }}" alt="Foto" class="modal-photo">
                            <h2>{{ $user['name']['title'] }} {{ $user['name']['first'] }} {{ $user['name']['last'] }}
                            </h2>
                            <p><strong>Email:</strong> {{ $user['email'] }}</p>
                            <p><strong>Telepon:</strong> {{ $user['phone'] }}</p>
                            <p><strong>Usia:</strong> {{ $user['dob']['age'] }}</p>
                            <p><strong>Jenis Kelamin:</strong> {{ ucfirst($user['gender']) }}</p>
                            <p><strong>Alamat:</strong>
                                {{ $user['location']['street']['number'] }} {{ $user['location']['street']['name'] }},
                                {{ $user['location']['city'] }}, {{ $user['location']['country'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="pagination">
                {{ $users->links('pagination::default') }}
            </div>

        </div>
    </section>
@endsection
