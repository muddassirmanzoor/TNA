<!DOCTYPE html>
<html>
<head>
    <style>
        .email-container {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .email-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
        }
        .email-header {
            text-align: center;
        }
        .email-logo {
            width: 150px;
            margin-bottom: 20px;
        }
        .email-body {
            font-size: 16px;
            color: #333;
        }
        .email-footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #777;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="email-content">
        <div class="email-header">
            <img src="https://www.pesrp.edu.pk/wp-content/uploads/2024/05/PMIU-Logo-Colored-ai.png" class="email-logo" alt="Site Logo">
        </div>
        <div class="email-body">
            <p>Dear {{ $profile->st_name }},</p>
            <p>Here is your result:</p>

            <!-- Result Table -->
            <table>
                <thead>
                <tr>
                    <th>Section</th>
                    <th>Total Marks</th>
                    <th>Obtained Marks</th>
                    <th>Percentage</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($result as $section)
                    <tr>
                        <td>{{ $section['section'] }}</td>
                        <td>{{ $section['total_marks'] ?? 'N/A' }}</td>
                        <td>{{ $section['obtain_marks'] ?? 'N/A' }}</td>
                        <td>{{ $section['percentage'] ?? 'N/A' }}%</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} PMIU Data Center. All rights reserved.</p>
        </div>
    </div>
</div>
</body>
</html>
