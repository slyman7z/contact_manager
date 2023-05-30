<tr class="table-danger">
    <td>{{$contact->id}}</td>
    <td>{{$contact->first_name}}</td>
    <td>{{$contact->last_name}}</td>
    <td>{{ $contact->phone}}</td>
    <td>{{ $contact->email}}</td>
    <td>{{ $contact->address}}</td>
    <td>{{ $contact->company->name}}</td>

    <td width="150">
        <a href="{{ route('contacts.show', $contact['id'] )}}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
        <a href="form.html" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
        <a href="#" class="btn btn-sm btn-circle btn-outline-danger" title="Delete" onclick="confirm('Are you sure?')"><i class="fa fa-times mt-1"></i></a>
    </td>
</tr>