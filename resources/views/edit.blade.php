<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>

<!--{{ route('student.store') }} student.store is the name of route to post the data from the form-->
<!-- What must be modify is the route() and the naming, i want to initialize the form with current data-->
    <form action="{{ route('student.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="student_name" value="{{ $student->student_name }}" required>
        
        <label for="id">Id:</label>
        <input type="text" name="student_id" value="{{ $student->student_id }}" required>
        
        <label for="department">Department ID:</label>
        <input type="number" name="department_id" value="{{ $student->department_id }}" required>

        <label for="address">Address:</label>
        <input type="text" name="student_address" value="{{ $student->student_address }}" required>
        
        <button type="submit">Update Student Data</button>
    </form>
    <a href="{{ route('student.showAll') }}">
        <button type="button">All Students</button>
    </a>
</body>
</html>

