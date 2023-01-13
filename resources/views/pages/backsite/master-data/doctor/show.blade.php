<table class="table table-bordered">
    <tr>
        <th>User Account</th>
        <td>{{ isset($doctor->user->name) ? $doctor->user->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Name</th>
        <td>{{ isset($doctor->name) ? $doctor->name : 'N/A' }}</td>
    </tr>
</table>
