<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data Table</title>
    <!-- Include DataTable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="container">
        <h2>User Information</h2>
        <table id="userTable" class="display">
            <thead>
                <tr>
                    <th>Profile Picture</th> <!-- Profile preview column -->
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Action</th> <!-- Column for the "View More" button -->
                </tr>
            </thead>
        </table>
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#userTable').DataTable({
                ajax: {
                    url: 'fetch_userdata.php', // Backend script
                    dataSrc: '' // Array of data
                },
                columns: [
                    {
                        data: 'profile_picture', // Profile picture column
                        render: function (data, type, row) {
                            const defaultImage = 'assets/images/user-img/*.png';
                            const imageUrl = data ? data : defaultImage;
                            return `<img src="${imageUrl}" alt="Profile Picture" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">`;
                        }
                    },
                    { data: 'full_name' },
                    { data: 'email' },
                    {
                        data: 'user_id', // Add an action column
                        render: function (data, type, row) {
                            return `<a href="view_profile.php?user_id=${data}" class="view-more">View More</a>`;
                        }
                    }
                ]
            });
        });
    </script>
</body>
</html>
