<table class="table table-bordered">
    <tr>
        <th>User Account</th>
        <td>{{ isset($officer->user->name) ? $officer->user->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Name</th>
        <td>{{ isset($officer->name) ? $officer->name : 'N/A' }}</td>
    </tr>
</table>
