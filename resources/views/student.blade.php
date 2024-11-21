<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
</head>
<body>
    <h1>Students List</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Department ID</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach($student as $st)
                <tr>
                    <td>{{ $st->student_id }}</td>
                    <td>{{ $st->student_name }}</td>
                    <td>{{ $st->department_id }}</td>
                    <td>{{ $st->student_address }}</td>
                    <td>
                        <!-- Form to delete a student -->
                        <!-- Problem : i use $st->student_id (this not the id meant by findOrFail($id)) instead of $st->id (this is the id that is meant by findOrFail($id)) -->
                        
                        <form action="{{ route('student.destroy', $st->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove {{$st->student_name}}?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Remove</button>
                        </form>
                    </td>
                    <td>
                        <!-- When this button is clicked, navigate to edit form -->
                        <!-- $st->id here is id of row not 'D121221020' -->
                        <a href="{{ route('student.edit',  $st->id) }}">
                            <button type="button">Edit</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('student.form') }}">
        <button type="button">Add</button>
    </a>
</body>
</html>
