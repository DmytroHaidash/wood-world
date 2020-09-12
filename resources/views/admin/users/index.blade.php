@extends('layouts.admin', ['page_title' => 'Пользователи'])

@section('content')

    <section id="content">
        <div class="d-flex align-items-center mb-5">
            <h1 class="h3 mb-0">Пользователи</h1>
            <div class="ml-4">
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                    Создать новго пользователя
                </a>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
            <tr class="small">
                <th width="20">#</th>
                <th>Имя</th>
                <th>Роль</th>
                <th>Дата создания</th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                        <a href="{{ route('admin.users.show', $user) }}" class="underline">
                            {{ $user->name }}
                        </a>
                    </td>
                    <td>{{$user->role->name == 'admin' ? 'Администратор' :
                    ($user->role->name  == 'moderator' ? 'Модератор' : 'Пользователь')}}</td>
                    <td width="150">{{ $user->created_at->formatLocalized('%d %b %Y, %H:%M') }}</td>
                    <td width="150">
                        <a href="{{ route('admin.users.show', $user) }}"
                           class="btn btn-warning btn-squire">
                            <i class="i-user"></i>
                        </a>
                        <a href="{{ route('admin.users.edit', $user) }}"
                           class="btn btn-warning btn-squire">
                            <i class="i-pencil"></i>
                        </a>
                        <button class="btn btn-danger btn-squire">
                            <i class="i-trash"></i>
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">
                        Пользователей пока нет
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{ $users->appends(request()->except('page'))->links() }}
    </section>

    @endsection
