<h1>
    Admin Dashboard
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Cadastrar Usuário</a>
</h1>

<div class="container">
    <h2>Lista de Usuários</h2>

    @if ($users->isEmpty())
        <p>Nenhum usuário cadastrado.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Administrador</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->is_admin ? 'Sim' : 'Não' }}</td>
                        <td>
                            <!-- Actions like edit or delete can be added here -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>