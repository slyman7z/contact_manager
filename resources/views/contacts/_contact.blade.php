<tr class="table-danger">
    <td>{{$contacts->firstItem() + $index}}</td>

    <td>{{$contact->first_name}}</td>
    <td>{{$contact->last_name}}</td>
    <td>{{ $contact->phone}}</td>
    <td>{{ $contact->email}}</td>
    <td>{{ $contact->address}}</td>
    <td>{{ $contact->company->name}}</td>

    <td width="150">
        <a href="{{ route('contacts.show', $contact['id'] )}}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
        <a href="{{ route('contacts.edit' , $contact->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
        <form action="{{route('contact.destroy', $contact->id)}}" method="post" onsubmit="confirm('Are you sure?')" style="display:inline">
            @csrf
            @method('delete')
            <button type=" submit" class="btn btn-sm btn-circle btn-outline-danger" title="Delete"><i class="fa fa-times mt-1"></i></button>
        </form>
    </td>
</tr>