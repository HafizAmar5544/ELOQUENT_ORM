<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Student Registration</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <h2 class="text-center mb-4">Student Registration Form</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{route('students.store')}}" method="POST">
                @csrf

                <!-- Full Name -->
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter full name" required>
                </div>

                <!-- Father's Name -->
                <div class="mb-3">
                    <label class="form-label">Father's Name</label>
                    <input type="text" name="father_name" class="form-control" placeholder="Enter father's name">
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                </div>

                <!-- Date of Birth -->
                <div class="mb-3">
                    <label class="form-label">Date of Birth</label>
                    <input type="date" name="dob" class="form-control" required>
                </div>

                <!-- Address -->
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control" rows="1" placeholder="Enter full address"></textarea>
                </div>

                <!-- Dynamic Subjects -->
                <div class="mb-3">
                    <label class="form-label">Subjects</label>
                    <div id="subjectContainer">
                        <div class="input-group mb-2">
                            <input type="text" name="subjects[]" class="form-control" placeholder="Enter subject" required>
                            <button type="button" class="btn btn-success addSubject" data-bs-toggle="tooltip" data-bs-placement="top" title="Add another subject"><b>+</b></button>
                        </div>
                    </div>
                    <small class="text-muted">Click the + button to add more subjects.</small>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn b_success px-4">Register</button>
                </div>

            </form>
        </div>
    </div>

    <!-- JavaScript for Dynamic Subject Input -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
             var i=0;
            $(".addSubject").click(function () { ++i;
                let newInput = `
                    <div class="input-group mb-2">
                        <input type="text" name="subjects[]" class="form-control" placeholder="Enter subject" required>
                        <button type="button" class="btn btn-danger removeSubject" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this subject">-</button>
                    </div>
                `;
                $("#subjectContainer").append(newInput);
            });

            // Remove subject input
            $(document).on("click", ".removeSubject", function () {
                $(this).parent().remove();
            });
        
    </script>
</body>

</html>
