<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $response = Http::get('https://randomuser.me/api/?results=50&seed=users');
        $allUsers = $response->json()['results'] ?? [];

        $search = strtolower($request->input('search', ''));

        if ($search) {
            $allUsers = array_filter($allUsers, function ($user) use ($search) {
                $name = strtolower($user['name']['first'] . ' ' . $user['name']['last']);
                $email = strtolower($user['email']);
                return str_contains($name, $search) || str_contains($email, $search);
            });
        }

        $perPage = 10;
        $currentPage = $request->input('page', 1);
        $offset = ($currentPage - 1) * $perPage;
        $currentItems = array_slice($allUsers, $offset, $perPage);

        $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $currentItems,
            count($allUsers),
            $perPage,
            $currentPage,
            ['path' => url()->current(), 'query' => $request->query()]
        );

        return view('data-master.user', [
            'users' => $paginator,
            'search' => $search,
        ]);
    }
}
