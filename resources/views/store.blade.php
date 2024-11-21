<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
</head>
<body>
    <h1>Add New Student</h1>

<!--{{ route('student.store') }} student.store is the name of route to post the data from the form-->
    <form action="{{ route('student.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="student_name" required>
        
        <label for="id">Id:</label>
        <input type="text" name="student_id" required>
        
        <label for="department">Department ID:</label>
        <input type="number" name="department_id" required>

        <label for="address">Address:</label>
        <input type="text" name="student_address" required>
        
        <button type="submit">Add Student</button>
    </form>
    <a href="{{ route('student.showAll') }}">
        <button type="button">All Students</button>
    </a>
</body>
</html>
