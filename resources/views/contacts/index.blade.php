<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<a href="{{ url('/contacts/create') }} ">Create Contact</a>
<form method="GET">
    <input type="text" name="search" placeholder="Search by name or email">
    <button type="submit">Search</button>
</form>

<table>
    <thead>
        <tr>
            <th><a href="{{ url('/contacts?sort=name') }}">Name</a></th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>
                <a href="{{ url('/contacts/'.$contact->id) }}">View</a>
                <a href="{{ url('/contacts/'.$contact->id.'/edit') }}">Edit</a>
                <form method="POST" action="{{ url('/contacts/'.$contact->id) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
